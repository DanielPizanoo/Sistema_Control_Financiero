<div id="container">
    <div id="body">
        <table id='customers'>
            <tr>
                <th><h3>Clave</h3></th>
                <th><h3>Descripción</h3></th>
            </tr>
            <?php
                foreach ($destinos as $destin){
                    echo "
                    <tr>
                        <td><p align='center'>".$destin->id_destino."</p></td>
                        <td><p align='center'>".$destin->nombre."</p></td>
                    </tr>
                    ";                
                }
            ?>
        </table>
    </div>
 
</div>