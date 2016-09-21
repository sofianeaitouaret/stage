@extends('template1')

@section('main')



    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Form Elements</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Form Design <small>different form elements</small></h2>
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
                            <br />
                            {!! Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'put', 'class' => 'form-horizontal panel']) !!}
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">



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
                                    <button type="submit" class="btn btn-primary">Cancel</button>
                                    {!! Form::submit('Envoyer', ['class' => 'btn btn-primary pull-right', 'onclick' => 'return confirm(\'Le congé a été modifié...\')']) !!}
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