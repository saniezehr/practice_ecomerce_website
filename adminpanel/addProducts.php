<?php
include('query.php');
include('header.php');

?>


<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">

<title>Title</title>
</head>
<body>

<!-- Blank Start -->
<div class="container-fluid pt-4 px-4">
                <div class="row vh-100 bg-light rounded  justify-content-center pt-5 mx-0">
                    <div class="col-md-6 ">
                  <form method="post" enctype="multipart/form-data">

                    <div class="form-group">
                      <label for="">NAME</label>
                      <input type="text" name="p_name" value="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-danger">
                        <?php
                        echo $p_nameErr ;
                        ?>
                      </small>
                    </div>

                    <div class="form-group">
                      <label for="">DESC</label>
                      <input type="text" name="p_desc" id=""value="" class="form-control" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-danger">
                      <?php
                        echo $p_descErr ;
                        ?>
                      </small>
                    </div>

                    <div class="form-group">
                      <label for="">QTY</label>
                      <input type="text" name="p_qty" id=""value="" class="form-control" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-danger">
                      <?php
                        echo $p_qtyErr ;
                        ?>
                      </small>
                    </div>


                    <div class="form-group">
                      <label for="">PRICE</label>
                      <input type="text" name="p_price" id=""value="" class="form-control" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-danger">
                      <?php
                        echo $p_priceErr ;
                        ?>
                      </small>
                    </div>

                    <div class="form-group">
                      <label for="">IMAGE</label>
                      <input type="file" name="p_image" id="" class="form-control" placeholder="" aria-describedby="helpId">
                      <small id="helpId" class="text-danger">
                      <?php
                        echo $p_imgErr ;
                        ?>
                      </small>
                    </div>

                    <div class="form-group ">
                      <label for="" >Categories</label>
                    <select class="form-control" name="c_id" id="">
                        <option value="" > Select Categories</option>
            <?php
            $query = $pdo -> query("select * from categories");
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

                    <button class="btn btn-info" name="addProduct">ADD PRODUCT</button>
                  </form>
                    </div>
                </div>
            </div>
            <!-- Blank End -->



</body>
</html>

<?php
include('footer.php');
?>