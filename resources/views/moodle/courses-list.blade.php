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
    {!! HTML::style('packages/gentelella/vendors/iCheck/skins/flat/green.css') !!}
    <!-- Datatables -->
    {{--<link href="../vendors/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') !!}
    {{--<link href="../vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') !!}
    {{--<link href="../vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') !!}
    {{--<link href="../vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') !!}
    {{--<link href="../vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') !!}

    <!-- Custom Theme Style -->
    {{--<link href="../build/css/custom.min.css" rel="stylesheet">--}}
    {{--{!! HTML::style('packages/gentelella/build/css/custom.min.css') !!}--}}

@section('content')

    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title bariol-thin"><i class="fa fa-book"></i> Disciplinas</h3>
        </div>
        <div class="panel-body">
            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>{{ $curso_info->fullname}}</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content" style="overflow:auto;">
                            <p class="text-muted font-13 m-b-30">
                                Este listagem mostra todos as disciplinas que estão cadastradas no Curso.
                            </p>

                            <table id="courses" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    {{--<th>ID</th>--}}
                                    <th>Nome</th>
                                    <th>Categoria</th>
                                    <th>Alunos</th>
                                    <th>Início</th>
                                    <th>Visível</th>
                                    <th>Modificado</th>
                                </tr>
                                </thead>
                                <tbody id="tabela_id">
                                <tr>
                                    <td colspan="6">Nenhum registro encontrado!</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
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
<!-- iCheck -->
{{--<script src="../vendors/iCheck/icheck.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/iCheck/icheck.min.js') !!}
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



    localStorage.setItem('categorieid', getUrlParameters("curso", "", true));

    var courses = function(){

        var curso = getUrlParameters("category_id", "", true);

        if(curso != false){

            $.ajax({
                type: "POST",
                url: URL_API + "?type=modulos_curso&curso="+curso,
                dataType: "json",
                data: {} ,
                success: function (data) {
                    var html = '';
                    $.each(data, function(index, item){

                        html += '<tr>'+
                            // '<td>'+item.id+'</td>'+
                            '<td><a onclick="config_disciplina(\''+item.nome+'\')" href="/admin/reports/accesscourses/?courseid='+item.id+'">'+item.nome+'</a></td>'+
                            // '<td><a href="courses.html?curso='+item.id+'">'+item.nome+'</a></td>'+
                            '<td>'+item.categoria+'</td>'+
                            '<td><a onclick="config_disciplina(\''+item.nome+'\')" href="admin/reports/accesscourses/?courseid='+item.id+'">'+item.alunos+'</a></td>'+
                            '<td>'+item.inicio+'</td>'+
                            '<td>'+item.visivel+'</td>'+
                            '<td>'+item.modificacao+'</td>'+
                            '</tr>';
                    });

                    html += '';
                    if(html == ''){
                        html += '<tr>'+
                            '<td colspan="7">Nenhum registro encontrado!</td>'+
                            '</tr>';
                    }

                    $("#tabela_id").html(html);
                    $('#courses').DataTable();
                }
            });
        }else{
            location.href = '/';
        }
    }

    courses();


</script>
@stop