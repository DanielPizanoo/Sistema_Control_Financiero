<div class="container-fluid my-5">
    <div class="row justify-content-center pt-3">
        <h1>Editar</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="text-center">
                <form action="<?php echo site_url('Almacen/proveedorupdate'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id_proveedor" value="<?php echo $proveedor1[0]->id_proveedor; ?>">
                    <div class="form-group">
                        <label for="">Razon Social*</label>
                        <input type="text" class="form-control" name="razons" value="<?php echo $proveedor1[0]->razon_social; ?>"> 
                        <label for="">RFC</label>
                        <input type="text" class="form-control" name="rfc" value="<?php echo $proveedor1[0]->rfc; ?>">
                        <label for="">País</label>
                        <input type="text" class="form-control" name="pais" value="<?php echo $proveedor1[0]->pais; ?>">
                        <label for="">Estado</label>
                        <input type="text" class="form-control" name="estado" value="<?php echo $proveedor1[0]->estado; ?>">
                        <label for="">Ciudad</label>
                        <input type="text" class="form-control" name="ciudad" value="<?php echo $proveedor1[0]->ciudad; ?>">
                        <label for="">Domicilio</label>
                        <input type="text" class="form-control" name="domicilio" value="<?php echo $proveedor1[0]->domicilio; ?>">
                        <label for="">Código Postal</label>
                        <input type="text" class="form-control" name="cp" value="<?php echo $proveedor1[0]->cp; ?>">
                        <label for="">Télefono</label>
                        <input type="text" class="form-control" name="telefono" value="<?php echo $proveedor1[0]->telefono; ?>">
                        <label for="">Celular</label>
                        <input type="text" class="form-control" name="celular" value="<?php echo $proveedor1[0]->celular; ?>">
                        <label for="">Email</label>
                        <input type="text" class="form-control" name="email" value="<?php echo $proveedor1[0]->correo; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>