<nav class="navbar navbar-wrapper navbar-toggleable-md navbar-light custom-toggler bg-inverse">
  <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <a class="navbar-brand" href="/v2_rachel/index.php">
    <?php
      
      $sql = "SELECT logo FROM my_account WHERE id=1";
      $res = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($res)) {
          echo "<img id='navbarLogo' class='logo' src='/v2_rachel/img/" . $row['logo'] . "'>";
      }
    ?>
  </a>

  <div class="collapse navbar-collapse" id="navbarsExampleDefault">
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
