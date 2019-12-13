#!/bin/bash
export neorx_label=adminer

##
# neo(rx) file
##

case "${neorx_command}" in
  run)  docker run --rm -d --name adminer -p 8080:8080 javanile/adminer ;;
  stop) docker stop adminer ;;
  *)    echo "Undefined command, use: run, stop." ;;
esac
