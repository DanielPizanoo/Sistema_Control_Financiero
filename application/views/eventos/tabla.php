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
                <td><button type="button" data-id="<?php echo $e->id; ?>" class="btn info-bg rounded-0 vermas">Ver más</button></td>
            </tr>
        <?php
            } // cierra foreach($eventos as $e)
        ?>
        </tbody>
    </table>
</div>