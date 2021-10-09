    <!-- Header -->
    <?php include 'includes/admin_header.php' ?>

    <!-- /#navigation -->
    <?php include 'includes/admin_navigation.php' ?>

    <!-- Content -->
<div id="page-wrapper">

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                Blank Page
                <small>Subheading</small>
            </h1>


            <div class="col-sm-6">
        <?php
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
        ?>
                <form action="" method="post">
                    <div class="form-group">
                        <label for="cat-title">Add Category</label>
                        <input type="text" class="form-control" name="cat_title">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add">
                    </div>
                </form>

        <?php
        if(isset($_GET['update'])){
        $cat_id = $_GET['update'];

        include 'includes/edit_categories.php';
        }
        ?>
            </div>

            <div class="col-sm-6">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Category Title</th>
                        </tr>
                    </thead>
                    <tbody>
        <?php   //fetch query for table
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
        ?>

        <?php //delete query
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
        ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- /.row -->

</div>
<!-- /.container-fluid -->

</div>
<!-- /#page-wrapper -->

</div>
    <!-- footer -->
    <?php include 'includes/admin_footer.php' ?>