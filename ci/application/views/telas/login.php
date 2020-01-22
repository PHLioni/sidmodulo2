<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logar - Técnico</title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
    <link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/login.css">
    <link rel="icon" type="imagem/png" href="../img/logo-claro-512.png" />
</head>
<body style="background-image:url(<?= base_url('img/w5.jpg') ?>)">
    <div class="container">
        <div class="container" id="caixaLogin">
            <img class="rounded mx-auto d-block" id="imgLogo" src="<?= base_url('img/logo-claro-512.png') ?>">
            <h3 id="textoLogin" >Solicitações Técnicas</h3>
            <?php
            echo form_open("autenticar/logar");

            echo form_label("Usuario", "usuario");
            echo form_input(array(
                'name' => 'usuario',
                'id' => 'usuario',
                'class' => 'form-control',
                'maxlength' => '255'
            ));

            echo form_label("Senha", "senha");
            echo form_input(array(
                'name' => 'senha',
                'id' => 'usuario',
                'class' => 'form-control',
                'maxlength' => '255',
                'type' => 'password'
            ));

            echo form_button(array(
                'class' => 'btn btn-danger btn-block mt-2 mb-2',
                'content' => 'Acessar',
                'type' => 'submit',
            ));

            echo form_close();

            ?>
            <p class="alert-danger" id="alertaLogin"><?= $this->session->flashdata('danger'); ?></p>
        </div>
    </div>
</body>

</html>