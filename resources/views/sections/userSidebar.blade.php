<?php
// sidebar.blade.php - Simplified Sidebar and Header Component (No Routes)
?>
<style>
/* Sidebar & Header Styles - Completely isolated */
:root {
  --cream: #F5EFE4;
  --sand: #E2D5C3;
  --sand-light: #EDE5D8;
  --tan: #C4A882;
  --bark: #8C6E50;
  --bark-dark: #6A5038;
  --ink: #1C1917;
  --ink-soft: #2E2A26;
  --off-white: #FAF7F2;
  --warm-gray: #9A8F83;
  --warm-gray-lt: #BEB3A8;
  --success: #6B8F5E;
  --success-bg: #EEF4EB;
  --warning: #C4903A;
  --warning-bg: #FBF3E5;
  --danger: #9E5A48;
  --danger-bg: #F9EDEA;
  --sidebar-w: 230px;
}

/* Reset for sidebar only */
.sidebar * {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

/* Fixed Sidebar Layout */
.sidebar-fixed {
  position: fixed;
  top: 0;
  left: 0;
  width: var(--sidebar-w);
  height: 100vh;
  background: var(--ink);
  display: flex;
  flex-direction: column;
  z-index: 1000;
  overflow-y: auto;
}

.sidebar-fixed::-webkit-scrollbar {
  width: 0;
}

/* Sidebar Header */
.sb-header {
  padding: 24px 20px 16px;
  border-bottom: 0.5px solid rgba(255, 255, 255, 0.07);
}

.sb-logo {
  font-family: 'Cormorant Garamond', serif;
  font-size: 18px;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--cream);
  font-weight: 400;
}

.sb-sub {
  font-size: 9px;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: rgba(196, 168, 130, 0.5);
  margin-top: 3px;
}

/* Sidebar Navigation */
.sb-nav {
  flex: 1;
  padding: 14px 8px;
  display: flex;
  flex-direction: column;
  gap: 1px;
}

.sb-section {
  font-size: 9px;
  letter-spacing: 0.16em;
  text-transform: uppercase;
  color: rgba(154, 143, 131, 0.4);
  padding: 12px 12px 4px;
}

.sb-item {
  display: flex;
  align-items: center;
  gap: 9px;
  padding: 8px 12px;
  border-radius: 6px;
  color: rgba(245, 239, 228, 0.48);
  font-size: 12px;
  transition: all 0.17s;
  text-decoration: none;
}

.sb-item:hover {
  background: rgba(255, 255, 255, 0.04);
  color: var(--cream);
}

.sb-item.active {
  background: rgba(196, 168, 130, 0.13);
  color: var(--cream);
  position: relative;
}

.sb-item.active::before {
  content: '';
  position: absolute;
  left: 0;
  top: 20%;
  bottom: 20%;
  width: 2px;
  background: var(--tan);
  border-radius: 0 2px 2px 0;
}

.sb-icon {
  width: 15px;
  height: 15px;
  stroke: currentColor;
  fill: none;
  stroke-width: 1.5;
  flex-shrink: 0;
}

.sb-badge {
  margin-left: auto;
  background: var(--bark);
  color: var(--cream);
  font-size: 9px;
  padding: 1px 6px;
  border-radius: 8px;
}

/* Sidebar Footer / User Info */
.sb-user {
  padding: 12px 14px 16px;
  border-top: 0.5px solid rgba(255, 255, 255, 0.07);
  display: flex;
  align-items: center;
  gap: 9px;
  margin-top: auto;
}

.sb-avatar {
  width: 34px;
  height: 34px;
  border-radius: 50%;
  background: linear-gradient(135deg, var(--tan), var(--bark));
  display: flex;
  align-items: center;
  justify-content: center;
  font-family: 'Cormorant Garamond', serif;
  font-size: 15px;
  color: var(--cream);
  flex-shrink: 0;
}

.sb-user-name {
  font-size: 12px;
  color: var(--cream);
  font-weight: 400;
}

.sb-user-tier {
  font-size: 9px;
  color: rgba(196, 168, 130, 0.55);
  letter-spacing: 0.06em;
  text-transform: uppercase;
}

.sb-logout {
  display: flex;
  align-items: center;
  gap: 9px;
  padding: 8px 12px;
  border-radius: 6px;
  color: rgba(158, 90, 72, 0.7);
  font-size: 12px;
  transition: all 0.17s;
  margin-top: 4px;
  text-decoration: none;
}

.sb-logout:hover {
  background: rgba(158, 90, 72, 0.08);
  color: var(--danger);
}

/* Top Header Bar */
.top-header {
  position: fixed;
  top: 0;
  left: var(--sidebar-w);
  right: 0;
  height: 56px;
  background: var(--off-white);
  border-bottom: 0.5px solid var(--sand);
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 0 2rem;
  z-index: 999;
}

.page-title-area {
  display: flex;
  flex-direction: column;
}

.page-title {
  font-family: 'Cormorant Garamond', serif;
  font-size: 19px;
  font-weight: 400;
  color: var(--ink);
}

