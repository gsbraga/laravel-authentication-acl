@extends('laravel-authentication-acl::admin.layouts.base-2cols')
{{--@extends('laravel-authentication-acl::moodle.layouts.defaultmoodle')--}}

@section('title')
    Relatório de Fórum
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

            <div class="row info_modulo">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <label class="control-label col-md-2 col-sm-2 col-xs-2 col-lg-1" for="first-name">Curso: </label>
                    <span id="nome_disciplina" class="col-md-10 col-sm-10 col-xs-10">{{ $curso_info->name }} - {{ $curso_info->fullname }}</span>
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
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="first-name">Disciplina <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-8 form-group has-feedback">
                                        <select onchange="troca_course()" id="courseid" name="courseid" required="required" class="form-control col-md-7 col-xs-12">
                                            <option value="0">Selecione uma Disciplina</option>
                                        </select>
                                        <span id="link_courseid"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="last-name">Fórum <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-8 form-group has-feedback">
                                        <select onchange="troca_forum()" id="forumid" name="forumid" required="required" class="form-control col-md-7 col-xs-12">
                                            <option value="0">Selecione um Fórum</option>
                                        </select>
                                        <span id="link_forumid"></span>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-4" for="last-name">Polo <span class="required">*</span>
                                    </label>
                                    <div class="col-md-4 col-sm-6 col-xs-8 form-group has-feedback">
                                        <select onchange="troca_group()" id="groupid" name="groupid" required="required" class="form-control col-md-7 col-xs-12">
                                            <option value="0">TODOS</option>
                                        </select>
                                        <span id="link_groupid"></span>
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-12 col-sm-12 col-xs-12 col-md-offset-3">
                                        <button class="btn btn-primary" type="reset">Limpar campos</button>
                                        <button type="button" onclick="showForuns()" class="btn btn-success">Pesquisar</button>
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
                            <h2>Fórum</h2>
                            <!-- <ul class="nav navbar-right panel_toolbox">
                              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                              </li>
                              <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>

                              </li>
                              <li><a class="close-link"><i class="fa fa-close"></i></a>
                              </li>
                            </ul> -->
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <p class="text-muted font-13 m-b-30">
                                Este relatório mostra todos os envios do dórum e feedbacks.
                            </p>
                            <div class="nome_tutor"></div>

                            <table id="forum_course" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>Polo</th>
                                    <th>Participações</th>
                                    <th>Feedbacks</th>
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

    var foruns_id = [];
    var table;

    var showLinks = function(){
        if($("#courseid").val() != 0){
            $("#link_courseid").html('<a class="red" target="_blank" href="'+aux_info.url+'/course/view.php?id='+ $("#courseid").val()+'">Disciplina</a>');
        }else{
            $("#link_courseid").html('<a></a>');
        }

        if($("#forumid").val() != 0){
            var forumlink = 0;
            for(x in foruns_id){
                if($("#forumid").val() == foruns_id[x].id){
                    forumlink = foruns_id[x].instance;
                    break;
                }
            }
            $("#link_forumid").html('<a class="red" target="_blank" href="'+aux_info.url+'/mod/forum/view.php?id='+ forumlink +'">Fórum</a>');
        }else{
            $("#link_forumid").html('<a></a>');
        }

        if($("#groupid").val() != 0 && $("#courseid").val() != 0){
            $("#link_groupid").html('<a class="red" target="_blank" href="'+aux_info.url+'/enrol/users.php?id='+$("#courseid").val()+'&filtergroup='+ $("#groupid").val()+'">Grupo</a>');
        }else{
            $("#link_groupid").html('<a></a>');
        }

    }

    var limpar_dados = function(){

        if ( $.fn.dataTable.isDataTable( '#forum_course' ) ) {
            table.clear();
            table.destroy();
        }

        $(".nome_tutor").html('');
    }

    var courses = function(){

        var curso = getUrlParameters("curso", "", true);

        $.get( URL_API + "?type=modulos_curso&curso="+curso, function( data ) {

            var html = '';
            $.each(data, function(index, item){
                html += '<option value="'+ item.id +'">'+ item.nome +'</option>';
            });
            $("#courseid").append(html);
        }, "json");
    }

    courses();

    var troca_course = function(){
        if($('#courseid').val() > 0){
            foruns($('#courseid').val());
            grupos($('#courseid').val());
        }
        limpar_dados();
        showLinks();
    }

    var troca_forum = function(){
        limpar_dados();
        showLinks();
    }

    var troca_group = function(){
        limpar_dados();
        showLinks();
    }

    var foruns = function(courseid){

        $.get( URL_API + "?type=foruns_modulo&courseid="+courseid, function( data ) {

            var html = '';
            $.each(data, function(index, item){
                html += '<option value="'+ item.id +'">'+ item.name +'</option>';
                foruns_id.push(item);
            });
            $("#forumid").append(html);
        }, "json");
    }

    var grupos = function(courseid){

        $.get( URL_API + "?type=grupos_modulo&courseid="+courseid, function( data ) {

            var html = '<option value="0">TODOS</option>';
            $.each(data, function(index, item){
                html += '<option value="'+ item.id +'">'+ item.nome +'</option>';
            });
            $("#groupid").html(html);
        }, "json");
    }

    var nome_tutor = function(){
        var courseid = $('#courseid').val();
        var groupid = $('#groupid').val();

        $.get( URL_API + "?type=name_tutor&courseid="+courseid+"&groupid="+groupid, function( data ) {

            var html = '';
            $.each(data, function(index, item){
                // if(data.length > 1 && index > 0){
                //     html += '';
                // }
                html += '<li class="red">'+item.nome+'</li>';
            });

            $(".nome_tutor").html('<small style="color: black;">Tutor:</small> <ul>'+html+'</li>');

        }, "json");

    }

    var showForuns = function(){

        $('.loading_icon').show();
        var flag = true;
        $('form input, form select').each(function (x, y) {
            console.log($(y).val().length);
            if ($(y).val().length == 0 ) {
                flag = false;
            }
        });

        if(!flag){

            $('.loading_icon').hide();
            alert('Todos os campos são obrigatórios');
            return false;
        }

        nome_tutor();

        var groupid = $('#groupid').val();
        var forumid = $('#forumid').val();
        var courseid = $('#courseid').val();

        $.ajax({
            type: "GET",
            url: URL_API + "?type=forum_student&courseid="+courseid+"&groupid="+groupid+"&forumid="+forumid,
            dataType: "json",
            success: function (data) {
                // var html = '';
                var grupo = '-';
                var dados = [];

                $.each(data, function(index, item){
                    if(item.grupo == null){ grupo = '-'; }else{grupo = item.grupo;}

                    // html += '<tr>'+
                    //             '<td>'+item.nome+'</td>'+
                    //             '<td>'+grupo+'</td>'+
                    //             '<td>'+item.total+'</td>'+
                    //             '<td>'+item.qtd_feed+'</td>'
                    //         '</tr>';
                    dados.push({
                        'Nome': item.nome,
                        'Polo': grupo,
                        'Participações': item.total,
                        'Feedbacks': item.qtd_feed,
                    });
                });
                // html += '';
                // if(html == ''){
                //     html += '<tr>'+
                //             '<td colspan="4">Nenhum registro encontrado!</td>'+
                //             '</tr>';
                // }
                // $('#assign_course tbody').html('<tr><td colspan="4"></td></tr>');
                // $("#tabela_id").html(html);
                table = $('#forum_course').DataTable({
                    paging: true,
                    data: dados,
                    columns: [
                        {data: 'Nome' },
                        {data: 'Polo' },
                        {data: 'Participações' },
                        {data: 'Feedbacks' }
                    ],
                    dom: "Blfrtip",
                    buttons: [
                        $.extend( true, {}, buttonCommon, {
                            extend: 'copyHtml5'
                        } ),
                        $.extend( true, {}, buttonCommon, {
                            extend: 'excelHtml5'
                        } ),
                        $.extend( true, {}, buttonCommon, {
                            extend: 'pdfHtml5'
                        } )
                    ],
                    responsive: true
                } );
                $('.loading_icon').hide();
            }
        });


    }

</script>
@stop