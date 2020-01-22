<?php include 'vendor/modal/modalMiscelaneas.php'; ?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

    <h2>Estoque de Miscelâneas <?= $cidadeEscolhida ?></h2>
    <a href=<?= site_url("home/index") ?> class="btn btn-secondary ml-2 mb-1"> Voltar</a>

</div>
<form class="form-group">
    <div class="row ml-1">
        <label for="ddd" class="label ml-1 mr-2 " style="font-size:1.5em;">Cidade: </label>
        <select class="form-control" name='selecionaCidade' style="width:25%;" id="ddd">
            <?php foreach ($cidades as $c) : ?>
                <option><?= $c['cidade'] ?></option>
            <?php endforeach ?>
        </select>
        <button type="submit" action="estoque/estoqueMiscelaneas" class="btn btn-info ml-2 mb-2 mr-3"> Selecionar</button>
</form>

<button type="button" class="btn btn-primary mb-2 mr-2" data-toggle="modal" data-target="#cadastraItem" data-whatever="@mdo">Cadastrar Item</button>

<?php if ($this->session->flashdata('success')) : ?>
    <h6 style="color:green;"><?= $this->session->flashdata('success') ?></h6>
<?php elseif ($this->session->flashdata('danger')) : ?>
    <h6 style="color:red;"><?= $this->session->flashdata('danger') ?></h6>
<?php endif ?>

<table class="table table-sm table-bordered  mt-1 text-center" id='tabela'>
    <thead>
        <tr class="table-info">
            <th>Código</th>
            <th>Item</th>
            <th>Quantidade</th>
            <th>Valor Un.</th>
            <th>Valor Total</th>
            <th colspan="3">Ações</th>
        </tr>
        <tr>
            <th><input type="text" id='filtro' class="form-control form-control-sm" placeholder="Código"></th>
            <th><input type="text" id='filtro' class="form-control form-control-sm" placeholder="Item"></th>
            <th colspan="7" style="background-color: #B0E0E6"></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($estoque as $e) : ?>
            <?php $city = str_replace(' ', '+', $e['cidade']); ?>
            <tr>
                <td><?= $e['codigoItem'] ?></td>
                <td><?= $e['item'] ?></td>
                <td><?= $e['quantidade'] ?></td>
                <td><?= numReais($e['valor_un']) ?></td>
                <td><?= numReais($e['quantidade'] * $e['valor_un']) ?></td>
                <td><a href=<?= site_url("estoque/deletaMiscelaneas?id=$e[id]&cidade=$city&codigo=$e[codigoItem]") ?>><span class="fas fa-trash" style="color:red"></span></a></td>
                <td><a id='trasfereBtn' data-toggle="modal" data-target="#transfereMiscelaneas" data-codigo="<?php echo $e['codigoItem']; ?>" data-item="<?php echo $e['item']; ?>"><span class="fas fa-dolly" style="color:green"></a></span></td>
                <td><a id='editaMisBtn' role='button' data-toggle="modal" data-target="#editaMiscelaneas" data-codigo="<?php echo $e['codigoItem']; ?>" data-item="<?php echo $e['item']; ?>" data-quantidade="<?php echo $e['quantidade']; ?>" data-valor="<?php echo $e['valor_un']; ?>" data-id="<?php echo $e['id']; ?>"><span class="fas fa-edit" style="color:blue"></a></span></td>
            </tr>
        <?php endforeach ?>
    </tbody>    
</table>
<script src="<?php echo base_url() ?>vendor/scripts/filtros.js"></script>
</body>

</html>