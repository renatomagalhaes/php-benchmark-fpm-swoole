#!/usr/bin/env sh

echo
echo "FPM"
wrk -t8 -c64 -d5s --latency http://web:8080/

sleep 10

echo
echo "Swoole"
wrk -t8 -c64 -d5s --latency http://web/
