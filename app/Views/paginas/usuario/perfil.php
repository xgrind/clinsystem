<?= $this->extend('templates/lista') ?>

<?= $this->section('conteudo') ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Meu Perfil</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-2">
            <?php $foto = $pessoa->foto ? "uploads/$pesso->foto" : 'assets/img/perfil-semfoto.png' ?>
                        
            <?= img($foto, false, [
                'class' => 'img-responsive',
                'width' => 200,
                'style' => 'margin-top: 15px'
            ]) ?>
        </div>

        <div class="col-lg-10">
            <p>
                <strong>
                    <h3><?= $pessoa->nome ?></h3>
                </strong>
            </p>
        </div>

        <div class="col-lg-5">

            <p>CPF: <?= $pessoa->cpf ?></p>
            <p>R.G.: <?= $pessoa->rg ?></p>
            <p>Sexo: <?= getSexo($pessoa->sexo) ?></p>
            <p>Data de Nascimento: <?= $pessoa->dt_nasc ?></p>

        </div>

        <div class="col-lg-5">
            <p>Login: <?= $pessoa->email ?></p>
            <p>Função: <?= getTipo($pessoa->tipo) ?></p>
        </div>
    </div>

    <hr>

    <div class="row">
        <div class="col-lg-6">
            <p>
                <strong>
                    <h3>Endereço</h3>
                </strong>
            </p>

            <p><?= $pessoa->logradouro ?>, nº <?= $pessoa->numero ?></p>
            <p><?= $pessoa->bairro ?>, <?= $pessoa->cidade ?>, <?= $pessoa->estado ?> - <?= $pessoa->cep ?></p>
        </div>

        <div class="col-lg-6" style="border-left: 1px solid #efefef;">
            <p>
                <strong>
                    <h3>Contatos</h3>
                </strong>
            </p>

            <?php foreach ($contatos as $contato) : ?>
                <p><?= $contato->descricao ?></p>
            <?php endforeach ?>

        </div>
    </div>

    <br>

    <p class="text-center">
        <?= anchor("usuario/$pessoa->id/editar", 'Editar Meus Dados', [
            'class' => 'btn btn-primary'
        ]) ?>
    </p>


</div>


<?= $this->endSection() ?>