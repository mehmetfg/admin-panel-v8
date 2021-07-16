@extends("Admin.Layout.admin")
@section("content")



    <form action="/admin/content{{(is_null($model)) ? "" : "/" . $model->id}}" class="form-horizontal"
          enctype="multipart/form-data"
          method="post">
        @if(!is_null($model))
            @method("PUT")
        @endif
        @csrf
            <input
                    name="category_id" type="hidden"
                    value="{{(is_null($model)) ? $field->category_id : $model->category_id }}"/>
            <input
                    name="content_id" type="hidden"
                    value="{{(is_null($model)) ? request()->segment(4) : $model->content_id }}"/>
            <input name="type" type="hidden" value="2">
        <div class="modal-dialog modal-lg" role="document" style="width: 1000px">


            <div class="card">
                <div class="modal-header">
                    <h4 class="modal-title bold m-5">{{is_null($model) ? $content->title."  Kayıt Ekle":'  Kayıt Güncelle'}}

                    </h4>

                </div>

                <div class="card-content">

                    <div class="mail alert alert-danger" style="display: none"></div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">


                                <div class="col-md-3 control-label bold">{{$field->title_label}}</div>
                                <div class="col-md-7">
                                    <input class="form-control    required" required="required"
                                           name="title" value="{{(is_null($model)) ? old("title") : $model->title }}"
                                           placeholder="  Girilmesi Zorunlu" type="text"/>


                                </div>
                            </div>

                            @if($field->excerpt!=null)
                                <div class="form-group">
                                    <div class="col-md-3 control-label bold">{{$field->excerpt_label}}</div>
                                    <div class="col-md-7">

                                        <input class="form-control   required " required="required"
                                               name="excerpt"
                                               placeholder="Girilmesi Zorunlu"
                                               value="{{(is_null($model)) ? "" : $model->excerpt}}"/>


                                    </div>
                                </div>
                            @endif

                        </div>
                        <div class="col-md-6">



                            @if($field->link_url!=null)
                                <div class="form-group">
                                    <div class="col-md-3 control-label bold">{{$field->link_url_label}}</div>
                                    <div class="col-md-7">
                                        <input class="form-control   text-box single-line"
                                               name="link_url" type="text"
                                               value="{{(is_null($model)) ? "" : $model->link_url}} "/>


                                    </div>
                                </div>
                            @endif

                        </div>
                    </div>
                    @if($field->body!=null)
                        <div class="col-lg-12">{{$field->body_label}}
                            <div class="form-group">

                                <textarea contenteditable="true"
                                          name="body" id="body"
                                >{{(is_null($model)) ? old("body") : $model->body }}</textarea>


                            </div>

                            <script>
                                // Replace the <textarea id="editor1"> with a CKEditor
                                // instance, using default configuration.
                                CKEDITOR.replace('body');

                            </script>
                            <?php $durum = true;


                            ?>
                            @endif

                            @if($field->name!=null)

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="col-md-3 control-label bold">{{$field->name_label}}</div>
                                        <div class="col-md-7">
                                            <input class="form-control   text-box single-line"
                                                   name="name" id="name" type="text"
                                                   value="{{ (is_null($model)) ? old("name") : $model->name }}">


                                        </div>
                                    </div>
                                </div>

                            @endif
                            @if($field->description!=null)

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="col-md-3 control-label bold">{{$field->description_label}}</div>
                                        <div class="col-md-7">
                                            <input class="form-control   text-box single-line"
                                                   name="description" id="description" type="text"
                                                   value="{{ (is_null($model)) ? old("description") : $model->description }}">


                                        </div>
                                    </div>
                                </div>

                            @endif
                            @if($field->defination!=null)

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="col-md-3 control-label bold">{{$field->defination_label}}</div>
                                        <div class="col-md-7">
                                            <input class="form-control   text-box single-line"
                                                   name="defination" id="" type="text"
                                                   value="{{ (is_null($model)) ? old("defination") : $model->defination }}">


                                        </div>
                                    </div>
                                </div>

                            @endif
                            @if($field->comment!=null)

                                <div class="col-lg-12">
                                    <div class="form-group">
                                        <div class="col-md-3 control-label bold">{{$field->comment_label}}</div>
                                        <div class="col-md-7">
                                            <input class="form-control   text-box single-line"
                                                   name="comment" id="description" type="text"
                                                   value="{{  (is_null($model)) ? old("comment") : $model->comment}}">


                                        </div>
                                    </div>
                                </div>

                            @endif
                            @if($field->tfield1!=null)
                                <div class="col-lg-12">{{$field->tfield1_label}}
                                    <div class="form-group">

                                <textarea contenteditable="true"
                                          name="tfield1" id="tfield1"
                                >{{(is_null($model)) ? old("tfield1") : $model->tfield1 }}</textarea>


                                    </div>

                                    <script>
                                        // Replace the <textarea id="editor1"> with a CKEditor
                                        // instance, using default configuration.
                                        CKEDITOR.replace('tfield1');

                                    </script>
                                    <?php $durum = true;


                                    ?>
                                    @endif
                                    @if($field->tfield2!=null)
                                        <div class="col-lg-12">{{$field->tfield2_label}}
                                            <div class="form-group">

                                <textarea contenteditable="true"
                                          name="tfield2" id="tfield2"
                                >{{(is_null($model)) ? old("tfield2") : $model->tfield2 }}</textarea>


                                            </div>

                                            <script>
                                                // Replace the <textarea id="editor1"> with a CKEditor
                                                // instance, using default configuration.
                                                CKEDITOR.replace('tfield2');

                                            </script>
                                            <?php $durum = true;


                                            ?>
                                            @endif
                                            @if($field->tfield3!=null)
                                                <div class="col-lg-12">{{$field->tfield3_label}}
                                                    <div class="form-group">

                                <textarea contenteditable="true"
                                          name="tfield3" id="tfield3"
                                >{{(is_null($model)) ? old("tfield3") : $model->tfield3 }}</textarea>


                                                    </div>

                                                    <script>
                                                        // Replace the <textarea id="editor1"> with a CKEditor
                                                        // instance, using default configuration.
                                                        CKEDITOR.replace('tfield3');

                                                    </script>
                                                    <?php $durum = true;


                                                    ?>
                                                    @endif
                                                    @if($field->tfield4!=null)
                                                        <div class="col-lg-12">{{$field->tfield4_label}}
                                                            <div class="form-group">

                                <textarea contenteditable="true"
                                          name="tfield4" id="tfield4"
                                >{{(is_null($model)) ? old("tfield4") : $model->tfield4 }}</textarea>


                                                            </div>

                                                            <script>
                                                                // Replace the <textarea id="editor1"> with a CKEditor
                                                                // instance, using default configuration.
                                                                CKEDITOR.replace('tfield4');

                                                            </script>
                                                            <?php $durum = true;


                                                            ?>
                                                            @endif
                                                            @if($field->tfield5!=null)
                                                                <div class="col-lg-12">{{$field->tfield5_label}}
                                                                    <div class="form-group">

                                <textarea contenteditable="true"
                                          name="tfield5" id="tfield5"
                                >{{(is_null($model)) ? old("tfield5") : $model->tfield5 }}</textarea>


                                                                    </div>

                                                                    <script>
                                                                        // Replace the <textarea id="editor1"> with a CKEditor
                                                                        // instance, using default configuration.
                                                                        CKEDITOR.replace('tfield5');

                                                                    </script>
                                                                    <?php $durum = true;


                                                                    ?>
                                                                    @endif

                                                                    @if($field->tfield6!=null)
                                                                        <div class="col-lg-12">{{$field->tfield6_label}}
                                                                            <div class="form-group">

                                <textarea contenteditable="true"
                                          name="tfield6" id="tfield6"
                                >{{(is_null($model)) ? old("tfield6") : $model->tfield6 }}</textarea>


                                                                            </div>

                                                                            <script>
                                                                                // Replace the <textarea id="editor1"> with a CKEditor
                                                                                // instance, using default configuration.
                                                                                CKEDITOR.replace('tfield6');

                                                                            </script>
                                                                            <?php $durum = true;


                                                                            ?>
                                                                            @endif
                                                                    @if($field->tfield7!=null)
                                                                        <div class="col-lg-12">{{$field->tfield7_label}}
                                                                            <div class="form-group">

                                <textarea contenteditable="true"
                                          name="tfield7" id="tfield7"
                                >{{(is_null($model)) ? old("tfield7") : $model->tfield7 }}</textarea>


                                                                            </div>

                                                                            <script>
                                                                                // Replace the <textarea id="editor1"> with a CKEditor
                                                                                // instance, using default configuration.
                                                                                CKEDITOR.replace('tfield7');

                                                                            </script>
                                                                            <?php $durum = true;


                                                                            ?>
                                                                            @endif
                                                                            @if($field->tfield8!=null)
                                                                                <div class="col-lg-12">{{$field->tfield8_label}}
                                                                                    <div class="form-group">

                                <textarea contenteditable="true"
                                          name="tfield8" id="tfield8"
                                >{{(is_null($model)) ? old("tfield8") : $model->tfield8 }}</textarea>


                                                                                    </div>

                                                                                    <script>
                                                                                        // Replace the <textarea id="editor1"> with a CKEditor
                                                                                        // instance, using default configuration.
                                                                                        CKEDITOR.replace('tfield8');

                                                                                    </script>
                                                                                    <?php $durum = true;


                                                                                    ?>
                                                                                    @endif
                                                                                    @if($field->tfield9!=null)
                                                                                        <div class="col-lg-12">{{$field->tfield9_label}}
                                                                                            <div class="form-group">

                                <textarea contenteditable="true"
                                          name="tfield9" id="tfield9"
                                >{{(is_null($model)) ? old("tfield9") : $model->tfield9 }}</textarea>


                                                                                            </div>

                                                                                            <script>
                                                                                                // Replace the <textarea id="editor1"> with a CKEditor
                                                                                                // instance, using default configuration.
                                                                                                CKEDITOR.replace('tfield9');

                                                                                            </script>
                                                                                            <?php $durum = true;


                                                                                            ?>
                                                                                            @endif
                                                                                            @if($field->tfield10!=null)
                                                                                                <div class="col-lg-12">{{$field->tfield10_label}}
                                                                                                    <div class="form-group">

                                <textarea contenteditable="true"
                                          name="tfield10" id="tfield10"
                                >{{(is_null($model)) ? old("tfield10") : $model->tfield10 }}</textarea>


                                                                                                    </div>

                                                                                                    <script>
                                                                                                        // Replace the <textarea id="editor1"> with a CKEditor
                                                                                                        // instance, using default configuration.
                                                                                                        CKEDITOR.replace('tfield10');

                                                                                                    </script>
                                                                                                    <?php $durum = true;


                                                                                                    ?>
                                                                                                    @endif


                                                                            @if($field->img_url!=null)
                                                                                <div class="col-lg-12">
                                                                                    <div class="form-group">

                                                                                        <div class="col-md-3 control-label bold ">
                                                                                            Resim & Belge
                                                                                        </div>
                                                                                        <div class="col-md-7">

                                                                                            <input class="form-control"
                                                                                                   name="img_url"

                                                                                                   type="file"/>


                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endif

                                                                                                    @if($field->file_url!=null)
                                                                                                        <div class="col-lg-12">
                                                                                                            <div class="form-group">

                                                                                                                <div class="col-md-3 control-label bold ">
                                                                                                                    {{$field->file_url_label}}
                                                                                                                </div>
                                                                                                                <div class="col-md-7">

                                                                                                                    <input class="form-control"
                                                                                                                           name="file_url"

                                                                                                                           type="file"/>


                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
                                                                                                    @endif
                                                                            <hr>
                                                                            @if($field->meta_keyword!=null)
                                                                                <div class="col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <div class="col-md-3 control-label bold">
                                                                                            MetaKeyword
                                                                                        </div>
                                                                                        <div class="col-md-7">
                                                                                            <input class="form-control   text-box single-line"
                                                                                                   name="meta_keyword"
                                                                                                   type="text"
                                                                                                   value="{{ (is_null($model)) ? old("meta_keyword") : $model->meta_keyword }}">

                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            @endif
                                                                            @if($field->meta_description!=null)

                                                                                <div class="col-lg-12">
                                                                                    <div class="form-group">
                                                                                        <div class="col-md-3 control-label bold">
                                                                                            MetaDescription
                                                                                        </div>
                                                                                        <div class="col-md-7">
                                                                                            <input class="form-control   text-box single-line"
                                                                                                   name="meta_description"
                                                                                                   id="meta_description"
                                                                                                   type="text"
                                                                                                   value="{{(is_null($model)) ? old("meta_description") : $model->meta_description }}">


                                                                                        </div>
                                                                                    </div>
                                                                                </div>

                                                                        </div>  @endif
                                                                    <div class="modal-footer">
                                                                        <button class="btn blue" type="submit">
                                                                            @if(is_null($model))
                                                                                Kaydet
                                                                            @else
                                                                                Güncelle
                                                                            @endif
                                                                        </button>

                                                                    </div>
                                                                </div>

                                                        </div>


    </form>


@endsection