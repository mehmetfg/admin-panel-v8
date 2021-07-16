@extends("Admin.Layout.admin")
@section("content")
<div class="card">

        <form action="/admin/field<?php echo (is_null($model)) ? "" :"/". $model->id ?>" class="form-horizontal"
              method="post"
            >

            <div class="modal-dialog modal-lg" role="document" style="width: 1000px">

                <div class="card-content">
                    <div class="modal-header">
                        <h4 class="modal-title bold"> <i class="material-icons font-20"> {{$category->icon }}</i> {{$category->name}}

                        </h4>
                        <br>


                    </div>

                    @method("PUT")



                    {{ csrf_field() }}
					
					
					<div class="row">
    <div class="col s12"></div>
    <div class="col s6">
	
	                    <input name="category_id"  type="hidden"  value=" <?php echo $model->category_id?>">
                    <p>
                    <label>
                        <input

                                name="title"  value="1"  <?php echo (!is_null($model->title)) ? "checked" : ""  ?>
                        type="checkbox"/>
                        <span><input type="text" name="title_label" value="{{ $model->title_label}}"/></span>
                        <span>title</span>
                    </label>
                </p>
                    <hr>
                <p>
                    <label>
                        <input
                                name="excerpt"   value="1"  <?php echo (!is_null($model->excerpt)) ? "checked" : ""  ?>
                        type="checkbox"/>
                        <span><input type="text" name="excerpt_label" value="{{ $model->excerpt_label}}"/></span>
                        <span>excerpt</span>
                    </label>
                </p>
                    <hr>
                <p>
                    <label>
                        <input

                                name="body" value="1"   <?php echo (!is_null($model->body)) ? "checked" : ""  ?>
                        type="checkbox"/>
                        <span><input type="text" name="body_label" value="{{ $model->body_label}}"/></span>
                        <span>body</span>
                    </label>
                </p>
                    <hr>
                <p>
                    <label>
                        <input

                                name="img_url" value="1"   <?php echo (!is_null($model->img_url)) ? "checked" : ""  ?>
                        type="checkbox"/>
                        <span><input type="text" name="img_url_label" value="{{ $model->img_url_label}}"/> </span>
                        <span>img_url</span>
                    </label>
                </p>
                    <p>
                        <label>
                            <input name="name" value="1"   <?php echo (!is_null($model->name)) ? "checked" : ""  ?>
                            type="checkbox"/>
                            <span><input type="text" name="name_label" value="<?php echo $model->name_label?>"/> </span>
                            <span>name</span>
                        </label>
	</p>
		  <p>
                        <label>
                            <input

                                    name="defination" value="1"   <?php echo (!is_null($model->defination)) ? "checked" : ""  ?>
                            type="checkbox"/>
                            <span><input type="text" name="defination_label" value="{{ $model->defination_label}}"/> </span>
                            <span>defination</span>
                        </label>
                    </p>
					<br>
					<hr>
					       <p>



        <p>
            <label>
                <input

                        name="tfield1" value="1"   <?php echo (!is_null($model->tfield1)) ? "checked" : ""  ?>
                type="checkbox"/>
                <span><input type="text" name="tfield1_label" value="{{ $model->tfield1_label}}"/> </span>
                <span>tfield1</span>
            </label>
        </p>
        <br>
        <hr>
        <p>
            <label>
                <input

                        name="tfield2" value="1"   <?php echo (!is_null($model->tfield2)) ? "checked" : ""  ?>
                type="checkbox"/>
                <span><input type="text" name="tfield2_label" value="{{ $model->tfield2_label}}"/> </span>
                <span>tfield2</span>
            </label>
        </p>
        <br>
        <hr>
        <p>
            <label>
                <input

                        name="tfield3" value="1"   <?php echo (!is_null($model->tfield3)) ? "checked" : ""  ?>
                type="checkbox"/>
                <span><input type="text" name="tfield3_label" value="{{ $model->tfield3_label}}"/> </span>
                <span>tfield3</span>
            </label>
        </p>
        <br>
        <hr>
        <p>
            <label>
                <input

                        name="tfield4" value="1"   <?php echo (!is_null($model->tfield4)) ? "checked" : ""  ?>
                type="checkbox"/>
                <span><input type="text" name="tfield4_label" value="{{ $model->tfield4_label}}"/> </span>
                <span>tfield4</span>
            </label>
        </p>
        <br>
        <hr>
        <p>
            <label>
                <input

                        name="tfield5" value="1"   <?php echo (!is_null($model->tfield5)) ? "checked" : ""  ?>
                type="checkbox"/>
                <span><input type="text" name="tfield5_label" value="{{ $model->tfield5_label}}"/> </span>
                <span>tfield5</span>
            </label>
        </p>
        <br>
        <hr>
        <p>
            <label>
                <input

                        name="tfield6" value="1"   <?php echo (!is_null($model->tfield6)) ? "checked" : ""  ?>
                type="checkbox"/>
                <span><input type="text" name="tfield6_label" value="{{ $model->tfield6_label}}"/> </span>
                <span>tfield6</span>
            </label>
        </p>
        <br>
        <hr>


        <p>
            <label>
                <input

                        name="tfield7" value="1"   <?php echo (!is_null($model->tfield7)) ? "checked" : ""  ?>
                type="checkbox"/>
                <span><input type="text" name="tfield7_label" value="{{ $model->tfield7_label}}"/> </span>
                <span>tfield7</span>
            </label>
        </p>
        <br>
        <hr>
        <p>
            <label>
                <input

                        name="tfield8" value="1"   <?php echo (!is_null($model->tfield8)) ? "checked" : ""  ?>
                type="checkbox"/>
                <span><input type="text" name="tfield8_label" value="{{ $model->tfield8_label}}"/> </span>
                <span>tfield8</span>
            </label>
        </p>
        <br>
        <hr>
        <p>
            <label>
                <input

                        name="tfield9" value="1"   <?php echo (!is_null($model->tfield9)) ? "checked" : ""  ?>
                type="checkbox"/>
                <span><input type="text" name="tfield9_label" value="{{ $model->tfield9_label}}"/> </span>
                <span>tfield9</span>
            </label>
        </p>
        <br>
        <hr>
        <p>
            <label>
                <input

                        name="tfield10" value="1"   <?php echo (!is_null($model->tfield10)) ? "checked" : ""  ?>
                type="checkbox"/>
                <span><input type="text" name="tfield10_label" value="{{ $model->tfield10_label}}"/> </span>
                <span>tfield10</span>
            </label>
        </p>
        <br>
        <hr>
        <p>
            <label>
                <input

                        name="file_url" value="1"   <?php echo (!is_null($model->file_url)) ? "checked" : ""  ?>
                type="checkbox"/>
                <span><input type="text" name="file_url_label" value="{{ $model->file_url_label}}"/> </span>
                <span>file_url</span>
            </label>
        </p>
        <br>
        <hr>



                <button class="btn blue"  type="submit">

                    Kaydet


                </button>
                </p>
	</div>
    <div class="col s6">


                    <p>
                        <label>
                            <input

                                    name="description" value="1"   <?php echo (!is_null($model->description)) ? "checked" : ""  ?>
                            type="checkbox"/>
                            <span><input type="text" name="description_label" value="{{ $model->description_label}}"/> </span>
                            <span>description</span>
                        </label>
                    </p>
                    <p>
                        <label>
                            <input

                                    name="comment" value="1"   <?php echo (!is_null($model->comment)) ? "checked" : ""  ?>
                            type="checkbox"/>
                            <span><input type="text" name="comment_label" value="{{ $model->comment_label}}"/> </span>
                            <span>comment</span>
                        </label>
                    </p>
                    <hr>
                    <p>
                        <label>
                            <input

                                    name="link_url" value="1"   <?php echo (!is_null($model->link_url)) ? "checked" : ""  ?>
                            type="checkbox"/>
                            <span><input type="text" name="link_url_label" value="{{ $model->link_url_label}}"/> </span>
                            <span>link_url</span>

                        </label>
                    </p>
                    <hr>
                    <p>
                        <label>
                            <input

                                    name="meta_keyword" value="1"   <?php echo (!is_null($model->meta_keyword)) ? "checked" : ""  ?>
                            type="checkbox"/>
                            <span>Meta Keyword </span>
                            (<span>meta_keyword</span>)
                        </label>
                    </p>
                    <hr>
                    <p>
                        <label>
                            <input

                                    name="meta_description"  value="1"  <?php echo (!is_null($model->meta_description)) ? "checked" : ""  ?>
                            type="checkbox"/>
                            <span>Meta Description</span>
                            (<span>meta_description</span>)


                        </label>
                    </p>
                    <hr>


                    <p>
                        <label>
                            <input

                                    name="galery" value="1"   <?php echo (!is_null($model->galery)) ? "checked" : ""  ?>
                            type="checkbox"/>
                            <span>Galeri </span>
                        </label>
                    </p>
					<br>
                    <hr>

        <p>
            <label>
                <input

                        name="content" value="1"   <?php echo (!is_null($model->content)) ? "checked" : ""  ?>
                type="checkbox"/>
                <span>İçerik </span>
            </label>
        </p>
        <br>
        <hr>
            </div></div>
</div>

                    
                  


    </form>
    <div class="col s12 m5 l4">
        <div class="card grey lighten-4">
            <div class="card-image waves-effect waves-block waves-light">
                <img class="form-control text-center" src="/admin_assets/assets/images/alanlar.jpg">
            </div>
            <div class="card-content">
                <span class="card-title activator grey-text text-darken-4">Alanlar ve Öznitelikleri<i class="material-icons right">more_vert</i></span>

            </div>
            <div class="card-reveal grey lighten-4">
                <span class="card-title grey-text text-darken-4">Alanlar ve Öznitelikleri<i class="material-icons right">close</i></span>
                <p>Burada Alanların öznitelikleri ve karakter sayıları gibi detayları bulabilirsiniz.</p>
            </div>
            <div class="card-action">

            </div>
        </div>
    </div>

</div>



@endsection