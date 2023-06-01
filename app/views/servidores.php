<?php include 'layout-top.php' ?>


<style>
    body{
        background: -webkit-gradient(linear, left bottom, left top, from(#CCCCCC), to(#7d7d7d));
        background: -moz-linear-gradient(top, #CCCCCC, #7d7d7d);
        filter:progid:DXImageTransform.Microsoft.Gradient(GradientType=0, StartColorStr='#CCCCCC', EndColorStr='#7d7d7d');
    }
</style>
<form method='POST' action='<?=route('servidores/salvar/'._v($data,"id"))?>'>

<label class='col-md-6'>
    Nome
    <input type="text" class="form-control" name="nome" value="<?=_v($data,"nome")?>" >
</label>

<label class='col-md-6'>
Id do jogo
    <select name="id_jogo" class="form-control">
        <?php
        foreach($jogos as $jogos){
            _v($data,"id_jogo") == $jogos['id'] ? $selected='selected' : $selected='';
            print "<option value='{$jogos['id']}' $selected>{$jogos['nome']}</option>";
        }
        ?>
    </select>
</label>


<button class='btn btn-primary col-12 col-md-3 mt-3'>Salvar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("servidores")?>">Novo</a>

</form>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Nome</th>
        <th>Id do jogo</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("servidores/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['nome']?></td>
            <td><?=$item['id_jogo']?></td>
            <td>
                <a href='<?=route("servidores/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>