<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
    <title>Akwanza</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js"></script> 
    <!-- Include additional stylesheets, scripts, and metadata here -->
</head>
<body <?php body_class(); ?>>
<header id="header-nav">
    <div class="container">
        <nav class="navbar navbar-expand-sm navbar"> 
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/Home' ) ); ?>">
                    <img src="<?php echo esc_url( get_template_directory_uri() ); ?>/assets/images/akwanza_logo.png" alt="akwanza Logo" width="60" height="60" style="color: black;">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link <?php echo is_front_page() ? 'active' : ''; ?>" href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo is_page('About') ? 'active' : ''; ?>" href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo is_page('Reports') ? 'active' : ''; ?>" href="<?php echo esc_url(get_permalink(get_page_by_path('reports'))); ?>">Reports</a>
                        </li>    
                    </ul>
                </div>
        </nav>
    </div>
</header>
</body>
</html>
