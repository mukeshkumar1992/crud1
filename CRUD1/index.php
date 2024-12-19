<?php
session_start();
include "header.php";
?>

<style>
    #table2{
        border-collapse: collapse;
    }

    table, td, th {
        border: 1px solid black;
    }

    .bi{
        cursor: pointer;
    }

    .bi:hover{
        color:#ffc107;
        transition: 0.5s;
    }

    tbody {
    height: 80vh;       /* Just for the demo          */
    overflow-y: auto;    /* Trigger vertical scroll    */
    overflow-x: hidden;  /* Hide the horizontal scroll */
    }    
</style>

<!-- Viwe Model -->
<div class="modal fade" id="ViewUserModal" tabindex="-1" aria-labelledby="ViewUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="margin-top:5%">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light fw-bold">
                <h1 class="modal-title fw-bold fs-5" id="ViewUserModalLabel">View Employee Details</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="code.php" method="post">
                <div class="modal-body">
                    <div class="view-user-data">
                        
                    </div>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark fw-bold" data-bs-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Model -->
<div class="modal fade" id="EditUserModal" tabindex="-1" aria-labelledby="EditUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="margin-top:5%">
        <div class="modal-content">
        <div class="modal-header bg-dark text-light fw-bold">
                <h1 class="modal-title fs-5" id="InsertDataModalLabel">Edit Employee Record</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="code.php" method="POST">
                <div class="modal-body">
                    <!-- form -->
                    <div class="form-group">
                        <div class="row">
                            
                            <input type="hidden" class="form-control" name="id" id="id">
                            
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label fw-bold text-dark" name="">Emp_Id</label>
                                <input type="text" class="form-control" name="empId" id="empId">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="department" class="form-label fw-bold text-dark">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label fw-bold text-dark">Contact No</label>
                                <input type="number" class="form-control name" id="contactNo" name="contactNo">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="department" class="form-label fw-bold text-dark">Email Id</label>
                                <input type="mail" class="form-control" id="mail" name="mail">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="adress" class="form-label fw-bold text-dark">Adress</label>
                                <input type="text" class="form-control name" id="adress" name="adress">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="aadhar" class="form-label fw-bold text-dark">AadharCard No</label>
                                <input type="number" class="form-control" id="aadhar" name="aadhar">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="designation" class="form-label fw-bold text-dark">Designation</label>
                                <input type="text" class="form-control name" id="designation" name="designation">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="department" class="form-label fw-bold text-dark">Demartment</label>
                                <input type="text" class="form-control" id="department" name="department">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="dateofjoining" class="form-label fw-bold text-dark">Date of Joining</label>
                                <input type="date" class="form-control name" id="doj" name="doj">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="dob" class="form-label fw-bold text-dark">Date of birth</label>
                                <input type="date" class="form-control" id="dob" name="dob">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="time" class="form-label fw-bold text-dark">In</label>
                                <input type="time" class="form-control name" id="timein" name="timein">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="time" class="form-label fw-bold text-dark">Out</label>
                                <input type="time" class="form-control" id="timeout" name="timeout">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="Gender" class="form-label fw-bold text-dark">Gender</label>
                                <select class="form-control" name="gender" id="gender">
                                    <option>--select--</option>
                                    <option value="Male" class="form-control">Male</option>
                                    <option value="Female" class="form-control">Female</option>
                                </select>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="message" class="form-label fw-bold text-dark">Message</label>
                                <input type="text" class="form-control" id="message" name="message">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark fw-bold" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="updatebtn" class="btn btn-warning fw-bold">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Insert-Modal -->
