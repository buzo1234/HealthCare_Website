<?php
require_once "../config.php";
 
$username = $password = $confirm_password = "";
$username_err = $password_err = $confirm_password_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter a username.";
    }else{
        $sql = "select user_id from users where user_email = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("s", $param_username);
            
            $param_username = trim($_POST["username"]);
            
            if($stmt->execute()){
                $stmt->store_result();
                
                if($stmt->num_rows() == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            $stmt->close();
        }
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    }else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password.";     
    } else{
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match.";
        }
    }
    
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)){
        
        $sql = "insert into users (user_email, user_password) values (?, ?)";
         
        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("ss", $param_username, $param_password);
            
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); 
            
            if($stmt->execute()){
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            $stmt->close();
        }
    }
    
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/signup.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class='class31'>
    <p class='text-3xl font-semibold mb-10'>Arushi Ka Logo</p>
    <div class='class32'>
    <p class='text-center text-4xl font-semibold font-sans my-5'>Sign Up</p>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method='post' class='flex flex-col w-full'>

        <label for="username" class='text-xl font-bold mt-5'>Email:</label>
        <input type="text" name='username' placeholder='Enter email' class='border-[0.5px] border-black px-2 py-1 '>
        <label for="password" class='text-xl font-bold mt-5'>Password:</label>
        <input type="password" name='password' placeholder='Enter password' class='border-[0.5px] border-black px-2 py-1 '>
        <label for="confirm_password" class='text-xl font-bold mt-5'>Confirm Password:</label>
        <input type="password" name='confirm_password' placeholder='Confirm Password' class='border-[0.5px] border-black px-2 py-1 '>
        <div class='flex w-full justify-center'>

        <?php
            echo "<p class='text-red-500 mt-1'>$password_err</p>";
            echo "<p class='text-red-500 mt-1'>$username_err</p>";
            echo "<p class='text-red-500 mt-1'>$confirm_password_err</p>";
        ?>
            
            <input type='submit' class='bg-blue-500 px-3 py-1 text-white font-semibold rounded-md w-1/3 mt-10 mb-2' value='SignUp'>
        </div>
    </form>
        <p class='text-center'>Already a Member? <a href='./login.php' class='text-lg text-red-500 text-center font-semibold'>LogIn</a></p>
    </div>
</body>
</html>