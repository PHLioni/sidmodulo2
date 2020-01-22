<?php include 'vendor/modal/modalMiscelaneas.php'; ?>
<link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/resumo.css">

<div  class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

    <h2 id="tituloResumo">Resumo do Pedido</h2>

    <a href=<?= site_url("pedidos/fazerPedidosAdm?tecnico=$login") ?> id="btnVoltar" class="btn btn-secondary ml-2 mb-1">Voltar</a>

</div>


<?php if ($this->session->flashdata('success')) : ?>
    <h6 class="alert alert-success"> <?= $this->session->flashdata('success'); ?></h6>
<?php elseif ($this->session->flashdata('danger')) : ?>
    <h6 class="alert alert-success"> <?= $this->session->flashdata('danger'); ?></h6>
<?php endif ?>

<div id="tebelaResumo" class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-striped table-bordered table-sm text-center" cellspacing="0" width="100%" style="font-size: .70em">
        <thead>
            <tr>
                <th class="th-sm">Código
                </th>
                <th class="th-sm">Item
                </th>
                <th class="th-sm">Quantidade
                </th>
                <th colspan="2">Ações</th>
            </tr>

        </thead>
        <tbody>
            <?php foreach ($pedido as $e) : ?>
                <tr>
                    <td id="codigoItem"><?= $e['codigoItem'] ?></td>
                    <td id="item"><?= $e['item'] ?></td>
                    <td id="quantidade"><?= $e['quantidade'] ?></td>
                    <td><a href=<?= site_url("pedidos/deletaPedidoResumo?id=$e[id]&codigo=$e[codigoItem]&login=$login") ?>><span class="fas fa-trash" style="color:red"></span></a></td>
                   <!-- <td><a id='editaMisBtnResumo' role='button' data-toggle="modal" data-target="#editaMiscelaneasResumo" data-id="<?php echo $e['id']; ?>" data-codigo="<?php echo $e['codigoItem']; ?>" data-item="<?php echo $e['item']; ?>" data-quantidade="<?php echo $e['quantidade']; ?>" data-login="<?php echo $login ?>"><span class="fas fa-edit" style="color:blue"></a></span></td>-->
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
    <a href=<?= site_url("pedidos/finalizaPedido?tecnico=$login") ?> id="btnFinaliza" class="btn btn-success" id="btnFinaliza">Finalizar Pedido</a>
</div>