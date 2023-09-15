<?php

namespace App\Http\Controllers;

use App\Models\ImageModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class FileHandleController extends Controller
{
    //
    public function uploadImage(Request $request){
       $validate = request()->validate([
        'images' => ['nullable'],
       ]);
       $input = $request->all();
       
       if(isset($input['images'])){
            $link = [];
            foreach($input['images'] as $key=>$value){
                $image = $input['images'][$key];
                $type = ['png', 'jpg', 'jpeg', 'gif'];
                $imageExtension = $input['images'][$key]->extension();
                if(!in_array($imageExtension, $type)){
                    return view('practice')->with(['alert' => 'Định dạng ảnh không hợp lệ']);
                }
                $imageName = $input['images'][$key]->getClientOriginalName();
                if(file_exists("public/source/images/".$imageName)){
                    $imageName = Str::random(4)."_".$imageName;
                }
                $image->move("public/source/images", $imageName);
                $direction = asset("public/source/images");
                $link[] = $direction . "/" . $imageName;
            }
            ImageModel::create([
                'link' => json_encode($link),
            ]);
       }
       return response()->json([
                'message' => 'success',
                'data' => $link,
                'status' => 200
            ]);
    }
    public function listImage($id){
        $images = ImageModel::get()
        ->transform(function($data){
           return  [
                'link' => json_decode($data->link)
            ];
        });
        // dd($images[0]['link']);
        return view('practice')->with(['images' => $images]);
    }
}
