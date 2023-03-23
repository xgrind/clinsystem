<?= $this->extend('templates/lista') ?>

<?= $this->section('conteudo') ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista de Contatos</h1>

            <?= get_alert() ?>
            
        </div>
        <!-- /.col-lg-12 -->        
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">        

            <p>
                <?= anchor("usuario/$pessoa_id/contato", 'Novo', ['class' => 'btn btn-primary']) ?>
            </p>
                        
            <div class="panel panel-default">                                                

                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-hover lista">
                            <thead>
                                <tr>
                                    <th>Descrição</th>                                   
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($contatos as $contato) : ?>
                                    <tr>                                        
                                        <td><?= $contato->descricao ?></td>                                       
                                        <td>                                           
                                            <?= anchor("usuario/$contato->pessoa_id/contato/$contato->id/editar", '<i class="fa fa-edit"></i>', [
                                                'title' => 'Editar'
                                            ]) ?>
                                            <?= anchor("usuario/$contato->pessoa_id/contato/$contato->id/excluir", '<i class="fa fa-trash"></i>', [
                                                'title' => 'Excluir',
                                                'onClick' => "return window.confirm('Deseja excluir $contato->descricao?')"
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