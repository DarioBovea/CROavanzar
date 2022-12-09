<!DOCTYPE html>
<html lang="es-co" xmlns="http://www.w3.org/1999/xhtml">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatirle" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>CRO Avanzar</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta content="Somos CRO AVANZAR, un centro integral de atención en salud, con profesionales independientes en área de medicina general, dermatologica y medicina interna, además contamos con servicios de salud de terapia física, respiratoria ,salud ocupacional, fonoaudiologia y auditoría odontológica." lang="es-ES" name="description">
  <meta content="salud, medicina, servicios médicos, odontologia, fisisoterapia, terapia física, terapia respiratoria,salud ocupacional, fonoaudiologia y auditoría, odontológia." lang="es-ES" name="keywords">
  <link rel="icon" href="public/img/icocro.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="public/css/styles.css">
</head>
<body>
    <header class="pantalla-principal">
        <nav class="cro-band-contenedor container">
          <input type="checkbox" id="check">
          <div class="logo-contenido">
              <img src="public/img/logoCRO.png" alt="CRO Avanzar">
          </div>
          <ul class="main-menu">
            <li class="menu-iten"  id="ini-sesion">
              <a href="view\login.php">Inicia Sesion  <i class="fa fa-sign-in" aria-hidden="true"></i></a>
            </li>
            <li class="menu-iten">
              <a href="#">Inicio</a>
            </li>
            <li class="menu-iten">
              <a href="#planes-section">Nosotros</a>
            </li>
            <li class="menu-iten">
              <a href="#services-section">Nuestros Servicios</a>
            </li>
            <li class="menu-iten">
              <a href="#contactos">Contactenos</a>
            </li>
          </ul>
          <div class="ico-login">
            <a href="view\login.php"><img src="public/img/user.png" alt="user" height="40"></a>
          </div>
          
          <label for="check" class="checkbtn">
            <img width= "40px" src="public/img/btn-menu.png" alt="btn-menu">
          </label>   
        </nav>
        <!-- cro-band-contendor -->
        <div class="cro-contenedor">
            <div class="cro-contenido container">
                <div class="cro-izquierda">
                    <div class="cro-plan">
                        <h1>Centro de Rehabilitación & Ortopédicos - AVANZAR</h1>
                    </div>

                    <h3>
                        Es un centro de atención médica, rehabilitación integral, servicio de auditoría clínicas
                        y ventas de ortopédicos.
                    </h3>

                    <a target="_blank" href="view/registro.php" class="btn-cita">¡Agenda tu cita!</a>
                </div>
            </div>
        </div>
    </header>

  <!-- PLANES -->
  <section class="planes-ofrecidos">
    <div class="band-hemos">
      <div class="hemos centrar-texto " id="planes-section">
        <div class="hemos-contenido">
          <h2> Con excelentes profesionales, con alto nivel de calidez humana, calidad médica,
            y gran sentido de responsabilidad para sus pacientes y usuarios.</h2>
        </div>
      </div>
      <div class="rombo">
        <img src="public/img/rombo-blanco.png" alt="png">
      </div>
    </div>
    <div class="planes">
      <div class="site-planes">

        <div class="plan-lista">
          <img src="public/img/number1.png" alt="">
          <div class="plan seudolinea">
            <div class="contenido-plan">
              <p>
                Aseguramos los más adecuados procesos de rehabilitación, prevención, atención de
                múltiples enfermedades, y mediante auditoras clínicas en las distintas áreas de la salud
                garantizamos la excelente prestación de nuestros servicios.
              </p>
            </div>
          </div>
        </div>
        <div class="plan-lista">
          <img src="public/img/number2.png" alt="">
          <div class="plan seudolinea">
            <div class="contenido-plan">
              <p>
                Nuestra intervención va dirigida a toda persona que lo precise, es decir: empresas, pacientes: en la
                niñez, jóvenes, adultos y adultos mayores, involucrando a sus familias y entorno.
              </p>
            </div>
          </div>
        </div>
        <h3
          class="bienestar">¡TÚ BIENESTAR ES NUESTRA PRIORIDAD!
        </h3>
      </div> 
      <div class="doctora">
        <div class="doc">
          <img src="public/img/doctora.png" alt="doctora">
        </div>
      </div>
    </div>
  </section>

  <!-- SERVICIOS -->

  <section class="services" id="services-section">
      <div class="cro-contenedor2">
          <div class="cro-contenido container">
              <div class="cro-izquierda">
                  <div class="nuestros_servicios">
                      <h1>Nuestros Servicios</h1>
                  </div>
                    <!-- <a href="#services-section" class="btn-azul">Ver Servicios</a> -->
                  </div>
          </div>
      </div>
