<style> 
h1 { 
    text-align: center; 
} 

.sepcial-card {
  background-color: rgba(255, 255, 255, .7);
  border: 1px solid #FFF;
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}

</style> 
  </head> 
 
  <body background="<?php echo base_url('assets/img/bg2.jpg'); ?>"> 
    <!--Div that will hold the pie chart--> 
    <div class="container-fluid px-4">
      <div class="row justify-content-center mt-5">
        <div class="card w-50 mt-5 sepcial-card rounded-0">
          <div class="card-body rounded-0">
              <h2 class="text-center">Sistema de Información para la Trazabilidad Interna del Cultivo de Camarón</h2>
              <form enctype="multipart/form-data" role="form" method="POST" action="<?php echo site_url('Uploadfile/upload'); ?>">
                  <div class="row justify-content-center">
                      <!--<div class="col-md-8 mt-5 mb-2">
                          <label class="font-weight-bold">Subir Archivo</label>
                          <div class="input-group">
                              <input type="file" class="form-control-file" name="userfile" required>
                          </div>
                      </div>-->
                      <div class="col-md-4 mt-3 mb-2">
                          <div class="text-center">
                              <button type="submit" class="btn btn-primary w-100 mt-4 rounded-0">Entrar al sistema</button>
                          </div>
                      </div>
                  </div>
              </form>
          </div>
        </div>
      </div>
    </div> 
