@extends('template1')

@section('titre')
    Ajouter un grade
@endsection

@section('main')
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Outils</h3>
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
                            <h2>Ajouter un grade<small>* champs obligatoires</small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">

                            <form  id="SignupForm" class="form-horizontal form-label-left" method="POST" action="{{ url('/Ajouter_un_grade') }}" value="{{ csrf_token() }}">

                                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                                <span class="section">Informations :</span>


                                <div class="form-group{{ $errors->has('nom') ? ' has-error' : '' }}">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nom du grade <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" id="nom" name="nom" required="required" class="form-control col-md-7 col-xs-12">
                                        @if ($errors->has('nom'))
                                            <span class="help-block">
                                        <strong>{{ $errors->first('nom') }}</strong>
                                    </span>
                                        @endif
                                    </div>
                                </div>


                                <div class="form-group">

                                    <div class="col-md-4 col-md-offset-3">


                                        <button type="submit" class="btn btn-success">
                                            Register
                                        </button>
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