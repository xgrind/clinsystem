<?= $this->extend('templates/lista') ?>

<?= $this->section('conteudo') ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastro de Contato</h1>

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
                    <?= form_hidden('pessoa_id', $pessoa_id) ?>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <?= form_label('Descrição', 'descricao') ?>
                                <?= form_input([
                                    'name' => 'descricao',
                                    'id' => 'descricao',
                                    'class' => 'form-control'
                                ], $contato->descricao ?? '') ?>
                            </div>
                        </div>
                    </div>
                   
                    <div class="text-center">
                        <?= form_submit(['class' => 'btn btn-primary'], 'Cadastrar') ?>
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