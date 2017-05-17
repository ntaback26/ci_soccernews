<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bóng Đá - Admin Control Panel</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $public_path; ?>css/bootstrap.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo $public_path; ?>css/admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo $public_path; ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php $this->load->view('admin/navigation'); ?>
        <!-- /Navigation -->

        <!-- #page-wrapper -->
        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- #pageLoader -->
                <div id="pageLoader">
                    <?php $this->load->view($pageLoader); ?>
                </div>
                <!-- /#pageLoader -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
    

    <!-- jQuery -->
    <script src="<?php echo $public_path; ?>js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo $public_path; ?>js/bootstrap.js"></script>

    <!-- My JavaScript -->
    <script src="<?php echo $public_path; ?>js/myscript.js"></script>

    <!-- My jQuery -->
    <script src="<?php echo $public_path; ?>js/myjquery.js"></script>
    
</body>

</html>
