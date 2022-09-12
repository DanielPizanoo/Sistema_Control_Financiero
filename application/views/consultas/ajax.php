<script type="text/javascript">
    $(document).ready(function(){
        //$("#busqueda").trigger('submit');
        $('#formulario_consultas').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url:        "<?php echo site_url('Usuario/consulta_filtros'); ?>",
                type:       "GET",
                data:       $(this).serialize(),
                success:    function(data){
                    $('#tabla').html(data);
                }
            });
        });
    });
</script>