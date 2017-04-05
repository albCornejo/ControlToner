<h2><p class="text-primary text-center"><?php echo $tituloVista; ?></p></h2>
<?php
if(!empty($_GET["mensaje"]))
{
if($error = 1)
{
    echo "<div class='alert alert-success alert-dismissable'>";
    echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
    echo "<strong>Felicitaciones!</strong>".$_GET["mensaje"]." Exitosamente.";
    echo "</div>";
} elseif($error = 0) {
    echo "<div class='alert alert-danger alert-dismissable'>";
    echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
    echo "<strong>Error!</strong>".$_GET["mensaje"]." , Intente Nuevamente.";
    echo "</div>";
}
}       
    echo $datos;
    

    
    
    
    
   ?> 
          





