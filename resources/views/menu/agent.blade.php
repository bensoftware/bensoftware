<li class="nav-item active">
  <a class="nav-link" href="{{url('dashboard')}}">
    <i class="fas fa-fw fa-tachometer-alt"></i>
    <span>{{trans("text_menu_agent.dashboard")}}</span></a>
</li>
<hr class="sidebar-divider my-0">
@if(Auth::user()->hasAccess([1]))
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOffres" aria-expanded="true" aria-controls="collapseOffres">
    <i class="fas fa-fw fa-briefcase"></i>
    <span>{{trans("text_menu_agent.offres")}}</span>
  </a>
  <div id="collapseOffres" class="collapse" aria-labelledby="headingOffres" data-parent="#mainMenu">
    <div class="bg-white py-2 collapse-inner">
      <a class="collapse-item" href="{{url('familles')}}">{{trans("text.familles")}} <span class="badge badge-dark badge-pill float-right">15</span></a>
      <a class="collapse-item" href="{{url('articles')}}">{{trans("text.articles")}} <span class="badge badge-dark badge-pill float-right">15</span></a>
    </div>
  </div>
</li>
@endif
@if(Auth::user()->hasAccess([1]))
<li class="nav-item">
  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseDemandeurs" aria-expanded="true" aria-controls="collapseDemandeurs">
    <i class="fas fa-fw fa-address-book"></i>
    <span>{{trans("text_menu_agent.demandeurs")}}</span>
  </a>
  <div id="collapseDemandeurs" class="collapse" aria-labelledby="headingDemandeurs" data-parent="#mainMenu">
    <div class="bg-white py-2 collapse-inner">
      <a class="collapse-item" href="{{url('dashboard')}}">{{trans("text_menu_agent.modifications_enligne")}} <span class="badge badge-dark badge-pill float-right">2</span></a>
      <a class="collapse-item" href="{{url('dashboard')}}">{{trans("text_menu_agent.demandes_orientations")}} <span class="badge badge-dark badge-pill float-right">1</span></a>
      <a class="collapse-item" href="{{url('dashboard')}}">{{trans("text_menu_agent.message_en_attente")}} <span class="badge badge-dark badge-pill float-right">4</span></a>
      <a class="collapse-item" href="{{url('dashboard')}}">{{trans("text_menu_agent.candidatures_offres")}} <span class="badge badge-dark badge-pill float-right">37</span></a>
      <a class="collapse-item" href="{{url('dashboard')}}">{{trans("text_menu_agent.candidatures_programmes")}} </a>
      <a class="collapse-item" href="{{url('dashboard')}}">{{trans("text_menu_agent.candidatures_formations")}} <span class="badge badge-dark badge-pill float-right">9</span></a>
    </div>
  </div>
</li>
@endif