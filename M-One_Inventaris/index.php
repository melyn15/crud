<?php
    include 'koneksi.php';
    
    $query =  "SELECT * FROM product;";
    $sql = mysqli_query($conn, $query);
    $no = 0;
    
?>

<!DOCTYPE html>
<html>
    <head charset="utf-8">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
              <a class="navbar-brand" href="#">PHP | CRUD</a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item">
                    <a class="nav-link active" href="#">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">About</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="login/login_form.php">Logout</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <div class="container">
            <h1>Data Inventaris</h1>
            <hr>
            <figure>
                <blockquote class="blockquote">
                  <p>Berisi data yang telah disimpan di database.</p>
                </blockquote>
                <figcaption class="blockquote-footer">
                  CRUD <cite title="Source Title">Create Read Update Delate</cite>
                  <hr>
                </figcaption>
              </figure>
              <a href="kelola.php" type="button" class="btn btn-primary btn-sm">
                <i class="fas fa-user-plus"></i>
                Tambah Data</a>
              <button type="button" class="btn btn-success btn-sm">
                <i class="fas fa-file-alt"></i>
                Export Ke Exel</button>
              <div class="table-responsive">
                <br>
                <table class="table align-middle table-bordered table-hover">
                    <thead table-dark>
                      <tr>
                        <th><center>No.</center></th>
                        <th>Product</th>
                        <th>Items</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Images</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        <?php
                            while($result = mysqli_fetch_assoc($sql)){
                        ?>
                        <tr>
                            <td><center>
                                <?php echo ++$no; ?>.
                            </center></td>
                            <td>
                                <?php echo $result['product_name']; ?>
                            </td>
                            <td>
                                <?php echo $result['items']; ?>
                            </td>
                            <td>
                                <?php echo $result['category']; ?>
                            </td>
                            <td>
                                <?php echo $result['price']; ?>
                            </td>
                            <td>
                                <img src="img/<?php echo $result['image']; ?>" style="width: 100px;">
                            </td>
                            <td>
                                <a href="kelola.php?ubah=<?php echo $result['id']; ?>" type="button" class="btn btn-success btn-sm">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="proses.php?hapus=<?php echo $result['id']; ?>" type="button" class="btn btn-danger btn-sm" onClick="return confirm('Tenan pora???')">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    <?php
                        }
                    ?>
                    </tbody>
                </table>
                </div>
          </div>
        <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>