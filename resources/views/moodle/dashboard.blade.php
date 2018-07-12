{{--@extends('laravel-authentication-acl::moodle.layouts.defaultmoodle')--}}

{{--@section('title')--}}
    {{--Ambientes: Dashboard--}}
{{--@stop--}}

{{--@section('container')--}}
    {{--<div class="container">--}}
        {{--<div class="row">--}}
            {{--<div class="col-md-12">--}}
                {{--<div class="panel panel-default">--}}
                    {{--<div class="panel-heading">Chart Demo</div>--}}

                    {{--<div class="panel-body">--}}
                        {{--{!! $chart->html() !!}--}}
                    {{--</div>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}


    {{--</div>--}}
    {{--{!! Charts::scripts() !!}--}}
    {{--{!! $chart->script() !!}--}}
{{--@endsection--}}

        <!DOCTYPE html>
<html>
<body>

{{--<div>{!! $chart->container() !!}</div>--}}

<script src="path/to/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
{!! $chart->script() !!}
</body>
</html>