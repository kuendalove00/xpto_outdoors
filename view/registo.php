<?php

require_once 'controller/ClientesController.php';
        
    $controller = new ClientesController();
    $controller->requestsHandler();

include 'header.php';

?>


     <main>
         <div class="container d-flex justify-content-center align-items-center min-vh-100">
 
             <div class="row border p-3 bg-white shadow box-area">
                <form method='post' class="d-flex justify-content-evenly align-items-center"  action='index.php?op=new' enctype='multipart/form-data'>
                    <div class="col-md-4 left-box">
                        <div class="row align-items-center">
                        <div class="header-text mb-4">
                            <h3>Criar Conta, Again</h3>
                        </div>
                        <div class="input-group mb-3">
                            <input type="text" name="nome" class="form-control form-control-lg bg-light fs-6" placeholder="Nome">
                        </div>
                        <div class="input-group mb-3">
                            <div class="form-check">
                                <input type="radio" class="form-check-input" name="tipo" value="0">
                                <label for="">Empresa</label>
                            </div>
                            <div class="form-check mx-4">
                                <input type="radio" class="form-check-input" name="tipo" value="1">
                                <label for="" >Pessoa Física</label>
                            </div>
                        </div>
                        <div class="mb-3">

                            <textarea name="atividade" class="form-control form-control-lg bg-light fs-6" id="" cols="30" rows="10" placeholder="Atividades"></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <select name="comuna" id="" class="form-control form-control-lg bg-light fs-6" aria-placeholder="Comuna">
                                <?php foreach ($comunas as $comuna): ?>
                                        <option value="<?php echo $comuna->getId(); ?>"><?php echo $comuna->getNome(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <select name="nacionalidade" id="" class="form-control dropdown form-control-lg bg-light fs-6">
                                <?php foreach ($nacionalidades as $nacionalidade): ?>
                                        <option value="<?php echo $nacionalidade->getId(); ?>"><?php echo $nacionalidade->getNacionalidade(); ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="input-group mb-3">
                            <input name="morada" type="text" class="form-control form-control-lg bg-light fs-6" placeholder="Morada">
                        </div>
                        </div>
                    </div>
        
                    <div class="col-md-4 right-box">
                        <div class="row align-items-center">
                            
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
                                    <input type="file" name="foto" class="form-control form-control-lg bg-light fs-6" placeholder="Confirmar Senha">
                                </div>
                                <div class="input-group mb-3">
                                    <input type="submit" name="form-submitted" value="Criar" class="btn btn-lg btn-primary w-100 fs-6">
                                </div>
                                <div class="row">
                                    <small>Já tem uma conta? <a href="login.php">Entrar</a></small>
                                </div>
                            
                            
                        </div>
                    </div>
                </form>
             </div>
         </div>
     </main>
<?php

include 'footer.php';

?>
