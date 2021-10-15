<?php

if(isset($_GET['p-id'])){
$select_edit_post = $_GET['p-id'];

$query = "SELECT * FROM posts WHERE post_id = {$select_edit_post}";
$select_all_posts = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_all_posts)){
$post_id = $row['post_id'];
$post_author = $row['post_author'];
$post_title = $row['post_title'];
$post_category_id = $row['post_category_id'];
$post_status = $row['post_status'];
$post_image = $row['post_image'];
$post_tags = $row['post_tags'];
$post_content = $row['post_content'];
$post_comment_count = $row['post_comment_count'];
$post_date = $row['post_date'];
}
}

if(isset($_POST['update_post'])){
    $post_title =  $_POST['title'];
    $post_author =  $_POST['author'];
    $post_category_id =  $_POST['post_category'];
    $post_status =  $_POST['post_status'];

    $post_image = $_FILES['post_image']['name'];
    $post_image_temp = $_FILES['post_image']['tmp_name'];

    $post_tags =  $_POST['post_tags'];
    $post_content =  $_POST['post_content'];

    if(empty($post_image)){

        $query = "SELECT * FROM posts WHERE post_id = $select_edit_post";
        $selected_image_show = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($selected_image_show)){
        $post_image = $row['post_image'];
    }
    }
    move_uploaded_file($post_image_temp, "../img/$post_image");

    $query = "UPDATE posts SET ";
    $query .= "post_title = '{$post_title}', ";
    $query .= "post_author = '{$post_author}', ";
    $query .= "post_category_id = '{$post_category_id}', ";
    $query .= "post_date = now(), ";
    $query .= "post_status = '{$post_status}', ";
    $query .= "post_image = '{$post_image}', ";
    $query .= "post_tags = '{$post_tags}', ";
    $query .= "post_content = '{$post_content},' ";
    $query .= "WHERE post_id = '{$select_edit_post}' ";

    $update_selected_posts = mysqli_query($connection, $query);

    confirm_query($update_selected_posts);

}
?>
<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title ?>" type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <select class="form-select" name="post_category" id="">
<?php
$query = "SELECT * FROM categories";
$fetch_all_categories = mysqli_query($connection, $query);

confirm_query($fetch_all_categories);

while($row = mysqli_fetch_assoc($fetch_all_categories)){
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title']; 
echo "<option value='{$cat_id}'>{$cat_title}</option>";
}
?> 

        </select>
    </div>



    <div class="form-group">
        <label for="author">Post Author</label>
        <input value="<?php echo $post_author ?>" type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>
        <input value="<?php echo $post_status ?>" type="text" class="form-control" name="post_status">
    </div>

    <div class="form-group">
        <img width="100" src="../img/<?php echo $post_image ?>" alt="">
    </div>

    <div class="form-group">
        <input type="file" name="post_image">
    </div>
    
    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags ?>" type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content ?></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post"
        value="Update post">
    </div>

</form>