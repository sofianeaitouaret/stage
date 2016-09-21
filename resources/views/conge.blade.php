@extends('template1')

@section('titre')
    Ajouer un congé
@endsection
@section('main')



    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Gestion des congés</h3>
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
                            <h2>Ajouer un congé <small>* champs obligatoires</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <br />
                            <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="POST"  action="{{ url('Ajouter_conge') }}" value="{{ csrf_token() }}">


                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <span class="section">Informations :</span>
                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nom <span class="required">*</span></label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <select id="selectpicker1" class="select2_single form-control" tabindex="-1" name="nom" required="required">
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
                                <div class="form-group{{ $errors->has('debut') ? ' has-error' : '' }}">
                                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Date début</label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="middle-name" class="form-control col-md-7 col-xs-12"  type="date" name="debut">
                                        @if ($errors->has('debut'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('debut') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group{{ $errors->has('fin') ? ' has-error' : '' }}">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Date fin <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" name="fin" required="required" type="date">
                                        @if ($errors->has('fin'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('fin') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group{{ $errors->has('duree') ? ' has-error' : '' }}">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Durée<span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" name="duree" required="required" type="text">
                                        @if ($errors->has('duree'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('duree') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="ln_solid"></div>
                                <div class="form-group">
                                    <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">

                                        {!! Form::submit('Envoyer', ['class' => 'btn btn-success', 'onclick' => 'return confirm(\'Veillez confirmer...\')']) !!}
                                        {!! Form::close() !!}

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