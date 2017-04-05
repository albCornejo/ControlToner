<img id="top" src="img/top.png" alt="">
<div id="form_container">

    <h1><a> Ingreso Impresora</a></h1>
    <form id="form_1010057" class="appnitro"  method="post" action="">
        <div class="form_description">
            <h2> Ingreso Impresora</h2>
            <p></p>
        </div>						
        <ul >

            <li id="li_1" >
                <label class="description" for="element_1">Marca </label>
                <div>
                    <select class="element select medium" id="marca" name="marca" required=""> 
                        <option value="" selected="selected"></option>
                        <option value="HP" >HP</option>
                        <option value="XEROX" >XEROX</option>
                        <option value="EPSON" >EPSON</option>
                        <option value="CANON" >CANON</option>
                        <option value="CODONICS" >CODONICS</option>
                        <option value="OKIDATA" >OKIDATA</option>

                    </select> 
                </div> 
            </li>		<li id="li_2" >
                <label class="description" for="element_2">Modelo </label>
                <div>
                    <input id="element_2" name="modelo" class="element text medium" type="text" maxlength="255" value="" required=""/> 
                </div> 
            </li>		<li id="li_3" >
                <label class="description" for="element_3">Serie </label>
                <div>
                    <input id="serie" name="serie" class="element text medium" type="text" maxlength="255" value="" required=""/> 
                </div> 
            </li>		<li id="li_4" >
                <label class="description" for="element_4">Vigencia </label>
                <div>
                    <select class="element select medium" id="element_4" name="vigencia" required=""> 
                        <option value="" selected="selected"></option>
                        <option value="S" >Activo</option>
                        <option value="N" >Inactivo</option>

                    </select>
                </div> 
            </li>		<li id="li_5" >
                <label class="description" for="element_5">Insumo </label>
                <div>
                    <select class="element select medium" id="insumo" name="insumo" required>                         
                       <?php   echo $cbInsumo;   ?>
                    </select>
                </div> 
            </li>		<li id="li_6" >
                <label class="description" for="element_6">Tipo Impresroa </label>
                <div>
                    <select class="element select medium" name="tipo_impresora" id="tipo_impresora" required>
                       <?php   echo $cbTImpresoras;   ?>
                    </select>
                </div> 
            </li>

            <li class="buttons">
                <input type="hidden" name="control" id="control" value="ImpresoraFormIng" />

                <input id="saveForm" class="btn-ejemplo" type="submit" name="submit" value="Guardar" />
            </li>
        </ul>
    </form>	
    <div id="footer">
        <a></a>
    </div>
</div>
<img id="bottom" src="img/bottom.png" alt="">

