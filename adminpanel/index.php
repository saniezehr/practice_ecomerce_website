<?php
include('query.php');
include('header.php');
if(!isset($_SESSION['adminEmail'])){
    echo "<script>location.assign('../login.php')</script>";
}
?>


            <!-- Sale & Revenue Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Sale</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Sale</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Today Revenue</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-light rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Total Revenue</p>
                                <h6 class="mb-0">$1234</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


         


            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">REGISTER</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col"><input class="form-check-input" type="checkbox"></th>
                                    <th scope="col">NO</th>
                                    <th scope="col">NAME</th>
                                    <th scope="col">EMAIL</th>
                                    <th scope="col">PASSWORD</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query  = $pdo -> query ("select * from user where name != 'admin'");
                                $alluser = $query -> fetchAll(PDO :: FETCH_ASSOC);
                                // print_r($alluser);
                                foreach ($alluser as $user){
                                ?>
                                <tr>
                                    <td><input class="form-check-input" type="checkbox"></td>
                                    <td><?php echo $user['id']?></td>
                                    <td><?php echo $user['name']?></td>
                                    <td><?php echo $user['email']?></td>
                                    <td><?php echo $user['password']?></td>
                                    <td>Paid</td>
                                    <td><a class="btn btn-sm btn-primary" href="">Detail</a></td>
                                </tr>
                               <?php
                                }
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->





           <?php
           include("footer.php");
           ?>