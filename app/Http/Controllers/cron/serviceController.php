<?php

namespace App\Http\Controllers\cron;

use App\Http\Controllers\Controller;
use App\Services\MedanPediaService;
use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\Services;

class serviceController extends Controller
{
    //
    public function category() {
        $medanPedia = new MedanPediaService('ln1eov-teqvbl-m3r6ch-xeu5fj-zs3frx','26672');
        
        $categories = $medanPedia->getServices();

        foreach ($categories['data'] as $category) {
            $newCategory = categories::firstOrCreate([
                'name' => $category['category']
            ]);

            $newCategory->save();

            if($newCategory) {
                echo "Berhasil Ditambahkan";
            }
        }
    }

    public function service() {
        $medanPedia = new MedanPediaService('ln1eov-teqvbl-m3r6ch-xeu5fj-zs3frx','26672');
        
        $services = $medanPedia->getServices();

        foreach ($services['data'] as $service) {

            $category = categories::where('name', $service['category'])->first();

            $newService = Services::firstOrCreate([
                'category_id' => $category->id,
                'service_name' => $service['name'],
                'description' => $service['description'],
                'price' => $service['price'],
                'profit' => 0,
                'min' => $service['min'],
                'max' => $service['max'],
                'provider_sid' => $service['id'],
                'type' => $service['type'],
                'status' => 1
            ]);

            $newService->save();

            if($newService) {
                echo "Berhasil Ditambahkan";
            }
        }
    }
}
