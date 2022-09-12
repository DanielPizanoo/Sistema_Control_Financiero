<div class="container-fluid pt-5 px-3">
    <div class="row justify-content-center mt-3">
        <h1>Página Principal</h1>
    </div>

    <div class="row mt-4 justify-content-center">
    <?php
        $class="col-md-6";
        switch(count($last_medicion))
        {
            case 3: $class="col-md-4";
                break;
            case 4: $class="col-md-3";
                break;
            default: $class="col-md-6";
                break;
        }
        foreach($last_medicion as $lm)
        {
            $bordercolor = 'border-success';
            $textcolor = 'text-success';

            if ($lm->valor < $lm->minimo || $lm->valor > $lm->maximo)
            {
                $bordercolor = 'border-danger';
                $textcolor = 'text-danger';
            }
    ?>
        <div class="<?php echo $class; ?>">
            <div class="card text-center rounded-0 mb-4 <?php echo $bordercolor; ?>">
                <div class="card-body <?php echo $textcolor; ?>">
                    <h1 class="display-3 font-weight-bold"><?php echo $lm->valor; ?></h1>
                    <h3><?php echo $lm->nombre; ?></h3>
                    <small>Hora de lectura: <?php echo $lm->hora_inicio; ?></small>
                </div>
            </div>
        </div>
    <?php
        } // cierra foreach($last_medicion as $lm)
    ?>
    </div>

    <div class="row mt-3">
        <div class="col-md-6">
            <div class="text-center">
                <h3>Registros del día</h3>
            </div>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>Hora</th>
                            <th>OD</th>
                            <th>Temp.</th>
                            <th>pH</th>
                            <th>Sal.</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        $id = $mediciones[0]->id_medicion;
                        $ban = 0;
                        foreach($mediciones as $m)
                        {
                            if ($m->id_medicion != $id)
                            {
                                $id = $m->id_medicion;
                                echo '</tr>';
                                $ban = 0;
                            }

                            if ($ban == 0)
                            {
                                echo '<tr class="text-center">';
                                echo '<th>'.$m->hora_inicio.'</th>';
                                $ban++;
                            }
                            echo '<td>'.$m->valor.'</td>';
                        } // cierra foreach($mediciones as $m)
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-6">
            <div class="text-center">
                <h3>Eventos del día</h3>
            </div>
            <div id="tabla"></div>
        </div>
    </div>

</div>
