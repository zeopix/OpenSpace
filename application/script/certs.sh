cd /var/www/symfony/var && \
mkdir -p jwt && cd jwt && \
openssl genrsa -out private.pem -aes256 4096 && \
openssl rsa -pubout -in private.pem -out public.pem \
