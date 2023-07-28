<head><?php

if (getFlash("success")){
    print "<div class='alert alert-success' role='alert'>".getFlash("success")."</div>";
} else
if (getFlash("error")){
    print "<div class='alert alert-danger' role='alert'>".getFlash("error")."</div>";
}

?>
<title>Registro</title>
<link rel="stylesheet" href="<?=assets('cssmeu/estilo.css')?>"  />
    <link rel="stylesheet" href="<?=assets('cssmeu/buttons.css')?>" type="text/css"/>
</head>
<?php if (isset($msg) && $msg != "") : ?>
    <div class="alert alert-danger" role="alert">
    <?=$msg?>
    </div>
<?php endif; ?>
<body>
<div class="loginForm">
    <div class="organizacaoflex">
        <div style="background: url(<?=assets('imgs/fundoCatLogin.png')?>);">
            <img src="<?= assets("/imgs/gatoCadeado.png") ?>" class="imggatoCadeado" >
        </div>
            

    <div class="container">
            <div class="loginLocal">
                <div class="form-container">
                <p class="title">Registrar</p>
                <form class="form" method='POST' action='<?=route('registro/create')?>'> 
                    <label for="myInput" class="label">
                        <span class="label-title">Nome</span>
                        <input id="myInput" class="input <?=hasError("nome","is-invalid")?>" name="nome" placeholder="" type="text" value="<?=old("nome", _v($data,"nome"))?>">
                        <div class='invalid-feedback'><?=getValidationError("nome") ?></div>
                        </label>
                    <br>
                        <label for="myInput" class="label">
                        <span class="label-title">Email</span>
                        <input id="myInput" class="input <?=hasError("email","is-invalid")?>" name="email" placeholder="" type="text" value="<?=old("email", _v($data,"email"))?>">
                        <div class='invalid-feedback'><?=getValidationError("email") ?></div> 
                        </label>
                    <br>
                    <label for="myInput" class="label">
                    <span class="label-title">Senha</span>
                        <input id="myInput" class="input <?=hasError("senha","is-invalid")?>" name="senha" placeholder="" type="password" value="<?=old("senha", _v($data,"senha"))?>">
                        <div class='invalid-feedback'><?=getValidationError("senha") ?></div> 
                    </label>
                    <br>
                    <label class='col-md-6'>
                    Situação
                    <select name="tipo" class="form-control" id="opcao">
                        <option selected hidden>Escolha o tipo</option>
                        <?php
                        $selected= _v($data,"tipo");
                        foreach($tipoUser as $tipo => $valor){
                            print "<option value='".$tipo."'>".$valor."</option>";
                        }
                        ?>
                    </select>
                    <br>
                    <button class='Button_Cart'>Registrar</button> 
                </form>
                <br>
                <p class="signup">Já tem uma conta?
                    <a rel="noopener noreferrer" href="<?=route('logins')?>" class="">Login</a>
                </p>
            </div>
            </div>
    </div>
</div>

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


<!--<a class='btn btn-secondary col-12 col-md-3 mt-3' href="<#?=route("logins")?>">Novo</a>-->

</div>


<?php include 'layout-bottom.php' ?>