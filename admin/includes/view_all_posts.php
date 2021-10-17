<table class="table table-bordered table-hover">
                <thead>
                    <th>Id</th>
                    <th>Author</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Status</th>
                    <th>Image</th>
                    <th>Tags</th>
                    <th>Comments</th>
                    <th>Date</th>
                    </tr>
                </thead>
                <tbody>
<?php
$query = 'SELECT * FROM posts';
$select_all_posts = mysqli_query($connection, $query);

while($row = mysqli_fetch_assoc($select_all_posts)){
$post_id = $row['post_id'];
$post_author = $row['post_author'];
$post_title = $row['post_title'];
$post_category_id = $row['post_category_id'];
$post_status = $row['post_status'];
$post_image = $row['post_image'];
$post_tags = $row['post_tags'];
$post_comment_count = $row['post_comment_count'];
$post_date = $row['post_date'];

echo "<tr>";
echo "<td>{$post_id}</td>";
echo "<td>{$post_author}</td>";
echo "<td>{$post_title}</td>";

$query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
$fetch_all_categories = mysqli_query($connection, $query);

confirm_query($fetch_all_categories);

while($row = mysqli_fetch_assoc($fetch_all_categories)){
$cat_id = $row['cat_id'];
$cat_title = $row['cat_title']; 

echo "<td>$cat_title</td>";

}
echo "<td>{$post_status}</td>";
echo "<td><img width='100' src='../img/{$post_image}' alt='image'></td>";
echo "<td>{$post_tags}</td>";
echo "<td>{$post_comment_count}</td>";
echo "<td>{$post_date}</td>";
echo "<td><a href='posts.php?source=edit_posts&p-id={$post_id}'>edit</td>";
echo "<td><a href='posts.php?delete={$post_id}'>Delete</td>";
echo "</tr>";
}
?>
<?php
if(isset($_GET['delete'])){
    $delete_id = $_GET['delete'];

    $query = "DELETE FROM posts ";
    $query .= "WHERE post_id = $delete_id ";

    $delete_selected_post_id = mysqli_query($connection, $query);
}
?>
                </tbody>
            </table>