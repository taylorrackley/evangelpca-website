<?php

    session_start();

    if(!$_SESSION['logged_in']){
        header('Location: php/login.php');
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Evangel Presbyterian Church</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- DataTables CSS -->
    <link href="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css" rel="stylesheet">

    <!-- DataTables Responsive CSS -->
    <link href="../bower_components/datatables-responsive/css/dataTables.responsive.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/sb-admin-2.css" rel="stylesheet">
    <link href="../css/datepicker.min.css" rel="stylesheet" media="screen">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

</head>

<body style="min-height:1200px;">

    <div id="wrapper">

        <?php

            include('layouts/_header.html');

            $alerts = array();
            if(isset($_GET['notice'])){
                array_push($alerts, $_GET['notice']);
            }

        ?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Weekly Bulletins</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div id="alerts">
                    </div>

                    <div class="col-lg-6">
                        <div class="panel panel-default">
                            <div class="panel-body">
                                <div class="dataTable_wrapper">
                                    <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                        <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Edit</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php include('php/list_bulletins.php'); ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <!-- /.panel-body -->
                        </div>
                        <!-- /.panel -->
                    </div>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Create a Bulletin</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">

                                <form name="bulletin" role="form" method="post" action="php/upload_bulletin.php" enctype="multipart/form-data">
                                    <div class="col-lg-4">
                                        <div class="form-group">
                                            <label>Date</label>
                                            <input class="form-control form_date" size="16" type="text" value="" name="bulletin_date" readonly required>
                                            <br>
                                            <label>Upload Bulletin PDF</label>
                                            <input id="file" type="file" name="bulletin_pdf" required>
                                            <br>
                                            <label>Upload Bulletin Inserts PDF</label>
                                            <input id="file" type="file" name="bulletin_inserts_pdf">
                                        </div>
                                        <button type="submit" class="btn btn-default" name="submit">Create Bulletin</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>
    <script src="../bower_components/datatables-responsive/js/dataTables.responsive.js"></script>
    <script src="../js/datepicker.min.js" charset="UTF-8"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>

    var alerts = <?php echo json_encode($alerts) ?>;
    var notices = '';
    alerts.forEach(function(notice) {
        notices += '<div class="alert alert-info"><strong>' + notice + '</strong></div>';
        $("#alerts").html(notices);
    });

    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });

    $('.form_date').datetimepicker({
        language:  'fr',
        format: 'yyyy-m-d',
        weekStart: 1,
        todayBtn:  1,
        autoclose: 1,
        todayHighlight: 1,
        startView: 2,
        minView: 2,
        forceParse: 0
    });

    </script>


</body>

</html>
