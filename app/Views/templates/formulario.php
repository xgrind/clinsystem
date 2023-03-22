<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sistema para gerenciamento de clínicas médicas">
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

    <div id="wrapper">

        <!-- Navigation -->
        <?= $this->include('templates/navbar') ?>

        <?= $this->renderSection('conteudo') ?>



    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <?= script_tag('assets/js/jquery.min.js') ?>

    <!-- Bootstrap Core JavaScript -->
    <?= script_tag('assets/js/bootstrap.min.js') ?>

    <!-- Metis Menu Plugin JavaScript -->
    <?= script_tag('assets/js/metisMenu.min.js') ?>

    <!-- Custom Theme JavaScript -->
    <?= script_tag('assets/js/startmin.js') ?>

    <!-- meu script -->
    <?= script_tag('assets/js/cep.js') ?>


</body>

</html>