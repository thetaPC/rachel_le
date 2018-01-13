<nav class="navbar navbar-wrapper custom-toggler navbar-expand-md navbar-light bg-inverse">
    <!-- Brand -->
    <a class="navbar-brand" href="/v2_rachel/index.php">
    <?php
      
      $sql = "SELECT logo FROM my_account WHERE id=1";
      $res = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($res)) {
          echo "<img id='navbarLogo' class='logo' src='https://res.cloudinary.com/htqimzujb/image/upload/" . $row['logo'] . "'>";
      }
    ?>
  </a>
  
    <!-- Toggler/collapsibe Button -->
    
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
        <span class="fa fa-chevron-down"></span>
    </button>
  
    <!-- Navbar links -->
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link" href="/v2_rachel/src/portfolio.php">PORTFOLIO</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/v2_rachel/src/archive.php">ARCHIVE</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/v2_rachel/src/about.php">ABOUT</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/v2_rachel/src/contact.php">CONTACT</a>
      </li>
    </ul>
  </div>
</nav> 