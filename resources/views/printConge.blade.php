@extends('template1')
@section('titre')

    Liste des congés :
@endsection
@section('main')

    <div class="right_col" role="main">
        <div class="">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <a href="javascript:history.back()" class="btn btn-default">
                    <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                </a>
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Button Example <small>Users</small></h2>
                        <ul class="nav navbar-right panel_toolbox">
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
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <p class="text-muted font-13 m-b-30">
                            The Buttons extension for DataTables provides a common set of options, API methods and styling to display buttons on a page that will interact with a DataTable. The core library provides the based framework upon which plug-ins can built.
                        </p>
                        <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                            <tr>
                                <th>Numero</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Date début</th>
                                <th>Date fin</th>
                                <th>Durée</th>


                            </tr>
                            </thead>


                            <tbody>
                            @foreach( $conges as $conge)


                                <td> {{ $conge->id}} </td>
                                @foreach( $salaries as $salarie)

                                    @if($salarie->id == $conge->salarie_id)
                                        <td>{{ $salarie->nameSalarie}} </td>
                                        <td>{{ $salarie->prenomSalarie}} </td>
                                    @endif

                                @endforeach
                                <td> {{ $conge->dateDebut}} </td>
                                <td> {{ $conge->dateFin}} </td>
                                <td>{{ $conge->duree}} </td>


                                </td>
                                </tr>

                            @endforeach



                            </tbody>
                        </table>
                    </div>
                </div>
            </div>





        </div>
    </div>

























    <!-- page content -->




    <!-- /page content -->
























@endsection