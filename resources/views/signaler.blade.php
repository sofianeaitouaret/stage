@extends('template1')

@section('titre')
    Signaler une absence
@endsection
@section('main')

    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Gestion des absences</h3>
                </div>



            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <a href="javascript:history.back()" class="btn btn-default">
                        <span class="glyphicon glyphicon-circle-arrow-left"></span> Retour
                    </a>
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Signaler une absence<small>* champ obligatoire </small></h2>

                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <form class="form-horizontal form-label-left" method="POST" action="{{ url('signalerAbsence') }}" value="{{ csrf_token() }}">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                <span class="section">Informations :</span>


                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nom <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="selectpicker1" class="select2_single form-control" tabindex="-1" name="id" required="required">
                                            <option disabled selected value>selectionnez le nom du salarié</option>
                                            @foreach( $grades as $grade)
                                                <option value="{{ $grade->nameSalarie }}">{{ $grade->nameSalarie}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Prénom <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="selectpicker1" class="select2_single form-control" tabindex="-1" name="prenom" required="required">
                                            <option disabled selected value>selectionnez le prenom du salarié</option>
                                            @foreach( $grades as $grade)
                                                <option value="{{ $grade->prenomSalarie }}">{{ $grade->prenomSalarie}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Date du début<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="date" id="first-name" name="debut" required="required" class="form-control col-md-7 col-xs-12">
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('duree') ? ' has-error' : '' }}">
                                    <label class="control-label col-md-3 col-sm-3" for="last-name">Durée <span class="required">*</span>
                                    </label>

                                    <div class="col-md-6 col-sm-6">
                                        <input type="text" id="last-name2" name="duree" required="required" class="form-control col-md-7 col-xs-12">

                                        @if ($errors->has('duree'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('duree') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">

                                        <button id="send" type="submit" class="btn btn-success">Enregistrer</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection