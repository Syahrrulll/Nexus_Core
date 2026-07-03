from fastapi import APIRouter
import psutil, platform, time

router = APIRouter()

@router.get("/system/info")
def system_info():
    boot_time = psutil.boot_time()
    return {
        "platform": platform.platform(),
        "processor": platform.processor(),
        "cpu_count": psutil.cpu_count(),
        "cpu_percent": psutil.cpu_percent(interval=0.5),
        "memory": psutil.virtual_memory()._asdict(),
        "disk": psutil.disk_usage("/")._asdict(),
        "boot_time": boot_time,
        "uptime_seconds": time.time() - boot_time,
        "hostname": platform.node()
    }

@router.get("/system/processes")
def list_processes():
    procs = []
    for p in psutil.process_iter(["pid", "name", "cpu_percent", "memory_percent", "status"]):
        try:
            procs.append(p.info)
        except (psutil.NoSuchProcess, psutil.AccessDenied):
            pass
    return sorted(procs, key=lambda x: x.get("cpu_percent", 0), reverse=True)[:50]
