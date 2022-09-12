<div class="container-fluid pt-5 px-3">
    <div class="row justify-content-center mt-3">
        <div class="text-center">
            <h1>Eventos de Trazabilidad</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <form id="formulario">
                <div class="form-group">
                    <label for="" class="font-weight-bold">Estanque</label>
                    <select class="form-control rounded-0" name="estanque" id="estanque">
                        <option value="" disabled selected>-- Seleccione un estanque --</option>
                        <?php
                            foreach($estanques as $e)
                            {
                                echo '<option value="'.$e->id_siembra.'">'.$e->estanque.'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="" class="font-weight-bold">Fecha</label>
                    <input type="date" class="form-control rounded-0" name="fecha" value="<?php echo date('Y-m-d'); ?>">
                </div>
                <div class="form-group">
                    <label for="" class="font-weight-bold">Hora</label>
                    <input type="time" class="form-control rounded-0" name="hora" value="<?php echo date('H:i'); ?>">
                </div>
                <div class="form-group">
                    <label for="" class="font-weight-bold">Tipo de evento</label>
                    <select class="form-control rounded-0" name="tipo_evento" id="tipo_evento">
                        <option value="" disabled selected>-- Seleccione un tipo de evento --</option>
                        <?php
                            foreach($tipos_eventos as $t)
                            {
                                echo '<option value="'.$t->id_evento.'">'.$t->nombre.'</option>';
                            }
                        ?>
                    </select>
                </div>
                <div id="result"></div>
            </form>
        </div>
        <div class="col-md 8 mt-4">
            <div id="tabla">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr class="text-center">
                                <th>Estanque</th>
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
                            <tr class="text-center" id="<?php echo $e->id; ?>">
                                <th><?php echo $e->estanque; ?></th>
                                <td><?php echo $e->fecha; ?></td>
                                <td><?php echo $hora; ?></td>
                                <td><?php echo $e->tipo_evento; ?></td>
                                <td><button type="button" data-id="<?php echo $e->id; ?>" class="btn info-bg rounded-0 vermas">Ver más</button></td>
                            </tr>
                        <?php
                            } // cierra foreach($eventos as $e)
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div id="vermas"></div>
</div>
