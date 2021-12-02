<?php include 'header.php'; ?>

    <?php
        $file_location = $_POST['file_location'];
        echo  '<iframe src="'.$file_location.'" width="100%" height="700px"></iframe>' ;
    
    ?>

<?php include 'footer.php'; ?>