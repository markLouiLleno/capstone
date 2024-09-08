  <div class="p-3 px-5 border-bottom border-2 border-dark">
  <nav class="navbar navbar-expand-lg">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="images/HiCut_Logo.png" width="100px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        </ul>
        <form class="d-flex" role="search">
          <?php if (isset($_GET['signup'])) { ?>
            <button class="btn btn-success ms-1 px-3 py-2 border-dark fw-bold" type="submit" style="border-radius: 20px;">Sign up</button>
          <?php } ?>
          
        </form>
      </div>
    </div>
  </nav>
</div>

<style>
  .navbar-nav .nav-link.active {
    color: #559682 !important;
  }
</style>