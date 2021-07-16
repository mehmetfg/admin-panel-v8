<aside class="left-sidebar">
    <ul id="slide-out" class="sidenav">

        <li>
            <ul class="collapsible collapsiblebox">


                @if($user->type=="1" || $user->type=="2")

                <li class="small-cap"><span class="hide-menu">Anasayfa İçerikleri</span></li>

                <li class="">
                    <a href="home/1" class="collapsible-header " tabindex="0"><i class="material-icons">aspect_ratio</i><span class="hide-menu">Anasayfa</span></a>

                </li>

                <hr>

                @endif
                        <li class="small-cap"><span class="hide-menu">İÇERİKLER</span></li>

                @forelse(get_sidebar_menu() as $category_item)

                <li>

                    <a href="{{$category_item->categories->count()? '#' :"/admin/content/$category_item->id"}}" class="collapsible-header {{$category_item->categories->count()? 'has-arrow' :''}} "><i class="material-icons">
                            {{$category_item->icon}}</i><span class="hide-menu">{{$category_item->name}} </span></a>
                    @if($category_item->categories)
                    <div class="collapsible-body" style="">
                        <ul>

                          @foreach($category_item->categories as $item)

                                <li><a href="/admin/content/{{$item->id}}"><i class="material-icons">{{$item->icon}}</i><span class="hide-menu">{{$item->name}}</span></a></li>

                            @endforeach
                        </ul>
                    </div>
                        @endif
                </li>
                @empty
                    <li>
                        <h2 style="font-size:15px; color:red;">Seçilen Kategoride Kayıt Bulunamadı.</h2>
                    </li>
            @endforelse
                <hr>

                    <hr>
                <li class="small-cap"><span class="hide-menu">AYARLAR</span></li>

                @if($user->type=="1" )
                    <li>
                        <a href="/admin/category/1" class="collapsible-header "><i class="material-icons">album</i><span class="hide-menu"> Ana Sayfa</span></a>

                    </li>
                <li>
                    <a href="/admin/category/2" class="collapsible-header "><i class="material-icons">account_balance</i><span class="hide-menu"> Kategoriler</span></a>

                </li>
                    @endif

                    @if($user->type=="1" )
                        <li>
                            <a href="/admin/category/4" class="collapsible-header "><i class="material-icons">location_city</i><span class="hide-menu"> Alt Kategoriler</span></a>

                        </li>
                        <li>


                    </li>
                    <li>
                        <a href="/admin/category/5" class="collapsible-header "><i class="material-icons">book</i><span class="hide-menu"> İçerik</span></a>

                    </li>


@endif
                    <li>
                        <a href="/admin/user" class="collapsible-header "><i class="material-icons">person_add</i><span class="hide-menu"> Kullanıcılar</span></a>

                    </li>
                    <li>
                        <a href="/admin" class="collapsible-header "><i class="material-icons">move_to_inbox</i><span class="hide-menu"> Profil</span></a>

                    </li>

            </ul>
        </li>
    </ul>
</aside>
