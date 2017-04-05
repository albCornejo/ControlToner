<img id="top" src="top.png" alt="">
<div id="form_container">

    <h1><a> Ingreso Insumo</a></h1>
    <form id="form_1010057" class="appnitro"  method="post" action="index.php">
        <div class="form_description" >
            <h2> Ingreso Insumo</h2>
            <p></p>
                        <?php
                if(!empty($_GET["error"]))
                {
                if ($_GET["error"] == 1) {
                    echo "<div class='alert alert-success alert-dismissable'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                    echo "<strong>¡Felicitaciones!</strong> Insumo Ingresado Exitosamente.";
                    echo "</div>";
                } elseif($_GET["error"] == 0) {
                    echo "<div class='alert alert-danger alert-dismissable'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                    echo "<strong>¡Error!</strong> Insumo No Ingresado, Intente Nuevamente.";
                    echo "</div>";
                } elseif($_GET["error"] == 3) {
                    echo "<div class='alert alert-danger alert-dismissable'>";
                    echo "<button type='button' class='close' data-dismiss='alert'>&times;</button>";
                    echo "<strong>¡Error!</strong> Insumo ya existe en la base de datos";
                    echo "</div>";

                }           
                }
            ?>
        </div>						
        <ul >

            <li id="li_1" >
                <label class="description" for="element_1">Marca </label>
                <div>
                    <input id="marca" name="marca" class="element text medium" type="text" maxlength="255" value="" required=""/> 
                </div> 
            </li>		<li id="li_2" >
                <label class="description" for="element_2">Codigo </label>
                <div>
                    <input id="codigo" name="codigo" class="element text medium" type="text" maxlength="255" value="" required=""/> 
                </div> 
            </li>		<li id="li_4" >
                <label class="description" for="element_4">Vigencia </label>
                <div>
                    <select class="element select medium" id="vigencia" name="vigencia" required=""> 
                        <option value="" selected="selected"></option>
                        <option value="S" >Activo</option>
                        <option value="N" >Inactivo</option>


                    </select>
                </div> 
            </li>		<li id="li_3" >
                <label class="description" for="element_3">Codigo Medisyn </label>
                <div>
                    <input id="codigoMedisyn" name="codigoMedisyn" class="element text medium" type="number"  value="" required /> 
                </div> 
<!--            </li>		<li id="li_5" >
                <label class="description" for="element_5">Stock </label>
                <div>
                    <input id="idstock" name="idstock" class="element text medium" type="text" maxlength="255" value="" required=""/> 
                </div> 
            </li>-->
            <li id="li_5" >
                <label class="description" for="element_5">Tipo Insumo </label>
                <div>

                    <select class="element select medium" name="tipo_insumo" id="tipo_insumo">
                       <?php   echo $cbTipoInsumo;   ?>
                    </select>

                </div> 
            </li>

            <li class="buttons">
                <input type="hidden" name="control" id="control" value="InsumoFormIng" />

                <input id="saveForm" class="btn-ejemplo" type="submit" name="submit" value="Guardar" />
            </li>
        </ul>
    </form>	
    <div id="footer">
        <a></a>
    </div>
</div>
<img id="bottom" src="bottom.png" alt="">

