#!/bin/sh

sleep 5

/run_nginx.sh -D

status=$?
if [ $status -ne 0 ]; then
  echo "Nginx Failed: $status" > status1.txt
  exit $status
  else echo "Starting Nginx: OK" > status2.txt
fi

sleep 2

while /bin/true; do

  ps aux | grep 'nginx: master process' | grep -q -v grep
  NGINX_STATUS=$?
  echo "Checking NGINX, Status Code: $NGINX_STATUS" > status3.txt
  sleep 2
   if [ $NGINX_STATUS -ne 0 ];
     then
       echo "$(date +%F_%T) FATAL: NGINX Raised a Status Code of $NGINX_STATUS and exited" > status4.txt
       exit -1

   else
     sleep 2
        echo "$(date +%F_%T) - HealtCheck: NGINX: OK" > status5.txt
  fi
  sleep 2
done

