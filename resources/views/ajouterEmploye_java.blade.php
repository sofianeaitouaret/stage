<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Gestion des employés</h3>
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
                        <h2>ajouter un employé <small>* champ obligatoire </small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>

                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">







                            <form class="form-horizontal form-label-left" enctype="multipart/form-data" novalidate id="form" method="POST" action="{{ url('/Ajouter_employe') }}" value="{{ csrf_token() }}">
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">


                            <span class="section">Personal Info</span>

                                <div class="alert alert-success alert-dismissible hidden">
                                    Enregistement effectué avec succes.
                                </div>


                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nom <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <input type="text" id="nom" name="nom" required="required" class="form-control col-md-7 col-xs-12">
                                    <small class="help-block"></small>
                                </div>
                            </div>

                                <div class="item form-group">
                                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Prénom <span class="required">*</span>
                                    </label>
                                    <div class="col-md-6 col-sm-6 col-xs-12">
                                        <input class="form-control col-md-7 col-xs-12" name="prenom" required="required" type="text" >
                                        <small class="help-block"></small>
                                    </div>
                                </div>

                            <div class="item form-group">
                                <label for="nss" class="control-label col-md-3 col-sm-3">Nss <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input  class="form-control col-md-7 col-xs-12" type="text" name="nss" required="required">
                                    <small class="help-block"></small>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3">Date de naissance <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="middle-name2" class="form-control col-md-7 col-xs-12" type="date" required="required" name="date">
                                    <small class="help-block"></small>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3">lieu de naissance <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="middle-name2" class="form-control col-md-7 col-xs-12" type="text"  required="required" name="lieu">
                                    <small class="help-block"></small>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name" class="control-label col-md-3 col-sm-3">Date de recrutement <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6">
                                    <input id="middle-name2" class="form-control col-md-7 col-xs-12" type="date" required="required" name="recrutement">
                                    <small class="help-block"></small>
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Type du contrat <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="selectpicker1" class="select2_single form-control" tabindex="-1" name="typecontrat" required="required">
                                        <option disabled selected value>choisir le type du contrat</option>
                                        @foreach( $contrats as $contrat)
                                            <option value="{{ $contrat->id }}">{{ $contrat->NomContrat}}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Grade <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="selectpicker1" class="select2_single form-control" tabindex="-1" name="grade" required="required">
                                        <option disabled selected value>selectionnez un grade</option>
                                        @foreach( $grades as $grade)
                                            <option value="{{ $grade->id }}">{{ $grade->nomGrade}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="control-label col-md-3 col-sm-3 col-xs-12">Bureau <span class="required">*</span></label>
                                <div class="col-md-6 col-sm-6 col-xs-12">
                                    <select id="selectpicker1" class="select2_single form-control" tabindex="-1" name="bureau" required="required">
                                        <option disabled selected value>selectionnez un bureau</option>
                                        @foreach( $bureaux as $bureau)
                                            <option value="{{ $bureau->id }}"> {{ $bureau->nomBureau}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                                <div class="form-group">
                                    <div class="col-md-6 col-md-offset-3">

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
