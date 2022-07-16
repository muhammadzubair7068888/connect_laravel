#!/bin/bash

# Restart Supervisor workers

# During deployment, some of the workers might have
# SPAWN ERR errors, so it's better to restart them.

# At this point in time, the whole app
# has already been deployed.
sudo amazon-linux-extras enable epel

sudo yum install -y epel-release

sudo yum -y update

sudo yum -y install supervisor

sudo systemctl start supervisord

sudo systemctl enable supervisord

sudo cp .platform/files/supervisor.ini /etc/supervisord.d/laravel.ini

sudo supervisorctl reread

sudo supervisorctl update

sudo supervisorctl restart all
