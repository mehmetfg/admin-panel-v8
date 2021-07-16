<?php
/**
 * Created by PhpStorm.
 * User: Mehmet F. GCGN
 * Date: 8.02.2019
 * Time: 16:00
 */
use  App\Models\Category;
use App\Models\Session;
use  Carbon\Carbon;
use App\Models\Content;
use App\Models\Language;

use \Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

function get_language_list(){

    return Language::all();
}
function set_language(){
    if(!session("language")) {
        session([
            "language" => Language::where("definition", "tr")->first()
        ]);
    }
}

function get_category_list_type($type){

        return Category::where(["isActive"=> 1,
                "type"=> $type])->get();

    }

    function get_category_list($orderBy="Asc"){

        return Category::select("name", "id")->where(["isActive"=> 1,
            "type"=> 2])->whereNotIn("id",[1,173,8])->orderBy("name",$orderBy)->get();
    }

    function get_subcategory_list($category){

        return Category::where(["isActive"=> 1,
            "category_id"=> $category]);

    }
function get_content_list($category_id){
    return Content::where(["isActive"=> 1, "category_id"=> $category_id])->get();
}
function get_menu_list($categori_id){

    $data=DB::table("contents")->select("id, title")->where(array("category_id"=>$categori_id,"isActive"=>1))->get();
    return $data;
}
function get_sidebar_menu(){

    return Category::where("type",2)->get();
}

function get_content_random($limit, $categoryId=2){

    return Content::where("category_id", $categoryId)->get()->random($limit);
}

function getContentLanguage($contentId, $lang){

    return Content::where("language_content_id", $contentId)->where("language_id", $lang)->first();
}


function get_content($id){

    return Content::where(["id"=> $id])->first();

}


function get_category_name($id){

    $name=Category::where("id", $id)->first();
    if($name) {

        return $name->name;
    }else
        return "--";
}
function get_content_name($id){

    $ok=Content::where("id",$id)->first();
    if($ok){
        return $ok->title;

    }else
        return "--";
}

function set_site_info(){
    $info=DB::table("users")->where("type", 2)->first();

    return session(array("info"=> $info));
}
function get_first_user(){
    $info=DB::table("users")->where("type", 2)->first();

    return $info;
}

function get_homepage($model, $category_id){

    return $model->where("category_id", $category_id)->first();
}


function set_sabitler(){
    $ok=DB::table("categories")->get();
    foreach ($ok as $item) {
        define("$item->variable", $item->id);
    }

}


function strToUrl( $str ) {
    $turkish = array("ı", "ğ", "ü", "ş", "ö", "ç", "İ", "Ğ", "Ü", "Ş", "Ö", "Ç");
    $english = array("i", "g", "u", "s", "o", "c", "I", "G", "U", "S", "O", "C");

    $str = str_replace($turkish, $english, $str);

    return Str::slug($str, "-");
}
function strToVariable( $str ) {
    $turkish = array("ı", "ğ", "ü", "ş", "ö", "ç", "İ", "Ğ", "Ü", "Ş", "Ö", "Ç");
    $english = array("i", "g", "u", "s", "o", "c", "I", "G", "U", "S", "O", "C");

    $str = str_replace($turkish, $english, $str);

    return Str::slug($str, "_");
}





function set_list_link($category,$category_name=null){

   $link=config('app.name') //uygulama adı
        ."-".str_slug($category_name) //varsa üst kategori adı * burası slug field eklendikten sonra değişecek
        ."-".str_slug($category->name)//alt kategorinin dı
        .",".$category->id;//renovar-mobilya-kanepeler,1
    return route("liste", ["slug"=>$link]);

}


function set_detail_link($content,$category_list=null){

    $link = config('app.name')  //uygulama adı
        ."-".str_slug($category_list)//varsa üst kategori adı * burası slug field eklendikten sonra değişecek
        ."-".str_slug($content->title)// ürün adı
        .",".$content->id;// renovar-mobilya-kanepe-siyah-deneyim-kanepe,1
    return route("detay", ["slug"=> $link]);

}
function set_custom_link($link,$content){
    return $link.config('app.name')."-".str_slug($content->category->name)."-".str_slug($content->title).",".$content->id;

}


if (! function_exists('online_visitor')) {
    function online_visitor()
    {


        return Session::whereRaw("TIMESTAMPDIFF(MINUTE,last_activity,NOW()) <= 10")
            ->count();

    }
}

if (! function_exists('per_day_visitor')) {
    function per_day_visitor()
    {


        return Session::whereRaw("TIMESTAMPDIFF(HOUR,last_activity,NOW()) <= 24")
            ->count();

    }
}



if (! function_exists('per_mount_visitor')) {
 function per_mount_visitor()
 {

     return Session::where("last_activity", "<=", Carbon::now())
         ->where("last_activity", "<", Carbon::now()->addMonth(1))
         ->count();

 }
}
    if (! function_exists('per_year_visitor')) {
 function per_year_visitor()
 {

     return Session::where("last_activity", "<=", Carbon::now())
         ->where("last_activity", "<", Carbon::now()->addMonth(1))
         ->count();

 }
}
