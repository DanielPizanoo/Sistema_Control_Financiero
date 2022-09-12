<div class="container-fluid mt-5">
    <div class="row justify-content-center pt-3">
        <h2>Detalles del evento</h2>
    </div>
    <div class="row px-3 justify-content-center">
        <ul class="list-inline card-titulo text-center w-100">
            <li class="list-inline-item"><h5>Inicio del cultivo: <small class="font-weight-bold"><?php echo $reg_evento[0]->siembra_fi; ?></small></h5></li>

            <li class="list-inline-item"><h5>Especie: <small class="font-weight-bold"><?php echo $reg_evento[0]->variedad; ?></small></h5></li>

            <li class="list-inline-item"><h5>Proveedor: <small class="font-weight-bold"><?php echo $reg_evento[0]->proveedor; ?></small></h5></li>
        </ul>
    </div>
    <div class="row px-3 justify-content-center">
        <h2 class="text-success"><?php echo $reg_evento[0]->evento.' - '.$reg_evento[0]->estanque; ?></h2>
    </div>
    <div class="row px-3 justify-content-center">
        <div class="col-md-6 text-right">
            <h4>Fecha:</h4>
        </div>
        <div class="col-md-6 text-left">
            <h4 class="font-weight-bold"><?php echo $reg_evento[0]->fecha; ?></h4>
        </div>
    </div>
    <div class="row px-3 justify-content-center">
        <div class="col-md-6 text-right">
            <h4>Hora:</h4>
        </div>
        <div class="col-md-6 text-left">
            <h4 class="font-weight-bold"><?php echo $reg_evento[0]->hora; ?></h4>
        </div>
    </div>
    <div class="row px-3 justify-content-center">
        <div class="col-md-6 text-right">
            <h4>Observación:</h4>
        </div>
        <div class="col-md-6 text-left">
            <h4 class="font-weight-bold"><?php echo $reg_evento[0]->hora; ?></h4>
        </div>
    </div>
    <div class="row mb-5 px-3 justify-content-center">
        <div class="col-md-6 text-right">
            <h4>Registrado por:</h4>
        </div>
        <div class="col-md-6 text-left">
            <h4 class="font-weight-bold text-muted"><?php echo $reg_evento[0]->persona; ?></h4>
        </div>
    </div>
    
    <div class="row mt-5 px-3 justify-content-center">
        <?php echo '-- [ Registro realizado el día '.$reg_evento[0]->creacion.' ] --'; ?>
    </div>
</div>