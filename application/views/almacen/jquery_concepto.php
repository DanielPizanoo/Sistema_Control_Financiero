<script type="text/javascript">
    $(document).ready(function() {
        $('#fconcepto').on('submit', function(e) {
            e.preventDefault();
            $.ajax({
                url:    "<?php echo site_url('Almacen/encabezado_insert_concepto'); ?>",
                type:   "POST",
                contentType: 'multipart/form-data',
                processData: false,
                contentType: false,
                cache: false,
                data: new FormData(this),
                success:    function(data) {
                    cierraModal();
                    alert("Concepto agregado correctamente");
                    $('#concepto').html(data);
                }
            });
        });

        function cierraModal() {
            $("#Modal_Conceptos").modal('hide');
            $('body').removeClass('modal-open');
            $('.modal-backdrop').remove();
        }
    });
</script>