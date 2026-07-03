#!/bin/bash
# Daemon Manager — Nexus
# Mengelola daemon process monitoring

WORK_DIR="/opt/os-monitor-daemon"
LOG_FILE="$WORK_DIR/daemon.log"
PID_FILE="/var/run/os-monitor-daemon.pid"
MONITOR_INTERVAL=${2:-60}  # Default 60 detik

log_message() {
    echo "$(date '+%Y-%m-%d %H:%M:%S') - $1" >> "$LOG_FILE"
}

check_process() {
    if [ -f "$PID_FILE" ]; then
        pid=$(cat "$PID_FILE")
        if ps -p "$pid" > /dev/null 2>&1; then
            return 0
        fi
    fi
    return 1
}

monitor_system() {
    log_message "Daemon started (interval: ${MONITOR_INTERVAL}s)"
    while true; do
        cpu=$(top -bn1 2>/dev/null | grep "Cpu(s)" | awk '{print $2}')
        mem=$(free -m 2>/dev/null | awk 'NR==2{printf "%.1f%%", $3*100/$2}')
        disk=$(df -h / 2>/dev/null | awk 'NR==2{print $5}')
        proc_count=$(ps aux 2>/dev/null | wc -l)

        log_message "CPU: ${cpu}% | MEM: ${mem} | DISK: ${disk} | PROCS: ${proc_count}"
        sleep "$MONITOR_INTERVAL"
    done
}

start() {
    if check_process; then
        echo "Daemon already running (PID: $(cat $PID_FILE))"
        exit 1
    fi

    mkdir -p "$WORK_DIR"
    touch "$LOG_FILE"

    monitor_system &
    echo $! > "$PID_FILE"
    echo "Daemon started (PID: $!)"
}

stop() {
    if ! check_process; then
        echo "Daemon not running"
        exit 1
    fi

    pid=$(cat "$PID_FILE")
    kill "$pid"
    rm -f "$PID_FILE"
    log_message "Daemon stopped"
    echo "Daemon stopped"
}

status() {
    if check_process; then
        echo "✓ Daemon running (PID: $(cat $PID_FILE))"
        echo "Last logs:"
        tail -n 3 "$LOG_FILE" 2>/dev/null
    else
        echo "✗ Daemon not running"
    fi
}

case "${1:-}" in
    start)   start ;;
    stop)    stop ;;
    restart) stop; sleep 1; start ;;
    status)  status ;;
    *)
        echo "Usage: $0 {start|stop|restart|status} [interval_seconds]"
        echo "  $0 start 60   → Start daemon, check every 60s"
        exit 1
        ;;
esac
