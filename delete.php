<?php
    if(isset($_POST["id"]) && !empty($_POST["id"])) {
        include('connect_db.php');

        $sqlDelete = "DELETE FROM employees WHERE id = ?"; 

        if($stmt = mysqli_prepare($conn, $sqlDelete)) {
            mysqli_stmt_bind_param($stmt, "i", $param_id);

            $param_id = trim($_POST["id"]) ;

            if(mysqli_stmt_execute($stmt)) {
                header('location: index.php');
                exit();

            } else {
                echo "Something went wrong again !!!!!";
            }
        }
        mysqli_stmt_close($stmt);
    
        mysqli_close($conn);

    } else {

        if(empty(trim($_GET["id"]))){
            header('location: index.php');
            exit();

        }
    }

    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Page</title>

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
        margin: 0 auto;
        text-align: center;
    }

    h1{
        font-family: Alohomora;
    }
    </style>

</head>
<body>
        <div class="wrapper">
            <div class="container_fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h1>Delete Record <span class='glyphicon glyphicon-trash'></span> </h1>                                
                        </div>

                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                                    <div class="alert alert-danger fade in" >
                                        <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>">
                                        <p>Are you sure want to DETLET ?</p>
                                            <p>
                                                <input type="submit" value="Yes" class="btn btn-danger">
                                                <a href="index.php" class="btn btn-default">No</a>
                                            </p>
                                    </div>
                                </form>
                                
                    </div>
                </div>
            </div>
        </div>
    
</body>
</html>