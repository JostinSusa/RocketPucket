<?php

$errores = '';
$enviado= '';

if (isset($_POST['submit'])) {
  $nombre = $_POST['Nombre'];
  $correo = $_POST['Correo'];
  $mensaje = $_POST['Mensaje'];
  if (!empty($nombre)) {
    $nombre = trim($nombre);
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);
  }else {
    $errores .= 'Por favor ingrese un nombre <br />';
  }
  if (!empty($correo)){
    $correo = filter_var($correo, FILTER_SANITIZE_EMAIL);

    if (!filter_var($correo, FILTER_VALIDATE_EMAIL)){
      $errores .= 'Por favor ingresa un correo valido <br />';
    }
  } else{
      $errores .= 'Por favor ingresa un correo <br />';
    }

  if (!empty($mensaje)) {
    $mensaje = htmlspecialchars($mensaje);
    $mensaje = trim($mensaje);
    $mensaje = stripslashes($mensaje);
  }else {
    $errores .='Por favor ingresa el mensaje <br />';
  }
  if(!$errores) {
    $enviar_a = 'Correo@correo.com';
    $asunto = 'Correo enviado desde RocketPucket.com';
    $mensaje_preparado = "De: $nombre \n";
    $mensaje_preparado .= "Correo: $correo \n";
    $mensaje_preparado .= "Mensaje: ".$mensaje;

    mail($enviar_a, $asunto, $mensaje_preparado);
    $enviado = 'true';
  }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="css/styleindex.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/c7a5fb3f9a.js" crossorigin="anonymous" ></script>
    <title>Rocket Pucket</title>
</head>
<body>
    <header>
        <img id="headerLogo" src="img/logo1Recurso 3.svg" alt="">
        <video autoplay muted loop>
            <source src="img/videoHeader.mp4" type="video/mp4">
        </video>
    </header>
    <nav>
        <a href=""><img src="img/logo2Recurso 5.svg" alt=""></a>
        <i id="toggleMenu" class='bx bx-menu menuToggle'></i>
        <ul id="menu">
            <li><a href="">Inicio</a></li>
            <li><a href="">Tienda</a></li>
            <li><a href="">Acerca de </a></li>
            <li><a href="">Contacto</a></li>
        </ul>
    </nav >
    <section class="intro">
        <img src="img/logo1Recurso 3.svg" alt="">
            <a href="#contact">
            <i id="discAnimate" class='bx bxs-disc'></i>
            <i class='bx bxs-chevron-down'></i>
            </a>
    </section>

    <section id="contact" class="btn-contact">
    <div class="contenedor_contacto" id="contact">
    <form id="formc" action="<?php htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <h1>Ponte en Contacto</h1>
        <p>Envianos un mensaje</p>
        <img src="img/wood-texture.jpg" alt="" class="wood1">
        <div class="rectangle">
            <h2>Contactanos</h2>
            <h3>+57 111 111 1111</h3>
            <h3>+57 111 111 1111</h3>
            <i class="bx bxl-whatsapp"></i><p> Whatsapp</p>
            <i class="bx bx-envelope"></i><p> Correo</p>
        </div>
        <input type="text" class="form_control" id="Nombre" name="Nombre" placeholder="Nombre: " value="<?php if (!$enviado && isset($nombre)) echo $nombre ?>">

        <input type="text" class="form_control" id="Correo"name="Correo" placeholder="Correo: " value="<?php if (!$enviado && isset($correo)) echo $correo ?>">

        <textarea name="Mensaje" class="form_control" id="Mensaje" placeholder="Mensaje: " value="<?php if (!$enviado && isset($mensaje)) echo $mensaje ?>"></textarea>

        <?php if (!empty($errores)): ?>
        <div class="alert error">
        <?php echo $errores; ?>
        </div>
        <?php elseif ($enviado): ?>
        <div class="alert success">
        <p>Enviado correctamente</p>
        </div>
        <?php endif ?>
        <input type="submit" name="submit" class="btn btn-primary" value="Enviar Correo" >
    </form>
    </div>
    </section>

    <footer>
        <div class="btn-img-s">
            <img src="img/wood-texture.jpg" class="img1" alt="">
            <div class="rectangle2">
                <img src="img/logo.png" class="img2" alt="">  
                <div>
                <a href="">Inicio</a>
                <a href="">Acerca de</a>
                <a href="">Tienda</a>
                </div>
                <h4>Sitio Web desarrollado por ... <script>document.write(new Date().getFullYear());</script></h4>
            </div>
        </div>         
        
    </footer>

    <script src="js/jquery-3.5.1.min.js"></script>
    <script src="js/efectsIndex.js"></script>
</body>
</html>