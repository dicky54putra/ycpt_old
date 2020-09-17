<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url(); ?>asset/img/logo1.png">
    <title>Yayasan Catur Praya Tunggal</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo base_url(); ?>asset/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo base_url(); ?>asset/css/stylish-portfolio.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/color/default.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>asset/css/style.css">
    <!-- Custom Fonts -->
    <link href="<?php echo base_url(); ?>asset/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,700,300italic,400italic,700italic" rel="stylesheet" type="text/css">
</head>

<body>

    <!-- Header -->
    <header id="top" class="header">
        <div class="text-vertical-center">
            <div class="modal-dialog">
                <div class="col-md-8 col-md-offset-2">
                    <div class="modal-content">
                        <div class="modal-header">
                            <!-- <h4 class="modal-title" id="myModalLabel" align="center">Please Sign In</h4> -->
                            <img class="reponsive" width="100%" height="100%" src="<?php echo base_url(); ?>asset/img/logo.gif">
                        </div>
                        <div class="modal-body">
                            <?= $this->session->flashdata('error_msg'); ?>
                            <form action="<?php echo base_url('Auth'); ?>" onsubmit="return cekform();" name="modal_popup" enctype="multipart/form-data" method="POST">
                                <div class="form-group" style="padding-bottom: 20px;" align="center">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                                        <input type="text" name="username" id="username" class="form-control" placeholder="Username" value="<?= set_value('username') ?>" />
                                    </div>
                                    <?= form_error('username', '<span class="text-danger">', '</span>') ?>
                                    <br>
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                                        <input type="Password" name="password" id="password" class="form-control" placeholder="Password" />
                                    </div>
                                    <?= form_error('password', '<span class="ml-3 text-danger">', '</span>') ?>
                                    <br>
                                    <div class="input-group">
                                        <select class="form-control select2" name="level">
                                            <option value="1">User</option>
                                            <option value="0">Administrator</option>
                                        </select>
                                        <span class="input-group-addon"><b>Level</b></span>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-success" type="submit">
                                        <i class="glyphicon glyphicon-log-in"></i> Login
                                    </button>
                                    <!-- <button type="reset" class="btn btn-danger"  data-dismiss="modal" aria-hidden="true">
                                    Cancel
                                    </button> -->
                                </div>
                                <div>
                                    <p>
                                        Ketentuan Login :<br>
                                        <hr>
                                        Pastikan Username dan Password benar<br>
                                        Pastikan Anda sudah terdaftar sebagai pengguna.
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- jQuery -->
    <script src="<?php echo base_url(); ?>asset/js/jquery.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
    <!-- Custom Theme JavaScript -->

</body>

</html>