<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Input;

class UserController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){



        $model= User::get();

        return view("admin.user.index")->with([
            "model"=>$model,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $User)
    {



        return view("admin.user.add-edit")
            ->with([
                "model"=>null,

            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user)
    {

        $request->validate([
            //"name"=> "required",

        ]);

        try
        {

            if ($request->has("logo")) {
                $request->file("logo")->store("/upload/$this->tableName");
                $filename = $request->file("logo")->hashName();
                $image = "/upload/{$this->tableName}/" . $filename;
            } else {
                $image = "";
            }

            if (User::where('email', '=', Input::get('email'))->exists()) {
               return back()->with("error", "Bu mail Adresi daha önce Kayıtlıdır");
            } else {
                $user->create([
                    "name" => $request->input("name"),
                    "type" => $request->input("type"),
                    "defination" => $request->input("defination"),
                    "email" => $request->input("email"),
                    "password" => Hash::make($request->input("password")),
                    "phone1" => $request->input("phone1"),
                    "phone2" => $request->input("phone2"),
                    "address" => $request->input("address"),
                    "twitter" => $request->input("twitter"),
                    "youtube" => $request->input("youtube"),
                    "instagram" => $request->input("instagram"),
                    "map" => $request->input("map"),
                    "facebook" => $request->input("facebook"),
                    "aboutUs" => $request->input("aboutus"),
                    "logo" => $image,

                    "meta_description" => $request->input("meta_description"),
                    "meta_keyword" => $request->input("meta_keyword"),


                ]);

                return back()->with("success", "Ekleme İşlemi Başarılı");
            }
        }
        catch (\Exception $e)
        {

          return back()->with("success", "Ekleme İşlemi Başarısız. Hata: ".$e->getMessage());


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
    public function edit(User $user)
    {
        return view("admin.user.add-edit")
            ->with(["model"=> $user]
            );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\affiliate  $affiliate
     * @return \Illuminate\Http\Response
     */
    public  function update(Request $request,User $user){


        try {

            if ($request->hasFile("logo") && $request->has("logo")) {

                //eski fotoğrafı sil
                Storage::delete($user->logo);
                //yerine yenisini upload et
                $request->file("logo")->store("/upload/user");
                $filename = $request->file("logo")->hashName();
                //image alanını upload adresiyle doldur
                $image = "/upload/user/" . $filename;
            } else {
                $image = $user->logo;
            }


            $user->fill([
                "name" => $request->input("name"),
                "defination"=> $request->input("defination"),
                "email" => $request->input("email"),
                "password"=> $user->password,
                "phone1" => $request->input("phone1"),
                "phone2" => $request->input("phone2"),
                "address" => $request->input("address"),
                "twitter" => $request->input("twitter"),
                "youtube" => $request->input("youtube"),
                "instagram" => $request->input("instagram"),
                "map" => $request->input("map"),
                "facebook" => $request->input("facebook"),
                "aboutUs" => $request->input("aboutus"),
                "logo"=>$image,
                "meta_description" => $request->input("meta_description"),
                "meta_keyword" => $request->input("meta_keyword"),



            ])->save();

            if(!is_null($request->input("password")) && $request->input("password")!="") {

                $user->fill([
                    "password" => Hash::make($request->input("password")),
                ])->save();
            }

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
    public function destroy(User $user)
    {

        try {


            $user->delete();
            Storage::delete($user->logo);
            return back()->with("success", "Silme İşlemi Başarılı. ");
        }
        catch (\Exception $e){


            return back()->with("error", "Silme İşlemi Başarısız. ".$e->getMessage());
        }


    }

    public  function  reset(){

        return view("auth.passwords.reset");
    }

    public function isActiveSetter(Request $request,User $user)
    {

        $user->isActive=$request->isActive;
        $user->save();
        echo  $user->isActive;

    }
     function  validateControll(){


     }

}
