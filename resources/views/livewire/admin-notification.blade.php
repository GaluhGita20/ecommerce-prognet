<li class="nav-item dropdown notification_dropdown">
  <a href="#" class="nav-link ai-icon" href="javascript:;" role="button" data-toggle="dropdown"><i class="fa fa-bell"></i>
    @if(!is_null($notifikasi))
    <span class="badge light text-white bg-primary">{{$notifikasi->count()}}</span>
    @endif
  </a>
  @if(!is_null($notifikasi))
  <div class="dropdown-menu dropdown-menu-right">
    <div id="DZ_W_Notification1" class="widget-media dz-scroll p-3 ps">
      <ul class="timeline">
        <?php $temp_y = 0; ?>
        @foreach($notifikasi as $dd)
        @if($temp_y <=3)
        <li>
          <div class="timeline-panel">
            <div class="media-body">
              <h6 class="mb-1">{{$dd->data}}</h6>
              <small class="d-block">{{$dd->created_at}}</small>
            </div>
          </div>
        </li>
        <?php $temp_y = $temp_y + 1; ?>
        @endif
        @endforeach
      </ul>
    <div class="ps__rail-x" style="left: 0px; bottom: 0px;"><div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div></div><div class="ps__rail-y" style="top: 0px; right: 0px;"><div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 0px;"></div></div></div>
    <a class="all-notification" href="javascript:;">See all notifications <i class="ti-arrow-right"></i></a>
  </div>
  @endif
<!--Single Dropdown Menu-->
</li> <!-- Start Single Nav link-->