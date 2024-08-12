
<div class="navbar navbar-expand navbar-dark bg-dark mb-5">
    <div class="container-fluid">
        <a href="dashboard.php" class="navbar-brand">
            <h1 class="h4">The Company</h1>    
        </a>
        <div class="navbar-nav">
            <a href="profile.php" class="navbar-text text-decoration-none"><?= $_SESSION['username'] ?></a>
            <!-- log out -->
            <form action="../actions/logout.php" method="post" class="d-flex ms-2">
                <button type="submit" class="text-danger bg-transparent border-0 shadow-none">Log out</button>
            </form>
        </div>
    </div>
</div>