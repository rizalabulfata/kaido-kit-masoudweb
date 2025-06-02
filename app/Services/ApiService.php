<?php

namespace App\Services;

use App\Models\LogDetection;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

class ApiService
{
    public static function predit($data)
    {

        $pathUrl = '/predict';

        $imagePath = $data['image'];
        $fullPath = Storage::disk('public')->path($imagePath);

        try {
            $response = Http::attach(
                'image',
                file_get_contents($fullPath),
                basename($fullPath)
            )
                ->post(env('API_URL') . $pathUrl);
            $response = $response->json();
        } catch (Exception $e) {
            $response = $e->getMessage();
        }

        if (empty($response['predictions'])) {
            return [false, 'Tidak ditemukan data cocok'];
        }

        LogDetection::create(['image' => $imagePath, 'response' => $response]);

        $filtered = collect($response['predictions'])
            ->filter(function ($prediction) {
                return $prediction['confidence'] >= 0.90;
            })
            ->values();

        return [true, $filtered];
    }
}
