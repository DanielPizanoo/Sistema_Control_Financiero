<style>
    .container-fluid{
        position: absolute!important;
    }

    .img-fluid{
        width: 250px!important;
    }

    body{
        background-color: #f7f7f7;
    }

    .sepcial-card {
        background-color: rgba(255, 255, 255, .7);
        border: 1px solid #FFF;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }
</style>
<body class="text-center" background="<?php echo base_url('assets/img/bg2.jpg'); ?>">
    <div class="container-fluid h-100 px-4">
        <div class="row h-100 justify-content-center align-items-center">
            <form method="POST" action="<?php echo site_url('Login/validate'); ?>" enctype="multipart/form-data">
                <div class="card sepcial-card rounded-0">
                    <div class="card-body rounded-0">
                        <h5 class="text-center text-muted">Sistema de Monitoreo y Trazabilidad Interna para Cultivos Acuicolas</h5>
                        <h3 class="text-center mb-3">Granja Acuicola Hueso S.P.R.</h3>
                        <div class="form-group">
                            <!--<label for="username">Nombre de usuario</label>-->
                            <input type="text" class="form-control rounded-0" id="usuario" name="usuario" placeholder="Nombre de usuario">
                        </div>
                        <div class="form-group">
                            <!--<label for="pass">Contraseña</label>-->
                            <input type="password" class="form-control rounded-0" id="pass" name="pass" placeholder="Contraseña">
                        </div>
                        <button type="submit" class="btn btn-primary rounded-0"><i class="fas fa-sign-in-alt"></i> Iniciar sesión</button>
                        <small class="form-text text-muted mt-4">Si no conoces los datos de inicio de sesión, contacta al administrador.</small>
                    </div>
                </div>
            </form>
        </div>
    </div>