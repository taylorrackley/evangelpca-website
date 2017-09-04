<!DOCTYPE html>
<html lang="en">

<head>

    <!-- Start Alexa Certify Javascript -->
<script type="text/javascript">
_atrk_opts = { atrk_acct:"s/NFo1IWx8107i", domain:"evangelpca.org",dynamic: true};
(function() { var as = document.createElement('script'); as.type = 'text/javascript'; as.async = true; as.src = "https://d31qbv1cthcecs.cloudfront.net/atrk.js"; var s = document.getElementsByTagName('script')[0];s.parentNode.insertBefore(as, s); })();
</script>
<noscript><img src="https://d5nxst8fruw4z.cloudfront.net/atrk.gif?account=s/NFo1IWx8107i" style="display:none" height="1" width="1" alt="" /></noscript>
<!-- End Alexa Certify Javascript -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Evangel Presbyterian is a Presbyterian Church in America. We are located on the west side of Wichita Kansas.">
    <meta name="author" content="Taylor Rackley">

    <title>Evangel Presbyterian</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Theme CSS -->
    <link href="css/clean-blog.css" rel="stylesheet">
    <link href="css/events.css" rel="stylesheet">
    <link href="css/bootstrap-select.min.css" rel="stylesheet" type="text/css">

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>

</head>

<body>

    <?php

        include('layouts/_header.html');

    ?>


    <header class="intro-header" style="background-image: url('img/events-bg.jpg')">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <div class="page-heading">
                        <h1>Vacation Bible School</h1>
                        <hr class="small">
                        <span class="subheading">Monday, June 5th - Friday, June 9th<br>Evangel PCA</span>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <!-- Post Content -->
    <article>
        <div class="container">
            <div class="row">

                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

                    <?php
                        if(isset($_GET['notice']) && $_GET['notice'] == 'success'){
                            echo '<div class="alert alert-success" style="text-align:center;">
                                    <strong>You have been registered for this event.</strong>
                                  </div>';
                        } else if (isset($_GET['notice']) && $_GET['notice'] == 'error'){
                            echo '<div class="alert alert-danger" style="text-align:center;">
                                    <strong>An error occurred when submitting form please try again.</strong>
                                  </div>';
                        }
                    ?>

                    <h3 style="text-align:center;">VBS will take place at Evangel Presbyterian Church from 9AM to 12PM begining June 5th and ending June 9th.</h3>
                    <p style="text-align:center;"><a href="https://www.google.com/maps/place/1545+S+135th+St+W,+Wichita,+KS+67235/@37.664289,-97.502168,16z/data=!4m5!3m4!1s0x87bade9832bee925:0xc22e6b003ce4dbfb!8m2!3d37.665138!4d-97.50043?hl=en-US" target="_blank">Click here for directions.</a></p>

                    <br><h2 style="text-align:center;">Sign Up</h2><hr>

                    <form action="admin/php/vbs_register.php" method="post">
                        <h3 style="text-align:center;">Parents' Contact Information</h3>
                        <div class="col-lg-6">
                          <input type="text" class="form-control" placeholder="Father's Full Name" name="father_full_name" required><br>
                          <input type="text" class="form-control" placeholder="Mother's Full Name" name="mother_full_name" required><br>
                          <input type="text" class="form-control" placeholder="Home Address" name="address" required><br>
                          <input type="text" class="form-control" placeholder="City" name="city" required><br>
                        </div>
                        <div class="col-lg-6">
                          <input type="text" id="phone" class="form-control" placeholder="Father's Phone Number" name="father_phone" required><br>
                          <input type="text" id="phone2" class="form-control" placeholder="Mother's Phone Number" name="mother_phone" required><br>
                          <input type="text" id="zip" class="form-control" placeholder="Zip" name="zip" required><br><br>
                        </div>

                        <hr style="width: 100%;">

                        <div id="children">
                            <div class="col-lg-6">
                              <input type="text" class="form-control" placeholder="Child's Name" name="child_name_0" required><br>
                              <select name="child_grade_0" required>
                                  <option value="" disabled selected>Grade Completed</option>
                                  <option value="Pre-K">Pre-K</option>
                                  <option value="1st Grade">1st Grade</option>
                                  <option value="2nd Grade">2nd Grade</option>
                                  <option value="3rd Grade">3rd Grade</option>
                                  <option value="4th Grade">4th Grade</option>
                                  <option value="5th Grade">5th Grade</option>
                              </select>
                            </div>
                            <div class="col-lg-6">
                              <label style="font-size:15px;">Child's allergies, medical conditions, or other comments</label>
                              <textarea rows="3" name="child_allergies_0"></textarea>
                            </div>

                            <hr style="width: 100%;">

                        </div>

                         <div style="float:right;margin-top:25px;">
                             <button id="add_child" type="button" class="btn btn-default">Add Another Child</button>
                             <input type="submit" style="margin-right:15px;" class="btn btn-default"/>
                         </div>
                    </form>

                </div>

            </div>
        </div>
    </article>

    <hr>

    <?php include('layouts/_footer.html') ;?>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/masking.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

    <script>

    var child_limit = 8;
    var child = 0;

    $( "#add_child" ).click(function() {

        if(child < child_limit) {
            child++;
            $('#children').append(`
                <div id="child_`+child+`">
                    <div class="col-lg-6">
                      <input type="text" class="form-control" placeholder="Child's Name" name="child_name_`+child+`" required><br>
                      <select name="child_grade_`+child+`" required>
                          <option value="" disabled selected>Grade Completed</option>
                          <option value="Pre-K">Pre-K</option>
                          <option value="1st Grade">1st Grade</option>
                          <option value="2nd Grade">2nd Grade</option>
                          <option value="3rd Grade">3rd Grade</option>
                          <option value="4th Grade">4th Grade</option>
                          <option value="5th Grade">5th Grade</option>

                      </select>
                    </div>
                    <div class="col-lg-6">
                      <label style="font-size:15px;">Child's allergies, medical conditions, or other comments</label>
                      <textarea rows="3" name="child_allergies_`+child+`"></textarea>
                    </div>
                    <button id="remove_`+child+`" style="float:right;margin:15px;" type="button" class="btn btn-danger">Remove Child</button>
                    <hr style="width: 100%;">
                </div>`);

        }

    });

    $('body').on('click', '#remove_1', function () {
        $('#child_1').remove();
        child--;
    });

    $('body').on('click', '#remove_2', function () {
        $('#child_2').remove();
        child--;
    });

    $('body').on('click', '#remove_3', function () {
        $('#child_3').remove();
        child--;
    });

    $('body').on('click', '#remove_4', function () {
        $('#child_4').remove();
        child--;
    });

    $('body').on('click', '#remove_5', function () {
        $('#child_5').remove();
        child--;
    });

    $('body').on('click', '#remove_6', function () {
        $('#child_6').remove();
        child--;
    });

    $('body').on('click', '#remove_7', function () {
        $('#child_7').remove();
        child--;
    });

    $('#phone').mask('(999) 999-9999');
    $('#phone2').mask('(999) 999-9999');
    $('#zip').mask('99999');

    </script>

</body>

</html>