</section>

  <!-- TARJETAS -->
  <section class="tarjetas">
    <div class="tarjetas-preguntas">
      <div class="tarjeta tarjeta1">
        <div class="tarjeta-contenido">
          <h2>AUDITORIA</h2>
          <p>Contamos con profesionales especialistas en Auditoría de la Calidad en Salud, que garantizarán la
            pertinencia, racionalidad y excelencia de los servicios de salud brindados a nuestros pacientes, clientes y
            aliados.</p>
        </div>
      </div>
      <div class="tarjeta tarjeta1">
        <div class="tarjeta-contenido">
          <h2>VENTA DE ORTOPÉDICOS</h2>
          <p>Con atención personalizada y asesoría especializada en: Artículos ortopédicos, Artículos médicos, Equipos
            de rehabilitación y fisioterapia, Silla de ruedas, Bastones y muletas.</p>
        </div>
      </div>
      <div class="tarjeta tarjeta1">
        <div class="tarjeta-contenido">
          <h2>MEDICINA GENERAL</h2>
          <p>Servicios en consulta externa y domiciliaria.</p>
        </div>
      </div>
      <div class="tarjeta tarjeta2">
        <div class="tarjeta-contenido">
          <h2>REHABILITACIÓN INTEGRAL</h2>
          <p>Servicios en consulta externa y domiciliaria.</p>
        </div>
      </div>
      <div class="tarjeta tarjeta3">
        <div class="tarjeta-contenido">
          <h2>TRAUMATOLOGIA</h2>
          <p>Cervicalgia, dorsalgia, lumbalgia, post operatorio de columna, síndrome de manguito rotador, contracturas,
            sobrecargas musculares, fracturas, esguinces, post operatorio de reemplazo total de cadera y rodilla. </p>
        </div>
      </div>
      <div class="tarjeta tarjeta3">
        <div class="tarjeta-contenido">
          <h2>REUMATOLOGIA</h2>
          <p>Artrosis, artritis rematoidea, gota, espondilosis anquilosante.</p>
        </div>
      </div>
      <div class="tarjeta tarjeta1">
        <div class="tarjeta-contenido">
          <h2>FISIOTERAPIA DEPORTIVA</h2>
          <p>Lesiones y post operatorios de ligamentos, lesiones y post operatorios de meniscos, epicondilitis,
            epitrocleitis, bursitis, rupturas fibrilares, fascitis plantar.</p>
        </div>
      </div>
      <div class="tarjeta tarjeta2">
        <div class="tarjeta-contenido">
          <h2>KINESIOTAPING</h2>
          <p>Inflamaciones agudas (contusiones, edemas, hematomas, sinovitis, e incluso tras una cirugía para mejorar la
            inflamación).</p>
        </div>
      </div>
      <div class="tarjeta tarjeta2">
        <div class="tarjeta-contenido">
          <h2>NEUROLOGIA</h2>
          <p>Secuelas de acv, parálisis facial, parálisis cerebral, retraso motor simples o asociados, esclerosis
            múltiple lesiones medulares. </p>
        </div>
      </div>
      <div class="tarjeta tarjeta3">
        <div class="tarjeta-contenido">
          <h2>TERAPIA RESPIRATORIA</h2>
          <p>Asma, EPOC, bronquitis, bronquiolitis.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- FOOTER -->
  <footer class="site-footer">
  <div class="footer-top">
          <div class="row">
              <div class="cro-logo-footer">
                  <img src="./public/img/logoCRO.png">
              </div>
              <div class="contacto">
                <p>
                  <strong>Comuníquese con nosotros: </strong>
                  <br><br>
                    De lunes a viernes,
                  <br>
                    7:00 am a 6:00 pm
                  <br>
                    En jornada continua.
                  </p>
                <p><img src="./public/img/dir.png" alt="dir" height="30">   Carrera 15 # 43 - 43</p>
                <p><img src="./public/img/phone.png" alt="tel" height="30"> (57) 310 516 5018</p>
              </div>
              <div class="social-media">
                <P><strong>Siguenos en nuestras redes sociales</strong></P>
                    <a target="_blank" href="https://wa.me/573105165018">
                      <img src="./public/img/whatsapp.png" alt="whatsapp" >
                    </a>
                    <a target="_blank" href="https://www.facebook.com/CRO-Avanzar-101698554742998/">
                      <img src="./public/img/facebook.png" alt="facebook">
                    </a> 
                    <a target="_blank" href="https://www.instagram.com/croavanzar/">
                      <img src="./public/img/instagram.png" alt="instagaram">
                    </a>
                    <a target="_blank" href="https://www.linkedin.com/in/cro-avanzar-s-4b90101a0/?trk=public_profile_browsemap&originalSubdomain=co">
                      <img src="./public/img/linkedin.svg" alt="linkedIn">
                    </a>
              </div>
          </div>
      </div>
      <div class="footer-bottom" id="contactos">
        <div class="copyright">
          CRO Avanzar 2021 - 2022. &copy; Todos los derechos resevados.
        </div>
      </div>
    
  </footer>
</body>

</html>