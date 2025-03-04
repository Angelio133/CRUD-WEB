<?php
// Check existence of id parameter before processing further
if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM employees WHERE id = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = trim($_GET["id"]);
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $name = $row["name"];
                $username = $row["username"];
                $sexe = $row["sexe"];
                $address = $row["address"];
                $telephone = $row["telephone"];
                $salary = $row["salary"];
                
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);
} else{
    // URL doesn't contain id parameter. Redirect to error page
    header("location: error.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        

body {
    background-image: url('photo/4.avif'); /* Mets le bon chemin */
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed; /* Fixe l'image pendant le scroll */
    display: flex;
    color :white;

    flex-direction: column;
}
        .wrapper{
            width: 500px;
            margin: 0 auto;
        }
        label{
            font-size : 2em;
        }
        p{
            font-size : 1.5rem;
        }
        footer {
    
    bottom: 0;
    left: 0;
    width: 100%;
    background: ;
    color: white;
    text-align: center;
    padding: 10px;
}
    </style>
</head>
<body>

<?php 
    include("navbar.php");
?>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h1>View Record</h1>
                    </div>
                    <div class="form-group">
                        <label>Name</label>
                        <p class="form-control-static"><?php echo $row["name"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Username</label>
                        <p class="form-control-static"><?php echo $row["username"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Sexe</label>
                        <p class="form-control-static"><?php echo $row["sexe"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <p class="form-control-static"><?php echo $row["address"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Telephone :</label>
                        <p class="form-control-static"><?php echo $row["telephone"]; ?></p>
                    </div>
                    <div class="form-group">
                        <label>Salary</label>
                        <p class="form-control-static"><?php echo $row["salary"]; ?></p>
                    </div>
                    <p><a href="index.php" class="btn btn-primary">Back</a></p>
                </div>
            </div>        
        </div>
    </div>
    <footer class="bg-white text-center tex-secondary py-1 position-fixed bottom-0 w-100">
        <div class="container">
            <p class="text-center">© 2025 R¤save - All rights reserved</p>
        </div>
    </footer>
</body>
</html>