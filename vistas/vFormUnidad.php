<img id="top" src="top.png" alt="">
<div id="form_container">

    <h1><a> Ingreso Unidad</a></h1>
    <form id="form_1010057" class="appnitro"  method="post" action="">
        <div class="form_description">
            <h2> Ingreso Unidad</h2>
            <p></p>
        </div>						
        <ul >

            <li id="li_6" >
                <label class="description" for="element_6">Nombre </label>
                <div>
                    <input id="descripcion" name="descripcion" class="element text medium" type="text" maxlength="255" value="" required/> 
                </div> 
            </li>		<li id="li_1" >
                <label class="description" for="element_1">Piso </label>
                <div>
                    <input id="piso" name="piso" class="element text medium" type="text" maxlength="255" value="" required/> 
                </div> 
            </li>		<li id="li_7" >
                <label class="description" for="element_7">Vigencia </label>
                <div>
                    <select class="element select medium" id="vigencia" name="vigencia" required=""> 
                        <option value="S" >Activo</option>
                        <option value="N" >Inactivo</option>
                    </select>
                </div> 
            </li>
            <li class="buttons">
                <input type="hidden" name="control" id="control" value="unidadFormIng" />

                <input id="saveForm" class="btn-ejemplo" type="submit" name="submit" value="Guardar" />
            </li>
        </ul>
    </form>	
    <div id="footer">
        <a></a>
    </div>
</div>
<img id="bottom" src="bottom.png" alt="">