<?php
// sidebar-header.php - Responsive version
?>
<style>
  /* Mobile Menu Toggle Button */
  .menu-toggle {
    display: none;
    position: fixed;
    top: 15px;
    left: 15px;
    z-index: 1001;
    width: 40px;
    height: 40px;
    background: #1C1917;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 5px;
  }
  .menu-toggle span {
    width: 22px;
    height: 2px;
    background: #F5EFE4;
    border-radius: 2px;
    transition: 0.3s;
  }
  .menu-toggle.active span:nth-child(1) {
    transform: rotate(45deg) translate(5px, 5px);
  }
  .menu-toggle.active span:nth-child(2) {
    opacity: 0;
  }
  .menu-toggle.active span:nth-child(3) {
    transform: rotate(-45deg) translate(7px, -7px);
  }

  /* Sidebar Styles - Responsive */
  .sidebar {
    width: 240px;
    height: 100vh;
    background: #1C1917;
    display: flex;
    flex-direction: column;
    flex-shrink: 0;
    position: fixed;
    left: 0;
    top: 0;
    overflow: hidden;
    font-family: 'DM Sans', sans-serif;
    z-index: 100;
    transition: transform 0.3s ease;
  }
  .sidebar::before {
    content: '';
    position: absolute;
    bottom: -60px;
    right: -60px;
    width: 220px;
    height: 220px;
    border-radius: 50%;
    background: radial-gradient(circle, rgba(196,168,130,0.12) 0%, transparent 70%);
    pointer-events: none;
  }
  .sidebar-logo {
    padding: 28px 24px 20px;
    border-bottom: 0.5px solid rgba(255,255,255,0.08);
  }
  .logo-mark {
    font-family: 'Cormorant Garamond', serif;
    font-size: 18px;
    letter-spacing: 0.22em;
    text-transform: uppercase;
    color: #F5EFE4;
    font-weight: 400;
  }
  .logo-sub {
    font-size: 10px;
    letter-spacing: 0.1em;
    text-transform: uppercase;
    color: rgba(196,168,130,0.6);
    margin-top: 3px;
  }
  .sidebar-nav {
    flex: 1;
    padding: 20px 12px;
    display: flex;
    flex-direction: column;
    gap: 2px;
    overflow-y: auto;
  }
  .nav-section-label {
    font-size: 9px;
    letter-spacing: 0.16em;
    text-transform: uppercase;
    color: rgba(154,143,131,0.5);
    padding: 14px 12px 6px;
  }
  .nav-item {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 9px 12px;
    border-radius: 6px;
    color: rgba(245,239,228,0.55);
    font-size: 13px;
    cursor: pointer;
    transition: all 0.2s;
    position: relative;
  }
  .nav-item:hover {
    background: rgba(255,255,255,0.05);
    color: #F5EFE4;
  }
  .nav-item.active {
    background: rgba(196,168,130,0.15);
    color: #F5EFE4;
  }
  .nav-item.active::before {
    content: '';
    position: absolute;
    left: 0;
    top: 20%;
    bottom: 20%;
    width: 2px;
    background: #C4A882;
    border-radius: 0 2px 2px 0;
  }
  .nav-icon {
    width: 16px;
    height: 16px;
    stroke: currentColor;
    fill: none;
    stroke-width: 1.5;
    flex-shrink: 0;
  }
  .nav-badge {
    margin-left: auto;
    background: #8C6E50;
    color: #F5EFE4;
    font-size: 10px;
    padding: 2px 6px;
    border-radius: 10px;
    font-weight: 400;
  }
  .sidebar-user {
    padding: 16px;
    border-top: 0.5px solid rgba(255,255,255,0.08);
    display: flex;
    align-items: center;
    gap: 10px;
  }
  .user-avatar {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    background: linear-gradient(135deg, #C4A882, #8C6E50);
    display: flex;
    align-items: center;
    justify-content: center;
    font-family: 'Cormorant Garamond', serif;
    font-size: 14px;
    color: #F5EFE4;
    flex-shrink: 0;
  }
  .user-name {
    font-size: 12px;
    color: #F5EFE4;
    font-weight: 400;
  }
  .user-role {
    font-size: 10px;
    color: rgba(196,168,130,0.6);
    letter-spacing: 0.06em;
  }
  .sidebar::-webkit-scrollbar {
    width: 4px;
  }
  .sidebar::-webkit-scrollbar-track {
    background: transparent;
  }
  .sidebar::-webkit-scrollbar-thumb {
    background: #E2D5C3;
    border-radius: 2px;
  }

  /* Header/Topbar Styles - Responsive */
  .topbar {
    height: 60px;
    background: #FAF7F2;
    border-bottom: 0.5px solid #E2D5C3;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 0 2rem;
    flex-shrink: 0;
    font-family: 'DM Sans', sans-serif;
    position: fixed;
    top: 0;
    left: 240px;
    right: 0;
    z-index: 99;
    transition: left 0.3s ease;
  }
  .topbar-left {
    display: flex;
    flex-direction: column;
  }
  .page-title {
    font-family: 'Cormorant Garamond', serif;
    font-size: 20px;
    font-weight: 400;
    color: #1C1917;
  }
  .page-breadcrumb {
    font-size: 11px;
    color: #9A8F83;
    letter-spacing: 0.05em;
  }
  .topbar-right {
    display: flex;
    align-items: center;
    gap: 16px;
  }
  .search-box {
    display: flex;
    align-items: center;
    gap: 8px;
    background: #F5EFE4;
    border: 0.5px solid #E2D5C3;
    border-radius: 20px;
    padding: 7px 14px;
  }
  .search-box input {
    background: none;
    border: none;
    outline: none;
    font-family: 'DM Sans', sans-serif;
    font-size: 12px;
    color: #1C1917;
    width: 160px;
  }
  .search-box input::placeholder {
    color: #BEB3A8;
  }
  .search-box svg {
    width: 14px;
    height: 14px;
    stroke: #9A8F83;
    fill: none;
    stroke-width: 1.5;
    flex-shrink: 0;
  }
  .icon-btn {
    width: 34px;
    height: 34px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #F5EFE4;
    border: 0.5px solid #E2D5C3;
    cursor: pointer;
    transition: background 0.2s;
    position: relative;
  }
  .icon-btn:hover {
    background: #E2D5C3;
  }
  .icon-btn svg {
    width: 16px;
    height: 16px;
    stroke: #9A8F83;
    fill: none;
    stroke-width: 1.5;
  }
  .notif-dot {
    position: absolute;
    top: 6px;
    right: 6px;
    width: 6px;
    height: 6px;
    background: #8C6E50;
    border-radius: 50%;
    border: 1.5px solid #FAF7F2;
  }
  .pill-action {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    border: 0.5px solid #E2D5C3;
    border-radius: 20px;
    padding: 6px 14px;
    font-size: 11px;
    letter-spacing: 0.06em;
    color: #1C1917;
    background: #FAF7F2;
    cursor: pointer;
    transition: all 0.2s;
    font-family: 'DM Sans', sans-serif;
  }
  .pill-action:hover {
    background: #1C1917;
    color: #F5EFE4;
    border-color: #1C1917;
  }
  .pill-action svg {
    width: 12px;
    height: 12px;
    stroke: currentColor;
    fill: none;
    stroke-width: 1.5;
  }

  /* Responsive Breakpoints */
  @media (max-width: 1024px) {
    .sidebar {
      transform: translateX(-100%);
    }
    .sidebar.open {
      transform: translateX(0);
    }
    .topbar {
      left: 0;
    }
    .menu-toggle {
      display: flex;
    }
    .topbar-left {
      margin-left: 50px;
    }
    .search-box input {
      width: 120px;
    }
    .topbar-right {
      gap: 8px;
    }
  }

  @media (max-width: 768px) {
    .topbar {
      padding: 0 1rem;
    }
    .search-box {
      display: none;
    }
    .page-title {
      font-size: 16px;
    }
    .page-breadcrumb {
      font-size: 9px;
    }
    .topbar-right {
      gap: 6px;
    }
    .icon-btn {
      width: 30px;
      height: 30px;
    }
    .pill-action {
      padding: 4px 10px;
      font-size: 10px;
    }
    .pill-action svg {
      width: 10px;
      height: 10px;
    }
  }

  @media (max-width: 480px) {
    .topbar-left {
      margin-left: 45px;
    }
    .page-title {
      font-size: 14px;
    }
    .page-breadcrumb {
      display: none;
    }
    .icon-btn:nth-child(2) {
      display: none;
    }
  }
</style>

<!-- Mobile Menu Toggle Button -->
<button class="menu-toggle" id="menuToggle">
  <span></span>
  <span></span>
  <span></span>
</button>

<section class="sidebar" id="sidebar">
  <div class="sidebar-logo">
    <div class="logo-mark">Psoricure</div>
    <div class="logo-sub">Admin Console</div>
  </div>

  <nav class="sidebar-nav">
    <div class="nav-section-label">Overview</div>
    <div class="nav-item active">
      <svg class="nav-icon" viewBox="0 0 24 24"><rect x="3" y="3" width="7" height="7" rx="1"/><rect x="14" y="3" width="7" height="7" rx="1"/><rect x="3" y="14" width="7" height="7" rx="1"/><rect x="14" y="14" width="7" height="7" rx="1"/></svg>
      Dashboard
    </div>
    <div class="nav-item">
      <svg class="nav-icon" viewBox="0 0 24 24"><path d="M3 3h18v4H3z"/><path d="M3 11h18v2H3z"/><path d="M3 17h18v4H3z"/></svg>
      Analytics
    </div>

    <div class="nav-section-label">Commerce</div>
    <div class="nav-item">
      <svg class="nav-icon" viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
      Orders
      <span class="nav-badge">12</span>
    </div>
    <div class="nav-item">
      <svg class="nav-icon" viewBox="0 0 24 24"><path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/></svg>
      Products
    </div>
    <div class="nav-item">
      <svg class="nav-icon" viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
      Customers
    </div>
    <div class="nav-item">
      <svg class="nav-icon" viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg>
      Revenue
    </div>

    <div class="nav-section-label">Content</div>
    <div class="nav-item">
      <svg class="nav-icon" viewBox="0 0 24 24"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"/><polyline points="14 2 14 8 20 8"/><line x1="16" y1="13" x2="8" y2="13"/><line x1="16" y1="17" x2="8" y2="17"/></svg>
      Journal
      <span class="nav-badge">3</span>
    </div>
    <div class="nav-item">
      <svg class="nav-icon" viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><circle cx="8.5" cy="8.5" r="1.5"/><polyline points="21 15 16 10 5 21"/></svg>
      Media
    </div>
    <div class="nav-item">
      <svg class="nav-icon" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.07 4.93a10 10 0 0 1 0 14.14"/><path d="M4.93 4.93a10 10 0 0 0 0 14.14"/></svg>
      Marketing
    </div>

    <div class="nav-section-label">System</div>
    <div class="nav-item">
      <svg class="nav-icon" viewBox="0 0 24 24"><circle cx="12" cy="12" r="3"/><path d="M19.4 15a1.65 1.65 0 0 0 .33 1.82l.06.06a2 2 0 0 1-2.83 2.83l-.06-.06a1.65 1.65 0 0 0-1.82-.33 1.65 1.65 0 0 0-1 1.51V21a2 2 0 0 1-4 0v-.09A1.65 1.65 0 0 0 9 19.4a1.65 1.65 0 0 0-1.82.33l-.06.06a2 2 0 0 1-2.83-2.83l.06-.06A1.65 1.65 0 0 0 4.68 15a1.65 1.65 0 0 0-1.51-1H3a2 2 0 0 1 0-4h.09A1.65 1.65 0 0 0 4.6 9a1.65 1.65 0 0 0-.33-1.82l-.06-.06a2 2 0 0 1 2.83-2.83l.06.06A1.65 1.65 0 0 0 9 4.68a1.65 1.65 0 0 0 1-1.51V3a2 2 0 0 1 4 0v.09a1.65 1.65 0 0 0 1 1.51 1.65 1.65 0 0 0 1.82-.33l.06-.06a2 2 0 0 1 2.83 2.83l-.06.06A1.65 1.65 0 0 0 19.4 9a1.65 1.65 0 0 0 1.51 1H21a2 2 0 0 1 0 4h-.09a1.65 1.65 0 0 0-1.51 1z"/></svg>
      Settings
    </div>
  </nav>

  <div class="sidebar-user">
    <div class="user-avatar">S</div>
    <div>
      <div class="user-name">Sara Malik</div>
      <div class="user-role">Super Admin</div>
    </div>
  </div>
</section>

<section class="topbar">
  <div class="topbar-left">
    <div class="page-title">Dashboard</div>
    <div class="page-breadcrumb">May 2026 &nbsp;·&nbsp; All stores</div>
  </div>
  <div class="topbar-right">
    <div class="search-box">
      <svg viewBox="0 0 24 24"><circle cx="11" cy="11" r="7"/><path d="m21 21-4.35-4.35"/></svg>
      <input type="text" placeholder="Search orders, products…">
    </div>
    <div class="icon-btn">
      <div class="notif-dot"></div>
      <svg viewBox="0 0 24 24"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
    </div>
    <div class="icon-btn">
      <svg viewBox="0 0 24 24"><circle cx="12" cy="8" r="4"/><path d="M4 20c0-4 3.6-7 8-7s8 3 8 7"/></svg>
    </div>
    <button class="pill-action">
      <svg viewBox="0 0 24 24"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" y1="15" x2="12" y2="3"/></svg>
      Export
    </button>
  </div>
</section>

<script>
  // Mobile menu toggle functionality
  const menuToggle = document.getElementById('menuToggle');
  const sidebar = document.getElementById('sidebar');
  
  if (menuToggle) {
    menuToggle.addEventListener('click', function() {
      sidebar.classList.toggle('open');
      this.classList.toggle('active');
    });
  }
  
  // Close sidebar when clicking outside on mobile
  document.addEventListener('click', function(event) {
    if (window.innerWidth <= 1024) {
      const isClickInsideSidebar = sidebar.contains(event.target);
      const isClickOnToggle = menuToggle.contains(event.target);
      
      if (!isClickInsideSidebar && !isClickOnToggle && sidebar.classList.contains('open')) {
        sidebar.classList.remove('open');
        menuToggle.classList.remove('active');
      }
    }
  });
  
  // Handle window resize - reset sidebar state on desktop
  window.addEventListener('resize', function() {
    if (window.innerWidth > 1024) {
      sidebar.classList.remove('open');
      if (menuToggle) menuToggle.classList.remove('active');
    }
  });
</script>