#!/bin/sh

sleep 5

/usr/sbin/nginx -c /etc/nginx/nginx.conf

status=$?
if [ $status -ne 0 ]; then
  echo "Nginx Failed: $status"
  exit $status
  else echo "Starting Nginx: OK"
fi

sleep 2

while /bin/true; do

  ps aux | grep 'nginx: master process' | grep -q -v grep
  NGINX_STATUS=$?
  echo "Checking NGINX, Status Code: $NGINX_STATUS"
  sleep 2
   elif [ $NGINX_STATUS -ne 0 ];
     then
       echo "$(date +%F_%T) FATAL: NGINX Raised a Status Code of $NGINX_STATUS and exited"
       exit -1

   else
     sleep 2
        echo "$(date +%F_%T) - HealtCheck: NGINX: OK"
  fi
  sleep 2
done

