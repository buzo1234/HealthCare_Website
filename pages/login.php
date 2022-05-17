<?php
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: index.php");
    exit;
}
 
require_once "../config.php";
 
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty($username_err) && empty($password_err)){
        $sql = "select user_id, user_email, user_password from users where user_email = ?";
        
        if($stmt = $mysqli->prepare($sql)){
            $stmt->bind_param("s", $param_username);
            
            $param_username = $username;
            
            if($stmt->execute()){
                $stmt->store_result();
                
                if($stmt->num_rows == 1){                    
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            header("location: index.php");
                        } else{
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    $login_err = "Invalid username or password.";
                }
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
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class='flex flex-col max-w-4xl mx-auto justify-center h-screen items-center bg-gray-100'>
    <p class='text-3xl font-semibold mb-10'>Arushi Ka Logo</p>
    <div class='w-1/2 flex flex-col shadow-xl px-5 py-5 bg-white'>
    <p class='text-center text-4xl font-semibold font-sans my-5'>Log In</p>
    <form action="" method='post' class='flex flex-col w-full'>

        <label for="username" class='text-xl font-bold mt-5'>Email:</label>
        <input type="text" name='username' placeholder='Enter email' class='border-[0.5px] border-black px-2 py-1 '>
        <label for="password" class='text-xl font-bold mt-5'>Password:</label>
        <input type="password" name='password' placeholder='Enter password' class='border-[0.5px] border-black px-2 py-1 '>

        <?php
            echo "<p class='text-red-500 mt-1'>$login_err</p>";
        ?>
        
        <div class='flex w-full justify-center'>
            
            <button type='submit' class='bg-blue-500 px-3 py-1 text-white font-semibold rounded-md w-1/3 mt-10 mb-2'>LogIn</button>
        </div>
    </form>
        <p class='text-center'>Not a Member? <a href='./signup.php' class='text-lg text-red-500 text-center font-semibold'>SignUp</a></p>
    </div>
</body>
</html>