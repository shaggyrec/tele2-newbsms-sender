#!/bin/bash

dir=$(cd "$(dirname "$0")";pwd);

cd ${dir}
php ../../vendor/bin/phpunit --colors=always --testsuite '' $*
