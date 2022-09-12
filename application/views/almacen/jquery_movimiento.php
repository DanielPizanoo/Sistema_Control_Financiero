<script type="text/javascript">
    $(document).ready(function() {
        $('#fmovimiento').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url: "<?php echo site_url('Almacen/insert_movimientos'); ?>",
                type: "POST",
                contentType: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    cierraModal();
                    alert("Movimiento agregado correctamente");
                }
            });
        });

        function cierraModal() {
            $("#Modal_mov").modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        }

        /*$movimiento=0;
        function agregarFila($producto, $cantidad, $unidadm, $preciou, $subtotal) {
            $movimiento++;
            var data = '<tr>'+
                '<td>' + $movimiento + '</td>'+
                '<td>' + $producto + '</td>'+
                '<td>' + $cantidad + '</td>'+
                '<td>' + $unidadm + '</td>'+
                '<td>' + $preciou + '</td>'+
                '<td>' + $subtotal + '</td>'+
                '<td>' + 
                    '<div class="float-right">' +
                        '<a href="javascript:void(0);" class="btn btn-warning" data-toggle="modal" data-target="">' +
                            '<i class="fa fa-pencil" aria-hidden="true"></i>' +
                        '</a>' +
                    '</div>' +
                '</td>' +
                '<td>' +
                    '<div class="float-right">' +
                        '<a href="javascript:void(0);" class="btn btn-danger" data-toggle="modal" data-target="">' +
                            '<i class="fa fa-trash" aria-hidden="true"></i>' +
                        '</a>' +
                    '</div>' +
                '</td>'
                '</tr>';

            $('#mydata tbody').append(data);
        }*/
    });
</script>