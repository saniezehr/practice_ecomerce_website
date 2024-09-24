<?php
include('query.php');
include('header.php');

?>
<?php
if(isset($_GET['id'])){
$pId = $_GET['id'];
$query = $pdo ->prepare("select products.*, categories.id as catId ,categories.name as catName from products inner join categories on products.c_id = categories.id where products.id =:pid");
$query ->bindParam("pid" ,$pId);
$query -> execute();
$prod = $query -> fetch(PDO::FETCH_ASSOC);
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
                      <input type="text" name="p_name" value="<?php
                      echo $prod['name'];
                      ?>" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-danger">
                        <?php
                        echo $p_nameErr ;
                        ?>
                      </small>
                    </div>

                    <div class="form-group">
                      <label for="">DESC</label>
                      <input type="text" name="p_desc" id=""value="<?php
                      echo  $prod['des'];
                      ?>" class="form-control" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-danger">
                      <?php
                        echo  $p_descErr  ;
                        ?>
                      </small>
                    </div>
                    
                    <div class="form-group">
                      <label for="">QUANTITY</label>
                      <input type="text" name="p_qty" id=""value="<?php
                      echo  $prod['qty'];
                      ?>" class="form-control" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-danger">
                      <?php
                        echo  $p_qtyErr  ;
                        ?>
                      </small>
                    </div>
                    <div class="form-group">
                      <label for="">PRICE</label>
                      <input type="text" name="p_price" id=""value="<?php
                      echo  $prod['price'];
                      ?>" class="form-control" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-danger">
                      <?php
                        echo  $p_priceErr  ;
                        ?>
                      </small>
                    </div>
                    
                    

                    <div class="form-group">
                      <label for="">IMAGE</label>
                      <input type="file" name="p_image" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-danger">
                      <?php
                        echo  $p_imgErr  ;
                        ?>
                      </small>
                      <img height="100px" src="img/<?php echo  $prod['image']?>" alt="">
                    </div>

                    <div class="form-group ">
                      <label for="" >Categories</label>
                    <select class="form-control" name="c_id" id="">
                        <option value="<?php echo $prod['catId']?>"><?php echo $prod['catName']?></option>
            <?php
            $query = $pdo -> prepare("select * from categories where name != :cname");
            $query -> bindParam('cname' , $prod['catName']);
            $query -> execute();
            $allCategories = $query ->fetchAll(PDO::FETCH_ASSOC);
            foreach($allCategories as $cat) {
            ?>
            <option value="<?php echo $cat['id']?>">
                <?php echo $cat['name']?>
            </option>
            <?php
            }
            ?>
            
                    </select>
                    <small id="helpId" class="text-danger">
                      <?php
                        echo $c_idErr ;
                        ?>
                      </small>
                    </div>
                    <button class="btn btn-info" name ="updateproduct">Update Products</button>
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