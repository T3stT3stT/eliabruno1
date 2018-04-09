<?php 
session_start();
$pdo = new PDO('mysql:host=192.168.55.10;dbname=database1', 'web01', '1234Qwer');
 
if(isset($_GET['login'])) {
    $email = $_POST['email'];
    $passwort = $_POST['passwort'];
    
    $statement = $pdo->prepare("SELECT * FROM users WHERE email = :email");
    $result = $statement->execute(array('email' => $email));
    $user = $statement->fetch();
        
    //Überprüfung des passwords
    if ($user !== false && password_verify($passwort, $user['passwort'])) {
        $_SESSION['usernameid'] = $user['id'];
        die('Login erfolgreich. Weiter zu <a href="geheim.php">internen Bereich</a>');
    } else {
        $errorMessage = "E-Mail oder Passwort war ungültig<br>";
    }
    
}
?>
<!DOCTYPE html> 
<html> 
<head>
  <title>Login</title>    
</head> 
<body>
 
<?php 
if(isset($errorMessage)) {
    echo $errorMessage;
}
?>
 
<form action="?login=1" method="post">
E-Mail:<br>
<input type="username" size="40" maxlength="250" name="username"><br><br>
 
Dein password:<br>
<input type="password" size="40"  maxlength="250" name="password"><br>
 
<input type="submit" value="Abschicken">
</form> 
</body>
</html>