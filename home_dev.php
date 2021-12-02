
<?php include 'header.php';?>
<?php 
    if(!isset($_SESSION["e_library_user"]) || $_SESSION['e_library_user'] == ""){
        echo "<script> location.replace('index.php') </script>";
    }
    else{

?>
<?php include 'navbar.php';?>


    <div class="main-bg">
        <div class="row blur-bg mx-auto" >
            <div class="col-9">
                <div class="col-12 index-text text-center p-5 text-shadow" id="myDIV" >
                    <h1 >Recently Added Books</h1>
                </div>
                <?php include 'recent_added_books.php';?>
                
            </div>
            <div class="col-3">
                <h1 class="index-text animation-text" style='background: #e083f74b; '>categories</h1>
                <?php include 'category.php';?>
            </div>
            
        </div>
        
    </div>


<?php include 'footer.php';?>

<?php } ?>
