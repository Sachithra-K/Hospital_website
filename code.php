<?php


session_start();
require 'dbcon.php';

if (isset($_POST['delete_patient']))

    {

        $patient_id = mysqli_real_escape_string($con, $_POST['delete_patient']);

        $query = "DELETE FROM  patient WHERE id='$patient_id'";
        $query_run = mysqli_query($con, $query);

        if($query_run)

        {
            $_SESSION['message'] = "Your Details Deleted Successfully";
            header("Location: patient-portal.php");
            exit(0);

        }
        else
        {

            $_SESSION['message'] = "Your Details Not Deleted";
        header("Location: patient-portal.php");
        exit(0);
         }


        }



    



if (isset($_POST['update_patient']))
{
    $patient_id = mysqli_real_escape_string($con, $_POST['patient_id']);

    $name = mysqli_real_escape_string($con, $_POST['name']);
    $age = mysqli_real_escape_string($con, $_POST['age']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);

    $query = "UPDATE patient SET name='$name', age='$age', phone='$phone', email='$email' WHERE id='$patient_id'";

    $query_run = mysqli_query($con, $query);

    if ($query_run)
    

    {
        $_SESSION['message'] = "Your Details Updated Successfully";
        header("Location: patient-portal.php");
        exit(0);
    }

    else
    {
        $_SESSION['message'] = "Your Details Not Updated";
        header("Location: patient-portal.php");
        exit(0);
    }



}




if(isset($_POST['save_patient']))

{

 $name = mysqli_real_escape_string($con, $_POST['name']);
 $age = mysqli_real_escape_string($con, $_POST['age']);
 $phone = mysqli_real_escape_string($con, $_POST['phone']);
 $email = mysqli_real_escape_string($con, $_POST['email']);

$query = "INSERT INTO patient (name,age,phone,email) VALUES ('$name','$age','$phone','$email')";

$query_run = mysqli_query($con, $query);

if ($query_run)

    {
        $_SESSION['message'] = "Your Details Recorded Successfully";
        header("Location: registration.php");
        exit(0);

    }
else 
    {
        $_SESSION['message'] = "Your Details Not Recorded ";
        header("Location: registration.php");
        exit(0);
    }      




}




?>