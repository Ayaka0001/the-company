<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
</head>
<body>
    <?php 
        session_start();
        include_once "nav.php";

        require "../classes/User.php";

        $u = new User; //create an instance of the class
        $id = $_GET['id']; //get the id from the url
        $user = $u -> findUser($id);   //use the $id to get the user from the database
        //name the associative array we got from the database(from the instance $u of User class) as $user
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form action="../actions/updateUser.php" method="post">
                    <h2 class="display-6 text-center mb-3">EDIT USER</h2>

                    <input type="hidden" name="id" value="<?= $user['id'] ?>"> <!-- hidden input to store the id for later on when we save the user-->

                    <label for="first-name" class="form-label">First Name</label>
                    <input type="text" name="first_name" id="first-name" class="form-control mb-2" value="<?= $user['first_name'] ?>" required>

                    <label for="last-name" class="form-label">Last Name</label>
                    <input type="text" name="last_name" id="last-name" class="form-control mb-2" value="<?= $user['last_name'] ?>" required>

                    <label for="username" class="form-label">Username</label>
                    <input type="text" name="username" id="username" class="form-control mb-3" value="<?= $user['username'] ?>" required>

                    <button type="submit" class="btn btn-warning">Save</button>
                    <a href="dashboard.php" class="btn btn-secondary ms-1">Cancel</a>
            </div>
        </div>
    </div>
 </body>
</html>