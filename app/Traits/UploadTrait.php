<?php
namespace App\Traits;

use App\Models\Image;
use GuzzleHttp\Psr7\Request;
use Illuminate\Support\Facades\Storage;

trait UploadTrait{
    public function veryfiedandStoreImage( $request,$inputname,$foldername,$disk,$imagable_id,$imagable_type){
if($request->hasFile($inputname)){
if(!$request->file($inputname)->isValid()){
    flash('Invalid Image!')->error()->important();
    return redirect()->back()->withInput();
}
$photo=$request->file($inputname);
$name=\Str::slug($request->input('name'));
$fileName=$name.'.'.$photo->getClientOriginalExtension();


//store in detabase
$image=new Image();
$image->fileame=$fileName;
$image->imagable_id=$imagable_id;
$image->imagable_type=$imagable_type;
$image->save();
return $request->file($inputname)->storeAs($foldername,$fileName,$disk);
}
return 0;
    }
    public function veryfiedandStoreImageForeach($fileNameforeach, $foldername,$disk,$imagable_id,$imagable_type){


        //store
        $image=new Image();
        $image->fileame=$fileNameforeach->GetClientOriginalName();
        $image->imagable_id=$imagable_id;
        $image->imagable_type=$imagable_type;
        $image->save();
        //store end
        return $fileNameforeach->storeAs($foldername,$fileNameforeach->GetClientOriginalName(),$disk);


    }


    public function DeleteAttachment($disk,$path,$id,$fileName){
Storage::disk($disk)->delete($path);
Image::Where('imagable_id',$id)->delete();
    }
   

}