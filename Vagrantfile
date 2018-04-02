# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|
  config.vm.box = "ubuntu/xenial64"
  config.vm.network "private_network", ip: "192.168.33.10"
  config.vm.synced_folder ".", "/var/www", :mount_options => ["dmode=777", "fmode=666"]

  config.vm.provision "shell", inline: <<-SHELL
    chmod 777 /var/www/
    apt-get update
    apt-get upgrade -y
    apt-get install -y nginx php-fpm php-mcrypt php-zip php-xml php-mbstring
    debconf-set-selections <<< 'mysql-server mysql-server/root_password password root'
    debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password root'
    apt-get -y install mysql-server
    apt-get -y install php-mysql
    if [ -f /var/www/nginx-default ]; then cp /var/www/nginx-default /etc/nginx/sites-available/default; service nginx reload; fi
    mysql -uroot -proot -e "create database swagshop;"
  SHELL
end
