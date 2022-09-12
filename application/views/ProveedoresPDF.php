<div id="container-2"> 
    <div id="body">
        <table id='customers'>
            <tr>
                <th><h3>Clave</h3></th>
                <th><h3>Razón Social</h3></th>
                <th><h3>RFC</h3></th>
                <th><h3>Domicilio</h3></th>
                <th><h3>Teléfono</h3></th>
                <th><h3>Celular</h3></th>
                <th><h3>Ciudad</h3></th>
                <th><h3>Estado</h3></th>
                <th><h3>Código Postal</h3></th>
                <th><h3>Correo</h3></th>
                <th><h3>País</h3></th>
            </tr>
            <?php
                foreach ($proveedores as $pro){
                    echo "
                    <tr>
                        <td><p align='center'>".$pro->id_proveedor."</p></td>
                        <td><p align='center'>".$pro->razon_social."</p></td>
                        <td><p align='center'>".$pro->rfc."</p></td>
                        <td><p align='center'>".$pro->domicilio."</p></td>
                        <td><p align='center'>".$pro->telefono."</p></td>
                        <td><p align='center'>".$pro->celular."</p></td>
                        <td><p align='center'>".$pro->ciudad."</p></td>
                        <td><p align='center'>".$pro->estado."</p></td>
                        <td><p align='center'>".$pro->cp."</p></td>
                        <td><p align='center'>".$pro->correo."</p></td>
                        <td><p align='center'>".$pro->pais."</p></td>
                    </tr>
                    ";
                }
            ?>
        </table>
    </div> 
</div>
