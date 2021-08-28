<?php
    include 'config_seller.php';
    session_start();
    
    if (!isset($_SESSION['username'])) {
        header("Location: login_admin.php");
    }

    if(isset($_POST['update']))
    {
        $ProductID = $_GET['ID'];
        $Name = $_POST['product_name'];
        $Price = $_POST['product_price'];
        $Category = $_POST['product_category'];
        $Email = $_POST['email_address'];
        $Description = $_POST['product_description'];
        $Image = $_FILES['product_imagepath'];

        $ofile_name = $_FILES['product_imagepath']['name'];
        $tmp_location = $_FILES['product_imagepath']['tmp_name'];

        $file_type = substr($ofile_name, strpos($ofile_name, '.'), strlen($ofile_name));
        $file_path = "assets/";
        $nfile_name = time().$file_type;
        
        if(is_uploaded_file($_FILES['product_imagepath']['tmp_name'])){
            if(move_uploaded_file($tmp_location, $file_path.$nfile_name)){
                $sql = "UPDATE products_table SET product_name = '".$Name."', product_price = '".$Price."', seller_email = '".$Email."', product_category = '".$Category."', product_description = '".$Description."', product_image = '".$nfile_name."' WHERE product_id = '".$ProductID."' ";
                $result = mysqli_query($conn,$sql);

                if($result){
                    echo "<script>alert('Update Successful.')</script>";
                    echo '<script>window.location = "view_posts_admin.php"</script>';
                }else{
                    echo "<script>alert('Update Failed.')</script>";
                }
            }
        }
    }else{
        header("location:view_posts_admin.php");
    }


?>