#!/bin/sh
set -ex

# set permissions -- https://symfony.com/doc/current/setup/file_permissions.html
HTTPDUSER='www-data'
setfacl -dR -m u:"$HTTPDUSER":rwX -m u:$(whoami):rwX /var/www/html/var
setfacl -R -m u:"$HTTPDUSER":rwX -m u:$(whoami):rwX /var/www/html/var

printenv | grep -v "no_proxy" >> /etc/environment

apache2-foreground