
<li class="nav-item active">
  <a class="nav-link" href="{{url("/")}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>{{trans("text.dashboard")}}</span></a>
</li>
<hr class="sidebar-divider m-0">
{{-- <div class="sidebar-heading">
  {{trans("text.production")}}
</div> --}}
<li class="nav-item">
  <a class="nav-link text-white" href='{{ url("DE/get_fiche") }}'>
    <i class="fas fa-fw fa-user-circle"></i>
    <span>{{trans("text_menu_demandeur.mon_profil")}}</span>
  </a>
</li>
<hr class="sidebar-divider m-0">
<li class="nav-item">
  <a class="nav-link text-white" href="#">
    <i class="fas fa-fw fa-comments"></i>
    <span>{{trans("text_menu_demandeur.messages")}}</span>
  </a>
</li>
<hr class="sidebar-divider m-0">
<li class="nav-item">
  <a class="nav-link text-white" href="#">
    <i class="fas fa-fw fa-briefcase"></i>
    <span>{{trans("text_menu_demandeur.offres")}}</span>
  </a>
</li>
<hr class="sidebar-divider m-0">
<li class="nav-item">
  <a class="nav-link text-white" href="#">
    <i class="fas fa-fw fa-tasks"></i>
    <span>{{trans("text_menu_demandeur.programmes")}}</span>
  </a>
</li>
<hr class="sidebar-divider m-0">
<li class="nav-item">
  <a class="nav-link text-white" href="#">
    <i class="fas fa-fw fa-chalkboard-teacher"></i>
    <span>{{trans("text_menu_demandeur.formations")}}</span>
  </a>
</li>
<hr class="sidebar-divider m-0">
<li class="nav-item">
  <a class="nav-link text-white" href="#">
    <i class="fas fa-fw fa-chalkboard"></i>
    <span>{{trans("text_menu_demandeur.orientations")}}</span>
  </a>
</li>
