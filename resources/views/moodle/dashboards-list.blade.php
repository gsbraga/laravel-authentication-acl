@extends('laravel-authentication-acl::admin.layouts.base-2cols')
@extends('laravel-authentication-acl::moodle.layouts.defaultmoodle')

@section('title')
    Ambientes: Dashboards
@stop

@section('content')
    {{--<h2><img width="200px" src="/packages/jacopo/laravel-authentication-acl/images/logo.jpeg"></h2>--}}
    <h4>Dashboards do AVA</h4>
    <hr/>

    <div class="row">

        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
            <div class="card-dashboard">
                <div class="card-title "><a style="color: #000;" href="/admin/reports/access/"><h2>Acesso por dia</h2></a></div>
                {{--<div class="card-container">--}}
                    {{--<p>{{ $moodle->description }}</p>--}}
                {{--</div>--}}
                {{--<div class="card-footer">--}}
                    {{--<h3 title="Usuários acessando atualmente">Online: <i class="fa fa-users icon-oline"></i> <b>+{{ $moodle->users_online }}</b></h3>--}}
                {{--</div>--}}
                <a style="color: #000;" href="/dashboards/access/"><img src="/images/acesso_por_dia.png"></a>

            </div>
        </div>

        <div class="col-md-6 col-sm-6 col-xs-12 col-lg-6">
            <div class="card-dashboard">
                <div class="card-title "><a style="color: #000;" href="/admin/reports/access/"><h2>Usuários online</h2></a></div>
                {{--<div class="card-container">--}}
                {{--<p>{{ $moodle->description }}</p>--}}
                {{--</div>--}}
                {{--<div class="card-footer">--}}
                {{--<h3 title="Usuários acessando atualmente">Online: <i class="fa fa-users icon-oline"></i> <b>+{{ $moodle->users_online }}</b></h3>--}}
                {{--</div>--}}
                <a style="color: #000;" href="/dashboards/moodles"><img src="/images/usuarios_online.png"></a>

            </div>
        </div>

    </div>

@stop