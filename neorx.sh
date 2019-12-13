#!/bin/bash
export NEORX_LABEL=adminer
set -x

case ${NEORX_COMMAND}  
  run)  docker run --rm --name adminer -P 8080:8080 javanile/adminer
  stop) docker stop adminer
  *)    echo "Undefined command, use: rum, stop."
esac
