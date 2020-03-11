<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use App\Model\Class;
use DB;
class ClassController extends Controller
{
    
    public function index()
    {
        //return Class::all();
        $class = DB::table('classes')->get();
        return response()->json($class);
    }

    
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'class_name' => 'required|unique:classes|max:255',
        ]);
        $data = array();
        $data['class_name'] = $request->class_name;
        DB::table('classes')->insert($data);
        return response('ok');
    }

   
    public function show($id)
    {
        $show = DB::table('classes')->where('id',$id)->first();
        return response()->json($show);


    }

    
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
        'class_name' => 'required|unique:classes|max:255',
        ]);

        $data = array();
        $data['class_name'] = $request->class_name;
        DB::table('classes')->where('id',$id)->update($data);
        return response('Successfully Updated');
    }

    
    public function destroy($id)
    {
        DB::table('classes')->where('id',$id)->delete();
        return response('Deleted Successfully');
    }
}