<div class="modal fade" id="InsertDataModal" tabindex="-1" aria-labelledby="InsertDataModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="margin-top:8%">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light fw-bold">
                <h1 class="modal-title fs-5" id="InsertDataModalLabel">Add New Employee</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="code.php" name="myForm" onsubmit="return validateForm()" method="post">
                <div class="modal-body">
                    <!-- form -->
                    <div class="form-group">
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label fw-bold text-dark" name="">Emp_Id</label>
                                <input type="text" class="form-control" name="empId" id="empid" requried>
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="department" class="form-label fw-bold text-dark">Name</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="name" class="form-label fw-bold text-dark">Contact No</label>
                                <input type="number" class="form-control name" id="number" name="contactNo">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="department" class="form-label fw-bold text-dark">Email Id</label>
                                <input type="mail" class="form-control" id="mail" name="mail">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="adress" class="form-label fw-bold text-dark">Adress</label>
                                <input type="text" class="form-control name" id="adress" name="adress">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="department" class="form-label fw-bold text-dark">AadharCard No</label>
                                <input type="number" class="form-control" id="adharno" name="aadhar">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="designation" class="form-label fw-bold text-dark">Designation</label>
                                <input type="text" class="form-control name" id="designation" name="designation">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="department" class="form-label fw-bold text-dark">Demartment</label>
                                <input type="text" class="form-control" id="department" name="department">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="dateofjoining" class="form-label fw-bold text-dark">Date of Joining</label>
                                <input type="date" class="form-control name" id="designation" name="doj">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="department" class="form-label fw-bold text-dark">Date of birth</label>
                                <input type="date" class="form-control" id="department" name="dob">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="time" class="form-label fw-bold text-dark">In</label>
                                <input type="time" class="form-control name" id="time" name="timein">
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="time" class="form-label fw-bold text-dark">Out</label>
                                <input type="time" class="form-control" id="time" name="timeout">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="Gender" class="form-label fw-bold text-dark">Gender</label>
                                <select class="form-control" name="gender">
                                    <option>--select--</option>
                                    <option value="Male" class="form-control">Male</option>
                                    <option value="Female" class="form-control">Female</option>
                                </select> 
                            </div>

                            <div class="col-md-6 mb-3">
                                <label for="message" class="form-label fw-bold text-dark">Message</label>
                                <input type="text" class="form-control" id="time" name="message">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark fw-bold" data-bs-dismiss="modal">Close</button>
                    <button type="submit" name="submit" class="btn btn-warning fw-bold">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Delete Model -->
<div class="modal fade" id="dltUserModal" tabindex="-1" aria-labelledby="dltUserModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="margin-top:12%">
        <div class="modal-content">
            <div class="modal-header bg-dark text-light fw-bold">
                <h1 class="modal-title fw-bold fs-5" id="dltUserModalLabel">Delete Record</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="code.php" method="post">
                <div class="modal-body">
                <input type="hidden" name="hfid" id="dlt" class="form-control">
                    <h2 class="bg-warning text-dark p-2">
                        Are You Sure !! <br> You Want To Delete This Employee Record Data...?
                    </h2>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark fw-bold" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="deletePermanent()" name="dltbtn" class="btn btn-danger fw-bold">Yes Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!--main content-->
