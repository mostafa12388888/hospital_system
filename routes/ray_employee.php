<?php
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

use App\Http\Controllers\AmbulanceController;
use App\Http\Controllers\Dashbord\DectorsController;
use App\Http\Controllers\Dashbord\doctor\DignosticController;
use App\Http\Controllers\Dashbord\doctor\InvoicesController;
use App\Http\Controllers\Dashbord\doctor\LaboratoryController;
use App\Http\Controllers\Dashbord\doctor\PatientDetailsController;
use App\Http\Controllers\Dashbord\doctor\RaysController;
use App\Http\Controllers\Dashbord\insuranceController;
use App\Http\Controllers\Dashbord\PatientController;
use App\Http\Controllers\Dashbord\PaymentAcountController;
use App\Http\Controllers\Dashbord\ReceptAcountController;
use App\Http\Controllers\Dashbord\SectionController;
use App\Http\Controllers\Dashbord_Ray_employee\InvoiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServicesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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


Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
    ], function(){ //...
###########################Route Dashbord User###########################################

###########################Route Dashbord Doctor###########################################

Route::get('rayemployee/dashboard', function () {
    return view('Dashbord.Ray_employee_dashbord.dashboard');
})->middleware(['auth:rayemployee', 'verified'])->name('rayemployee.dashboard');
        ###########################Route End Dashbord Doctor###########################################
Route::prefix('rayemployee')->group(function(){
        Route::middleware(['auth:rayemployee'])->group(function(){

Route::resource('invoices_ray_employee',InvoiceController::class);
##############################view rays##################
Route::get('/view_rays/{id}',[InvoiceController::class,'view_rays'])->name('view_rays');
##############################view rays##################
                });
    });
    });



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

