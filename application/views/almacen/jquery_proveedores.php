<script type="text/javascript">
    $(document).ready(function() {
        $('#fproveedores').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url:    "<?php echo site_url('Almacen/encabezado_insert_proveedores'); ?>",
                type:   "POST",
                contentType:    'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success: function(data) {
                    cierraModal();
                    alert("Proveedor agregado correctamente");
                    $('#proveedor').html(data);
                }
            });
        });

        function cierraModal() {
            $("#Modal_Proveedores").modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        }
    });
</script>