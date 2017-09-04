<?php

//require_once('recaptchalib.php');
//$secret = '6LdYxBUUAAAAAKQD--ksiQ3D4auO-Gul2eYycShK';

//$resp = recaptcha_check_answer($secret, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);

//if (!$resp->is_valid) {
//    echo 'false';
//} else {

    include('../includes/connect.php');

    $full_name = $_POST['full_name'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $zip = $_POST['zip'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $money = $_POST['money'];

    $stmt = $db->prepare("INSERT INTO wic_sign_up (`full_name`, `address`, `city`, `zip`, `email`, `phone`, `money`) VALUES ('$full_name', '$address', '$city', '$zip', '$email', '$phone', '$money')");

    if($stmt->execute()){
        header('location: ../../wic_retreat.php?notice=success');
    } else {
        header('location: ../../wic_retreat.php?notice=error');
    }
//}

?>
