<div class="container-fluid pt-5 px-3">
    <div class="row justify-content-center mt-3">
        <h2>Página Principal</h2>
    </div>

    <?php
        $ban = 0;
        $contador = 1;
        $x = 0;
        foreach($siembras as $s)
        {
            $x++; // contador de elementos
            if ($ban == 0)
            {
                echo '<div class="row justify-content-center">';
                $ban = 1;
            }
            
        ?>
            <div class="col-md-4 mt-4">
                <div class="card rounded-0 h-100 border-card">
                    <h5 class="card-header text-center card-okay font-weight-bold"><?php echo $s->estanque; ?></h5>
                    <h5 class="text-center text-success font-weight-bold mt-2">Semana: <?php echo $s->semana; ?></h5>
                    <div class="card-body rounded-0">
                        <h5 class="card-title text-center">Últimos registros</h5>
                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr class="text-center">
                                        <th>Fecha</th>
                                        <th>Hora</th>
                                        <th>Evento</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                    $ban2 = 0;
                                    foreach ($registro_eventos as $re)
                                    {
                                        if ($re->id_siembra == $s->id_siembra && $ban2 < 5)
                                        {
                                            $ban2++;
                                ?>
                                    <tr class="text-center">
                                        <td><?php echo $re->fecha; ?></td>
                                        <td><?php echo $re->hora; ?></td>
                                        <td><?php echo $re->evento; ?></td>
                                    </tr>
                                <?php
                                        } // cierra if ($re->id_siembra == $s->id_siembra)
                                    } // cierra foreach ($registro_eventos as $re)
                                ?>
                                </tbody>
                            </table>
                        </div>
                        <!--<div class="text-center">
                            <button type="button" class="btn info-bg rounded-0 font-weight-bold"><i class="fas fa-info-circle"></i> Ver todos</button>
                            <button type="button" class="btn main-bg text-light rounded-0 font-weight-bold"><i class="fas fa-pen"></i> Añadir</button>
                        </div>-->
                    </div>
                </div>
            </div>
        <?php
            if ($contador == 3 || count($siembras) == $x)
            {
                echo '</div>'; // cierra el row
                $ban = 0;
                $contador = 0;
            }
            $contador++; // contador para renglones
        } // cierra foreach($siembras as $s)
    ?>

    <div class="row mt-4 justify-content-center">
        
    </div>

</div>
