<div class="container-fluid my-5">
    <div class="row justify-content-center pt-3">
        <h1>Editar</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="text-center">
                <form action="<?php echo site_url('Almacen/rproducto_update'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id_producto" value="<?php echo $rprueba1[0]->id_producto; ?>">
                    <div class="form-group">
                      <label for="">Nombre</label>
                      <input type="text" class="form-control" name="nombre" value="<?php echo $rprueba1[0]->nombre; ?>">
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Tipo producto</label>
                        <select class="form-control rounded-0" name="tipoprod">
                            <?php
                                foreach($rcatalogotipoproducto as $ctp)
                                {
                                    $seleccionado = '';
                                    if($ctp->id_tipo_producto == $rprueba1[0]->id_producto) {
                                        $seleccionado = ' selected ';
                                    }
                                    echo '<option value="'.$ctp->id_tipo_producto.'">'.$ctp->nombre.'</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="font-weight-bold">Proveedor</label>
                        <select class="form-control rounded-0" name="proveedor">
                            <?php
                                foreach($rcatalogoproveedor as $cp)
                                {
                                    $seleccionado = '';
                                    if($cp->id_proveedor == $rprueba1[0]->id_producto) {
                                        $seleccionado = ' selected ';
                                    }
                                    echo '<option value="'.$cp->id_proveedor.'">'.$cp->nombre.'</option>';
                                }
                            ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="font-weight-bold">Unidad Medida</label>
                        <select class="form-control rounded-0" name="unidadm">
                            <?php
                                foreach($rcatalogounidades as $cu)
                                {
                                    $seleccionado = '';
                                    if($cu->id_unidadesdm == $rprueba1[0]->id_producto) {
                                        $seleccionado = ' selected ';
                                    }
                                    echo '<option value="'.$cu->id_unidadesdm.'">'.$cu->descripcion.'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>