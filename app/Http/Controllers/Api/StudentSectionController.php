<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentSection;
use Illuminate\Support\Carbon;

class StudentSectionController extends Controller
{
    public function ReadSection(){
          
        $section_name = StudentSection::latest()->get();
        return response()->json($section_name);      
   }
   public function StoreSection(Request $request){

       $request->validate([
              'class_id' => 'required',
              'section_name' => 'required|unique:student_sections|max:30',
       ]);
         
       StudentSection::insert([
             'class_id' => $request->class_id,
             'section_name' => $request->section_name,
             'created_at' => Carbon::now(),
       ]);
       return response('['.$request->section_name.'] Student Section was created Successfully!');      
  }
  public function EditSection($id){

       $find_section = StudentSection::findOrfail($id);
       return response()->json($find_section);           
  }
  public function UpdateSection(Request $request, $id){

       $find_section = StudentSection::findOrfail($id);
       StudentSection::findOrfail($id)->Update([
            'class_id' => $request->class_id,
            'section_name' => $request->section_name,
       ]);
       return response('[Class Id: '.$find_section['class_id'].'] Updated to: ['. $request->class_id.'] Successfully! AND '.
                       '[Student Section: '.$find_section['section_name'].'] Updated to: ['. $request->section_name.'] Successfully!');      
  }
  public function DeleteSection($id){

       $find_section = StudentSection::findOrfail($id);
       StudentSection::findOrfail($id)->delete();
       return response('[Section: '.$find_section['section_name'].'] was successfully deleted');           
  }
}
