<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\{categories, Services, deposit, Order};
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class orderController extends Controller
{
    //
    public function index(){
        $categories= categories::orderBy('name', 'asc')->get();
       
        return view('order.createOrder', compact('categories'));
    }

    public function order(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'service_id' => 'required|numeric|min:1',
            'min_amount' => 'required|numeric',
            'max_amount' => 'required|numeric',
            'price' => 'required|numeric',
            'target' => 'required|string',
            'quantity' => 'required|numeric|min:1',
            'amount' => 'required|numeric|min:1',
            'description' => 'nullable',
        ]);
        
        try {
            DB::beginTransaction();
        
            // Dapatkan user yang sedang login
            $userId = Auth::user()->id;
            $totalDeposit = deposit::where('user_id', $userId)->where('status', 'PAID')->sum('amount');
        
            // Ambil jumlah transaksi dari request
            $amount = $request->input('amount');
        
            // Periksa apakah saldo mencukupi
            if ($totalDeposit < $amount) {
                return back()->with('error', 'Saldo tidak mencukupi untuk transaksi ini.');
            }
        
            $order = Order::create([
                'user_id' => $userId,
                'service_id' => $request->service_id,
                'category_id' => $request->category_id,
                'min_amount' => $request->min_amount,
                'max_amount' => $request->max_amount,
                'price' => $request->price,
                'target' => $request->target,
                'quantity' => $request->quantity,
                'amount' => $request->amount,
                'status' => 'SUCCESS',
                'description' => $request->description,
            ]);
        
            if ($order->id) {
                // $response = $this->apiPedia($request, $order);
        
                // if (isset($response['status']) && $response['status'] === false) {
                //     Log::error(json_encode($response));
                //     throw new \Exception('Transaksi gagal: ' . ($response['message'] ?? 'Unknown error'));
                // }
        
                DB::commit();
        
                return redirect()->route('historyorder')->with('success', 'Transaksi Order berhasil');
            } else {
                throw new \Exception('Order creation failed.');
            }
        } catch (\Exception $e) {
            DB::rollBack();
        
            // Log error jika diperlukan
            Log::error($e->getMessage());
        
            return back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }

    }

    public function history(){
        $orders = Order::where('user_id', auth()->user()->id)->get();
        return view('order.historyOrder', compact('orders'));
    }

    public function ajaxLayanan(Request $request){
        $category_id = $request->get('category_id');
        $services= Services::where('category_id', '=', $category_id)->get();
        return response()->json($services);
    }
    public function getAmountAndPrice(Request $request)
    {
        // Ambil ID kategori dari permintaan
        $category_id = $request->input('category_id');

        // Query ke database untuk mendapatkan data min, max, dan price
        $data = DB::table('services')
            ->where('category_id', $category_id)
            ->select('min', 'max', 'price') // Pastikan kolom sesuai dengan database Anda
            ->first();

        // Kembalikan data dalam format JSON
        return response()->json($data);
    }
    // public function description(Request $request){
    //     $category_id = $request->get('category_id');
    //     $services= Services::
    // }

    private function apiPedia(Request $request, Order $order){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.medanpedia.co.id/order');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        $post = array(
            'api_id' => '26672',
            'api_key' => 'kam0ya-js1pct-db7zqh-pw3s6o-lztd9i',
            'service' => $request->service,
            'target' => $request->target,
            'quantity' => $request->quantity,
            'username' => $request->target,
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);

        return json_decode($result, true);
    }
}
