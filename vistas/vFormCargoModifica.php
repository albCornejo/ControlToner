<img id="top" src="top.png" alt="">
<div id="form_container">

    <h1><a>Ingreso de Cargo</a></h1>
    <form id="form_1009588" class="appnitro"  method="post" action="">
        <div class="form_description">
            <h2>Ingreso de Cargo</h2>
            <p></p>
        </div>						
        <ul >

            <li id="li_1">
                <label class="description" for="element_1">Cargo </label>
                <div>
                    <input id="descripcion" name="descripcion" class="element text medium" type="text" maxlength="255" value="<?php echo $objCargomodifica->getDescripcion(); ?> " required=""/>
                    <input id="idcargo" name="idcargo"  type="hidden" value="<?php echo $objCargomodifica->getIdcargo(); ?> " />
                </div> 
            </li>

            <li id="li_2" >
                <label class="description" for="element_2">Vigencia </label>
                <div>
                    <select class="element select medium" id="vigencia" name="vigencia" required=""> 
                        <?php 
                        if($objCargomodifica->getVigencia()== 'S')
                        {
                                 echo "<option value='".$objCargomodifica->getVigencia()."' >Activo</option>";
                                 echo "<option value='N' >Inactivo</option>";
                        }else
                        {
                                echo "<option value='".$objCargomodifica->getVigencia()."' >Inactivo</option>";
                                 echo "<option value='S' >Activo</option>";
                        }
                        
                        ?>


                    </select>
                </div> 
            </li>

            <li class="buttons">
                <input type="hidden" name="control" id="control" value="cargoFormModificado" />

                <input id="saveForm" class="btn-ejemplo" type="submit" name="submit" value="Guardar" />
            </li>
        </ul>
    </form>	
    <div id="footer">
        <a></a>
    </div>
</div>
<img id="bottom" src="bottom.png" alt="">
