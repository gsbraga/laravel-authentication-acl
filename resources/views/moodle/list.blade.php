{{--@extends('laravel-authentication-acl::admin.layouts.base-2cols')--}}
@extends('laravel-authentication-acl::moodle.layouts.defaultmoodle')

@section('title')
    Ambientes: Dashboard
@stop

@section('container')
    <br/>
    <div class="row">
        <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"><img width="200px" src="/packages/jacopo/laravel-authentication-acl/images/logo.jpeg"></div>
        <div class="col-md-8 col-sm-8 col-xs-8 col-lg-8"><h1>Ambientes Virtuais do NEAD</h1></div>
    </div>

    {{--<h2></h2>--}}
    @if(!$user)
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <h4>
                    O Sistema de Monitoramento foi idealizado para acompanhar o desempenhos dos Cursos oferecidos pelo NEAD/UFMA, possibilitando acesso as informações dos cursos e alunos em tempo real.
                    Com relatórios e Dashboards dinâmicos, é possível a verificação rápida e uma tomada de decisão mais eficiente. Para acessar o Sistema, clique em Realizar Login.
                </h4>
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12 text-center">

                <button onclick="login()" type="button" class="btn btn-primary btn-lg">Realizar Login</button>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12 col-lg-12">
                <h3>
                    Seja Bem vindo.
                </h3>

                @include('laravel-authentication-acl::admin.layouts.partials.avatar', ['size' => 30])
                <span id="nav-email">{!! isset($user) ? $user->email : 'User' !!}</span> <br/>
                <span id="nav-email">{!! isset($user) ? 'Último acesso: ' . str_replace('-', '/', $user->last_login) : 'Primeiro acesso' !!}</span> <br/>

                <a href="{!! URL::route('user.logout') !!}"><i class="fa fa-sign-out"></i> Sair</a>
                {{--<a onclick="logout()" type="button" class="btn btn-secondary"><i class=""></i> Sair do sistema de monitoramento</a>--}}
            </div>
        </div>
    @endif
    <hr/>

    <div class="row">
        @foreach($moodles as $moodle)

            <div class="col-md-4 col-sm-6 col-xs-12 col-lg-4">
                <div class="card-body">
                    <div class="card-title title{{ $moodle->id }}">
                        @if(!$user)
                            <a style="color: #FFF;" href="#"><h2>{{ $moodle->name }}</h2></a>
                        @else
                            <a style="color: #FFF;" href="/dashboards/categories/?id={{ $moodle->id }}"><h2>{{ $moodle->name }}</h2></a>
                        @endif
                    </div>
                    <div class="card-container">
                        <p>{{ $moodle->description }}</p>
                    </div>
                    <div class="card-footer">
                        <h3 title="Usuários acessando atualmente">Online: <i class="fa fa-users icon-oline"></i> <b>+{{ $moodle->users_online }}</b></h3>
                    </div>
                </div>
            </div>

        @endforeach
    </div>

@stop
@section('footer_scripts')
    <script type="text/javascript">
        var login = function(){
            location.href = '/login';
        };
    </script>

@stop
