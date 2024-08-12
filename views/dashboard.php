<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"/>
</head>
<body>
    <?php 
        session_start();
        require "../classes/User.php";

        $user = new User;
        $all_users = $user->getAllUsers();
        //getting data directly from the database. not through the actions folder

        include_once "nav.php" ?>
                 
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <h2 class="h3 mb-3">User List</h2>

                <table class="table">
                    <thead class="table-secondary">
                        <tr>
                            <th>#</th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Username</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                            while($row = $all_users -> fetch_assoc()){
                        ?>
                        <tr>
                            <td><?= $row['id'] ?></td>
                            <td><?= $row['first_name'] ?></td>
                            <td><?= $row['last_name'] ?></td>
                            <td><?= $row['username'] ?></td>
                            <td>
                                <!-- edit -->
                                <a href="edit-user.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-warning">
                                    <i class="fa-solid fa-pen"></i>
                                </a>
                                <!-- delete -->
                                <?php if($row['id'] != $_SESSION['id']){ ?>
                                <form action="" method="post" class="d-inline">
                                    <a href="confirm-delete.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger ms-2">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </form>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

 </body>
</html>