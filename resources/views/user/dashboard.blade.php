<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Psoricure - Dashboard</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
/* Reset and Base Styles */
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
}

body {
  font-family: 'DM Sans', sans-serif;
  font-weight: 300;
  background: #FAF7F2;
  overflow-x: hidden;
}

/* Main Content Area - Matches sidebar spacing */
.main-content {
  margin-left: 230px;
  margin-top: 56px;
  padding: 1.5rem;
  min-height: calc(100vh - 56px);
  background: #FAF7F2;
}

/* Page Container */
.page {
  display: none;
  animation: fadeIn 0.3s ease;
}

.page.active {
  display: block;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Card Styles */
.card {
  background: #F5EFE4;
  border: 0.5px solid #E2D5C3;
  border-radius: 12px;
  overflow: hidden;
}

.card-header {
  display: flex;
  align-items: center;
  justify-content: space-between;
  padding: 1rem 1.5rem;
  border-bottom: 0.5px solid #E2D5C3;
}

.card-title {
  font-family: 'Cormorant Garamond', serif;
  font-size: 18px;
  font-weight: 400;
  color: #1C1917;
}

.card-sub {
  font-size: 11px;
  color: #9A8F83;
  margin-top: 2px;
}

.card-body {
  padding: 1.25rem;
}

/* Stats Grid */
.stats-grid {
  display: grid;
  grid-template-columns: repeat(4, 1fr);
  gap: 1rem;
  margin-bottom: 1.5rem;
}

.stat-card {
  background: #F5EFE4;
  border: 0.5px solid #E2D5C3;
  border-radius: 12px;
  padding: 1rem 1.25rem;
  position: relative;
  overflow: hidden;
  transition: transform 0.2s;
}

.stat-card:hover {
  transform: translateY(-2px);
}

.stat-card::after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 2px;
}

