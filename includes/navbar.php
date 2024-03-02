<div>
  <div class="container">
    <div class="row">
      <div class="col-md-3">
        <img src="assets/img/airforce1.jpg" class="w-100" alt="">
      </div>
      <div class="col-md-9">

      </div>
    </div>
  </div>
</div>

<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow sticky-top">
  <div class="container">
    <a class="navbar-brand d-block d-sm-none d-md-none" href="#"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>
        <?php
        $navabarCategory = "SELECT * FROM categories WHERE navbar_status='0' AND status='0' ";
        $navabarCategory_run = mysqli_query($con, $navabarCategory);
        if (mysqli_num_rows($navabarCategory_run) > 0) {
          foreach ($navabarCategory_run as $navItems) {
        ?>
            <li class="nav-item">
              <a class="nav-link text-white" href="category.php?title=<?= $navItems['slug']; ?>"><?= $navItems['name']; ?></a>
            </li>
        <?php
          }
        }
        ?>

        <?php
        if (isset($_SESSION['auth'])) {
        ?>

          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              <?= $_SESSION['auth_user']['user_name']; ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="#">Profile</a></li>
              <li>
                <form action="allcode.php" method="POST">
                  <button type="submit" name="logout_btn" class="dropdown-item">Logout</button>
                </form>

              </li>
            </ul>
          </li>
        <?php
        } else {
        ?>
          <li class="nav-item">
            <a class="nav-link" href="register.php">Register</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">Login</a>
          </li>
        <?php
        }
        ?>
      </ul>
    </div>
  </div>
</nav>