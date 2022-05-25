<li class="header__nav-item pos-relative reload-notif" style="margin-right:10px;">
    <a href="#" class="header__nav-link"><i class="fa fa-bell"></i></a>
    <?php $temp_i = 0; ?>
    @foreach($user_notifikasi as $notifikasi)
    <?php $temp_i = $temp_i +1; ?>
    @endforeach
    @if($temp_i != 0)
    <span class="menu-label menu-label--green" style="background:green; padding:unset;">{{$temp_i}}</span>
    @endif
    <!--Single Dropdown Menu-->
    @if($temp_i !=0)
    <ul class="dropdown__menu pos-absoluted" style="position:absolute; width:400px; text-transform: unset;">
    @foreach($user_notifikasi as $dd)
    <li class="dropdown__list">
        <div class="row">
            <div class="col-2">
            <i class="fa fa-info"></i>
            </div>
            <div class="col-10">
            {{$dd['data']}}
            </div>
        <div>
    </li>
    @endforeach
    @if($user_notifikasi->count()>1)
    <hr style="margin-top:10px; margin-bottom:0;">
    <li class="dropdown__list" style="width:100%">
            <a style="text-align:center!important; width:100%; margin-left: 50px; float:right;">
            View all notifications
            </a>
    </li>
    @endif
</ul>
@endif
<!--Single Dropdown Menu-->
</li> <!-- Start Single Nav link-->