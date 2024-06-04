<?php

namespace Ktith\Laravelexceptionnotifier;

use Illuminate\Support\Facades\Http;

class Inspire {
    public function justDoIt() {
        dd("just do it");
        $response = Http::get('https://inspiration.goprogram.ai/');
        return $response['quote'] . ' -' . $response['author'];
    }
}
