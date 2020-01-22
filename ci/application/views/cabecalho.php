<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Estoque</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/scroll.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/navbar.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/cabecalho.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


    <!--<meta http-equiv="refresh" content="60">-->
    <link rel="icon" type="imagem/png" href="../../img/logo-claro-512.png" />
</head>

<body>
    <?php $nome = $this->session->userdata('usuario_log', "nome"); ?>
    <?php $ddd = $this->session->userdata('usuario_log', "ddd"); ?>

    <nav class="navbar navbar-dark bg-danger flex-md-nowrap p-0 shadow" id="sidebar">
        <span id="btnMenu" onclick="openNav()">&#9776;</span>
        <a href="#" class="navbar-brand col-sm-3 col-md-2 mr-0" id="textoCabecalho">Controle Técnico de </br>Equipamentos e Miscelâneas - <?= $ddd['ddd'] ?></a>

        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <?= anchor('autenticar/logout', 'Sair', array('class' => 'nav-link')) ?>
            </li>
        </ul>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <nav class="sidenav" id="mySidenav">
                <div class="sidebar-sticky">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><span class="fas fa-times" id="closeBtn"></span></a>

                    <div class="row">
                        <div class="sidebar text-center">
                            <img id="imgTec" class="img-circle" src="../../img/tec.png">
                            <h3 style="color:white;"><?= $nome['login'] ?></h3>
                        </div>
                        <ul class="nav flex-column">

                            <li class="nav-item border-bottom border-primary">
                                <a href=<?= site_url("home/index") ?> class="nav-link active text-info">
                                    <span class="fa fa-list" id="textoNav"></span>
                                    Meus Pedidos
                                    <span class="sr-only">(current)</span>
                                </a>
                            </li>

                            <li class="nav-item border-bottom border-primary">
                                <a href=<?= site_url("pedidos/fazerPedidosAdm") ?> class="nav-link active text-info">
                                    <span class="fas fa-cart-plus"></span>
                                    Fazer Pedido
                                </a>
                            </li>
                        </ul>
                        </li>
                        </ul>

                    </div>
            </nav>
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">