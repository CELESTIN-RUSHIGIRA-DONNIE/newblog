<?Php
    include('authentication.php');
    include('includes/header.php');
?>
    <div class="container-fluid px-4">
        <h4 class="mt-4">Edit category</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item">Edit category</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Category</h4>
                    </div>
                    <div class="card-body">
                        <?php 
                            if(isset($_GET['id']))
                            {
                                $category_id = $_GET['id'];
                                $category = "SELECT * FROM categories WHERE id ='$category_id'";
                                $category_run = mysqli_query($con, $category);

                                if(mysqli_num_rows($category_run) > 0)
                                {
                                    foreach($category_run as $user)
                                    {
                                        ?>
                                            <form action="code-superadmin.php" method="POST">
                                                <input type="hidden" name="category_id" value="<?= $user['id']; ?>">
                                                <div class="row">
                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Name</label>
                                                        <input type="text" name="name" value="<?= $user['name']; ?>" class="form-control">
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Slug</label>
                                                        <input type="text" name="slug" value="<?= $user['slug']; ?>" class="form-control">
                                                    </div>

                                                    <div class="col-md-12 mb-3">
                                                        <label for="">Description</label>
                                                        <input type="text" name="Description" value="<?= $user['description']; ?>" class="form-control">
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="">Meta title</label>
                                                        <input name="meta_title" type="text" value="<?= $user['meta_title']; ?>" class="form-control">
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="">meta description</label>
                                                        <textarea name="meta_title" max="200" rows="4"  class="form-control"><?= $user['meta_description']; ?></textarea>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="">meta Keywords</label>
                                                        <textarea name="meta_keywords" max="200" rows="4"  class="form-control"><?= $user['meta_keywords']; ?></textarea>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Navbar Status</label>
                                                        <input type="checkbox" name="navbar_status" <?= $user['navbar_status'] =='1'? 'checked':'' ?> width="70px" height="70px"/>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Status</label>
                                                        <input type="checkbox" name="status" <?= $user['status'] =='1'? 'checked':'' ?> width="70px" height="70px"/>
                                                    </div>

                                                    <div class="col-md-12 mb-3">
                                                        <button type="submit" name="update_category" class="btn btn-success btn-sm">Update</button>
                                                    </div>

                                                </div>
                                            </form>
                                        <?php

                                    }

                                }
                                else
                                {
                                    ?>
                                        <h4>No record Found</h4>
                                    <?php

                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?Php

    include('includes/footer.php');
    include('includes/scripts.php');

?>