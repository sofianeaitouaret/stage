@extends('template1')
@section('titre')

    Modifier le congé
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
                    <div class="x_panel" id="attente">
                        <div class="x_title">
                            <h2>Modifier un congé <small>* champ obligatoire</small></h2>
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

                            <div class="alert alert-success alert-dismissible hidden">
                                Modification effectué avec succes.
                            </div>

                            <form class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate id="form" method="POST" action="{{ url($conge->id.'/editer_congé') }}" value="{{ csrf_token() }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                <span class="section">Informations :</span>


                            <div class="item form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Date début</label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="middle-name" class="form-control col-md-7 col-xs-12"  type="date" name="debut">
                                    <small class="help-block"></small>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Date fin <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" name="fin" required="required" type="date">
                                    <small class="help-block"></small>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Durée<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input id="birthday" class="date-picker form-control col-md-7 col-xs-12" name="duree" required="required" type="text">
                                    <small class="help-block"></small>
                                </div>
                            </div>

                            <div class="ln_solid"></div>

                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">
                                        <button type="submit" class="btn btn-primary" onclick= "return confirm('Veuillez confirmer la modifiacation du congé !')" >Enregistrer</button>

                                    </div>
                                </div>


                            </form>
                        </div>
                    </div>
                </div>
            </div>




        </div>
    </div>

    <script>
        $(function(){

            $('form')
                    .on('blur', 'input[required], input.optional, select.required', validator.checkField)
                    .on('change', 'select.required', validator.checkField)
                    .on('keypress', 'input[required][pattern]', validator.keypress);

            $('.multi.required')
                    .on('keyup blur', 'input', function () {
                        validator.checkField.apply($(this).siblings().last()[0]);
                    });

            $('form').submit(function (e) {

                e.preventDefault();

                var submit = true;
                // evaluate the form using generic validaing
                if (!validator.checkAll($(this))) {
                    submit = false;
                }


                if (submit) {




                    $('input+small').text('');
                    $('input').parent().removeClass('has-error');

                    $.ajax({
                        method: $(this).attr('method'),
                        url: $(this).attr('action'),
                        data: $(this).serialize(),
                        dataType: "json"
                    })
                            .done(function (data) {

                                $('.alert-success').removeClass('hidden');
                                $('#attente').modal('hide');
                            })
                            .fail(function (data) {
                                $.each(data.responseJSON, function (key, value) {
                                    var input = '#form input[name=' + key + ']';
                                    $(input + '+small').text(value);
                                    $(input).parent().addClass('has-error');
                                });
                            });
                }
            });

        })

    </script>

@endsection