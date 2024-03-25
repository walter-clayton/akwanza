<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1 maximum-scale=1.0 ">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <?php wp_head(); ?>
    <title>Akwanza</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body <?php body_class(); ?>>
    <nav class="navbar navbar-expand-sm">
        <a class="navbar-brand" id="akwanza-logo" href="<?php echo esc_url(home_url('/Home')); ?>">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/akwanza_logo.png"
                alt="akwanza Logo" width="70" height="80" style="color: black;">AKWANZA

        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <!-- Your sandwich icon goes here (e.g., hamburger menu icon) -->
            &#9776;
        </button>

        <div class="collapse navbar-collapse justify-content-evenly" id="navbarSupportedContent">
            <ul class="navbar-nav me-center">
                <li class="nav-item">
                    <a class="nav-link <?php echo is_front_page() ? 'active' : ''; ?>"
                        href="<?php echo esc_url(home_url('/home')); ?>">Home</a>
                </li>
                <span class="vr" style="height: 40px; width:2px; color:black;"></span>

                <li class="nav-item">
                    <a class="nav-link <?php echo is_page('About') ? 'active' : ''; ?>"
                        href="<?php echo esc_url(get_permalink(get_page_by_path('/about'))); ?>">About</a>
                </li>
            </ul>
            <div class="d-flex">
                <a href="https://akwanza.teemill.com" class="btn bt-lg btn-success">
                    <span><i class="fas fa-tshirt mx-2"></i></span>Shop</a>
            </div>
        </div>
    </nav>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>

</html>