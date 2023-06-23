<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CropController;
use App\Http\Controllers\CropInputController;
use App\Http\Controllers\CropOutputController;
use App\Http\Controllers\CropDifferenceController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource(name:'crops', controller: \App\Http\Controllers\CropController::class);

Route::group(['prefix' => 'crops'], function () {
    Route::get('/', [CropController::class, 'index'])->name('crops.index');
    Route::get('/create', [CropController::class, 'create'])->name('crops.create');
    Route::post('/', [CropController::class, 'store'])->name('crops.store');
    Route::get('/{crop}/edit', [CropController::class, 'edit'])->name('crops.edit');
    Route::put('/{crop}', [CropController::class, 'update'])->name('crops.update');
    Route::delete('/{crop}', [CropController::class, 'destroy'])->name('crops.destroy');
});

Route::resource('crops', CropController::class);

Route::group(['prefix' => 'crop-inputs'], function () {
    Route::get('/', [CropInputController::class, 'index'])->name('crop-inputs.index');
    Route::get('/create', [CropInputController::class, 'create'])->name('crop-inputs.create');
    Route::post('/', [CropInputController::class, 'store'])->name('crop-inputs.store');
    Route::get('/{id}', [CropInputController::class, 'show'])->name('crop-inputs.show');
    Route::get('/{id}/edit', [CropInputController::class, 'edit'])->name('crop-inputs.edit');
    Route::put('/{id}', [CropInputController::class, 'update'])->name('crop-inputs.update');
    Route::delete('/{id}', [CropInputController::class, 'destroy'])->name('crop-inputs.destroy');
});

Route::prefix('crop-outputs')->group(function () {
    Route::get('/', [CropOutputController::class, 'index'])->name('crop-outputs.index');
    Route::get('/create', [CropOutputController::class, 'create'])->name('crop-outputs.create');
    Route::post('/', [CropOutputController::class, 'store'])->name('crop-outputs.store');
    Route::get('/{cropOutput}/edit', [CropOutputController::class, 'edit'])->name('crop-outputs.edit');
    Route::put('/{cropOutput}', [CropOutputController::class, 'update'])->name('crop-outputs.update');
    Route::delete('/{cropOutput}', [CropOutputController::class, 'destroy'])->name('crop-outputs.destroy');
});


Route::group(['prefix' => 'crop-differences', 'as' => 'crop-differences.'], function () {
    Route::get('/', [CropDifferenceController::class, 'index'])->name('index');
});

Route::prefix('employees')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
});
