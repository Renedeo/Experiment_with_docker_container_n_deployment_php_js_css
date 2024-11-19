<?php 

$pswd = "Test@12345";
$hashPswd = password_hash($pswd, PASSWORD_DEFAULT);

echo "Hashed password: ". $hashPswd. "<br>";
// if (password_verify($pswd, "$2y$10\$gGIjpRlthU4wAkkUDOEVWeTIGCacyZxHuVF7IGSVPQqUBSyxpWzEC")){
if (password_verify("Test@12345", "$2y$10\$xlrTBHEzLqMfFASAiZBeY.wpO5nDWMtZXqgdnjkHa/I0.igvxBN5y")){
    echo "Password is correct";
}else {
    echo "Password is incorrect";
}