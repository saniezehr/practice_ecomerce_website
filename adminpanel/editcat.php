<?php
include('query.php');
include('header.php');

?>
<?php
if(isset($_GET['id'])){
$cId = $_GET['id'];
$query = $pdo ->prepare("select * from categories where id = :catId");
$query ->bindParam("catId" ,$cId);
$query -> execute();
$cat = $query -> fetch(PDO::FETCH_ASSOC);
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0-11/css/all.min.css">
<link rel="stylesheet" href="style.css">
<title>Title</title>
</head>
<body>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded pt-5 justify-content-center mx-0">
                    <div class="col-md-6 ">
                  <form action="" method="post" enctype="multipart/form-data">

                    <div class="form-group">
                      <label for="">NAME</label>
                      <input type="text" name="c_name" value="<?php
                      echo $cat ['name'];
                      ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-danger">
                        <?php
                        echo $cNameerr ;
                        ?>
                      </small>
                    </div>

                    <div class="form-group">
                      <label for="">DESC</label>
                      <input type="text" name="c_desc" id=""value="<?php
                      echo  $cat ['description'];
                      ?>" class="form-control" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-danger">
                      <?php
                        echo $cDescerr ;
                        ?>
                      </small>
                    </div>

                    <div class="form-group">
                      <label for="">IMAGE</label>
                      <input type="file" name="c_image" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-danger">
                      <?php
                        echo $imgNameerr ;
                        ?>
                      </small>
                      <img height="100px" src="img/<?php echo  $cat['image']?>" alt="">
                    </div>

                    <button class="btn btn-info" name ="update">Update Category</button>
                  </form>
                    </div>
                </div>
            </div>
            <!-- Blank End -->



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.15.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

<?php
include('footer.php');
?>