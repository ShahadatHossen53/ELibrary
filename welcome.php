    <?php include 'header.php';?>
    <div class="main-bg">
    <?php
    $servername = "localhost";
    $username = "Shahadat";
    $password = "12345";
    $dbname = "e_library";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $email = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT email, pass FROM accounts WHERE email='$email'";
    $result = mysqli_query($conn, $sql);
    echo "<div class='welcome_page'>";
    if (mysqli_num_rows($result) > 0) {
        
        $row = $result->fetch_assoc();
        $mainPassword = $row['pass'];
        $inserted_password = sha1($password);
        if($mainPassword == $inserted_password){
            echo "<h1 class='index-text text-center'>Welcome, you successfully log in!!!</h1>";

            $_SESSION["e_library_user"] = $email;
            //echo "<script> location.replace('home.php') </script>";
            echo "<script> location.replace('home_dev.php') </script>";
            echo "<a href='home_dev.php' class='btn btn-success form-control'>Goto Home</a>";
        }
        else{
            echo "<h1 class='text-center'>Wrong Password!
            <a href='index.php' class='btn btn-success'>Log In</a></h1> ";
        }



        
    }
    else {
    echo "<h1 class='text-center '>Sorry, this email has no account!!! 
         <a href='SignUp.php' class='btn btn-success'>Create an account</a> </h1>";
    }
    mysqli_close($conn);
    echo "</div>";
    ?>
</div>
<?php include 'footer.php';?>

