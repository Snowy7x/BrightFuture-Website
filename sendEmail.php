<?php

use PHPMailer\PHPMailer\PHPMailer;

if (isset($_POST['first_name'])) {
    if (isset($_POST['last_name'])) {
        try {
            $email = isset($_POST['email']) ? $_POST['email'] : 'islam@brightfuture.qa';
            $first_name = $_POST['first_name'];
            $last_name = $_POST['last_name'];
            $subject = $_POST['subject'];
            $message = $_POST['message'];

            require_once './PHPMailer/PHPMailer.php';
            require_once './PHPMailer/SMTP.php';
            require_once './PHPMailer/Exception.php';
            $mail = new PHPMailer();

            //smtp settings:
            $mail->isSMTP();
            $mail->Host = 'mail.brightfuture.qa';
            $mail->SMTPAuth = true;
            $mail->Username = 'islam@brightfuture.qa';
            $mail->Password = "islamdev123";
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';

            //email settings:
            $mail->isHTML(true);
            $mail->setFrom($email, $first_name . ' ' . $last_name);
            $mail->addAddress('service@brightfuture.qa');
            $mail->Subject = ("$email: [$subject] - Website Contact Form");
            $mail->Body = $message;

            if ($mail->send()) {
                $status = "success";
                $response = "Email is Sent";
            } else {
                $status = "failed";
                $response = "Something is wrong: <br>" . $mail->ErrorInfo;
            }
            echo (json_encode(array("status" => $status, "response" => $response)));
            exit;

            echo json_encode(array("status" => "success", "response" => $_POST));
            exit;
        } catch (\Exception $e) {
            echo json_encode(array("status" => "error", "response" => $e));
            exit;
        }

        /*         try {
            $email = isset($_POST['email']) ? $_POST['email'] : 'islam@brightfuture.qa';
            $sender = $_POST['sender'];
            $company = $_POST['company'];
            $phone = $_POST['phone'];
            $message = $_POST['message'];

            require_once './PHPMailer/PHPMailer.php';
            require_once './PHPMailer/SMTP.php';
            require_once './PHPMailer/Exception.php';

            $mail = new PHPMailer();

            //smtp settings:
            $mail->isSMTP();
            $mail->Host = 'mail.brightfuture.qa';
            $mail->SMTPAuth = true;
            $mail->Username = 'islam@brightfuture.qa';
            $mail->Password = "islamdev123";
            $mail->Port = 465;
            $mail->SMTPSecure = 'ssl';

            //email settings:
            $mail->isHTML(true);
            $mail->setFrom($email, $sender);
            $mail->addAddress('islam@brightfuture.qa');
            $mail->Subject = ("$email [Website Contacts Message]");
            $mail->Body = $message;

            if ($mail->send()) {
                $status = "success";
                $response = "Email is Sent";
            } else {
                $status = "failed";
                $response = "Something is wrong: <br>" . $mail->ErrorInfo;
            }
            echo (json_encode(array("status" => $status, "response" => $response)));
            exit;
        } catch (\Exception $e) {
            echo json_encode('{test: test, gg: gg}');
            exit;
        } */
    } else {
        echo json_encode(array("status" => "error 2", "response" => $_POST));
        exit;
    }
} else {
    echo json_encode(array("status" => "error 1", "response" => $_POST));
    exit;
}