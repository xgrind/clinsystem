<?= $this->extend('templates/lista') ?>

<?= $this->section('conteudo') ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Lista de Usuários</h1>          

            <?= get_alert() ?>

            <p>
                <?= anchor('usuario', 'Novo', ['class' => 'btn btn-primary']) ?>
            </p>
            
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
                                    <th>CPF</th>                                    
                                    <th>R.G.</th>
                                    <th>Sexo</th>
                                    <th>Tipo</th>
                                    <th>Ativo</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pessoas as $pessoa) : ?>
                                    <tr>                                        
                                        <td><?= $pessoa->nome ?></td>
                                        <td><?= $pessoa->cpf ?></td>
                                        <td><?= $pessoa->rg ?></td>
                                        <td><?= $pessoa->sexo == 'm' ? 'Masculino' : 'Feminino' ?></td>
                                        <td><?= getTipo($pessoa->tipo) ?></td>
                                        <td><?= $pessoa->ativo === 's' ? 'Sim' : 'Não' ?></td>
                                        <td>
                                            <?= anchor("usuario/$pessoa->id", '<i class="fa fa-eye"></i>', [
                                                'title' => 'Visualizar'
                                            ]) ?>
                                            <?= anchor("usuario/$pessoa->id/contatos", '<i class="fa fa-phone"></i>', [
                                                'title' => 'Lista de Contatos'
                                            ]) ?>
                                            <?= anchor("usuario/$pessoa->id/editar", '<i class="fa fa-edit"></i>', [
                                                'title' => 'Editar'
                                            ]) ?>
                                            <?= anchor("usuario/$pessoa->id/excluir", '<i class="fa fa-trash"></i>', [
                                                'title' => 'Excluir',
                                                'onClick' => "return window.confirm('Deseja excluir $pessoa->nome?')"
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