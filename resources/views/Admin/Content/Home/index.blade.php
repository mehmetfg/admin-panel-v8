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

                    @if(\Illuminate\Support\Facades\Auth::user()->type=="1")
                    <div class="col s4" >
                        <div class="pull-right">
                            <a class="btn red waves-effect"  href="/admin/category/1/create"> Yeni
                                Ekle
                                <i class="fa fa-plus"></i>
                            </a></div>
                    </div>
                        @endif
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

                        <th class="sorting_disabled"><i class="icon-bullhorn"></i> Başlık</th>





                        <th><i class=" icon-edit"></i>Resim</th>
                        <th><i class=" icon-edit"></i> Variable</th>
                        <th><i class=" icon-edit"></i> Durum</th>
                        <th><div class="pull-right">İşlemler</div></th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($category as $item)


                            <tr>
                                <td>{{optional($item->content)->id }}</td>

                                <td style="white-space: nowrap">
                                    <b> {{$item->name }}</b></td>


                                <td> <img src="{{optional($item->content)->img_url}} " style="width: 200px; height:100px" ></td>

                                <td>{{$item->variable }}</td>
                                <td>


                                    <div class="switch">

                                        <label>
                                            Pasif
                                            <input type="checkbox"
                                                   class="my-checkbox"  dataType="/admin/content"
                                                   <?php echo (optional($item->content)->isActive == 1) ? "checked" : "" ?>
                                            dataID="{{optional($item->content)->id}}">
                                            <span class="lever"></span>
                                            Aktif
                                        </label>
                                    </div>
                                </td>

                                <td><div class="pull-right">
                                        @if(\Illuminate\Support\Facades\Auth::user()->type=="1")


                                        <a class="btn btn-sm red " href="/admin/field/{{$item->id}}" dataid="">
                                            <i class="fa fa-edit"></i>  Yetkileri Düzenle </a>
                                            <form style="display: inline    " id="deleteForm{{$item->id}}" action="/admin/category/{{$item->id}}" method="post">
                                                @csrf
                                                @method("Delete")
                                                <a class="btn orange removeBtn" dataURL="{{$item->id}}"
                                                ><i class="icon-trash "></i>
                                                </a>
                                                <input type="hidden" name="category_id" value="{{$item->category_id}}">
                                            </form>
                                        @endif

                                        <a class="btn btn-sm blue " href="{{route("content.home.edit",optional($item->content)->id)}}"
                                           dataid="">
                                            <i
                                                    class="fa fa-edit"></i>  Düzenle </a>

                                    </div>
                                </td>

                            </tr>
                        @empty
                            <h2 style="font-size:15px; color:red;">Seçilen Kategoride Kayıt Bulunamadı.</h2>
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

@section("js")
    <script>


    </script>
@endsection