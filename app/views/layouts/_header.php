<?php
$path = rtrim( $_app->url['path'], '/' );
$active = array();
if($path!=='') $active[$path] = "class='active'";
?>
<header class="navbar navbar-default" role="navigation">
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="/"><span class="glyphicon glyphicon-calendar"></span> ClinOS Cal</a>
  </div>

  <!-- Collect the nav links, forms, and other content for toggling -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li <?= $active['/dashboard'] ?>><a href="/dashboard">Panel de control</a></li>
      <li <?= $active['/agents'] ?>><a href="/agents">Agentes</a></li>
      <li <?= $active['/places'] ?>><a href="/places">Lugares</a></li>
      <li <?= $active['/services'] ?>><a href="/services">Servicios</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
    <li <?= $active['/user'] ?>><a href="/user/<?= $_SESSION['user']->id ?>"><?#= $_SESSION['user']->name_or_email() ?></a></li>
      <li><form class='navbar-form' action='/login' method='POST'><input type='hidden' name='_METHOD' value='DELETE'/><button type='submit' class='btn btn-danger'>Salir</button></form></li>
    </ul>
  </div><!-- /.navbar-collapse -->
</header>
