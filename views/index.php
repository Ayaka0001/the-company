<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"></head>
<body>
    <div class="container my-5">
        <form action="../actions/login.php" method="post" class="border rounded-3 w-50 mx-auto p-4">
            <h1 class="display-6 text-center mb-3">LOGIN</h1>

            <input type="text" name="username" placeholder="USERNAME" class="form-control mb-3" required>
            <input type="password" name="password" placeholder="PASSWORD" class="form-control mb-4">

            <button type="submit" class="btn btn-primary w-100 mb-3">Log in</button>

            <div class="text-center">
                <a href="register.php" class="text-decoration-none">Create account</a>
            </div>
        </form>
    </div>


   </body>
</html>