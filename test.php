<!-- 
<form action="" method="POST"> 


<table>
    <tr>
    
        <td>input</td>
        <td><select id="inputState" class="form-control" name="category" required oninput="myFunction()">
                <option selected disabled value="">Select Categroy</option>
                <option value="1">Category 1</option>
                <option value="2">Category 2</option>
                <option value="3">Category 3</option>
                <option value="4">Category 4</option>
                <option value="5">Category 5</option>
                <option value="6">Category 6</option>
                <option value="7">Category 7</option>
                <option value="custom" >Create Category</option>
            </select></td>
    </tr>
    <tr><td>Enter name</td>
    <td><input type="text" name="details"  id="custom_category" ></td>
   </tr>
   <tr>
    <td><input type="submit" name="details" id="inputAddress" value="Submit" ></td>
   </tr>
    
</table>
<p id='demo'></p>

</form>


<script>
function myFunction(event) {

    var x = document.getElementById("inputState").value;
    if(x=='custom'){
        document.getElementById("custom_category").setAttribute('required', 'true');
    }
    else{
        document.getElementById("custom_category").removeAttribute('required');
    }
}
</script> -->
<!-- <form action="" method="POST"> 
<table>
    <tr>
    
        <td>input</td>
        <td><select id="inputState" class="form-control" name="category" ">
                <option selected disabled value="">Select Categroy</option>
                <option value="1">Category 1</option>
                <option value="2">Category 2</option>
                <option value="3">Category 3</option>
                <option value="4">Category 4</option>
                <option value="5">Category 5</option>
                <option value="6">Category 6</option>
                <option value="7">Category 7</option>
            </select></td>
    </tr>
    <tr><td>Enter name</td>
    <td><input type="text" name="details"  id="custom_category" ></td>
   </tr>
   <tr>
    <td><input type="submit" name="submit" id="inputAddress" value="Submit" ></td>
   </tr>
    
</table>

</form>


<?php
//  $servername = "localhost";
//  $username = "Shahadat";
//  $password = "12345";
//  $dbname = "e_library";

//  $conn = new mysqli($servername, $username, $password, $dbname);

//   if(isset($_POST['submit'])){

//     $name = $_POST['category'];

//     $details = $_POST['details'];

//     echo "category = $name<br>";
//     echo "details = $details<br>";

//     if($conn){
//       $sql = "INSERT INTO new_posts (book_id, approved)
//       VALUES ('1', '0')";
//       if(mysqli_query($conn, $sql)){
//           echo "new post added<br>";
//       }
//       else{
//           echo "New post not added<br>";
//       }
//     }
//     else{
//       echo "Database not connected<br>";
//     }


    
//   }

?> -->



<form action="show_books_by_category.php" method="POST" id='my_form'>
<input type="text" name="books_category"  value="test" >
<input type="submit"  value="Submit" >
<a href="javascript:{}" onclick="document.getElementById('my_form').submit(); return false;">submit</a>

</form>


<?php /*
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
         echo "<h1>Connection Successfull</h1>";
         $sql = 'SELECT * FROM books_list';
            $result = mysqli_query($conn, $sql);
            //$result = $conn->query($sql) or die($conn->error);
            //if (mysqli_num_rows($result) > 0) {
            if(!$result || mysqli_num_rows($result)>0){
                echo "<h1>Everything is ok!!</h1>";
                while($row = $result->fetch_assoc()){
                    $book_name = $row['Book_name'];
                    echo $book_name."<br>";
                }
            }
            else{
                echo "<h1>Something is wrong</h1>";
            }
     }*/


?>