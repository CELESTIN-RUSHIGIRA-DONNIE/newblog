<?Php
    include('authentication.php');
    include('includes/header.php');
?>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Total categories
                        <?php
                            $dash_category = "SELECT * FROM categories WHERE status!='2'";
                            $dash_category_run = mysqli_query($con, $dash_category);
                            if($categories_total = mysqli_num_rows($dash_category_run))
                            {
                                echo '<h4 class="mb-0">'.$categories_total.'</h4>';
                            }
                            else
                            {
                                echo '<h4 class="mb-0">0</h4>';
                            }
                        ?>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Total post
                        <?php
                            $dash_post = "SELECT * FROM posts";
                            $dash_post_run = mysqli_query($con, $dash_post);
                            if($posts_total = mysqli_num_rows($dash_post_run))
                            {
                                echo '<h4 class="mb-0">'.$posts_total.'</h4>';
                            }
                            else
                            {
                                echo '<h4 class="mb-0">0</h4>';
                            }
                        ?>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                 </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">total users
                        <?php
                            $dash_user = "SELECT * FROM users WHERE status!='2'";
                            $dash_user_run = mysqli_query($con, $dash_user);
                            if($user_total = mysqli_num_rows($dash_user_run))
                            {
                                echo '<h4 class="mb-0">'.$user_total.'</h4>';
                            }
                            else
                            {
                                echo '<h4 class="mb-0">0</h4>';
                            }
                        ?>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">total bolck users
                        <?php
                            $dash_user = "SELECT * FROM users WHERE status='1'";
                            $dash_user_run = mysqli_query($con, $dash_user);
                            if($user_total = mysqli_num_rows($dash_user_run))
                            {
                                echo '<h4 class="mb-0">'.$user_total.'</h4>';
                            }
                            else
                            {
                                echo '<h4 class="mb-0">0</h4>';
                            }
                        ?>
                    </div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?Php

    include('includes/footer.php');
    include('includes/scripts.php');

?>