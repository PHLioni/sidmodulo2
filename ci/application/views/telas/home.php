<link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/home.css">
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Pedidos</h1>
    <p id="desenvolvedor">Desenvolvido por Pedro Lioni - N5948063</p>
    <h3 id="nomeTecnico">Técnico: <?= $nome?></h3>
    
  
     <?php if ($this->session->flashdata('danger')) : ?>
        <h5 class="alert alert-danger"><?= $this->session->flashdata('danger'); ?></h5>
    <?php elseif ($this->session->flashdata('success')) : ?>
        <h5 class="alert alert-success"><?= $this->session->flashdata('success'); ?></h5>
    <?php endif ?>

   

</div>

<div class="table-wrapper-scroll-y my-custom-scrollbar" id="bodyHome">
    <table class="table table-sm table-bordered table-striped text-center" id="tableHome">
        <thead>
            <tr class="table-info">
                <th>N° Pedido</th>
                <th>Qtde</th>
                <th>Data do Pedido</th>
                <th>Data do Pagamento</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidosHome as $p) : ?>
                <tr>
                    <td><?php $textoUrl = textoUrl($p['nome']);
                        $cidade = textoUrl($p['cidade']);
                        $un = textoUrl($p['un']);
                        $num_pedido = textoUrl($p['num_pedido']);
                        $login = textoUrl($p['login']);
                        $nome = $p['nome'];
                         ?>
                        <a href=<?= site_url("pedidos/pedidosDetalhe?login=$login&tecnico=$textoUrl&cidade=$cidade&un=$un&num_pedido=$num_pedido") ?>>
                            <?= $p['num_pedido'] ?></a></td>
                    <td><?= $p['quantidade'] ?></td>

                    <td><?= dataBR($p['data_pedido']) ?></td>
                    <?php if (dataBR($p['data_pagamento']) != '01/01/1970') : ?>
                        <td><?= dataBR($p['data_pagamento']) ?></td>
                    <?php else : ?>
                        <td></td>
                    <?php endif ?>
                    <?php if ($p['status'] == 'AGUARDANDO') : ?>
                        <td class="bg-warning"><?= $p['status'] ?>

                        </td>
                    <?php else : ?>
                        <td class="bg-success" style="color:white"><?= $p['status'] ?></td>
                    <?php endif ?>
                </tr>
            <?php endforeach ?>
        </tbody>

    </table>
</div>