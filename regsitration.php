<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Fetch form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password1 = $_POST["password"];
    $retypePassword = $_POST["retypePassword"];

    // Check if passwords match
    if ($password1 == $retypePassword) {
        $servername = "localhost";
        $username_db = "root";
        $password_db = "";
        $dbname = "storyverse";
        // Create connection
        $conn = new mysqli($servername, $username_db, $password_db, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Check if username already exists
        $check_username_sql = "SELECT * FROM users WHERE username='$username'";
        $result = $conn->query($check_username_sql);
        if ($result->num_rows > 0) {
            // Username already exists
            $error = "Username already exists. Please choose a different username.";
        } else {
            // Username is unique, proceed with insertion
            $sql = "INSERT INTO users (name, email, username, password) VALUES ('$name', '$email', '$username', '$password1')";
            if ($conn->query($sql) === TRUE) {
                header("Location: login.php");
                exit();
            } else {
                $error = "Error: " . $sql . "<br>" . $conn->error;
            }
        }

        $conn->close();
    } else {
        $error = "Passwords do not match";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registration Page</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-image: url('./images/background.png');
    }
    .register-container {
      margin-top: 5%;
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
      border: 1px solid #c2dc8f;
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
    <div class="row justify-content-center register-container">
      <div class="col-md-6">
        <div class="card p-4">
          <h3 class="card-title text-center mb-4">Registration</h3>
          <form id="registerForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="mb-3">
              <input type="text" class="form-control" id="name" name="name" placeholder="Name" required>
            </div>
            <div class="mb-3">
              <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
            </div>
            <div class="mb-3">
              <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <div class="mb-3">
              <input type="password" class="form-control" id="retypePassword" name="retypePassword" placeholder="Retype Password" required>
            </div>
            <p class="text-center text-muted mt-5 mb-0">Already have an account? <a href="login.php" class="fw-bold text-body"><u>Sign in here</u></a></p><br>
            <div class="text-center">
              <button type="submit" class="btn btn-primary btn-block">Register</button>
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