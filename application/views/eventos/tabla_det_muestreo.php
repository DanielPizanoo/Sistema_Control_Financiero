<div class="table-responsive">
    <table class="table table-hover">
        <thead>
            <tr class="text-center">
                <th>Fecha</th>
                <th>Hora</th>
                <th>Descripción</th>
                <th>Detalles</th>
            </tr>
        </thead>
        <tbody>
        <?php
            foreach($eventos as $e)
            {
                $ban = 0;
                switch($e->id_evento)
                {
                    case 1: $hora=$e->muestreo_hora;
                        break;
                    case 2: $hora=$e->muestreo_hora;
                        break;
                    case 3: $hora=$e->accion_hora_inicio;
                        break;
                    case 4: $hora=$e->accion_hora_inicio;
                        break;
                    case 5: $hora='No aplica';
                        break;
                    case 6: $hora=$e->aplicacion_producto_hora;
                        break;
                    case 7: $hora=$e->aplicacion_producto_hora;
                        break;
                    case 8: $hora=$e->aplicacion_producto_hora;
                        break;
                    case 9: $hora=$e->aplicacion_producto_hora;
                        break;
                }
        ?>
            <tr class="text-center" <?php if($ban==0){echo 'id="firstrow"'; $ban++;} ?> >
                <th><?php echo $e->fecha; ?></th>
                <td><?php echo $hora; ?></td>
                <td><?php echo $e->tipo_evento; ?></td>
                <td><a href="#">Ver más</a></td>
            </tr>
        <?php
            } // cierra foreach($eventos as $e)
        ?>
        </tbody>
    </table>
</div>

<form id="formdetmuestreo">
<!-- Modal -->
    <div class="modal fade" id="detmuestreomodal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Insertar Muestreos</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="<?php echo $id_muestreo; ?>" name="id_muestreo">
                    <label for="" class="font-weight-bold">Cantidad</label>
                    <div class="input-group">
                        <input type="number" step="0.01" class="form-control rounded-0" name="cantidad" id="cantidad_muestreo" placeholder="Ingrese una cantidad">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success" id="añadir"><i class="fas fa-plus-square"></i> Añadir</button>
                        </div>
                    </div>

                    <div class="table-responsive text-center" id="datos_det_muestreo"></div>

                </div>
                <!--<div class="modal-footer">
                    <button type="button" class="btn main-bg text-light" data-dismiss="modal">Terminar</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>-->
            </div>
        </div>
    </div>
</form>