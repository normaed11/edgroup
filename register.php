<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$fname = $email = $password = $confirm_password = "";
$fname_err = $email_err = $password_err = $confirm_password_err = "";


$ip=$_SERVER['HTTP_HOST'];
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Please enter an email.";
    } elseif(!preg_match('/^[a-z]+@edgroupchb.com$/', trim($_POST["email"]))){
        $email_err = "Email must be in the format name@edgroupchb.com";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $email_err = "An account exists for this e-mail.";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


    // Validate first name
    if(empty(trim($_POST["fname"]))){
        $fname_err = "Please enter a name.";     
    } elseif(strlen(trim($_POST["fname"])) > 15){
        $fname_err = "First name must not exceed 15 characters.";
    } else{
        $fname = trim($_POST["fname"]);
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($fname_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (email, password,ip,validated,token,fname) VALUES (?,?,?,?,?,?)";
    
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_email, $param_password,$param_ip,$param_valid,$param_token,$param_fname);
            
            // Set parameters
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_ip = $ip;
            $param_valid= 'false';
            $param_token= hash("md5",$email.$param_password);
            $param_fname= $fname;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                
                // Redirect to login page
                header("location: validate.php");
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
 
 <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Sign Up</title>
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 360px; margin-top: 130px; padding: 20px; }
    </style>
</head>

<body>
<header>
        <h1 class="edgroup">
            ED Group & TFS Customs Brokers, Inc</h1>
            <h2>Sign Up / Registrate</h2>
       
        
        <div class="top-left">
            <img src=" assets/images/logo nuevo.jpg">
        </div>
        
        <div class="top-right">
          
            <h3> Welcome! Bienvenido!</h3>
            
        </div>  
    </header>
    <div class="wrapper">
       
        <p>Please fill this form to create an account.</p>
        <p>Favor de llenar los datos para crear cuenta.</p><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label>First Name / Primer Nombre </label>
                <input type="text" name="fname" class="form-control <?php echo (!empty($fname_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $fname; ?>">
                <span class="invalid-feedback"><?php echo $fname_err; ?></span>                                                
            </div>    
            <div class="form-group">
                <label>Email / Correo Electronico</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>    
            <div class="form-group">
                <label>Password / Contraseña</label>
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $password; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password / Confirmar Contraseña</label>
                <input type="password" name="confirm_password" class="form-control <?php echo (!empty($confirm_password_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $confirm_password; ?>">
                <span class="invalid-feedback"><?php echo $confirm_password_err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                
            </div>
           
            <p>Already have an account? <a href="login.php">Login here</a>.</p>
            <p>Ya tienes cuenta ? <a href="login.php">Entra Aqui</a>.</p>
        </form>
    </div>    
</body>
</html>