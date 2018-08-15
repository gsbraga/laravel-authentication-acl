@extends('laravel-authentication-acl::admin.layouts.base-2cols')
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
    {!! HTML::style('packages/gentelella/build/css/custom.min.css') !!}

@section('content')

    <div class="panel panel-info">
        <div class="panel-heading">
            <h2 class="panel-title bariol-thin"><i class="fa fa-bar-chart-o"></i> Acesso dos usuários </h2>
        </div>
        <div class="panel-body">

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Informe os dados da pesquisa:</h2>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="search_form" class="form-horizontal form-label-left">

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="first-name">Curso <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-8 form-group has-feedback">
                                        <select onclick="troca_curso()" id="cursoid" name="cursoid" required="required" class="form-control col-md-7 col-xs-12">
                                            <option value="0">Selecione um Curso</option>
                                            @foreach($courses as $course)
                                                <option value="{{ $course->category_id }}">{{ $course->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="first-name">Disciplina <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-8 form-group has-feedback">
                                        <select onclick="troca_course()" id="courseid" name="courseid" required="required" class="form-control col-md-7 col-xs-12">
                                            <option value="0">Selecione uma Displina</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="first-name">Polo <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-8 form-group has-feedback">
                                        <select id="groupid" name="groupid" required="required" class="form-control col-md-7 col-xs-12">
                                            <option value="0">Selecione um Polo</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="last-name">Perfil <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-8 form-group has-feedback">
                                        <select id="roleid" name="roleid" required="required" class="form-control col-md-7 col-xs-12">
                                            <option value="0">Selecione um perfil</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary" type="reset">Limpar campos</button>
                                        <button type="button" onclick="ShowChartsUsers()" class="btn btn-success">Pesquisar</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row" id="access_course_div" style="display: none;">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_content">
                            <p class="text-muted font-13 m-b-30">
                                Selecione os usuários que deseja visualizar o gráfico.
                            </p>
                            <table id="access_course" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <!-- <th>CPF</th> -->
                                    <th>Nome</th>
                                    <th>Polo</th>
                                    <th>Último Acesso</th>
                                    <th>Selecione</th>
                                </tr>
                                </thead>
                                <tbody id="tabela_id">
                                <tr>
                                    <td colspan="3">Nenhum registro encontrado!</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- <button style="display: none;" id="chart-view" type="button" onclick="countChartsUsers()" class="btn btn-success">Gráfico</button> -->

                    </div>
                </div>

            </div>

            <div class="clearfix"></div>

            <div class="row" style="display: none;" id="grafico_acesso_user">

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

    var categories = function(){

        $.get( URL_API + "?type=cursos_moodle", function( data ) {

            var html = '';
            $.each(data, function(index, item){
                html += '<option value="'+ item.id +'">'+ item.nome +'</option>';
            });
            $("#cursoid").append(html);

        }, "json");

    }

    // categories();

    var courses = function(){

        var curso = $("#cursoid").val();

        $.get( URL_API + "?type=modulos_curso&curso="+curso, function( data ) {

            var html = '<option value="0">Selecione uma Displina</option>';
            $.each(data, function(index, item){
                html += '<option value="'+ item.id +'">'+ item.nome +'</option>';
            });
            $("#courseid").html(html);
        }, "json");
        $('#access_course_div').hide();

    }

    var grupos = function(){
        var courseid =$("#courseid").val();

        $.get( URL_API + "?type=grupos_modulo&courseid="+courseid, function( data ) {

            var html = '<option value="0">TODOS</option>';
            $.each(data, function(index, item){
                html += '<option value="'+ item.id +'">'+ item.nome +'</option>';
            });
            $("#groupid").html(html);
        }, "json");
        $('#grafico_acesso_user').hide();
        $('#access_course_div').hide();
    }

    var perfis_modulo = function(){
        var courseid =$("#courseid").val();

        $.get( URL_API + "?type=perfis_modulo&courseid="+courseid, function( data ) {

            var html = '';
            $.each(data, function(index, item){
                // if(item.id != 5)
                html += '<option value="'+ item.id +'">'+ item.nome +'</option>';
            });
            $("#roleid").html(html);

        }, "json");
        $('#grafico_acesso_user').hide();
        $('#access_course_div').hide();
    }


    var troca_curso = function(){
        if($('#cursoid').val() > 0){
            courses();
        }
        $('#grafico_acesso_user').hide();
        $('#access_course_div').hide();
    }

    var troca_course = function(){
        if($('#courseid').val() > 0){
            grupos();
            perfis_modulo();
        }

        $('#access_course_div').hide();
    }


    var ShowChartsUsers = function(){

        var flag = true;
        $('form input, form select').each(function (x, y) {
            console.log($(y).val().length);
            if ($(y).val().length == 0 ) {
                flag = false;
            }
        });

        if(!flag){
            alert('Todos os campos são obrigatórios.');
            return false;
        }

        $.ajax({
            type: "POST",
            url: URL_API + "?type=access_tutor",
            dataType: "json",
            data: $( "#search_form" ).serialize() ,
            success: function (data) {
                var html = '';
                $.each(data, function(index, acesso){

                    html += '<tr>'+
                        // '<td>'+acesso.cpf+'</td>'+
                        '<td>'+acesso.nome+'</td>'+
                        '<td>'+acesso.grupo+'</td>'+
                        '<td>'+acesso.ultimoacesso+'</td>'+
                        '<td><input onclick="checkUsers('+acesso.id+')" type="checkbox" class="chart-user" name="chart[]" id="chart-'+acesso.id+'" value="'+acesso.id+'" data-parsley-mincheck="2" class="flat" /></td>'+
                        '</tr>';
                });

                html += '';
                if(html == ''){
                    html += '<tr>'+
                        '<td colspan="4">Nenhum registro encontrado!</td>'+
                        '</tr>';
                }
                $("#tabela_id").html(html);
                $('#access_course').DataTable();
                $('#access_course_div').show();
            }
        });

    }

    var checkUsers = function(userid){

        var data = [];
        $('.chart-user').each(function (x, y) {
            if($(this).is(':checked') == true)
                data.push($(this).val())
        });


        if(data.length > 0){

            countChartsUsers();
        }else{
            console.log('data');
            $('#grafico_acesso_user').hide();
        }
    }

    var countChartsUsers = function(){

        var users = [];
        $('.chart-user').each(function (x, y) {
            if($(this).is(':checked') == true)
                users.push($(this).val())
        });

        if(users.length == 0){
            alert('Escolha algum usuário para ver o gráfico.');
            return false;
        }
        console.log(users);
        $.ajax({
            type: "POST",
            url: URL_API + "?type=count_access_tutor&courseid="+$('#courseid').val(),
            // url: 'http://localhost/nead/api-monit/api.json',
            dataType: "json",
            data: $('.chart-user').serialize(),
            success: function (data) {

                var dados = {names:[], labels:[], data:[]};

                $.each(data, function(index, item){

                    dados.names.push(item.nome);
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