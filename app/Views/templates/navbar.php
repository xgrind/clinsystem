<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="navbar-header">
        <a class="navbar-brand" href="<?= site_url() ?>">ClinSystem</a>
    </div>

    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>

    <ul class="nav navbar-nav navbar-left navbar-top-links">
        <li><a href="<?= site_url() ?>"><i class="fa fa-home fa-fw"></i> Website</a></li>
    </ul>

    <ul class="nav navbar-right navbar-top-links">

        <?php if (session()->logado) : ?>
            <li class="dropdown navbar-inverse">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-bell fa-fw"></i> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-alerts">
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-comment fa-fw"></i> New Comment
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                <span class="pull-right text-muted small">12 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-envelope fa-fw"></i> Message Sent
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-tasks fa-fw"></i> New Task
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <div>
                                <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                <span class="pull-right text-muted small">4 minutes ago</span>
                            </div>
                        </a>
                    </li>
                    <li class="divider"></li>
                    <li>
                        <a class="text-center" href="#">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                        </a>
                    </li>
                </ul>
            </li>


            <li class="dropdown">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    <i class="fa fa-user fa-fw"></i> <?= session()->nome ?> <b class="caret"></b>
                </a>
                <ul class="dropdown-menu dropdown-user">
                    <li><a href="<?= site_url('perfil') ?>"><i class="fa fa-user fa-fw"></i> Meu Perfil</a>
                    </li>
                    <li><a href="<?= site_url("usuario/" . session()->id . "/editar") ?>"><i class="fa fa-gear fa-edit"></i> Alterar Dados</a>
                    </li>
                    <li><a href="<?= site_url('conta') ?>"><i class="fa fa-gear fa-key"></i> Alterar Conta</a>
                    </li>
                    <li class="divider"></li>
                    <li><a href="<?= site_url('logout') ?>"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
                    </li>
                </ul>
            </li>
        <?php else : ?>
            <li><a href="<?= site_url('login') ?>"><i class="fa fa-sign-in fa-fw"></i> Login</a></li>
        <?php endif ?>
    </ul>
    <!-- /.navbar-top-links -->

    <div class="navbar-default sidebar" role="navigation">
        <div class="sidebar-nav navbar-collapse">
            <ul class="nav" id="side-menu">
                <li class="sidebar-search">
                    <div class="input-group custom-search-form">
                        <input type="text" class="form-control" placeholder="Search...">
                        <span class="input-group-btn">
                            <button class="btn btn-primary" type="button">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                    <!-- /input-group -->
                </li>

                <?php if (session('logado') && session('tipo') === 'adm') : ?>

                    <li>
                        <a href="<?= site_url() ?>"><i class="fa fa-home fa-fw"></i> Home</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-user fa-fw"></i> Usuário<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= anchor('usuario', 'Cadastrar') ?>
                            </li>
                            <li>
                                <?= anchor('usuarios', 'Listar') ?>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-briefcase fa-fw"></i> Especialidade<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= anchor('especialidade', 'Cadastrar') ?>
                            </li>
                            <li>
                                <?= anchor('especialidades', 'Listar') ?>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-list-alt fa-fw"></i> Convênio<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= anchor('convenio', 'Cadastrar') ?>
                            </li>
                            <li>
                                <?= anchor('convenios', 'Listar') ?>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-pencil fa-fw"></i> Dicas<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= anchor('convenio', 'Cadastrar') ?>
                            </li>
                            <li>
                                <?= anchor('convenios', 'Listar') ?>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-money fa-fw"></i> Fluxo de Caixa<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= anchor('convenio', 'Cadastrar') ?>
                            </li>
                            <li>
                                <?= anchor('convenios', 'Listar') ?>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                <?php elseif (session('logado') && session('tipo') === 'med') : ?>

                    <li>
                        <a href="<?= site_url('medico/agenda') ?>"><i class="fa fa-calendar fa-fw"></i> Agenda</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-clock-o fa-fw"></i> Meu Horário<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= anchor('medico/horario', 'Cadastrar') ?>
                            </li>
                            <li>
                                <?= anchor('medico/horarios', 'Listar') ?>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="<?= site_url('medico/pacientes') ?>"><i class="fa fa-book fa-fw"></i> Histórico de Pacientes</a>
                    </li>

                <?php elseif (session('logado') && session('tipo') === 'sec') : ?>

                    <li>
                        <a href="<?= site_url() ?>"><i class="fa fa-home fa-fw"></i> Home</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-stethoscope fa-fw"></i> Paciente<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= anchor('paciente', 'Cadastrar') ?>
                            </li>
                            <li>
                                <?= anchor('pacientes', 'Listar') ?>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-dollar fa-fw"></i> Financeiro<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= anchor('movimentacao', 'Registrar Movimentação') ?>
                            </li>
                            <li>
                                <?= anchor('fluxo', 'Fluxo de Caixa') ?>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-list-alt fa-fw"></i> Convênio<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= anchor('convenio', 'Cadastrar') ?>
                            </li>
                            <li>
                                <?= anchor('convenios', 'Listar') ?>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-calendar fa-fw"></i> Agenda<span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level">
                            <li>
                                <?= anchor('agenda', 'Visualizar') ?>
                            </li>
                            <li>
                                <?= anchor('agenda/pacientes', 'Agendar Pacientes') ?>
                            </li>
                            <li>
                                <?= anchor('agenda/feriados', 'Gerenciar Feriados e Eventos') ?>
                            </li>
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                <?php endif ?>

            </ul>
        </div>
        <!-- /.sidebar-collapse -->
    </div>
    <!-- /.navbar-static-side -->
</nav>