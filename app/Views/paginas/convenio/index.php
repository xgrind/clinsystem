<?= $this->extend('templates/lista') ?>

<?= $this->section('conteudo') ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista de Convênios</h1>
            
        </div>
        <!-- /.col-lg-12 -->        
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
                        
            <div class="panel panel-default">                
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-hover lista">
                            <thead>
                                <tr>
                                    <th>Nome</th>
                                    <th>ANS</th>
                                    <th>Sigla</th>
                                    <th>Ativo</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($convenios as $convenio) : ?>
                                    <tr>
                                        <td><?= $convenio->id ?></td>
                                        <td><?= $convenio->ans ?></td>
                                        <td><?= $convenio->sigla ?></td>
                                        <td><?= $convenio->ativo === 's' ? 'Sim' : 'Não' ?></td>
                                        <td>
                                            <?= anchor("convenios/$convenio->id/editar", '<i class="fa fa-edit"></i>', [
                                                'title' => 'Editar'
                                            ]) ?>
                                            <?= anchor("convenios/$convenio->id/excluir", '<i class="fa fa-trash"></i>', [
                                                'title' => 'Excluir',
                                                'onClick' => "return window.confirm('Deseja excluir $convenio->nome?')"
                                            ]) ?>
                                        </td>
                                    </tr>
                                <?php endforeach ?>                               
                               
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-6 -->
      
    </div>
    <!-- /.row -->
    
</div>
<!-- /#page-wrapper -->

<?= $this->endSection() ?>