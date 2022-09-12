<!--<div class="form-group">
    <label for="" class="font-weight-bold">Hora</label>
    <input type="time" class="form-control rounded-0" name="hora" value="<?php //echo date('H:i'); ?>">
</div>-->
<div class="form-group">
    <label for="" class="font-weight-bold">Producto</label>
    <select class="form-control rounded-0" name="producto" id="producto">
        <option disabled selected>-- Seleccione un producto --</option>
        <?php
            foreach($productos as $p)
            {
                echo '<option value="'.$p->id_producto.'">'.$p->nombre.'</option>';
            }
        ?>
    </select>
</div>
<div class="form-group">
    <label for="" class="font-weight-bold">Cantidad</label>
    <input type="number" step="0.01" class="form-control rounded-0" name="cantidad">
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
<button type="submit" class="btn main-bg text-light rounded-0" id="formsubmit">Registrar Evento</button>