<?php
if(isset($_GET['login'])){
    header('location: ../login/');
}
if(isset($_GET['cadastro'])){
    header('location: ../cadastro/');
}
?>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">PETSHOP</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item active">
          <a class="nav-link" aria-current="page" href="#">Pagina Inicial</a>
        </li>
      </ul>
      <form class="d-flex" action="" method="GET">
        <input class="form-control" name="login" type="submit" value="Login">
        &nbsp;&nbsp;&nbsp;
        <input class="form-control" name="cadastro" type="submit" value="Cadastro">
      </form>
    </div>
  </div>
</nav>