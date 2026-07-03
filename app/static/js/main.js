// ─── DOM Ready ───────────────────────────────────
document.addEventListener('DOMContentLoaded', () => {

  // ─── Navbar Toggle ───────────────────────────
  const navToggle = document.getElementById('navToggle');
  const navLinks = document.getElementById('navLinks');

  if (navToggle) {
    navToggle.addEventListener('click', () => {
      navLinks.classList.toggle('active');
    });

    // Close on link click
    navLinks.querySelectorAll('.nav-link').forEach(link => {
      link.addEventListener('click', () => {
        navLinks.classList.remove('active');
      });
    });
  }

  // ─── Navbar Scroll Effect ────────────────────
  const navbar = document.getElementById('navbar');
  let lastScroll = 0;

  window.addEventListener('scroll', () => {
    const scrollY = window.scrollY;
    if (scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
    lastScroll = scrollY;
  });

  // ─── Active Nav Link ─────────────────────────
  const currentPath = window.location.pathname;
  document.querySelectorAll('.nav-link').forEach(link => {
    const href = link.getAttribute('href');
    if (href === currentPath || (currentPath === '/' && href === '/')) {
      link.classList.add('active');
    }
  });

  // ─── Scroll Animation (Intersection Observer) ─
  const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
  };

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.style.animationPlayState = 'running';
        observer.unobserve(entry.target);
      }
    });
  }, observerOptions);

  document.querySelectorAll('[data-delay]').forEach(el => {
    el.style.animationPlayState = 'paused';
    observer.observe(el);
  });

  // Also observe content cards and team cards
  document.querySelectorAll('.content-card, .team-card').forEach(el => {
    if (el.dataset.delay) return; // already handled above
    el.style.opacity = '0';
    el.style.transform = 'translateY(24px)';
    el.style.transition = 'opacity 0.6s ease-out, transform 0.6s ease-out';
    observer.observe(el);
  });

  // ─── Hero Stats Counter ──────────────────────
  const statNumbers = document.querySelectorAll('.stat-number');
  if (statNumbers.length) {
    const statObserver = new IntersectionObserver((entries) => {
      entries.forEach(entry => {
        if (entry.isIntersecting) {
          const target = parseInt(entry.target.dataset.target) || 100;
          animateCounter(entry.target, target);
          statObserver.unobserve(entry.target);
        }
      });
    }, { threshold: 0.5 });

    statNumbers.forEach(el => statObserver.observe(el));
  }

  function animateCounter(el, target) {
    let current = 0;
    const increment = Math.ceil(target / 60);
    const interval = setInterval(() => {
      current += increment;
      if (current >= target) {
        current = target;
        clearInterval(interval);
      }
      el.textContent = current;
    }, 20);
  }

  // ─── System Monitor (if on home page) ────────
  const monitorGrid = document.getElementById('monitorGrid');
  if (monitorGrid) {
    fetchSystemInfo();

    // Refresh every 5 seconds
    setInterval(fetchSystemInfo, 5000);
  }

  async function fetchSystemInfo() {
    try {
      const res = await fetch('/api/system/info');
      const data = await res.json();

      // CPU
      const cpuPct = Math.round(data.cpu_percent);
      updateRing('cpuRing', cpuPct);
      document.getElementById('cpuPercent').textContent = cpuPct;
      document.getElementById('cpuCores').textContent = data.cpu_count;

      // RAM
      const mem = data.memory;
      const memPct = Math.round(mem.percent);
      updateBar('ramBar', memPct);
      document.getElementById('ramPercent').textContent = memPct;
      document.getElementById('ramUsed').textContent = formatBytes(mem.used);
      document.getElementById('ramTotal').textContent = formatBytes(mem.total);

      // Disk
      const disk = data.disk;
      const diskPct = Math.round(disk.percent);
      updateBar('diskBar', diskPct);
      document.getElementById('diskPercent').textContent = diskPct;
      document.getElementById('diskUsed').textContent = formatBytes(disk.used);
      document.getElementById('diskTotal').textContent = formatBytes(disk.total);

      // Uptime
      const seconds = data.uptime_seconds;
      document.getElementById('uptimeDisplay').textContent = formatUptime(seconds);
      document.getElementById('hostnameDisplay').textContent = data.hostname;

    } catch (err) {
      console.error('Monitor fetch error:', err);
    }
  }

  function updateRing(id, percent) {
    const ring = document.getElementById(id);
    if (!ring) return;
    const circumference = 339.292; // 2 * PI * 54
    const offset = circumference - (percent / 100) * circumference;
    ring.style.strokeDashoffset = offset;
  }

  function updateBar(id, percent) {
    const bar = document.getElementById(id);
    if (!bar) return;
    bar.style.width = percent + '%';
  }

  function formatBytes(bytes) {
    if (bytes === 0) return '0 B';
    const sizes = ['B', 'KB', 'MB', 'GB', 'TB'];
    const i = Math.floor(Math.log(bytes) / Math.log(1024));
    return (bytes / Math.pow(1024, i)).toFixed(1) + ' ' + sizes[i];
  }

  function formatUptime(seconds) {
    const d = Math.floor(seconds / 86400);
    const h = Math.floor((seconds % 86400) / 3600);
    const m = Math.floor((seconds % 3600) / 60);
    const parts = [];
    if (d > 0) parts.push(d + 'd');
    if (h > 0) parts.push(h + 'h');
    parts.push(m + 'm');
    return parts.join(' ');
  }
});
