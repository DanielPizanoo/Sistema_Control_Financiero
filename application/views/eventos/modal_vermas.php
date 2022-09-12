<form id="formvermas">
<!-- Modal -->
    <div class="modal fade" id="modal_ver_mas" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detalles del evento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!--<input type="hidden" value="<?php //echo $id_muestreo; ?>" name="id_muestreo">-->
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Tipo de evento</label>
                        <select name="tipo_evento" id="tipo_evento" class="form-control rounded-0" disabled>
                            <?php
                                $sel = '';
                                $tiempo = '';
                                switch($reg_evento[0]->id_evento)
                                {
                                    case 3: $tiempo='
                                    <div class="form-group">
                                        <label for="" class="font-weight-bold">Hora inicio</label> 
                                        <input type="time" class="form-control rounded-0" name="hora_inicio" id="hora_inicio" value="'.$reg_evento[0]->hora_inicio.'" disabled>
                                    </div>
                                    <div class="form-group">
                                        <label for="" class="font-weight-bold">Hora final</label> 
                                        <input type="time" class="form-control rounded-0" name="hora_final" id="hora_final" value="'.$reg_evento[0]->hora_final.'" disabled>
                                    </div>';
                                    break;
                                    case 4: $tiempo='
                                    <div class="form-group">
                                        <label for="" class="font-weight-bold">Hora</label> 
                                        <input type="time" class="form-control rounded-0" name="hora" id="hora" value="'.$reg_evento[0]->hora_inicio.'" disabled>
                                    </div>';
                                    break;
                                    case 6: $tiempo='
                                    <div class="form-group">
                                        <label for="" class="font-weight-bold">Hora</label> 
                                        <input type="time" class="form-control rounded-0" name="hora" id="hora" value="'.$reg_evento[0]->hora.'" disabled>
                                    </div>';

                                    break;
                                    case 7: $tiempo='
                                    <div class="form-group">
                                        <label for="" class="font-weight-bold">Hora</label> 
                                        <input type="time" class="form-control rounded-0" name="hora" id="hora" value="'.$reg_evento[0]->hora.'" disabled>
                                    </div>';
                                    break;
                                    case 8: $tiempo='
                                    <div class="form-group">
                                        <label for="" class="font-weight-bold">Hora</label> 
                                        <input type="time" class="form-control rounded-0" name="hora" id="hora" value="'.$reg_evento[0]->hora.'" disabled>
                                    </div>';
                                    break;
                                    case 9: $tiempo='
                                    <div class="form-group">
                                        <label for="" class="font-weight-bold">Hora</label> 
                                        <input type="time" class="form-control rounded-0" name="hora" id="hora" value="'.$reg_evento[0]->hora.'" disabled>
                                    </div>';
                                    break;
                                }
                                foreach ($evento as $e)
                                {
                                    if ($e->id_evento == $reg_evento[0]->id_evento)
                                    {
                                        $sel = 'selected';
                                    }
                                    echo '<option value="'.$e->id_evento.'" '.$sel.'>'.$e->nombre.'</option>';
                                    $sel = '';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="" class="font-weight-bold">Fecha</label>
                        <input type="date" class="form-control rounded-0" name="fecha" id="fecha" value="<?php echo $reg_evento[0]->fecha_f; ?>" disabled>
                    </div>

                    <!-- TIEMPO -->
                    <?php echo $tiempo; ?>

                    <div class="form-group">
                        <label for="" class="font-weight-bold">Cantidad</label>
                        <input type="number" class="form-control rounded-0" name="cantidad" id="cantidad" value="<?php echo $reg_evento[0]->cantidad; ?>" disabled>
                    </div>

                    <div class="form-group">
                        <label for="" class="font-weight-bold">Unidad de medida</label>
                        <select class="form-control rounded-0" name="unidad_medida">
                            <option disabled selected>-- Seleccione una opción --</option>
                            <option disabled class="font-weight-bold">- Solidos -</option>
                            <option value="mg">Miligramos (mg)</option>
                            <option value="g">Gramos (g)</option>
                            <option value="kg">Kilogramos (kg)</option>
                            <option disabled class="font-weight-bold">- Liquidos -</option>
                            <option value="ml">Mililitros (ml)</option>
                            <option value="l">Litros (l)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="" class="font-weight-bold">Registrado por:</label>
                        <span class="text-success font-weight-bold"><?php echo $reg_evento[0]->persona_nombre; ?></span>
                    </div>
                    <!--<div class="table-responsive text-center" id="datos_det_muestreo"></div>-->
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn rounded-0 font-weight-bold editar-bg text-light" id="añadir"><i class="far fa-edit"></i> Editar</button>
                    <button type="button" class="btn info-bg font-weight-bold rounded-0" data-dismiss="modal"><i class="far fa-window-close"></i> Cerrar</button>
                    <!--<button type="button" class="btn btn-primary">Save changes</button>-->
                </div>
            </div>
        </div>
    </div>
</form>