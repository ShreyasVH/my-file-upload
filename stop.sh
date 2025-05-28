if lsof -i:$PORT > /dev/null; then
    echo "Stopping"
    kill -9 $(lsof -i:$PORT -t)
fi