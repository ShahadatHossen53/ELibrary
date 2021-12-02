<?php
        $q = $_REQUEST["q"];
        $element_counter = 0;
        
        if ($q !== "") {
            
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
                $columns = array('Book_name', 'Authors_Name', 'Category', 'book_version', 'book_edition');
                for($i=0; $i<count($columns); $i++){
                    $sql = 'SELECT DISTINCT '.$columns[$i].' FROM books_list WHERE '.$columns[$i].' LIKE "%'.$q.'%"';
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result)>0){
                        while($row = $result->fetch_assoc()){
                            $book_name = $row[$columns[$i]];
                            echo "<p onclick='select(this)'>$book_name</p>";
                            $element_counter++;
                            if($element_counter>=15){
                                return;
                            }
                        }
                    }
                } 
            }
        }
        if($element_counter==0){
            echo "";
        }
    ?>