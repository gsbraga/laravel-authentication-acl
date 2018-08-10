@extends('laravel-authentication-acl::admin.layouts.base-1cols')
{{--@extends('laravel-authentication-acl::moodle.layouts.defaultmoodle')--}}

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
    {{--{!! HTML::style('packages/gentelella/vendors/nprogress/nprogress.css') !!}--}}
    <!-- iCheck -->
    {{--<link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">--}}
    {{--{!! HTML::style('packages/gentelella/vendors/iCheck/skins/flat/green.css') !!}--}}
    <!-- Datatables -->
    {{--<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">--}}
{{--    {!! HTML::style('packages/gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}--}}
    {{--<link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">--}}
{{--    {!! HTML::style('packages/gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') !!}--}}
    {{--<link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">--}}
{{--    {!! HTML::style('packages/gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') !!}--}}
    {{--<link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">--}}
{{--    {!! HTML::style('packages/gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') !!}--}}
    {{--<link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">--}}
    {{--{!! HTML::style('packages/gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') !!}--}}

    <!-- Custom Theme Style -->
    {{--<link href="../build/css/custom.min.css" rel="stylesheet">--}}
    {{--{!! HTML::style('packages/gentelella/build/css/custom.min.css') !!}--}}

@section('content')

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title bariol-thin"><i class="fa fa-bar-chart-o"></i> Acessos</h3>
        </div>
        <div class="panel-body">

                <div class="row">
                    <div class="col-md-3 col-sm-12 col-xs-12 col-lg-3">
                        <div class="x_panel">
                            <div class="x_title">
                                <h2>Informe os dados da pesquisa:</h2>
                                <div class="clearfix"></div>
                            </div>
                            <div class="x_content">
                                <br />
                                <form id="search_form" class="form-horizontal form-label-left">

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-4" for="first-name">Curso:
                                        </label>
                                        <div class=" col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <select onchange="troca_category()" id="categoryid" name="categoryid" required="required" class="form-control col-md-7 col-xs-12">
                                                <option value="0">Selecione um Curso</option>
                                            </select>
                                            <span id="link_courseid"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-4" for="first-name">Disciplina:
                                        </label>
                                        <div class=" col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <select onchange="troca_course()" id="courseid" name="courseid" required="required" class="form-control col-md-7 col-xs-12">
                                                <option value="0">Selecione uma Disciplina</option>
                                            </select>
                                            <span id="link_courseid"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-4" for="first-name">Perfil:
                                        </label>
                                        <div class="col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <select id="roleid" onchange="troca_perfil()" name="roleid" required="required" class="form-control col-md-7 col-xs-12">
                                                <option value="0">Selecione um Perfil</option>
                                            </select>
                                            <span id="link_courseid"></span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-4" for="last-name">Polo:
                                        </label>
                                        <div class=" col-md-12 col-sm-12 col-xs-12 form-group has-feedback">
                                            <select onchange="troca_group()" id="group_name" name="group_name" required="required" class="form-control col-md-7 col-xs-12">
                                                <option value="0">TODOS</option>
                                            </select>
                                            <span id="link_group_name"></span>
                                        </div>
                                    </div>

                                    <!-- <div class="ln_solid"></div>
                                    <div class="form-group">
                                      <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary" type="reset">Limpar campos</button>
                                        <button type="button" onclick="qtd_dias_online()" class="btn btn-success">Mostrar</button>
                                      </div>
                                    </div> -->



                                </form>
                            </div>
                        </div>
                    </div>


                    <!-- bar chart -->
                    <div class="col-md-9 col-sm-12 col-xs-12 col-lg-9">
                        <div class="x_panel">
                            <div class="x_title">
                                {{--<h2>Acesso por dia</h2>--}}
                                <ul class="nav navbar-right panel_toolbox">
                                    <!-- <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a> -->
                                    </li>
                                    <li class="dropdown">
                                        <!-- <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a> -->
                                        <!--  <ul class="dropdown-menu" role="menu">
                                           <li><a href="#">Settings 1</a>
                                           </li>
                                           <li><a href="#">Settings 2</a>
                                           </li>
                                         </ul> -->
                                    </li>
                                    <!-- <li><a class="close-link"><i class="fa fa-close"></i></a> -->
                                    </li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                            <!-- <div class="x_content">
                              <div id="graph_bar" style="width:100%; height:280px;"></div>
                            </div> -->
                            <div class="form-group loading_icon" style="display: none;">
                                <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"></div>

                                <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                                    <img src="/images/load.gif" width="90" alt="">
                                </div>

                                <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"></div>
                            </div>
                            <div class="x_content">

                                <div id="echart_line" style="height:350px;"></div>

                            </div>
                        </div>
                        <a id="chart-view" href="#"></a>
                    </div>
                </div>
                <!-- /bar charts -->

            </div>
        </div>
    </div>



@stop
@section('footer_scripts')

<!-- jQuery -->
{{--<script src="../vendors/jquery/dist/jquery.min.js"></script>--}}
{{--{!! HTML::script('packages/gentelella/vendors/jquery/dist/jquery.min.js') !!}--}}
<!-- Bootstrap -->
{{--<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>--}}
{{--{!! HTML::script('packages/gentelella/vendors/bootstrap/dist/js/bootstrap.min.js') !!}--}}
<!-- FastClick -->
{{--<script src="../vendors/fastclick/lib/fastclick.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/fastclick/lib/fastclick.js') !!}
<!-- NProgress -->
{{--<script src="../vendors/nprogress/nprogress.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/nprogress/nprogress.js') !!}
<!-- iCheck -->
{!! HTML::script('packages/gentelella/vendors/echarts/dist/echarts.js') !!}
{!! HTML::script('packages/gentelella/vendors/echarts/map/js/world.js') !!}
<!-- Datatables -->
{{--<script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/datatables.net/js/jquery.dataTables.min.js') !!}
{{--<script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') !!}
{{--<script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') !!}
{{--<script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') !!}
{{--<script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/datatables.net-buttons/js/buttons.flash.min.js') !!}
{{--<script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/datatables.net-buttons/js/buttons.html5.min.js') !!}
{{--<script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/datatables.net-buttons/js/buttons.print.min.js') !!}
{{--<script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') !!}
{{--<script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') !!}
{{--<script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') !!}
{{--<script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') !!}
{{--<script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') !!}
{{--<script src="../vendors/jszip/dist/jszip.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/jszip/dist/jszip.min.js') !!}
{{--<script src="../vendors/pdfmake/build/pdfmake.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/pdfmake/build/pdfmake.min.js') !!}
{{--<script src="../vendors/pdfmake/build/vfs_fonts.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/pdfmake/build/vfs_fonts.js') !!}

<!-- Custom Theme Scripts -->
{{--<script src="../build/js/custom.min.js"></script>--}}
{{--{!! HTML::script('packages/gentelella/build/js/custom.min.js') !!}--}}
{{--<script src="js/config.js"></script>--}}
{!! HTML::script('packages/gentelella/build/js/config.js') !!}

<script type="text/javascript">

    /* CHART - MORRIS  */

    var qtd_dias_online2222 = function(){
        $('.loading_icon').show();


        var categoryid = $('#categoryid').val();
        var courseid = $('#courseid').val();
        var roleid = $('#roleid').val();
        var group_name=  $('#group_name').val();


        $.ajax({
            type: "POST",
            url: URL_API + "?type=qtd_dias_online&category="+categoryid+"&courseid="+courseid+"&roleid="+roleid+"&group_name="+group_name,
            // url: 'http://localhost/nead/api-monit/api.json',
            dataType: "json",
            success: function (data) {
                if(data == 0){
                    $('#graph_bar').html('<h2 class="red">Nenhum dado encontrado!</h2>');
                    return false;
                }
                var aux = [];
                $.each(data, function(index, item){
                    aux.push({device: item.date, geekbench: item.users});


                });
                // $('#grafico_acesso_user').show();
                window.location.href = '#chart-view';
                console.log(aux);
                $('#graph_bar').html('');
                init_morris_charts2(aux);
                $('.loading_icon').hide();

            }
        });
    }

    function init_morris_charts2(dados) {

        if( typeof (Morris) === 'undefined'){ return; }
        console.log('init_morris_charts');


        if ($('#graph_bar').length){

            Morris.Bar({
                element: 'graph_bar',
                data: dados,
                xkey: 'device',
                ykeys: ['geekbench'],
                labels: ['Ultimo acesso'],
                barRatio: 0.4,
                barColors: ['#26B99A', '#34495E', '#ACADAC', '#3498DB'],
                xLabelAngle: 35,
                hideHover: 'auto',
                resize: true
            });

        }

    }

    var troca_category = function(){
        if($('#categoryid').val() > 0){
            grupos();
        }
        courses();
        qtd_dias_online();
    }

    var troca_course = function(){
        // if($('#courseid').val() > 0){
        // grupos();
        qtd_dias_online();
        // }
    }

    var troca_group = function(){
        // if($('#courseid').val() > 0){

        qtd_dias_online();
        // }
    }

    var troca_perfil = function(){
        qtd_dias_online();
    }

    var categories = function(){

        $.get( URL_API + "?type=cursos_moodle", function( data ) {

            var html = '<option value="0">TODOS</option>';
            $.each(data, function(index, item){
                html += '<option value="'+ item.id +'">'+ item.nome +'</option>';
            });
            $("#categoryid").html(html);
        }, "json");
    }

    categories();

    var courses = function(){

        var categoryid = $("#categoryid").val();

        $.get( URL_API + "?type=modulos_curso&curso="+categoryid, function( data ) {

            var html = '<option value="0">TODOS</option>';
            $.each(data, function(index, item){
                html += '<option value="'+ item.id +'">'+ item.nome +'</option>';
            });
            $("#courseid").html(html);
        }, "json");
    }

    var grupos = function(){
        var courseid =$("#courseid").val();
        var categoryid =$("#categoryid").val();

        $.get( URL_API + "?type=grupos_modulo&courseid="+courseid+"&categoryid="+categoryid, function( data ) {

            var html = '<option value="0">TODOS</option>';
            $.each(data, function(index, item){
                html += '<option value="'+ item.nome +'">'+ item.nome +'</option>';
            });
            $("#group_name").html(html);
        }, "json");
    }

    var perfis_modulo = function(){
        var courseid =$("#courseid").val();

        $.get( URL_API + "?type=perfis_modulo&courseid="+courseid, function( data ) {

            var html = '<option value="0">TODOS</option>';
            $.each(data, function(index, item){
                // if(item.id != 5)
                html += '<option value="'+ item.id +'">'+ item.nome +'</option>';
            });
            $("#roleid").html(html);

        }, "json");
    }

    perfis_modulo();

    var qtd_dias_online = function(){
        $('.loading_icon').show();

        var categoryid = $('#categoryid').val();
        var courseid = $('#courseid').val();
        var roleid = $('#roleid').val();
        var group_name=  $('#group_name').val();

        $.ajax({
            type: "GET",
            // url: URL_API + "?type=qtd_dias_online2&category=29&courseid=0&roleid=0&group_name=0",
            url: URL_API + "?type=qtd_dias_online2&category="+categoryid+"&courseid="+courseid+"&roleid="+roleid+"&group_name="+group_name,
            // url: 'http://localhost/nead/api-monit/api.json',
            dataType: "json",
            success: function (data) {

                var dados = {names:[], labels:[], data:[]};

                // $.each(data.acesso, function(index, item){


                dados.names.push('Acesso');
                dados.names.push('Sem Acesso');
                var aux_data = [];
                var label = '';
                // if(index == 'acesso'){


                for(x in data.acesso){
                    label = data.acesso[x].date;
                    dados.labels.push(label);
                    aux_data.push(data.acesso[x].users);
                }

                dados.data.push({
                    name: 'Acesso',
                    type: 'bar',
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

                // }else{
                var aux_data = [];
                for(x in data.semacesso){

                    label = data.semacesso[x].date;
                    dados.labels.push(label);
                    aux_data.push(data.semacesso[x].users);
                }

                // }

                dados.data.push({
                    name: 'Sem Acesso',
                    type: 'bar',
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




                // });
                $('#grafico_acesso_user').show();
                window.location.href = '#chart-view';
                console.log(dados);
                init_echarts(dados);
                $('.loading_icon').hide();

            }
        });

    }

    qtd_dias_online();

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
                    text: 'Acesso por dia',
                    subtext: 'Acompanhamento'
                },
                tooltip: {
                    trigger: 'axis'
                },
                legend: {
                    x: 220,
                    y: 40,
                    data: dados.names
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
                    boundaryGap: true,
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