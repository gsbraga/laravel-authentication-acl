@extends('laravel-authentication-acl::admin.layouts.base-2cols')
@extends('laravel-authentication-acl::moodle.layouts.defaultmoodle')

@section('title')
    Disciplinas
@stop

    <!-- Bootstrap -->
{{--    {!! HTML::style('packages/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css') !!}--}}
    {{--<link href="../node_modules/gentelella/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">--}}
    <!-- Font Awesome -->
{{--    {!! HTML::style('packages/gentelella/vendors/font-awesome/css/font-awesome.min.css') !!}--}}
    {{--<link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">--}}
    <!-- NProgress -->
    {{--<link href="../vendors/nprogress/nprogress.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/vendors/nprogress/nprogress.css') !!}
    <!-- iCheck -->
    {{--<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css') !!}


@section('content')

    <div class="panel panel-info">
        <div class="panel-heading">
            <h2 class="panel-title bariol-thin"><i class="fa fa-bar-chart-o"></i> Acesso dos usuários </h2>
        </div>
        <div class="panel-body">

            <div class="row info_modulo" style="display: none;">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-2 col-sm-2 col-xs-2" for="first-name">Disciplina: </label>
                    <span id="nome_disciplina" class="col-md-10 col-sm-10 col-xs-10"></span>
                </div>
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-2 col-sm-2 col-xs-2" for="first-name">Início: </label>
                    <span id="inicio_disciplina" class="col-md-10 col-sm-10 col-xs-10"></span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <label class="control-label col-md-6 col-sm-6 col-xs-6" for="first-name">Status: </label>
                    <span id="status_disciplina" class="col-md-3 col-sm-3 col-xs-3"></span>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <label class="control-label col-md-6 col-sm-6 col-xs-6" for="first-name">Alunos: </label>
                    <span id="alunos_disciplina" class="col-md-3 col-sm-3 col-xs-3"></span>
                </div>
            </div>
            <hr/>


            <div class="row">
                <div class="page-title">
                    <div class="title_left">
                        <!-- <span>Disciplina:</span> -->
                        <h3 id="nome_disciplina"></h3>
                    </div>

                    <div class="title_right">
                        <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                            <div class="input-group">
                                <!-- <input type="text" class="form-control" placeholder="Search for..."> -->
                                <span class="input-group-btn">
                <!-- <button class="btn btn-default" type="button">Go!</button> -->
              </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <hr/>
                    <div class="title_left">
                        <span class="red">Aluno(a):</span>
                        <h4 class="name_user warn"></h4>
                        <p class="email_user"></p>
                        <p class="ultimo_acesso"></p>

                    </div>
                    <hr/>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-6">
                    <!-- <div class="img_user"></div>                   -->
                </div>

            </div>
            <div class="row top_tiles">
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-check-square-o"></i></div>
                        <div class="count count_atividade">0</div>
                        <h3>Atividades</h3>
                        <p>Atividades submetidas.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-question"></i></div>
                        <div class="count count_questionario">0</div>
                        <h3>Questionários</h3>
                        <p>Submissões de questionários.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-comments-o"></i></div>
                        <div class="count count_forum">0</div>
                        <h3>Fórum</h3>
                        <p>Participação em fóruns.</p>
                    </div>
                </div>
                <div class="animated flipInY col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="tile-stats">
                        <div class="icon"><i class="fa fa-desktop"></i></div>
                        <div class="count count_acesso">0</div>
                        <h3>Acesso</h3>
                        <p>Ultimo acesso a disciplina.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <!-- <h2>Acesso ao ambiente <small>Progresso semanal</small></h2> -->
                            <!-- <div class="filter">
                              <div id="reportrange" class="pull-right" style="background: #fff; cursor: pointer; padding: 5px 10px; border: 1px solid #ccc">
                                <i class="glyphicon glyphicon-calendar fa fa-calendar"></i>
                                <span>December 30, 2014 - January 28, 2015</span> <b class="caret"></b>
                              </div>
                            </div> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <!-- <div class="col-md-12 col-sm-12 col-xs-12">
                              <div class="demo-container" style="height:280px">
                                <div id="chart_plot_02" class="demo-placeholder"></div>
                              </div> -->
                            <!--<div class="tiles">
                              <div class="col-md-4 tile">
                                <span>Total Sessions</span>
                                <h2>231,809</h2>
                                <span class="sparkline11 graph" style="height: 160px;">
                                     <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                </span>
                              </div>
                              <div class="col-md-4 tile">
                                <span>Total Revenue</span>
                                <h2>$231,809</h2>
                                <span class="sparkline22 graph" style="height: 160px;">
                                      <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                </span>
                              </div>
                              <div class="col-md-4 tile">
                                <span>Total Sessions</span>
                                <h2>231,809</h2>
                                <span class="sparkline11 graph" style="height: 160px;">
                                       <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                </span>
                              </div>
                            </div>-->

                            <!-- </div> -->

                            <div class="col-md-12 col-sm-12 col-lg-12 col-xs-12">
                                <div class="x_panel">
                                    <div class="x_title">
                                        <h2>Acessos</h2>
                                        <ul class="nav navbar-right panel_toolbox">
                                            <!--<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                            </li>-->
                                            <!--<li class="dropdown">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                                <ul class="dropdown-menu" role="menu">
                                                <li><a href="#">Settings 1</a>
                                                </li>
                                                <li><a href="#">Settings 2</a>
                                                </li>
                                                </ul>
                                            </li>-->
                                            <!--<li><a class="close-link"><i class="fa fa-close"></i></a>
                                            </li>-->
                                        </ul>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="x_content">

                                        <div id="echart_line" style="height:350px;"></div>

                                    </div>
                                </div>
                                <a id="chart-view" href="#"></a>
                            </div>

                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div>
                                    <div class="x_title">
                                        <h2>Notas das atividades</h2>
                                        <!-- <ul class="nav navbar-right panel_toolbox">
                                          <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                          </li>
                                          <li class="dropdown">
                                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                            <ul class="dropdown-menu" role="menu">
                                              <li><a href="#">Settings 1</a>
                                              </li>
                                              <li><a href="#">Settings 2</a>
                                              </li>
                                            </ul>
                                          </li>
                                          <li><a class="close-link"><i class="fa fa-close"></i></a>
                                          </li>
                                        </ul> -->
                                        <div class="clearfix"></div>
                                    </div>
                                    <ul class="list-unstyled top_profiles scroll-view scroll-auto" id="notas_atividades">
                                        <li class="media event">
                                            <a class="pull-left border-aero profile_thumb">
                                                <i class="fa fa-user aero"></i>
                                            </a>
                                            <div class="media-body">
                                                <a class="title" href="#">-</a>
                                                <p><strong>00,00 </strong></p>
                                                <p> <small>-</small>
                                                </p>
                                            </div>
                                        </li>

                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Notas recebidas <small>Atividades realizadas</small></h2>
                            <!-- <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#">Settings 1</a>
                                  </li>
                                  <li><a href="#">Settings 2</a>
                                  </li>
                                </ul>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">
                                <!-- <div class="col-md-6" style="overflow:hidden;">
                                  <span class="sparkline_one" style="height: 160px; padding: 10px 25px;">
                                                <canvas width="200" height="60" style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                                            </span>
                                  <h4 style="margin:18px">Gráficos das notas</h4>
                                </div> -->
                                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="chart_grades" style="height:200px; overflow:hidden;"></div>
                            </div>

                            <!-- <div class="row" style="border-bottom: 1px solid #E0E0E0; padding-bottom: 5px; margin-bottom: 5px;">

                              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="row" style="text-align: center;">
                                  <div class="col-md-4">
                                    <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                    <h4 style="margin:0">Atividades com Nota</h4>
                                  </div>
                                  <div class="col-md-4">
                                    <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                    <h4 style="margin:0">Atividades sem Nota</h4>
                                  </div>
                                  <div class="col-md-4">
                                    <canvas class="canvasDoughnut" height="110" width="110" style="margin: 5px 10px 10px 0"></canvas>
                                    <h4 style="margin:0">Perfis cadastrados</h4>
                                  </div>
                                </div>
                              </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-4">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Atividades <small>Envio</small></h2>
                            <!-- <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#">Settings 1</a>
                                  </li>
                                  <li><a href="#">Settings 2</a>
                                  </li>
                                </ul>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content list_assign">
                            <article class="media event">
                                <a class="pull-left date">
                                    <p class="month">Mês</p>
                                    <p class="day">00</p>
                                </a>
                                <div class="media-body">
                                    <a class="title" href="#">--</a>
                                    <p>--</p>
                                </div>
                            </article>

                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Questionário <small>Envio</small></h2>
                            <!-- <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#">Settings 1</a>
                                  </li>
                                  <li><a href="#">Settings 2</a>
                                  </li>
                                </ul>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content list_quiz">
                            <article class="media event">
                                <a class="pull-left date">
                                    <p class="month">Mês</p>
                                    <p class="day">00</p>
                                </a>
                                <div class="media-body">
                                    <a class="title" href="#">--</a>
                                    <p>--</p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Fórum <small>Envio</small></h2>
                            <!-- <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">
                                  <li><a href="#">Settings 1</a>
                                  </li>
                                  <li><a href="#">Settings 2</a>
                                  </li>
                                </ul>
                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content list_forum">
                            <article class="media event">
                                <a class="pull-left date">
                                    <p class="month">Mês</p>
                                    <p class="day">00</p>
                                </a>
                                <div class="media-body">
                                    <a class="title" href="#">--</a>
                                    <p>--</p>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>


        </div>
@stop

@section('footer_scripts')

<!-- jQuery -->
{{--<script src="../vendors/jquery/dist/jquery.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/jquery/dist/jquery.min.js') !!}
<!-- Bootstrap -->
{{--<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') !!}
<!-- FastClick -->
{{--<script src="../vendors/fastclick/lib/fastclick.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/fastclick/lib/fastclick.js') !!}
<!-- NProgress -->
{{--<script src="../vendors/nprogress/nprogress.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/nprogress/nprogress.js') !!}
{!! HTML::script('packages/gentelella/vendors/Chart.js/dist/Chart.min.js') !!}
{!! HTML::script('packages/gentelella/vendors/jquery-sparkline/dist/jquery.sparkline.min.js') !!}

{!! HTML::script('packages/gentelella/vendors/echarts/dist/echarts.min.js') !!}
{!! HTML::script('packages/gentelella/vendors/echarts/map/js/world.js') !!}


{!! HTML::script('packages/gentelella/vendors/raphael/raphael.min.js') !!}
{!! HTML::script('packages/gentelella/vendors/morris.js/morris.min.js') !!}

<!-- Flot -->
{!! HTML::script('packages/gentelella/vendors/Flot/jquery.flot.js') !!}
{!! HTML::script('packages/gentelella/vendors/Flot/jquery.flot.pie.js') !!}
{!! HTML::script('packages/gentelella/vendors/Flot/jquery.flot.time.js') !!}
{!! HTML::script('packages/gentelella/vendors/Flot/jquery.flot.stack.js') !!}
{!! HTML::script('packages/gentelella/vendors/Flot/jquery.flot.resize.js') !!}

<!-- Flot plugins -->
{!! HTML::script('packages/gentelella/vendors/flot.orderbars/js/jquery.flot.orderBars.js') !!}
{!! HTML::script('packages/gentelella/vendors/flot-spline/js/jquery.flot.spline.min.js') !!}
{!! HTML::script('packages/gentelella/vendors/flot.curvedlines/curvedLines.js') !!}

<!-- DateJS -->
{!! HTML::script('packages/gentelella/vendors/DateJS/build/date.js') !!}

    <!-- bootstrap-daterangepicker -->
{!! HTML::script('packages/gentelella/vendors/moment/min/moment.min.js') !!}
{!! HTML::script('packages/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js') !!}
{!! HTML::script('packages/gentelella/build/js/config.js') !!}

<script type="text/javascript">

    var data_chart_grades = [];

    var activity_qtd = function(){

        var courseid = getUrlParameters("courseid", "", true);
        var userid = getUrlParameters("userid", "", true);
        var date_initial = getUrlParameters("date_initial", "", true);
        var date_final = getUrlParameters("date_final", "", true);

        $.get( URL_API + "?type=activity_qtd&courseid="+courseid+"&userid="+userid, function( data ) {

            $.each(data, function(index, item){
                console.log(item);
                $('.count_atividade').html(item.atividade);
                $('.count_questionario').html(item.questionario);
                $('.count_forum').html(item.forum);
                $('.count_acesso').html(item.acesso);
            });


        }, "json");

        $.get( URL_API + "?type=activity_course&courseid="+courseid+"&userid="+userid, function( data ) {

            var html = "";
            $.each(data, function(index, item){

                if(item.nota != '-')
                    data_chart_grades.push({atividade: item.nome/*.substr(0, 10) + '...'*/, nota: item.nota});

                html += '<li class="media event">'+
                    '<a class="pull-left border-aero profile_thumb">'+
                    '<i class="fa fa-user aero"></i>'+
                    '</a>'+
                    '<div class="media-body">'+
                    '<a class="title" href="#">'+item.nome+'</a>'+
                    '<p><strong>Nota: '+item.nota+' </strong></p>'+
                    // '<p> <small>06/12/2017</small>'+
                    '</p>'+
                    '</div>'+
                    '</li>';
            });

            Morris.Bar({
                element: 'chart_grades',
                data: data_chart_grades,
                xkey: 'atividade',
                ykeys: ['nota'],
                labels: ['Nota'],
                barRatio: 0.4,
                barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
                xLabelAngle: 35,
                hideHover: 'auto',
                resize: true
            });

            if(html == '')
                html = '<article class="media event">'+
                    '<a class="pull-left date">'+
                    '<p class="month">Mês</p>'+
                    '<p class="day">00</p>'+
                    '</a>'+
                    '<div class="media-body">'+
                    '<a class="title" href="#">Nenhum resgistro encontrado!</a>'+
                    '</div>'+
                    '</article>';
            $('#notas_atividades').html(html);

        }, "json");

        $.get( URL_API + "?type=post_assign&courseid="+courseid+"&userid="+userid, function( data ) {

            var html = "";
            $.each(data, function(index, item){

                html += '<article class="media event">'+
                    '<a class="pull-left date">'+
                    '<p class="month">'+item.mes.substr(0, 5)+'</p>'+
                    '<p class="day">'+item.data.split('/')[0]+'</p>'+
                    '</a>'+
                    '<div class="media-body">'+
                    '<a class="title" href="#">'+item.nome+'</a>'+
                    '<p>Nota: '+item.nota+'</p>'+
                    '</div>'+
                    '</article>';
            });
            if(html == '')
                html = '<article class="media event">'+
                    '<a class="pull-left date">'+
                    '<p class="month">Mês</p>'+
                    '<p class="day">00</p>'+
                    '</a>'+
                    '<div class="media-body">'+
                    '<a class="title" href="#">Nenhum resgistro encontrado!</a>'+
                    '</div>'+
                    '</article>';

            $('.list_assign').html(html);


        }, "json");

        $.get( URL_API + "?type=type_quiz&courseid="+courseid+"&userid="+userid, function( data ) {

            var html = '';
            $.each(data, function(index, item){

                html += '<article class="media event">'+
                    '<a class="pull-left date">'+
                    '<p class="month">'+item.mes.substr(0, 5)+'</p>'+
                    '<p class="day">'+item.data.split('/')[0]+'</p>'+
                    '</a>'+
                    '<div class="media-body">'+
                    '<a class="title" href="#">'+item.nome+'</a>'+
                    '<p>Tentativas: '+ item.tentativa+'. Nota: '+item.nota+'.</p>'+
                    '</div>'+
                    '</article>';
            });
            if(html == '')
                html = '<article class="media event">'+
                    '<a class="pull-left date">'+
                    '<p class="month">Mês</p>'+
                    '<p class="day">00</p>'+
                    '</a>'+
                    '<div class="media-body">'+
                    '<a class="title" href="#">Nenhum resgistro encontrado!</a>'+
                    '</div>'+
                    '</article>';

            $('.list_quiz').html(html);


        }, "json");


        $.get( URL_API + "?type=type_forum&courseid="+courseid+"&userid="+userid, function( data ) {

            var html = '';
            $.each(data, function(index, item){
                var mes = '-';
                if(item.mes != null){
                    mes = item.mes.substr(0, 5);
                }
                var data = '-';
                if(item.data != null){
                    data = item.data.split('/')[0];
                }
                html += '<article class="media event">'+
                    '<a class="pull-left date">'+
                    '<p class="month">'+mes+'</p>'+
                    '<p class="day">'+data+'</p>'+
                    '</a>'+
                    '<div class="media-body">'+
                    '<a class="title" href="#">'+item.nome+'</a>'+
                    '<p>Nota: '+item.nota+' / '+item.maximo+'</p>'+
                    '</div>'+
                    '</article>';
            });
            if(html == '')
                html = '<article class="media event">'+
                    '<a class="pull-left date">'+
                    '<p class="month">Mês</p>'+
                    '<p class="day">00</p>'+
                    '</a>'+
                    '<div class="media-body">'+
                    '<a class="title" href="#">Nenhum resgistro encontrado!</a>'+
                    '</div>'+
                    '</article>';

            $('.list_forum').html(html);


        }, "json");

    }

    activity_qtd();

    var info_user = function(){
        var userid = getUrlParameters("userid", "", true);
        var courseid = getUrlParameters("courseid", "", true);
        var aux_info = AMBIENTES[parseInt(localStorage.getItem('ambiente'))];

        $.get( URL_API + "?type=info_user&userid="+userid+"&courseid="+courseid, function( data ) {

            $.each(data, function(index, item){
                if(item.img_user == ''){
                    img_user = '<img src="images/user.png"/>';
                }else{
                    img_user = '<img src="'+aux_info.url + '/' + item.img_user+'">';
                }
                $('.name_user').html(item.firstname +' '+ item.lastname);
                $('.email_user').html(item.email + ', Turma: ' + item.grupo);
                $('.ultimo_acesso').html('Ultimo acesso: ' + item.ultimo_acesso);
                // $('.img_user').html(img_user);
            });


        }, "json");
    }

    info_user();



    function init_chart_doughnut(){

        if( typeof (Chart) === 'undefined'){ return; }

        console.log('init_chart_doughnut');

        if ($('.canvasDoughnut').length){

            var chart_doughnut_settings = {
                type: 'doughnut',
                tooltipFillColor: "rgba(51, 51, 51, 0.55)",
                data: {
                    labels: [
                        "Symbian",
                        "Blackberry",
                        "Other",
                        "Android",
                        "IOS"
                    ],
                    datasets: [{
                        data: [15, 20, 30, 10, 30],
                        backgroundColor: [
                            "#BDC3C7",
                            "#9B59B6",
                            "#E74C3C",
                            "#26B99A",
                            "#3498DB"
                        ],
                        hoverBackgroundColor: [
                            "#CFD4D8",
                            "#B370CF",
                            "#E95E4F",
                            "#36CAAB",
                            "#49A9EA"
                        ]
                    }]
                },
                options: {
                    legend: false,
                    responsive: false
                }
            }

            $('.canvasDoughnut').each(function(){

                var chart_element = $(this);
                var chart_doughnut = new Chart( chart_element, chart_doughnut_settings);

            });

        }

    }


    var countChartsUsers = function(){

        var userid = [];
        userid.push(getUrlParameters('userid', '', true));
        var courseid = getUrlParameters('courseid', '', true);

        if(userid.length == 0){
            alert('Escolha algum usuário para ver o gráfico.');
            return false;
        }

        $.ajax({
            type: "POST",
            url: URL_API + "?type=count_access_tutor&courseid="+courseid,
            // url: 'http://localhost/nead/api-monit/api.json',
            dataType: "json",
            data: {chart: userid},
            success: function (data) {

                var dados = {names_users:[], labels:[], data:[]};

                $.each(data, function(index, item){
                    var nome_user = item.nome ;
                    dados.names_users.push(nome_user);
                    var aux_data = [];
                    var label = '';
                    for(x in item.mes_qtd){
                        label = item.mes_qtd[x].mes +'/'+ item.mes_qtd[x].ano;
                        dados.labels.push(label);
                        aux_data.push(item.mes_qtd[x].qtd);

                    }
                    dados.data.push({
                        name: item.nome,
                        type: 'line',
                        smooth: true,
                        itemStyle: {
                            normal: {
                                areaStyle: {
                                    type: 'default'
                                }
                            }
                        },
                        data: aux_data
                    });
                });
                $('#grafico_acesso_user').show();
                window.location.href = '#chart-view';
                console.log(dados);
                init_echarts(dados);
            }
        });

    }


    countChartsUsers();


    /* ECHRTS */
    function init_echarts(dados) {

        if( typeof (echarts) === 'undefined'){ return; }
        console.log('init_echarts');

        var theme = {
            color: [
                '#26B99A', '#34495E', '#BDC3C7', '#3498DB',
                '#9B59B6', '#8abb6f', '#759c6a', '#bfd3b7'
            ],

            title: {
                itemGap: 8,
                textStyle: {
                    fontWeight: 'normal',
                    color: '#408829'
                }
            },

            dataRange: {
                color: ['#1f610a', '#97b58d']
            },

            toolbox: {
                color: ['#408829', '#408829', '#408829', '#408829']
            },

            tooltip: {
                backgroundColor: 'rgba(0,0,0,0.5)',
                axisPointer: {
                    type: 'bar',
                    lineStyle: {
                        color: '#408829',
                        type: 'dashed'
                    },
                    crossStyle: {
                        color: '#408829'
                    },
                    shadowStyle: {
                        color: 'rgba(200,200,200,0.3)'
                    }
                }
            },

            dataZoom: {
                dataBackgroundColor: '#eee',
                fillerColor: 'rgba(64,136,41,0.2)',
                handleColor: '#408829'
            },
            grid: {
                borderWidth: 0
            },

            categoryAxis: {
                axisLine: {
                    lineStyle: {
                        color: '#408829'
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: ['#eee']
                    }
                }
            },

            valueAxis: {
                axisLine: {
                    lineStyle: {
                        color: '#408829'
                    }
                },
                splitArea: {
                    show: true,
                    areaStyle: {
                        color: ['rgba(250,250,250,0.1)', 'rgba(200,200,200,0.1)']
                    }
                },
                splitLine: {
                    lineStyle: {
                        color: ['#eee']
                    }
                }
            },
            timeline: {
                lineStyle: {
                    color: '#408829'
                },
                controlStyle: {
                    normal: {color: '#408829'},
                    emphasis: {color: '#408829'}
                }
            },

            k: {
                itemStyle: {
                    normal: {
                        color: '#68a54a',
                        color0: '#a9cba2',
                        lineStyle: {
                            width: 1,
                            color: '#408829',
                            color0: '#86b379'
                        }
                    }
                }
            },
            map: {
                itemStyle: {
                    normal: {
                        areaStyle: {
                            color: '#ddd'
                        },
                        label: {
                            textStyle: {
                                color: '#c12e34'
                            }
                        }
                    },
                    emphasis: {
                        areaStyle: {
                            color: '#99d2dd'
                        },
                        label: {
                            textStyle: {
                                color: '#c12e34'
                            }
                        }
                    }
                }
            },
            force: {
                itemStyle: {
                    normal: {
                        linkStyle: {
                            strokeColor: '#408829'
                        }
                    }
                }
            },
            chord: {
                padding: 4,
                itemStyle: {
                    normal: {
                        lineStyle: {
                            width: 1,
                            color: 'rgba(128, 128, 128, 0.5)'
                        },
                        chordStyle: {
                            lineStyle: {
                                width: 1,
                                color: 'rgba(128, 128, 128, 0.5)'
                            }
                        }
                    },
                    emphasis: {
                        lineStyle: {
                            width: 1,
                            color: 'rgba(128, 128, 128, 0.5)'
                        },
                        chordStyle: {
                            lineStyle: {
                                width: 1,
                                color: 'rgba(128, 128, 128, 0.5)'
                            }
                        }
                    }
                }
            },
            gauge: {
                startAngle: 225,
                endAngle: -45,
                axisLine: {
                    show: true,
                    lineStyle: {
                        color: [[0.2, '#86b379'], [0.8, '#68a54a'], [1, '#408829']],
                        width: 8
                    }
                },
                axisTick: {
                    splitNumber: 10,
                    length: 12,
                    lineStyle: {
                        color: 'auto'
                    }
                },
                axisLabel: {
                    textStyle: {
                        color: 'auto'
                    }
                },
                splitLine: {
                    length: 18,
                    lineStyle: {
                        color: 'auto'
                    }
                },
                pointer: {
                    length: '90%',
                    color: 'auto'
                },
                title: {
                    textStyle: {
                        color: '#333'
                    }
                },
                detail: {
                    textStyle: {
                        color: 'auto'
                    }
                }
            },
            textStyle: {
                fontFamily: 'Arial, Verdana, sans-serif'
            }
        };


        if ($('#echart_line').length ){

            var echartLine = echarts.init(document.getElementById('echart_line'), theme);

            echartLine.setOption({
                title: {
                    text: 'Acesso por Período',
                    subtext: 'Acompanhemento'
                },
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    x: 220,
                    y: 40,
                    data: dados.names_users
                },
                toolbox: {
                    show: true,
                    feature: {
                        magicType: {
                            show: true,
                            title: {
                                line: 'Line',
                                bar: 'Bar',
                                stack: 'Stack',
                                tiled: 'Tiled'
                            },
                            type: ['line', 'bar', 'stack', 'tiled']
                        },
                        restore: {
                            show: true,
                            title: "Restore"
                        },
                        saveAsImage: {
                            show: true,
                            title: "Save Image"
                        }
                    }
                },
                calculable: true,
                xAxis: [{
                    type: 'category',
                    boundaryGap: false,
                    data: dados.labels
                }],
                yAxis: [{
                    type: 'value'
                }],
                series: dados.data
            });

        }
    }
</script>
@stop