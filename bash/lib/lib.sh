# add new hostname into /etc/hosts
addhost() {
  local hostName=$1
  local ip="${2:-127.0.0.1}"
  local etcHostsFile="${3:-/etc/hosts}"
  local hostLine=$(printf "%s\t%s\n" "$ip" "$hostName")

  if [ -z $hostName ]
  then
    return 0
  fi

  echo -e "Adding \033[1m$hostName\033[0m to the host \033[1m$etcHostsFile\033[0m...";

  if [ -n "$(grep [[:space:]]$hostName $etcHostsFile)" ]
  then
    echo -e " - Error: record \033[1m$hostName\033[0m already exists -> \033[3m'$(grep $hostName $etcHostsFile)'\033[0m"
    return 0
  fi

  echo "$hostLine" | sudo tee -a "$etcHostsFile"

  if [ -z "$(grep [[:space:]]$hostName $etcHostsFile)" ]
  then
    echo " - Error: Something went wrong $hostName was not added :(";
    return 0
  fi

  tput bold
  echo "$hostName was added successfully!";
  tput sgr0

  return 1
}
