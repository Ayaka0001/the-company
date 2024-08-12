<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <div class="container my-5">
        <!-- action="" is where it will submit the data -->
        <form action="../actions/register.php" method="post" class="w-50 mx-auto border rounded-3 p-4">
            <h1 class="display-6 text-center mb-3">REGISTER</h1>

            <label for="first-name" class="form-label">First Name</label>
            <input type="text" name="first_name" id="first-name" class="form-control mb-2" required>
            
            <label for="last-name" class="form-label">Last Name</label>
            <input type="text" name="last_name" id="last-name" class="form-control mb-2">
            
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" class="form-control mb-2">

            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" class="form-control mb-4">

            <button type="submit" class="btn btn-success w-100">Register</button>
            <div class="text-center">
                Registered already? <a href="index.php">Log in</a>
            </div>

        </form>
    </div>
                
</body>
</html>