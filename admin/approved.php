<?php

    $value = $_POST['approved_button'];
    $sql = "SELECT * FROM unapproved_books_list where id='$value'";
    $result_apv = mysqli_query($conn, $sql);
    $row_apv = $result_apv->fetch_assoc();
    $is_approved = $row_apv['approved'];
    if($is_approved==1){
        echo "This pdf already approved to show in the websie<br>";
    }
    else{
        /*$sql = "UPDATE books_list
        SET approved = '1'
        WHERE id = $value;";*/
        $book_name = $row_apv['Book_name'];
        $author_name = $row_apv['Authors_Name'];
        $category = $row_apv['Category'];
        $main_category = $row_apv['main_category'];
        $details = $row_apv['book_details'];
        $version = $row_apv['book_version'];
        $file_location = $row_apv['file_location'];
        $edition = $row_apv['book_edition'];
        $upload_account = $row_apv['upload_account'];


        $sql = "INSERT INTO books_list (Book_name, Authors_name, Category, main_category, book_details, book_version, file_location, book_edition, approved, upload_account)
        VALUES ('$book_name', '$author_name', '$category', '$main_category', '$details', '$version', '$file_location','$edition' , '1', '$upload_account')";

        if($result_apv = mysqli_query($conn, $sql)){
            echo "This pdf approved to show in the websie<br>";
            $sql = "DELETE FROM new_posts WHERE book_id= $value;";
            $result_apv = mysqli_query($conn, $sql);
            
            $sql = "DELETE FROM unapproved_books_list WHERE id= $value;";
            $result_apv = mysqli_query($conn, $sql);
            echo "<script> location.replace('dashbord.php') </script>";

        }
        else{
            echo "Approved failed!!!<br>";
        }
    }
?>