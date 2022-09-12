<script type="text/javascript">
    $(document).ready(function(){
        $('select[name="tipo_evento"').on('change', function(){
            var stateID = $(this).val();
            if (stateID) {
                $.ajax({
                    url:        "<?php echo site_url('Usuario/get_eventos'); ?>",
                    type:       "GET",
                    data:       "id="+stateID,
                    success:    function(data){
                        $('#result').html(data);
                        if (stateID == 2){
                            $('#unidad_medida option[value="unidades"]').attr('selected', 'selected');
                            $('#unidad_medida').attr('disabled', 'disabled');
                        }
                    }
                });
            }
        });

        $('#formulario').on('submit', function(e){
            e.preventDefault();
            $.ajax({
                url:        "<?php echo site_url('Usuario/insert_evento'); ?>",
                type:       "POST",
                data:       $(this).serialize(),
                success:    function(data){
                    $('#tabla').html(data);
                    if($('#detmuestreomodal')){
                        $('#detmuestreomodal').modal({
                            backdrop: 'static',
                            keyboard: false
                        })
                        $('#detmuestreomodal').modal("show");
                        $('#formdetmuestreo').on('submit', function(e){
                            e.preventDefault();
                            $.ajax({
                                url:        "<?php echo site_url('Usuario/insert_det_muestreo'); ?>",
                                type:       "POST",
                                data:       $(this).serialize(),
                                success:    function(data){
                                    $('#datos_det_muestreo').html(data);
                                    $('#cantidad_muestreo').val('');
                                }
                            });
                        });
                    }
                    $('#firstrow').ready(function(){
                        $('#firstrow').addClass("table-success");
                        $('#firstrow').fadeOut(600).fadeIn(900);
                    });
                    /*setTimeout(() => {
                        $('#firstrow').toggleClass("table-success");
                    }, 3000);*/
                }
            });
        });

        $(document).on("click", ".vermas", function() {
            // var bid = this.id; // button ID 
            var trid = $(this).attr("data-id"); // table row ID
            console.log(trid);
            $.ajax({
                url:        "<?php echo site_url('Usuario/get_ver_mas'); ?>",
                type:       "GET",
                data:       "id="+trid,
                success:    function(data){
                    $('#vermas').html(data);
                    if($('#modal_ver_mas')){
                        $('#modal_ver_mas').modal({
                            backdrop: 'static',
                            keyboard: false
                        })
                        $('#modal_ver_mas').modal("show");
                    }
                }
            });
          });
    });
</script>