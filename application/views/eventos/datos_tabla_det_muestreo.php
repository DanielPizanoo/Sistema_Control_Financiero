<table class="table table-hover mt-3">
    <thead>
        <tr class="text-center">
            <th>No.</th>
            <th>Valor</th>
        </tr>
    </thead>
    <tbody>
    <?php
        foreach($det_muestreo as $de)
        {
    ?>
        <tr class="text-center">
            <td><?php echo $de->numero; ?></td>
            <td><?php echo $de->valor; ?></td>
        </tr>
    <?php
        } // cierra foreach($det_muestreo as $de)
    ?>
    </tbody>
</table>
<button type="button" class="btn main-bg text-light" data-dismiss="modal"><i class="fas fa-check-square"></i> Terminar</button>
                    