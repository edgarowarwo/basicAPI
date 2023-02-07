<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function ReadStudent(){
          
        $students = Student::latest()->get();
        return response()->json($students);      
   }
   public function StoreStudent(Request $request){

       $request->validate([
              'name' => 'required|unique:students|max:30',
              'email' => 'required|unique:students|max:30',              
       ]);
         
       Student::insert([
             'class_id' => $request->class_id,
             'section_id' => $request->section_id,
             'name' => $request->name,
             'address' => $request->address,
             'phone' => $request->phone,
             'email' => $request->email,
             'password' => Hash::make($request->password),
             'photo' => $request->photo,
             'gender' => $request->gender,
             'created_at' => Carbon::now(),
       ]);
       return response('[Student: '.$request->name.'] was created Successfully!');      
  }
  public function EditStudent($id){

       $find_student = Student::findOrfail($id);
       return response()->json($find_student);           
  }
  public function UpdateStudent(Request $request, $id){

       $find_student = Student::findOrfail($id);
       Student::findOrfail($id)->Update([
            'class_id' => $request->class_id,
            'section_id' => $request->section_id,
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $request->photo,
            'gender' => $request->gender,
       ]);
       return response('Student Successfully Updated!');      
  }
  public function DeleteStudent($id){

       $find_student = Student::findOrfail($id);
       Student::findOrfail($id)->delete();
       return response('[Student: '.$find_student['name'].'] was successfully deleted');           
  }
}
