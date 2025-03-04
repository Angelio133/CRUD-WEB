<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="font/fontawesome-free-5.15.3-web/css/all.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.js"></script>
    <style type="text/css">
         html, body {
            
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

        footer {
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    background: ;
    color: white;
    text-align: center;
    padding: 10px;
}
    </style>
    <script type="text/javascript">
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>

<!-- Navigation -->

<?php 
    include("navbar.php");
?>


<!-- Main content wrapper -->
<div class="container-fluid">
    <div class="content">
        <div class="wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="page-header clearfix">
                            <h2 class="pull-left">Employees Details</h2>
                            <a href="create.php" class="btn btn-success pull-right">Add New Employee</a>
                        </div>
                        <?php
                        // Include config file
                        require_once "config.php";
                        
                        // Attempt select query execution
                        $sql = "SELECT * FROM employees";
                        if($result = mysqli_query($link, $sql)){
                            if(mysqli_num_rows($result) > 0){
                                echo "<table class='table table-bordered table-striped'>";
                                    echo "<thead>";
                                        echo "<tr>";
                                            echo "<th>#</th>";
                                            echo "<th>Name</th>";
                                            echo "<th>Username</th>";
                                            echo "<th>sexe</th>";
                                            echo "<th>Address</th>";
                                            echo "<th>telephone</th>";                                       
                                            echo "<th>Salary</th>";
                                            echo "<th>password</th>";
                                            echo "<th>Action</th>";
                                        echo "</tr>";
                                    echo "</thead>";
                                    echo "<tbody>";
                                   
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                            echo "<td>" . $row['id'] . "</td>";
                                            echo "<td>" . $row['name'] . "</td>";
                                            echo "<td>" . $row['username'] . "</td>"; 
                                            echo "<td>" . $row['sexe'] . "</td>";
                                            echo "<td>" . $row['address'] . "</td>";
                                            echo "<td>" . $row['telephone'] . "</td>";
                                            echo "<td>" . $row['salary'] . "</td>";
                                            // echo "<td>" . $row['password'] . "</td>";
                                            echo "<td>" .  "<div class=\"mdp\">" . $row['password'] . "</div> <span class=\"biger\">*****</span>" . "<div <i  onclick=\"showpassword(this)\"></i></div>" . "</td>";
                                            echo "<td>";
                                                echo "<a href='read.php?id=". $row['id'] ."' title='View Record' data-toggle='tooltip'><span class='glyphicon glyphicon-eye-open'></span></a>";
                                                echo "<a href='update.php?id=". $row['id'] ."' title='Update Record' data-toggle='tooltip'><span class='glyphicon glyphicon-pencil'></span></a>";
                                                echo "<a href='delete.php?id=". $row['id'] ."' title='Delete Record' data-toggle='tooltip'><span class='glyphicon glyphicon-trash'></span></a>";
                                                echo " <div> <i class=\"fa fa-eye\" onclick=\"showpassword(this)\"></i></div>";
                                            echo "</td>";
                                        echo "</tr>";
                                    }
                                    echo "</tbody>";                            
                                echo "</table>";
                                // Free result set
                                mysqli_free_result($result);
                            } else{
                                echo "<p class='lead'><em>No records were found.</em></p>";
                            }
                        } else{
                            echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
                        }
         
                        // Close connection
                        mysqli_close($link);
                        ?>
                    </div>
                </div>        
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-white text-center tex-secondary py-1 position-fixed bottom-0 w-100">
        <div class="container">
            <p class="text-center">© 2025 R¤save - All rights reserved</p>
        </div>
    </footer>
</div>

<script>
    function showpassword(icon) {
        const row = icon.closest("tr");
        const mdp = row.querySelector(".mdp");
        const txt = row.querySelector(".biger");

        mdp.classList.toggle("show");
        txt.classList.toggle("showdown");
    }
</script>
</body>
</html>
