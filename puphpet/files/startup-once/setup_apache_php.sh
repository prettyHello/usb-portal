sudo a2dismod worker
sudo a2enmod php7.1
sudo service apache2 restart
sudo rm -rf /etc/apache2/sites-enabled/10-default_vhost_80.conf
sudo service apache2 restart
sudo apt install php7.1-ldap