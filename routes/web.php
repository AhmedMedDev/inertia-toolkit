<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\PostController;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::inertia('/home', 'Home');
Route::inertia('/about', 'About');

Route::apiResource('posts', PostController::class)->middleware('auth');

Route::get('/dashboard', function (Request $request) {
    $search = $request->input('search');
    return Inertia::render('Dashboard',[
        'posts' => DB::table('posts')
            ->when($search, function ($query, $search){

               return $query->where('title', 'like', "%{$search}%");
            })
            ->latest()
            ->paginate(5)
            ->withQueryString()
    ]);
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
