<img id="top" src="top.png" alt="">
<div id="form_container">

    <h1><a> Ingreso Responsable</a></h1>
    <form id="form_1010057" class="appnitro"  method="post" action="">
        <div class="form_description">
            <h2> Ingreso Responsable</h2>
            <p></p>
            <?php
                if(!empty($_GET["error"]))
                {
                if ($_GET["error"] == 1) {
                    echo "<div class='alert alert-success alert-dismissable'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                    echo "<strong>¡Felicitaciones!</strong> Responsable Ingresado Exitosamente.";
                    echo "</div>";
                } elseif($_GET["error"] == 0) {
                    echo "<div class='alert alert-danger alert-dismissable'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                    echo "<strong>¡Error!</strong> Responsable No Ingresado, Intente Nuevamente.";
                    echo "</div>";
                } elseif($_GET["error"] == 3) {
                    echo "<div class='alert alert-danger alert-dismissable'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                    echo "<strong>¡Error!</strong> Rut Responsable ya existe en la base de datos";
                    echo "</div>";

                }           
                }
            ?>
        </div>						
        <ul >

            <li id="li_6" >
                <label class="description" for="element_6">Rut </label>
                <div>
                    <input id="rut" name="rut" class="element text medium" type="text" maxlength="255" value="" required /> 
                </div> 
            </li>
                    <li id="li_6" >
                <label class="description" for="hg">Nombre </label>
                <div>
                    <input id="nombre" name="nombre" class="element text medium" type="text" maxlength="255" value="" required=""/> 
                </div> 
            </li>		<li id="li_1" >
                <label class="description" for="element_1">Apellido Paterno </label>
                <div>
                    <input id="aPaterno" name="aPaterno" class="element text medium" type="text" maxlength="255" value="" required=""/> 
                </div> 
            </li>		<li id="li_2" >
                <label class="description" for="element_2">Apellido Materno </label>
                <div>
                    <input id="aMaterno" name="aMaterno" class="element text medium" type="text" maxlength="255" value="" required=""/> 
                </div> 
            </li>		<li id="li_7" >
                <label class="description" for="element_7">Email </label>
                <div>
                    <input id="correo" name="correo" class="element text medium" type="email" maxlength="255" value="" required /> 
                </div> 
            </li>		<li id="li_4" >
                <label class="description" for="element_4">Vigencia </label>
                <div>
                    <select class="element select medium" id="vigencia" name="vigencia" required=""> 
                        
                        <option value="S" >Activo</option>
                        <option value="N" >Inactivo</option>

                    </select>
                </div> 
            </li>		<li id="li_8" >
                <label class="description" for="element_8">Cargo </label>
                <div>
                     <select class="element select medium" name="cargo" id="cargo">
                       <?php   echo $cbCargo;   ?>
                    </select>
                </div> 
            </li>		<li id="li_9" >
                <label class="description" for="element_9">Unidad </label>
                <div>
                    <select class="element select medium" name="unidad" id="unidad">
                       <?php   echo $cbUnidad;   ?>
                    </select>
                </div> 
            </li>

            <li class="buttons">
                <input type="hidden" name="control" id="control" value="responsableFormIng" />

                <input id="saveForm" class="btn-ejemplo" type="submit" name="submit" value="Guardar" />
            </li>
        </ul>
    </form>	
    <div id="footer">
        <a></a>
    </div>
</div>
<img id="bottom" src="bottom.png" alt="">
