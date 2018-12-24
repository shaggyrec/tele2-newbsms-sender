#!/bin/bash
dir=$(cd "$(dirname "$0")";pwd);

${dir}/unit/run.sh $*
