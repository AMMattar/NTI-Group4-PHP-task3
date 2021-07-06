<?php

// cleaning input data
function cleaning($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

$email = '';
$url = ''; 
$password = '';

if($_SERVER['REQUEST_METHOD'] == "POST"){
    $email = cleaning($_POST['email']);
    $password = cleaning($_POST['password']);
    $url = cleaning($_POST['url']);
}

// validation 
$email_check = filter_var($email, FILTER_VALIDATE_EMAIL);
$url_check = filter_var($url,FILTER_VALIDATE_URL);
if($email_check && $url_check){
    echo "thanks for your input";
}else {
    echo 'please check your data <br> did you mean'.filter_var($email, FILTER_SANITIZE_EMAIL).'<br>'.filter_var($url,FILTER_SANITIZE_URL);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 3</title>
</head>
<body>
    <form method = "POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
        <div>
            <label>Email</label>
            <input type="email" name="email" placeholder="Please enter your email">
        </div>
        <div>
            <label>Password</label>
            <input type="password" name="password" placeholder="Please enter your password">
        </div>
        <div>
            <label>LinkedIn Account</label>
            <input type="text" name="url" placeholder="Please enter your LinkedIn Account url">
        </div>
        <button type="submit">Submit</button>
    </form>
</body>
</html>