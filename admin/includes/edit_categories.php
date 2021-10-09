<form action="" method="post">
                    <div class="form-group">
                        <label for="cat-title">Edit Category</label>
    <?php
    if(isset($_GET['update'])){
    $cat_id = $_GET['update'];

    $query = "SELECT * FROM categories WHERE cat_id = {$cat_id}";
    $fetch_all_categories = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($fetch_all_categories)){
    $cat_id = $row['cat_id'];
    $cat_title = $row['cat_title'];   
    ?>

    <input value='<?php if(isset($cat_title)){ echo $cat_title; } ?>' type="text" class="form-control" name="cat_title">
    <?php
    }
    }
    ?>

    <?php

    if(isset($_POST['Update_category'])){
    $cat_update = $_POST['cat_title'];

    $query = "UPDATE categories SET cat_title = '{$cat_update}' ";
    $query .= "WHERE cat_id = {$cat_id} ";

    $Update_query = mysqli_query($connection, $query);

    if(!$Update_query){
    die("query Failed" . mysqli_error($connection));
    }
    }
    ?>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="Update_category" value="Update">
                    </div>
                </form>