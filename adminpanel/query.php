<?php
include('../dbcon.php');
session_start();

//add category 
$cName = $cDesc= $imgName ="";
$cNameerr = $cDescerr= $imgNameerr ="";

if(isset($_POST['add_category'])){
    $cName = $_POST['c_name'];
    $cDesc = $_POST['c_desc'];
    $imgName = $_FILES['c_image']['name'];
 
//validation
    if(empty ($cName)){
        $cNameerr = "name is required";
    }
    if(empty ($cDesc)){
        $cDescerr = "description  is required";
    }
    if(empty ($imgName)){
        $imgNameerr = "image is required";
    }
    else{
        $format = ["jpeg" ,"png" , "jpg","webp"];
        $extension = pathinfo($imgName ,PATHINFO_EXTENSION);
        if(!in_array($extension,$format)){
            $imgNameerr = "invalid";
        }
    
    }

    if(empty ($cNameerr) && empty ($cDescerr) && empty ($imgNameerr)){
     $destination = "img/". $imgName;  
     $imgTmpName = $_FILES['c_image']['tmp_name'];
    if(move_uploaded_file($imgTmpName,$destination))
    {
$query = $pdo->prepare("insert into categories (name, description ,image ) values(:name,:desc,:img)");
$query ->bindParam(":name" , $cName);
$query ->bindParam(":desc" , $cDesc);
$query ->bindParam(":img" , $imgName);

$query -> execute();
echo "<script>alert('category added successfully');location.assign('viewCategory.php')</script>";

    }

}
};

//updated 
//with out image 
if(isset($_POST['update'])){
    $cId = $_GET['id'];
    $cName = $_POST['c_name'];
    $cDesc = $_POST['c_desc'];
$query = $pdo-> prepare("update categories set name = :cname , description = :cdesc where id = :cId");
 
//image

if(isset($_FILES['c_image'])){
$imagename = $_FILES['c_image']['name'];
$imagetmpname = $_FILES['c_image']['tmp_name'];
$destination = "img/".$imagename ;
$extension = pathinfo($imagename, PATHINFO_EXTENSION);
$format =["jpg" ,"png" ,"webp","jpeg"];
if(in_array($extension, $format)){
    if(move_uploaded_file($imagetmpname,$destination)){
        $query =$pdo ->prepare('update categories set name = :cname , description = :cdesc , image = :cimage where id = :cId');
$query ->bindParam('cimage' ,$imagename);
    }
}
}
$query ->bindParam('cname' ,$cName);
$query ->bindParam('cdesc' ,$cDesc);
$query ->bindParam('cId' , $cId);
$query -> execute();
echo "<script>alert('categories updated successfully');location.assign('viewcategory.php')</script>";


}





// delete

if(isset($_GET['cId'])){
    $cId = $_GET['cId'];
  $query = $pdo-> prepare("delete from categories where id = :cId");
  $query->bindParam("cId" , $cId);
  $query -> execute();
  echo "<script>alert('categories deleted successfully');location.assign('viewcategory.php')</script>";

  
  }

  //add  product 

  $p_name = $p_desc = $p_qty = $p_price = $p_img = $c_id ="";
  $p_nameErr = $p_descErr = $p_qtyErr = $p_priceErr = $p_imgErr = $c_idErr ="";

  if(isset($_POST['addProduct'])){
    $p_name = $_POST['p_name'];
    $p_desc = $_POST['p_desc'];
    $p_qty = $_POST['p_qty'];
    $p_price = $_POST['p_price'];
    $p_img = $_FILES['p_image']['name'];
    $c_id = $_POST['c_id'];
    // echo "<script>alert('".$p_img."');</script>";  
    //validation
    if (empty($p_name)){
        $p_nameErr = "product name is required";
    }
    
    if (empty($p_desc)){
        $p_descErr = "product name is required";
    }

    if (empty($p_qty)){
        $p_qtyErr = "product name is required";
    }

    if (empty($p_price)){
        $p_priceErr = "price name is required";
    }

    if (empty($c_id)){
        $c_idErr = "category name is required";
    }
  
        $format =["jpg" ,"png" ,"jpeg"];
        $extention =pathinfo($p_img,PATHINFO_EXTENSION);
        if (!in_array($extention,$format)){
            $p_imgErr ="invalid extension ";
    
  }


  if(empty($p_nameErr) && empty($p_descErr) && empty($p_qtyErr) && empty($p_priceErr) && empty($p_imgErr) && empty($c_idErr)){
    $destination = "img/".$p_img;  
    $p_imgTmpName = $_FILES['p_image']['tmp_name'];
    echo "<script>alert('".$p_name."');</script>"; 
   if(move_uploaded_file($p_imgTmpName,$destination))
   {
$query = $pdo->prepare("insert into products (name, des,qty , price ,image ,c_id ) values(:name,:des,:qty,:price, :img, :c_id )");
$query ->bindParam('name', $p_name);
$query ->bindParam('des',$p_desc);
$query ->bindParam('qty',$p_qty);
$query ->bindParam('price',$p_price);
$query ->bindParam('img',$p_img);
$query ->bindParam('c_id',$c_id);
$query -> execute();
echo "<script>alert('product added successfully');location.assign('viewproducts.php')</script>";

   }

}
  };
  //updated product
//with out image 
if(isset($_POST['updateproduct'])){
    $pId = $_GET['id'];
    $pName = $_POST['p_name'];
    $pDesc = $_POST['p_desc'];
    $pQty = $_POST['p_qty'];
    $pPrice = $_POST['p_price'];
    $c_id = $_POST['c_id'];

$query = $pdo-> prepare("update products set name = :pname , des = :pdesc  , qty = :pqty  , price = :pprice,  c_id = :cat  where id = :pId");
 
//image

if(isset($_FILES['p_image'])){
$pimagename = $_FILES['p_image']['name'];
$pimagetmpname = $_FILES['p_image']['tmp_name'];
$destination = "img/".$pimagename ;
$extension = pathinfo($pimagename, PATHINFO_EXTENSION);
$format =["jpg" ,"png" ,"webp","jpeg"];
if(in_array($extension, $format)){
    if(move_uploaded_file($pimagetmpname,$destination)){
        $query =$pdo ->prepare("update products set name = :pname , des = :pdesc ,qty = :pqty, price = :pprice , image = :pimg, c_id = :cat where id = :pId");
$query ->bindParam('pimg' ,$pimagename);
    }
}
}
$query ->bindParam('pname' ,$pName);
$query ->bindParam('pdesc' ,$pDesc);
$query ->bindParam('pqty' ,$pQty);
$query ->bindParam('pprice' ,$pPrice);
$query ->bindParam('cat' ,$c_id);
$query ->bindParam('pId' , $pId);
$query -> execute();
echo "<script>alert('products updated successfully');location.assign('viewproducts.php')</script>";


}
//delete
if(isset($_GET['pId'])){
    $pId = $_GET['pId'];
  $query = $pdo-> prepare("delete from products where id = :pId");
  $query->bindParam("pId" , $pId);
  $query -> execute();
  echo "<script>alert('products deleted successfully');location.assign('viewproducts.php')</script>";

  
  }


?>