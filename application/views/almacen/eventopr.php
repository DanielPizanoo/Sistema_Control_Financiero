<div class="container-fluid my-5">
    <div class="row justify-content-center pt-3">
        <h1>Editar</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="text-center">
                <form action="<?php echo site_url('Almacen/producto_update'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id_producto" value="<?php echo $prueba1[0]->id_producto; ?>">
                    <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" name="nombre" value="<?php echo $prueba1[0]->nombre; ?>">
                    </div>

                    <div class="form-group">
                        <label for="tipoprod" class="font-weight-bold">Tipo producto</label>
                        <select class="form-control rounded-0" name="tipoprod">
                            <?php
                                foreach($catalogotipoproducto as $ctp)
                                {
                                    $seleccionado = '';
                                    if($ctp->id_tipo_producto == $prueba1[0]->id_tipo_producto) {
                                        $seleccionado = ' selected ';
                                    }
                                    echo '<option value="'.$ctp->id_tipo_producto.'">'.$ctp->nombre.'</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="proveedor" class="font-weight-bold">Proveedor</label>
                        <select class="form-control rounded-0" name="proveedor">
                            <?php
                                foreach($catalogoproveedor as $cp)
                                {
                                    $seleccionado = '';
                                    if($cp->id_proveedor == $prueba1[0]->id_proveedor) {
                                        $seleccionado = ' selected ';
                                    }
                                    echo '<option value="'.$cp->id_proveedor.'">'.$cp->razon_social.'</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="unidadm" class="font-weight-bold">Unidad Medida</label>
                        <select class="form-control rounded-0" name="unidadm">
                            <?php
                                foreach($catalogounidades as $cu)
                                {
                                    $seleccionado = '';
                                    if($cu->id_unidadesdm == $prueba1[0]->id_unidadesdm) {
                                        $seleccionado = ' selected ';
                                    }
                                    echo '<option value="'.$cu->id_unidadesdm.'">'.$cu->descripcion.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                      <label for="precio">Precio</label>
                      <input type="text" class="form-control" name="precio" value="<?php echo $prueba1[0]->precio; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>