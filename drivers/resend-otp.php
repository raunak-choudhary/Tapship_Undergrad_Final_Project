<?php
session_start();
require_once '../api/twilio/vendor/autoload.php';
use Twilio\Rest\Client;
require_once '../api/twilio/config.php';

$uid=$_POST['uid'];
$name=$_POST['name'];

if($_POST['type']=='tsv'){
    if(isset($_SESSION['otptimer'])){
        if($_SESSION['otptimer']>time()){
             echo "please wait ".($_SESSION['otptimer']-time())." sec";
         }
         else{
             $_SESSION['otptimer']=time()+120;
             $GeneratedOTP=rand(100000, 999999);
                     $SendSMSTO='+91'.$uid;
                     $client = new Client($account_sid, $auth_token);
                     $client->messages->create(
                         $SendSMSTO,
                         array(
                             'from' => $twilio_number,
                             'body' => '[Tapship: 2-step verification] Hello '.$name.", Please enter this OTP to Login ".$GeneratedOTP.". Do not share it with anyone"
                             )
                     );
                      $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");
                     $InsertOTP=$con->query("UPDATE driver SET d_tsv_otp='".$GeneratedOTP."' WHERE d_mobile='".$uid."'");
                     echo "Otp sent successfully";
                     $_SESSION['otptimer']=time()+120;


         
         }
     }
     else{
         $_SESSION['otptimer']=time()+120;
         $GeneratedOTP=rand(100000, 999999);
                 $SendSMSTO='+91'.$uid;
                 $client = new Client($account_sid, $auth_token);
                 $client->messages->create(
                     $SendSMSTO,
                     array(
                         'from' => $twilio_number,
                         'body' => '[Tapship: 2-step verification] Hello '.$name.", Please enter this OTP to Login ".$GeneratedOTP.". Do not share it with anyone"
                         )
                 );
                  $con = mysqli_connect("remotemysql.com", "m1t7Rrl6v7", "gIP1i7Re2y", "m1t7Rrl6v7");
                 $InsertOTP=$con->query("UPDATE driver SET d_tsv_otp='".$GeneratedOTP."' WHERE d_mobile='".$uid."'");
                    echo "Otp sent successfully";
                    $_SESSION['otptimer']=time()+120;

                
     
     }

}

?>