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

    <!-- Custom Fonts -->
    <link href="css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    <script src='https://www.google.com/recaptcha/api.js'></script>

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
                        <h1>Women's Spring Retreat</h1>
                        <hr class="small">
                        <span class="subheading">Friday, April 28-Saturday, April 29<br>Hampton Inn and Suites Airport</span>
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
                        if(isset($_GET['notice']) & $_GET['notice'] == 'success'){
                            echo '<div class="alert alert-success" style="text-align:center;">
                                    <strong>You have been registered for this event.</strong>
                                  </div>';
                        } else if (isset($_GET['notice']) & $_GET['notice'] == 'error'){
                            echo '<div class="alert alert-danger" style="text-align:center;">
                                    <strong>An error occurred when submitting form please try again.</strong>
                                  </div>';
                        }
                    ?>

                    <p>Our Women’s Spring Retreat will be a sweet time of spiritual encouragement, fun fellowship, and delicious food. We hope you will come and bring a friend!</p>
                    <h3 style="text-align:center;">Why gather for a women’s retreat?</h3>
                    <p>It’s a time to step back from the hustle and bustle and fix our eyes on Jesus, joining together with the women in our church community to focus on knowing God and His Word more deeply and applying it to all aspects of our lives.</p>
                    <p>As Gracia speaks on Transforming Faith, our prayer is that you, too, will experience transformation and renewal  by the grace of God in your life. </p>

                    <hr><h2 style="text-align:center;">Details</h2>
                    <p style="text-align:center;">Overnight at the Hampton Inn, Dinner, and Lunch: $35<br>Sessions and Meals Only: $20<br>Pay with a check to Evangel Presbyterian Church, “WIC Retreat” in the memo line, and mail or drop off your check at the church.<br>Register by Monday, April 17!</p>

                    <hr><h2 style="text-align:center;">Schedule</h2>
                    <div class="clearfix">
                        <div class="col-lg-6">
                            <h3 style="text-align:center;">Friday</h3>
                            <table class="table">
                              <tbody>
                                <tr>
                                  <td>5:30pm</td>
                                  <td>Check-in</td>
                                </tr>
                                <tr>
                                  <td>6:00pm</td>
                                  <td>Dinner (Catered Meal)</td>
                                </tr>
                                <tr>
                                  <td>7:00pm</td>
                                  <td>Evening Session<br><i style="font-size:16px;">Featuring Gracia Burnham</i></td>
                                </tr>
                                <tr>
                                    <td>9:00pm</td>
                                    <td>Evening Social</td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <h3 style="text-align:center;">Saturday</h3>
                            <table class="table">
                              <tbody>
                                <tr>
                                  <td>9:00am</td>
                                  <td>Morning Session<br><i style="font-size:16px;">Featuring Gracia Burnham</i></td>
                                </tr>
                                <tr>
                                  <td>11:30am</td>
                                  <td>Lunch (Catered Meal)</td>
                                </tr>
                                <tr>
                                  <td>12:30pm</td>
                                  <td>Afternoon Session<br><i style="font-size:16px;">Panel Discussion & Response</i></td>
                                </tr>
                                <tr>
                                    <td>2:30pm</td>
                                    <td>Dismiss</td>
                                </tr>
                              </tbody>
                            </table>
                        </div>
                    </div>

                    <hr><h2 style="text-align:center;">Our Speaker: Gracia Burnham</h2>
                    <p>Gracia Burnham is the widow of Martin Burnham and the mother of Jeff, Mindy, and Zach.
For 17 years, Gracia and Martin served with New Tribes Mission in the Philippines where Martin was a jungle pilot delivering mail, supplies, and encouragement to other missionaries, and transporting sick and injured patients to medical facilities. </p>
                    <p style="text-align:center;"><button type="button" class="btn btn-default btn-xs" data-toggle="modal" data-target="#myModal">Read More</button></p>

                    <hr><h2 style="text-align:center;">Sign Up</h2><br>

                    <form action="admin/php/wic_sign_up.php" method="post">
                        <div class="col-lg-6">
                          <input type="text" class="form-control" placeholder="Full Name" name="full_name" required><br>
                          <input type="text" class="form-control" placeholder="Address" name="address" required><br>
                          <input type="text" class="form-control" placeholder="City" name="city" required><br>

                          <label><input type="radio" name="money" value="overnight-35" required> Overnight + Meals - $35</label><br>
                          <label><input type="radio" name="money" value="meal-only-25" required> Meals Only - $20</label>
                          <label style="font-size:12px;">* Due to the limited number of rooms reserved, the first 18 registrations for rooms will receive this rate.</label>
                        </div>
                        <div class="col-lg-6">
                          <input type="text" id="zip" class="form-control" placeholder="Zip" name="zip" required><br>
                          <input type="text" class="form-control" placeholder="Email" name="email" required><br>
                          <input type="text" id="phone" class="form-control" placeholder="Phone" name="phone" required><br>

                          <div style="float:right;margin-top:25px;">
                              <input type="submit" style="margin-right:15px;" class="btn btn-default"/>
                              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                          </div>
                    </form>

                </div>

            </div>
        </div>
    </article>

    <hr>

    <?php include('layouts/_footer.html') ;?>

    <div id="myModal" class="modal fade" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Our Speaker: Gracia Burnham</h4>
          </div>
          <div class="modal-body">
            <p>Gracia Burnham is the widow of Martin Burnham and the mother of Jeff, Mindy, and Zach.</p>
            <p>For 17 years, Gracia and Martin served with New Tribes Mission in the Philippines where Martin was a jungle pilot delivering mail, supplies, and encouragement to other missionaries, and transporting sick and injured patients to medical facilities. Gracia served in various roles supporting the aviation program and also home-schooling their children – all of whom were born in the Philippines.</p>
            <p>On May 27, 2001, while celebrating their 18th wedding anniversary at Dos Palmas Resort off Palawan Island, the Burnhams were taken captive by a militant group of Muslims called the Abu Sayyaf Group. In addition to the Burnhams, the group seized several more guests and took them to Basilan Island, an ASG stronghold.</p>
            <p>In the ensuing months, some of the hostages were killed, but most were set free. From November 2001, only the Burnhams and one other hostage remained in captivity.
For more than a year, and under the total control of their captors, they were constantly on the move living in primitive conditions in the jungle, evading capture from the Philippine military, enduring gun battles, and witnessing unspeakable atrocities committed by the men of Abu Sayyaf Group.</p>
            <p>On the afternoon of June 7, 2002, over a year since their abduction, the Philippine military attempted another rescue. Tragically, Martin was killed during the gunfight. Wounded, but alive, Gracia was rescued and returned home under a national spotlight.</p>
            <p>Since that time, Gracia has authored two books, In The Presence Of My Enemies, and To Fly Again.
Gracia resides in Rose Hill, Kansas. Her unique story and the captivating way she tells it makes Gracia a popular speaker for churches, conferences, and schools. As Gracia travels throughout the country, she talks about the spiritual lessons she learned during her captivity and how God has blessed her and her family since Martin’s death. </p>
            <i>Bio from <a href="https://graciaburnham.org/">GraciaBurnham.org</a></i>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>

      </div>
    </div>

    <!-- jQuery -->
    <script src="js/jquery.min.js"></script>
    <script src="js/masking.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Theme JavaScript -->
    <script src="js/clean-blog.min.js"></script>

    <script>

    $('#phone').mask('(999) 999-9999');
    $('#zip').mask('99999');

    </script>

</body>

</html>
