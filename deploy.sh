if ! lsof -i :$PORT > /dev/null; then
    echo "Starting"
    php -S "0.0.0.0:$PORT" -t public > server.log 2>&1 &
fi