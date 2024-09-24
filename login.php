<?php
include('query.php');
?>
<!doctype html>
<html lang="en">
    <head>
        <title>Title</title>
        <!-- Required meta tags -->
        <meta charset="utf-8" />
        <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
        />

        <!-- Bootstrap CSS v5.2.1 -->
        <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
            crossorigin="anonymous"
        />
    </head>

    <body>
        
    <div class="containerv p-5">
        <div class="col-7">
            <form action="" method="post">
            <div class="form-group">
              <label for="">Email:-</label>
              <input type="text"  name="userEmail" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-danger"><?php
              echo $u_emailErr;
              ?></small>
            </div>

            <div class="form-group">
              <label for="">Password:-</label>
              <input type="text" name="userPass" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-danger"><?php
              echo $u_passErr;
              ?></small>
            </div>
            <button name="userLogin" class="btn btn-info">LOGIN</button>
        </div>
    </div>
</form>
     
    </body>
</html>
