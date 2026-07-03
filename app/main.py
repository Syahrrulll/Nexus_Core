from fastapi import FastAPI, Request
from fastapi.responses import HTMLResponse
from fastapi.staticfiles import StaticFiles
from fastapi.templating import Jinja2Templates
import jinja2
import psutil, platform, time, os

from app.api.orders import router as orders_router
from app.api.system import router as system_router

app = FastAPI(title="Nexus", description="Nexus Platform")

# Mount static files
app.mount("/static", StaticFiles(directory="app/static"), name="static")

# Templates with cache fix for Starlette 1.0.0 + Jinja2 3.1 compat
env = jinja2.Environment(
    loader=jinja2.FileSystemLoader("app/templates"),
    auto_reload=True,
    cache_size=0,  # Disable cache to avoid tuple/dict key issue
)
templates = Jinja2Templates(env=env)

# Routers
app.include_router(orders_router, prefix="/api", tags=["Orders"])
app.include_router(system_router, prefix="/api", tags=["System"])

# ── Pages ──────────────────────────────────────────────────

@app.get("/", response_class=HTMLResponse)
async def home(request: Request):
    return templates.TemplateResponse(request, "index.html", {
        "title": "Nexus - Home"
    })

@app.get("/os-concepts", response_class=HTMLResponse)
async def os_concepts(request: Request):
    return templates.TemplateResponse(request, "os_concepts.html", {
        "title": "Konsep Arsitektur Sistem"
    })

@app.get("/daemon", response_class=HTMLResponse)
async def daemon_page(request: Request):
    return templates.TemplateResponse(request, "daemon.html", {
        "title": "Daemon Process"
    })

@app.get("/orders", response_class=HTMLResponse)
async def orders_page(request: Request):
    return templates.TemplateResponse(request, "orders.html", {
        "title": "Order Management"
    })

@app.get("/docker-guide", response_class=HTMLResponse)
async def docker_guide(request: Request):
    return templates.TemplateResponse(request, "docker_guide.html", {
        "title": "Panduan Docker"
    })

@app.get("/team", response_class=HTMLResponse)
async def team(request: Request):
    return templates.TemplateResponse(request, "team.html", {
        "title": "Tim Nexus"
    })
