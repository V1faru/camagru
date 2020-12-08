<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand">Camagru</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" onclick="mrBoss()">Home <span class="sr-only">(current)</span></a>
      </li>
    </ul>
    <ul class="navbar-nav">
      <?php if (isset($_SESSION['username']) && $_SESSION['username'] != "") { ?>
      <li class="nav-item">
        <a class="nav-link" onclick="mrBoss('front/login.php')">edit</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="mrBoss('front/login.php')"><?php echo $_SESSION['username']; ?> &#9881;</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="mrBoss('front/login.php')">Log Out</a>
      </li>
      <?php } else { ?>
      <li class="nav-item">
        <a class="nav-link" onclick="mrBoss('front/signUp.php')">Sign Up</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" onclick="mrBoss('front/login.php')">Sign In</a>
      </li>
      <?php } ?>
    </ul>
  </div>
</nav>
