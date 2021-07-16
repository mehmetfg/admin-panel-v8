<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Models\Content;
use App\Models\Field;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view("admin.category.index")
            ->with("model", Category::paginate(10));
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin/category.add-edit")->with([
            "model"=>null ,
            "category"=> Category::where("type", 2)->get(),
           ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Category $category)
    {


        $this->validateControll();


        try {
            //eğer daha önce aynı isimden kayıt yoksa dikkate alı
            if (Category::where('name', '=', Input::get('name'))->exists()) {
                return back()->with("error", "Bu Kategori kayıtlıdır");


            }
            else {
                if ($request->has("img_url")) {
                    $request->file("img_url")->store("/upload/catagory");
                    $imagename = $request->file("img_url")->hashName();
                    $image = "/upload/catagory/" . $imagename;
                } else {
                    $image = "";
                }


                $id = $category->create([
                    "category_id"=> $request->category_id,
                    "name" => $request->input("name"),
                    "type"=> $request->type,
                    "variable" => strToVariable($request->input("name")),
                    "icon" => $request->input("icon"),
                    "img_url"=> $image

                ])->id;

               // $field=Field::where("category_id", "177")->first(); id aldırma
                $field=Field::latest("id")->first();
                if($field) {
                    Field::create([
                        "category_id" => $id,
                        "title" => $field->title,

                        "excerpt" => $field->excerpt,
                        "body" => $field->body,
                        "name" => $field->name,
                        "defination" => $field->defination,
                        "description" => $field->description,
                        "comment" => $field->comment,
                        "name_label" => $field->name_label,
                        "defination_label" => $field->defination_label,
                        "description_label" => $field->description_label,
                        "comment_label" => $field->comment_label,
                        "img_url" => $field->img_url,
                        "link_url" => $field->link_url,
                        "file_url" => $field->file_url,
                        "excerpt_label" => $field->excerpt_label,
                        "body_label" => $field->body_label,
                        "img_url_label" => $field->img_url_label,
                        "link_url_label" => $field->link_url_label,
                        "file_url_label" => $field->file_url_label,
                        "title_label" => $field->title_label,
                        "tfield1" => $field->tfield1,
                        "tfield2" => $field->tfield2,
                        "tfield3" => $field->tfield3,
                        "tfield4" => $field->tfield4,
                        "tfield5" => $field->tfield5,
                        "tfield6" => $field->tfield6,
                        "tfield7" => $field->tfield7,
                        "tfield8" => $field->tfield8,
                        "tfield9" => $field->tfield9,
                        "tfield10" => $field->tfield10,
                        "tfield1_label" => $field->tfield1_label,
                        "tfield2_label" => $field->tfield2_label,
                        "tfield3_label" => $field->tfield3_label,
                        "tfield4_label" => $field->tfield4_label,
                        "tfield5_label" => $field->tfield5_label,
                        "tfield6_label" => $field->tfield6_label,
                        "tfield7_label" => $field->tfield7_label,
                        "tfield8_label" => $field->tfield8_label,
                        "tfield9_label" => $field->tfield9_label,
                        "tfield10_label" => $field->tfield10_label,
                        "galery" => $field->galery,
                        "meta_description" => $field->meta_description,
                        "meta_keyword" => $field->meta_keyword
                    ]);
                }else {

                    Field::create([
                        "category_id" => $id,
                    ]);
                }

                if($request->type=="1") {
                    foreach (get_language_list() as $item) {
                        Content::create([
                            "category_id" => $id,
                            "title" => "Deneme Kaydı",
                            "language_id"=> $item->id,
                            "isActive" => 1]);
                    }
                }
                return redirect("/admin/field/$id")->with("success", "Ekleme İşlemi Başarılı");
            }
            }
        catch (\Exception $e)
        {
            return back()->with("error", "Ekleme İşlemi Başarısız. Hata:".$e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $Category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {

        return view("admin/category.add-edit")->with([
            "model"=> $category
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //

        $this->validateControll();
        $name=$request->input("name");
        try
        {

            if ($request->has("img_url")) {
                $request->file("img_url")->store("/upload/catagory");
                $filename = $request->file("img_url")->hashName();
                $image = "/upload/catagory/" . $filename;
            } else {
                $image = $category->img_url?$category->img_url:'';
            }
            $category->fill([
                "name"=> $name,
                "variable"=>strToVariable($name),
                "icon"=> $request->input("icon"),
                "img_url"=> $image
            ])->save();




              return redirect("/admin/category/$request->type")->with("success", "Güncelleme İşlemi Başarılı ");;
        }
        catch (\Exception $e)
        {

            return back()->with("error", "Güncelleme İşlemi Başarısız. ".$e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $Category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        try {

                if(!is_null($category->field)) $category->field->delete();

                $category->delete();

            return back()->with("success", "Silme İşlemi Başarılı ");
        }
        catch (\Exception $e){

            return back()->with("error", "Silme İşlemi Başarısız. ".$e->getMessage());
        }

    }


    public function isActiveSetter(Request $request)
    {
        $id=$request->id;
        $set=intval($request->isActive);
        $category= Category::findOrFail($id);

        $category->isActive=$set;
        $category->save();
        echo $set;

    }

    function validateControll(){

        request()->validate([
            "name"=> "required",
        ]);

    }
}
