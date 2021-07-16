@extends("admin.layout.admin")
@section("content")
    <div class="card">
        <form action="/admin/language<?php echo (is_null($model)) ? "" :"/". $model->id ?>" class="form-horizontal"
              method="post"
        >

            <div class="modal-dialog modal-lg" role="document" style="width: 1000px">

                <div class="card-content">
                    <div class="modal-header">
                        <h4 class="modal-title bold">Dil
                        </h4>

                    </div>

                    @if(!is_null($model))
                        @method("PUT")
                    @endif
                    {{ csrf_field() }}
                    <div class="modal-body">

                        <div class="mail alert alert-danger" style="display: none"></div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">


                                    <div class="col-md-3 control-label bold"> Adı</div>
                                    <div class="col-md-7">
                                        <input type="hidden" value="{{(is_null($model)) ? request()->segment(3) : $model->type}}" name="type">
                                        <input class="form-control    required"
                                               name="name" value="{{(is_null($model)) ? old('name') : $model->name}}"
                                               type="text"/>


                                    </div>
                                </div>







                            </div>

                            <div class="col-md-6">

                                <div class="form-group">


                                    <div class="col-md-3 control-label bold"> Tanım</div>
                                    <div class="col-md-7">
                                        <input class="form-control    required"
                                               name="definition" value="{{(is_null($model)) ? old("definition") : $model->definition}}"
                                               type="text"/>


                                    </div>
                                </div>



                            </div>
                            <div class="col-md-6">

                                <div class="form-group">


                                    <div class="col-md-3 control-label bold"> icon</div>
                                    <div class="col-md-7">
                                        <input class="form-control    required"
                                               name="icon" value="{{(is_null($model)) ? old("icon") : $model->icon}}"
                                               type="text"/>


                                    </div>
                                </div>



                            </div>
                        </div>


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
    </div>



@endsection