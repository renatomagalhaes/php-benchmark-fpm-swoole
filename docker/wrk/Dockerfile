FROM williamyeh/wrk

COPY ./docker/wrk/bench.sh /app/bench.sh

RUN chmod +x /app/bench.sh

WORKDIR /app

ENTRYPOINT ["/app/bench.sh"]