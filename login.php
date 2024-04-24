<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username1 = $_POST["username"];
    $password1 = $_POST["password"];

    
   //Check if the username and password are correct from sql database
    $servername = "localhost";
    $username="root";
    $password="";
    $dbname="storyverse";
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $sql = "SELECT * FROM users WHERE username='$username1' AND password='$password1'";
    $result = $conn->query($sql);
    $sql2="SELECT name FROM users WHERE username='$username1' AND password='$password1'";
    $name = $conn->query($sql2);
    //get the name in one variable
    $name = $name->fetch_assoc();
    $name = $name['name'];
    
    $found = false;
    if ($result->num_rows > 0) {
        $found = true;
    }
    $conn->close();

    // If credentials are correct, start a session and store username
    if ($found) {
        session_start();
        $_SESSION['username'] = $name;
        header("Location: index.php");
        exit();
    } else {
        // If credentials are incorrect, display error message
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('./images/background.png');
    }
    .login-container {
      margin-top: 10%;
    }
    .card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }
    .card-title {
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }
    .form-control {
      border: 1px solid #ced4da;
      border-radius: 10px;
    }
    .btn-primary {
      background-color: #007bff;
      border: none;
      border-radius: 10px;
    }
    .btn-primary:hover {
      background-color: #0056b3;
    }
    .error-message {
      font-size: 14px;
      color: #dc3545;
      margin-top: 10px;
    }
  </style>
</head>
<body>
  <div class="container">
    <br><br><br>
    <div class="row justify-content-center login-container">
      <div class="col-md-4">
        <div class="card p-4">
          <h3 class="card-title text-center mb-4">Login</h3>
          <form id="loginForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="mb-3">
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="container">
            <div class="row">
                <div class="col-md-6 text-center"> <!-- Adjust the column width as needed -->
                <button type="submit" class="btn btn-primary">Login</button>
                </div>
                <div class="col-md-6 text-center"> <!-- Adjust the column width as needed -->
                <button class="btn btn-primary"><a href="regsitration.php" style="color: white; text-decoration: none;">Register</a></button>
                </div>
            </div>
            </div>
          </form>
          <?php if(isset($error)) { ?>
            <div class="error-message text-center"><?php echo $error; ?></div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</body>
</html>