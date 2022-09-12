<style type="text/css">
    table tr:hover {
        cursor: pointer;
    }

    table#cabecera {
        width:100%;
        height: 50%;
        background-color: #9ab4aa;
    }

    label {
        width: 100px;
        /* word-wrap: normal|break-word|initial|inherit; */
        margin-left: 90px;
        text-align: right;
    } 

    label#tp {
        width: 200px;
        margin-left: 68px;
        text-align: left;
    }
    h4 {
        margin-left: 40px;
    }
    
</style>
<script type="text/javascript" src="../../assets/js/date-helper.js"></script>
<div class="container-fluid pt-5">
    <div class="row mt-3 px-3 justify-content-center">
        <h5>Reportes de Documentos de Entrada</h5>
    </div>
    <table id="cabecera">
        <tr>
            <td>
                <div class="row">
                    <form class="col-sm-12 col-md-12" method="get" enctype="multipart/form-data" action="<?php echo site_url('Almacen/REntradaPDF'); ?>">
                        <h4 class="object rocket move-up">Datos del Reporte</h4>
                        <div class="form-row">
                            <table>
                                <tbody class="row" >
                                    <tr class="col-sm-12 col-md-6 row">
                                        <div class="form-group">
                                            <td class="col-4">
                                                <label class="font-weight-bold" for="">Fecha inicial:</label>
                                            </td>  
                                            <td class="col-8 my-1">
                                                <input type="date" class="form-control ml-0" name="fi" id="fi" onchange="setDateInput(this.value)">
                                            </td>
                                        </div>
                                    </tr>
                                    <tr class="col-sm-12 col-md-6 row">
                                        <div>
                                            <div class="form-group">
                                                <td class="col-4">
                                                    <label class="font-weight-bold" for="">Fecha final:</label>
                                                </td>
                                                <td class="col-8">
                                                    <input type="date" class="form-control ml-0" name="ff" id="ff">
                                                </td>
                                            </div>
                                        </div>
                                    </tr>
                                    <tr class="col-sm-12 col-md-6 row">
                                        <td class="col-sm-4 col-md-4">
                                            <div>
                                                    <div class="form-group">
                                                        <label class="font-weight-bold" for="">Concepto:</label>
                                                    </div>
                                            </div>
                                        </td>
                                        <td class="col-sm-8 col-md-8 my-1">
                                            <select class="form-control rounded-0" name="concepto" id="concepto">
                                                <option hidden selected>Selecciona una opción</option>
                                                <option value="">TODOS</option>
                                                <?php 
                                                    foreach($catalogoconcepto as $cco)
                                                    {
                                                        echo '<option value="'.$cco->id_concepto.'">'.$cco->descripcion.'</option>';
                                                    }
                                                ?>
                                            </select>
                                        </td>
                                    </tr>
                                    <tr class="col-sm-12 col-md-6 row">
                                        <td class="col-sm-4 col-md-4">
                                            <label class="font-weight-bold" for="">Proveedor:</label>
                                        </td>
                                        <td class="col-sm-8 col-md-8">
                                            <select class="form-control rounded-0" name="proveedor" id="proveedor">
                                                <option hidden selected>Selecciona una opción</option>
                                                <option value="">TODOS</option>
                                                <?php
                                                    foreach($catalogoproveedor as $cp)
                                                    {
                                                        echo '<option value="'.$cp->id_proveedor.'">'.$cp->razon_social.'</option>';
                                                    }
                                                ?>
                                            </select>        
                                        </td>    
                                    </tr>
                                    <tr class="col-sm-12 col-md-6 row">
                                        <td class="col-md-4">
                                            <label class="font-weight-bold" for="" id="tp">Tipo de Reporte:</label>
                                        </td>
                                        <td class="col-md-8">
                                            <select class="form-control rounded-0 ml-0" name="formato" id="fotmato">
                                                <option hidden selected>Selecciona una opción</option>
                                                <option value="">PDF</option>
                                                <option value="">XML</option>
                                            </select>   
                                        </td> 
                                    </tr>
                                    <tr class="col-sm-12 offset-4 col-md-5 row my-4">
                                        <td class="offset-1 col-md-4 ">
                                            <div class="mx-auto" style="width: 200px;">
                                                <button type="submit" class="btn btn-success">Generar Reporte</button>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <form>
                                                    <div class="col-md-4">
                                                        <button type="submit" class="btn btn-danger">Cancelar</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>
                </div>
            </td>
        </tr>
    </table>
</div>