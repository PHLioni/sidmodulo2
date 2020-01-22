<?php include 'vendor/modal/modalAddPedido.php'; ?>
<link rel="stylesheet" href="<?php echo base_url() ?>vendor/css/pedidos.css">

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

    <h2 id="textoTitulo">Realizar Pedido</h2>
    <a href=<?= site_url("home/index") ?> id="btnVoltar" class="btn btn-secondary ml-2 mb-1"> Voltar</a>
</div>

<div class="mt-4">

    <p>Nome: <?= $tecnico['nome'] ?> </p>
    <p>Área: <?= $tecnico['un'] ?> </p>
    <p>Cidade: <?= $tecnico['cidade'] ?> </p>
    <p>Responsável: <?= $tecnico['responsavel'] ?> </p>

    <div class="row mt-4"></div>
    <div class="col-sm-12 col-md-6"></div>
    <div class="col-sm-12 col-md-6"></div>
    <?php if ($this->session->flashdata('add')) : ?>
        <h6 class="alert alert-success"><?= $this->session->flashdata('add') ?></h6>
    <?php elseif ($this->session->flashdata('success')) : ?>
        <h6 class="alert alert-success"><?= $this->session->flashdata('success') ?></h6>
    <?php elseif ($this->session->flashdata('danger')) : ?>
        <h6 class="alert alert-danger"><?= $this->session->flashdata('danger') ?></h6>
    <?php else : ?>
    <?php endif ?>

    <div class="table-wrapper-scroll-y my-custom-scrollbar" id="bodyPedidos">
        <table id="tabelaPedido" class="table table-striped table-bordered table-sm text-center" cellspacing="0" width="100%">
            <thead>
                <tr>
                    <th class="th-sm" style="width: 25%;">Código</th>
                    <th class="th-sm">Item</th>
                    <!--<th class="th-sm">Estoque</th>-->
                    <th class="th-sm">Grupo</th>
                    <th class="th-sm">Adicionar</th>
                </tr>

                <tr>
                    <th><input type="text" id='filtro' class="form-control form-control-sm" style="font-size: .80em" placeholder="Código"></th>

                    <th colspan="7" style="background-color: #B0E0E6"></th>
                </tr>
            </thead>
            <tbody id="corpoTabela">
                <?php foreach ($estoque as $e) : ?>
                    <tr>
                        <td id="codigoItem"><?= $e['codigoItem'] ?></td>
                        <td id="item"><?= $e['item'] ?></td>
                        <!--  <td id="quantidade"><?= $e['qtd'] ?></td>    -->
                        <td id="grupo"><?= $e['grupo'] ?></td>
                        <td style="width: 15%;"><a id='adicionaBtn' data-toggle="modal" data-target="#adicionaPedido" data-codigo="<?php echo $e['codigoItem']; ?>" data-grupo="<?php echo $e['grupo']; ?>" data-item="<?php echo $e['item']; ?>" data-max="<?php echo $e['pedidoMax']; ?>" data-tecnico="<?php echo  $tecnico['login']; ?>"><span class="fas fa-plus" style="color:green"></a></span></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
    <a href=<?= site_url("pedidos/resumoPedido?tecnico=$tecnico[login]&cidade=$tecnico[cidade]") ?> class="btn btn-info" id="btnResumo">Verificar Pedido</a>

    <script src="<?php echo base_url() ?>vendor/scripts/filtroPed.js"></script>