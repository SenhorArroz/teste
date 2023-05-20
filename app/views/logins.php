<?php include 'layout-top.php' ?>


<style>
    body{
        background: -webkit-gradient(linear, left bottom, left top, from(#CCCCCC), to(#7d7d7d));
        background: -moz-linear-gradient(top, #CCCCCC, #7d7d7d);
        filter:progid:DXImageTransform.Microsoft.Gradient(GradientType=0, StartColorStr='#CCCCCC', EndColorStr='#7d7d7d');
    }
</style>
<form method='POST' action='<?=route('logins/salvar/'._v($data,"id"))?>'>

<label class='col-md-6'>
    Nome
    <input type="text" class="form-control" name="nome" value="<?=_v($data,"nome")?>" >
</label>

<label class='col-md-2'>
    Email
    <input type="text" class="form-control" name="email" value="<?=_v($data,"email")?>" >
</label>

<label class='col-md-2'>
    Senha
    <input type="text" class="form-control" name="senha" value="<?=_v($data,"senha")?>" >
</label>

<!-- <label class='col-md-6'>
    Tipo
    <select name="tipo" class="form-control">
        <?php
        /*foreach($tipos as $k=>$tipo){
            _v($data,"tipo") == 1 ? $selected='selected' : $selected='';
            print "<option value='$k' $selected>$tipo</option>";
        }*/
        ?>
    </select>
</label> -->

<button class='btn btn-primary col-12 col-md-3 mt-3'>Salvar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("logins")?>">Novo</a>

</form>

<table class='table'>

    <tr>
        <th>Editar</th>
        <th>Nome</th>
        <th>Email</th>
        <th>Deletar</th>
    </tr>

    <?php foreach($lista as $item): ?>

        <tr>
            <td>
                <a href='<?=route("logins/index/{$item['id']}")?>'>Editar</a>
            </td>
            <td><?=$item['nome']?></td>
            <td><?=$item['email']?></td>
            <td>
                <a href='<?=route("logins/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>