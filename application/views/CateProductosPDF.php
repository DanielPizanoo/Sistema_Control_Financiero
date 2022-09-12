<div id="container">
    <div id="body">
        <table id='customers'>
            <tr>
                <th><h3>Clave</h3></th>
                <th><h3>Descripción</h3></th>
            </tr>
            <?php
                foreach ($tipo_producto as $tproducto){
                    echo "
                    <tr>
                        <td><p align='center'>".$tproducto->id_tipo_producto."</p></td>
                        <td><p align='center'>".$tproducto->nombre."</p></td>
                    </tr>";                
                }
            ?>
        </table>
    </div>
 
</div>