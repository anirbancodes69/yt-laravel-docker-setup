<?php

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


// Route for testing cache and database performance with projects table: without cache
Route::get('/slow-projects', function () {
    $start = microtime(true);

    $projects = json_encode(
            DB::table('projects')->limit(10000)->where('status', 'active')->get()
        );

    $projects = json_decode($projects, true);

    $time = (microtime(true) - $start) * 1000; // Convert to milliseconds

    return response()->json([
        'source' => "database",
        'time' => round($time, 2),
        'count' => count($projects),
    ]);
});


// Route for testing cache and database performance with projects table: with cache
Route::get('/fast-projects', function () {
    $start = microtime(true);

    $source = "database";

    if (Cache::has('projects.cache')) {
        $source = "cache";
    } 

    $projects = cache::remember('projects.cache', 60, function () {
        return json_encode(
            DB::table('projects')->limit(100000)->where('status', 'active')->get()
        );
    });

    $projects = json_decode($projects, true);

    $time = (microtime(true) - $start) * 1000; // Convert to milliseconds

    return response()->json([
        'source' => $source,
        'time' => round($time, 2),
        'count' => count($projects),
    ]);
});


// Route to check current cache driver
Route::get('/check-cache-driver', function () {
    return config('cache.default');
});


// Route to clear cache
Route::get('/clear-cache', function () {
    Cache::forget('projects.cache');

    return response()->json([
        'message' => 'Cache cleared'
    ]);
});