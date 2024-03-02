<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Favicons
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon"> -->
    
    <!-- <title>Document</title> -->
    <title><?php if(isset($page_title)){ echo "$page_title";}else{echo "Donnie web site";} ?></title>
    
    <meta name="description" content="<?php if(isset($meta_description)){echo "$meta_description";}?>"/>
    <meta name="keywords" content="<?php if(isset($meta_keywords)){echo "$meta_keywords";}?>"/>
    <meta name="author" content="Donnie web"/>
    <style>
        .navbar {
            padding: 0px;

        }

        .nav-link {
            border-right: 1px solid #fff;
            padding: 8px 20px !important;
        }
        .underline{
            height: 4px;
            width: 50px;
            background-color: red;
            margin-bottom: 20px;

        }
    </style>
    <link rel="stylesheet" href="assets/css/custom.css">
    <link rel="stylesheet" href="assets/css/bootstrap5.min.css">

</head>

<body>