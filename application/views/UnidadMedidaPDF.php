<div id="container"> 
    <div id="body">
        <table id='customers'>
            <tr>
                <th><h3>Clave</h3></th>
                <th><h3>Descripción</h3></th>
            </tr>
            <?php
                foreach ($unidadesdm as $udm){
                    echo "
                    <tr>
                        <td><p align='center'>".$udm->id_unidadesm."</p></td>
                        <td><p align='center'>".$udm->descripcion."</p></td>
                    </tr>
                    ";
                }
            ?>
        </table>
        </div>
 
</div>