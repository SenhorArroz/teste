<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gamer Cat</title>


    <link rel="stylesheet" href="<?=assets('cssmeu/estilo.css')?>"  />
    <link rel="stylesheet" href="<?=assets('cssmeu/buttons.css')?>" type="text/css"/>
</head>
<body>

    <?php
    #só exibirá o menu caso esteja logado
    if (isset($_SESSION['user'])):
    ?>
    

      <header class="header">
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              <li>
                <a class="nav-link" href="<?=route('autenticacao/logout')?>">Logout</a>
              </li>
            </ul>
          </div>
        </div>
        
      </nav>
      <div class="ButtonMenuDiv">
          <a class="MenuButton1" href="<?=route('menu')?>">
            <span class="iconMenuButton1">
                <svg viewBox="0 0 175 80" width="40" height="40">
                    <rect width="80" height="15" fill="#f0f0f0" rx="10"></rect>
                    <rect y="30" width="80" height="15" fill="#f0f0f0" rx="10"></rect>
                    <rect y="60" width="80" height="15" fill="#f0f0f0" rx="10"></rect>
                </svg>
            </span>
            <span class="textMenuButton1">MENU</span>
          </a>
        </div>
      </header>

    <?php endif; ?>
    <?php 
    #Exibirá caso NÃO ESTEJA LOGADO
    if (!isset($_SESSION["user"])):
		?>

      <header class="header">
      <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
              
            </ul>
          </div>
        </div>
        
      </nav>
      <nav class="navbarheader">
        <div class="container-fluid">
          <div>
          <a class="buttonLogin" href="<?=route('logins')?>"> Login
                  <div class="iconbuttonLogin">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path fill="none" d="M0 0h24v24H0z"></path><path fill="currentColor" d="M16.172 11l-5.364-5.364 1.414-1.414L20 12l-7.778 7.778-1.414-1.414L16.172 13H4v-2z"></path></svg>
                  </div>
                </a>
          </div>
        </div>
      </nav>
      </header>

    <?php endif; ?>

<!-- HEADER -->

<div class="container">