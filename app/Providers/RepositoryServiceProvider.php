<?php

namespace App\Providers;

use App\Interfaces\Ambulance\AmbulanceInterface;
use App\Interfaces\Dashbord_Ray_employee\invoicesRepostoryInterface as Dashbord_Ray_employeeInvoicesRepostoryInterface;
use App\Interfaces\dectors\dectorsRepostoryInterface;
use App\Interfaces\doctor_dashbord\DignocesRepositoryInterface;
use App\Interfaces\doctor_dashbord\invoicesRepostoryInterface;
use App\Interfaces\doctor_dashbord\LaboratoryRepostoryInterface;
use App\Interfaces\doctor_dashbord\RaysRepostoryInterFace;
use App\Interfaces\insurance\insuranceRepostoryInterface;
use App\Interfaces\invoices\paymentAcountRepostoryInterface;
use App\Interfaces\patient\patiantIntRepostoryerface;
use App\Interfaces\Sections\SectionRepostoryInterface;
use App\Interfaces\Services\ServicesRepostoryInterface;
use App\Repositery\Ambulance\AmbulanceRepository;
use App\Repositery\dectors\dectorsRepostory;
use App\Repositery\insurance\insuranceRepostory;
use App\Repositery\patient\patiantIntRepostory;
use App\Repositery\Sections\SectionsRepostory;
use App\Repositery\Services\ServicesRepostory;

use Illuminate\Support\ServiceProvider;
use App\Interfaces\invoices\ReceiptRepostoryInterfaces;
use App\Interfaces\LaboratoryEmployee\LaboratoryEmployeeRepostoryInterfaces;
use App\Interfaces\LaboratoryEmployee_Dashbord\laboratorieEmployeRepostoryInterface;
use App\Interfaces\patient\patientDeatilsRepostoryInterFaace;
use App\Interfaces\RayEmployee\RayEmployeeRepostoryInterfaces;
use App\Repositery\Dashbord_Ray_employee\invoicesRepostory as Dashbord_Ray_employeeInvoicesRepostory;
use App\Repositery\doctor_dashbord\DignocesRepository;
use App\Repositery\doctor_dashbord\invoicesRepostory;
use App\Repositery\doctor_dashbord\LaboratoryRepostory;
use App\Repositery\doctor_dashbord\RaysRepostory;
use App\Repositery\invoices\paymentAcountRepostory;
use App\Repositery\invoices\ReceiptRepostory;
use App\Repositery\LaboratoryEmployee\LaboratoryEmployeeRepostory;
use App\Repositery\LaboratoryEmployee_Dashbord\laboratorieEmployeRepostory;
use App\Repositery\patient\patientDeatilsRepostory;
use App\Repositery\RayEmployee\RayEmployeeRepostory;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
         //
         $this->app->bind(SectionRepostoryInterface::class,SectionsRepostory::class);
         $this->app->bind(dectorsRepostoryInterface::class,dectorsRepostory::class);
         $this->app->bind(ServicesRepostoryInterface::class,ServicesRepostory::class);
         $this->app->bind(insuranceRepostoryInterface::class,insuranceRepostory::class);
         $this->app->bind(AmbulanceInterface::class,AmbulanceRepository::class);
         $this->app->bind(patiantIntRepostoryerface::class,patiantIntRepostory::class);
         $this->app->bind(ReceiptRepostoryInterfaces::class,ReceiptRepostory::class);
         $this->app->bind(paymentAcountRepostoryInterface::class,paymentAcountRepostory::class);
         $this->app->bind(invoicesRepostoryInterface::class,invoicesRepostory::class);
         $this->app->bind(DignocesRepositoryInterface::class,DignocesRepository::class);
         $this->app->bind(RaysRepostoryInterFace::class,RaysRepostory::class);
         $this->app->bind(LaboratoryRepostoryInterface::class,LaboratoryRepostory::class);
        
         $this->app->bind(RayEmployeeRepostoryInterfaces::class,RayEmployeeRepostory::class);

         // Ray Employee 
         $this->app->bind(Dashbord_Ray_employeeInvoicesRepostoryInterface::class,Dashbord_Ray_employeeInvoicesRepostory::class);
         // Ray labortory 
         $this->app->bind(LaboratoryEmployeeRepostoryInterfaces::class,LaboratoryEmployeeRepostory::class);
        
    //patient
    $this->app->bind(patientDeatilsRepostoryInterFaace::class,patientDeatilsRepostory::class);
        }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
