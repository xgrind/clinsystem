<?= $this->extend('templates/formulario') ?>

<?= $this->section('conteudo') ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Cadastro de Usuário</h1>

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


                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?= form_label('Tipo', 'tipo') ?>
                                <?= form_dropdown([
                                    'name' => 'tipo',
                                    'id' => 'tipo',
                                    'class' => 'form-control'
                                ], [
                                    '' => '-- Selecione --',
                                    'adm' => 'Administrador',
                                    'med' => 'Médico',
                                    'sec' => 'Secretário'
                                ], $pessoa->tipo ?? '', 'required') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <?= form_label('Nome', 'nome') ?>
                                <?= form_input([
                                    'name' => 'nome',
                                    'id' => 'nome',
                                    'class' => 'form-control'
                                ], $pessoa->nome ?? '') ?>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <?= form_label('Sexo', 'sexo') ?>
                                <?= form_dropdown([
                                    'name' => 'sexo',
                                    'id' => 'sexo',
                                    'class' => 'form-control'
                                ], [
                                    '' => '-- Selecione --',
                                    'm' => 'Masculino',
                                    'f' => 'Feminino'
                                ], $pessoa->sexo ?? '') ?>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <?= form_label('Data de Nascimento', 'dt_nasc') ?>
                                <?= form_input([
                                    'name' => 'dt_nasc',
                                    'id' => 'dt_nasc',
                                    'class' => 'form-control'
                                ], $pessoa->dt_nasc ?? '', '', 'date') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= form_label('CPF', 'cpf') ?>
                                <?= form_input([
                                    'name' => 'cpf',
                                    'id' => 'cpf',
                                    'class' => 'form-control'
                                ], $pessoa->cpf ?? '') ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= form_label('R.G.', 'rg') ?>
                                <?= form_input([
                                    'name' => 'rg',
                                    'id' => 'rg',
                                    'class' => 'form-control'
                                ], $pessoa->rg ?? '') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-3">
                            <div class="form-group">
                                <?= form_label('Cep', 'cep') ?>
                                <?= form_input([
                                    'name' => 'cep',
                                    'id' => 'cep',
                                    'class' => 'form-control cep'
                                ], $pessoa->cep ?? '') ?>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="form-group">
                                <?= form_label('Logradouro', 'logradouro') ?>
                                <?= form_input([
                                    'name' => 'logradouro',
                                    'id' => 'logradouro',
                                    'class' => 'form-control'
                                ], $pessoa->logradouro ?? '') ?>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <?= form_label('Número', 'numero') ?>
                                <?= form_input([
                                    'name' => 'numero',
                                    'id' => 'numero',
                                    'class' => 'form-control'
                                ], $pessoa->numero ?? '') ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <?= form_label('Bairro', 'bairro') ?>
                                <?= form_input([
                                    'name' => 'bairro',
                                    'id' => 'bairro',
                                    'class' => 'form-control'
                                ], $pessoa->bairro ?? '') ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= form_label('Cidade', 'cidade') ?>
                                <?= form_input([
                                    'name' => 'cidade',
                                    'id' => 'cidade',
                                    'class' => 'form-control'
                                ], $pessoa->cidade ?? '') ?>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <?= form_label('Estado', 'estado') ?>
                                <?= form_dropdown([
                                    'name' => 'estado',
                                    'id' => 'estado',
                                    'class' => 'form-control'
                                ], $estados) ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-8">
                            <div class="form-group">
                                <?= form_label('E-mail', 'email') ?>
                                <?= form_input([
                                    'name' => 'email',
                                    'id' => 'email',
                                    'class' => 'form-control'
                                ], $pessoa->email ?? '', '', 'email') ?>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="form-group">
                                <?= form_label('Foto', 'foto') ?>
                                <?= form_upload([
                                    'name' => 'foto',
                                    'id' => 'foto',
                                    'accept' => 'image/png, image/jpeg'
                                ]) ?>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= form_label('Senha', 'senha') ?>
                                <?= form_password([
                                    'name' => 'senha',
                                    'id' => 'senha',
                                    'class' => 'form-control'
                                ]) ?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <?= form_label('Confirme a senha', 'confirme') ?>
                                <?= form_password([
                                    'name' => 'confirme',
                                    'id' => 'confirme',
                                    'class' => 'form-control'
                                ]) ?>
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