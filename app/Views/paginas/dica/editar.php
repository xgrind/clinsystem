<?= $this->extend('templates/lista') ?>

<?= $this->section('conteudo') ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edição de Dica</h1>

            <?= show_erros($erros) ?>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-body">

                    <?= form_open_multipart() ?>

                    <?= form_hidden('dt_hora', date('Y-m-d H:i:s')) ?>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= form_label('Título', 'titulo') ?>
                                <?= form_input([
                                    'name' => 'titulo',
                                    'id' => 'titulo',
                                    'class' => 'form-control'
                                ], $dica->titulo ?? '') ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= form_label('Foto', 'foto') ?>
                                <?= form_upload([
                                    'name' => 'foto',
                                    'id' => 'foto'
                                ], $dica->foto ?? '', [
                                    'accept' => 'image/png, image/jpg, image/jpeg'
                                ]) ?>
                            </div>
                        </div>
                    </div>    
                    
                    <div class="row">
                    <div class="col-lg-12">
                            <div class="form-group">
                                <?= form_label('Texto', 'texto') ?>
                                <?= form_textarea([
                                    'name' => 'texto',
                                    'id' => 'texto',
                                    'class' => 'form-control'
                                ], $dica->texto ?? '') ?>
                            </div>
                        </div>
                    </div>

                    <div class="text-center">
                        <?= form_submit(['class' => 'btn btn-primary'], 'Alterar') ?>
                        <?= form_reset(['class' => 'btn btn-primary'], 'Limpar') ?>
                    </div>

                    <?= form_close() ?>

                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
</div>
<!-- /#page-wrapper -->

<?= $this->endSection() ?>