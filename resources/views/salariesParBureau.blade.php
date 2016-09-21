@extends('template1')
@section('titre')

   Salaries par bureau
@endsection
@section('main')


    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Gestion des employés</h3>
                </div>



                <div class="clearfix"></div>

                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="javascript:history.back()" class="btn btn-default">
                        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                    </a>
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Salariés par bureau</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>

                        <div class="x_content">



                            <div class="table-responsive">
                                <table class="table table-striped jambo_table bulk_action">

                                    <thead>
                                    <tr class="headings">

                                        @foreach( $bureaux as $bureau)
                                        <th class="column-title">{{'| '}}{{$bureau->nomBureau }} </th>
                                        @endforeach
                                    </tr>
                                    </thead>

                                    <tbody>
                                    <tr class="even pointer">
                                        @foreach( $bureaux as $bureau)
                                        <td class=" ">


                                        @foreach( $salaries as $salarie)
                                                @if( $bureau->id   == $salarie->bureau_id)

                                                    <?php
                                                    $cpt = 0 ;
                                                    ?>
                                                    @foreach( $conges as $conge)
                                                    @if($salarie->id == $conge->salarie_id)
                                                        @if($conge->dateFin > date('Y-m-d'))
                                                                    <?php
                                                                    $cpt = $cpt +1 ;
                                                                    ?>
                                                        @endif
                                                        @endif
                                                    @endforeach


                                                    @if( $cpt == 0)
                                        <h5>{{'| '}}{{$salarie->nameSalarie }}{{' '}}{{$salarie->prenomSalarie }}</h5>
                                                    <br />
                                                    @endif


                                                    @endif

                                        @endforeach
                                        </td>
                                                    @endforeach

                                    </tr>

                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>






@endsection