
<?php include 'header.php';?>
<?php 
    if(!isset($_SESSION["e_library_user"]) || $_SESSION['e_library_user'] == ""){
        echo "<script> location.replace('index.php') </script>";
    }
    else{

?>
<?php include 'navbar.php';?>

    <div class="main-bg">
        <div class="row blur-bg" >
            <div class="col-9">
                <div class="col-12 index-text text-center p-5 text-shadow" id="myDIV" >
                    <?php 
                    $book_sub_category = $_POST['books_sub_category'];
                    $book_main_category = $_POST['books_main_category'];
                    echo "<h1>The category is ".$book_main_category."=>".$book_sub_category."</h1>";
                    
                    ?>
                </div>
                <?php 
                     $servername = "localhost";
                     $username = "Shahadat";
                     $password = "12345";
                     $dbname = "e_library";
                     // Create connection
                     $conn = new mysqli($servername, $username, $password, $dbname);
                     //Check connection
                     if (!$conn) {
                         die("Connection failed: " . mysqli_connect_error());
                     }
                     else{
                        //$book_sub_category = $_POST['books_sub_category'];
                        //$book_main_category = $_POST['books_main_category'];
                        $user_account = $_SESSION['e_library_user'];
                        $sql = 'SELECT * FROM books_list where upload_account = "'.$user_account.'" and Category="'.$book_sub_category.'" and main_category="'.$book_main_category.'"';
                        $result = mysqli_query($conn, $sql);
                        $collaps_id = 0;
                        echo "<div class='row blur-bg' style='margin-bottom: 18px;'>";
                        if(!$result || mysqli_num_rows($result)>0){
                            $book_counter = 1;
                            while($row = $result->fetch_assoc()){

                                $book_name = $row['Book_name'];
                                $book_id = $row['id'];
                                $Author_Names = $row['Authors_Name'];
                                $Category = $row['Category'];
                                $book_details = $row['book_details'];
                                $book_version = $row['book_version'];
                                $file_location = $row['file_location'];
                                $book_edition = $row['book_edition'];
                                $approved = $row['approved'];
                                echo '<div class="col-md-3 col-sm-6 ">';
                                echo '<div class="card bg-primary border border-success" >';
                                //echo '<img src="img/book_1.jpg" class="card-img-top p-1 " style="height: 200px; width: auto;" alt="">';
                                echo '<div class="card-body">';
                                echo '<h5 class="card-title">'.$book_name.'</h5>';
                                echo '<p class="card-text">'.$Author_Names.' '.$Category.' '.$book_version.' '. $book_edition.'</p>';
                                echo '<div class="row"><div class="">';
                                echo '<form action="pdfJS\web\viewer.php" method="post">';
                                //echo '<a href="'.$file_location.'" name = class="btn btn-success">Details</a>';
                                //echo '<a href="'.$file_location.'" name = class="btn btn-success">Details</a>';

                                    echo '<input hidden type="text" name="file_location" value="'.$file_location.'" >';
                                    echo '<input type="submit" name="submit" value="View pdf" class="btn btn-success">';
                                    echo '</div></form><div class="ml-3">';

                                echo '<form action="editDetails.php" method="post">';
                                    echo '<input hidden type="text" name="book_id" value="'.$book_id.'" >';
                                    echo '<input type="submit" name="editDetails" value="Edit" class="btn btn-warning">';
                                
                                //echo '<button name = "approved_button" value = "'.$book_id.'" class="btn btn-warning ml-3">Approve</button>';
                                echo '</form></div></div>';
                                echo'</div></div></div>';

                                if($book_counter %4==0){
                                    echo "</div>";
                                    echo "<div class='row blur-bg' style='margin-bottom: 18px;'>";
                                }
                                $book_counter++;
    
                            }
                        }
                        echo '</div>';
                    }
                
                ?>
            </div>
            <div class="col-3">
                <h1 class="index-text animation-text" style='background: #e083f74b; '>Categorys</h1>
                <?php include 'categoryByUser.php';?>
            </div>
            
        </div>
        
    </div>


<?php include 'footer.php';?>
<?php } ?>
