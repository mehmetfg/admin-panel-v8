@extends("Admin.Layout.admin")

@section("content")


    <div class="row">
        <div class="col s12 m4">

                <div class="card">
                    <div class="card-content">
                        <div class="center-align m-t-30"> <img src="{{$user->logo}}" class="circle" width="150">
                            <h4 class="card-title m-t-10">{{$user->name}}</h4>
                            <h6 class="card-subtitle">{{$user->email}}</h6>
                            <div class="center-align">
                                <div>

                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="card-content">
                        <small>Email adresi</small>
                        <h6>{{$user->email}}</h6>
                        <small>Telefon</small>
                        <h6>{{$user->phone}}</h6>


                    </div>
                </div>

        </div>
        <div class="col s12 m8">
            <div class="card">
                <div class="row">
                    <div class="col s12">
                        <ul class="tabs">
                            <li class="tab col s3"><a href="#settings" class="active">Bilgiler</a></li>
                            <li class="tab col s3"><a href="#profile" class="">Sosyal Medya</a></li>


                    </div>
                    <form action="/admin/user/{{$user->id}}" METHOD="post" enctype="multipart/form-data">
                        @csrf
                        @method("PUT")
                    <div id="settings" class="col s12 active" style="display: block;">
                        <div class="card-content">

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text"  name="name" value="{{$user->name}}">
                                        <label for="name" class="active">Adı</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="email" type="email" name="email"value="{{$user->email}}">
                                        <label for="email" class="active">Mail</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="password" type="text"  name="password" >
                                        <label for="password" class="active">Şifre</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="number" type="text" name="phone1" value="{{$user->phone1}}">
                                        <label for="number" class="active">Telefon Numarası I</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <textarea id="message" name="phone2" class="materialize-textarea" style="height: 46px;">{{$user->phone2}}</textarea>
                                        <label for="message" class="active">Telefon Numarası II</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="message" class="materialize-textarea"  name="address" value="{{$user->address}}" style="height: 46px;"/>
                                        <label for="message" class="active">Adres</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn teal waves-effect waves-light" type="submit" >Güncelle</button>
                                    </div>
                                </div>

                        </div>
                    </div>
                    <div id="profile" class="col s12" style="display: none;">
                        <div class="card-content">
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="name" type="file" name="logo" >
                                    <label for="name" class="active">Logo</label>
                                </div>
                            </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name ="map" value="{{$user->map}}">
                                        <label for="name" class="active">Google Map</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name ="youtube" value="{{$user->youtube}}">
                                        <label for="email" class="active">Youtube</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name ="twitter" value="{{$user->twitter}}">
                                        <label for="email" class="active">Twitter</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name ="instagram" value="{{$user->instagram}}">
                                        <label for="password" class="active">Instagram</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name ="facebook" value="{{$user->facebook}}">
                                        <label for="number" class="active">Facebook</label>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name ="meta_keyword" value="{{$user->meta_keyword}}">
                                        <label for="name" class="active">Meta Keyword</label>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="input-field col s12">
                                        <input id="name" type="text" name ="meta_description" value="{{$user->meta_description}}">
                                        <label for="name" class="active">Meta Description</label>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="input-field col s12">
                                        <button class="btn teal waves-effect waves-light" type="submit" name="action">Güncelle</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <!-- col -->

    </div>
@endsection