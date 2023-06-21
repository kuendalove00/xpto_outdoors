<?php

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
                        <h3>Hello, Again</h3>
                    </div>
                    <form method='post'  action='index.php?op=new' enctype='multipart/form-data'>
                        <div class="input-group mb-3">
                            <input type="text" name="nome" class="form-control form-control-lg bg-light fs-6" placeholder="Nome">
                        </div>
                        <div class="input-group mb-3">
                            <select name="comuna" id="" class="form-control form-control-lg bg-light fs-6" aria-placeholder="Comuna">
                                <?php foreach ($comunas as $comuna): ?>
                                        <option value="<?php echo $comuna->getId(); ?>"><?php echo $comuna->getNome(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input name="morada" type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Morada">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="email" class="form-control form-control-lg bg-light fs-6" placeholder="Email">
                        </div>
                        <div class="input-group mb-3">
                            <input type="tel" name="tel" class="form-control form-control-lg bg-light fs-6" placeholder="Tel">
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="usuario" class="form-control form-control-lg bg-light fs-6" placeholder="Usuario">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="senha" class="form-control form-control-lg bg-light fs-6" placeholder="Senha">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" name="confirmar" class="form-control form-control-lg bg-light fs-6" placeholder="Confirmar Senha">
                        </div>
                        <div class="input-group mb-3">
                            <input type="file" name="foto" class="form-control form-control-lg bg-light fs-6">
                        </div>
                        <div class="input-group mb-3">
                            <input type="submit" name="form-submitted" value="1" class="btn btn-lg btn-primary w-100 fs-6">Entrar</button>
                        </div>
                        <div class="row">
                            <small>Já tem uma conta? <a href="#">Entrar</a></small>
                        </div>
                    </form>
                    
                </div>
            </div>

        </div>
    </main>
<?php

include 'footer.php';

?>

