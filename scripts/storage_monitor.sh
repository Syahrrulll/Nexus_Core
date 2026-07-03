#!/bin/bash
# Storage Monitor Script — Nexus
# Monitor penggunaan disk, laporan harian

LOG_DIR="/var/log/os-monitor"
LOG_FILE="$LOG_DIR/storage-$(date +%Y%m%d).log"
THRESHOLD=80

mkdir -p "$LOG_DIR"

{
  echo "═══════════════════════════════════════════"
  echo " Storage Monitor — $(date)"
  echo "═══════════════════════════════════════════"
  echo ""
  echo "=== Disk Usage ==="
  df -h
  echo ""
  echo "=== Largest Directories (/) ==="
  du -sh /* 2>/dev/null | sort -rh | head -10
  echo ""
  echo "=== Inode Usage ==="
  df -i
  echo ""
  echo "=== Top 10 Largest Files ==="
  find / -type f -exec du -Sh {} + 2>/dev/null | sort -rh | head -10
  echo ""
  echo "=== Memory Info ==="
  free -h
  echo ""

  # Check threshold
  USAGE=$(df / | awk 'NR==2 {print $5}' | sed 's/%//')
  if [ "$USAGE" -gt "$THRESHOLD" ]; then
    echo "⚠️  WARNING: Disk usage at ${USAGE}% (threshold: ${THRESHOLD}%)"
  else
    echo "✓ Disk usage: ${USAGE}% — OK"
  fi
} >> "$LOG_FILE" 2>&1

echo "Log saved: $LOG_FILE"
