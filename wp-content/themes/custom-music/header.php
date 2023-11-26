<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />

    <?php
    wp_enqueue_style("bootstrapCSS", get_template_directory_uri() . '/' . 'css/bootstrap-5.2.min.css', "5.2");
    wp_enqueue_style("mainCSS", get_template_directory_uri() . '/' . 'css/main-style.css', "1.0.0");
    wp_enqueue_script('pooperJS', 'https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js', '1.0.0');

    wp_enqueue_script('jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', '3.7.1');

    wp_register_script('customJS', get_template_directory_uri() . '/' . 'js/custom.js', array('jquery'), '1.0', true);

    wp_localize_script(
        'customJS',
        'custom_params',
        array(
            'ajax_url'   => admin_url('admin-ajax.php', 'relative'),
            'ajax_nonce' => wp_create_nonce('process-ajax-nonce'),
        )
    );
    wp_enqueue_script('customJS');

    wp_enqueue_script('bootstrapJS', get_template_directory_uri() . '/' . 'js/bootstrap-5.2.min.js', '5.2');
    wp_head();
    ?>
</head>

<body class="">
    <!-- header -->
    <header class="header">
        <!-- navigation bar -->
        <nav class="navbar navbar-expand-xl py-1">
            <div class="container-xxl px-xxl-4">
                <!-- logo -->
                <a class="navbar-brand" href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri() . '/' . "img/logo@2x_white.png"; ?>" alt="logo" class="img-fluid" style="height: 30px;"></a>

                <!-- triger button -->
                <button class="navbar-toggler border-0 p-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <!-- menu link -->
                <div class="collapse navbar-collapse py-3 py-xl-0 justify-content-end flex-grow-0" id="navbarNav">

                    <ul class="navbar-nav gap-xl-3 align-items-xl-center ">

                        <?php
                        wp_nav_menu(array(
                            'theme_location'     => 'primary',
                            'container'            => 'div',
                            'container_class'     => 'menu',
                            'items_wrap'          => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                        ));
                        ?>

                        <li class="nav-item py-2 py-xl-0 ms-xl-5">
                            <div class="search_bar ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 17 17" fill="none" role="img" class="icon search_icon">
                                    <path d="M1.5 7.75C1.5 9.4076 2.15848 10.9973 3.33058 12.1694C4.50269 13.3415 6.0924 14 7.75 14C9.4076 14 10.9973 13.3415 12.1694 12.1694C13.3415 10.9973 14 9.4076 14 7.75C14 6.0924 13.3415 4.50269 12.1694 3.33058C10.9973 2.15848 9.4076 1.5 7.75 1.5C6.0924 1.5 4.50269 2.15848 3.33058 3.33058C2.15848 4.50269 1.5 6.0924 1.5 7.75V7.75Z" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                    <path d="M12.814 12.8132L15.5 15.4999" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                                </svg>
                                <input type="search" class="form-control rounded-pill search_input" placeholder="Search..">
                            </div>
                        </li>

                        <li class="nav-item py-2 py-xl-0">
                            <div class="d-flex align-items-center gap-2">
                                <button class="btn btn-outline-light rounded-pill px-3" style="width: 100px;">
                                    Login
                                </button>
                                <button class="btn btn-primary rounded-pill px-3" style="width: 100px;">
                                    Sign up
                                </button>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>