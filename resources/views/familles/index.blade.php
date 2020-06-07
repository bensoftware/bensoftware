@extends('layout')
@section('page-title')
    {{ trans('text.familles') }}
@endsection
@section('top-page-btn')
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" onclick="openFormAddInModal('familles')"><i class="fas fa-plus fa-sm text-white-50"></i> {{trans("text.add_famille")}}</a>
@endsection
@section('page-content')
    <div class="row">
        <div class="col-lg-12">
            @if (session('successmsg') || session('errormsg'))
                <div class="alert alert-{{(session('successmsg'))?'success':'danger'}} alert-dismissible">
                    {{ session('successmsg') }}{{ session('errormsg') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                </div>
            @endif
            <div class="card shadow">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatableshow" selected="" link="{{url("familles/getDT")}}" colonnes="id,libelle,actions" class="table table-hover table-bordered">
                            <thead>
                                <tr>
                                    <th width="30px"></th>
                                    <th>{{ trans('text.libelle') }}</th>
                                    <th width="80px">{{ trans('text.actions') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
