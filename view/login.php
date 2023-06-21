<?php

require_once 'controller/UsuariosController.php';
        
    $controller = new UsuariosController();
    $controller->requestsHandler();

include 'header.php';

?>

    <main>

        <div class="container d-flex justify-content-center align-items-center min-vh-100">

            <div class="row border rounded-start-5 p-3 bg-white shadow box-area"></div>

            <div class="col-md-6 rounded-4 d-flex justify-content-center align-items-center flex-column left-box">
                <div class="featured-image mb-3">
                    <img src="content/images/" class="img-fluid" style="width: 250px;"  alt="">
                </div>
                <p class="text-white fs-2" style="font-family: 'Courier New', Courier, monospace; font-weight: 700;">Be Verified</p>
                <small class="text-white text-wrap text-center" style="width: 17rem; font-family: 'Courier New', Courier, monospace;">Join experienced Designers on this plataform</small>
            </div>

            <div class="col-md-6 right-box">
                <div class="row align-items-center">
                    <div class="header-text mb-4">
                        <p>Hello, Again</p>
                        <p>We are happy to have you back</p>
                    </div>
                    <form method="post" action="index.php?op=verify">
                         <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Nome de Usuario ou Email:">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Senha">
                        </div>
                         <div class="input-group mb-3">
                            <input type="submit" name="form-submitted" value="Entrar" class="btn btn-lg btn-primary w-100 fs-6">>
                        </div>
                        <div><a href="index?pag=registo.php"></a></div>
                    </form>
                   
                </div>
            </div>

        </div>
    </main>
    <footer>
        <div>
            © 2023 XptOutdoors.
        </div>
    </footer>
    <script src="scripts/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php

include 'footer.php';

?>