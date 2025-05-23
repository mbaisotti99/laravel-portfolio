<?php

use App\Http\Controllers\Admin\DevController;
use App\Http\Controllers\Admin\MainController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TechController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/dashboard', function () {
    $user = Auth::user();
    return view('dashboard', compact('user'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(["auth", "verified"])
->name("logged.")
->prefix("admin")
->group(function(){

    Route::get("/", [MainController::class, "index"])
    ->name("index");

    Route::get("/profilo", [MainController::class, "profilo"])
    ->name("profilo");

});

Route::resource("projects", ProjectController::class)
->whereNumber("project")
->middleware(["auth", "verified"]);

Route::resource("types", TypeController::class)
->whereNumber("type")
->middleware(["auth", "verified"]);

Route::resource("techs", TechController::class)
->whereNumber("technology")
->middleware(["auth", "verified"]);

Route::resource("devs", DevController::class)
->whereNumber("developer")
->middleware(["auth", "verified"]);

Route::fallback(function(){
    return view('errors.404');
});

require __DIR__.'/auth.php';
