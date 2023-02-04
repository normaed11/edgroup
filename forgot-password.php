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

$email = $email_err = "";


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
                    $email = trim($_POST["email"]);
                
                } else{
                    $email_err = "No account exists for this e-mail.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }


   
    
    
    // Check input errors before inserting in database
    if( empty($email_err)){
        // Redirect to validate page
        header("location: validate-forgot.php?email=$email&emailsent=false");
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
    <title>Forgot Password / Olvidaste Contraseña</title>
    <style>
        body{ font: 14px sans-serif; }
        .wrapper{ width: 500px; margin-top: 130px; padding: 20px; }
    </style>
</head>

<body>
<header>
        <h1 class="edgroup">
            ED Group & TFS Customs Brokers, Inc</h1>
            <h2>Forgot Password / Olvidaste Contraseña</h2>
       
        
        <div class="top-left">
            <img src=" assets/images/logo nuevo.jpg">
        </div>
        
        <div class="top-right">
          
            <h3> Welcome! Bienvenido!</h3>
            
        </div>  
    </header>
    <div class="wrapper">
       
        <p>Please enter your e-mail to receive a link to reset your password.</p>
        <p>Favor de llenar tu e-mail para recibir liga para resetear contraseña.</p><br>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
           
            <div class="form-group">
                <label>Email / Correo Electronico</label>
                <input type="text" name="email" class="form-control <?php echo (!empty($email_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $email; ?>">
                <span class="invalid-feedback"><?php echo $email_err; ?></span>
            </div>    
           
    
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                
            </div>
           
            <p> <a href="login.php">Return to Login Page / Regresar a Pagina de Acesso</a></p>
            
        </form>
    </div>    
</body>
</html>