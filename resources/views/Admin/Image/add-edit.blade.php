@extends("admin.layout.admin")
@section("css")
    <link href="/admin_assets/dist/css/pages/user-card.css" rel="stylesheet">
    <link href="/admin_assets/assets/libs/magnific-popup/dist/magnific-popup.css" rel="stylesheet">

@endsection
@section("content")

    <div class="portlet light ">
        <div class="portlet-title">
            <div class="row">
                <div class="col-md-10">
                    <div class="caption font-dark">
                        <i class="fa fa-object-group font-dark"></i>
                        <span class="caption-subject bold uppercase"> Resim Galerisi  </span>
                    </div>
                </div>
                <div class="col-md-2" style="text-align: left">

                </div>
            </div>
        </div>
        <div class="portlet-body">
            <div class="dropzone-file-area">
                <div class="dz-image-preview">

                    <form class="dropzone" method="post"  enctype="multipart/form-data"
                          action="{{route("image.upload")}}" >
                    @csrf
                    <input name="content_id" value="{{$content->id}}" type="hidden">
                    </form>
                </div>


            </div>
        </div>


        <!-- END EXAMPLE TABLE PORTLET-->

        <div class="container-fluid">
            <div class="row el-element-overlay">
                @foreach($images as $item)
                <div class="col m6 l3">
                    <div class="card">
                        <div class="card-image">
                            <div class="el-card-item">
                                <div class="el-card-avatar el-overlay-1"> <img src="{{$item->image}}" >
                                    <div class="el-overlay">
                                        <ul class="el-info">
                                            <li><form action="{{route("image.delete",$item->id)}}" method="post">
                                        @csrf
                                                    @method("DELETE")
                                                <button class="btn-floating " href=""><i class="material-icons">delete</i></button>
                                                </form>  </li>

                                        </ul>
                                    </div>
                                </div>
                                <div class="el-card-content">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
        @endforeach
            </div>
        </div>



@endsection
@section("js")
            <script src="/admin_assets/assets/libs/magnific-popup/dist/jquery.magnific-popup.min.js"></script>
            <script src="/admin_assets/assets/libs/magnific-popup/meg.init.js"></script>

    @endsection