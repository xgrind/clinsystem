<?= $this->extend('templates/lista') ?>

<?= $this->section('conteudo') ?>

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h3 class="page-header">
                <p class="text-center">
                    <i class="text-primary fa fa-lock"></i>
                    <i class="text-primary fa fa-shield"></i>
                    <i class="text-primary fa fa-envelope"></i>
                    <i class="text-primary fa fa-camera "></i>
                </p>

                <p class="text-center">
                    Controle e Gerencie sua Conta
                </p>

                <p class="text-center">
                    <small>
                        Proteja sua privacidade. Escolha sempre uma senha forte
                        para maior segurança e mantenha em sigilo, apenas com você.
                    </small>
                </p>
            </h3>

            <div class="page-body">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <i class="text-primary fa fa-lock"></i> Redefinir sua Senha
                            </div>
                            <div class="panel-body">
                                <p>Redefina sua senha e mantenha a segurança de sua conta.</p>
                            </div>                           
                        </div>
                    </div>

                    <div class="col-lg-4">
                    <div class="panel panel-info">
                            <div class="panel-heading">
                                <i class="text-primary fa fa-envelope"></i> Redefinir E-mail
                            </div>
                            <div class="panel-body">
                                <p>Altere seu e-mail de login. Não use e-mails difíceis de lembrar.</p>
                            </div>                           
                        </div>
                    </div>

                    <div class="col-lg-4">
                    <div class="panel panel-info">
                            <div class="panel-heading">
                                <i class="text-primary fa fa-camera"></i> Alterar imagem de Perfil
                            </div>
                            <div class="panel-body">
                                <p>Altere sua imagem de perfil com extensão JPG ou PNG.</p>
                            </div>                           
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                    <i class="fa fa-shield fa-2x text-primary"></i> "Informação Importante!" O CLINSystem preza pela sua segurança, 
                        por isso, segue um padrão na configuração de sua conta.
                    </div>
                </div>
            </div>
        </div>
    </div>   

</div>


<?= $this->endSection() ?>