.stat-card.revenue::after {
  background: linear-gradient(90deg, #C4A882, #8C6E50);
}

.stat-card.orders::after {
  background: linear-gradient(90deg, #6B8F5E, #8fae80);
}

.stat-card.aov::after {
  background: linear-gradient(90deg, #C4903A, #d4a855);
}

.stat-card.customers::after {
  background: linear-gradient(90deg, #6A5038, #8C6E50);
}

.stat-label {
  font-size: 10px;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  color: #9A8F83;
  margin-bottom: 8px;
}

.stat-value {
  font-family: 'Cormorant Garamond', serif;
  font-size: 32px;
  font-weight: 400;
  color: #1C1917;
  line-height: 1;
  margin-bottom: 8px;
}

.stat-footer {
  display: flex;
  align-items: center;
  gap: 6px;
  font-size: 10px;
}

.stat-change {
  padding: 2px 6px;
  border-radius: 8px;
}

.stat-change.up {
  background: #EEF4EB;
  color: #6B8F5E;
}

.stat-change.down {
  background: #F9EDEA;
  color: #9E5A48;
}

.stat-period {
  color: #BEB3A8;
}

/* Grid Layouts */
.grid-2 {
  display: grid;
  grid-template-columns: 1fr 1fr;
  gap: 1.5rem;
  margin-bottom: 1.5rem;
}

/* Orders Table */
.orders-table {
  width: 100%;
  border-collapse: collapse;
}

.orders-table th {
  text-align: left;
  padding: 10px 0;
  font-size: 10px;
  text-transform: uppercase;
  letter-spacing: 0.1em;
  color: #9A8F83;
  font-weight: 500;
  border-bottom: 0.5px solid #E2D5C3;
}

.orders-table td {
  padding: 12px 0;
  font-size: 12px;
  border-bottom: 0.5px solid rgba(226, 213, 195, 0.3);
}

.order-id {
  color: #8C6E50;
  font-weight: 500;
  font-size: 11px;
}

/* Status Pills */
.status-pill {
  display: inline-flex;
  align-items: center;
  gap: 5px;
  padding: 3px 10px;
  border-radius: 20px;
  font-size: 10px;
  font-weight: 500;
}

.status-pill::before {
  content: '';
  width: 5px;
  height: 5px;
  border-radius: 50%;
}

.status-pill.delivered {
  background: #EEF4EB;
  color: #6B8F5E;
}

.status-pill.delivered::before {
  background: #6B8F5E;
}

.status-pill.shipped {
  background: rgba(196, 168, 130, 0.15);
  color: #8C6E50;
}

.status-pill.shipped::before {
  background: #8C6E50;
}

.status-pill.processing {
  background: #FBF3E5;
  color: #C4903A;
}

.status-pill.processing::before {
  background: #C4903A;
}

/* Products List */
.product-item {
  display: flex;
  align-items: center;
  gap: 12px;
  padding: 12px 0;
  border-bottom: 0.5px solid rgba(226, 213, 195, 0.3);
}

.product-item:last-child {
  border-bottom: none;
}

.product-thumb {
  width: 48px;
  height: 48px;
  background: #EDE5D8;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.product-info {
  flex: 1;
}

.product-name {
  font-size: 13px;
  font-weight: 500;
  color: #1C1917;
  margin-bottom: 2px;
}

.product-category {
  font-size: 10px;
  color: #9A8F83;
  text-transform: uppercase;
  letter-spacing: 0.05em;
}

.product-stats {
  text-align: right;
}

.product-revenue {
  font-size: 14px;
  font-weight: 600;
  color: #1C1917;
}

.product-units {
  font-size: 10px;
  color: #9A8F83;
}

/* Action Button */
.action-btn {
  background: #1C1917;
  color: #F5EFE4;
  border: none;
  padding: 6px 16px;
  border-radius: 8px;
  font-size: 10px;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  cursor: pointer;
  transition: background 0.2s;
}

.action-btn:hover {
  background: #8C6E50;
}

.action-btn.outline {
  background: transparent;
  color: #1C1917;
  border: 0.5px solid #E2D5C3;
}

.action-btn.outline:hover {
  background: #EDE5D8;
}

/* View All Link */
.view-all {
  font-size: 10px;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  color: #8C6E50;
  cursor: pointer;
  text-decoration: none;
}

.view-all:hover {
  border-bottom: 0.5px solid #8C6E50;
}

/* Welcome Banner */
.welcome-banner {
  background: #1C1917;
  border-radius: 12px;
  padding: 1.5rem;
  margin-bottom: 1.5rem;
  display: flex;
  justify-content: space-between;
  align-items: center;
  position: relative;
  overflow: hidden;
}

.welcome-banner::before {
  content: '';
  position: absolute;
  top: -50px;
  right: -50px;
  width: 200px;
  height: 200px;
  border-radius: 50%;
  background: radial-gradient(circle, rgba(196, 168, 130, 0.1) 0%, transparent 70%);
}

.welcome-text {
  position: relative;
  z-index: 1;
}

.welcome-greeting {
  font-size: 10px;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: rgba(196, 168, 130, 0.6);
  margin-bottom: 5px;
}

.welcome-name {
  font-family: 'Cormorant Garamond', serif;
  font-size: 24px;
  font-weight: 300;
  color: #F5EFE4;
  line-height: 1.2;
  margin-bottom: 5px;
}

.welcome-name em {
  font-style: italic;
  color: #C4A882;
}

.welcome-message {
  font-size: 11px;
  color: rgba(245, 239, 228, 0.4);
  max-width: 300px;
}

.welcome-actions {
  display: flex;
  gap: 10px;
  position: relative;
  z-index: 1;
}

.btn-light {
  background: rgba(245, 239, 228, 0.07);
  border: 0.5px solid rgba(196, 168, 130, 0.28);
  color: #F5EFE4;
  padding: 7px 18px;
  border-radius: 999px;
  font-size: 10px;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  cursor: pointer;
  transition: background 0.2s;
}

.btn-light:hover {
  background: rgba(196, 168, 130, 0.18);
}

.btn-solid {
  background: #C4A882;
  color: #1C1917;
  padding: 7px 18px;
  border-radius: 999px;
  font-size: 10px;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  cursor: pointer;
  border: none;
  transition: background 0.2s;
}

.btn-solid:hover {
  background: #D4BCA0;
}

/* Responsive */
@media (max-width: 1024px) {
  .stats-grid {
    grid-template-columns: repeat(2, 1fr);
  }
  
  .grid-2 {
    grid-template-columns: 1fr;
  }
}

@media (max-width: 768px) {
  .main-content {
    margin-left: 0;
    padding: 1rem;
  }
  
  .stats-grid {
    grid-template-columns: 1fr;
  }
  
  .welcome-banner {
    flex-direction: column;
    text-align: center;
    gap: 1rem;
  }
  
  .welcome-text {
    text-align: center;
  }
}
</style>
</head>
<body>

<!-- Include Sidebar -->
@include('sections.userSidebar')

<!-- Main Content -->
<main class="main-content">
  <div id="dashboardPage" class="page active">
    <!-- Welcome Banner -->
    <div class="welcome-banner">
      <div class="welcome-text">
        <div class="welcome-greeting">Welcome back</div>
        <div class="welcome-name">skin science,<br><em>botanical soul.</em></div>
        <div class="welcome-message">14-day ritual streak 🌿 Your skin barrier is strengthening — keep it up.</div>
      </div>
      <div class="welcome-actions">
        <button class="btn-light" onclick="alert('Track your order')">Track Order</button>
        <button class="btn-solid" onclick="alert('Shopping coming soon')">Shop Now</button>
      </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
      <div class="stat-card revenue">
        <div class="stat-label">Ritual Streak</div>
        <div class="stat-value">14 days</div>
        <div class="stat-footer">
          <span class="stat-change up">↑ PB</span>
          <span class="stat-period">personal best</span>
        </div>
      </div>
      <div class="stat-card orders">
        <div class="stat-label">Total Orders</div>
        <div class="stat-value">8</div>
        <div class="stat-footer">
          <span class="stat-change up">↑ +2</span>
          <span class="stat-period">this month</span>
        </div>
      </div>
      <div class="stat-card aov">
        <div class="stat-label">Total Spent</div>
        <div class="stat-value">€487</div>
        <div class="stat-footer">
          <span class="stat-change up">↑ +12%</span>
          <span class="stat-period">vs last year</span>
        </div>
      </div>
      <div class="stat-card customers">
        <div class="stat-label">Loyalty Points</div>
        <div class="stat-value">3,240</div>
        <div class="stat-footer">
          <span class="stat-change up">↑ +120</span>
          <span class="stat-period">earned</span>
        </div>
      </div>
    </div>

    <!-- Recent Orders & Top Products -->
    <div class="grid-2">
      <!-- Recent Orders -->
      <div class="card">
        <div class="card-header">
          <div>
            <div class="card-title">Recent Orders</div>
            <div class="card-sub">Last 3 purchases</div>
          </div>
          <a href="#" class="view-all" onclick="switchPage('orders')">View all →</a>
        </div>
        <div class="card-body">
          <table class="orders-table">
            <thead>
              <tr><th>Order ID</th><th>Product</th><th>Amount</th><th>Status</th></tr>
            </thead>
            <tbody>
              <tr><td><span class="order-id">PSC-4820</span></td><td>Barrier Shield Mist</td><td>€42.00</td><td><span class="status-pill shipped">Shipped</span></td></tr>
              <tr><td><span class="order-id">PSC-4801</span></td><td>Calm Restore Serum</td><td>€58.00</td><td><span class="status-pill delivered">Delivered</span></td></tr>
              <tr><td><span class="order-id">PSC-4789</span></td><td>The Calm Ritual Set</td><td>€148.00</td><td><span class="status-pill delivered">Delivered</span></td></tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- Top Products -->
      <div class="card">
        <div class="card-header">
          <div>
            <div class="card-title">Top Products</div>
            <div class="card-sub">By revenue this month</div>
          </div>
        </div>
        <div class="card-body">
          <div class="product-item">
            <div class="product-thumb">
              <svg width="24" height="40" viewBox="0 0 80 160">
                <rect x="14" y="28" width="52" height="118" rx="6" fill="#C4A882" opacity="0.85"/>
                <rect x="30" y="10" width="20" height="20" rx="3" fill="#C4A882" opacity="0.6"/>
              </svg>
            </div>
            <div class="product-info">
              <div class="product-name">Calm Restore Serum</div>
              <div class="product-category">Face Care</div>
            </div>
            <div class="product-stats">
              <div class="product-revenue">€18,240</div>
              <div class="product-units">314 units</div>
            </div>
          </div>
          <div class="product-item">
            <div class="product-thumb">
              <svg width="24" height="40" viewBox="0 0 80 160">
                <rect x="14" y="28" width="52" height="118" rx="6" fill="#6B8F5E" opacity="0.85"/>
                <rect x="30" y="10" width="20" height="20" rx="3" fill="#6B8F5E" opacity="0.6"/>
              </svg>
            </div>
            <div class="product-info">
              <div class="product-name">Barrier Shield Mist</div>
              <div class="product-category">Face Care</div>
            </div>
            <div class="product-stats">
              <div class="product-revenue">€9,030</div>
              <div class="product-units">215 units</div>
            </div>
          </div>
          <div class="product-item">
            <div class="product-thumb">
              <svg width="24" height="40" viewBox="0 0 80 160">
                <rect x="14" y="28" width="52" height="118" rx="6" fill="#1C1917" opacity="0.85"/>
                <rect x="30" y="10" width="20" height="20" rx="3" fill="#1C1917" opacity="0.6"/>
              </svg>
            </div>
            <div class="product-info">
              <div class="product-name">Night Renewal Balm</div>
              <div class="product-category">Face Care</div>
            </div>
            <div class="product-stats">
              <div class="product-revenue">€11,840</div>
              <div class="product-units">160 units</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Orders Page -->
  <div id="ordersPage" class="page">
    <div class="card">
      <div class="card-header">
        <div>
          <div class="card-title">My Orders</div>
          <div class="card-sub">Complete order history</div>
        </div>
        <button class="action-btn outline" onclick="alert('Exporting orders...')">Export</button>
      </div>
      <div class="card-body">
        <table class="orders-table">
          <thead>
            <tr>
              <th>Order ID</th>
              <th>Product</th>
              <th>Date</th>
              <th>Amount</th>
              <th>Status</th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr><td><span class="order-id">PSC-4820</span></td><td>Barrier Shield Mist</td><td>14 May 2026</td><td>€42.00</td><td><span class="status-pill shipped">Shipped</span></td><td><button class="action-btn outline" onclick="alert('Tracking order')">Track</button></td></tr>
            <tr><td><span class="order-id">PSC-4801</span></td><td>Calm Restore Serum</td><td>02 May 2026</td><td>€58.00</td><td><span class="status-pill delivered">Delivered</span></td><td><button class="action-btn outline" onclick="alert('Reorder product')">Reorder</button></td></tr>
            <tr><td><span class="order-id">PSC-4789</span></td><td>The Calm Ritual Set</td><td>18 Apr 2026</td><td>€148.00</td><td><span class="status-pill delivered">Delivered</span></td><td><button class="action-btn outline" onclick="alert('Write review')">Review</button></td></tr>
            <tr><td><span class="order-id">PSC-4762</span></td><td>Night Renewal Balm</td><td>30 Mar 2026</td><td>€74.00</td><td><span class="status-pill delivered">Delivered</span></td><td><button class="action-btn outline" onclick="alert('Reorder product')">Reorder</button></td></tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <!-- Wishlist Page -->
  <div id="wishlistPage" class="page">
    <div class="card">
      <div class="card-header">
        <div>
          <div class="card-title">My Wishlist</div>
          <div class="card-sub">Your saved items</div>
        </div>
        <button class="action-btn" onclick="alert('All items added to cart')">Add All to Cart</button>
      </div>
      <div class="card-body">
        <div style="display:grid; gap:1rem;">
          <div class="product-item">
            <div class="product-thumb"><svg width="24" height="40" viewBox="0 0 80 160"><rect x="14" y="28" width="52" height="118" rx="6" fill="#C4A882" opacity="0.85"/><rect x="30" y="10" width="20" height="20" rx="3" fill="#C4A882" opacity="0.6"/></svg></div>
            <div class="product-info"><div class="product-name">Phyto Repair Concentrate</div><div class="product-category">Serum</div></div>
            <div class="product-stats"><div class="product-revenue">€72.00</div></div>
            <button class="action-btn" onclick="alert('Added to cart')">Add to Cart</button>
          </div>
          <div class="product-item">
            <div class="product-thumb"><svg width="24" height="40" viewBox="0 0 80 160"><rect x="14" y="28" width="52" height="118" rx="6" fill="#6B8F5E" opacity="0.85"/><rect x="30" y="10" width="20" height="20" rx="3" fill="#6B8F5E" opacity="0.6"/></svg></div>
            <div class="product-info"><div class="product-name">Micro-Probiotic Toner</div><div class="product-category">Toner</div></div>
            <div class="product-stats"><div class="product-revenue">€48.00</div></div>
            <button class="action-btn" onclick="alert('Added to cart')">Add to Cart</button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Profile Page -->
  <div id="profilePage" class="page">
    <div class="card">
      <div class="card-header">
        <div>
          <div class="card-title">Profile Settings</div>
          <div class="card-sub">Update your personal information</div>
        </div>
      </div>
      <div class="card-body">
        <form>
          <div style="display:grid; grid-template-columns:1fr 1fr; gap:1rem; margin-bottom:1rem;">
            <div><label style="display:block; font-size:10px; text-transform:uppercase; margin-bottom:5px;">First Name</label><input type="text" value="Nadia" style="width:100%; padding:8px; border:0.5px solid #E2D5C3; border-radius:6px; background:#FAF7F2;"></div>
            <div><label style="display:block; font-size:10px; text-transform:uppercase; margin-bottom:5px;">Last Name</label><input type="text" value="Farooq" style="width:100%; padding:8px; border:0.5px solid #E2D5C3; border-radius:6px; background:#FAF7F2;"></div>
          </div>
          <div style="margin-bottom:1rem;">
            <label style="display:block; font-size:10px; text-transform:uppercase; margin-bottom:5px;">Email</label>
            <input type="email" value="nadia@psoricure.com" style="width:100%; padding:8px; border:0.5px solid #E2D5C3; border-radius:6px; background:#FAF7F2;">
          </div>
          <button type="button" class="action-btn" onclick="alert('Profile saved')">Save Changes</button>
        </form>
      </div>
    </div>
  </div>
</main>

<script>
// Page switching between sidebar and main content
const pages = {
  dashboard: { element: 'dashboardPage', title: 'Dashboard', crumb: 'Overview' },
  orders: { element: 'ordersPage', title: 'My Orders', crumb: 'Order History' },
  wishlist: { element: 'wishlistPage', title: 'Wishlist', crumb: 'Saved Items' },
  profile: { element: 'profilePage', title: 'Profile', crumb: 'Settings' },
  addresses: { element: 'dashboardPage', title: 'Addresses', crumb: 'Coming Soon' },
  payments: { element: 'dashboardPage', title: 'Payments', crumb: 'Coming Soon' }
};

function switchPage(pageName) {
  // Hide all pages
  Object.keys(pages).forEach(key => {
    const pageElement = document.getElementById(pages[key].element);
    if (pageElement) pageElement.classList.remove('active');
  });
  
  // Show selected page
  const selected = pages[pageName];
  if (selected) {
    const activePage = document.getElementById(selected.element);
    if (activePage) activePage.classList.add('active');
    
    // Update header via sidebar's global function
    if (window.updatePage) {
      window.updatePage(pageName, selected.title, selected.crumb);
    }
  }
}

// Handle sidebar clicks
document.querySelectorAll('.sb-item').forEach(item => {
  const pageName = item.dataset.page;
  if (pageName && pages[pageName]) {
    item.addEventListener('click', (e) => {
      e.preventDefault();
      switchPage(pageName);
      
      // Close mobile menu if open
      if (window.innerWidth <= 768) {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('mobileOverlay');
        if (sidebar) sidebar.classList.remove('mobile-open');
        if (overlay) overlay.classList.remove('active');
        document.body.style.overflow = '';
      }
    });
  }
});

// Shop now button
document.getElementById('shopNowBtn')?.addEventListener('click', () => {
  alert('Shopping experience coming soon!');
});

// Initialize dashboard as active
switchPage('dashboard');
</script>
</body>
</html>