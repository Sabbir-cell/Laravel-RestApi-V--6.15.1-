<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Subject;
class SubjectController extends Controller
{
    
    public function index()
    {
        $subject=Subject::all();
        return response()->json($subject);


    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'class_id' => 'required',
        'subject_name' => 'required|unique:subjects|max:255',
        'subject_code' => 'required|unique:subjects|max:255',
        ]);
        $subject=Subject::create($request->all());
        return response()->json($subject);
        //return response('Inserted Successfully');
    }

   
    public function show($id)
    {
        $subject=Subject::findorfail($id);
        return response()->json($subject);
    }

    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
        'class_id' => 'required',
        'subject_name' => 'required|unique:subjects|max:255',
        'subject_code' => 'required|unique:subjects|max:255',
        ]);

        $subject=Subject::findorfail($id);
        $subject->update($request->all());
        return response('Successfully updated');



    }

    
    public function destroy($id)
    {
        $subject=Subject::find($id);
        $delete = $subject->delete();
        return response()->json($delete);
    }
}
