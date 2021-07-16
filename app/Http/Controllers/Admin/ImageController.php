<?php

namespace App\Http\Controllers\Admin;

use App\Models\Content;
use App\Image;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public    function __construct()
    {

        $this->tableName="Image";
        $this->className="\App\\Image";

    }
    //
    public  function index(Content $content){

        $images=$content->images()->get();
        return view("Admin.Image.add-edit")->with(["content"=>$content, "images"=> $images]);
    }
    public  function store(Content $content, Request $request){

        try {

            if ($request->has("file")) {
                $request->file("file")->store("/upload/$this->tableName", "");
                $filename = $request->file("file")->hashName();
                $image = "/upload/{$this->tableName}/" . $filename;
            } else {
                $image = "";
            }

            Image::create([
                "image" => $image,
                "content_id" => $content->id
            ]);

        }
        catch (\Exception $e)
        {
            echo "hatalı".$e->getMessage();
        }
    }
    public function destroy($id)
    {
        $model = $this->className::where("id", $id)->first();

        try {
            $model->delete();
            Storage::delete($model->image);
            return back()->with("success", "Silme İşlemi Başarılı ");
        }
        catch (\Exception $e){

            return back()->with("error", "Silme İşlemi Başarısız. ".$e->getMessage());
        }

    }
    public function uploadImage(Request $request){

        try {

            if ($request->has("file")) {
                $request->file("file")->store("/upload/content/", "");
                $filename = $request->file("file")->hashName();
                $image = "/upload/content/" . $filename;
            } else {
                $image = "";
            }

            Image::create([
                "image" => $image,
                "content_id" =>$request->content_id,
                "title"=> $request->file("file")->getClientOriginalName(),
            ]);

        }
        catch (\Exception $e)
        {
            echo "hatalı".$e->getMessage();
        }

    }
}
