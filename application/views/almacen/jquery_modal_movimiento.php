<script type="text/javascript">
    $(document).ready(function() {
        $('#insertem').on('submit', function(e) {
            e.preventDefault();

            if ($('#cabeza').val() == 0) {
                $.ajax({
                    url:    "<?php echo site_url('Almacen/insert_ecabecera'); ?>",
                    type:   "POST",
                    contentType:    "multipart/form-data",
                    processData:    false,
                    contentType:    false,
                    cache:  false,
                    data:   new FormData(this),
                    success:    function(data) {
                        
                    }
                })
                $('#Modal_mov').modal("show");
                $('#cabeza').val("1");
                $('#guardar').attr('disabled', false);
                $('#cancelar').attr('disabled', false);
            }
            else {
                $('#Modal_mov').modal("show");
                $('#cabeza').val("1");
            }
        });

        $('#producto').on('change', function() {
            $('#unidadm').value()
        });
    });
</script>