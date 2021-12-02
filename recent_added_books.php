
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
            //$sql = "SELECT * FROM book_list  ";
            //$sql = 'SELECT * FROM "books_list" ORDER BY id DESC where approved = "1"';
            $sql = 'SELECT * FROM books_list where approved = "1" ORDER BY id DESC ';
            //$sql = 'SELECT TOP 12 * FROM books_list ORDER BY id DESC';
            $result = mysqli_query($conn, $sql);
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

                            echo '<div class="col-md-3 col-sm-6" >';
                                echo '<div class="card bg-primary border border-success" style="height: 300px; width: auto;">';
                                    //echo '<img src="img/book_1.jpg" class="card-img-top p-1 " style="height: 200px; width: auto;" alt="">';
                                    echo '<div class="card-body">';
                                        echo '<h5 class="card-title">'.$book_name.'</h5>';
                                        echo '<p class="card-text">'.$Category.'</p>';
                                        echo '<p class="card-text">Version: '.$book_version.'</p>';
                                        echo '<form action="pdfJS\web\viewer.php" method="post">';
                                        //echo '<a href="'.$file_location.'" name = class="btn btn-success">Details</a>';
                                        //echo '<a href="'.$file_location.'" name = class="btn btn-success">Details</a>';

                                        echo '<input hidden type="text" name="file_location" value="'.$file_location.'" >';
                                        echo '<input type="submit" name="submit" value="View pdf" class="btn btn-success my-auto">';
                                        
                                        
                                        //echo '<button name = "approved_button" value = "'.$book_id.'" class="btn btn-warning ml-3">Approve</button>';
                                        echo '</form>';
                                    echo'</div>
                                </div>
                            </div>';

                            if($book_counter %4==0){
                                echo "</div>";
                                echo "<div class='row blur-bg' style='margin-bottom: 18px;'>";
                            }
                            if($book_counter>=12){
                                break;
                            }
                        
                        $book_counter++;
                    }
                   
                }
            echo '</div>';
        }
        
    ?> 



<!-- 
<div class="row blur-bg" style='margin-bottom: 18px;'>
        <div class="col-md-3 col-sm-6 ">
            <div class="card bg-primary border border-success" >
                <img src="img/book_1.jpg" class="card-img-top p-1 " style='height: 200px; width: auto;' alt="Book 1">
                <div class="card-body">
                    <h5 class="card-title">Book 1</h5>
                    <p class="card-text">Class 1 Bangla Book. Bangla Version.</p>
                    <a href="#" class="btn btn-success">Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card bg-primary" >
                <img src="img/book_1.jpg" class="card-img-top p-1" style='height: 200px; width: auto;' alt="Book 1">
                <div class="card-body">
                    <h5 class="card-title">Book 1</h5>
                    <p class="card-text">Class 1 Bangla Book. Bangla Version.</p>
                    <a href="#" class="btn btn-success">Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card bg-primary" >
                <img src="img/book_1.jpg" class="card-img-top p-1" style='height: 200px; width: auto;' alt="Book 1">
                <div class="card-body">
                    <h5 class="card-title">Book 1</h5>
                    <p class="card-text ">Class 1 Bangla Book. Bangla Version.</p>
                    <a href="#" class="btn btn-success">Details</a>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6">
            <div class="card bg-primary" >
                <img src="img/book_1.jpg" class="card-img-top p-1" style='height: 200px; width: auto;' alt="Book 1">
                <div class="card-body">
                    <h5 class="card-title">Book 1</h5>
                    <p class="card-text ">Class 1 Bangla Book. Bangla Version.</p>
                    <a href="#" class="btn btn-success">Details</a>
                </div>
            </div>
        </div>
</div> -->