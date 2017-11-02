<?php

$postdata = file_get_contents("php://input");
$request = json_decode($postdata);
$email = $request->email;
$name = $request->name;
$message = $request->message;


$errors = array();
$success = array();

if (empty($name)) {
  $errors['name'] = 'Name is required !';
}
if (empty($email)) {
  $errors['email'] = 'Email address is required !';
}
if (empty($message)) {
  $errors['message'] = 'No message attached';
}
if ( empty($errors)) {
    $subject = "Thank you for your interest";
    $txt = "Thank you " . $name . " for your interst in my profile. David";
    $headers  = 'From: info@davenorm.me' . "\n".
                'MIME-Version: 1.0' . "\n" .
                'Content-type: text/html; charset=iso-8859-1' . "\n" .
                "X-Mailer: PHP";

    $load_html = file_get_contents('thankyou.html');
    $final_mail = str_replace('{{ name }}', $name, $load_html);
    mail('davidnorminton@gmail.com', "from davenorm.me",$message, "From:info@davenorm.me");
    mail($email, $subject, $final_mail, $headers);
    $success['success'] = $name;
    echo json_encode($success);
} else {
    echo json_encode($errors);
}

?>
