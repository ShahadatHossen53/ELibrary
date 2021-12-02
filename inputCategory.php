<?php
            $sql_category_value = "SELECT $category FROM books_list where id= $book_id";
            $result_category_value = mysqli_query($conn, $sql_category_value);
            $category_value = $result_category_value->fetch_assoc();

            $category_value =  $category_value[$category];




            $sql_category = "SELECT DISTINCT $category FROM books_list";
            $result_category = mysqli_query($conn, $sql_category);
            $category_selected = "";
            echo '<select  id="custom_input" class="form-control" name="category" required oninput="myFunction()">
            <option  disabled value="">Select Categroy</option>';
            
            if(!$result_category || mysqli_num_rows($result_category)>0){
                while($row_category = $result_category->fetch_assoc()){
                    $category_name = $row_category[$category];
                    if($category_name == $category_value){
                        $category_selected = "selected";
                        echo $category_name;
                    }
                    else{
                        $category_selected = "";
                       
                    }
                    echo '<option '.$category_selected.' name="category" value="'.$category_name.'">'.$category_name.'</option>';
                }
            }
            echo '<option value="custom">Create Category</option></select>';

?>




