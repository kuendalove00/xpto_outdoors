<?php
    require_once 'controller/OutdoorsController.php';
        
    $controller = new OutdoorsController();
    $controller->requestsHandler();
    
    include 'header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="content/bootstrap/css/bootstrap.min.css">
    <title>Inicio</title>
</head>
<body>
    

    <header>
        <div class="container">
            <nav class="d-flex flex-wrap justify-content-center py-2 mb-3 border-bottom">
              <div class="col-md-3 mb-2 mb-md-0">
                <a href="/" class="d-inline-flex link-body-emphasis text-decoration-none">
                  <svg class="bi" width="40" height="32" role="img" aria-label="Bootstrap"><use xlink:href="#bootstrap"/></svg>
                </a>
              </div>
        
              <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                <li><a href="#" class="nav-link px-2 link-secondary">Inicio</a></li>
                <li><a href="#" class="nav-link px-2">Sobre Nós</a></li>
                <li><a href="#" class="nav-link px-2">Servicos</a></li>
                <li><a href="#" class="nav-link px-2">Outdoors</a></li>
              </ul>
        
              <div class="col-md-3 text-end">
                <a href="login.php" class="btn btn-outline-primary me-2" value="Entrar">Entart</a>
                <a href="registo.php"  class="btn btn-primary">Registo</a>
              </div>
            </nav>
          </div>

          <div id="carouselExampleCaptions" class="carousel slide">
            <div class="carousel-indicators">
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
              <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
            </div>
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="content/images/template-suportes-1-1100x550px-7-1000x550-1.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
               
                  
                </div>
              </div>
              <div class="carousel-item">
                <img src="content/images/template-suportes-1-1100x550px-7-1000x550-1.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                  
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div>
    </header>
    <main>

      
        <section id="sobre">
            <h2 class="text-center m-lg-5">Sobre Nós</h2>
            <div>
              <div class="container overflow-hidden text-center">
                <div class="row gx-5">
                  <div class="col">
                   <div class="p-3"><img src="../../content/images/outdoor-Angola.jpg" alt="" style="width: 600px; height: 350px;"></div>
                  </div>
                  <div class="col">
                    <h4>X<small>PTO</small> O<small>UTDOORS</small> </h4>
                    <div class="p-3">Custom column padding</div>
                  </div>
                </div>
              </div>
            </div>
        </section>
        <section>
            <h2 class="text-center m-lg-5">Nossos Serviços</h2>
            <div class="container">
              <div class="row align-content-center m-lg-5">
                <div class="col-sm-4 mb-3 mb-sm-0">
                  <div class="card" style="width: 18rem;">
                    <img src="../content/images/OIP.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text">Paineis Luminosos</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="card" style="width: 18rem;">
                    <img src="../content/images/OIP.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text"> Paineis Não Luminosos</p>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="card" style="width: 18rem;">
                    <img src="../content/images/OIP.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <p class="card-text"> Placas 
                        Indicativas</p>
                    </div>
                  </div>
                </div>
              </div>

        
        </section>
        <section id="precos">
            <h2 class="text-center m-lg-5 ">Preços</h2>
            <div class="container">
              <form class="row g-3 mb-5">
                <div class="col-md-2">
                  <label for="inputState" class="form-label">State</label>
                  <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <?php foreach ($tipos as $tipo): ?>
                        <option value="<?php echo $tipo->getId(); ?>"><?php echo $tipo->getNome(); ?></option>
                     <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="inputState" class="form-label">State</label>
                  <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <?php foreach ($tipos as $tipo): ?>
                        <option value="<?php echo $tipo->getId(); ?>"><?php echo $tipo->getNome(); ?></option>
                     <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-3">
                  <label for="inputState" class="form-label">State</label>
                  <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <?php foreach ($tipos as $tipo): ?>
                        <option value="<?php echo $tipo->getId(); ?>"><?php echo $tipo->getNome(); ?></option>
                     <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-2">
                  <label for="inputState" class="form-label">State</label>
                  <select id="inputState" class="form-select">
                    <option selected>Choose...</option>
                    <?php foreach ($tipos as $tipo): ?>
                        <option value="<?php echo $tipo->getId(); ?>"><?php echo $tipo->getNome(); ?></option>
                     <?php endforeach; ?>
                  </select>
                </div>
                <div class="col-md-2 mt-md-5">
                  <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
              </form>

              <div class="row">
                <div class="col-sm-4 mb-3 mb-sm-0">
                  <div class="card" style="width: 18rem;">
                    <img src="../content/images/OIP.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Paineis Luminosos</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="card" style="width: 18rem;">
                    <img src="../content/images/OIP.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Paineis Não Luminosos</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="card" style="width: 18rem;">
                    <img src="../content/images/OIP.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                      <h5 class="card-title">Faixadas</h5>
                      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                      <a href="#" class="btn btn-primary">Go somewhere</a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </section>
        
    </main>
    <div class="container">
        <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
          <p class="col-md-4 mb-0 text-body-secondary">&copy; 2023 XptOutdoors</p>
      
          <a href="/" class="col-md-4 d-flex align-items-center justify-content-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
            XptOutdoors
          </a>
      
          <ul class="nav col-md-4 justify-content-end">
            <li class="nav-item"><a href="#" class="nav-link px-2 text-body-secondary">Incio</a></li>
            <li class="nav-item"><a href="#sobre" class="nav-link px-2 text-body-secondary">Sobre Nós</a></li>
            <li class="nav-item"><a href="#servicos" class="nav-link px-2 text-body-secondary">Servicos</a></li>
            <li class="nav-item"><a href="#outdoors" class="nav-link px-2 text-body-secondary">Outdoors</a></li>
          </ul>
        </footer>
      </div>

    <script src="scripts/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php

include 'footer.php';