.page-crumb {
  font-size: 10px;
  color: var(--warm-gray);
  margin-top: 1px;
}

.header-actions {
  display: flex;
  align-items: center;
  gap: 12px;
}

.icon-btn {
  width: 32px;
  height: 32px;
  border-radius: 50%;
  display: flex;
  align-items: center;
  justify-content: center;
  background: var(--cream);
  border: 0.5px solid var(--sand);
  cursor: pointer;
  transition: background 0.17s;
  position: relative;
  text-decoration: none;
}

.icon-btn:hover {
  background: var(--sand);
}

.icon-btn svg {
  width: 14px;
  height: 14px;
  stroke: var(--warm-gray);
  fill: none;
  stroke-width: 1.5;
}

.notif-dot {
  position: absolute;
  top: 6px;
  right: 6px;
  width: 5px;
  height: 5px;
  background: var(--bark);
  border-radius: 50%;
  border: 1.5px solid var(--off-white);
}

.pill-sm {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  border-radius: 999px;
  padding: 7px 16px;
  font-size: 11px;
  letter-spacing: 0.07em;
  text-transform: uppercase;
  cursor: pointer;
  border: none;
  font-family: 'DM Sans', sans-serif;
  font-weight: 300;
  background: var(--ink);
  color: var(--cream);
  transition: background 0.2s;
  text-decoration: none;
}

.pill-sm:hover {
  background: var(--bark-dark);
}

/* Main Content Container - No overlap */
.main-content {
  margin-left: var(--sidebar-w);
  margin-top: 56px;
  padding: 1.5rem;
  min-height: calc(100vh - 56px);
  background: var(--off-white);
}

/* Mobile Responsive */
@media (max-width: 768px) {
  :root {
    --sidebar-w: 0px;
  }
  
  .sidebar-fixed {
    transform: translateX(-100%);
    transition: transform 0.3s ease;
    z-index: 1002;
  }
  
  .sidebar-fixed.mobile-open {
    transform: translateX(0);
  }
  
  .top-header {
    left: 0;
  }
  
  .main-content {
    margin-left: 0;
  }
  
  .mobile-menu-btn {
    display: flex !important;
  }
}

.mobile-menu-btn {
  display: none;
  background: none;
  border: none;
  cursor: pointer;
  padding: 8px;
  margin-right: 12px;
  flex-direction: column;
  gap: 4px;
}

.mobile-menu-btn span {
  width: 20px;
  height: 2px;
  background: var(--ink);
  border-radius: 2px;
}

/* Mobile overlay */
.mobile-overlay {
  position: fixed;
  inset: 0;
  background: rgba(0, 0, 0, 0.5);
  z-index: 1001;
  display: none;
}

.mobile-overlay.active {
  display: block;
}

/* Toast Message */
.toast {
  position: fixed;
  bottom: 20px;
  left: 50%;
  transform: translateX(-50%) translateY(20px);
  background: var(--ink);
  color: var(--cream);
  padding: 10px 20px;
  border-radius: 8px;
  font-size: 12px;
  z-index: 2000;
  opacity: 0;
  transition: all 0.3s ease;
  pointer-events: none;
}

.toast.show {
  opacity: 1;
  transform: translateX(-50%) translateY(0);
}
</style>

<!-- Mobile Menu Button -->
<button class="mobile-menu-btn" id="mobileMenuToggle" style="display: none;">
  <span></span>
  <span></span>
  <span></span>
</button>

<!-- Mobile Overlay -->
<div class="mobile-overlay" id="mobileOverlay"></div>

<!-- Sidebar -->
<aside class="sidebar-fixed" id="sidebar">
  <div class="sb-header">
    <div class="sb-logo">Psoricure</div>
    <div class="sb-sub">My Account</div>
  </div>
  
  <nav class="sb-nav">
    <div class="sb-section">Main</div>
    <a href="{{route('user-dashboard')}}" class="sb-item">
      <svg class="sb-icon" viewBox="0 0 24 24">
        <rect x="3" y="3" width="7" height="7" rx="1"/>
        <rect x="14" y="3" width="7" height="7" rx="1"/>
        <rect x="3" y="14" width="7" height="7" rx="1"/>
        <rect x="14" y="14" width="7" height="7" rx="1"/>
      </svg>
      Dashboard
    </a>
    
    <a href="{{route('orders-page')}}" class="sb-item">
      <svg class="sb-icon" viewBox="0 0 24 24">
        <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
        <line x1="3" y1="6" x2="21" y2="6"/>
        <path d="M16 10a4 4 0 0 1-8 0"/>
      </svg>
      My Orders
      <span class="sb-badge">3</span>
    </a>
    
    <a href="/wishlist" class="sb-item">
      <svg class="sb-icon" viewBox="0 0 24 24">
        <path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/>
      </svg>
      Wishlist
      <span class="sb-badge">5</span>
    </a>
    
    <a href="{{route('Userprofile-page')}}" class="sb-item">
      <svg class="sb-icon" viewBox="0 0 24 24">
        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
        <circle cx="12" cy="7" r="4"/>
      </svg>
      Profile
    </a>
    
    <div class="sb-section">Shop</div>
    
    <a href="/addresses" class="sb-item">
      <svg class="sb-icon" viewBox="0 0 24 24">
        <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/>
        <circle cx="12" cy="10" r="3"/>
      </svg>
      Addresses
    </a>
    
    <a href="/payments" class="sb-item">
      <svg class="sb-icon" viewBox="0 0 24 24">
        <rect x="1" y="4" width="22" height="16" rx="2"/>
        <line x1="1" y1="10" x2="23" y2="10"/>
      </svg>
      Payments
    </a>
    
    <div class="sb-section">Support</div>
    
    <a href="/logout" class="sb-logout" onclick="event.preventDefault(); alert('Logged out successfully');">
      <svg class="sb-icon" viewBox="0 0 24 24">
        <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
        <polyline points="16 17 21 12 16 7"/>
        <line x1="21" y1="12" x2="9" y2="12"/>
      </svg>
      Logout
    </a>
  </nav>
  
  <div class="sb-user">
    <div class="sb-avatar">N</div>
    <div>
      <div class="sb-user-name">Nadia Farooq</div>
      <div class="sb-user-tier">Gold Member</div>
    </div>
  </div>
