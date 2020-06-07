<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield("page-title")</title>
        <link rel="icon" type="image/jpg" href="{{ URL::asset('img/favicon.png') }}">
        <link href="{{ URL::asset('vendor/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
        <!-- Bootstrap -->
        {{-- <link rel="stylesheet" href="{{ URL::asset('vendor/bootstrap/css/bootstrap.min.css') }}"> --}}
        <!-- Jquery-ui CSS -->
        <link href="{{ URL::asset('vendor/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet">
        <!-- Datatables -->
        <link rel="stylesheet" href="{{ URL::asset('vendor/datatables/dataTables.bootstrap4.min.css') }}">
        <!-- Bootstrap-select -->
        <link rel="stylesheet" href="{{ URL::asset('vendor/bootstrap-select/dist/css/bootstrap-select.min.css') }}">
        <!-- JQuery-confirm -->
        <link rel="stylesheet" href="{{ URL::asset('vendor/jquery-confirm/css/jquery-confirm.css') }}">
        <!-- sb-admin-2 -->
        <link rel="stylesheet" href="{{ URL::asset('vendor/sb-admin-2/css/sb-admin-2.min.css') }}">
        <!-- Fontawsome -->
        <link href="{{ URL::asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
        <!-- Style -->
        <link href="{{ URL::asset('css/style.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/style_sd.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/style_ma.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/style_my.css') }}" rel="stylesheet" type="text/css">
        <link href="{{ URL::asset('css/style_ah.css') }}" rel="stylesheet" type="text/css">
        @yield("module-css")
        <script type="text/javascript">
            var racine = '{{url("/")}}/';
        </script>
    </head>
    <body>
        <div id="wrapper">
          <ul class="navbar-nav bg-gradient-anapej sidebar sidebar-dark accordion" id="mainMenu">
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{url('/')}}">
              <div class="sidebar-brand-icon">
                <i class="fas fa-home"></i>
              </div>
              <div class="sidebar-brand-text mx-3"> {{trans("text.app_name")}}</div>
            </a>
            <hr class="sidebar-divider my-0">
            @switch(Auth::user()->sys_types_user_id)
              @case(1) @include('menu.demandeur') @break
              @case(2) @include('menu.agent') @break
              @case(3) @include('menu.employeur') @break
              @case(4) @include('menu.centre') @break
            @endswitch
            <hr class="sidebar-divider d-none d-md-block">
            <div class="text-center d-none d-md-inline">
              <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
          </ul>
          <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
              <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                  <i class="fa fa-bars"></i>
                </button>
                @switch(Auth::user()->sys_types_user_id)
                  @case(1) <span class="ml-2"><i class="fa fa-id-card"></i> {{trans('text_ah.espace_de')}} </span> : <strong class="text-anapej ml-1"> {{ Auth::user()->demendeur_emploi->prenom.' '.Auth::user()->demendeur_emploi->nom}}</strong> @break
                  @case(2) <span class="ml-2"><i class="fa fa-id-card"></i> {{trans('text_ah.espace_agent')}}</span> @break
                  @case(3) <span class="ml-2"><i class="fa fa-id-card"></i> {{trans('text_ah.espace_employeur')}} </span> : <strong class="text-anapej ml-1"> {{ Auth::user()->employeur->libelle}}</strong> @break
                  @case(4) <span class="ml-2"><i class="fa fa-id-card"></i> {{trans('text_ah.espace_centre')}} </span> : <strong class="text-anapej ml-1"> {{ Auth::user()->centre_formation->libelle}}</strong> @break
                @endswitch
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item dropdown no-arrow mx-1">
                    <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-bell fa-fw"></i>
                      <span class="badge badge-danger badge-counter">3+</span>
                    </a>
                    <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                      <h6 class="dropdown-header">
                        Centre de notifications
                      </h6>
                      <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                          <div class="icon-circle bg-primary">
                            <i class="fas fa-file-alt text-white"></i>
                          </div>
                        </div>
                        <div>
                          <div class="small text-gray-500">Le 12 Decembre 2019</div>
                          <span class="font-weight-bold">Une nouvelle annotation d'offre</span>
                        </div>
                      </a>
                      <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                          <div class="icon-circle bg-success">
                            <i class="fas fa-donate text-white"></i>
                          </div>
                        </div>
                        <div>
                          <div class="small text-gray-500">Le 11 Decembre 2019</div>
                          Une validation d'inscription en ligne en attente
                        </div>
                      </a>
                      <a class="dropdown-item d-flex align-items-center" href="#">
                        <div class="mr-3">
                          <div class="icon-circle bg-warning">
                            <i class="fas fa-exclamation-triangle text-white"></i>
                          </div>
                        </div>
                        <div>
                          <div class="small text-gray-500">Le 2 Decembre 2019</div>
                          Une validation de modification d'une offre en ligne en attente
                        </div>
                      </a>
                      <a class="dropdown-item text-center small text-gray-500" href="#">Afficher toutes les notifications</a>
                    </div>
                  </li>

                  <div class="topbar-divider d-none d-sm-block"></div>
                  <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <span class="mr-2 d-none d-lg-inline text-anapej small">{{ (Auth::user()) ? Auth::user()->name : ''}}</span>
                      {{-- <img class="img-profile rounded-circle" src="https://source.unsplash.com/QAB-WJcbgJk/60x60"> --}}
                      <i class="fa fa-user-circle"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                      <a class="dropdown-item" href="#">
                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                        Profile
                      </a>
                      <a class="dropdown-item" href="#">
                        <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                        Settings
                      </a>
                      <a class="dropdown-item" href="#">
                        <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                        Activity Log
                      </a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                      </a>
                    </div>
                  </li>
                </ul>
              </nav>
              <div class="container-fluid">
                  <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">
                      @yield("page-title")
                    </h1>
                    @yield("top-page-btn")
                  </div>
                  @yield("page-content")
              </div>
            </div>
            <footer class="sticky-footer bg-light mt-4">
              <div class="container my-auto">
                <div class="copyright text-center my-auto">
                  <span>Copyright &copy; ANAPEJ 2020</span>
                </div>
              </div>
            </footer>
          </div>
        </div>
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fas fa-angle-up"></i>
        </a>

        @foreach (['main','second','add'] as $type_modal)
        <div id="{{$type_modal}}-modal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header-body">
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Etes-vous sûre de vouloire se déconnecter?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body">Cliquer sur "Déconnecter" en bas si vous êtes prêt.</div>
              <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Retourner</button>
                <a class="btn btn-primary" href="{{ url('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out fa-fw"></i> Déconnecter
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </div>
            </div>
          </div>
        </div>
        <!-- jquery -->
        <script src="{{ URL::asset('vendor/jquery/jquery.min.js') }}"></script>
        <!-- jquery-ui-sortable -->
        <script src="{{ URL::asset('vendor/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Popper -->
        <script src="{{ URL::asset('vendor/popper/popper.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ URL::asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
        <!-- jquery-confirm -->
        <script src="{{ URL::asset('vendor/jquery-confirm/js/jquery-confirm.js') }}"></script>
        <!-- bootstrap Select -->
        <script src="{{ URL::asset('vendor/bootstrap-select/dist/js/bootstrap-select.min.js') }}"></script>
        <!-- DataTables JavaScript -->
        <script src="{{ URL::asset('vendor/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ URL::asset('vendor/datatables/dataTables.bootstrap4.min.js') }}"></script>
        {{-- <script src="{{ URL::asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script> --}}
        {{-- <script src="{{ URL::asset('vendor/datatables-plugins/dataTables.bootstrap.min.js') }}"></script> --}}
        <!-- datepicker  -->
        <script src="{{ URL::asset('vendor/datepicker/bootstrap-datepicker.min.js') }}"></script>
        <!-- Core plugin JavaScript-->
        <script src="{{ URL::asset('vendor/jquery-easing/jquery.easing.min.js') }}"></script>
        <!-- Page level plugins -->
        <script src="{{ URL::asset('vendor/chart.js/Chart.min.js') }}"></script>
        <!-- Custom scripts for all pages-->
        <script src="{{ URL::asset('vendor/sb-admin-2/js/sb-admin-2.min.js') }}"></script>
        <!-- Page level custom scripts -->
        {{-- <script src="{{ URL::asset('vendor/sb-admin-2/js/demo/chart-area-demo.js') }}"></script> --}}
        {{-- <script src="{{ URL::asset('vendor/sb-admin-2/js/demo/chart-pie-demo.js') }}"></script> --}}
        <!-- Main JS -->
        <script src="{{ URL::asset('js/init.js') }}"></script>
        <script src="{{ URL::asset('js/main.js') }}"></script>
        <script src="{{ URL::asset('js/my.js') }}"></script>
        <script src="{{ URL::asset('js/ma.js') }}"></script>
        <script src="{{ URL::asset('js/ah.js') }}"></script>
        <script src="{{ URL::asset('js/sd.js') }}"></script>
        @yield("module-js")

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </div>
  </body>
</html>
