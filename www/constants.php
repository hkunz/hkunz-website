<?php
	$BASE_DIR = __DIR__; # Absolute path to your installation, /home/hkunz/workspace/hkunz-website.git/www
	$DOC_ROOT = preg_replace("!${_SERVER['SCRIPT_NAME']}$!", '', $_SERVER['SCRIPT_FILENAME']); # /var/www/html
	$BASE_URL = preg_replace("!^${DOC_ROOT}!", '', $BASE_DIR); # /home/hkunz/workspace/hkunz-website.git/www
	$PROTOCOL = empty($_SERVER['HTTPS']) ? 'http' : 'https'; # http
	$PORT = $_SERVER['SERVER_PORT']; # 80
	$DISP_PORT = ($PROTOCOL == 'http' && $PORT == 80 || $PROTOCOL == 'https' && $PORT == 443) ? '' : ":$PORT";
	$DOMAIN = $_SERVER['SERVER_NAME']; # hkunz-test.com
	$FULL_URL = "${PROTOCOL}://${DOMAIN}${DISP_PORT}${BASE_URL}"; # http://hkunz-test.com/home/akiko/workspace/hkunz-website.git/www

	$IMAGE_PATH = "/assets/images";
?>