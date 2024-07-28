<!-- navbar.php -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="index.php">
        <img src="assets/images/logo.png" alt="" style="width: 100px; height: 100px;">

    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">

        <ul class="navbar-nav ms-auto">
            <?php
            if (isset($_SESSION['patientlogin']) || isset($_SESSION['adminlogin']) || isset($_SESSION['userlogin'])) {
                if (isset($_SESSION['adminlogin'])) {
            ?>
                    <li class="nav-item">
                        <a class="btn btn-primary" href="list-user.php">Users</a>
                    </li>
                <?php
                }
                ?>
                <li class="nav-item">
                    <a class="btn btn-primary" href="logout.php">Logout</a>
                </li>
            <?php
            } else {
            ?>
                <li class="nav-item">
                    <a class="btn btn-primary" href="login.php">Patient Login</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary" href="register.php">Patient Register</a>
                </li>
                <li class="nav-item">
                    <a class="btn btn-primary" href="user-login.php">User/Admin Login</a>
                </li>
            <?php
            }
            ?>
        </ul>
    </div>
</nav>