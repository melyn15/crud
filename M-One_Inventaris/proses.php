<?php
    include 'koneksi.php';
    include 'fungsi.php';
    
    if(isset($_POST['aksi'])){
        if($_POST['aksi'] == "add"){
            
            $product = $_POST['product_name'];
            $items = $_POST['items'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $image = $_FILES['image']['name'];

            $dir = "images/";
            $tmpFile = $_FILES['image']['tmp_name'];

            move_uploaded_file($tmpFile, $dir.$foto);

            // die();

            $query = "INSERT INTO product VALUES(null, null, null, null, '$product', '$items', '$category', '$price', '$image')";
            $sql = mysqli_query($conn, $query);

            if($sql){
                header("location: index.php");
                // echo "Data Berhasil Ditambahkan <a href='index.php'>[Home]</a>";
            } else {
                echo $query;
            }

            // echo $product." | ".$items." | ".$category." | ".$price." | ".$foto;

            // echo "<br>Tambah Data <a href='index.php'>[Home]</a>";
        } else if($_POST['aksi'] == "edit"){
            // echo "Edit Data <a href='index.php'>[Home]</a>";
            // var_dump($_POST);
            $id = $_POST['id'];
            $product = $_POST['product_name'];
            $items = $_POST['items'];
            $category = $_POST['category'];
            $price = $_POST['price'];

            $queryShow = "SELECT * FROM product WHERE id = '$id';";
            $sqlShow = mysqli_query($conn, $queryShow);
            $result = mysqli_fetch_assoc($sqlShow);

            if($_FILES['image']['name'] == ""){
                $image = $result['image'];
            } else {
                $image = $_FILES['image']['name'];
                unlink("images/".$result['image']);
                move_uploaded_file($_FILES['image']['tmp_name'], 'images/'.$_FILES['image']['name']);
            }

            $query = "UPDATE product SET product_name='$product', items='$items', category='$category', price='$price', image = '$image'  WHERE id='$id';";
            $sql = mysqli_query($conn, $query);
            header("location: index.php");
        }
    }

    if(isset($_GET['hapus'])){
        $id = $_GET['hapus'];

        $queryShow = "SELECT * FROM product WHERE id = '$id';";
        $sqlShow = mysqli_query($conn, $queryShow);
        $result = mysqli_fetch_assoc($sqlShow);

        // var_dump($result);

        unlink("images/".$result['image']);

        // die();

        $query = "DELETE FROM product WHERE id = '$id';";
        $sql = mysqli_query($conn, $query);

        if($sql){
            header("location: index.php");
            // echo "Data Berhasil Ditambahkan <a href='index.php'>[Home]</a>";
        } else {
            echo $query;
        }
        // echo "Hapus Data <a href='index.php'>[Home]</a>";
    }
?>