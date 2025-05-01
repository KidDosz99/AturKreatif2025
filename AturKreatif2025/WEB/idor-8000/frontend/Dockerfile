FROM httpd:2.4

# Enable proxy modules
RUN apt-get update && \
    apt-get install -y vim && \
    sed -i '/^#LoadModule proxy_module/s/^#//' /usr/local/apache2/conf/httpd.conf && \
    sed -i '/^#LoadModule proxy_http_module/s/^#//' /usr/local/apache2/conf/httpd.conf && \
    sed -i '/^#LoadModule proxy_fcgi_module/s/^#//' /usr/local/apache2/conf/httpd.conf

# Copy site
COPY . /usr/local/apache2/htdocs/

# Inject Proxy rules
RUN echo 'ProxyPass "/api/" "http://api:8002/api/"\n\
ProxyPassReverse "/api/" "http://api:8002/api/"' >> /usr/local/apache2/conf/httpd.conf
