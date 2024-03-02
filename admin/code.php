<?php
include('authentication.php');

//==========================================

if (isset($_POST['Add_user'])) {
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $lname = mysqli_real_escape_string($con, $_POST['lname']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $role_as = mysqli_real_escape_string($con, $_POST['role_as']);
    $status = mysqli_real_escape_string($con, $_POST['status'] == true ? '1' : '0');

    $user_query = "INSERT INTO users (fname,lname,email,password,role_as,status) VALUES ('$fname','$lname','$email','$password','$role_as','$status')";
    $user_query_run = mysqli_query($con, $user_query);

    if ($user_query_run) {
        $_SESSION['message'] = "Registered success";
        header('Location: view-register.php');
        exit(0);
    } else {
        $_SESSION['message'] = "something is wrong";
        header('Location: register.php');
        exit(0);
    }
}

if (isset($_POST['update_user'])) {
    $user_id = $_POST['user_id'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role_as = $_POST['role_as'];
    $status = $_POST['status'] == true ? '1' : '0';

    $query = "UPDATE users SET fname='$fname',lname='$lname', email='$email', password='$password', role_as='$role_as', status='$status' WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Updating successfully";
        header('Location: view-register.php');
        exit(0);
    }
}

if (isset($_POST['user_delete'])) {
    $user_id = $_POST['user_delete'];

    $query = "DELETE FROM users WHERE id='$user_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Deleted Successfully";
        header('Location: view-register.php');
        exit(0);
    } else {
        $_SESSION['message'] = "something is wrong";
        header('Location: view-register.php');
        exit(0);
    }
}

//===========================================

if (isset($_POST['category_add'])) {
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

    $category_query = "INSERT INTO categories (name,slug,description,meta_title,meta_description,meta_keywords,navbar_status,status) VALUES ('$name','$slug','$description','$meta_title','$meta_description','$meta_keywords','$navbar_status','$status')";
    $category_query_run = mysqli_query($con, $category_query);

    if ($category_query_run) {
        $_SESSION['message'] = " Category added successfully";
        header('Location: view-category.php');
        exit(0);
    } else {
        $_SESSION['message'] = "something is wrong";
        header('Location: category-add .php');
        exit(0);
    }
}


//==============================================

if (isset($_POST['post_add'])) {
    $category_id = $_POST['category_id'];
    $name = $_POST['name'];
    
    $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']);
    $final_string = preg_replace('/-+/', '-', $string);
    $slug = $final_string;

    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];
    $image = $_FILES['image']['name'];
    //rename this image
    $image_extension = pathinfo($image, PATHINFO_EXTENSION);
    $filename = time() . '.' . $image_extension;

    $status = $_POST['status'] == true ? '1' : '0';

    $query = "INSERT INTO posts (category_id,name,slug,description,meta_title,meta_description,meta_keyword,status,image) VALUES('$category_id','$name','$slug','$description','$meta_title','$meta_description','$meta_keyword','$status', '$filename')";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/posts/' . $filename);
        $_SESSION['message'] = "Post created Successfully";
        header('Location: post-add.php');
        exit(0);
    } else {
        $_SESSION['message'] = "something is wrong";
        header('Location: view-post.php');
        exit(0);
    }
}

if (isset($_POST['update_post'])) {
    $post_id = $_POST['post_id'];

    $category_id = $_POST['category_id'];
    $name = $_POST['name'];

    $string = preg_replace('/[^A-Za-z0-9\-]/', '-', $_POST['slug']);
    $final_string = preg_replace('/-+/', '-', $string);
    $slug = $final_string;
    
    $description = $_POST['description'];
    $meta_title = $_POST['meta_title'];
    $meta_description = $_POST['meta_description'];
    $meta_keyword = $_POST['meta_keyword'];

    $old_filename = $_POST['old_image'];
    $image = $_FILES['image']['name'];

    $update_filename = "";
    if ($image != NULL) {
        //rename this image
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $filename = time() . '.' . $image_extension;

        $update_filename = $filename;
    } else {
        $update_filename = $old_filename;
    }

    $status = $_POST['status'] == true ? '1' : '0';

    $query = "UPDATE posts SET category_id='$category_id', name='$name',slug='$slug',description='$description',meta_title='$meta_title', meta_description='$meta_description', meta_keyword='$meta_keyword', image='$update_filename', status='$status' WHERE id='$post_id' ";
    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        if ($image != NULL) {
            if (file_exists('../uploads/posts/' . $old_filename)) {
                unlink("../uploads/posts/" . $old_filename);
            }
            move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/posts/' . $update_filename);
        }
        $_SESSION['message'] = "Updated Successfully";
        header('Location: view-post.php');
        exit(0);
    } else {
        $_SESSION['message'] = "something is wrong";
        header('Location: view-post.php');
        exit(0);
    }
}

if (isset($_POST['post_delete'])) {
    $post_id = $_POST['post_delete'];

    $check_img_query = "SELECT * FROM posts WHERE id='$post_id' LIMIT 1";
    $img_res = mysqli_query($con,$check_img_query);
    $res_data = mysqli_fetch_array($img_res);
    $image = $res_data['image'];

    $query = "DELETE FROM posts WHERE id='$post_id'";
    $query_run = mysqli_query($con, $query);

    if ($query_run) 
    {
        if ($image != NULL)
         {
            if (file_exists('../uploads/posts/' .$image)) 
            {
                unlink("../uploads/posts/" .$image);
            }
        }
        $_SESSION['message'] = "Post deleted successfully";
        header('Location: view-post.php');
        exit(0);
    } else {
        $_SESSION['message'] = "something is wrong";
        header('Location: view-post.php');
        exit(0);
    }
}
