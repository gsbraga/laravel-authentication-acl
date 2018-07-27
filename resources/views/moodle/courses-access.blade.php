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

    <!-- bootstrap-daterangepicker -->
    {{--<link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.css') !!}
    <!-- bootstrap-datetimepicker -->
    {{--<link href="../vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/vendors/bootstrap-datetimepicker/build/css/bootstrap-datetimepicker.css') !!}

    <!-- Custom Theme Style -->
    {{--<link href="../build/css/custom.min.css" rel="stylesheet">--}}
    {!! HTML::style('packages/gentelella/build/css/custom.min.css') !!}

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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="first-name">Polo <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-8 form-group has-feedback">
                                        <select onchange="troca_modulo()" id="polo_id" name="polo_id" required="required" class="form-control col-md-7 col-xs-12">
                                            <option value="0">TODOS</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group" style="display: none;">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="last-name">Perfil <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-8 form-group has-feedback">
                                        <select id="role_id" name="role_id" required="required" class="form-control col-md-7 col-xs-12">
                                            <option value="0">Selecione um perfil</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="last-name">Data início <span class="required">*</span></label>
                                    <div class="col-md-4 col-sm-6 col-xs-8 form-group has-feedback">
                                        <input type="text" class="form-control" id="date_initial" name="date_initial" data-inputmask="'mask': '99/99/9999'" placeholder="dd/mm/AAAA">
                                        {{--<span class="glyphicon glyphicon-calendar form-control-feedback right" aria-hidden="true"></span>--}}
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="last-name">Data fim <span class="required">*</span></label>
                                    <div class="col-md-4 col-sm-6 col-xs-8 form-group has-feedback">
                                        <input type="text" id="date_final" name="date_final" class="form-control" data-inputmask="'mask': '99/99/9999'" placeholder="dd/mm/AAAA">
                                        {{--<span class="glyphicon glyphicon-calendar form-control-feedback right" aria-hidden="true"></span>--}}
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-default" type="reset">Limpar campos</button>
                                        <button type="button" onclick="acessoModulo()" class="btn btn-success">Pesquisar</button>
                                    </div>
                                </div>

                                <div class="form-group loading_icon" style="display: none;">
                                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"></div>

                                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4">
                                        <img src="/images/load.gif" width="90" alt="">
                                    </div>

                                    <div class="col-md-4 col-sm-4 col-xs-4 col-lg-4"></div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Atividades realizadas</h2>

                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <p class="text-muted font-13 m-b-30 period-descritption-show" style="display: none;">

                            </p>

                            <table id="access_course" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>CPF</th>
                                    <th>E-mail</th>
                                    <th>Nome</th>
                                    <th>Polo</th>
                                    <th>Fórum</th>
                                    <th>Atividades</th>
                                    <th>Questionário</th>
                                    <th>Último Acesso</th>
                                </tr>
                                </thead>
                            </table>
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
{!! HTML::script('packages/gentelella/vendors/jquery.inputmask/dist/min/jquery.inputmask.bundle.min.js') !!}

<!-- bootstrap-daterangepicker -->
{{--<script src="../vendors/moment/min/moment.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/moment/min/moment.min.js') !!}

{{--<script src="../vendors/bootstrap-daterangepicker/daterangepicker.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/bootstrap-daterangepicker/daterangepicker.js') !!}

{{--<script src="../vendors/iCheck/icheck.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/iCheck/icheck.min.js') !!}

<!-- bootstrap-datetimepicker -->
{{--<script src="../vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js"></script>--}}
{!! HTML::script('packages/gentelella/vendors/bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js') !!}

{!! HTML::script('https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js') !!}
{!! HTML::script('https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js') !!}
{!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js') !!}
{!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js') !!}
{!! HTML::script('https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js') !!}
{!! HTML::script('https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js') !!}


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

    var table;

    $('#date_initial, #date_final').datetimepicker({
        format: 'DD/MM/YYYY'
    });

    var course_info = function(){

        var courseid = getUrlParameters("courseid", "", true);

        $.get( URL_API + "?type=modulo_curso&courseid="+courseid, function( data ) {

            $("#nome_disciplina").html(data.nome);
            $("#inicio_disciplina").html(data.inicio);
            $("#status_disciplina").html(data.visivel);
            $("#alunos_disciplina").html(data.alunos);
            $(".info_modulo").show();

        }, "json");

    }
    course_info();

    var grupos_modulo = function(){

        var courseid = getUrlParameters("courseid", "", true);

        $.get( URL_API + "?type=grupos_modulo&courseid="+courseid, function( data ) {

            var html = '';
            $.each(data, function(index, item){
                html += '<option value="'+ item.id +'">'+ item.nome +'</option>';
            });
            $("#polo_id").append(html);
            // console.log(html);

            var groupid = getUrlParameters("groupid", "", true);
            if(groupid != false){
                $("#polo_id").val(groupid);
            }

        }, "json");
    }

    grupos_modulo();

    var troca_modulo = function(){
        if ( $.fn.dataTable.isDataTable( '#access_course' ) ) {
            table.destroy();
            $('#access_course tbody').html('<tr><td colspan="8"></td></tr>');
        }
    }

    var perfis_modulo = function(){
        var courseid = getUrlParameters("courseid", "", true);

        $.get( URL_API + "?type=perfis_modulo&courseid="+courseid, function( data ) {

            var html = '';
            $.each(data, function(index, item){
                html += '<option value="'+ item.id +'">'+ item.nome +'</option>';
            });
            $("#role_id").append(html);
            $('#role_id option[value=5]').attr('selected','selected');

        }, "json");
    }

    perfis_modulo();

    var acessoModulo = function(){
        $('.loading_icon').show();

        var flag = true;
        $('form input').each(function (x, y) {
            // console.log($(y).val().length);
            if ($(y).val().length == 0 ) {
                flag = false;
            }
        });

        if(!flag){
            $('.loading_icon').hide();

            alert('Escolha a data de início e fim.');
            return false;
        }

        $('.period-descritption-show').html('Esta listagem mostra todos os acessos dos alunos entre '+$('#date_initial').val()+' até '+$('#date_final').val()+'.');
        $('.period-descritption-show').show();

        var courseid = getUrlParameters("courseid", "", true);
        $.ajax({
            type: "POST",
            url: URL_API + "?type=acesso_alunos_modulo&courseid="+courseid,
            dataType: "json",
            data: $( "#search_form" ).serialize() ,
            success: function (data) {
                var dados = [];
                $.each(data, function(index, acesso){

                    // html += '<tr>'+
                    //             '<td>'+acesso.cpf+'</td>'+
                    //             '<td>'+acesso.email+'</td>'+
                    //             '<td><a target="_blank" href="access_activity.html?userid='+acesso.id+'&courseid='+courseid+'&date_initial='+$('#date_initial').val()+'&date_final='+$('#date_final').val()+'">'+acesso.nome+'</a></td>'+
                    //             '<td>'+acesso.grupo+'</td>'+
                    //             '<td>'+acesso.forum_feito+'/'+acesso.forum+'</td>'+
                    //             '<td>'+acesso.atividade_feita+'/'+acesso.atividades+'</td>'+
                    //             '<td>'+acesso.questionario_feito+'/'+acesso.questionario+'</td>'+
                    //             '<td>'+acesso.ultimoacesso+'</td>'+
                    //         '</tr>';
                    dados.push({
                        'CPF': acesso.cpf,
                        'E-mail': acesso.email,
                        'Nome': '<a target="_blank" href="/admin/reports/accessactivity/?userid='+acesso.id+'&courseid='+courseid+'&date_initial='+$('#date_initial').val()+'&date_final='+$('#date_final').val()+'">'+acesso.nome+'</a>',
                        'Polo': acesso.grupo,
                        'Fórum': acesso.forum_feito+' / '+acesso.forum,
                        'Atividades': acesso.atividade_feita+' / '+acesso.atividades,
                        'Questionário': acesso.questionario_feito+' / '+acesso.questionario,
                        'Último Acesso': acesso.ultimoacesso
                    });
                });


                // var table = $('#access_course').DataTable();

                if ( $.fn.dataTable.isDataTable( '#access_course' ) ) {

                    table.destroy();
                }
                table = $('#access_course').DataTable( {
                    paging: true,
                    data: dados,
                    columns: [
                        {data: 'CPF' },
                        {data: 'E-mail' },
                        {data: 'Nome' },
                        {data: 'Polo' },
                        {data: 'Fórum' },
                        {data: 'Atividades' },
                        {data: 'Questionário' },
                        {data: 'Último Acesso' }
                    ],
                    dom: "Blfrtip",
                    buttons: [
                        {
                            extend: "copy",
                            className: "btn-sm"
                        },
                        {
                            extend: "csv",
                            className: "btn-sm"
                        },
                        {
                            extend: "excel",
                            className: "btn-sm"
                        },
                        // {
                        //   extend: "pdfHtml5",
                        //   className: "btn-sm"
                        // },
                        // {
                        //   extend: "print",
                        //   className: "btn-sm"
                        // }
                    ],
                    // buttons: [
                    //     $.extend( true, {}, buttonCommon, {
                    //         extend: 'copyHtml5'
                    //     } ),
                    //     $.extend( true, {}, buttonCommon, {
                    //         extend: 'excelHtml5'
                    //     } ),
                    //     $.extend( true, {}, buttonCommon, {
                    //         extend: 'pdfHtml5'
                    //     } )
                    // ],
                    responsive: true
                } );
                $('.loading_icon').hide();

            }
        });

    }

</script>
@stop