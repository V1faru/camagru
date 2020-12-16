<nav class="navbar navbar-expand-sm navbar-dark bg-dark fixed-top">
  <a class="navbar-brand"><i class="fas fa-icons"></i> Camagru</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" onclick="mrBoss('front/home.php')"><i class="fas fa-home"></i> Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <?php if (isset($_SESSION['username']) && $_SESSION['username'] != "" && $_SESSION['verified'] == "1") { ?>
      <li class="nav-item">
        <a class="nav-link" onclick="mrBoss('front/edit.php')"><i class="far fa-edit"></i> edit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="mrBoss('front/user_profile.php')"><?php echo $_SESSION['username'];?> <i class="fas fa-users-cog"></i></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="logout()">Logout <i class="fas fa-sign-out-alt"></i></a>
      </li>
      <?php } else if (isset($_SESSION['username']) && $_SESSION['username'] != "" && $_SESSION['verified'] == "0") { ?>
      <li class="nav-item">
        <a class="nav-link" onclick="logout()">Logout <i class="fas fa-sign-out-alt"></i></a>
      </li>
      <?php } else {?>
      <li class="nav-item">
        <a class="nav-link" onclick="mrBoss('front/signUp.php')"><i class="fas fa-user-plus"></i> Sign Up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="mrBoss('front/login.php')">Sign In <i class="fas fa-sign-in-alt"></i></a>
      </li>
      <?php }  ?>
    </ul>
  </div>
</nav>
