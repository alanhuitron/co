<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Clima organizacional | Log in</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.4 -->
     
    <link href="<?php echo base_url();?>librerias/plantilla/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="<?php echo base_url();?>librerias/plantilla/plugins/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?php echo base_url();?>librerias/plantilla/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck -->
    <!-- <link href="<?php echo base_url();?>librerias/plantilla/plugins/iCheck/square/blue.css" rel="stylesheet" type="text/css" />  -->

     
  <body class="login-page">
    <div class="login-box">
      <div class="login-logo">
      <img src="<?php echo base_url();?>librerias/img/SUNAT.svg" style="width:65%;">
        <b>SISTEMA CLIMA ORGANIZACIONAL</b>
      </div><!-- /.login-logo -->
      <div class="login-box-body">
        <p class="login-box-msg">Iniciar Sesión</p>
        <form action="<?php echo base_url();?>index.php/login" method="POST">
          <div class="form-group has-feedback">
            <input type="text" class="form-control" name="user" placeholder="Usuario"  />
            <span class="glyphicon glyphicon-user form-control-feedback"></span>
             
          </div>
          <div class="form-group has-feedback">
            <input type="password" class="form-control" name="password" placeholder="Password"/>
            <span class="glyphicon glyphicon-lock form-control-feedback"></span>
          </div>
          <div class="row">
            <div class="col-xs-8">    
              <!-- <div class="checkbox icheck">
                <label>
                  <input type="checkbox"> Remember Me
                </label>
              </div> -->                        
            </div><!-- /.col -->
            <div class="col-xs-4">
              <button type="submit" class="btn btn-primary btn-block btn-flat">Log In</button>
            </div><!-- /.col -->

            <div class="col-xs-12">
               <b style="color:red;">

               <?php 

                  if($this->session->userdata('message')){
                     echo $this->session->userdata('message');
                  }
               ?>
               </b>
            </div>
          </div>
        </form>

        <!-- <div class="social-auth-links text-center">
          <p>- OR -</p>
          <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> LogIn usando Facebook</a>
          <a href="#" class="btn btn-block btn-social btn-google-plus btn-flat"><i class="fa fa-google-plus"></i> LogIn usando Google+</a>
        </div> -->

        <!-- /.social-auth-links --> 

      <!--   <a href="#">Olvidé mi contraseña</a><br>
        <a href="register.html" class="text-center">Registrame</a> -->

      </div><!-- /.login-box-body -->
    </div><!-- /.login-box -->

    <!-- jQuery 2.1.4 -->
    <script src="<?php echo base_url();?>librerias/plantilla/plugins/jQuery/jquery.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
   <script src="<?php echo base_url();?>librerias/plantilla/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>

    <!-- iCheck -->
    <script src="<?php echo base_url();?>librerias/plantilla/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
     <!-- <script>  
    //   $(function () {
    //     $('input').iCheck({
    //       checkboxClass: 'icheckbox_square-blue',
    //       radioClass: 'iradio_square-blue',
    //       increaseArea: '20%' // optional
    //     });
    //   });
      </script>
    -->
 
  </body>
  
  
  
</html>