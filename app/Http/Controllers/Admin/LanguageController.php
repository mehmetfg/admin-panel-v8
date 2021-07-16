<?php

namespace App\Http\Controllers\Admin;

use App\Language;


use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;


class LanguageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //


        return view("admin.language.index")->with("model", Language::paginate(5));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("admin.language.add-edit")->with("model", null);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Language $language)
    {
        try{


            $language->create($request->all());
         return back()->with("success", __("messages.add"));


        }
        catch (Exception $e){

         return back()->with("error", __("messages.un_add").$e->getMessage());

        }



        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function show(Language $language)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function edit(Language $language)
    {
        //

        return view("admin.language.add-edit")->with("model", $language);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Language $language)
    {
        try{


            $language->fill($request->all())->save();
         return back()->with("success", __("messages.add"));


        }
        catch (Exception $e){

         return back()->with("error", __("messages.un_add").$e->getMessage());

        }



        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Language  $language
     * @return \Illuminate\Http\Response
     */
    public function destroy(Language $language)
    {
        //
        $language->delete();
        return back();
    }
    public function set(Language $language)
    {

        session(['locale'=> $language->definition]);

        session(["language"=> $language]);
		return back();

    }
}
