<?php
include('authentication.php');
include('middleware/superadminAuth.php');

if (isset($_POST['update_category'])) {
    $category_id = mysqli_real_escape_string($con, $_POST['category_id']);
    $name = mysqli_real_escape_string($con, $_POST['name']);
    
    $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']);
    $final_string = preg_replace('/-+/', '-', $string);
    $slug = $final_string;

    $description = mysqli_real_escape_string($con, $_POST['description']);
    $meta_title = mysqli_real_escape_string($con, $_POST['meta_title']);
    $meta_description = mysqli_real_escape_string($con, $_POST['meta_description']);
    $meta_keywords = mysqli_real_escape_string($con, $_POST['meta_keywords']);
    $navbar_status = mysqli_real_escape_string($con, $_POST['navbar_status'] == true ? '1' : '0');
    $status = mysqli_real_escape_string($con, $_POST['status'] == true ? '1' : '0');

    $query = "UPDATE categories SET name='$name',slug='$slug', description='$description', meta_title='$meta_title', meta_description='$meta_description', meta_keywords='$meta_keywords' ,navbar_status='$navbar_status', status='$status' WHERE id='$category_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = " Category updated successfully";
        header('Location: view-category.php');
        exit(0);
    } else {
        $_SESSION['message'] = "something is wrong";
        header('Location: category-add.php');
        exit(0);
    }
}

if (isset($_POST['category_delete'])) {
    $category_id = $_POST['category_delete'];
    
    $query = "UPDATE categories SET status='2' WHERE id='$category_id'";
    $query_run = mysqli_query($con, $query);
    
    if ($query_run) {
        $_SESSION['message'] = "Deleted Successfully";
        header('Location: view-category.php');
        exit(0);
    } else {
        $_SESSION['message'] = "something is wrong";
        header('Location: view-category.php');
        exit(0);
    }
}
/*if(isset($_POST['category_delete']))
{
    $category_id= $_POST['category_delete'];
    
    $query = "DELETE FROM categories WHERE id='$category_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Deleted Successfully";
        header('Location: view-category.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "something is wrong";
        header('Location: view-category.php');
        exit(0);
    }
}*/
?>