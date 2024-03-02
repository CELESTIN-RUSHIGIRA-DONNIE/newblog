<?Php
    include('authentication.php');
    include('includes/header.php');
?>
    <div class="container-fluid px-4">
        <h4 class="mt-4">Post</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Posts</li>
            <li class="breadcrumb-item">Post</li>
        </ol>
        <div class="row">
            <div class="col-md-12">

                <?php include('message.php'); ?>
                
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">View Post
                            <a href="post-add.php" class="btn btn-primary btn-sm float-end">Add post</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="myTable" class="table table-bordered table-stripe">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Name</th>
                                        <th>Category</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <?php if($_SESSION['auth_role']=='2'): ?>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                        //$posts = "SELECT * FROM posts WHERE status!='2' ";
                                        $posts = "SELECT p.*, c.name as cname FROM posts p,categories c WHERE c.id = p.category_id ";
                                        $posts_run = mysqli_query($con, $posts);

                                        if(mysqli_num_rows($posts_run) > 0)
                                        {
                                            foreach($posts_run as $item)
                                            {
                                                ?>
                                                    <tr>
                                                        <td><?= $item['id']; ?></td>
                                                        <td><?= $item['name']; ?></td>
                                                        <td><?= $item['cname']; ?></td>
                                                        <td class="text-center">
                                                        <img class="img-profile rounded-circle" src="../uploads/posts/<?= $item['image']; ?>" width="50px" height="50px" alt="<?= $item['name']; ?>">
                                                        </td>
                                                        <td>
                                                            <?= $item['status'] == '1'? 'hidden':'Visible'; ?>       
                                                        </td>
                                                        <?php if($_SESSION['auth_role']=='2'): ?>
                                                            <td>
                                                                <a href="post-edit.php?id=<?=$item['id'];?>" class="btn btn-success btn-sm">Edit</a>
                                                            </td>
                                                            <td>
                                                                <form action="code.php" method="POST">
                                                                    <button type="submit" name="post_delete" value="<?=$item['id']; ?>" class="btn btn-danger btn-sm">Delete</button>
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
                                                <td colspan="7" class="bg-danger text-white">Not record found</td>
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