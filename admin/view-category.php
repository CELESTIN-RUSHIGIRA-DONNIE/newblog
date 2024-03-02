<?Php
    include('authentication.php');
    include('includes/header.php');
?>
    <div class="container-fluid px-4">
        <h4 class="mt-4">Categories</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item">Categories</li>
        </ol>
        <div class="row">
            <div class="col-md-12">

                <?php include('message.php'); ?>
                
                <div class="card">
                    <div class="card-header">
                        <h4>View Categories
                            <a href="category-add.php" class="btn btn-primary btn-sm float-end">Add category</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-stripe">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>status</th>
                                        <?php if($_SESSION['auth_role'] == '2'): ?>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        <?php endif;?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        $category = "SELECT * FROM categories WHERE status!='2' ";
                                        $category_run = mysqli_query($con, $category);

                                        if(mysqli_num_rows($category_run) > 0)
                                        {
                                            foreach($category_run as $item)
                                            {
                                                ?>
                                                    <tr>
                                                        <td><?= $item['id']; ?></td>
                                                        <td><?= $item['name']; ?></td>
                                                        <td>
                                                            <?= $item['status'] == '1'? 'hidden':'Visible'; ?>       
                                                        </td>
                                                        <?php if($_SESSION['auth_role'] == '2'): ?>
                                                            <td>
                                                                <a href="category-edit.php?id=<?=$item['id'];?>" class="btn btn-success btn-sm">Edit</a>
                                                            </td>
                                                            <td>
                                                                <form action="code-superadmin.php" method="POST">
                                                                    <button type="submit" name="category_delete" value="<?=$item['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
                                                                </form>
                                                            </td>
                                                        <?php endif; ?>
                                                    </tr>
                                                <?php
                                            }

                                        }
                                        else
                                        {
                                            ?>
                                            <tr>
                                                <td>
                                                    <td colspan="6" class="bg-danger">Not record found</td>
                                                </td>
                                            </tr>

                                            <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?Php

    include('includes/footer.php');
    include('includes/scripts.php');

?>