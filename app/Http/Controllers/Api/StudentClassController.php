<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use Illuminate\Support\Carbon;

class StudentClassController extends Controller
{
    public function ReadClass(){
          
         $class_name = StudentClass::latest()->get();
         return response()->json($class_name);      
    }
    public function StoreClass(Request $request){

        $request->validate([
               'class_name' => 'required|unique:student_classes|max:30'
        ]);
          
        StudentClass::insert([
              'class_name' => $request->class_name,
              'created_at' => Carbon::now(),
        ]);
        return response('[Student Class: '.$request->class_name.'] was created Successfully!');      
   }
   public function EditClass($id){

        $find_class = StudentClass::findOrfail($id);
        return response()->json($find_class);           
   }
   public function UpdateClass(Request $request, $id){

        $find_class = StudentClass::findOrfail($id);
        StudentClass::findOrfail($id)->Update([
            'class_name' => $request->class_name,
        ]);
        return response('[Student Class: '.$find_class['class_name'].'] Updated to: ['. $request->class_name.'] Successfully!');      
   }
   public function DeleteClass($id){

        $find_class = StudentClass::findOrfail($id);
        StudentClass::findOrfail($id)->delete();
        return response('[Class: '.$find_class['class_name'].'] was successfully deleted');           
   }
}
