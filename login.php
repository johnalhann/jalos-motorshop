<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbase = "jalo";

$conn = new mysqli($servername, $username, $password, $dbase);



$email = $_POST ['email'];
$pass = $_POST ['password'];
    
$sql = "SELECT * FROM tbluser WHERE uEmail = '$email' AND uPass = '$pass'";
$result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1){
        $row = mysqli_fetch_assoc($result);

        $id = $row['uID'];
        $_SESSION['Email'] = $row['uEmail'];
        $_SESSION['Password'] = $row['uPass'];

        if ($row ['uEmail'] === $email && $row ['uPass'] === $pass ){
            if ($row ['uLevel'] == 1){
                header("Location: customer/index.html?user=".$id);
            }else if ($row ['uLevel'] == 3){
                header("Location: admin/login.html?user=".$id);
            }
        }

    }else {?>
    
        <script>
        window.alert('Your In');
        window.location.href='index.html';
        unset($_SESSION['Email']);
        unset($_SESSION['Password']);
        </script>
   <?php }?>

