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

<body>

    <div id="wrapper">

        <?php 

            $alerts = array();
            if(isset($_GET['notice'])){
                array_push($alerts, $_GET['notice']);
            }

            include('layouts/_header.html'); 
            include('php/edit_event.php');

        ?>

        <div id="page-wrapper">
            
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Edit Event</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

            <div class="row">
                <div class="col-lg-12">

                    <div id="alerts">
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6">

                                    <form name="event_edit" role="form" method="post" onsubmit="return validateForm()" action="php/upload_event.php">
                                        <div class="form-group">
                                            <label>Title</label>
                                            <input class="form-control" name="title" value="<?php echo $title; ?>" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Details</label>
                                            <textarea class="form-control" name="details" rows="6" required><?php echo $details; ?></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>Cordinator</label>
                                            <input class="form-control" name="cordinator" value="<?php echo $cordinator; ?>" required>
                                        </div>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                                <div class="col-lg-6">
                                        <div class="form-group">
                                            <label>Start Date</label>
                                            <input class="form-control form_date" name="start_date" value="<?php echo $start_date; ?>" required>
                                            <br>

                                            <div class="form-inline">
                                                <label>Start Time</label>
                                                <input class="form-control form_time" size="16" type="text" value="<?php echo $start_time; ?>" name="start_time" readonly required>
                                                <label>End Time</label>
                                                <input class="form-control form_time" size="16" type="text" value="<?php echo $end_time; ?>" name="end_time" readonly required>
                                            </div>
                                        </div>
                                        
                                        <input type="hidden" name="id" value="<?php echo $id; ?>">                                                                                   
                                        <button type="submit" class="btn btn-default" name="submit">Submit Event Changes</button>
                                        <button type="button" class="btn btn-danger" id="delete_event">Delete Event</button>
                                    </form>
                                </div>
                                <!-- /.col-lg-6 (nested) -->
                            </div>
                            <!-- /.row (nested) -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

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
    <script type="text/javascript" src="../js/datepicker.min.js" charset="UTF-8"></script>
    
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

    if('<?php echo $notice ?>' != ""){
        document.getElementById("alerts").className = 'alert alert-info';
        document.getElementById("alerts").innerHTML = '<?php echo $notice; ?>';
    }

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
    $('.form_time').datetimepicker({
        format: "hh:ii",
        showMeridian: true,
        startView: 1,
        pickDate: false,
        autoclose: true 
    }).on("show", function(){
    $(".table-condensed .prev").css('visibility', 'hidden');
    $(".table-condensed .switch").text("Pick Time");
    $(".table-condensed .next").css('visibility', 'hidden');});

    function validateForm(){

        var form = document.forms['event_edit'];
        var start_date = new Date(form['start_date'].value);
        var end_date = new Date(form['end_date'].value);
        var start_time = form['start_time'].value.replace(':','');
        var end_time = form['end_time'].value.replace(':','');

        if(start_date > end_date){
            alert("The events ending date is before the events start date.");
            return false;
        }

        if(start_time > end_time){
            alert("The events ending time is before the events start time.");
            return false;
        }

    }

    var id = <?php echo json_encode($_GET['id']); ?>;

    $("#delete_event").click(function(){
        if(confirm('Are you sure you want to delete this event?')){
            $.post('php/delete_event.php', {"id" : id});
            window.location.href = "events.php";
        }
    });

    </script>


</body>

</html>
