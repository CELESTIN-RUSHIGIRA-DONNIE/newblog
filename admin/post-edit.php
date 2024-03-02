<?Php
    include('authentication.php');
    include('includes/header.php');
?>
    <div class="container-fluid px-4">
        <h4 class="mt-4">Edit Post</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item">Edit post</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Edit Post</h4>
                    </div>
                    <div class="card-body">
                        <?php 
                            if(isset($_GET['id']))
                            {
                                $posts_id = $_GET['id'];
                                $posts = "SELECT * FROM posts WHERE id ='$posts_id'";
                                $posts_run = mysqli_query($con, $posts);

                                if(mysqli_num_rows($posts_run) > 0)
                                {
                                        $post_row = mysqli_fetch_array($posts_run)
                                    
                                        ?>
                                            <form action="code.php" method="POST" enctype="multipart/form-data">
                                                <input type="hidden" name="post_id" value="<?= $post_row['id']; ?>">
                                                <div class="row">
                                                    <div class="col-md-12 mb-3">
                                                        <label for="">Category ID</label>
                                                        <?php
                                                            $category = "SELECT * FROM categories WHERE status='0' ";
                                                            $category_run = mysqli_query($con,$category);

                                                            if(mysqli_num_rows($category_run) > 0)
                                                            {
                                                                ?>
                                                                <select name="category_id" required class="form-control">
                                                                    <option value="">--Select Category--</option>
                                                                    <?php
                                                                        foreach($category_run as $categoryitem)
                                                                        {
                                                                        ?>
                                                                            <option value="<?= $categoryitem['id'] ?>"<?= $categoryitem['id'] == $post_row['category_id']? 'selected':'' ?>>
                                                                                <?= $categoryitem['name'] ?>
                                                                            </option>
                                                                        <?php
                                                                        }
                                                                    ?>
                                                                </select>
                                                                <?php
                                                            }
                                                            else
                                                            {
                                                                ?>
                                                                    <h5>No category availlable</h5>
                                                                <?php
                                                            }
                                                        ?>
                                                        
                                                    </div>
                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Name</label>
                                                        <input type="text" name="name" value="<?= $post_row['name']; ?>" class="form-control">
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Slug</label>
                                                        <input type="text" name="slug" value="<?= $post_row['slug']; ?>" class="form-control">
                                                    </div>

                                                    <div class="col-md-12 mb-3">
                                                        <label for="">Description</label>
                                                        <textarea type="text" id="your_summernote" name="description" class="form-control"><?= htmlentities($post_row['description']); ?></textarea>
                                                    </div>
                                                    <div class="col-md-12 mb-3">
                                                        <label for="">Meta title</label>
                                                        <input name="meta_title" type="text" value="<?= $post_row['meta_title']; ?>" class="form-control">
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="">meta description</label>
                                                        <textarea name="meta_description" max="200" rows="4"  class="form-control"><?= $post_row['meta_description']; ?></textarea>
                                                    </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="">meta Keywords</label>
                                                        <textarea name="meta_keyword" max="200" rows="4"  class="form-control"><?= $post_row['meta_keyword']; ?></textarea>
                                                    </div>

                                                    <div class="col-md-12 mb-3">
                                                        <label for="">Image</label>
                                                        <input type="hidden" name="old_image" value="<?= $post_row['image']; ?>"/>
                                                        <input type="file" name="image" class="form-control">
                                                      </div>

                                                    <div class="col-md-6 mb-3">
                                                        <label for="">Status</label>
                                                        <input type="checkbox" name="status" <?= $post_row['status'] =='1'? 'checked':'' ?> width="70px" height="70px"/>
                                                    </div>

                                                    <div class="col-md-12 mb-3">
                                                        <button type="submit" name="update_post" class="btn btn-success btn-sm">Update</button>
                                                    </div>

                                                </div>
                                            </form>
                                        <?php

                                    

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