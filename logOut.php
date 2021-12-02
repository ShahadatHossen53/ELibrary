<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Set session variables
$_SESSION["e_library_user"] = "";
echo "<script> location.replace('index.php') </script>";
?>

</body>
</html>