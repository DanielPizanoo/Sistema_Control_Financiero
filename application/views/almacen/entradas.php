<script>
    function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
    
    var months = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    var days = ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;
    
    var time = setTimeout(function(){ startTime() }, 500);
    }
    
    function checkTime(i) {
        if (i < 10) {
            i = "0" + i;
        }
        return i;
    }
</script>

<style type="text/css">
    table tr:hover {
        background-color: #9ab4ba;
        cursor: pointer;
    }

    table#cabecera {
           width:100%;
           background-color: #9ab4aa;
       }

    table#movimiento {
        width:100%;
    }
</style>

<body onload="startTime()">
    <div class="container-fluid pt-5">
        <div class="row mt-3 px-3 justify-content-center">
                <h5>Documentos de Entrada</h5>
        </div>
        
        <table id="cabecera">
            <tr>
                <td>
                    <div class="row mt-3 px-3 justify-content-left">
                        <form id="insertem" action="<?php echo site_url('Almacen/insert_ecabecera'); ?>" method="post">
                            <table>
                                <tr>
                                    <td>
                                        <p class="font-weight-bold">&nbsp; Folio:</p>
                                    </td>

                                    <td>
                                        <p>
                                            <?php 
                                                echo $contador[0]->last_folio
                                            ?>
                                        </p>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <p class="font-weight-bold">&nbsp; Fecha:</p>
                                    </td>
                                    <td class="align-top">
                                            <!--<div id="clockdate">
                                                <div class="clockdate-wrapper">
                                                    <div id="date"></div>
                                                </div>
                                            </div>-->
                                        <div>
                                            <input type="date" name="fecha" id="fecha" step="1" value="<?php echo date("Y-m-d");?>">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <p class="font-weight-bold">&nbsp; Hora:</p>
                                    </td>

                                    <td class="align-top">
                                        <div>
                                            <input type="time" name="hora" id="hora" step="1" value="<?php echo date("h:i:s"); ?>">
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <td>
                                        <p class="font-weight-bold">&nbsp; Concepto: &nbsp;&nbsp;</p>
                                    </td>

                                    <td>    
                                        <div class="form-group">
                                            <select class="form-control rounded-0" name="concepto" id="concepto" required>
                                                <option value="">Ninguno</option>
                                                <?php 
                                                    foreach($catalogoconcepto as $cco)
                                                    {
                                                        echo '<option value="'.$cco->id_concepto.'">'.$cco->descripcion.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </td>

                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>

                                    <td class="align-top">
                                        <div class="float-right">
                                            <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Conceptos">
                                            <span class="fa fa-plus"></span> Nuevo</a>
                                        </div> 
                                    </td>

                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                        
                                </tr>

                                <tr>
                                    <td>
                                        <p class="font-weight-bold">&nbsp; Proveedor: &nbsp;&nbsp;</p>
                                    </td>

                                    <td>
                                        <div class="form-group">
                                            <select class="form-control rounded-0" name="proveedor" id="proveedor" required>
                                                <option value="">Ninguno</option>
                                                <?php
                                                    foreach($catalogoproveedor as $cp)
                                                    {
                                                        echo '<option value="'.$cp->id_proveedor.'">'.$cp->razon_social.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                    </td>

                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>

                                    <td class="align-top">
                                        <div class="float-right">
                                            <a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Proveedores">
                                            <span class="fa fa-plus"></span> Nuevo</a>
                                        </div>                            
                                    </td>

                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    
                                </tr>
                                                                       
                            </table>
                </td>
            </tr>
        </table>

        <table>
            <tr>
                <td>&nbsp;<td>
            </tr>
        </table>

        <table id="movimiento">
            <tr>
                <td>
                                    <div class="col-12">
                                    <div class="col-md-12">
                                        <div class="float-right">
                                            <input type="hidden" name="cabeza" id="cabeza" value="0">
                                            <button type="submit" class="btn btn-primary" id="insertm">Agregar Movimiento</button>
                                        </div>
                                        <br>
                                        <br>
                                    </div>
                        </form>

                                    <table class="table table-striped table-condensed table-bordered" id="mydata">
                                        <thead>
                                            <tr align="center">
                                                <td>No.</td>
                                                <td>Descripción</td>
                                                <td>Cantidad</td>
                                                <td>Unidad de Medida</td>
                                                <td>Precio Unitario</td>
                                                <td>Subtotal</td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                        </thead>
                                       <tbody>
                                       </tbody>
                                    </table>
                                </div>

                                <div class="mx-auto" style="width: 400px;" align="center">   
                                    <table>
                                        <tr>
                                            <td>
                                                <div>
                                                    <form>
                                                        <div class="col text-center">
                                                            <button id="guardar" type="submit" class="btn btn-success" disabled>Guardar documento</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>

                                            <td>
                                                <div>
                                                    <form>
                                                        <div class="col text-center">
                                                            <button id="cancelar" type="submit" class="btn btn-danger" disabled>Cancelar</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div> 
                        </form>
                    </div>            
                </td>
            </tr>
        </table>
        </div>

<!----------------------------------------------------------Modal movimientos---------------------------------------------------------->
    <div id="Modal_mov" class="modal fade" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Movimiento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <form id="fmovimiento" action="<?php echo site_url('Almacen/insert_movimientos'); ?>" method="post" enctype="multipart/form_data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Producto:</label>
                            <div class="col-md-9">
                                <select class="form-control rounded-0" name="producto" id="producto">
                                    <?php 
                                        foreach($catalogoproductos as $cpr)
                                        {
                                            echo '<option value="'.$cpr->id_producto.'">'.$cpr->nombre.'</option>';
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Unidad de Medida:</label>
                            <div class="col-md-9">
                                <!--
                                    <select class="form-control rounded-0" name="unidadm" id="unidadm">
                                    <?php 
                                        foreach($catalogounidadm as $cu)
                                        {
                                            echo '<option value="'.$cu->id_unidadesm.'">'.$cu->descripcion.'</option>';
                                        }
                                    ?>
                                </select>
                                -->
                                <input type="text" name="unidadm" id="unidadm" class="form-control" value="">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Cantidad:</label>
                            <div class="col-md-9">
                                <input type="number" name="cantidad" id="cantidad" class="form-control" placeholder="Cantidad">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Precio Unitario:</label>
                            <div class="col-md-9">
                                <input type="number" name="preciou" id="preciou" class="form-control" placeholder="Precio Unitario">
                            </div>
                        </div>
                    </div>
                                    
                    <div class="modal-footer">
                        <button type="submit" id="btn_saveCon" class="btn btn-success">Agregar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<!---------------------------------------------- Modales Concepto y Proveedor -------------------------------------------------------------------------->

    <div id="Modal_Proveedores" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Agregar Proveedor</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <p> &nbsp; Campos obligatorios(*)</p>
                            
                <form id="fproveedores" action="<?php echo site_url('Almacen/encabezado_insert_proveedores'); ?>" method="post" enctype="multipart/form_data">
                    <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-3 col-form-label">Razon Social*</label>
                            <div class="col-md-9">
                                <input type="text" class="form-control rounded-0" name="razons" id="" autocomplete="off" require>                                    </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">RFC*</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control rounded-0" name="rfc" id="" autocomplete="off" require> 
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">País*</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control rounded-0" name="pais" id="" autocomplete="off" require>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Estado*</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control rounded-0" name="estado" id="" autocomplete="off" require>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Ciudad*</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control rounded-0" name="ciudad" id="" autocomplete="off" require>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Domicilio*</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control rounded-0" name="domicilio" id="" autocomplete="off" require>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Código Postal*</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control rounded-0" name="cp" id="" autocomplete="off" require>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Teléfono*</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control rounded-0" name="telefono" id="" autocomplete="off" require>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Celular</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control rounded-0" name="celular" id="" autocomplete="off">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Correo*</label>
                                <div class="col-md-9">
                                    <input type="text" class="form-control rounded-0" name="email" id="" autocomplete="off" require>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                            <button type="submit" id="btn_save" class="btn btn-primary">Agregar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
        <div id="Modal_Conceptos" class="modal fade" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agregar Concepto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form id="fconcepto" action="<?php echo site_url('Almacen/encabezado_insert_concepto'); ?>" method="post" enctype="multipart/form_data">                
                        <div class="modal-body">
                            <div class="form-group row">
                                <label class="col-md-3 col-form-label">Descripción</label>
                                    <div class="col-md-9">                                        
                                        <input type="text" class="form-control rounded-0" name="descripcion" id="descripcion" autocomplete="off">
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                <button type="submit" id="btn_saveCon" class="btn btn-primary">Agregar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>