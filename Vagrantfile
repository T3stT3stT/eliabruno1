# -*- mode: ruby -*-
# vi: set ft=ruby :

# All Vagrant configuration is done below. The "2" in Vagrant.configure
# configures the configuration version (we support older styles for
# backwards compatibility). Please don't change it unless you know what
# you're doing.

Vagrant.configure("2") do |config|
config.vm.define "db01" do |subconfig|
    subconfig.vm.box = "ubuntu/xenial64"
    subconfig.vm.hostname = "db01"
    subconfig.vm.network :private_network, ip: "192.168.55.100"
    subconfig.vm.synced_folder ".", "/var/folder"
 config.vm.provision "shell", inline: <<-SHELL
   sudo apt-get -y update 
   sudo apt-get -y upgrade 
   sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password password 1234Qwer'
   sudo debconf-set-selections <<< 'mysql-server mysql-server/root_password_again password 1234Qwer'
   sudo apt-get install -y mysql-server
   sudo reboot
   sudo cd /etc/mysql/mysql.conf.d/
   sudo rm mysqld.cnf
   sudo cd /var/ 
   sudo mv mysqld.cnf /etc/mysql/mysql.conf.d/
   sudo cd /var/folder
   sudo mysql -u root -p 1234Qwer < mysqldump.dump
   sudo reboot
end

  config.vm.define "web01" do |subconfig|
    subconfig.vm.box = "ubuntu/xenial64" 
    subconfig.vm.hostname = "web01" 
    subconfig.vm.network "private_network", ip:"192.168.55.101" 
    subconfig.vm.network "forwarded_port", guest:80, host:8990
    subconfig.vm.synced_folder ".", "/var/www/html"
  config.vm.provision "shell", inline: <<-SHELL
  sudo apt-get -y update 
  sudo apt-get -y upgrade 
  sudo reboot
  sudo apt-get install -y apache2 
  sudo apt-get install -y php
  sudo apt-get install -y mysql-client
  sudo reboot
SHELL
end

 config.vm.provision "shell", inline: <<-SHELL
    apt-get install -y avahi-daemon libnss-mdns
SHELL
end

