<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>

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
        text-align: center;
    }
    </style>

</head>
<body>
    <div class="card">
        <div class="card-body">
    
        <div class="wrapper">
            <div class="container_fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header">
                            <h1>Error Record</h1>  
                            </div>

                                    <div class="alert alert-danger fade in">
                                        <h1>Error !! </h1>
                                            <p>                                            
                                                <a href="index.php" class="btn btn-danger">Go Back</a>
                                            </p>
                                    
                                
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
</body>
</html>