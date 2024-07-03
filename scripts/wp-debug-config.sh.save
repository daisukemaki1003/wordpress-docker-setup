#!/bin/bash

# Wait for WordPress to be fully set up
sleep 30

# Add debug settings to wp-config.php
cat <<EOT >> /var/www/html/wp-config.php

define('WP_DEBUG', true);
define('WP_DEBUG_LOG', true);
define('WP_DEBUG_DISPLAY', true);
EOT
