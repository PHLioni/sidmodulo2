<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-item-center pt-3 pb-2 mb-3 border-bottom">

    <h2>Técnicos Cadastrados - <?= $cidadeEscolhida ?></h2>
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
        <button type="submit" action="tecnicos/tecnicosCadastrados" class="btn btn-info ml-2 mb-2 mr-3"> Selecionar</button>
        <?php if ($this->session->flashdata('success')) : ?>
            <h6 style="color: green"><?= $this->session->flashdata('success'); ?></h6>
        <?php elseif ($this->session->flashdata('danger')) : ?>
            <h6 style="color:red"><?= $this->session->flashdata('danger'); ?></h6>
        <?php endif ?>
</form>

<table class="table table-sm table-bordered table-striped mt-1 text-center">
    <thead>
        <tr class="table-info">
            <th>Login</th>
            <th>Nome</th>
            <th>UN</th>
            <th>Cidade</th>
            <th>Responsável</th>
            <th colspan="2">Ações</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tecnicos as $e) : ?>
            <tr>
                <td id='login'><?= $e['login'] ?></td>
                <td><?= $e['nome'] ?></td>
                <td><?= $e['un'] ?></td>
                <td><?= $e['cidade'] ?></td>
                <td><?= $e['responsavel'] ?></td>
                <td><a href=<?= site_url("tecnicos/deletaTecnico?id=$e[id]&cidade=$e[cidade]&login=$e[login]") ?>><span class="fas fa-trash" style="color:red"></span></a></td>
                <td><a id="editaTecnicoBtn" style="color:green" role="button" data-toggle="modal" data-target="#editaTecnico" data-login="<?php echo $e['login']; ?>" data-nome="<?php echo $e['nome']; ?>" data-un="<?php echo $e['un']; ?>" data-cidade="<?php echo $e['cidade']; ?>" data-responsavel="<?php echo $e['responsavel']; ?>">
                        <span class=" fas fa-edit" style="color:green"></a></span></td>
                        
            </tr>
        <?php endforeach ?>
    </tbody>

</table>

<div class="modal fade" id="editaTecnico" tabindex="-1" role="dialog" aria-labelledby="editaTecnico" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Novo Item</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php

                $segmento = array(
                    'Miscelaneas' => 'Miscelaneas',
                    'Equipamentos' => 'Equipamentos',
                    'Rede' => 'Rede',
                    'Fibra' => 'Fibra',
                );
                echo form_open("tecnicos/atualizaTecnicos");

                echo form_label("Login", "login");
                echo form_input(array(
                    'name' => 'login',
                    'id' => 'login',
                    'class' => 'form-control',
                    'maxlength' => '255',
                    'style' => 'width:40%',
                    'required' => 'true'
                ));

                echo form_label("Nome", "nome");
                echo form_input(array(
                    'name' => 'nome',
                    'id' => 'nome',
                    'class' => 'form-control',
                    'maxlength' => '255',
                    'required' => 'true'
                ));

                echo form_label("UN", "un");
                echo form_input(array(
                    'name' => 'un',
                    'id' => 'un',
                    'class' => 'form-control',
                    'maxlength' => '255',
                    'required' => 'true'

                ));

                echo form_label("Cidade", "cidade");
                echo form_input(array(
                    'name' => 'cidade',
                    'id' => 'cidade',
                    'class' => 'form-control',
                    'maxlength' => '255',
                    'required' => 'true'

                ));


                echo form_label('Responsável', 'responsavel');
                echo form_input(array(
                    'name' => 'responsavel',
                    'id' => 'responsavel',
                    'class' => 'form-control',
                    'maxlength' => '255',
                    'value' => 'Miscelaneas',
                    'required' => 'true'
                ));



                echo form_button(array(
                    'class' => 'btn btn-primary btn-block mt-2 mb-2',
                    'content' => 'Atualizar',
                    'type' => 'submit',
                ));
                echo form_button(array(
                    'class' => 'btn btn-info btn-block mt-2 mb-2',
                    'content' => 'Fechar',
                    'data-dismiss' => 'modal'

                ));

                echo form_close();

                ?>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#editaTecnicoBtn').click(function() {
        console.log('oi')
        $("#editaTecnico").modal();
    })

    $('#editaTecnico').on('show.bs.modal', function(event) {

        var button = $(event.relatedTarget) // Button that triggered the modal
        var recipientLogin = button.data('login')
        var recipientNome = button.data('nome') // Extract info from data-* attributes
        var recipientUn = button.data('un') // Extract info from data-* attributes
        var recipientCidade = button.data('cidade') // Extract info from data-* attributes
        var recipientResponsavel = button.data('responsavel') // Extract info from data-* attributes

        var modal = $(this)
        console.log(recipientLogin)
        modal.find('#login').val(recipientLogin)
        modal.find('#nome').val(recipientNome)
        modal.find('#un').val(recipientUn)
        modal.find('#cidade').val(recipientCidade)
        modal.find('#responsavel').val(recipientResponsavel)

    });
</script>