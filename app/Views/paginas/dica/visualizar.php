<?= $this->extend('templates/lista') ?>

<?= $this->section('conteudo') ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Visualização de Dica</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
   
    <div class="row">
        <div class="col-lg-12">
            <div class="jumbotron">
                <h1><?= $dica->titulo ?></h1>
                <p><?= $dica->texto ?></p>
                <p><?= img("uploads/$dica->foto", false, ['class' => 'img-responsive']) ?></p>   
                <p class="text-center"><?= anchor('dicas', 'Voltar') ?></p>
            </div>
        </div>
        <!-- /.col-lg-12 -->
    </div>
   
   
</div>
<!-- /#page-wrapper -->

<?= $this->endSection() ?>