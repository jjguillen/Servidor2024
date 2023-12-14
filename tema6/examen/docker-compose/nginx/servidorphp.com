server {
        listen 80;
        listen [::]:80;

        root /var/www/servidorphp.com/html;
        index index.html index.htm index.php index.nginx-debian.html;

        server_name servidorphp.com www.servidorphp.com;

        location / {
                try_files $uri $uri/ =404;
        }

        location /tema6/imgs/ {
                
        }
}