<?php 
session_start(); 

// Handle logout action
if (isset($_GET['aksi']) && $_GET['aksi'] == "logout") { 
    session_destroy(); 
    header("Refresh:3; url=proses_login.php"); 
    exit(); // Stop further execution after header
} 

// Check if user is logged in
if (isset($_SESSION['login'])) { 
    $nama = $_SESSION['username']; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-bottom: 20px;
        }
        .menu a {
            text-decoration: none;
            margin: 0 10px;
            color: #007BFF;
        }
        .menu a:hover {
            text-decoration: underline;
        }
        .logout {
            margin-top: 20px;
            display: inline-block;
            padding: 10px 20px;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .logout:hover {
            background-color: #c82333;
        }
        .footer {
            text-align: center;
            color: #777;
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Selamat Datang, <b><?php echo htmlspecialchars($nama); ?></b>!</h1>
        <p>Berikut ini menu navigasi anda:</p>
        <div class="menu">
            <a href="menu1.php">Menu 1</a>
            <a href="menu2.php">Menu 2</a>
            <a href="menu3.php">Menu 3</a>
        </div>
        <a href="?aksi=logout" class="logout">Logout</a>
    </div>
    <div class="footer">
        &copy; <?php echo date("Y"); ?> Tawaf Fani.
    </div>
</body>
</html>
<?php 
} else { 
    header("Location: proses_login.php"); 
    exit(); // Stop further execution after header
} 
?>
