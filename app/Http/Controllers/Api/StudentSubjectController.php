<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StudentClass;
use App\Models\StudentSubject;

class StudentSubjectController extends Controller
{
    public function ReadSubject(){
          
        $subject_name = StudentSubject::latest()->get();
        return response()->json($subject_name);      
   }
   public function StoreSubject(Request $request){

       $request->validate([
              'class_id' => 'required',
              'subject_name' => 'required|unique:student_subjects|max:30',
       ]);
         
       StudentSubject::insert([
             'class_id' => $request->class_id,
             'subject_name' => $request->subject_name,
             'subject_code' => $request->subject_code,
       ]);
       return response('['.$request->subject_name.'] Student Subject was created Successfully!');      
  }
  public function EditSubject($id){

       $find_subject = StudentSubject::findOrfail($id);
       return response()->json($find_subject);           
  }
  public function UpdateSubject(Request $request, $id){

       $find_subject = StudentSubject::findOrfail($id);
       StudentSubject::findOrfail($id)->Update([
            'class_id' => $request->class_id,
            'subject_name' => $request->subject_name,
            'subject_code' => $request->subject_code,
       ]);
       return response('[Class Id: '.$find_subject['class_id'].'] Updated to: ['. $request->class_id.'] Successfully! AND '.
                       '[Student Subject: '.$find_subject['subject_name'].'] Updated to: ['. $request->subject_name.'] Successfully! AND '.
                       '[Student Code: '.$find_subject['subject_code'].'] Updated to: ['. $request->subject_code.'] Successfully!');      
  }
  public function DeleteSubject($id){

       $find_subject = StudentSubject::findOrfail($id);
       StudentSubject::findOrfail($id)->delete();
       return response('[Subject: '.$find_subject['subject_name'].'] was successfully deleted');           
  }
}
