<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\field;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class FieldController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public    function __construct()
    {

        $this->tableName="field";
        $this->className="\App\\field";

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($content){


        $model= field::where("category_id", $content)->get();


        return view("admin.field.index")->with([
            "model"=>$model
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.{$this->tableName}.add-edit")
            ->with([
                "model"=>null,
                "action"=> "/{$this->tableName}/store",

            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            "title"=> "required",
            "image"=>"required|mimes:jpeg,bmg,png|max:2000",

        ]);

        try
        {

            if ($request->has("img_url")) {
                $request->file("img_url")->store("/upload/$this->tableName");
                $filename = $request->file("img_url")->hashName();
                $image = "/upload/{$this->tableName}/" . $filename;
            } else {
                $image = "";
            }

            $this->className::create([
                "category_id"=> $request->input("category_id"),
                "image" => $image,
                "title" => $request->input("title"),
                "excerpt" => $request->input("excerpt"),
                "body" => $request->input("body"),
                "meta_description" => $request->input("meta_description"),
                "meta_keyword" => $request->input("meta_keyword"),


            ]);

            return redirect("/admin/{$this->tableName}/".$request->input("category_id"))->with("success", "Ekleme İşlemi Başarılı");
        }
        catch (\Exception $e)
        {
            // return back()->with("success", "Ekleme İşlemi Başarısız. Hata: ".$e->getMessage());
            echo $e->getMessage();

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\affiliate  $affiliate
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\affiliate  $affiliate
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //



        $category=Category::where("id", $id)->first();


        return view("admin.{$this->tableName}.add-edit")
            ->with(["model"=> $category->field,
                "category"=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\affiliate  $affiliate
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Field $field)
    {
        try {



            $field->fill([

                "title" => $request->input("title"),
                "category_id"=> $request->input("category_id"),
                "excerpt" => $request->input("excerpt"),
                "body" => $request->input("body"),
                "name" => $request->input("name"),
                "defination" => $request->input("defination"),
                "description" => $request->input("description"),
                "comment" => $request->input("comment"),
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
                "file_url"=>  $request->input("file_url"),
                "name_label" => $request->input("name_label"),
                "defination_label" => $request->input("defination_label"),
                "description_label" => $request->input("description_label"),
                "comment_label" => $request->input("comment_label"),
                "img_url" => $request->input("img_url"),
                "link_url" => $request->input("link_url"),
                "excerpt_label" => $request->input("excerpt_label"),
                "body_label" => $request->input("body_label"),
                "img_url_label" => $request->input("img_url_label"),
                "link_url_label" => $request->input("link_url_label"),
                "title_label" => $request->input("title_label"),
                "tfield1_label"=>  $request->input("tfield1_label"),
                "tfield2_label"=>  $request->input("tfield2_label"),
                "tfield3_label"=>  $request->input("tfield3_label"),
                "tfield4_label"=>  $request->input("tfield4_label"),
                "tfield5_label"=>  $request->input("tfield5_label"),
                "tfield6_label"=>  $request->input("tfield6_label"),
                "tfield7_label"=>  $request->input("tfield7_label"),
                "tfield8_label"=>  $request->input("tfield8_label"),
                "tfield9_label"=>  $request->input("tfield9_label"),
                "tfield10_label"=>  $request->input("tfield10_label"),
                "file_url_label"=>  $request->input("file_url_label"),
                "galery" => $request->input("galery"),
                "content" => $request->input("content"),
                "meta_description" => $request->input("meta_description"),
                "meta_keyword" => $request->input("meta_keyword"),


            ])->save();




            return back()->with("success", "Güncelleme İşlemi Başarılı");
        }
        catch (\Exception $e)
        {


            echo $e->getMessage();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\affiliate  $affiliate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = $this->className::where("id", $id)->first();

        try {


            $model->delete();
            Storage::delete($model->image);
            return redirect("/{$this->tableName}")->with("success", "Silme İşlemi Başarılı. ");
        }
        catch (\Exception $e){

            return redirect("/{$this->tableName}")->with("error", "Silme İşlemi Başarısız. ".$e->getMessage());
        }


    }



}
