# Gunakan imej Nginx rasmi
FROM nginx:latest

# Salin fail konfigurasi Nginx
COPY nginx.conf /etc/nginx/nginx.conf

# Salin fail HTML, CSS, dan JS ke direktori web server Nginx
COPY index.html /usr/share/nginx/html/index.html
COPY style.css /usr/share/nginx/html/styles.css
COPY script.js /usr/share/nginx/html/script.js

# Buka port 80 untuk akses web
EXPOSE 80

# Jalankan Nginx sebagai server
CMD ["nginx", "-g", "daemon off;"]
