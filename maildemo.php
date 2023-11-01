<?php

$to = "example@gmail.com";
$subject = "testing mail";
$body = "Message OTP" . uniqid();
$from = "From: mail@demo.com";


if (mail($to, $subject, $body, $from)) {
    echo "Mail sent success";
} else {
    echo "Mail sent error";
}
