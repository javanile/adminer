#!/bin/bash

set -eux

git commit -am "Deploy as $(date)" && git push

IMAGE_NAME=javanile/adminer

docker build --no-cache --pull -t $IMAGE:latest .
docker push $IMAGE:latest
