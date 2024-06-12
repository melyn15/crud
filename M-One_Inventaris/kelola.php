<!DOCTYPE html>

<?php
 include 'koneksi.php';

 $id = '';
 $product= '';
 $items = '';
 $category = '';
 $price = '';

    if(isset($_GET['ubah'])){
      $id = $_GET['ubah'];
      
      $query ="SELECT * FROM product WHERE id = '$id';";
      $sql = mysqli_query($conn, $query);

      $result = mysqli_fetch_assoc($sql);

      $product= $result['product_name'];
      $items = $result['items'];
      $category = $result['category'];
      $price = $result['price'];
     
      // var_dump($result);
      // die();
    }
  ?>
<html>
    <head charset="utf-8">
        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-3">
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
                    <a class="nav-link" href="#">Logout</a>
                  </li>
                </ul>
              </div>
            </div>
          </nav>
          <div class="container">
            <form method="POST" action="proses.php" enctype="multipart/form-data">
              <input type="hidden" value="<?php  echo $id; ?>" name="id">
              <div class="mb-3 row">
                  <label for="product" class="col-sm-2 col-form-label">
                      Product
                  </label>
                  <div class="col-sm-10">
                    <input required type="text" name="product_name" class="form-control" id="product" placeholder="Product Name" value="<?php echo $product ?>">
                  </div>
              </div>
              <div class="mb-3 row">
                <label for="items" class="col-sm-2 col-form-label">
                    Items
                </label>
                <div class="col-sm-10">
                  <input required type="text" name="items" class="form-control" id="items" placeholder="Input Item" value="<?php echo $items ?>">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="category" class="col-sm-2 col-form-label">
                  Category
                </label>
                <div class="col-sm-10">
                  <select required id="category" name="category" class="form-select">
                    <option selected>Chose Category</option>
                    <option <?php if($category == 'Perlengkapan bengkel'){ echo "selected";} ?> value="Perlengkapan bengkel">Perlengkapan bengkel</option>
                    <option <?php if($category == 'Alat Kebersihan'){ echo "selected";} ?> value="Alat kebersihan">alat kebersihan</option>
                    <option <?php if($category == 'Tempat duduk'){ echo "selected";} ?> value="Tempat duduk">Tempat duduk</option>
                    <option <?php if($category == 'Meja'){ echo "selected";} ?> value="Meja">Meja</option>
                  </select>
                </div>
              </div>
              <div class="mb-3 row">
                <label for="price" class="col-sm-2 col-form-label">
                    Price
                </label>
                <div class="col-sm-10">
                  <input required type="text" name="price" class="form-control" id="price" placeholder="Input Price"value="<?php echo $price ?>">
                </div>
              </div>
              <div class="mb-3 row">
                <label for="image" class="col-sm-2 col-form-label">
                    Images
                </label>
                <div class="col-sm-10">
                  <input <?php if(!isset($_GET['ubah'])){ echo "required";} ?> class="form-control" type="file" name="image" id="image"accept="image/*">
                </div>
              </div>

              <div class="mb-3 row mt-4">
                <div class="col" >
                  <?php
                    if(isset($_GET['ubah'])){
                  ?>
                  <button type="submit" name="aksi" value="edit" class="btn btn-primary">
                    <i class="fas fa-save"></i>
                    Simpan Perubahan
                  </button>
                <?php
                      } else{
                ?>
                    <button type="submit" name="aksi" value="add"  class="btn btn-primary">
                      <i class="fas fa-save"></i>
                      Tambahkan
                    </button>
                <?php
                      }
                ?>
                  <a href="index.php" type="button" class="btn btn-danger">
                    <i class="fas fa-long-arrow-alt-left"></i>
                    Batal
                  </a>
                </div>
            </form>
            </div>
          </div>
        <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>