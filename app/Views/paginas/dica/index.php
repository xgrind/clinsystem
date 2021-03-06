<?= $this->extend('templates/lista') ?>

<?= $this->section('conteudo') ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista de Dicas</h1>

            <?= get_alert() ?>
            
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
                                    <th>Título</th>
                                    <th>Texto</th>                                    
                                    <th>Data da postagem</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dicas as $dica) : ?>
                                    <tr>                                        
                                        <td><?= $dica->titulo ?></td>
                                        <td><?= word_limiter($dica->texto, 10) ?></td>
                                        <td><?= $dica->dt_hora ?></td>
                                        <td>
                                            <?= anchor("dica/$dica->id", '<i class="fa fa-eye"></i>', [
                                                'title' => 'Visualizar'
                                            ]) ?>
                                            <?= anchor("dica/$dica->id/editar", '<i class="fa fa-edit"></i>', [
                                                'title' => 'Editar'
                                            ]) ?>
                                            <?= anchor("dica/$dica->id/excluir", '<i class="fa fa-trash"></i>', [
                                                'title' => 'Excluir',
                                                'onClick' => "return window.confirm('Deseja excluir $dica->titulo?')"
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