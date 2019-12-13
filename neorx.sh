#!/bin/bash
export NEORX_LABEL="adminer"

##
# neo(rx) file
##

case "${NEORX_COMMAND}" in
  run)  docker run --rm --name adminer -p 8080:8080 javanile/adminer ;;
  stop) docker stop adminer ;;
  *)    echo "Undefined command, use: run, stop." ;;
esac
