<?php 
include 'dbconnection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

function sendMail($email,$reset_token){
    require '../PHPMailer/Exception.php';
    require '../PHPMailer/PHPMailer.php';
    require '../PHPMailer/SMTP.php';
       $mail = new PHPMailer(true);

    try {
        //Server settings

        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'arti.doltani@gmail.com';                     //SMTP username
        $mail->Password   = 'kpaq nxyy oywn jbny';                               //SMTP password
         $mail->SMTPSecure = 'tls'; 
        $mail->Port       = 587; 
                                           //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('arti.doltani@gmail.com', 'aptec');
        $mail->addAddress($email);     //Add a recipient
      
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = 'Password reset Link';
        $mail->Body    = "Got a password request email from you <br>
        Click the link below! <br>
     <a href='http://localhost/Admin_for_orgnaization/organization/update_password.php  ?email=$email&resettoken=$reset_token'>Reset Password</a>"
        ;
       
    
        $mail->send();
        return true;
    } catch (Exception $e) {
        echo "Error";
    }
}
if(isset($_POST['pass_reset_link'])){
    $check_email="SELECT email FROM `admin` where `email` ='$_POST[email]'";
    $check_email_query=mysqli_query($conn,$check_email);
    if($check_email_query){
        if(mysqli_num_rows($check_email_query)>0){
    $reset_token=bin2hex(random_bytes(16));
    date_default_timezone_set('Asia/karachi');
    $date=date("Y-m-d");
    $query= "UPDATE `admin` SET `resettoken`='$reset_token',`token_expire`='$date' WHERE `email` ='$_POST[email]' ";
    $result= mysqli_query($conn, $query);
    if($result && sendMail($_POST['email'],$reset_token)){
        echo"
        <script>
        
        alert('Email is sent');
        window.location.href='../organization/login.html';
        
        </script>";
    }
    else{
        echo"
            <script>
            
            alert('Server is down');
            window.location.href='../organization/login.html';
            
            </script>";
    }
        }
        else {
echo"
            <script>
            
            alert('Email not found');
            window.location.href='../organization/register.html';
            
            </script>";
        }
    }
}

?>