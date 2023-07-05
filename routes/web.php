<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CropController;
use App\Http\Controllers\CropInputController;
use App\Http\Controllers\CropOutputController;
use App\Http\Controllers\FertilizerController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EquipmentController;
use App\Http\Controllers\LivestockController;
use App\Http\Controllers\CropBalanceController;


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

Route::prefix('employees')->group(function () {
    Route::get('/', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/create', [EmployeeController::class, 'create'])->name('employees.create');
    Route::post('/', [EmployeeController::class, 'store'])->name('employees.store');
    Route::get('/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    Route::put('/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    Route::delete('/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
});

Route::group(['prefix' => 'equipment'], function () {
    Route::get('/', [EquipmentController::class, 'index'])->name('equipment.index');
    Route::get('/create', [EquipmentController::class, 'create'])->name('equipment.create');
    Route::post('/store', [EquipmentController::class, 'store'])->name('equipment.store');
    Route::get('/{equipment}/edit', [EquipmentController::class, 'edit'])->name('equipment.edit');
    Route::put('/{equipment}', [EquipmentController::class, 'update'])->name('equipment.update');
    Route::delete('/{equipment}', [EquipmentController::class, 'destroy'])->name('equipment.destroy');
});


Route::prefix('livestock')->group(function () {
    Route::get('/', [LivestockController::class, 'index'])->name('livestock.index');
    Route::get('/create', [LivestockController::class, 'create'])->name('livestock.create');
    Route::post('/', [LivestockController::class, 'store'])->name('livestock.store');
    Route::get('/{livestock}/edit', [LivestockController::class, 'edit'])->name('livestock.edit');
    Route::put('/{livestock}', [LivestockController::class, 'update'])->name('livestock.update');
    Route::delete('/{livestock}', [LivestockController::class, 'destroy'])->name('livestock.destroy');
});


Route::get('/crop-balances', [CropBalanceController::class, 'index'])->name('crop-balances.index');

Route::prefix('fertilizers')->group(function () {
    Route::get('/', [FertilizerController::class, 'index'])->name('fertilizers.index');
    Route::get('/create', [FertilizerController::class, 'create'])->name('fertilizers.create');
    Route::post('/', [FertilizerController::class, 'store'])->name('fertilizers.store');
    Route::get('/{fertilizer}', [FertilizerController::class, 'show'])->name('fertilizers.show');
    Route::get('/{fertilizer}/edit', [FertilizerController::class, 'edit'])->name('fertilizers.edit');
    Route::put('/{fertilizer}', [FertilizerController::class, 'update'])->name('fertilizers.update');
    Route::delete('/{fertilizer}', [FertilizerController::class, 'destroy'])->name('fertilizers.destroy');
});

Route::group(['prefix' => 'incoming-fertilizers', 'as' => 'incoming_fertilizers.'], function () {
    Route::get('/', [App\Http\Controllers\IncomingFertilizerController::class, 'index'])->name('index');
    Route::get('/create', [App\Http\Controllers\IncomingFertilizerController::class, 'create'])->name('create');
    Route::post('/', [App\Http\Controllers\IncomingFertilizerController::class, 'store'])->name('store');
    Route::get('/{incomingFertilizer}/edit', [App\Http\Controllers\IncomingFertilizerController::class, 'edit'])->name('edit');
    Route::put('/{incomingFertilizer}', [App\Http\Controllers\IncomingFertilizerController::class, 'update'])->name('update');
    Route::delete('/{incomingFertilizer}', [App\Http\Controllers\IncomingFertilizerController::class, 'destroy'])->name('destroy');
});

Route::prefix('outgoing-fertilizers')->group(function () {
    Route::get('/', 'App\Http\Controllers\OutgoingFertilizerController@index')->name('outgoing-fertilizers.index');
    Route::get('/create', 'App\Http\Controllers\OutgoingFertilizerController@create')->name('outgoing-fertilizers.create');
    Route::post('/', 'App\Http\Controllers\OutgoingFertilizerController@store')->name('outgoing-fertilizers.store');
    Route::get('/{outgoing_fertilizer}', 'App\Http\Controllers\OutgoingFertilizerController@show')->name('outgoing-fertilizers.show');
    Route::get('/{outgoing_fertilizer}/edit', 'App\Http\Controllers\OutgoingFertilizerController@edit')->name('outgoing-fertilizers.edit');
    Route::put('/{outgoing_fertilizer}', 'App\Http\Controllers\OutgoingFertilizerController@update')->name('outgoing-fertilizers.update');
    Route::delete('/{outgoing_fertilizer}', 'App\Http\Controllers\OutgoingFertilizerController@destroy')->name('outgoing-fertilizers.destroy');
});


