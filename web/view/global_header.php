
<?php
  if(isset($_GET['sair'])){
    header('location: ../../controller/auth/logout.php');
  }
  if(isset($_GET['carrinho'])){
    header('location: ../carrinho');
  }
?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="../home">PETSHOP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item active">
          <a class="nav-link" aria-current="page" href="../home">Pagina Inicial</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" aria-current="page" href="../conta">Minha Conta</a>
        </li>
      </ul>
      <form class="d-flex" action="" method="GET">
        <input class="form-control" name="carrinho" type="submit" value="Carrinho">
        &nbsp;&nbsp;&nbsp;
        <input class="form-control" name="sair" type="submit" value="Sair">
      </form>
    </div>
  </div>
</nav>