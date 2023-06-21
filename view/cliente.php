<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cliente</title>
    </head>
    <body>
        <?php
        // put your code here
        ?>
        <form method='post'>
        <table class='table table-bordered'>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" class="form-control" required></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone"  class="form-control" required></td>
            </tr>
            <tr>
                <td>Your E-mail ID</td>
                <td><input type="text" name="email"  class="form-control" required></td>
            </tr>
            <tr>
                <td>Address</td>
                <td><textarea type="text" name="address" class="form-control"  required></textarea></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-primary" name="btn-save">
                        <span class="glyphicon glyphicon-plus"></span> Create New Record
                    </button>  
                    <input type="hidden" name="form-submitted" value="1" />
                </td>
            </tr>
        </table>
    </form>
    </body>
</html>
