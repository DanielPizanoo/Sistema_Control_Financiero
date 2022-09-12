<!--<div class="form-group">
    <label for="" class="font-weight-bold">Hora</label>
    <input type="time" class="form-control rounded-0" name="hora" value="<?php //echo date('H:i'); ?>">
</div>-->
<div class="form-group">
    <label for="" class="font-weight-bold">Unidad de medida</label>
    <select class="form-control rounded-0" name="unidad_medida" id="unidad_medida">
        <option disabled selected>-- Seleccione una opción --</option>
        <option value="mg">Miligramos (mg)</option>
        <option value="g">Gramos (g)</option>
        <option value="kg">Kilogramos (kg)</option>
        <option disabled class="font-weight-bold" value="unidades">- Camarones -</option>
    </select>
</div>
<button type="submit" class="btn main-bg text-light rounded-0" id="formsubmit">Registrar Evento</button>
