<div class="category-section">
<div class="accordion" id="accordionExample">

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
    $user_account = $_SESSION['e_library_user'];
    $sql = 'SELECT DISTINCT main_category FROM books_list where upload_account = "'.$user_account.'"';
            $result = mysqli_query($conn, $sql);
            //$result = $conn->query($sql) or die($conn->error);
            //if (mysqli_num_rows($result) > 0) {
            $collaps_id = 0;
            if(!$result || mysqli_num_rows($result)>0){
                while($row = $result->fetch_assoc()){
                    $book_category = $row['main_category'];

                    echo '<div class="card">';
                    echo '<div class="card-header" id="heading'.$collaps_id.'">';
                    echo '<h1 class="mb-0">';
                    echo '<button class="btn btn-block text-left d-flex justify-content-between align-items-center" type="button" data-toggle="collapse" data-target="#collapse'.$collaps_id.'" aria-expanded="false" aria-controls="collapse'.$collaps_id.'">';
                    echo $book_category;
                    $sql_2 = 'SELECT DISTINCT Category FROM books_list where upload_account = "'.$user_account.'" and main_category="'.$book_category.'"';
                    $result_sub = mysqli_query($conn, $sql_2);
                    $num_of_sub_cat = 0;
                    if(!$result_sub || mysqli_num_rows($result_sub)>0){
                        $num_of_sub_cat = mysqli_num_rows($result_sub);
                    }
                    
                    echo '<span class="badge badge-primary badge-pill ">'.$num_of_sub_cat.'</span></button></h1></div>';

                    


                    echo ' <div id="collapse'.$collaps_id.'" class="collapse" aria-labelledby="heading'.$collaps_id.'" data-parent="#accordionExample">
                    <div class="card-body">
                      <div class="subcategory-list"> <ul class="list-group">';
                      

                      $sql_3 = 'SELECT DISTINCT Category, main_category FROM books_list where upload_account = "'.$user_account.'" and main_category="'.$book_category.'"';
                      $result_3 = mysqli_query($conn, $sql_3);
                      $num_of_book = 0;
                      if(!$result_3 || mysqli_num_rows($result_3)>0){
                        //$num_of_book = mysqli_num_rows($result_sub_2);
                        //$num_of_book = mysqli_num_rows($result_3);
                        while($sub_category = $result_3->fetch_assoc()){
                          $form_id = $collaps_id.$sub_category['Category'];
                          echo '<form action="show_books_by_category_by_user.php" method="POST"  id="'.$form_id.'">';
                          echo '<input type="text" name="books_sub_category" hidden value="'.$sub_category['Category'].'" >';
                          echo '<input type="text" name="books_main_category" hidden value="'.$sub_category['main_category'].'" >';
                          $temp_javaScript  = "document.getElementById('".$form_id."').submit(); return false;";
                          echo '<a href="javascript:{}" onclick="'.$temp_javaScript.'"><li class="list-group-item d-flex justify-content-between align-items-center">';
                          //echo '<a href="#"><li class="list-group-item d-flex justify-content-between align-items-center">';
                          echo $sub_category['Category'];

                          $sql_4 = 'SELECT Category FROM books_list where upload_account = "'.$user_account.'" and Category="'.$sub_category['Category'].'" and main_category="'.$sub_category['main_category'].'"';
                          $result_4 = mysqli_query($conn, $sql_4);
                          
                          if(!$result_sub || mysqli_num_rows($result_4)>0){
                              $num_of_book = mysqli_num_rows($result_4);
                          }


                          echo '<span class="badge badge-primary badge-pill">'.$num_of_book.'</span>
                              </li></a></form>';

                        }
                          
                      }

                       echo '</ul></div></div></div></div>';

                $collaps_id = $collaps_id +1;
                }
                
            }
            else{
                echo "<h3>There is no category avilable</h3>";
            }

   }
?>

</div>
</div>