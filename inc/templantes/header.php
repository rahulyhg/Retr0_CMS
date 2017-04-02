<div id="header" style="height: 71px;background: url(/content/img/avond_sky.png);">
<div class="toast" style="float: right;margin-top: 13px;"><?php echo $UsersOnline; ?> Usuarios conectados</div>
</div>
<ul id="username" class="dropdown-content">
  <li><a href="/home.php">Home</a></li>
  <li><a href="/perfil.php?perfil=<?php echo $myrow['id']; ?>">Perfil</a></li>
</ul>
<nav class="cyan">
   <div class="nav-wrapper">
      <a href="#" class="brand-logo"><?php echo $Nombre; ?> </a>
      <ul id="nav-mobile" class="right hide-on-med-and-down">
        <li><a class="dropdown-button" href="#!" data-activates="username"><?php echo $myrow['username']; ?><i class="material-icons right">arrow_drop_down</i></a></li>
        <li><a href="/comunidad.php">Comunidad</a></li>
        <li><a href="/referidos.php">Referidos</a></li>
		<li><a href="/noticias.php">Noticias</a></li>
		<li><a href="/equipo.php">Equipo</a></li>
		<li><a href="/tienda.php">Tienda</a></li>
        <li><a href="/logout.php">Salir</a></li>
        <?php if($myrow['rank'] > 10) { ?><li><a href="/manage/">HK</a></li><?php } ?>
      </ul>
    </div>
  </nav>
