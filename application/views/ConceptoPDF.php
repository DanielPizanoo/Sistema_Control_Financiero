<div id="container">
    <div id="body">
        <table id='customers'>
            <tr>
                <th><h3>Clave</h3></th>
                <th><h3>Descripción</h3></th>
            </tr>
            <?php
                foreach ($conceptos as $concept){
                    echo "
                    <tr>
                        <td><p align='center'>".$concept->id_concepto."</p></td>
                        <td><p align='center'>".$concept->descripcion."</p></td>
                    </tr>";                
                }
            ?>
        </table>
    </div>
 
</div>