#Virtual Host configuration for example.com

#You can move that to a different file under sites-available/ and symlink that
#to sites-enabled/ to enable it.

server {
	listen 80;
	listen [::]:80;

	server_name groozgo.dev01.pinkslip.ru www.groozgo.dev01.pinkslip.ru;

	root /var/www/groozgo.dev01.pinkslip.ru/public_html/src/web;
	
	index index.php index.html;

	location / {
		try_files $uri $uri/ /index.php$is_args$args;
	}

	location ~ \.php {
		fastcgi_pass  unix:/var/run/php/php7.0-fpm.sock;
	        fastcgi_index index.php;
		    include fastcgi_params;
	        fastcgi_split_path_info       ^(.+\.php)(/.+)$;
	        fastcgi_param PATH_INFO       $fastcgi_path_info;
	        fastcgi_param PATH_TRANSLATED $document_root$fastcgi_path_info;
	        fastcgi_param SCRIPT_FILENAME $document_root$fastcgi_script_name;
    }
}

