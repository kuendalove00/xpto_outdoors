<?php

require_once 'controller/ClientesController.php';
        
    $controller = new ClientesController();
    $controller->requestsHandler();

include 'header.php';

?>

        <div class="container">
    <table class='table table-bordered table-responsive'>
        <tr>
            <th>Nome</th>
            <th>Tipo</th>
            <th>Comuna</th>
            <th>Nacionalidade</th>
            <th>Morada</th>
            <th>Contacto</th>
            <th colspan="2" align="center">Actions</th>
        </tr>

        <?php foreach ($clientes as $cliente): ?>       
            <tr>
<!--                <td> <img src="
                    width='200' height='200'>
                </td>-->
                <td><?php echo $cliente->getNome(); ?></td>
                <td><?php echo  $cliente->getTipo(); ?></td>
                <td><?php echo $comunas->getComuna($cliente->getComuna())->getNome(); ?></td>
                <td><?php echo $nacionalidades->getNacionalidade($cliente->getNacionalidade())->getNacionalidade();; ?></td>
                <td><?php echo $cliente->getMorada(); ?></td>
                <td><?php echo $contactos->getContacto($cliente->getUid())->getTerminal();  ?></td>
                <td align="center">
                    <a href="index.php?op=details&id=<?php  $cliente->getId(); ?>">details</a>
                </td>
                <td align="center">
                    <a href="index.php?op=active&id=<?php echo $cliente->getId(); ?>">ativar</a>
                </td>
            </tr>
        <?php endforeach; ?>
        <tr>
            <td colspan="7" align="center">
                <div class="pagination-wrap">
                </div>
            </td>
        </tr>
    </table>
</div>
<?php

include 'footer.php';

?>
