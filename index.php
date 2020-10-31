<?php 
    include('connect_db.php');
    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>


<style>
     body {
            background: url('https://images.unsplash.com/photo-1546387903-6d82d96ccca6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1651&q=80');
        }

    .wrapper {
    width: 650px;
    margin: 30px auto;
    padding: 0;
    border: 1px solid #b8c4de;
    background: white;
    border-radius: 0px 0px 10px 10px ; /*บนซ้าย,บนขวา=0 ล่างซ้าย=10 ล่างขวา=10 */
}

.page-header h2 {
    margin-top: 0;
}
table tr td:last-child a {
    margin-right: 15px;
}

.pull-left {
    font-family: Alohomora;
}

</style>


    <script>
        $(document).ready(function() {
            $(`[data-toggle="tooltip"]`).tooltip();
        });
    </script>

</head>
<body>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header clearfix">
                        <h1 class="pull-left"> Employee Details</h1>

                        <a href="create.php" class="btn btn-success pull-right">
                            Add New Employee <span class="glyphicon glyphicon-user"></span>
                        </a>
                    </div>
                    <?php
                        include('connect_db.php');
                        
                        $sql = "SELECT * FROM employees";
                        if($result = mysqli_query($conn, $sql)) {
                            
                            if(mysqli_num_rows($result) > 0) {  
                                echo "<table class='table table-bordered table-striped'>";
        
                                 echo "<thead>";
                                    echo "<tr>";

                                         echo "<th>#</th>";
                                         echo "<th>Name</th>";
                                         echo "<th>Address</th>";
                                         echo "<th>Salary</th>";
                                         echo "<th>Action</th>";

                                    echo " </tr>";
                                 echo "</thead>";

                                 echo "<tbody>";
                                 while($row = mysqli_fetch_array($result)) {
                                     echo "<tr>";

                                        echo "<td>". $row['id'] ."</td>";
                                        echo "<td>". $row['name'] ."</td>";
                                        echo "<td>". $row['address'] ."</td>";
                                        echo "<td>". $row['salary'] ."</td>";
                                        echo "<td>";

                                            echo "<a href='read.php?id=". $row['id'] ." ' title='View Record' 
                                            data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                            echo "<a href='update.php?id=". $row['id'] ." ' title='Update Record' 
                                            data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                            echo "<a href='delete.php?id=". $row['id'] ." ' title='Delete Record' 
                                            data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";

                                        echo "</td>";
                                     echo "</tr>";
                                 echo "</tbody>";
                                 }
                                echo "</table>";
                                 mysqli_free_result($result); //คืน memory / แสดงผลเเล้วหยุดการทำงานของ loop
                                 
                            } else {
                                echo "<p class='lead'><em>No Records.</em></p>";
                            }
                           
                        }
                        mysqli_close($conn);//คืน memory แสดงผลเสร๊จ หยุดการทำงาน การเชื่อมต่อ server
                    ?>
                </div>
            </div>
        </div>
    </div>
</body>
</html>