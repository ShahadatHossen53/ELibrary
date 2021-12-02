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
        <div class="col-6 m-auto">
            <h1 class="index-text animation-text">Upload Your PFD</h1>
        </div>
        <div class="col-6 border upload-pdf-section ">
            <form action="upload_pdf_validation.php" method="POST" enctype="multipart/form-data" class="my-form"> 
            <div class="form-row">
                <div class="form-group col-md-6">
                <label for="bookname">Book Name</label>
                <input type="text" name="book_name" class="form-control" required id="bookname">
                </div>
                <div class="form-group col-md-6">
                <label for="author"> Author (optional)</label>
                <input type="text" name="author" class="form-control" id="author">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Details about pdf (optional)</label>
                <input type="text" name="details" class="form-control" id="inputAddress" >
            </div>
            <div class="form-group">
                <label for="inputAddress">Edition (optional)</label>
                <input type="text" name="book_edition" class="form-control" id="inputAddress" >
            </div>
            <div class="form-group">
                <label for="inputAddress2">Version</label>
                <select id="inputState" name="version" class="form-control" required>
                    <option selected disabled value="">Select Version</option>
                    <option value="bangla">বাংলা</option>
                    <option value="english">English</option>
                </select>
            </div>
            <div class="form-row">
                <!-- <div class="form-group col-md-6">
                <label for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity">
                </div>  -->
                <div class="form-group col-md-6">
                <label for="inputState">Category</label>
                
                <select id="custom_input" class="form-control" name="category" required oninput="myFunction()">
                    <option selected disabled value="">Select Categroy</option>
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
                            $sql = 'SELECT DISTINCT main_category FROM books_list where approved="1"';
                            $result = mysqli_query($conn, $sql);
                            
                            if(!$result || mysqli_num_rows($result)>0){
                                while($row = $result->fetch_assoc()){
                                    $category_name = $row['main_category'];
                                    echo '<option value="'.$category_name.'">'.$category_name.'</option>';
                                }
                            }
                        }
                    ?>
                    <option value="custom">Create Category</option>
                </select>
                </div>
                <div class="form-group col-md-6" id='custom_category_div' hidden>
                    <label for="inputZip">Category Name</label>
                    <input type="text" class="form-control" id="custom_category" name="custom_category" placeholder="Enter category name">
                </div>
            </div>
            <div class="form-group">
                <label for="exampleFormControlFile1">Select your pdf</label>
                <input type="file" class="form-control-file" name="file[]" multiple required id="exampleFormControlFile1">
            </div>
            <!-- <div class="form-group">
                <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
                </div>
            </div> -->
            <button type="submit" class="btn btn-warning" >Upload</button>
            </form>
            </div>
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
