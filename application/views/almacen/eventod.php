<div class="container-fluid my-5">
    <div class="row justify-content-center pt-3">
        <h1>Editar</h1>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="text-center">
                <form action="<?php echo site_url('Almacen/destinoupdate'); ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" name="id_destino" value="<?php echo $destino1[0]->id_destino; ?>">
                    <div class="form-group">
                      <label for="">Descripcion</label>
                      <input type="text" class="form-control" name="descripcion" value="<?php echo $destino1[0]->nombre; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                </form>
            </div>
        </div>
    </div>
</div>