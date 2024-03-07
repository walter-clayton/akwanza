<div class="container">
      <nav class="navbar navbar-expand-lg navbar">
        <div class="container-fluid">
          <a class="navbar-brand" href="<?php echo esc_url( home_url( '/assets/images/akwanza_logo.png' ) ); ?>">
          <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/akwanza_logo.png" alt="akwanza Logo" width="60" height="60" style="color: black;">
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-bs-toggle="collapse"
            data-bs-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav">
              <a class="nav-link <?php echo is_front_page() ? ' active' : ''; ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
              <a class="nav-link" href="#">About</a>
              <a class="nav-link" href="#">Reports</a>
            </div>
          </div>
        </div>
      </nav>
    </div>