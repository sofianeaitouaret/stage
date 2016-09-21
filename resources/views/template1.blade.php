<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title>@yield('titre')</title>
    <!-- Bootstrap -->
    <link href="{{ URL::asset('bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ URL::asset('nprogress/nprogress.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ URL::asset('css1/custom.min.css') }}" rel="stylesheet">




    <!-- iCheck -->
    <link href="{{ URL::asset('iCheck/skins/flat/green.css') }}" rel="stylesheet">
    <!-- Datatables -->
    <link href="{{ URL::asset('datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ URL::asset('datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

    <script src="{{ URL::asset('js/jquery.min.js') }}"></script>
    <script src="{{ URL::asset('js/waitMe.js') }}"></script>
    <script src="{{ URL::asset('js/notification.js') }}"></script>
    <script src="{{ URL::asset('js/nprogress.js') }}"></script>
    <script src="{{ URL::asset('js/validator/validator1.js') }}"></script>
    <script src="{{ URL::asset('js/validator/validator2.js') }}"></script>

    <script src="{{ URL::asset('js/pusher.min.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/notify/pnotify.core.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/notify/pnotify.buttons.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/notify/pnotify.nonblock.js') }}"></script>

    <script type="text/javascript" src="{{ URL::asset('js/jquery.formtowizard.js') }}"></script>
    <script type="text/javascript" src="{{ URL::asset('js/jquery.validate.min.js') }}"></script>
    <!-- Datatables -->
    <script type="text/javascript" src="{{ URL::asset('js/datatables/js/jquery.dataTables.js') }}"></script>
    <script>
        NProgress.start();
    </script>



    <script src="{{ URL::asset('js/html5shiv.min.js') }}"></script>
    <script src="{{ URL::asset('js/respond.min.js') }}"></script>

    <script src="{{ URL::asset('js/script.js') }}"></script>


</head>

<body class="nav-md">
<div class="container body">
    <div class="main_container">
        <div class="col-md-3 left_col">
            <div class="left_col scroll-view">
                <div class="navbar nav_title" style="border: 0;">
                    <a href="{{ URL::asset('/home') }}" class="site_title"> <i class="fa fa-spinner fa-pulse fa-1x fa-fw"></i> <span>Gestion personnel</span></a>
                </div>

                <div class="clearfix"></div>

                <!-- menu profile quick info -->
                <div class="profile">
                    <div class="profile_pic">

                    </div>
                    <div class="profile_info">


                    </div>
                </div>
                <!-- /menu profile quick info -->

                <br />

                <!-- sidebar menu -->
                <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
                    <div class="menu_section">

                        <ul class="nav side-menu">


                            <li><a ><i class="fa fa-male"></i>Gestion d'employés <span class="fa fa-chevron-down"></span></a>

                                <ul class="nav child_menu">
                                    <li><a href="{{ URL::asset('/employes') }}" >Liste des employés actifs</a></li>
                                    <li><a href="{{ URL::asset('/Ajouter_employe') }}">Ajouter un nouveau employé</a></li>
                                    <li><a href="{{ URL::asset('/Salaries_par_bureau') }}">Liste des salariés par bureau</a></li>
                                    <li><a href="{{ URL::asset('/employes_retraités') }}">Archive des salariés retraités</a></li>

                                </ul>

                            </li>
                            <li><a><i class="fa fa-calendar"></i>Gestion des absences <span class="fa fa-chevron-down"></span></a>

                                <ul class="nav child_menu">
                                    <li><a  href="{{ URL::asset('/Listeabsence') }}">Archive des absences</a></li>
                                    <li><a  href="{{ URL::asset('/Absences_date') }}">Absences par intervalle</a></li>
                                    <li><a  href="{{ URL::asset('/signalerAbsence') }}" >Signaler une absences</a></li>

                                </ul>

                            </li>


                            <li><a><i class="fa fa-suitcase"></i> Gestion des congés <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a  href="{{ URL::asset('/Liste_conge') }}">Archive des congés</a></li>
                                    <li><a  href="{{ URL::asset('/Conges_en_cours') }}">Congés en cours</a></li>
                                    <li><a  href="{{ URL::asset('/Ajouter_conge') }}">Ajouter un congé</a></li>

                                </ul>
                            </li>
                            <li><a><i class="fa fa-print"></i> Impression doccument <span class="fa fa-chevron-down"></span></a>
                                <ul class="nav child_menu">
                                    <li><a  href="{{ URL::asset('/certificat_de_travail') }}">Certificat de travail</a></li>
                                    <li><a  href="{{ URL::asset('/attestation_de_travail') }}">Attestation de travail</a></li>
                                    <li><a  href="{{ URL::asset('/Titre_de_conge') }}">Titre de congé</a></li>
                                    <li><a  href="{{ URL::asset('/absence_document') }}">Liste des absences</a></li>
                                    <li><a  href="{{ URL::asset('/print_excel_absence') }}">Absences divers formats</a></li>
                                </ul>
                            </li>
                            <li><a><i class="fa fa-gear"></i> Outils <span class="fa fa-chevron-down"></span></a>

                                    <ul class="nav child_menu">
                                        <li><a  href="{{ URL::asset('/Ajouter_un_service') }}">Ajouter un service </a></li>
                                        <li><a  href="{{ URL::asset('/Ajouter_un_bureau') }}">Ajouter un bureau</a></li>
                                        <li><a  href="{{ URL::asset('/Ajouter_un_grade') }}">Ajouter un grade</a></li>
                                        <li><a  href="{{ URL::asset('/Ajouter_un_contrat') }}">Ajouter un contrat</a></li>

                                    </ul>

                            </li>


                        </ul>
                    </div>


                </div>
                <!-- /sidebar menu -->

                <!-- /menu footer buttons -->
                <div class="sidebar-footer hidden-small">
                    <a data-toggle="tooltip" data-placement="top" title="Settings">
                        <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="FullScreen">
                        <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Lock">
                        <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
                    </a>
                    <a data-toggle="tooltip" data-placement="top" title="Logout">
                        <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
                    </a>
                </div>
                <!-- /menu footer buttons -->
            </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <nav>
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>

                    <ul class="nav navbar-nav navbar-right">
                        <li class="">
                            <a href="#" class="user-profile dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                Déconnexion
                                <span class=" fa fa-angle-down"></span>
                            </a>
                            <ul class="dropdown-menu dropdown-usermenu pull-right">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out pull-right"></i> Sortir</a></li>
                            </ul>
                        </li>

                    </ul>
                </nav>
            </div>
        </div>
        <!-- /top navigation -->

        <!-- page content -->

            @yield('main')

        <!-- /page content -->

        <!-- footer content -->
        <footer>
            <div class="pull-right">
                Gestion Personnel - all rights reserved, Sofiane Ait Ouaret
            </div>
            <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
    </div>
