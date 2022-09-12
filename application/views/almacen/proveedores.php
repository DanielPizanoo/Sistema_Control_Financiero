<div class="container-fluid pt-5">
    <div class="row mt-3 px-3 justify-content-center">
        <h1>Proveedores</h1>
    </div>

    <div class="row mt-3">
        <div class="col-md-3">
            <h3>Registrar Proveedor</h3>
            <form action="<?php echo site_url('Almacen/insert_proveedor'); ?>" method="post">
                <div class="form-group">       
                    <p>Campos obligados (*)</p>
                    <laber for="">Razon Social*</label>
                    <input type="text" class="form-control rounded-0" name="razons" id="" autocomplete="off" require>
                    <laber for="">RFC*</label>
                    <input type="text" class="form-control rounded-0" name="rfc" id="" autocomplete="off" require> 
                    <laber for="">País*</label>
                    <input type="text" class="form-control rounded-0" name="pais" id="" autocomplete="off" require>
                    <laber for="">Estado*</label>
                    <input type="text" class="form-control rounded-0" name="estado" id="" autocomplete="off" require>
                    <laber for="">Ciudad*</label>
                    <input type="text" class="form-control rounded-0" name="ciudad" id="" autocomplete="off" require>
                    <laber for="">Domicilio*</label>
                    <input type="text" class="form-control rounded-0" name="domicilio" id="" autocomplete="off" require>
                    <laber for="">Código Postal*</label>
                    <input type="text" class="form-control rounded-0" name="cp" id="" autocomplete="off" require>
                    <laber for="">Télefono*</label>
                    <input type="text" class="form-control rounded-0" name="telefono" id="" autocomplete="off" require>
                    <laber for="">Celular</label>
                    <input type="text" class="form-control rounded-0" name="celular" id="" autocomplete="off">
                    <laber for="">Email*</label>
                    <input type="text" class="form-control rounded-0" name="email" id="" autocomplete="off" require>
                </div>
                <button type="submit" class="btn btn-primary rounded-0">Registrar</button>
            </form>
        </div>

        <div class="col-md-8">
            <h3>Registros</h3>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Clave</th>
                            <th>Razón Social</th>
                            <th>RFC</th>
                            <th>País</th>
                            <th>Estado</th>
                            <th>Ciudad</th>
                            <th>Domicilio</th>
                            <th>Código Postal</th>
                            <th>Teléfono</th>
                            <th>Celular</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        foreach($proveedores as $pv)
                        {
                    ?>
                        <tr>
                            <th><?php echo $pv->id_proveedor; ?></th>
                            <td><?php echo $pv->razon_social; ?></td>
                            <td><?php echo $pv->rfc; ?></td>
                            <td><?php echo $pv->pais; ?></td>
                            <td><?php echo $pv->estado; ?></td>
                            <td><?php echo $pv->ciudad; ?></td>
                            <td><?php echo $pv->domicilio; ?></td>
                            <td><?php echo $pv->cp; ?></td>
                            <td><?php echo $pv->telefono; ?></td>
                            <td><?php echo $pv->celular; ?></td>
                            <td><?php echo $pv->correo; ?></td>
                            <td><a href="<?php echo site_url('Almacen/eventospr?id_proveedor=').$pv->id_proveedor; ?>">
                                <button type="button" class="btn btn-info">Editar</button>
                            </a></td>
                            <td><a href="<?php echo site_url('Almacen/eliminarpr?id_proveedor=').$pv->id_proveedor; ?>">
                                <button type="button" class="btn btn-warning">Eliminar</button>
                            </a></td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>