<?php 
session_start(); 

if (isset($_POST['Login'])) { 
    if (empty($_POST['nama']) || empty($_POST['pass'])) { 
        echo "User Name dan Password masih kosong";
        session_destroy(); 
    } else { 
        // Daftar pengguna yang valid
        $users = [
            ["username" => "admin", "password" => "admin"],
            ["username" => "fani", "password" => "password1"],
            ["username" => "dillo", "password" => "password2"],
            ["username" => "okta", "password" => "password3"],
            ["username" => "jimy", "password" => "password4"],
            ["username" => "rista", "password" => "password5"]
        ];

        // Cek kredensial pengguna
        $isValidUser = false;
        foreach ($users as $user) {
            if ($_POST['nama'] == $user["username"] && $_POST['pass'] == $user["password"]) {
                $_SESSION['login'] = 1; 
                $_SESSION['username'] = $_POST['nama']; 
                $isValidUser = true;
                break;
            }
        }

        if ($isValidUser) {
            header("Location: submit_formlogin.php"); 
            exit(); 
        } else {
            echo "User Name atau Password salah.";
        }
    } 
} 
?> 
<!DOCTYPE html>
<html lang="en">
<head> 
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 20px;
        }
        form p {
            margin: 10px 0;
        }
        input[type="text"], input[type="password"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            color: #777;
        }
    </style>
</head> 
<body> 
    <div class="container">
        <form name="session" method="POST" action=""> 
            <h2>Form Login</h2>
            <p>User Name <input type="text" name="nama" /></p> 
            <p>Password <input type="password" name="pass" /></p> 
            <input type="submit" name="Login" value="Login" /> 
        </form> 
    </div>
    <div class="footer">
        &copy; <?php echo date("Y"); ?> Tawaf Fani.
    </div>
</body> 
</html>
