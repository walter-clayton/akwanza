<div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">
        <?php get_header(); ?>
        <!DOCTYPE html>
        <html <?php language_attributes(); ?>>

        <head>
            <meta charset="<?php bloginfo('charset'); ?>">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
            <?php wp_head(); ?>
            <title>Akwanza</title>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
        </head>

        <body>
            <header>
                <nav class="navbar navbar-expand-sm justify-content-between px-4">
                    <a class="navbar-brand" id="akwanza-logo" href="<?php echo esc_url(home_url('/Home')); ?>">
                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/akwanza_logo.png"
                            alt="akwanza Logo" width="80" height="90" style="color: black;">AKWANZA
                    </a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation"><i
                            class="fas fa-solid fa-bars"></i></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <div class="d-flex align-items-center-md justify-content-center-md flex-grow-1">
                            <ul class="navbar-nav mr-auto">
                                <li class="nav-item">
                                    <a class="nav-link <?php echo is_front_page() ? 'active' : ''; ?>"
                                        href="<?php echo esc_url(home_url('/')); ?>">Home</a>
                                </li>
                                <span class="vr" style="height: 40px; width:2px; color:black;"></span>
                                <li class="nav-item">
                                    <a class="nav-link <?php echo is_page('About') ? 'active' : ''; ?>"
                                        href="<?php echo esc_url(get_permalink(get_page_by_path('/about'))); ?>">About</a>
                                </li>
                            </ul>
                        </div>
                        <div class="d-flex">
                            <a href="https://akwanza.teemill.com" class="btn bt-lg btn-shop">
                                <span><i class="fas fa-tshirt mx-2"></i></span>Shop</a>
                        </div>
                    </div>
                </nav>
                <div id="header-image"
                    class="d-flex flex-column justify-content-center text-align-center container-fluid text-center bg-image text-white"
                    style=" background-image: url('<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/Header.svg');
                    
                            background-size: cover;
                             background-repeat: no-repeat;
                            background-position: center center;
                        ">
                    <div id="header-text">
                        <h1 style="font-family: 'Colonna MT', serif;">Uniting for Wildlife Conservation</h1>
                        <h4>Together, Every Purchase is a Pledge to Protect</h4>
                    </div>
                </div>

            </header>

            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>