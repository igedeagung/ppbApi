<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Photo;
use Webpatser\Uuid\Uuid;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        $filename=$request->input('filename');

        $file = $request->file('photo');

        $namafile = Uuid::generate(4)->string.'.'.$file->getClientOriginalExtension();
        
        $path = public_path().'/image';
        $file->move($path,$namafile);
        
        $photo=Photo::create([
            'name' => $filename,
            'path'=>$namafile,
            'image'=>base64_encode(file_get_contents(public_path().'\/image/'.$namafile))
        ]);
        $result=[
            'hasil'=>$filename
        ];
        return response()->json($result, 201);
    }
    public function show($filename)
    {
        $data = Photo::select('id', 'name', 'path', 'image')->where('name', $filename)->first();

        return response()->json($data, 200);
    }
    public function showTest()
    {
        $data = Photo::select('id', 'name', 'path')->where('name', "Testing")->first();
        // $data->image = base64_encode($data->image);
        
        return response()->json($data, 200);
    }
    public function getAll(){
        $data=Photo::get();
        return response()->json($data, 200);
    }
}
