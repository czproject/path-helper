#!/bin/bash

../vendor/bin/tester -p php -j 40 --coverage coverage.html --coverage-src ../src -c php-unix.ini
