<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Tables - Ready Bootstrap Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
</head>
<?php $this->load->view('css') ?>
<style>
    .logo {
        background-color: #2899ce;
        color: white;
        padding-top: 10px;
        padding-bottom: 10px;
    }

    .l {
        border: 1px solid black;
    }

</style>

<body>
    <div id="wrapper" class="toggled">
        <?php $this->load->view('adder/header') ?>
        <?php $this->load->view('adder/sidebar') ?>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <h1>Dashboard</h1>
                </div>
            </div>
        </div>
    </div>
</body>
<?php $this->load->view('js') ?>
<script>
    $("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });

</script>

</html>