</div>

<!-- jQuery -->
<script src="{{ URL::asset('jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ URL::asset('bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ URL::asset('fastclick/lib/fastclick.js') }}"></script>
<!-- NProgress -->
<script src="{{ URL::asset('nprogress/nprogress.js') }}"></script>

<!-- Custom Theme Scripts -->
<script src="{{ URL::asset('js1/custom.min.js') }}"></script>
<script src="{{ URL::asset('jQuery-Smart-Wizard/js/jquery.smartWizard.js') }}"></script>

<!-- iCheck -->
<script src="{{ URL::asset('iCheck/icheck.min.js') }}"></script>


<!-- jQuery -->

<!-- Bootstrap -->

<!-- FastClick -->

<!-- NProgress -->

<!-- iCheck -->


<!-- Datatables -->
<script src="{{ URL::asset('datatables.net/js/jquery.dataTables.min.js') }}"></script>

<script src="{{ URL::asset('datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>


<script src="{{ URL::asset('datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>


<script src="{{ URL::asset('datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>


<script src="{{ URL::asset('datatables.net-buttons/js/buttons.flash.min.js') }}"></script>


<script src="{{ URL::asset('datatables.net-buttons/js/buttons.html5.min.js') }}"></script>


<script src="{{ URL::asset('datatables.net-buttons/js/buttons.print.min.js') }}"></script>

<script src="{{ URL::asset('datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>


<script src="{{ URL::asset('datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>


<script src="{{ URL::asset('datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>


<script src="{{ URL::asset('datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>


<script src="{{ URL::asset('datatables.net-scroller/js/datatables.scroller.min.js') }}"></script>


<script src="{{ URL::asset('jszip/dist/jszip.min.js') }}"></script>


<script src="{{ URL::asset('pdfmake/build/pdfmake.min.js') }}"></script>


<script src="{{ URL::asset('pdfmake/build/vfs_fonts.js') }}"></script>


<!-- Custom Theme Scripts -->




<!-- Datatables -->
<script>
    $(document).ready(function() {
        var handleDataTableButtons = function() {
            if ($("#datatable-buttons").length) {
                $("#datatable-buttons").DataTable({
                    dom: "Bfrtip",
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
                        {
                            extend: "pdfHtml5",
                            className: "btn-sm"
                        },
                        {
                            extend: "print",
                            className: "btn-sm"
                        },
                    ],
                    responsive: true
                });
            }
        };

        TableManageButtons = function() {
            "use strict";
            return {
                init: function() {
                    handleDataTableButtons();
                }
            };
        }();

        $('#datatable').dataTable();

        $('#datatable-keytable').DataTable({
            keys: true
        });

        $('#datatable-responsive').DataTable({


        });

        $('#datatable-scroller').DataTable({
            ajax: "js/datatables/json/scroller-demo.json",
            deferRender: true,
            scrollY: 380,
            scrollCollapse: true,
            scroller: true
        });

        $('#datatable-fixed-header').DataTable({
            fixedHeader: true
        });

        var $datatable = $('#datatable-checkbox');

        $datatable.dataTable({
            'order': [[ 1, 'asc' ]],
            'columnDefs': [
                { orderable: false, targets: [0] }
            ]
        });
        $datatable.on('draw.dt', function() {
            $('input').iCheck({
                checkboxClass: 'icheckbox_flat-green'
            });
        });

        TableManageButtons.init();
    });
</script>

<!-- Custom Theme Scripts -->


<script>
    $(document).ready(function() {
        $('#wizard').smartWizard();

        $('#wizard_verticle').smartWizard({
            transitionEffect: 'slide'
        });

        $('.buttonNext').addClass('btn btn-success');
        $('.buttonPrevious').addClass('btn btn-primary');
        $('.buttonFinish').addClass('btn btn-default');
    });
</script>


<script type="text/javascript" src="{{ URL::asset('js/gauge/gauge.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/gauge/gauge_demo.js') }}"></script>
<script src="{{ URL::asset('js/progressbar/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ URL::asset('js/nicescroll/jquery.nicescroll.min.js') }}"></script>


<script src="{{ URL::asset('js/chartjs/chart.min.js') }}"></script>
<script src="{{ URL::asset('js/progressbar/bootstrap-progressbar.min.js') }}"></script>
<script src="{{ URL::asset('js/nicescroll/jquery.nicescroll.min.js') }}"></script>
<script src="{{ URL::asset('js/icheck/icheck.min.js') }}"></script>




<script src="{{ URL::asset('js/pusher.min.js') }}"></script>




</body>
</html>
