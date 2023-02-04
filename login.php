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
$email_err = $password_err = $login_err = "";
$ip=$_SERVER['HTTP_HOST'];
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if email is empty
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter email.";
    } else{
        $email= trim($_POST["email"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($email_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, email, password, validated, fname FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = $email;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Store result
                mysqli_stmt_store_result($stmt);
                
                // Check if email exists, if yes then verify password
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    // Bind result variables
                    mysqli_stmt_bind_result($stmt, $id, $email, $hashed_password,$validated,$fname);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($password, $hashed_password)){
                            if($validated=="true"){ // Password is correct and account is validated, so start a new session
                                $sql= "UPDATE users SET ip = '$ip' WHERE email = ?";
                                $stmt2 = mysqli_prepare($link, $sql);
                                mysqli_stmt_bind_param($stmt2, "s", $param2_email);
                                $param2_email = $email;
                              
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
                                else{
                                    $login_err="Something went wrong. Try again.";
                                }

                            }

                            else{
                                $login_err="Account has not been validated. Please check your e-mail.";
                            }
                           
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid email or password.";
                        }
                    }
                } else{
                    // email doesn't exist, display a generic error message
                    $login_err = "Invalid email or password.";
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>LOGIN</title>
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; margin-top: 130px; padding: 20px; }
    </style>
</head>

<body>
<header>
        <h1 class="edgroup">
            ED Group & TFS Customs Brokers, Inc</h1>
            <h2>Login</h2>
       
        
        <div class="top-left">
            <img src=" assets/images/logo nuevo.jpg">
        </div>
        
        <div class="top-right">
          
            <h3> Welcome! Bienvenido!</h3>
            
        </div>  
    </header>

    <div class="wrapper">
       
        <p>Please fill in your credentials to login.</p>
        <p>Favor de  ingresar usuario y password.</p><br>

        <?php 
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
            <p>No tienes cuenta? <a href="register.php">Registrate Ahora</a>.</p><br>
            <p> <a href="forgot-password.php">Forgot Password? / Olvidate Tu Contraseña ?</a></p>
            
        </form>
    </div>
</body>
</html>


