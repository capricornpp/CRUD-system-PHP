<?php 
    include('connect_db.php');
    
    $name = "";
    $address = "";
    $salary = "";

    $name_err = "";
    $address_err = "";
    $salary_err = "";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $inputName = trim($_POST["name"]); // trim = ไม่เอาช่องว่าง 

        if(empty($inputName)) {
            $name_err =  "Please enter your name";
         } elseif (!filter_var(trim($_POST["name"]), FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z'-.\s]+$/")))) { // ดักจับ อักขระพิเศษ
            $name_err = "Please enter a valid name";
        } else {
            $name = $inputName;
        }

        $inputAddress = trim($_POST["address"]);

        if(empty($inputAddress)) {
            $address_err =  "Please enter your address";
        }else {
            $address = $inputAddress;
        }

        $inputSalary = trim($_POST["salary"]);

        if(empty($inputSalary)) {
            $salary_err =  "Please enter your salary";
        }else {
            $salary = $inputSalary;
        }

        //check not ค่าว่าง ก่อน insert

        if(empty($name_err) && empty($address_err) && empty($salary_err) ){
            $sql = "INSERT INTO employees (name, address, salary) VALUES (?, ?, ?)";
            //check param string 3 ตัว sss
            if($stmt = mysqli_prepare($conn, $sql)) {
                mysqli_stmt_bind_param($stmt, "sss", $param_name, $param_address, $param_salary);

                $param_name = $name;
                $param_address = $address;
                $param_salary = $salary;

                if(mysqli_stmt_execute($stmt)) {
                    header("location: index.php");
                    exit();
                } else {
                    echo "Something went wrong.";
                }
            }
            mysqli_stmt_close($stmt);
        }
        mysqli_close($conn);
    }

    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Record</title>

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
                        <h1>Create Record </h1>
                    </div>
<!-- $_SERVER "PHP_SELF" fix => htmlspicialchar   -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
<!-- Ternary operator   -->
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?> ">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?> " required>
                            <span class="help-block"><?php echo $name_err; ?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address</label>
                            <textarea type="text" name="address" class="form-control" required> <?php echo $address; ?> </textarea>
                            <span class="help-block"><?php echo $address_err; ?></span>
                        </div>

                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?> ">
                            <label>Salary</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>" required>
                            <span class="help-block"><?php echo $salary_err; ?></span>
                        

                        <input type="submit" class="btn btn-primary" value="Submit"> 
                        <a href="index.php" class="btn btn-default">Cancel</a>

                        </div>

                    </form>


                </div>
            </div>
        </div>
    </div>
    
</body>
</html>

