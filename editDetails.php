<?php include 'header.php';?>
<?php 
    if(!isset($_SESSION["e_library_user"]) || $_SESSION['e_library_user'] == ""){
        echo "<script> location.replace('index.php') </script>";
    }
    else{

?>
<?php include 'navbar.php';?>

    <div class="main-bg ">
        <div class="row blur-bg mx-auto" >

            <?php
                $book_id = $_POST['book_id'];
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
                    //$user_account = $_SESSION['e_library_user'];
                    $sql = 'SELECT * FROM books_list where id = "'.$book_id.'"';
                    //$sql = 'SELECT TOP 12 * FROM books_list ORDER BY id DESC';
                    $result = mysqli_query($conn, $sql);
                   

                    
                    if(!$result || mysqli_num_rows($result)>0){
                        $columns_text        = array('Book Name', 'Authors Name',  'Main Category', 'Category', 'Book Details', 'Book Version', 'Book Edition');
                        $columns        = array('Book_name', 'Authors_Name', 'main_category', 'Category',  'book_details', 'book_version', 'book_edition');
                        $required_value = array("required",              "",  "required",     "required",             "",     "required",             "");
                        $book_counter = 1;
                      //echo "<form action='editedDetailsSubmit.php'>";
                        while($row = $result->fetch_assoc()){
                            // $book_name = $row['Book_name'];
                            // $book_id = $row['id'];
                            // $Author_Names = $row['Authors_Name'];
                            // $Category = $row['Category'];
                            // $book_details = $row['book_details'];
                            // $book_version = $row['book_version'];
                            // $file_location = $row['file_location'];
                            // $book_edition = $row['book_edition'];
                            // $approved = $row['approved'];
                            echo "<div class='col-md-2'></div><div class='col-md-8'>";
                            echo "<table class='table edit-table'>";
                            echo "<tr><th>Filed</th><th>Value</th></tr>";
                            for($i=0; $i<count($columns); $i++){
                                echo "<tr><td>";
                                echo $columns_text[$i]."</td><td>";
                                if($columns[$i]=='Category' || $columns[$i]=='main_category'){
                                    $category = $columns[$i];
                                    include 'inputCategory.php';
                                }

                                else if($columns[$i]=='book_version'){
                                    if($row[$columns[$i]]=='bangla'){
                                        echo '<select id="inputState" name="version" class="form-control" required">
                                        <option disabled value="">Select Version</option>
                                        <option selected value="bangla">বাংলা</option>
                                        <option value="english">English</option>
                                        </select>';
                                    }
                                    else if($row[$columns[$i]]=='english'){
                                        echo '<select id="inputState" name="version" class="form-control" required">
                                        <option disabled value="">Select Version</option>
                                        <option value="bangla">বাংলা</option>
                                        <option selected value="english">English</option>
                                        </select>';
                                    }
                                    else{
                                        echo '<select id="inputState" name="version" class="form-control" required">
                                        <option selected disabled value="">Select Version</option>
                                        <option value="bangla">বাংলা</option>
                                        <option  value="english">English</option>
                                        </select>';
                                    }
                                    
                                }
                                else{
                                    echo '<input type="text" class=" form-control" name="'.$columns_text[$i].'" value = "'.$row[$columns[$i]].'"  '.$required_value[$i].'>';
                                }
                                
                                //echo $row[$columns[$i]];
                                echo "</td></tr>";
                            }
                            echo "<tr><td></td><td><button class='btn btn-primary'>Submit</button></td></tr>";
                            echo "</table></div><div class='col-md-2'></div>
                            </div>";
                        }

                        //echo "</form>";
                    }
                }

            ?>
        </div>
    </div>

<script>
    function myFunction(){

        var x = document.getElementById("custom_input").value;
        if(x=='custom'){
            document.getElementById("custom_category").setAttribute('required', 'true');
            document.getElementById("custom_category_div").removeAttribute('hidden');

        }
        else{
            document.getElementById("custom_category").removeAttribute('required');
            document.getElementById("custom_category_div").setAttribute('hidden', 'true');
        }
    }
</script>


<?php include 'footer.php';?>

<?php } ?>
