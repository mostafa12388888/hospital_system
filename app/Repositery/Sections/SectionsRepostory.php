<?php
namespace App\Repositery\Sections;

use App\Interfaces\Sections\SectionRepostoryInterface;
use App\Models\Section;
use GuzzleHttp\Psr7\Request;


class SectionsRepostory implements SectionRepostoryInterface {
    public function index(){
        $section=Section::all();
return view('Dashbord.Sections.index',compact('section'));
    }
    public function store( $request){
Section::create([
    'name'=>$request->input('name'),
    'description'=>$request->input('description'),
]);
session()->flash('add');
return redirect()->route('Sections_admin.index');
    }
    public function Update( $request){
        Section::findOrfail($request->id)->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
        ]);
        session()->flash('edit');
        return redirect()->route('Sections_admin.index');
    }
    public function destroy($request){
       
            Section::findOrfail($request->id)->delete();
            session()->flash('delete');
            return redirect()->route('Sections_admin.index');
    }
    public function show($id){
$Doctors=Section::findOrfail($id)->docutors;
$section=Section::findOrfail($id);
// return $Doctors;
return view('Dashbord.Sections.show_dectionRelationSection',compact('Doctors','section'));
    }
}