<body>
<nav class="navbar navbar-expand-lg navbar-dark main-bg fixed-top">
    <!--<a class="navbar-brand" href="#"><img src="<?php //echo base_url('assets/img/logo-invert.png') ?>" alt="R | C Distribuidora" style="width: 50px;"></a>-->
    <a class="navbar-brand text-light font-weight-bold">SIMTICA</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo site_url('Dashboard'); ?>">Principal <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('Usuario/eventos') ?>">Registrar Evento</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('Usuario/consultar_eventos') ?>">Consultas</a>
            </li>
            <!--<li class="nav-item">
                <a class="nav-link" href="#">Más opciones</a>
            </li>-->
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Reportes</a>
                <div class="dropdown-menu rounded-0" aria-labelledby="navbarDropdown">         
                    <div class="dropdown-header">Catálogos</div>                 
                    <a href="<?php echo site_url('Almacen/mostrar_rcategoria'); ?>" class="dropdown-item">Categoría de Producto</a>
                    <a href="<?php echo site_url('Almacen/mostrar_rconcepto'); ?>" class="dropdown-item">Conceptos</a>
                    <a href="<?php echo site_url('Almacen/mostrar_rdestino'); ?>" class="dropdown-item">Destinos</a>
                    <a href="<?php echo site_url('Almacen/mostrar_rdatos'); ?>" class="dropdown-item">Productos</a>
                    <a href="<?php echo site_url('Almacen/mostrar_rproveedores'); ?>" class="dropdown-item">Proveedores</a>
                    <a href="<?php echo site_url("Almacen/mostrar_runidadesm"); ?>" class="dropdown-item">Unidades de Medida</a>

                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-header"><em>Reportes</em></a>
                    <a class="dropdown-item" href="<?php echo site_url('Almacen/REntrada'); ?>">Entrada</a>
                    <a class="dropdown-item" href="<?php echo site_url(""); ?>">Salidas</a>
                    <a class="dropdown-item" href="<?php echo site_url(""); ?>">Existencias</a>
                    </div>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Más opciones</a>
                <div class="dropdown-menu rounded-0" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="<?php echo site_url("Usuario/ciclos"); ?>">Ciclos de cultivo</a>
                    <a class="dropdown-item" href="<?php echo site_url("Usuario/estanques"); ?>">Registro de estanques</a>
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#">Registro de productos</a>
                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo site_url('Sensor'); ?>">Alertas</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Almacén</a>
                <div class="dropdown-menu rounded-0" aria-labelledby="navbarDropdown">         
                    <div class="dropdown-header">Catálogos</div>                 
                    <a href="<?php echo site_url("Almacen/mostrar_categoria"); ?>" class="dropdown-item">Categoría de Producto</a>
                    <a href="<?php echo site_url("Almacen/mostrar_concepto"); ?>" class="dropdown-item">Conceptos</a>
                    <a href="<?php echo site_url("Almacen/mostrar_destino"); ?>" class="dropdown-item">Destinos</a>
                    <a href="<?php echo site_url("Almacen/mostrar_datos"); ?>" class="dropdown-item">Productos</a>
                    <a href="<?php echo site_url("Almacen/mostrar_proveedores"); ?>" class="dropdown-item">Proveedores</a>
                    <a href="<?php echo site_url("Almacen/mostrar_unidadesm"); ?>" class="dropdown-item">Unidades de Medida</a>

                    
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="<?php echo site_url("Almacen/entradas"); ?>">Entradas</a>
                    <a class="dropdown-item" href="<?php echo site_url(""); ?>">Salidas</a>
                    <a class="dropdown-item" href="<?php echo site_url(""); ?>">Reportes</a> <!--Menu derecha-->
                    </div>
            </li>
        </ul>
        <span class="navbar-item dropdown font-weight-bold text-light">
            <i class="fas fa-user-circle"></i> <?php echo $this->session->username; ?> | 
            <span><a href="<?php echo site_url('Login/logout'); ?>" class="text-warning">Cerrar sesión</a></span>
        </span>
        
    </div>
</nav>