</aside>

<!-- Top Header -->
<header class="top-header">
  <div class="page-title-area">
    <div class="page-title" id="pageTitle">Dashboard</div>
    <div class="page-crumb" id="pageCrumb">Overview</div>
  </div>
  <div class="header-actions">
    <a href="/notifications" class="icon-btn">
      <div class="notif-dot"></div>
      <svg viewBox="0 0 24 24">
        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
        <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
      </svg>
    </a>
    <a href="/shop" class="pill-sm">Shop Now</a>
  </div>
</header>

<!-- Toast Container -->
<div class="toast" id="toastMessage"></div>

<script>
// Mobile menu functionality (only for responsive layout)
const mobileToggle = document.getElementById('mobileMenuToggle');
const sidebar = document.getElementById('sidebar');
const mobileOverlay = document.getElementById('mobileOverlay');

function toggleMobileMenu() {
  sidebar.classList.toggle('mobile-open');
  mobileOverlay.classList.toggle('active');
  document.body.style.overflow = sidebar.classList.contains('mobile-open') ? 'hidden' : '';
}

if (mobileToggle) {
  mobileToggle.addEventListener('click', toggleMobileMenu);
  mobileToggle.style.display = window.innerWidth <= 768 ? 'flex' : 'none';
}

if (mobileOverlay) {
  mobileOverlay.addEventListener('click', toggleMobileMenu);
}

window.addEventListener('resize', () => {
  if (window.innerWidth > 768) {
    sidebar.classList.remove('mobile-open');
    mobileOverlay.classList.remove('active');
    document.body.style.overflow = '';
    if (mobileToggle) mobileToggle.style.display = 'none';
  } else {
    if (mobileToggle) mobileToggle.style.display = 'flex';
  }
});

// Update page title and crumb based on current URL
function updatePageInfo() {
  const path = window.location.pathname;
  const titles = {
    '/dashboard': { title: 'Dashboard', crumb: 'Overview' },
    '/orders': { title: 'My Orders', crumb: 'Order History' },
    '/wishlist': { title: 'Wishlist', crumb: 'Saved Items' },
    '/profile': { title: 'Profile', crumb: 'Settings' },
    '/addresses': { title: 'Addresses', crumb: 'Delivery Locations' },
    '/payments': { title: 'Payments', crumb: 'Transaction History' },
    '/notifications': { title: 'Notifications', crumb: 'Updates & Alerts' },
    '/shop': { title: 'Shop', crumb: 'Browse Products' }
  };
  
  const pageInfo = titles[path] || { title: 'Dashboard', crumb: 'Overview' };
  document.getElementById('pageTitle').textContent = pageInfo.title;
  document.getElementById('pageCrumb').textContent = pageInfo.crumb;
  
  // Update active state in sidebar
  document.querySelectorAll('.sb-item').forEach(item => {
    const href = item.getAttribute('href');
    if (href === path) {
      item.classList.add('active');
    } else {
      item.classList.remove('active');
    }
  });
}

// Simple toast function
window.showToast = function(message, type = 'success') {
  const toast = document.getElementById('toastMessage');
  toast.textContent = message;
  toast.style.background = type === 'error' ? 'var(--danger)' : 'var(--ink)';
  toast.classList.add('show');
  setTimeout(() => toast.classList.remove('show'), 3000);
};

// Initialize
updatePageInfo();

// Handle navigation for demo (prevents actual page load if needed)
document.querySelectorAll('.sb-item, .icon-btn, .pill-sm').forEach(link => {
  link.addEventListener('click', (e) => {
    const href = link.getAttribute('href');
    if (href && href.startsWith('/') && href !== '/logout') {
      e.preventDefault();
      window.location.href = href;
    }
  });
});
</script>