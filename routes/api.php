<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

Route::get('/test', function () {
    return response()->json(['message' => 'Hotel API is working!']);
});

Route::get('/migrate', function () {
    Artisan::call('migrate', ['--force' => true]);
    return response()->json(['message' => 'Migrations ran!']);
});

Route::get('/tables', function () {
    try {
        $tables = DB::select("SELECT table_name FROM information_schema.tables WHERE table_schema = 'public'");
        return response()->json($tables);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()]);
    }
});
