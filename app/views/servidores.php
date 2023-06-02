<?php include 'layout-top.php' ?>


<style>
    body{
        background: -webkit-gradient(linear, left bottom, left top, from(#ffffff), to(#42f2ff));
        background: -moz-linear-gradient(top, #ffffff, #42f2ff);
        filter:progid:DXImageTransform.Microsoft.Gradient(GradientType=0, StartColorStr='#ffffff', EndColorStr='#42f2ff');
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
<label class='col-md-6'>
        Membros
        <select name="id_membros" class="form-control">
            <option></option>
            <?php
            foreach($nomes as $nomes){
                print "<option value='{$nomes['id']}'>{$nomes['nome']}</option>";
            }
            ?>
        </select>  
    </label>

<button class='btn btn-primary col-12 col-md-3 mt-3'>Salvar</button>
<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<?=route("servidores")?>">Novo</a>

</form>
<?php if (_v($data,'id')) : ?>
    <table class='table'>
        <tr>
            <th>Membros</th>
            <th>Deletar</th>
        </tr>
        <?php foreach($membros as $item): ?>
            <tr>
                <td><?=$item['nome']?></td>
                <td>
                    <a href='<?=route("servidores/deletarMembro/{$item['id']}")?>'>Deletar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>    
<?php endif; ?>

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
            <td><?=$item['nomeJogo']?></td>
            <td>
                <a href='<?=route("servidores/deletar/{$item['id']}")?>'>Deletar</a>
            </td>
        </tr>

    <?php endforeach; ?>
</table>

<?php include 'layout-bottom.php' ?>