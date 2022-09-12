<div id="container"> 
    <div id="body">
        <table id='customers'>
            <tr>
                <th><h3>Clave</h3></th>
                <th><h3>Nombre</h3></th>
                <th><h3>Tipo Producto</h3></th>
                <th><h3>Proveedor</h3></th>
                <th><h3>Unidad Medida</h3></th>
                <th><h3>Precio</h3></th>
            </tr>
            <?php
                foreach ($productos as $produc){
                    echo "
                    <tr>
                        <td><p align='center'>".$produc->id_producto."</p></td>
                        <td><p align='center'>".$produc->nombre."</p></td>
                        <td><p align='center'>".$produc->id_tipo_producto."</p></td>
                        <td><p align='center'>".$produc->id_proveedor."</p></td>
                        <td><p align='center'>".$produc->id_unidad_medida."</p></td>
                        <td><p align='center'>".$produc->precio."</p></td>
                    </tr>
                    ";
                }
            ?>
        </table>
    </div>
 
</div>