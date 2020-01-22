<link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/pedidoTec.css">

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

    <h1 id="tituloResumo">Resumo do Pedido</h1>

    <a href=<?= site_url("home/index") ?> id="btnVoltar" class="btn btn-secondary ml-2 mb-1"> Voltar</a>
    <?php $nome = str_replace(' ', '+', $nomeTecnico); ?>
</div>

<table id="tabelaResumo" class="table table-sm table-bordered table-hover text-center">
    <thead>
        <tr class="table-info">
            <th>Serial</th>
            <th>Código Atlas</th>
            <th>Item</th>
            <th>Qtde</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($dados as $p) : ?>
            <tr>
                <td id='mac'><?= $p['mac'] ?></td>
                <td id='codigoItem'><?= $codigoItem = $p['codigoItem'] ?></td>
                <td><?= $p['item'] ?></td>
                <td><?= $p['quantidade'] ?></td>
            </tr>
        <?php endforeach ?>
    </tbody>

</table>
