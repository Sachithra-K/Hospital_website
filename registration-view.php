<?php

session_start();

require 'dbcon.php';

?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hospital</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" rel="stylesheet">
   
<style>


    .bg {

    background:no-repeat url("img/bg.jpg");
    background-size: cover;

    }


    a i {
        transition: all 0.3s linear;
    }

    a:hover i {
        transform: scale(1.5);
    }

    
    .del:hover {
        color: red;
    }
</style>

</head>
  <body class="bg">
    
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-6 container">
                    <div class="card">
                      <div class="card-header">
                        <h4> <img src="img\registry.png" width="25px" height="25px" class="mb-2" alt="">Patient Registry - Details
                                <a href="patient-portal.php" class="btn btn-ight del float-end" data-toggle="tooltip" data-placement="top" title="Go Back"><i class="fa-solid fa-arrow-left"></i></a> 
                        </h4>
                    </div>
                    <div class="card-body">

                            <?php

                            if(isset($_GET['id']))
                            {
                                
                            $patient_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM patient WHERE id ='$patient_id' ";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0)

                                {
                                    $patients = mysqli_fetch_array($query_run);
                                    //print_r($patients);
                                    ?>
                                                    
                          <form action="code.php" method="POST">

                    


                            <div class="mb-3 mt-2">
                                <label>Patient Name</label>
                                <p class="form-control"><?= $patients['name'];?></p>
                            </div>
                            <div class="mb-3 ">
                                <label>Age</label>
                                <p class="form-control"><?= $patients['age'];?></p>
                             </div>
                            <div class="mb-3 ">
                                <label>Phone Number</label>
                                <p class="form-control"><?= $patients['phone'];?></p>
                            </div>
                            <div class="mb-2 ">
                                <label>E-mail Address</label>
                                <p class="form-control"><?= $patients['email'];?></p>
                            </div>
                            

                        </form>

                        <?php

                    }

                    else
                    {

                    echo "<h4> No Such ID Found</h4>";

                    }
                    
                }

                ?>

                    </div>
                </div>
            </div>
        </div>









        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/457a315592.js" crossorigin="anonymous"></script>
    </body>
</html>
