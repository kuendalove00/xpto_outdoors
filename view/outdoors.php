
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="content/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="content/css/login.css">
    <title>Inicio</title>
</head>
<body>
    <header>
        <div></div>
        <nav>
            <ul>
                <li><a href="#">Inicio</a></li>
                <li><a href="#">Sobre Nós</a></li>
                <li><a href="#">Serviços</a></li>
                <li><a href="#">Preçario</a></li>
                <li><a href="#">Contactos</a></li>
            </ul>
        </nav>
        <div>
            <div>Serviços</div>
        </div>
    </header>
    <main>

    <div>
        <form method="post" action="" >
            <div >
                <select name="tipo" id="">
                     <?php foreach ($tipos as $tipo): ?>
                        <option value="<?php echo $tipo->getId(); ?>"><?php echo $tipo->getNome(); ?></option>
                     <?php endforeach; ?>
                </select>
            </div>    
            <div >
                <select name="provincia" id="">
                    <?php foreach ($provincias as $provincia): ?>
                        <option value="<?php echo $provincia->getId(); ?>"><?php echo $provincia->getNome(); ?></option>
                     <?php endforeach; ?>
                </select>
            </div>    
            <div >
                <select name="municipio" id="">

                </select>
            </div>    
            <div >
                <select name="comuna" id="">
                    
                </select>
            </div>  
            <div>
                <input type="submit" value="" >
            </div>  
        </form>
    </div>
    <hr>
    <div>
        <h4>Resultados:</h4>
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