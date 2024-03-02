<?Php
    include('authentication.php');
    include('includes/header.php');
?>
    <div class="container-fluid px-4">
        <h4 class="mt-4">Category</h4>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
            <li class="breadcrumb-item">Category</li>
        </ol>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add Category
                            <a href="view-category.php" class="btn btn-danger btn-sm float-end">Back</a>
                        </h4>
                    </div>
                    <div class="card-body">
                    <form action="code.php" method="POST">
                        <div class="row">
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
                                <textarea name="description" required max="200" rows="4" class="form-control"></textarea>
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
                                <label for="">Meta Keywords</label>
                                <textarea name="meta_keywords" required max="200" class="form-control"></textarea>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Navbar status</label>
                                <input type="checkbox" name="navbar_status"  width="70px" height="70px"/>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="">Status</label>
                                <input type="checkbox" name="status"  width="70px" height="70px"/>
                            </div>

                            <div class="col-md-12 mb-3">
                                <button type="submit" name="category_add" class="btn btn-success btn-sm">Add now</button>
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