<head>
<title>Login</title>
<link rel="stylesheet" href="<?=assets('cssmeu/estilo.css')?>"  />
    <link rel="stylesheet" href="<?=assets('cssmeu/buttons.css')?>" type="text/css"/>
    <script src="app/scripts/script.js"></script>
</head>
<?php if (isset($msg) && $msg != "") : ?>
    <div class="alert alert-danger" role="alert">
    <?=$msg?>
    </div>
<?php endif; ?>
<body>
<div class="loginForm">
<div class="organizacaoflex">


<div>
    <img src="<?= assets("/imgs/gatoCadeado.png") ?>" class="imggatoCadeado">
</div>
<div class="container">
        <div class="loginLocal">
            <div class="form-container">
                <p class="title">Login</p>
                <br>
                <form class="form" method='POST' action='<?=route('logins/login')?>'>
                    
                    <label for="myInput" class="label">
                    <span class="label-title">Email</span>
                    <input id="myInput" class="input" name="email" placeholder="" type="text" value="">
                    </label>
                    <br>
                    <label for="myInput" class="label">
                    <span class="label-title">Senha</span>
                    <input id="myInput" class="input" name="senha" placeholder="" type="password" value="">
                    </label>
                    <br>
                    <button class='Button_Cart' onclick="loginErrado()">Logar</button>
                </form>
                <br>
                <p class="signup">Ainda não tem uma conta?
                    <a href="<?=route('registro')?>" class="">Registrar</a>
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

<?php include 'layout-bottom.php' ?>