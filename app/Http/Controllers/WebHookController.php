<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WebHookController extends Controller
{
    public function handle(Request $request)
    {
        Log::info('WebHook called with data: ' . json_encode($request->all()));
        return response()->json(['message' => 'WebHook received successfully']);
    }
}
