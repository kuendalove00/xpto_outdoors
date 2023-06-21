<!DOCTYPE html>

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
                <td><input type="text" name="nome" class="form-control" required></td>
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