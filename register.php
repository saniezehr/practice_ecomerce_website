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
       
    <div class="container p-5">
        <form action="" method="post">
            <div class="form-group">
              <label for="">User Name </label>
              <input  value="<?php
              echo $username ;?>" type="text" name="UserName" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-danger">
                <?php
                echo $usernameErr;
                ?>
              </small>
            </div>

            <div class="form-group">
              <label for="">User Email </label>
              <input  value="<?php echo $useremail ;?>" type="text" name="UserEmail" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-danger">
              <?php
                echo $useremailErr
                ?>
              </small>
            </div>

            <div class="form-group">
              <label for="">User Password </label>
              <input  value="<?php
              echo $userpass ;?>" type="text" name="userpass" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-danger">
              <?php
                echo $userpassErr;
                ?>
              </small>
            </div>

            <div class="form-group">
              <label for="">Confirm Password </label>
              <input  value="<?php
              echo $confirmpass ;?>"type="text" name="confirmpass" id="" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-danger">
              <?php
                echo $confirmpassErr;
                ?>
              </small>
            </div>
            <button class="btn btn-info" name="user_register">SUBMIT</button>
        </form>
    </div>
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"
        ></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"
        ></script>
    </body>
</html>
