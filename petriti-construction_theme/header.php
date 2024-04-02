<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <?php wp_head(); ?>
    <style>
        .menu-item-has-children .sub-menu {
            display: none;
        }

        .menu-item-has-children.active .sub-menu {
            display: block;
        }

        .menu-item-has-children .fa-chevron-down:before {
            content: "\f078"; 
        }

        .menu-item-has-children.active .fa-chevron-down:before {
            content: "\f054";
        }
    </style>
</head>

<body <?php body_class(); ?>>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light site-header">
            <div class="container">
                <a class="navbar-brand" href="<?php echo esc_url(home_url('/')); ?>">
                    <div class="site-logo">
                        <img src="<?php echo get_template_directory_uri(); ?>/petriti-logo.png" alt="Logo">
                    </div>
                </a>
                <button class="navbar-toggler mb-4" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                   
                    <div class="header-buttons d-flex ms-auto gap-3">
                        <a href="#" class="button">BALLINA</a>
                        <a href="#" class="button">RRETH NESH</a>
                        <a href="#" class="button">KONTAKTI</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Get all menu items with sub-menus
            var menuItemsWithSubmenus = document.querySelectorAll('.menu-item-has-children');

            menuItemsWithSubmenus.forEach(function(menuItem) {
                var submenu = menuItem.querySelector('.sub-menu');
                submenu.style.display = 'none';

                menuItem.addEventListener('mouseover', function() {
                    submenu.style.display = 'block';
                });

                menuItem.addEventListener('mouseout', function() {
                    submenu.style.display = 'none';
                });
            });
        });
    </script>
</body>
</html>
