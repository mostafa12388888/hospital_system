<?php

namespace App\Http\Livewire\Appointments;

use App\Models\Appointment;
use App\Models\Appotment2;
use App\Models\Doctor;
use App\Models\Section;
use Livewire\Component;

class Create extends Component
{
    public $message=false,$message2=false,$doctors;public $section,$doctor,$notes,$phone,$name,$email,$appointment_patient;
    public function store(){
        $appointment_info = Appotment2::where('doctor_id',$this->doctor)->where('appointment_patient', $this->appointment_patient)->where('type','مؤكد')->count();
        $number_doctor=Doctor::findOrFail($this->doctor)->Number_Of_STatmets;
        if($appointment_info==$number_doctor){
            $this->message2=true;
            return back();
        }
        Appotment2::create([
            'name'=>$this->name,
            'notes'=>$this->notes,
            'phone'=>$this->phone,
            'email'=>$this->email,
            'section_id'=>$this->section,
            'doctor_id'=>$this->doctor,
            'appointment_patient'=>$this->appointment_patient,
        ]);
        $this->message=true;
    }
    public function mount(){
        // $this->sections=Section::get();
        $this->doctors=collect();
    }
    public function render()
    {
        return view('livewire.appointments.create',['sections'=>Section::get()])->extends('Dashbord.layouts.master');
    }
    public function updatedsection($section_id){
        $this->doctors=Doctor::where('section_id',$section_id)->get();
    }
}
