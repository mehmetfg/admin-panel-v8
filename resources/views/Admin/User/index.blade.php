@extends("Admin.Layout.admin")
@section("content")
    <div class="page-content-wrapper">
        <!-- BEGIN CONTENT BODY -->
        <div class="page-content">
            <div class="well">
                <div class="alert alert-danger" style="display: none"></div>
                <div class="row">

                </div>


                <!-- BEGIN EXAMPLE TABLE PORTLET-->

                <!-- END EXAMPLE TABLE PORTLET-->

                <!-- END CONTENT BODY -->


            </div>
            <div class="page-titles">
                <div class="row">
                    <div class="col s8">
                        <div class="caption font-dark">
                            <i class="material-icons"></i>
                            <span class="caption-subject bold uppercase"> Kullanıcı  Listesi  </span>
                        </div>
                    </div>
                    <div class="col s4" >
                        <div class="pull-right">
                        <a class="btn red waves-effect"  href="/admin/user/create"> Yeni
                             Ekle
                            <i class="fa fa-plus"></i>
                        </a></div>
                    </div>
                </div>
            </div>
            <input type="hidden" name="_token" value="{{Session::token()}}">
            <input type="hidden" name="_method" value="PUT">
            <!-- BEGIN EXAMPLE TABLE PORTLET-->
            <div class="card ">


                <div class="portlet-body">

                    <table class="table table-hover dataTable no-footer">

                        <thead>
                        <th class="sorting_disabled"><i class="icon-bullhorn"></i> #</th>

                        <th class="sorting_disabled"><i class="icon-bullhorn"></i> Adı</th>

                        <th class="sorting_disabled"><i class="icon-bullhorn"></i> Email</th>





                        <th><i class=" icon-edit"></i> Durum</th>
                        <th><div class="pull-right">İşlemler</div></th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($model as $item)


                        <tr>
                            <td>{{$item->id }}</td>

                            <td style="white-space: nowrap">
                                <b> {{$item->name }}</b></td>

                            &nbsp;<td>
                            <b> {{$item->email }} </b></td>





                            <td>


                                <div class="switch">
                                    <label>
                                        Pasif
                                        <input type="checkbox"   class="my-checkbox"  dataType="/admin/user" <?php echo ($item->isActive == 1) ? "checked" : "" ?>
                                        dataID="<?php echo $item->id ?>">
                                        <span class="lever"></span>
                                        Aktif
                                    </label>
                                </div>


                            </td>
                            <td><div class="pull-right">
                                <a class="btn btn-sm blue " href="/admin/user/edit/{{$item->id}}"
                                    dataid="">
                                    <i
                                            class="fa fa-edit"></i>  Göster </a>
                                    <form style="display: inline    " id="deleteForm{{$item->id}}" action="/admin/user/{{$item->id}}" method="post">
                                        @csrf
                                        @method("Delete")
                                        <a class="btn orange removeBtn" dataURL="{{$item->id}}"
                                        ><i class="icon-trash "></i>
                                        </a>
                                        <input type="hidden" name="category_id" value="{{$item->category_id}}">
                                    </form>
                                </div>
                            </td>

                        </tr>
                        @empty
                            <h2>Kayıt Yoktur</h2>
                            @endforelse

                        </tbody>
                    </table>


                </div>
            </div>


            <script>

                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace("d");

            </script>
            <!-- END EXAMPLE TABLE PORTLET-->
            <div class="pagination">
                <?php echo ""//$linkler ?>
            </div>
        </div>
    </div>
@endsection