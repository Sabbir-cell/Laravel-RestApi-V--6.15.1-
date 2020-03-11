<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Student;
use DB;
class StudentController extends Controller
{
  
    public function index()
    {
        $student=Student::all(); //eloquent
        return response()->json($student);
    }

    public function create()
    {
        //
    }
   
    public function store(Request $request)
    {
        $student=Student::create($request->all());

         if($student) {
           if(isset($request->photo)){
               $fileInfo=fileInfo($request->photo);
               $filename=$student->id.'-'.date('YmdHis').'-'.rand().'-'.rand().'.'.$fileInfo['extension'];
               $upload=fileUpload($request->photo,'students',$filename);
               if($upload){
                   $student->photo=$filename;
                   $student->save();
               }
           }
       }

       return response()->json($student);


    }

    
    public function show($id)
    {
        $student=Student::findorfail($id);
        return response()->json($student);
    }

    
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        return $request->all();
        $student=Student::find($id);
        $student->fill($request->all());
        $studentFile = $student->file;
        
        return response()->json($student);
        if(isset($student)) {
            if(isset($request->photo)){
                if($studentFile != "" && file_exists(public_path('students/').$studentFile)){
                   unlink(public_path('students/').$studentFile);
                }
               $fileInfo=fileInfo($request->photo);
               $filename = $id.'-'.date('YmdHis').'-'.rand().'-'.rand().'.'.$fileInfo['extension'];
               $upload=fileUpload($request->photo,'students',$filename);
               if($upload){
                   $student->photo=$filename;
                   $student->save();
               }
           }
           
       }
        return response()->json($student);

        return response('Successfully updated');

        // $data=array();
        // $data['class_id']=$request->class_id;
        // $data['section_id']=$request->section_id;
        // $data['class_id']=$request->class_id;
        // $data['name']=$request->name;
        // $data['phone']=$request->phone;
        // $data['email']=$request->email;
        // $data['password']=$request->password;
        // $data['photo']=$request->photo;
        // $data['address']=$request->address;
        // $data['gender']=$request->gender;
        // DB::table('students')->where('id',$id)->update($data);
        // return response('Updated');   
    }

    
    public function destroy($id)
    {
        // $student=Student::find($id);
        // $delete = $student->delete();
        // return response()->json($delete);

        $img=DB::table('students')->find($id);
        if($img->photo != '' && file_exists(public_path('students/').$img->photo)){
            unlink(public_path('students/').$img->photo); //delete form folder
        }
        DB::table('students')->where('id',$id)->delete();
        return response('Deleted Successfully');
    }
}
