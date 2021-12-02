<?php include 'header.php';?>
<?php include 'navbar.php';?>
<div class="main-bg ">
    <div class="row blur-bg " >

        <?php 


            if(isset($_POST['author'])){
                $author_name = $_POST['author'];
                //echo "auther name is ". $author_name;
            }
            else{
                //echo "author name not set<br>";
                $author_name = "";
            }

            if(isset($_POST['details'])){
                $details = $_POST['details'];
                //echo "details is :". $details;
            }
            else{
                echo "details not set<br>";
                //$details = "";
            }

            if(isset($_POST['category'])){
                $category = $_POST['category'];
                $main_category = $category;
                if($category=='custom'){
                    $category = $_POST['custom_category'];
                    $main_category = $category;
                }
            }
            else{
                //echo "custom category set<br>";
                $category = "";
            }


				$file_up = $_FILES['file'];
                $book_name = $_POST['book_name'];
                $edition = $_POST['book_edition'];
                $upload_account = $_SESSION['e_library_user'];
                
                
                
                $version = $_POST['version'];
               
                $file_location = '';
                $same_book = false;
                echo'<div class="main-bg">
                <div class="row blur-bg" >
                    <div class="col-9">
                        <div class="col-12 index-text text-center p-5 text-shadow" id="myDIV" >';

                echo "<h1>Book name = $book_name </h1>";
                echo "<h1>Author = $author_name </h1>";
                echo "<h1>details = $details </h1>";
                echo "<h1>version = $version </h1>";
                echo "<h1>category = $category </h1>";
                echo "</div>";


                $servername = "localhost";
                $username = "Shahadat";
                $password = "12345";
                $dbname = "e_library";


                foreach($file_up['name'] as $position => $file_up_name){
					$ext = pathinfo($file_up_name, PATHINFO_EXTENSION);
					$file_up_tmp_name = $file_up['tmp_name'][$position];
					$up_name = $file_up_name;
                    $file_location = "Files/PDF/".$up_name;
                    break;
				}
                


                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                }
                else{
                    

                    $sql = "SELECT Book_name, Category, book_edition FROM books_list WHERE Book_name='$book_name' and Category = '$category'";
                    $result = $conn->query($sql);
                    
                    if ($result->num_rows > 0) {
                        echo '<div class="col-12 text-warning text-center p-5 text-shadow">';
                        echo "<h3>The same book already present in an database. <br> Please choose another book(pdf).<h3>";
                        echo "</div>";
                        $same_book = true;         
                    }
                    else {
                        if(!$same_book){
                            $is_uploaded = false;
                            foreach($file_up['name'] as $position => $file_up_name){
                                $ext = pathinfo($file_up_name, PATHINFO_EXTENSION);
                                $file_up_tmp_name = $file_up['tmp_name'][$position];
                                
                                $up_name = $file_up_name;
                                
                                if($ext == 'pdf' || $ext == 'PDF' || $ext == 'Pdf'){
                                    $move = move_uploaded_file($file_up_tmp_name, "Files/PDF/".$up_name);
                                    
                                    $sql = "INSERT INTO unapproved_books_list (Book_name, Authors_name, Category, main_category, book_details, book_version, file_location, book_edition, approved, upload_account)
                                    VALUES ('$book_name', '$author_name', '$category', '$main_category', '$details', '$version', '$file_location','$edition' , '0', '$upload_account')";
                                    if (mysqli_query($conn, $sql)) {
                                        echo '<div class="col-12 index-text text-center p-5 text-shadow">';
                                        echo "<h3>Congratulation! Your your pdf uploded successfully</h3>";
                                        echo "<h3>You see the pdf after admin approve your post. Thank you</h3>";
                                        echo '</div>';

                                        $last_id = mysqli_insert_id($conn);
                                        //echo $last_id;

                                        $sql = "INSERT INTO new_posts (book_id, approved)
                                                VALUES ('$last_id', '0')";
                                        
                                        echo '<div class="col-12 index-text text-center p-5 text-shadow">';
                                        if(mysqli_query($conn, $sql)){

                                            //echo "New post added<br>";
                                        }
                                        else{
                                            echo "Failed to add your pdf<br>";
                                        }
                                        echo '</div>';



                                        $is_uploaded = true;

                                    
                                    } else {
                                        echo '<div class="col-12 index-text text-center p-5 text-shadow">';
                                        echo "<h3>Something is error. Please try again</h3>";
                                        echo "<h5>Error: " . $sql . "<br>" . mysqli_error($conn);
                                        echo '</h5></div>';
                                    }
                                }
                                else{
                                    echo '<div class="col-12 index-text text-center p-5 text-shadow">';
                                    echo "</h5>Your selected file is not a PDF file!<br>You can upload only PDF file";
                                    echo '</h5></div>';
                                }
                                break;
                            }
                            echo '<div class="col-12 index-text text-center p-5 text-shadow">';
                            if($is_uploaded){
                                
                                echo "<h2 class='text-success' >$up_name upload successful</h2>";
                                
                            }
                            else{
                                echo "<h2 class='text-warning' >$up_name upload Failed</h2>";
                            }
                            echo '</div>';
                        }
                        
                        
                    }
                    
                }
                echo "</div></div></div>";
                mysqli_close($conn);
                ?>
    </div>
</div>




<?php include 'footer.php';?>