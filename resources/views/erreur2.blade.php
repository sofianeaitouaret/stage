@extends('template1')
@section('titre')

    erreur de saisie
@endsection
@section('main')




    <div class="right_col" role="main">
        <div class="">

            <div class="page-title">

                <div class="title_left">

                </div>

                <div class="title_right">

                </div>
            </div>
        </div>

        <div class="clearfix"></div>
        <a href="javascript:history.back()" class="btn btn-default">
            <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
        </a>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Attention</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <ul class="dropdown-menu" role="menu">

                                </ul>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        Whoops, il ya une erreur lors de la selection du nom et du prénom....
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

@endsection