<section class="box">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 p-5">
            <!--message status-->
            <?php
                if(isset($_SESSION['status']) && ($_SESSION['status']) !='')
                {
            ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>user!</strong> <?php echo $_SESSION['status']; ?>
                        <button type="button" class="btn-close text-light" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

            <?php
                    unset($_SESSION['status']);
                }
            ?>
            <!--message status End-->

                <div class="card">
                    <div class="card-header bg-dark text-light fw-bold">
                        <h1>Medical Hospital Department Employee
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-warning fw-bold float-end mt-2" data-bs-toggle="modal" data-bs-target="#InsertDataModal">
                                Add New Employee
                            </button>
                        </h1>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover" id="table2">
                            <thead>
                                <tr>
                                <th class="bg-dark text-warning fw-bold text-center" scope="col">Id</th>
                                    <th class="bg-dark text-warning fw-bold text-center" scope="col">Emp_Id</th>
                                    <th class="bg-dark text-warning fw-bold text-center" scope="col">Name</th>
                                    <th class="bg-dark text-warning fw-bold text-center" scope="col">Contact No</th>
                                    <th class="bg-dark text-warning fw-bold text-center" scope="col">E-mail</th>
                                    <th class="bg-dark text-warning fw-bold text-center" scope="col">Address</th>
                                    <th class="bg-dark text-warning fw-bold text-center" scope="col">Adharcard No</th>
                                    <th class="bg-dark text-warning fw-bold text-center" scope="col">Designation</th>
                                    <th class="bg-dark text-warning fw-bold text-center" scope="col">Department</th>
                                    <th class="bg-dark text-warning fw-bold text-center" scope="col">DOJ</th>
                                    <th class="bg-dark text-warning fw-bold text-center" scope="col">DOB</th>
                                    <th class="bg-dark text-warning fw-bold text-center" scope="col">Time In</th>
                                    <th class="bg-dark text-warning fw-bold text-center" scope="col">TimeOut</th>
                                    <th class="bg-dark text-warning fw-bold text-center" scope="col">Gender</th>
                                    <th class="bg-dark text-warning fw-bold text-center" scope="col">Message</th>
                                    <th class="bg-dark text-warning fw-bold text-center" scope="col">Action</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                                <?php 
                                    $connection = mysqli_connect("localhost","root","","crud");
                                    $Fetch_query = "SELECT * FROM hospital";
                                    $Fetch_query_run = mysqli_query($connection, $Fetch_query);

                                    if(mysqli_num_rows($Fetch_query_run ) > 0)
                                    {
                                        while ($row = mysqli_fetch_array($Fetch_query_run))
                                        {
                                ?>
                                        <tr>
                                        <td class="userid"><?php echo $row ['id']; ?></td>
                                            <td><?php echo $row ['empId']; ?></td>
                                            <td><?php echo $row ['name']; ?></td>
                                            <td><?php echo $row ['contactNo']; ?></td>
                                            <td><?php echo $row ['mail']; ?></td>
                                            <td><?php echo $row ['adress']; ?></td>
                                            <td><?php echo $row ['aadhar']; ?></td>
                                            <td><?php echo $row ['designation']; ?></td>
                                            <td><?php echo $row ['department']; ?></td>
                                            <td><?php echo $row ['doj']; ?></td>
                                            <td><?php echo $row ['dob']; ?></td>
                                            <td><?php echo $row ['timein']; ?></td>
                                            <td><?php echo $row ['timeout']; ?></td>
                                            <td><?php echo $row ['gender']; ?></td>
                                            <td><?php echo $row ['message']; ?></td>
                                            <td class="gap-2 text-center fw-bold fs-5">
                                                <a href="#" class="nav-link"><i class="bi bi-eye-fill fw-bold  viewbtn"></i></a>
                                                <a href="#" class="nav-link"><i class="bi bi-pencil-fill fw-bold  editbtn"></i> </a>
                                                <a href="#" onclick="getDeletePop(<?php echo $row ['id']; ?>)" class="nav-link"><i class="bi bi-archive-fill fw-bold"></i></a>
                                            </td>
                                        </tr>
                                <?php        
                                        }
                                    }
                                    else{
                                ?>
                                        <tr colspan="4">No Record Found</tr>  
                                <?php      
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--main content END-->

<?php include "footer.php"; ?>
<script>
// ViewButton
    $(document).ready(function () {
        $('.viewbtn').click(function (e) { 
            e.preventDefault();
            var user_id = $(this).closest('tr').find('.userid').text();
            
            $.ajax({
                method: "POST",
                url: "code.php",
                data: {
                    'click_view_btn': true,
                    'userid':user_id,
                },
                success: function (response) {
                     console.log(response);
                     $('.view-user-data').html(response);
                     $('#ViewUserModal').modal('show');
                }
            });
        });
    });

// EditButton
    $(document).ready(function () {
        $('.editbtn').click(function (e) { 
            e.preventDefault();
            var user_id = $(this).closest('tr').find('.userid').text();
            console.log(user_id);
             $.ajax({
                 method: "POST",
                 url: "code.php",
                 data: {
                     'click_edit_btn': true,
                     'userid':user_id,
                 },
                 success: function (response) {
                      console.log(response);
                      $.each(response, function (key, value) {
                         $('#id').val(value['id']); 
                         $('#empId').val(value['empId']); 
                         $('#name').val(value['name']);
                         $('#contactNo').val(value['contactNo']);
                         $('#mail').val(value['mail']);
                         $('#adress').val(value['adress']);
                         $('#aadhar').val(value['aadhar']);
                         $('#designation').val(value['designation']);
                         $('#department').val(value['department']);
                         $('#doj').val(value['doj']);
                         $('#dob').val(value['dob']);
                         $('#timein').val(value['timein']);
                         $('#timeout').val(value['timeout']);
                         $('#gender').val(value['gender']);
                         $('#message').val(value['message']);

                         
                        });
                    //   $('.edit-user-data').html(response);
                       $('#EditUserModal').modal('show');
                 }
             });
        });
    });

    function getDeletePop(id){
        $('#dlt').val(id);
        $('#dltUserModal').modal('show');
    }
// deleteWORK
    function deletePermanent(){
        var user_id = $('#dlt').val();
        
        $.ajax({
            method: "POST",
            url: "code.php",
            data: {
                'click_dlt_btn' : true, 
                'userid':user_id,
            },
            success: function (response) {
                window.location="index.php";
            }
        });
    }


    function validateForm() {
  let x = document.forms["myForm"]["empId"].value;
  if (x == "") {
    alert("Employee Id must be filled out");
    return false;
  }

  let y = document.forms["myForm"]["name"].value;
  if (y == "") {
    alert("Employee Name must be filled out");
    return false;
  }

}
    
</script>