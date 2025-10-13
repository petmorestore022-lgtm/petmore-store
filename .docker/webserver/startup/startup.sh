#!/bin/bash

# frankenphp run \
#   --docroot pub \
#   --host 0.0.0.0 \
#   --port 8084 \
#   --workers 4 \
#   --cpus 2 \
#   --memory 1G
# Em vez de --docroot, use --root
frankenphp run --root pub --host 0.0.0.0 --port 8084
