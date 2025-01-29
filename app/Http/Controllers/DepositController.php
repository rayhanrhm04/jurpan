<?php

namespace App\Http\Controllers;

use App\Models\deposit as Deposit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DepositController extends Controller
{
    //
    /**
     * Menampilkan halaman pembuatan deposit.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        return view('deposit.createDepo');
    }

    /**
     * Menampilkan riwayat deposit pengguna.
     *
     * @return \Illuminate\View\View
     */
    public function history()
    {
        // Ambil riwayat deposit pengguna berdasarkan ID pengguna
        $deposits = Deposit::where('user_id', auth()->user()->id)->get();

        // Kirim data riwayat ke view
        return view('deposit.historyDepo', compact('deposits'));
    }

    /**
     * Memproses permintaan deposit.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function deposit(Request $request)
    {
        // Inisialisasi variabel
        $key = 'b60b60eea03464b85314d3a032eaee22';
        $uniqueCode = 'depo_' . rand();
        $service = $request->method;
        $amount = $request->amount;
        $validTime = 10800;
        $ewalletPhone = '085161030200';

        // Hitung signature untuk keperluan API
        $signature = md5($key . $uniqueCode . $service . $amount . $validTime . 'NewTransaction');

        // Simpan data deposit ke database
        Deposit::create([
            'user_id' => auth()->user()->id,
            'order_id' => $uniqueCode,
            'return_url' => route("home.page", ['success' => $uniqueCode]),
            'signature' => $signature,
            'type_payment' => $request->payment,
            'method_name' => $request->method_name,
            'payment' => $request->method,
            'amount' => $request->amount,
            'status' => 'PENDING',
        ]);

        // Kirim permintaan API menggunakan cURL
        $response = $this->sendApiRequest($key, $uniqueCode, $service, $amount, $validTime, $signature, $ewalletPhone);

        // Tangani respons dari API
        if ($response['success'] ?? false) {
            $url = $response['data']['checkout_url'];
            return redirect($url);
        }

        // Tampilkan pesan error jika API gagal
        return back()->withErrors('Gagal memproses deposit. Silakan coba lagi.');
    }

    /**
     * Mengirim permintaan deposit ke API pihak ketiga.
     *
     * @param string $key
     * @param string $uniqueCode
     * @param string $service
     * @param float $amount
     * @param int $validTime
     * @param string $signature
     * @param string $ewalletPhone
     * @return array
     */
    private function sendApiRequest($key, $uniqueCode, $service, $amount, $validTime, $signature, $ewalletPhone)
    {
        try {
            $ch = curl_init();

            curl_setopt($ch, CURLOPT_URL, 'https://api.paydisini.co.id/v1/');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);

            $postData = [
                'key' => $key,
                'request' => 'new',
                'unique_code' => $uniqueCode,
                'service' => $service,
                'amount' => $amount,
                'note' => 'Pembayaran pertama',
                'valid_time' => $validTime,
                'type_fee' => '1',
                'payment_guide' => true,
                'signature' => $signature,
                'return_url' => route("home.page", ['success' => $uniqueCode]),
                'ewallet_phone' => $ewalletPhone,
            ];
            curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);

            $result = curl_exec($ch);

            if (curl_errno($ch)) {
                throw new \Exception('cURL Error: ' . curl_error($ch));
            }

            curl_close($ch);
            return json_decode($result, true);
        } catch (\Exception $e) {
            // Kembalikan respons dengan error jika terjadi exception
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }

    /**
     * Menangani callback dari API pihak ketiga.
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function callback(Request $request)
    {
        // Debug request untuk keperluan pengembangan
        // dd($request);
    }
}
