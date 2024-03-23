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

<body <?php body_class(""); ?>>
    <nav class="navbar navbar-expand-sm" id="container-header-navbar">
        <div class="container-fluid" id="container-header">
            <a class="navbar-brand" id="akwanza-logo" href="<?php echo esc_url(home_url('/Home')); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/akwanza_logo.png"
                    alt="akwanza Logo" width="70" height="80" style="color: black;">AKWANZA
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-around" id="navbarSupportedContent">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link <?php echo is_front_page() ? 'active' : ''; ?>"
                            href="<?php echo esc_url(home_url('/home')); ?>">Home</a>
                    </li>
                    <div class="vr" style="height: 40px; width:2px; color:black;"></div>
                    <li class="nav-item ">
                        <a class="nav-link <?php echo is_page('About') ? 'active' : ''; ?>"
                            href="<?php echo esc_url(get_permalink(get_page_by_path('about'))); ?>">About</a>
                    </li>
                </ul>
                <div id="button-navbar">
                    <a href="https://akwanza.teemill.com" class="btn bt-lg btn-success"> <span
                            style="margin-right:4px;"><i class="fas fa-tshirt"></i></span>
                        Shop</a>
                </div>
            </div>
        </div>
    </nav>
</body>

</html>