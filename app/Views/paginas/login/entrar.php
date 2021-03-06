<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Michael Martins">

    <title><?= $titulo ?></title>

    <!-- Bootstrap Core CSS -->
    <?= link_tag('assets/css/bootstrap.min.css') ?>

    <!-- MetisMenu CSS -->
    <?= link_tag('assets/css/metisMenu.min.css') ?>

    <!-- Custom CSS -->
    <?= link_tag('assets/css/startmin.css') ?>

    <!-- Custom Fonts -->
    <?= link_tag('assets/css/font-awesome.min.css') ?>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
</head>

<body>

    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading ">
                        <h3 class="panel-title">
                            <?= img('assets/img/logo-PI.png', false, [
                                'class' => 'img-responsive',
                            ]) ?>
                        </h3>
                    </div>
                    <div class="panel-body">
                        <?= form_open() ?>

                        <?= get_alert() ?>

                        <fieldset>

                            <div class="form-group">
                                <?= form_input([
                                    'name' => 'email',
                                    'id' => 'email',
                                    'class' => 'form-control',
                                    'placeholder' => 'E-mail'
                                ], '', 'autofocus required', 'email') ?>
                            </div>
                            <div class="form-group">
                                <?= form_password([
                                    'name' => 'senha',
                                    'id' => 'senha',
                                    'class' => 'form-control',
                                    'placeholder' => 'Senha'
                                ], '', 'required') ?>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <?= form_checkbox('lembrarme', 'Lembrar-me') ?> Lembrar-me
                                </label>
                            </div>
                            <?= form_submit(['class' => 'btn btn-lg btn-success btn-block'], 'Login') ?>

                        </fieldset>

                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <?= script_tag('assets/js/jquery.min.js') ?>

    <!-- Bootstrap Core JavaScript -->
    <?= script_tag('assets/js/bootstrap.min.js') ?>

    <!-- Metis Menu Plugin JavaScript -->
    <?= script_tag('assets/js/metisMenu.min.js') ?>

    <!-- Custom Theme JavaScript -->
    <?= script_tag('assets/js/startmin.js') ?>

</body>

</html>