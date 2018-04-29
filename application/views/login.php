<html>

<head>
    <title>Login</title>
</head>

<link href="<?php echo base_url('assets/css/bootstrap.css') ?>" rel="stylesheet" />
<style>
    .table tr td {
        border-top: 0px;
        padding: 5px;
    }

</style>
<?php

    ?>

    <body>
        <div class="container-fluid" style="background-image:url('<?php echo base_url()."../assets/img/homeimage.jpg" ?>'); background-position:fixed; background-size:100% 100%; height:100%;">
            <div class="row" style="background:rgba(0,0,0,0.8); height:100%; padding:0px;">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="padding-top:150px">
                    <form method="post" action="<?php echo base_url('index.php/kasir/prosesLogin') ?>">
                        <table class="table" style="color:white">
                            <tr>
                                <td style="padding-bottom:5px; border-bottom:1px solid white">
                                    <h4>LOGIN</h4>
                                </td>
                            </tr>
                            <tr>
                                <td style="padding-top:2px;">Username :</td>
                            </tr>
                            <tr>
                                <td><input type="text" class="form-control form-control-sm" name="username" placeholder="Username..." /></td>
                            </tr>
                            <tr>
                                <td>Password :</td>
                            </tr>
                            <tr>
                                <td><input type="password" class="form-control form-control-sm" name="password" placeholder="Password..." /></td>
                            </tr>
                            <tr>
                                <td><input type="submit" class="btn btn-dark text-light btn-block" name="submitlogin" value="Login" /></td>
                            </tr>
                        </table>
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
    </body>

</html>
<script src="<?php echo base_url('assets/js/jquery-3.3.1.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.js') ?>"></script>
