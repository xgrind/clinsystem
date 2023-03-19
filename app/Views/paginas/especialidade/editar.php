<?= $this->extend('templates/lista') ?>

<?= $this->section('conteudo') ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Edição de Especialidade</h1>

            <?= show_erros($erros) ?>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">

                <div class="panel-body">

                    <?= form_open() ?>

                    <div class="row">
                        <div class="col-lg-5">
                            <div class="form-group">
                                <?= form_label('Nome', 'nome') ?>
                                <?= form_input([
                                    'name' => 'nome',
                                    'id' => 'nome',
                                    'class' => 'form-control'
                                ], $especialidade->nome) ?>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="form-group">
                                <?= form_label('Descrição', 'descricao') ?>
                                <?= form_input([
                                    'name' => 'descricao',
                                    'id' => 'descricao',
                                    'class' => 'form-control'
                                ], $especialidade->descricao) ?>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <?= form_label('Ativo', 'ativo') ?>
                                <?= form_dropdown([
                                    'name' => 'ativo',
                                    'id' => 'ativo',
                                    'class' => 'form-control',
                                ], [
                                    '' => '-- Selecione --',
                                    's' => 'Sim',
                                    'n' => 'Não'
                                ], $especialidade->ativo) ?>
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