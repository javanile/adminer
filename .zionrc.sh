#!/bin/bash
label=adminer

##
# Zion(rc)file
##

case "${command}" in
  run)  
    docker run --rm -d --name adminer -p 8080:8080 javanile/adminer ;;
  stop) 
    docker stop adminer ;;
  help|*)    
    echo "Undefined command, use: run, stop." ;;
esac
