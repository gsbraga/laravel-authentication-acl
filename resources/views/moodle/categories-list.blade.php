@extends('laravel-authentication-acl::admin.layouts.base-2cols')
@extends('laravel-authentication-acl::moodle.layouts.defaultmoodle')

@section('title')
    Ambientes: Dashboard
@stop

@section('content')

    <div class="row">
        <h4>Cursos do {{ $moodle->name }} - NEAD/UFMA</h4>
        <hr/>
    </div>

    <div class="row">
    @forelse($courses as $course)

            {{--<div class="col-md-4 col-sm-4 col-xs-6 col-lg-4 box-course">--}}
                {{--<div class="card-body-course">--}}
                    {{--<div class="card-title-course"><h2>{{ $course->name }}</h2></div>--}}
                    {{--<div class="card-container-course">--}}
                        {{--<p>{{ $course->fullname}}</p>--}}
                    {{--</div>--}}
                    {{--<div class="card-footer-course">--}}
                        {{--<a href="/admin/courses/userscourses?id={{$course->id}}"><h4>Acessar</h4></a>--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}

            <div class="col-md-4 col-sm-6 col-xs-6 col-lg-4 box-course">
                <div class="card-body-course">
                    <div class="card-title-course"><div class="course-list">
                            {{--<img src="/packages/jacopo/laravel-authentication-acl/images/cursos/{{ $course->image  }}" alt="Curso online jQuery: Avance na biblioteca mais popular do mercado parte 2" aria-hidden="true" class="img-course">--}}
                            <h1 class="img_curso img_curso_{{ $course->id % 4 }}">{{ substr($course->name, 0, 2) }}</h1>
                            <div class="course-name">
                                <h4>{{ $course->name }}:</h4> {{ $course->fullname}}
                            </div>
                        </div>
                    </div>
                    <div class="card-container-course">
                        {{--<p style="display:  none; ">Ciência da Computação</p>--}}
                    </div>
                    <div class="card-footer-course">
                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6"><a href="/admin/reports/list/?id={{$course->id}}&curso={{$course->category_id}}"><i class="fa fa-book "></i> Disciplinas</a></div>
                        <div class="col-md-6 col-sm-6 col-xs-6 col-lg-6"><a href="/admin/courses/userscourses?id={{$course->id}}"><i class="fa fa-cogs "></i> Gerenciar</a></div>
                        {{--<a href="/admin/courses/userscourses?id={{$course->id}}"><h4>Acessar</h4></a>--}}
                    </div>
                </div>
            </div>

        @empty


            <div class="col-md-2 col-sm-12 col-xs-12 col-lg-12">
                <h4>Nenhum curso foi cadastrado para este AVA!</h4>
            </div>
        @endforelse
    </div>

@stop