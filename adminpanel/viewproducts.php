<?php
include('query.php');
include('header.php');
?>
<?php
//delete


?>
    <style>
        .categoimg{
            height: 100px
        }
        thead{
    background-color :   #009CFF;
color :  #F3F6F9;
        }
        table{
            border :8px solid #009CFF;
        }
    </style>

      <!-- Blank Start -->
      <div class="container-fluid px-4">
                <div class="row vh-100 bg-light rounded  justify-content-center mx-0">
                    <div class="col-md-10 text-center">
                    <table class="table text-start table-bordered table-hover mb-0 mt-5">
                        <h2>CATEGORIES</h2>
                            <thead>
                                <tr class="text-dark">
                                <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">ID</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">DESC</th>
                                    <th scope="col">IMAGE-NAME</th>
                                    <th scope="col">IMAGE</th>
                                </tr>
                            </thead>

                            <tbody>
                                <?php
                                $query = $pdo -> query("select products.*, categories.id as catId ,categories.name as catname from products inner join categories on products.c_id = categories.id ");
                                $products = $query -> fetchAll(PDO :: FETCH_ASSOC);
                                foreach($products as $user){
                                ?>
                                <tr>
                                <td><input class="form-check-input" type="checkbox"></td>
                                    <td><?php echo $user ['id']?></td>
                                    <td><?php echo $user ['name']?></td>
                                    <td><?php echo $user ['des']?></td>
                                    <td><?php echo $user ['qty']?></td>
                                    <td><?php echo $user ['price']?></td>
                                    <td><?php echo $user ['image']?></td>
                                    <td><?php echo $user ['c_id']?></td>

                                    <td>
                                        <img class="categoimg"src="img/<?php echo $user ['image']?>" alt="">
                                    </td>
                                <td>
                                        <a href="editpro.php?id=<?php echo $user['id']?>" class="btn btn-info" name="update"> Edit</a>
                                        
                            
                                        <a href="?pId=<?php echo $user['id']?>" class="btn btn-danger" onclick="return confirm('do you want to delete ?')">Delete</a>
                                    </td>
                                </tr>
                                <?php
                                };
                                ?>
</tbody>
</table>
                    </div>
                </div>
            </div>
            <!-- Blank End -->
      

<?php
include('footer.php');
?>