<?= $this->extend('templates/lista') ?>

<?= $this->section('conteudo') ?>

            <div id="page-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">Dashboard</h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user-md fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?= $medicos ?></div>
                                        <div>Médicos</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= site_url('usuarios/med') ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">Listagem</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>                   
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-users fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?= $secretarios ?></div>
                                        <div>Secretários</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= site_url('usuarios/sec') ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">Listagem</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div> 
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-lock fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?= $admins ?></div>
                                        <div>Administradores</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= site_url('usuarios/adm') ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">Listagem</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>   
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-briefcase fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?= $especialidades ?></div>
                                        <div>Especialidades</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= site_url('especialidades') ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">Listagem</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>  
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list-alt fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?= $convenios ?></div>
                                        <div>Convênios</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= site_url('convenios') ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">Listagem</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>  
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-pencil fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <div class="huge"><?= $dicas ?></div>
                                        <div>Dicas</div>
                                    </div>
                                </div>
                            </div>
                            <a href="<?= site_url('dicas') ?>">
                                <div class="panel-footer">
                                    <span class="pull-left">Listagem</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>

                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>  
                </div>
                <!-- /.row -->
              
            </div>
            <!-- /#page-wrapper -->

            <?= $this->endSection() ?>
      