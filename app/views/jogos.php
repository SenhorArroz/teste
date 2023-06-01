<?php include 'layout-top.php' ?>


<style>
    body{
        background: -webkit-gradient(linear, left bottom, left top, from(#CCCCCC), to(#7d7d7d));
        background: -moz-linear-gradient(top, #CCCCCC, #7d7d7d);
        filter:progid:DXImageTransform.Microsoft.Gradient(GradientType=0, StartColorStr='#CCCCCC', EndColorStr='#7d7d7d');
    }
</style>
<form method='POST' action='<?=route('jogos/salvar/'._v($data,"id"))?>'>

<label class='col-md-6'>
    Nome
    <input type="text" class="form-control" name="nome" value="<?=_v($data,"nome")?>" >
</label>

<label class='col-md-6'>
    Categoria
    <select name="id_categoria" class="form-control">
        <?php
        foreach($categoria as $categoria){
            _v($data,"id_categoria") == $categoria['id'] ? $selected='selected' : $selected='';
            print "<option value='{$categoria['id']}' $selected>{$categoria['nome']}</option>";

        }
        ?>
    </select>
</label>


<button class='btn btn-primary col-12 col-md-3 mt-3'>Salvar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("jogos")?>">Novo</a>

</form>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Nome</th>
        <th>Id da categoria</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("jogos/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['nome']?></td>
            <td><?=$item['id_categoria']?></td>
            <td>
                <a href='<?=route("jogos/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>