<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$email = $password = "";
$token="";
$ip=$_SERVER['HTTP_HOST'];
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "GET"){
   // accessing data from URL
    $email_get=$_GET["email"] ?? "";
    $token_get=$_GET["token"] ?? "";
    // Validate credentials
    if($token_get!= "" && $email_get!= "" ){
       
      
        // Prepare a select statement
        $sql = "SELECT id, email, password,token, fname FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email_get;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                   
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $pwd, $token,$fname);
                    
                    if(mysqli_stmt_fetch($stmt)){
                        if(hash("md5",$email.$pwd)==$token_get){
                            // Password is correct, so start a new session
                            $sql= "UPDATE users SET ip = '$ip', validated = 'true' WHERE email = ?";
                            $stmt2 = mysqli_prepare($link, $sql);
                            mysqli_stmt_bind_param($stmt2, "s", $param2_email);
                            $param2_email = $email_get;
                          
                            if (mysqli_stmt_execute($stmt2)){
                                session_start();
                                
                                // Store data in session variables
                                $_SESSION["loggedin"] = true;
                                $_SESSION["id"] = $id;
                                $_SESSION["email"] = $email;     
                                $_SESSION["fname"] = $fname;                        
                                
                                // Redirect user to welcome page
                                header("location: index.php");
                            }
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid email or token.";
                        }
                    }
                } else{
                    // email doesn't exist, display a generic error message
                    $login_err = "Invalid email or token.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Validate E-mail</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 500px; padding: 20px; }
    </style>
</head>
<body>
    <div class="wrapper">
        <h2>Verify E-mail </h2>
        <p>You have been registered successfully!</p>
            <p>An e-mail has been sent to you. Please click the link on the e-mail to verify your account.
        </p>
        <br><br>
        <p>Tu registro fue existoso!</p>
            <p>Te enviamos un correo electronico. Favor de dar click a la liga para verificar tu cuenta.
        </p>



        <!-- <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Login">
            </div>
            <p>Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form> -->
    </div>
</body>
</html>


