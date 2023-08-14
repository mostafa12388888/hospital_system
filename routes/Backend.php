<?php

use App\Events\MyEvet;
use App\Http\Controllers\AmbulanceController;
use App\Http\Controllers\Dashbord\DectorsController;
use App\Http\Controllers\Dashbord\doctor\LaboratoryController;
use App\Http\Controllers\Dashbord\insuranceController;
use App\Http\Controllers\Dashbord\PatientController;
use App\Http\Controllers\Dashbord\PaymentAcountController;
use App\Http\Controllers\Dashbord\RayEmployController;
use App\Http\Controllers\Dashbord\ReceptAcountController;
use App\Http\Controllers\Dashbord\SectionController;
use App\Http\Controllers\LaboratoryEmployee\LaboratoryEmployeeController;
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
Route::get('user/dashboard', function () {
            return view('Dashbord.User.dashboard');
        })->middleware(['auth', 'verified'])->name('user.dashboard');
        ###########################Route End Dashbord User###########################################
###########################Route Dashbord Admin###########################################

        Route::get('admin/dashboard', function () {
          
            return view('Dashbord.Admin.dashboard');
        })->middleware(['auth:admin', 'verified'])->name('admin.dashboard');
        ###########################Route End Dashbord Admin###########################################


            ###########################Route Dashbord Admin Auth ###########################################
        Route::middleware(['auth:admin'])->group(function(){
                    Route::resource('Sections_admin',SectionController::class);
                      ###########################start Route Dashbord  dectors ###########################################
                      Route::resource('Doctors',DectorsController::class);
                      Route::post('/update_password',[DectorsController::class,'update_password'])->name('update_password');
                      Route::post('/update_status',[DectorsController::class,'update_status'])->name('update_status');
                      ###########################End Route Dashbord  Dector ###########################################
                      ###########################start Route Dashbord  Services ###########################################
                      Route::resource('Services_admin',ServicesController::class);
                      ###########################End Route Dashbord  Services ###########################################
Route::view('Services_ofer','livewire.groupt-service.sevices_ofer')->name('Services_ofer');    
Route::resource('insurance',insuranceController::class);

Route::resource('Ambulance',AmbulanceController::class);
//route for patients
Route::resource('Patients',PatientController::class);
// single Invoices started
Route::view('/single_invoices','livewire.single-invoices.index')->name('single_invoices');
Route::view('/prit_single_invoices','livewire.single-invoices.print')->name('print_single_invoices');
// single Invoices Ended
Route::resource('Receipt',ReceptAcountController::class);
Route::resource('Payment',PaymentAcountController::class);


#############################Start RayEmploy ########################
Route::resource('ray_employee',RayEmployController::class);
Route::resource('laboratorie_employee',LaboratoryEmployeeController::class);
#############################Start RayEmploy ########################

#############################Start group invoices ########################
Route::view('/group_invoices','livewire.group-invoices.index')->name('group_invoices');
Route::view('/group_Print_single_invoices','livewire.group-invoices.print')->name('group_Print_single_invoices');
#############################End group invoices ########################

});

            ###########################End Dashbord Admin Auth ###########################################


            require __DIR__.'/auth.php';
    });


    Storage::disk('Upload_image');
// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

