<?php

function insert_categories(){

        global $connection;
        if(isset($_POST['submit'])){
        $cat_title =  $_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)){
        echo "This field should not be empty";
        }
        else{
        $query = "INSERT INTO categories(cat_title) ";
        $query .= "VALUE('{$cat_title}')";

        $Add_categories = mysqli_query($connection, $query);
        if(!$Add_categories){
        die("Query Failed" . mysqli_error($connection));
                    }
                }
            }
        }

function ShowAllCategories(){

        global $connection;
        $query = "SELECT * FROM categories";
        $select_all_categories = mysqli_query($connection, $query);

        while($row = mysqli_fetch_assoc($select_all_categories)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
        echo "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href='categories.php?update={$cat_id}'>Update</a></td>";
        echo "</tr>";
            }
        }

function DeleteCategories(){

        global $connection;
        if(isset($_GET['delete'])){
            $cat_delete = $_GET['delete'];
    
            $query = "DELETE FROM categories ";
            $query .= "WHERE cat_id = {$cat_delete}";
    
            $Delete_query = mysqli_query($connection, $query);
            
            if(!$Delete_query){
            die("query Failed" . mysqli_error($connection));
            }
            header("location: categories.php");
            }
        }
?>
