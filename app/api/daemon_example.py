"""
Daemon Process Example — Nexus
Fixed version of the original Daemon.py
"""
from flask import Flask

app = Flask(__name__)

@app.route('/')
def home():
    return "Hola — Daemon is running!"

def run():
    import daemon

    with daemon.DaemonContext():
        app.run(host='0.0.0.0', port=5000)

if __name__ == '__main__':
    # Without daemon for development
    app.run(host='0.0.0.0', port=5000, debug=True)
