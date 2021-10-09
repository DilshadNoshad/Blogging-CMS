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
<!-- insert -->
<?php insert_categories() ?>

                <form action="" method="post">
                    <div class="form-group">
                        <label for="cat-title">Add Category</label>
                        <input type="text" class="form-control" name="cat_title">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" name="submit" value="Add">
                    </div>
                </form>
<!-- Update and include Query -->
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
<!-- fetch query for table -->
<?php ShowAllCategories(); ?>

<!-- delete -->
<?php DeleteCategories(); ?>
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