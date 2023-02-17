<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ingresar como jugador</title>
  <link rel="stylesheet" href="./static/css/bootstrap.min.css">
  <link rel="stylesheet" href="./static/css/login.css">
</head>
<body class="h-100">
  <div class="container-fluid ">
  <section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">
                <div class="text-center">
                  <img class="rounded-circle" src="./static/img/control1.jpg"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">¡Bienvenido al juego de pulsar los recuadros!</h4>
                </div>
                <form id="formulario">
                  <div class="form-outline mb-4">
                  <label class="form-label" for="form2Example11">Nombre de jugador</label>
                    <input type="email" id="form2Example11" class="form-control"
                      placeholder="Jugadora 1" />
                    
                  </div>

                  
                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="button">¡A jugar!</button>
                    
                  </div>
                 
    
                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
                <h4 class="mb-4 text-center"> Tutorial </h4>
                <p class="small mb-0">Este juego se trata de pulsar 3 botones tendras un color predeterminado de jugador, jugaras contra otro usuario (debes esperar a que inicie otro usuario
                  ). el objetivo sera pintar los 3 colores lo mas rapido posible al lograr los 3 colores mas rapido que tu oponente ganas.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
  </div>
</body>
</html>