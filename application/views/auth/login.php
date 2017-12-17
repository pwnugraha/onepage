<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="icon" href="">
        <title>Onepage | Login</title>

        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
        <link href="<?php echo base_url() ?>assets/onepage/css/bootstrap.min.css" rel="stylesheet"> 
        <link href="<?php echo base_url() ?>assets/onepage/css/font-awesome.min.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/azmind/css/form-elements.css" rel="stylesheet">
        <link href="<?php echo base_url() ?>assets/azmind/css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top content -->
        <div class="top-content">
            <div class="inner-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-8 col-sm-offset-2 text">
                            <h1><strong>Onepage</strong> Login Form</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 form-box">
                            <div class="form-top">
                                <div class="form-top-left">
                                    <h3>Login</h3>
                                    <span>Masukkan username dan password:</span>
                                    
                                </div>
                                <div class="form-top-right">
                                    <i class="fa fa-lock"></i>
                                </div>
                            </div>
                            <div class="form-bottom" style="padding-top: 1px">
                                <div id="infoMessage"><?php echo $message; ?></div>
                                <?php echo form_open("auth/login", 'class="login-form"'); ?>
                                <br>
                                <div class="form-group">
                                    <label class="sr-only" for="form-username">Username</label>
                                    <?php echo form_input($identity, '', 'class="form-username form-control" placeholder="Email..."'); ?>
                                </div>

                                <div class="form-group">
                                        <label class="sr-only" for="form-password">Password</label>
                                    <?php echo form_input($password, '', 'class="form-username form-control" placeholder="Password..."'); ?>
                                </div>

                                <p>
                                    <?php echo lang('login_remember_label', 'remember'); ?>
                                    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"'); ?>
                                </p>


                                <button type="submit" class="btn">Sign in!</button>

                                <?php echo form_close(); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-sm-offset-3 social-login">
                            <a href="forgot_password"><h4><?php echo lang('login_forgot_password'); ?></h4></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script type="text/javascript" src="<?php echo base_url() ?>assets/onepage/js/jquery-3.2.1.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url() ?>assets/onepage/js/bootstrap.min.js"></script>
    </body>

</html>