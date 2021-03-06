@extends("admin.layout.admin")
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

                            <span class="caption-subject bold uppercase"> Listesi  </span>
                            <br><br>

                        </div>
                    </div>

                    <div class="col s4" >
                        @foreach(__("definations.languages") as $key=>$value)
                            @if(!getContentLanguage(\Illuminate\Support\Facades\Request::segment(3), $key))
                        <div class="pull-right">
                            <a class="btn red waves-effect"  href="/admin/lang-content/create/{{Request::segment(3)}}?language={{$key}}"> Yeni
                          {{$value}}      Ekle
                                <i class="fa fa-plus"></i>
                                </a></div>
                            @endif
                            @endforeach
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

                        <th class="sorting_disabled"><i class="icon-bullhorn"></i> Ba??l??k</th>





                        <th><i class=" icon-edit"></i>Resim</th>

                        <th><i class=" icon-edit"></i> Durum</th>
                        <th><div class="pull-right">????lemler</div></th>

                        </tr>
                        </thead>
                        <tbody>
                        @forelse($content->contentsLang as $item)


                            <tr>
                                <td>{{$item->id }}</td>

                                <td style="white-space: nowrap">
                                    <b> {{$item->title }}</b></td>

                                &nbsp;
                                <b> </b></td>


                                <td> <img src="{{$item->img_url}} " style="width: 200px; height:100px" ></td>


                                <td>


                                    <div class="switch">
                                        <label>
                                            Pasif
                                            <input type="checkbox"   class="my-checkbox"  dataType="/admin/content" <?php echo ($item->isActive == 1) ? "checked" : "" ?>
                                            dataID="<?php echo $item->id ?>">
                                            <span class="lever"></span>
                                            Aktif
                                        </label>
                                    </div>


                                </td>
                                <td><div class="pull-right">

                                        <a class="btn btn-sm blue " href="{{route("content.lang.edit",$item->id)}}"
                                           dataid="">
                                            <i
                                                    class="fa fa-edit"></i>  D??zenle </a>
                                        <form style="display: inline    " id="deleteForm{{$item->id}}" action="/admin/content/{{$item->id}}" method="post">
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
                            <h2 style="font-size:15px; color:red;">Se??ilen Kategoride Kay??t Bulunamad??.</h2>
                        @endforelse

                        </tbody>
                    </table>


                </div>
            </div>



            <!-- END EXAMPLE TABLE PORTLET-->
            <div class="pagination">
                <?php echo ""//$linkler ?>
            </div>
        </div>
    </div>

@endsection

@section("js")

@endsection