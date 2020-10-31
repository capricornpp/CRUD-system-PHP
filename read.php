<?php
    if(isset($_GET["id"]) && !empty($_GET["id"] )) {
        include('connect_db.php');
        

        $sql = "SELECT * FROM employees WHERE id = ?";

        if($stmt = mysqli_prepare($conn, $sql)) {
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = trim($_GET["id"]);

            if(mysqli_stmt_execute($stmt)) {
                $result = mysqli_stmt_get_result($stmt);

                if(mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                    $name = $row["name"];
                    $address = $row["address"];
                    $salary = $row["salary"];
                }else {
                    header("location: index.php");
                    exit();
                }
            } else {
                echo "Somthing went wrong again !! ";
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    } else {
        header("location: error.php");
        exit();
    } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read Page</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">

    <style>
        body {
            background: url('https://images.unsplash.com/photo-1546387903-6d82d96ccca6?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=1651&q=80');
        }

    .wrapper {
    width: 500px;
    margin: 30px auto;
    padding: 0;
    border: 1px solid #b8c4de;
    background: white;
    border-radius: 20px ; /*บนซ้าย,บนขวา=0 ล่างซ้าย=10 ล่างขวา=10 */
    }

    .row {
        width: 450px;
        margin: auto;
        text-align: left;
    }

    h1{
        font-family: Alohomora;
        text-align: center;
    }

    </style>

</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="page-header">
                        <h1>View Record <span class='glyphicon glyphicon-eye-open'></span> </h1>
                    </div>

                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"> <?php echo $row["name"];?> </p>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <p class="form-control-static"> <?php echo $row["address"];?> </p>
                    </div>

                    <div class="form-group">
                        <label>Salary</label>
                        <p class="form-control-static"> <?php echo $row["salary"];?> </p>
                    </div>

                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>