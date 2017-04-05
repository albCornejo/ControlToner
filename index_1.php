
<!doctype html>

<html>
    <head>
        <title>LOGIN</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="CSS/EstiloLogin.css" rel="stylesheet" type="text/css">
        
        <script src="/path/to/jquery.js" type="text/javascript"></script>
        <script src="/path/to/jquery.ui.draggable.js" type="text/javascript"></script>
        <script src="/path/to/jquery.alerts.js" type="text/javascript"></script>
        <link href="/path/to/jquery.alerts.css" rel="stylesheet" type="text/css" media="screen">
        
        <script language="JavaScript">
                function conMayusculas(field) {
                field.value = field.value.toUpperCase()
                    }
        </script>

    </head>
    
    
            <?php
session_start();
unset($_SESSION["Login"]);
if(!empty($_POST["usuario"])) 
    { 
    
    if($_POST["usuario"]=="ALBERTO" || $_POST["usuario"]=="DICNEY")
    {
        $_SESSION["Login"] = $_POST["usuario"]; 
         header("location: index.php");
    }
     
   }
    
?>

    <body>
        <table>
            <tbody>
                <tr>
                    <td>
                        
                        <div class="login">
                            <h1>Login</h1>
                            <form method="post" action="">
                                <input name="usuario" id="usuario"  type="text" placeholder="Nombre" required="required" onChange="conMayusculas(this)" />
                                <input type="password" id="password" name="password" placeholder="Password" required="required" />
                                <button  type="submit"  class="btn btn-primary btn-block btn-large" value="Login">Ingresar</button>                              
                            </form> 
<!--                            <form method="post">
                                <button  type="submit" class="btn btn-primary btn-block btn-large" value="RegistroUsuario" onclick='index2.php?accion=RegistroDisco'>Registrar</button>
                            </form>-->
                        </div>
                    <td>
                </tr>
            </tbody>
        </table>
    </body>
</html>

