<?php 
session_start();
$connection = mysqli_connect("localhost","root","","crud");

// saveRecord
if(isset($_POST['submit']))
{
    $empId = $_POST['empId'];
    $name = $_POST['name'];
    $contactNo = $_POST['contactNo'];
    $mail = $_POST['mail'];
    $adress = $_POST['adress'];
    $aadhar = $_POST['aadhar'];
    $designation = $_POST['designation'];
    $department = $_POST['department'];
    $doj = $_POST['doj'];
    $dob = $_POST['dob'];
    $timein = $_POST['timein'];
    $timeout = $_POST['timeout'];
    $gender = $_POST['gender'];
    $message = $_POST['message'];
    $creat_at = $_POST['creat_at'];

    $insert_query = "INSERT INTO hospital (empId,name,contactNo,mail,adress,aadhar,designation,department,doj,dob,timein,timeout,gender,message,creat_at) VALUES 
    ('$empId','$name','$contactNo','$mail','$adress','$aadhar','$designation','$department','$doj','$dob','$timein','$timeout','$gender','$message',NOW())";

    $insert_query_run = mysqli_query($connection, $insert_query);

    if($insert_query_run)
    {
        $_SESSION['status'] = 'Data Insert Successfully';
        header("location:index.php");
    }

    else
    {
        $_SESSION['status'] = 'Data Insert Failled';
        header("location:index.php");
    }

}

// viewRecord
if(isset($_POST['click_view_btn']))
{
    $id = $_POST['userid'];
    $Fetch_query = "SELECT * FROM hospital WHERE id = '$id'";
    $Fetch_query_run = mysqli_query($connection, $Fetch_query);

    if(mysqli_num_rows($Fetch_query_run ) > 0)
        {
            while ($row = mysqli_fetch_array($Fetch_query_run)){
            echo '
            <tr>
                <td class="bg-dark text-warning fw-bold p-2" style="width:20%">User Id</td>
                <td class="text-dark fw-bold ms-3" style="width:100% !important">'.$row['id'].'</td>
            </tr>

            <tr>
                <td class="bg-dark text-warning fw-bold p-2">Employee Id</td>
                <td class="text-dark fw-bold ms-3">'.$row['empId'].'</td>
            </tr>

            <tr>
                <td class="bg-dark text-warning fw-bold p-2">Name</td>
                <td class="text-dark fw-bold ms-3">'.$row['name'].'</td>
            </tr>
            
            <tr>
                <td class="bg-dark text-warning fw-bold p-2">Contact No</td>
                <td class="text-dark fw-bold ms-3">'.$row['contactNo'].'</td>
            </tr>    
            
            <tr>
                <td class="bg-dark text-warning fw-bold p-2">Mail Id</td>
                <td class="text-dark fw-bold ms-3">'.$row['mail'].'</td>
            </tr>

            <tr>
                <td class="bg-dark text-warning fw-bold p-2">Address</td>
                <td class="text-dark fw-bold ms-3">'.$row['adress'].'</td>
            </tr>
                
            <tr>
                <td class="bg-dark text-warning fw-bold p-2">Aadhar Card No</td>
                <td class="text-dark fw-bold ms-3">'.$row['aadhar'].'</td>
            </tr>
                
            <tr>
                <td class="bg-dark text-warning fw-bold p-2">Designation</td>
                <td class="text-dark fw-bold ms-3">'.$row['designation'].'</td>
            </tr>    

            <tr>
                <td class="bg-dark text-warning fw-bold p-2">Department</td>
                <td class="text-dark fw-bold ms-3">'.$row['department'].'</td>
            </tr>

            <tr>
                <td class="bg-dark text-warning fw-bold p-2">Date of Joining</td>
                <td class="text-dark fw-bold ms-3">'.$row['doj'].'</td>
            </tr>
                
            <tr>
                <td class="bg-dark text-warning fw-bold p-2">Date of Birth</td>
                <td class="text-dark fw-bold ms-3">'.$row['dob'].'</td>
            </tr>    
            
            <tr>
                <td class="bg-dark text-warning fw-bold p-2">Shift Time In</td>  
                <td class="text-dark fw-bold ms-3">'.$row['timein'].'</td>
            </tr>

            <tr>
                <td class="bg-dark text-warning fw-bold p-2">Shift Time Out</td>  
                <td class="text-dark fw-bold ms-3">'.$row['timeout'].'</td>
            </tr>
                
            <tr>
                <td class="bg-dark text-warning fw-bold p-2">Gender</td>  
                <td class="text-dark fw-bold ms-3">'.$row['gender'].'</td>
            </tr> 
            
            <tr>
                <td class="bg-dark text-warning fw-bold p-2">Message</td>  
                <td class="text-dark fw-bold ms-3">'.$row['message'].'</td>
            </tr>
           ';
        }
}
    else
    {
        echo $result ='<h2>No Record Found</h2>';
    }
}

// EditRecord
if(isset($_POST['click_edit_btn']))
{
    $id = $_POST['userid'];
    $arrayresult = [];

    $Fetch_query = "SELECT * FROM hospital WHERE id = '$id'";
    $Fetch_query_run = mysqli_query($connection, $Fetch_query);

    if(mysqli_num_rows($Fetch_query_run ) > 0)
        {
            while ($row = mysqli_fetch_array($Fetch_query_run)){
            array_push($arrayresult, $row);
            header('content-type: application/json');
            echo json_encode($arrayresult);
        }
}
    else
    {
        echo $result ='<h2 class="bg-dark text-warning fw-bold p-2">No Record Found</h2>';
    }
}

//updateWork
if(isset($_POST['updatebtn']))
{
    $id = $_POST['id'];
    $empId = $_POST['empId'];
    $name = $_POST['name'];
    $contactNo = $_POST['contactNo'];
    $mail = $_POST['mail'];
    $adress = $_POST['adress'];
    $aadhar = $_POST['aadhar'];
    $designation = $_POST['designation'];
    $department = $_POST['department'];
    $doj = $_POST['doj'];
    $dob = $_POST['dob'];
    $timein = $_POST['timein'];
    $timeout = $_POST['timeout'];
    $gender = $_POST['gender'];
    $message = $_POST['message'];

    $update_query = "UPDATE hospital SET empId='$empId', name='$name', contactNo='$contactNo', mail='$mail', adress='$adress', aadhar='$aadhar', designation='$designation', department='$department', doj='$doj', dob='$dob', timein='$timein', timeout='$timeout', gender='$gender', message='$message' WHERE id='$id'";
     
    $update_query_run = mysqli_query($connection, $update_query);

    if($update_query_run)
    {
        $_SESSION['status'] = 'Record Update Successfully';
        header("location:index.php");
    }

    else
    {
        $_SESSION['status'] = 'Data Update Failled';
        header("location:index.php");
    }
}

//deleteWork
 if(isset($_POST['click_dlt_btn']))
 {
     $id = $_POST['userid'];
     $delete_query = "DELETE FROM hospital WHERE id= '$id'";
     $delete_query_run = mysqli_query($connection, $delete_query);
    
 }
?>