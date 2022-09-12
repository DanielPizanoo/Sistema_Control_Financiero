<table class="table table-hover">
    <thead>
        <tr class="text-center">
            <th>Estanque</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Tipo de Evento</th>
            <th>Registro</th>
            <th>Detalles</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($registro_eventos as $re)
        {
    ?>
        <tr class="text-center">
            <th class="align-middle"><?php echo $re->estanque; ?></th>
            <td class="align-middle"><?php echo $re->fecha; ?></td>
            <td class="align-middle"><?php echo $re->hora; ?></td>
            <td class="align-middle"><?php echo $re->evento; ?></td>
            <td class="align-middle"><?php echo $re->persona; ?></td>
            <td class="align-middle">
                <a href="<?php echo site_url('Usuario/ver_registro_evento?re=').$re->id_registro_evento.'&e='.$re->id_evento; ?>">
                    <button type="button" class="btn info-bg font-weight-bold rounded-0">Ver detalles</button>
                </a>
            </td>
        </tr>
    <?php
        } // cierra foreach($registro_eventos as $re)
    ?>
    </tbody>
</table>