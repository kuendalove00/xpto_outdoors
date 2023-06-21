<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <div class="container">
    <table class='table table-bordered table-responsive'>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th colspan="2" align="center">Actions</th>
        </tr>

        <?php foreach ($tipos as $tipo): ?>
        
            <tr>
                <td><?php echo $tipo->getId(); ?></td>
                <td><?php echo $tipo->getNome(); ?></td>
                <td align="center">
                    <a href="index.php?op=details&id=<?php echo $tipo->getId(); ?>">details</a>
                </td>
                <td align="center">
                    <a href="index.php?op=delete&id=<?php echo $tipo->getId(); ?>">delete</a>
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

    </body>
</html>
