#!/bin/sh

sleep 5

/usr/sbin/php-fpm7 -D

status=$?
if [ $status -ne 0 ]; then
  echo "php-fpm7 Failed: $status" > status1.txt
  exit $status
  else echo "Starting PHP-FPM: OK" > status2.txt
fi

while /bin/true; do
  ps aux | grep 'php-fpm: master process' | grep -q -v grep
  PHP_FPM_STATUS=$?
  echo "Checking PHP-FPM, Status Code: $PHP_FPM_STATUS" > status3.txt
  sleep 2

  if [ $PHP_FPM_STATUS -ne 0 ];
    then
      echo "$(date +%F_%T) FATAL: PHP-FPM Raised a Status Code of $PHP_FPM_STATUS and exited" > status4.txt
      exit -1

   else
     sleep 2
        echo "$(date +%F_%T) - HealtCheck: PHP-FPM: OK" > status5.txt
  fi
  sleep 2
done
