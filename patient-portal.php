<?php

session_start();
require 'dbcon.php';

?>

<!doctype html>
<html lang="en">
  <head>

  <meta name="copyright" content="MACode ID, https://macodeid.com/">
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

          .view:hover {
            color: #25BE50;
        }
  
        .update:hover {
            color: #BE8025;
        }
  
        .del:hover {
            color: red;
        }
    </style>

  </head>
  <body class="bg">

   
    <div class="container mt-2">

    <?php   include('message.php');  ?>

      <div class="col-md-12 container" style="position:relative; left:1000px;">
      <a href="index.php" class="btn btn-light  del" data-toggle="tooltip" data-placement="top" title="Go Back"><i class="fa-solid fa-arrow-left"></i></a>
      </div>
      <br>
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header ">
              <h4>Patient Details
              <a href="registration.php" class="btn float-end" style="color:white; background-color:#00d9a5">Registration</a>
              </h4>
            </div>
            <div class="card-body">
            <table class="table table-hover">
                        <thead>
                          <tr>
                            
                            <th >Patient Name</th>
                            <th >Age</th>
                            <th >Phone Number</th>
                            <th >E-mail Address</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>

                          <?php 
                                $query = "SELECT * FROM patient";
                                $query_run = mysqli_query($con, $query);

                                if (mysqli_num_rows($query_run) > 0)
                                {
                                  
                                  foreach($query_run as $patients)
                                  {
                                    //echo $patients ['name'];
                                      ?>
                                        <tr>
                                          <td><?= $patients['name']; ?>   </td>
                                          <td><?= $patients['age']; ?>   </td>
                                          <td><?= $patients['phone']; ?>   </td>
                                          <td><?= $patients['email']; ?>   </td>
                                          <td>
                                          <a href="registration-view.php?id=<?= $patients['id']; ?>" data-toggle="tooltip" data-placement="top" title="View Infor" class="view"><i class="fa-solid fa-eye" style="margin-right:3px;"></i></a>
                                          <a href="registration-update.php?id=<?= $patients['id']; ?>" data-toggle="tooltip" data-placement="top" title="Update Infor" class="update"><i class="fa-solid fa-pen-to-square" style="margin-right:3px;"></i></a>
                                        </tr>

                                      <?php

                                  }

                                }

                                else {

                                    echo "<h5>No Record Found</h5>";

                                }

                          ?>

                         </tbody>
                      </table>
            </div>
          </div>
        </div>
      </div>
    </div>   







    <script src="https://kit.fontawesome.com/457a315592.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
  </body>
</html>
