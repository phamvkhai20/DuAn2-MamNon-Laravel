<?php


function ShowErrors($errors,$name){
if($errors->has($name)){
return
 "<span style='color: red'>". $errors->first($name)."</span>";
}
}

function sendMail($name, $to, $subject, $body, $title = '')
{
    try {
        $mail = new PHPMailer(true);
        $mail_smtp_username = \App\Model\Config::cfg('mail_smtp_username'); // Tài khoản
        $mail_smtp_pass = \App\Model\Config::cfg('mail_smtp_pass'); // Mật khẩu

        $mail_smtp_server = \App\Model\Config::cfg('mail_smtp_serve'); // Tên host
        $mail_encoding = \App\Model\Config::cfg('mail_encoding'); // Type cổng
        $mail_smtp_port = \App\Model\Config::cfg('mail_smtp_port'); // Cổng

        $mail->SMTPDebug = 0;                                     // Enable verbose debug output
        $mail->isSMTP();                                            // Set mailer to use SMTP
        $mail->Host = $mail_smtp_server;  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                                   // Enable SMTP authentication
        $mail->Username = $mail_smtp_username;                     // SMTP username
        $mail->Password = $mail_smtp_pass;                               // SMTP password
        $mail->SMTPSecure = $mail_encoding;                                  // Enable TLS encryption, `ssl` also accepted
        $mail->Port = $mail_smtp_port;                                    // TCP port to connect to
        //Recipients
        $mail->setFrom($mail_smtp_username, $name);
        $mail->addAddress($to);               // Name is optional
        // Content
        $mail->CharSet = "utf-8";
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $body;
        $mail->send();
        $res['status'] = 'Thành Công';
        $res['data'] = $mail->ErrorInfo;

    } catch (phpmailerException $e) {
        $res['status'] = 'Thành Công';
        $res['data'] = $e->errorMessage();
    } catch (Exception $e) {
        $res['status'] = 'Thành Công';
        $res['data'] = $mail->ErrorInfo;
    }

    return $res;
}
