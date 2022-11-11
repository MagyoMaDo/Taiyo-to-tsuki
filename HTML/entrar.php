<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <title>Home</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">
    <link href="../CSS/main.css" rel="stylesheet" >
      
       <!--JS-->
       <script
       src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
       integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
       crossorigin="anonymous"
     ></script>
     <script src="../JS/bootstrap.min.js"></script>
     <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
     <script src="../JS/main.js"></script>
    
</head>
  <body>
    <!-- HEADER -->
<div id="header">
  <div class="container">
  <nav class="navbar navbar-expand-lg navbar-light justify-content-between">
      <a class="navbar-brand" href="index.html">
        <img src="../IMAGENS/Uso_Geral/Logo - PT1.jpg" class="img-fluid"  width="58">
      </a>
      <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarNav"
      aria-controls="navbarNav"
      aria-expanded="false"
      aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" href="promocao.html">Promoção</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="produtos.html">Produtos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Carrinho</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Compra e Entrega</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="#">Entrar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active " href="#">Cadastra-se</a>
          </li>
        </ul>
      </div>
    </nav>
  </div>
</div>
    <!-- //HEADER -->

    <!-- Caixa de Digitação -->
    <div
    class="align-self-center text-center"><legend><h1>Entrar</h1></legend>
    </div>
    <div id="contato">
      <div class="container" >
        <div class="email">
        
        <form action="../PHP/TelaLogin.php" method="POST">
          <div class="flex-md-grow-1 pr-md-3 pb-md-0 pb-3" class="block">
            <label for="exampleInputEmail1" class="form-label">Email</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="Email_Do_Usuario">
            
          <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Senha</label>
            <input type="password" class="form-control" id="exampleInputPassword1" name="Senha">
          </div>
          <div
          class="text-right"><h6> <a class="nav-link active " href="#">Esqueci a Senha</a></h6>
          </div>
          <button type="submit" class="btn btn-primary justify-content-center">Entrar</button>
        </form>
        </div>
      </div>
    </div>
    </div>
    <!-- //Fim da Caixa de Digitação -->
    <?php
    session_start();
    if(!isset($_SESSION['msg']) || empty($_SESSION['msg'])){
    echo "";
    }else{
        echo $_SESSION['msg'];
        unset($_SESSION['msg']);
    }

    ?>
  </body>