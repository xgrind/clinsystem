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
                        <i class="text-primary fa fa-lock"></i> 
                        Redefinir sua Senha
                    </div>
                    <div class="panel-body">
                        <p>A senha deve ter 8 caracteres e no mínimo 1 letra maíuscula, 1 letra mínuscula e um número.</p>
                        <p>Não esqueça de trocar sua senha com frequência. O CLINSystem recomenda que você altere sua senha
                            a cada 5 meses para garantir maior segurança a seus dados.
                        </p>

                        <hr>

                        <?= form_open() ?>

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <?= form_label('Senha atual', 'atual') ?>
                                    <?= form_password([
                                        'name' => 'atual',
                                        'id' => 'atual',
                                        'class' => 'form-control'
                                    ], '', 'required'); ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <?= form_label('Nova senha', 'senha') ?>
                                    <?= form_password([
                                        'name' => 'senha',
                                        'id' => 'atusenhaal',
                                        'class' => 'form-control'
                                    ], '', 'required'); ?>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <?= form_label('Confirmar senha', 'confirme') ?>
                                    <?= form_password([
                                        'name' => 'confirme',
                                        'id' => 'confirme',
                                        'class' => 'form-control'
                                    ], '', 'required'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group text-center">
                                    <?= form_submit(['class' => 'btn btn-primary '], 'Alterar Senha') ?>
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