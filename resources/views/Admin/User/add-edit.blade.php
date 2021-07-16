@extends("admin.layout.admin")
@section("content")

<form action="/admin/user<?php echo (is_null($model)) ? "" : "/".$model->id ?>" class="form-horizontal"
      enctype="multipart/form-data"
      method="post">
    @if(!is_null($model))
        @method("PUT")
    @endif
    @csrf
        <div class="col s12 m8">
            <div class="card">
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3"><a href="#settings" class="active">Bilgiler</a></li>
                            <li class="tab col s3"><a href="#profile" class="">Sosyal Medya</a></li>
                        </ul>

                    </div>


                        <div id="settings" class="col s12 active" style="display: block;">
                            <div class="card-content">
                                <input id="type" type="hidden"  name="type" value="{{is_null($model)? "3": $model->type}}">
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text"  name="name" value="{{is_null($model)? "": $model->name}}">
                                        <label for="name" class="active">Adı</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="email" type="email" name="email"value="{{is_null($model)? "": $model->email}}">
                                        <label for="email" class="active">Mail</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="number" type="text" name="phone1" value="{{is_null($model)? "": $model->phone1}}">
                                        <label for="number" class="active">Telefon Numarası I</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="message" name="phone2" class="materialize-textarea" style="height: 46px;">{{is_null($model)? "": $model->phone2}}</textarea>
                                        <label for="message" class="active">Telefon Numarası II</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="message" class="materialize-textarea"  name="address" value="{{is_null($model)? "": $model->address}}" style="height: 46px;"/>
                                        <label for="message" class="active">Adres</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="message" class="materialize-textarea"  name="password" style="height: 46px;"/>
                                        <label for="message" class="active">Şifre</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="file" name ="logo" >
                                        <label for="name" class="active">Logo</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="profile" class="col s12" style="display: none;">
                            <div class="card-content">

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="name" type="text" name ="map" value="{{is_null($model)? "": $model->map}}">
                                            <label for="name" class="active">Google Map</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="name" type="text" name ="youtube" value="{{is_null($model)? "": $model->youtube}}">
                                            <label for="email" class="active">Youtube</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="name" type="text" name ="twitter" value="{{is_null($model)? "": $model->twitter}}">
                                            <label for="email" class="active">Twitter</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="name" type="text" name ="instagram" value="{{is_null($model)? "": $model->instagram}}">
                                            <label for="password" class="active">Instagram</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="name" type="text" name ="facebook" value="{{is_null($model)? "": $model->facebook}}">
                                            <label for="number" class="active">Facebook</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="name" type="text" name ="meta_keyword" value="{{is_null($model)? "": $model->meta_keyword}}">
                                            <label for="name" class="active">Meta Keyword</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <input id="name" type="text" name ="meta_description" value="{{is_null($model)? "": $model->meta_description}}">
                                            <label for="name" class="active">Meta Description</label>
                                        </div>
                                    </div>



                            </div>
                        </div>

                </div>
            </div>
        </div>
                <hr>
                <div class="modal-footer">
                    <button class="btn blue"  type="submit">
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