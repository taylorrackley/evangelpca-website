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
                    <h1 class="page-header">VBS Sign Up</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">

                    <div id="alerts">
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="dataTable_wrapper">
                                <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Father</th>
                                            <th>Mother</th>
                                            <th>Father Phone</th>
                                            <th>Mother Phone</th>
                                            <th>Address</th>
                                            <th>City</th>
                                            <th>ZIP</th>
                                            <th>Child</th>
                                            <th>Grade Completed</th>
                                            <th>Comments</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php include('php/list_vbs_sign_up.php'); ?>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
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

    $(".delete_vbs").click(function(){
        var id = $(this).val();
        if(confirm('Are you sure you want to delete this VBS sign up?')){
            $.post('php/delete_vbs.php', {"id" : id});
            window.location.href = "vbs_sign_up.php";
        }
    });

    </script>


</body>

</html>
