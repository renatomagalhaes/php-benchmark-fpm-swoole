#!/usr/bin/env sh

sleep 30

echo
echo "FPM"
wrk -t8 -c64 -d5s --latency http://web:8080/

sleep 5

echo
echo "Swoole"
wrk -t8 -c64 -d5s --latency http://web/
