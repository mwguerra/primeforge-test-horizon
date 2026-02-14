<?php

use App\Jobs\ProcessTestJob;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dispatch', function () {
    ProcessTestJob::dispatch();
    return response()->json(['status' => 'Job dispatched', 'time' => now()->toDateTimeString()]);
});

Route::get('/jobs', function () {
    $results = DB::table('test_results')->orderByDesc('id')->limit(20)->get();
    return view('jobs', ['results' => $results]);
});
