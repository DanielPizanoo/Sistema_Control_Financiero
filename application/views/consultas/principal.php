<div class="container-fluid mt-5">
    <div class="row justify-content-center pt-3">
        <h1>Consultar eventos</h1>
    </div>

    <form method="GET" action="<?php echo site_url('Usuario/consulta_filtros'); ?>" enctype="multipart/form-data" id="formulario_consultas">
        <div class="form-row">
            <div class="form-group col-md-3">
                 <label for="" class="font-weight-bold">Estanque</label>
                <select class="form-control rounded-0" name="estanque" id="estanque">
                    <option value="" selected>-- Todos --</option>
                    <?php
                        foreach($estanques as $e)
                        {
                            echo '<option value="'.$e->id_estanque.'">'.$e->identificador.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="" class="font-weight-bold">Tipo de evento</label>
                <select class="form-control rounded-0" name="tipo_evento" id="tipo_evento">
                    <option value="" selected>-- Todos --</option>
                    <?php
                        foreach($tipos_eventos as $t)
                        {
                            echo '<option value="'.$t->id_evento.'">'.$t->nombre.'</option>';
                        }
                    ?>
                </select>
            </div>
            <div class="form-group col-md-2">
                <label for="" class="font-weight-bold">Fecha Inicial</label>
                <input type="date" class="form-control rounded-0" name="fecha_inicio">
            </div>
            <div class="form-group col-md-2">
                <label for="" class="font-weight-bold">Fecha Final</label>
                <input type="date" class="form-control rounded-0" name="fecha_final">
            </div>
            <div class="form-group col-md-2 align-self-end">
                <button type="submit" class="btn main-bg text-light rounded-0 align-bottom w-100" id="busqueda"><i class="fas fa-search"></i> Buscar</button>
            </div>
        </div>
    </form>
    
    <div class="row my-3">
        <div id="tabla" class="table-responsive px-3">
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
                                <button type="button" class="btn info-bg rounded-0">Ver detalles</button>
                            </a>
                        </td>
                    </tr>
                <?php
                    } // cierra foreach($registro_eventos as $re)
                ?>
                </tbody>
            </table>  
        </div>
    </div>
    
</div>
