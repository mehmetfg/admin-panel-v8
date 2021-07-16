<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Content;
use App\Field;
use App\Image;
use PhpParser\CodeTestAbstract;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ContentController extends Controller
{



    public function index(){


        return view("admin.content.index")->with([
            "category"=> Category::first(),
            "contents"=> Content::where("category_id", 169)->get()
        ]);
    }
    public function subIndex(Content $content){



        return view("admin.content.sub.index")->with("content", $content);

    }
    public function langIndex(Content $content){



        return view("admin.content.language.index")->with("content", $content);

    }
    public function homeIndex()
    {
        //
        $category=Category::where(["type"=>1])->get();


        return view("admin.content.home.index")
            ->with(["category"=> $category
            ]);
    }

    public function create(Category $category)
    {
        return view("admin.content.add-edit")
            ->with([
                "model"=>null,
                "field"=> $category->field,

            ]);
    }
    public function subCreate(Content $content)
    {
        $category=Category::where("type", "5")->first();
        return view("admin.content.sub.add-edit")

            ->with([
                "content"=> $content,
                "model"=>null,
                "field"=> Field::where("category_id", $category->id)->first()

            ]);
    }
    public function langCreate(Content $content)
    {

        return view("admin.content.language.add-edit")

            ->with([
                "content"=> $content,
                "model"=>null,
                "field"=> Field::where("category_id", $content->category_id)->first()

            ]);
    }





    public function edit(Content $content)
    {
        //
        return view("admin.content.add-edit")
            ->with([
                    "model"=> $content,
                    "field"=>$content->category->field,

                    ]);
    }
    public function subEdit(Content $content)
    {
        $category=Category::where("type", "5")->first();
        return view("admin.content.sub.add-edit")

            ->with([
                "model"=>$content,
                "field"=> Field::where("category_id", $category->id)->first()

            ]);
    }
    public function langEdit(Content $content)
    {

        return view("admin.content.language.add-edit")

            ->with([
                "model"=>$content,
                "field"=> Field::where("category_id", $content->category_id)->first()

            ]);
    }
    public function homeEdit(Category $category)
    {
        //
        return view("admin.content.add-edit")
            ->with([
                "model"=>Content::where("category_id", $category->id)->first() ,
                "field"=>$category->field,

            ]);
    }


    public function store(Request $request)
    {


        $request->validate([
            "title"=> "required",

        ]);

        try
        {

            if ($request->has("img_url")) {
                $request->file("img_url")->store("/upload/content");
                $imagename = $request->file("img_url")->hashName();
                $image = "/upload/content/" . $imagename;
            } else {
                $image = "";
            }

            if ($request->has("file_url")) {
                $request->file("file_url")->store("/upload/content/file");
                $filename = $request->file("file_url")->hashName();
                $file = "/upload/content/file" . $filename;
            } else {
                $file = "";
            }




            Content::create([
                "language_id"=>$request->input("language_id"),
                "language_content_id"=>$request->input("language_content_id"),
                "content_id"=>$request->input("content_id"),
                "category_id"=> $request->input("category_id"),
                "title" => $request->input("title"),
                "type"=>  $request->input("type"),
                "slug"=> str_slug($request->input("title")),
                "name" => $request->input("name"),
                "defination" => $request->input("defination"),
                "description" => $request->input("description"),
                "comment" => $request->input("comment"),
                "excerpt" => $request->input("excerpt"),
                "body" => $request->input("body"),
                "tfield1"=>  $request->input("tfield1"),
                "tfield2"=>  $request->input("tfield2"),
                "tfield3"=>  $request->input("tfield3"),
                "tfield4"=>  $request->input("tfield4"),
                "tfield5"=>  $request->input("tfield5"),
                "tfield6"=>  $request->input("tfield6"),

                "tfield7"=>  $request->input("tfield7"),
                "tfield8"=>  $request->input("tfield8"),
                "tfield9"=>  $request->input("tfield9"),
                "tfield10"=>  $request->input("tfield10"),
                "file_url"=>  $file,
                "img_url"=> $image,
                "isActive"=> 1,
                "meta_description" => $request->input("meta_description"),
                "meta_keyword" => $request->input("meta_keyword"),


            ]);

            return back()->with("success", "Ekleme İşlemi Başarılı");
        }
        catch (\Exception $e)
        {
            return back()->with("success", "Ekleme İşlemi Başarısız. Hata: ".$e->getMessage());
        }

    }

    public function update(Request $request, Content $content)
    {
        $request->validate([
            "title"=> "required",
            "image"=>"mimes:jpeg,bmg,png,pdf,docx|max:2000",


        ]);



        try {

            if ($request->has("img_url")) {
                $request->file("img_url")->store("/upload/content");
                $filename = $request->file("img_url")->hashName();
                $image = "/upload/content/" . $filename;
            } else {
                if($request->image_status==1){

                    $image = $content->img_url;
                    }else{
                        Storage::delete($content->img_url);
                        $image = "";
                    }

            }
            if ($request->has("file_url")) {
                $request->file("file_url")->store("/upload/content/file");
                $filename = $request->file("file_url")->hashName();
                $file = "/upload/content/file/" . $filename;
            } else {
                $file =$content->file_url;
            }
            $content->fill([

                "img_url" => $image,

                "link_url" => $request->input("link_url"),
                "title" => $request->input("title"),
                "name" => $request->input("name"),
                "defination" => $request->input("defination"),
                "description" => $request->input("description"),
                "comment" => $request->input("comment"),
                "category_id"=> $request->input("category_id"),
                "excerpt" => $request->input("excerpt"),
                "body" => $request->input("body"),
                "tfield1"=>  $request->input("tfield1"),
                "tfield2"=>  $request->input("tfield2"),
                "tfield3"=>  $request->input("tfield3"),
                "tfield4"=>  $request->input("tfield4"),
                "tfield5"=>  $request->input("tfield5"),
                "tfield6"=>  $request->input("tfield6"),
                "tfield7"=>  $request->input("tfield7"),
                "tfield8"=>  $request->input("tfield8"),
                "tfield9"=>  $request->input("tfield9"),
                "tfield10"=>  $request->input("tfield10"),
                "file_url"=>  $file,
                "meta_description" => $request->input("meta_description"),
                "meta_keyword" => $request->input("meta_keyword"),


            ])->save();


                return redirect("/admin/content/".$request->input("category_id"))->with("success", "Güncelleme İşlemi Başarılı");
        }
        catch (\Exception $e)
        {
            return back()->with("error", "Güncelleme İşlemi Başarısız ".$e->getMessage());
        }
    }


    public function destroy(Content $content)
    {




        try {


            $content->delete();
            Storage::delete($content->img_url);
            return back()->with("success", "Silme İşlemi Başarılı. ");
        }
        catch (\Exception $e){

            return back()->with("error", "Silme İşlemi Başarısız. ".$e->getMessage());
        }


    }






    public function isActiveSetter(Request $request, Content $content )
    {
        $content->isActive=$request->isActive;
        $content->save();
        echo  $request->isActive;
    }
    public function statusSetter(Request $request, Content $content )
    {
        $content->status=$request->status;
        $content->save();
        echo  $request->status;
    }
}
