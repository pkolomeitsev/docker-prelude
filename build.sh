#!/bin/bash

source ./bash/lib/lib.sh

# options
SITE=''
GIT=0
HOST=0

# system settings
NGINX_CONF_TEMPLATE='./nginx/templates/template.conf'
NGINX_INDEX_TEMPLATE='./php/templates/index.php'
NGINX_CONF_DIR='./nginx/conf.d'
NGINX_SERVICE_NAME='nginx-service'
IP='127.0.0.1'
ETC_HOSTS='/etc/hosts'

# host user data settings for container non-sudo user
HOST_UID=$(id -u)
HOST_GID=$(id -g)

help() {
  echo "./build.sh allowed options:"
  echo "  -s|--site <site_name> this will create <site_name> directory in ./apps/<site_name> with index.php file"
  echo "            and populate nginx config in $NGINX_CONF_DIR/<site_name>.conf file"
  echo "  -g|--git [subattribute of -s|--site] this will init Git repository in ./apps/<site_name> directory"
  echo "  -h|--host [subattribute of -s|--site] this will update your $ETC_HOSTS on the host machine by adding '$IP <site_name>' string"
  echo ""
  echo "  --all shortcut of 'docker compose up -d --build' command"
  echo "  --run shortcut of 'docker compose up -d' command"
  echo "  --down shortcut of 'docker compose down --remove-orphans' command"
  echo "  --restart shortcut of 'docker compose restart' command to restart services"
  echo "  --status shortcut of 'docker compose ps' command"
  echo "  --build-no-cache shortcut of 'docker compose build --no-cache' command"
  echo ""
  echo "  --help shows this documentation"
  echo "Examples:"
  echo " > ./build.sh --all"
  echo " > ./build.sh -s mysite.local -g -h"

  return
}

while [[ $# -gt 0 ]]; do
  case $1 in
    --all)
      export HOST_UID
      export HOST_GID
      docker compose up -d --build
      exit 1
      ;;
    --run)
      docker compose up -d
      exit 1
      ;;
    --down)
      docker compose down --remove-orphans
      exit 1
      ;;
    --status)
      docker compose ps
      exit 1
      ;;
    --restart)
      docker compose restart
      exit 1
      ;;
    --build-no-cache)
      export HOST_UID
      export HOST_GID
      docker compose down
      docker compose build --no-cache && docker compose up -d
      exit 1
      ;;
    -s|--site)
      SITE="$2"
      shift # past argument
      shift # past value
      ;;
    -g|--git)
      GIT=1
      shift # past argument only
      ;;
    -h|--host)
      HOST=1
      shift # past argument only
      ;;
    --help)
      help
      exit 1
      ;;
    -*|--*)
      echo "Unknown option '$1'"
      help
      exit 1
      ;;
    *)
      echo "Unknown option '$1'"
      help
      exit 1
      ;;
  esac
done

# if empty site, show help
if [ -z $SITE ]
then
  help
  exit 1
fi

NGINX_CONF_SITE=$NGINX_CONF_DIR/$SITE.conf
NGINX_SITE_DIR=./apps/$SITE
NGINX_SITE_INDEX=./apps/$SITE/index.php

# copy index.php template
echo "Making $NGINX_SITE_DIR working directory..."
if [ -d $NGINX_SITE_DIR ]
then
  echo -e " - Error: directory already \033[1m$NGINX_SITE_DIR\033[0m exists."
  exit 1
fi
mkdir $NGINX_SITE_DIR && cp $NGINX_INDEX_TEMPLATE $NGINX_SITE_INDEX

# setup git repository
if [ $GIT == 1 ]
then
  echo "Initializing git repository..."
  git init $NGINX_SITE_DIR
fi

# copy nginx .conf template
echo "Populate nginx config..."
cp $NGINX_CONF_TEMPLATE $NGINX_CONF_SITE

# replace <site_name> placeholder
sed -i "s/<site_name>/$SITE/g" $NGINX_CONF_SITE $NGINX_SITE_INDEX

# set host name /etc/hosts
if [ $HOST == 1 ]
then
  addhost $SITE $IP $ETC_HOSTS
else
  echo "Please update your $ETC_HOSTS with $SITE manually"
fi

# restart nginx service
if docker compose ps | grep -q nginx
then
  echo "Restart nginx service..."
  docker compose restart $NGINX_SERVICE_NAME
fi

echo "Please visit your site -> http://$SITE/ or https://$SITE/"

tput bold
echo "Done!";
tput sgr0

#
# @author p.kolomeitsev@gmail.com
# @site https://pkolomeitsev.blogspot.com
# @github https://github.com/pkolomeitsev/docker-prelude
#

