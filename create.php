

<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $username =$sexe =$address = $telephone = $salary = $password ="" ;
$name_err = $username_err = $sexe_err = $address_err = $telephone_err = $salary_err = $password_err ="";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate name
    $input_name = trim($_POST["name"]);
    if(empty($input_name)){
        $name_err = "Please enter a name.";
    } elseif(!filter_var($input_name, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $name_err = "Please enter a valid name.";
    } else{
        $name = $input_name;
    }
     // Validate username
     $input_username = trim($_POST["username"]);
     if(empty($input_username)){
         $username_err = "Please enter a username.";
     } elseif(!filter_var($input_username, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
         $usernname_err = "Please enter a valid username.";
    }else{
         $username = $input_username;
     }
     //Validate Sexe
     $input_sexe = trim($_POST["sexe"]);
     if(empty($input_sexe)){
        $username_err = "Please enter a username.";
    } elseif(!filter_var($input_sexe, FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z\s]+$/")))){
        $sexe_err = "Please enter a valid sexe.";
   }else{
        $sexe = $input_sexe;
    }
    
    // Validate address
    $input_address = trim($_POST["address"]);
    if(empty($input_address)){
        $address_err = "Please enter an address.";     
    } else{
        $address = $input_address;
    }
    // Validate telephone
    $input_telephone = trim($_POST["telephone"]);
    if(empty($input_telephone)){
        $telephone_err = "Please enter an address.";     
    } else{
        $telephone = $input_telephone;
    }
    
    // Validate salary
    $input_salary = trim($_POST["salary"]);
    if(empty($input_salary)){
        $salary_err = "Please enter the salary amount.";     
    } elseif(!ctype_digit($input_salary)){
        $salary_err = "Please enter a positive integer value.";
    } else{
        $salary = $input_salary;
    }

    // Validate password
    $input_password = trim($_POST["password"]);
    if(empty($input_password)){
        $password_err = "Please enter the password";     
    }  else{
        $password = $input_password;
    }
    
    // Check input errors before inserting in database
    if(empty($name_err) && empty($username_err) && empty($sexe_err) && empty($address_err) && empty($telephone_err) && empty($salary_err) && empty($password_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO employees (name, username, sexe, address, telephone, salary, password) VALUES (?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "sssssss", $param_name, $param_username, $param_sexe, $param_address, $param_telephone, $param_salary, $param_password);
            
            // Set parameters
            $param_name = $name;
            $param_username = $username;
            $param_sexe = $sexe;
            $param_address = $address;
            $param_telephone = $telephone;
            $param_salary = $salary;
            $param_password = $password;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: home.php");
                exit();
            } else{
                echo "Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="create.css">
    <style type="text/css">
        
        html, body {
            height: 100%;
            margin: 0;
        }
        .wrapper {
            min-height: 100%;
            display: flex;
            flex-direction: column;
        }

        .content {
            flex: 1;
        }

        footer{ 
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
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <h1 class="navbar">R¤save</h1>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li><a href="index.php">Home</a></li>
            <li><a href="home.php">Voir les personnelles</a></li>
            <li><a href="create.php">S'incrire</a></li>
        </ul>
    </div>
</nav>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-header">
                        <h2>Create Record</h2>
                    </div>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group <?php echo (!empty($name_err)) ? 'has-error' : ''; ?>">
                            <label>Name :</label>
                            <input type="text" name="name" class="form-control" value="<?php echo $name; ?>">
                            <span class="help-block"><?php echo $name_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                            <label>Username :</label>
                            <input type="text" name="username" class="form-control" value="<?php echo $username; ?>">
                            <span class="help-block"><?php echo $username_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($address_err)) ? 'has-error' : ''; ?>">
                            <label>Address :</label>
                            <textarea name="address" class="form-control"><?php echo $address; ?></textarea>
                            <span class="help-block"><?php echo $address_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($sexe_err)) ? 'has-error' : ''; ?>">
                            <label>Sexe :</label>
                            <select name="sexe" class="form-control" <?php echo $sexe_err; ?>>
                                <option value=""></option>
                                <option name="femme" value ="Femme">Femme</option>
                                <option name="homme" value="Homme">Homme</option>
                            </select>
                            <span class="help-block"><?php echo $sexe_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($telephone_err)) ? 'has-error' : ''; ?>">
                            <label>Num telephone :</label>
                            <input type="text" name="telephone" class="form-control" value="<?php echo $telephone; ?>">
                            <span class="help-block"><?php echo $telephone_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($salary_err)) ? 'has-error' : ''; ?>">
                            <label>Salary :</label>
                            <input type="text" name="salary" class="form-control" value="<?php echo $salary; ?>">
                            <span class="help-block"><?php echo $salary_err;?></span>
                        </div>
                        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                            <label>Votre mot de passe :</label>
                            <input type="password" name="password" class="form-control" value="<?php echo $password; ?>">
                            <span class="help-block"><?php echo $password_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="home.php" class="btn btn-default" >Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
        <footer class="bg-white text-center tex-secondary py-1 position-fixed bottom-0 w-100">
        <div class="container">
            <p class="text-center">© 2025 R¤save - All rights reserved</p>
        </div>
    </footer>
    </div>
</body>
</html>