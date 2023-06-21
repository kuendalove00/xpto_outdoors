
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
        <form method='post'  action='index.php?op=new'
        enctype='multipart/form-data'>
        <table class='table table-bordered'>
            <tr>
                <td>Tipo de Outdoor</td>
                <select name="tipo">
                    <option value="1">text1</option>
                </select>
            </tr>
            <tr>
                <td>Comuna</td>
                <select name="comuna">
                    
                </select>
            </tr>
            <tr>
                <td>Preço</td>
                <td><input type="text" name="preco" class="form-control" required></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto" class="form-control" required accept=".png, .jpg, .jpeg" /></td>
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