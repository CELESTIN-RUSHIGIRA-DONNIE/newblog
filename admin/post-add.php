<?Php
    include('authentication.php');
    include('includes/header.php');
?>
    <div class="container-fluid px-4">
        <h4 class="mt-4">Post</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item">Post</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Post
                            <a href="view-post.php" class="btn btn-danger btn-sm float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <form action="code.php" method="POST" enctype="multipart/form-data">
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
                                                    <option value="<?= $categoryitem['id'] ?>"><?= $categoryitem['name'] ?></option>
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
                                <input type="text" name="name" required class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Slug (Link)</label>
                                <input type="text" name="slug" required class="form-control">
                            </div>
                            
                            <div class="col-md-12 mb-3">
                                <label for="">Description</label>
                                <textarea name="description" id="your_summernote" required max="200" rows="4" class="form-control"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <label for="">Meta Title</label>
                                <input type="text" name="meta_title" required class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Meta Description</label>
                                <textarea name="meta_description" required max="200" class="form-control"></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Meta Keyword</label>
                                <textarea name="meta_keyword" required max="200" class="form-control"></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Image</label>
                                <input type="file" name="image"  class="form-control">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status"  width="70px" height="70px"/>
                                Checked = Hidden, Unchecked = Visible
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" name="post_add" class="btn btn-success btn-sm">Save now</button>
                            </div>

                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?Php

    include('includes/footer.php');
    include('includes/scripts.php');

?>