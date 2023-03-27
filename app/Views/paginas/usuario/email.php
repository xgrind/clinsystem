<?= $this->extend('templates/lista') ?>

<?= $this->section('conteudo') ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Redefinir Senha</h1>

            <?= get_alert() ?>
            <?= show_erros($erros) ?>
        </div>
    </div>

    <!-- <div class="row"> -->
    <div class="page-body">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <i class="text-primary fa fa-envelope"></i> 
                        Redefinir E-mail
                    </div>
                    <div class="panel-body">                        

                        <?= form_open() ?>

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?= form_label('E-mail atual', 'atual') ?>
                                    <?= form_input([
                                        'name' => 'atual',
                                        'id' => 'atual',
                                        'class' => 'form-control'
                                    ], '', 'required', 'email'); ?>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <?= form_label('Novo E-mail', 'email') ?>
                                    <?= form_input([
                                        'name' => 'email',
                                        'id' => 'email',
                                        'class' => 'form-control'
                                    ], '', 'required', 'email'); ?>
                                </div>
                            </div>                           
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group text-center">
                                    <?= form_submit(['class' => 'btn btn-primary '], 'Alterar E-mail') ?>
                                </div>
                            </div>
                        </div>

                        <?= form_close() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- </div> -->

</div>

<?= $this->endSection() ?>