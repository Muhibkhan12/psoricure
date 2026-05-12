<?php
// dashboard-main.php - Responsive main content area
?>
<section class="main-content">
  <style>
    /* Main Content Styles - Responsive */
    .main-content {
      margin-left: 240px;
      margin-top: 60px;
      flex: 1;
      display: flex;
      flex-direction: column;
      background: var(--off-white);
      min-height: calc(100vh - 60px);
      transition: margin-left 0.3s ease;
    }

    :root {
      --cream: #F5EFE4;
      --sand: #E2D5C3;
      --sand-light: #EDE5D8;
      --tan: #C4A882;
      --bark: #8C6E50;
      --bark-dark: #6A5038;
      --ink: #1C1917;
      --off-white: #FAF7F2;
      --warm-gray: #9A8F83;
      --warm-gray-light: #BEB3A8;
      --success: #6B8F5E;
      --success-bg: #EEF4EB;
      --warning: #C4903A;
      --warning-bg: #FBF3E5;
      --danger: #9E5A48;
      --danger-bg: #F9EDEA;
    }

    .content-scroll {
      padding: 2rem;
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
      overflow-y: auto;
      height: 100%;
    }

    .content-scroll::-webkit-scrollbar { width: 4px; }
    .content-scroll::-webkit-scrollbar-track { background: transparent; }
    .content-scroll::-webkit-scrollbar-thumb { background: var(--sand); border-radius: 2px; }

    /* KPI Cards - Responsive Grid */
    .kpi-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1rem;
    }
    .kpi-card {
      background: var(--cream);
      border: 0.5px solid var(--sand);
      border-radius: 10px;
      padding: 1.25rem 1.5rem;
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
      position: relative;
      overflow: hidden;
      transition: transform 0.2s, box-shadow 0.2s;
    }
    .kpi-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(28,25,23,0.06);
    }
    .kpi-card::after {
      content: '';
      position: absolute;
      top: 0; left: 0; right: 0;
      height: 2px;
    }
    .kpi-card.k1::after { background: linear-gradient(90deg, var(--tan), var(--bark)); }
    .kpi-card.k2::after { background: linear-gradient(90deg, var(--success), #8FAE80); }
    .kpi-card.k3::after { background: linear-gradient(90deg, var(--warning), #D4A855); }
    .kpi-card.k4::after { background: linear-gradient(90deg, var(--bark-dark), var(--bark)); }
    .kpi-header { display: flex; justify-content: space-between; align-items: flex-start; }
    .kpi-label { font-size: 11px; letter-spacing: 0.1em; text-transform: uppercase; color: var(--warm-gray); }
    .kpi-icon-wrap {
      width: 32px; height: 32px;
      border-radius: 8px;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .kpi-icon-wrap svg { width: 15px; height: 15px; stroke-width: 1.5; fill: none; }
    .kpi-value {
      font-family: 'Cormorant Garamond', serif;
      font-size: 36px;
      font-weight: 400;
      color: var(--ink);
      line-height: 1;
    }
    .kpi-footer { display: flex; align-items: center; gap: 6px; flex-wrap: wrap; }
    .kpi-change {
      font-size: 11px;
      padding: 2px 7px;
      border-radius: 10px;
      font-weight: 400;
    }
    .kpi-change.up { background: var(--success-bg); color: var(--success); }
    .kpi-change.down { background: var(--danger-bg); color: var(--danger); }
    .kpi-period { font-size: 11px; color: var(--warm-gray-light); }

    /* Middle Row - Responsive */
    .mid-row {
      display: grid;
      grid-template-columns: 1fr 360px;
      gap: 1rem;
    }
    .chart-card, .donut-card {
      background: var(--cream);
      border: 0.5px solid var(--sand);
      border-radius: 10px;
      padding: 1.5rem;
    }
    .card-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 1.5rem;
      flex-wrap: wrap;
      gap: 1rem;
    }
    .card-title {
      font-family: 'Cormorant Garamond', serif;
      font-size: 18px;
      font-weight: 400;
    }
    .card-subtitle { font-size: 11px; color: var(--warm-gray); margin-top: 2px; }
    .time-tabs { display: flex; gap: 2px; background: var(--sand-light); border-radius: 6px; padding: 3px; flex-wrap: wrap; }
    .time-tab {
      font-size: 11px;
      padding: 4px 10px;
      border-radius: 4px;
      cursor: pointer;
      color: var(--warm-gray);
      transition: all 0.2s;
    }
    .time-tab.active { background: var(--off-white); color: var(--ink); box-shadow: 0 1px 3px rgba(28,25,23,0.08); }
    .chart-wrap svg { width: 100%; height: auto; }
    .chart-legend { display: flex; gap: 1.5rem; margin-top: 1rem; flex-wrap: wrap; }
    .legend-item { display: flex; align-items: center; gap: 6px; font-size: 11px; color: var(--warm-gray); }
    .legend-dot { width: 8px; height: 8px; border-radius: 50%; }

    /* Bottom Row - Responsive */
    .bottom-row { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }
    .table-card {
      background: var(--cream);
      border: 0.5px solid var(--sand);
      border-radius: 10px;
      overflow-x: auto;
    }
    .table-card .card-header { padding: 1.25rem 1.5rem 0; flex-wrap: wrap; }
    .data-table { width: 100%; border-collapse: collapse; min-width: 500px; }
    .data-table th {
      font-size: 10px;
      text-transform: uppercase;
      color: var(--warm-gray);
      padding: 10px 1.5rem;
      text-align: left;
      background: var(--sand-light);
    }
    .data-table td {
      padding: 12px 1.5rem;
      font-size: 12px;
      border-bottom: 0.5px solid rgba(226,213,195,0.5);
    }
    .order-id { color: var(--bark); font-size: 11px; }
    .status-pill {
      display: inline-flex;
      align-items: center;
      gap: 4px;
      font-size: 10px;
      padding: 3px 8px;
      border-radius: 10px;
      white-space: nowrap;
    }
    .status-pill::before { content: ''; width: 5px; height: 5px; border-radius: 50%; }
    .status-pill.shipped { background: var(--success-bg); color: var(--success); }
    .status-pill.shipped::before { background: var(--success); }
    .status-pill.pending { background: var(--warning-bg); color: var(--warning); }
    .status-pill.pending::before { background: var(--warning); }
    .status-pill.processing { background: rgba(196,168,130,0.18); color: var(--bark); }
    .status-pill.processing::before { background: var(--tan); }
    .status-pill.returned { background: var(--danger-bg); color: var(--danger); }
    .status-pill.returned::before { background: var(--danger); }

    .pill-action {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      border: 0.5px solid var(--sand);
      border-radius: 20px;
      padding: 6px 14px;
      font-size: 11px;
      background: var(--off-white);
      cursor: pointer;
      white-space: nowrap;
    }
    .pill-action:hover { background: var(--ink); color: var(--cream); }

    .fade-in { animation: fadeIn 0.5s ease both; }
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(12px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Responsive Breakpoints */
    @media (max-width: 1024px) {
      .main-content {
        margin-left: 0;
      }
      .kpi-value {
        font-size: 28px;
      }
      .kpi-card {
        padding: 1rem;
      }
    }

    @media (max-width: 900px) {
      .kpi-grid {
        grid-template-columns: repeat(2, 1fr);
      }
      .mid-row {
        grid-template-columns: 1fr;
      }
      .bottom-row {
        grid-template-columns: 1fr;
      }
      .content-scroll {
        padding: 1rem;
      }
    }

    @media (max-width: 768px) {
      .kpi-value {
        font-size: 24px;
      }
      .kpi-label {
        font-size: 9px;
      }
      .kpi-icon-wrap {
        width: 26px;
        height: 26px;
      }
      .kpi-icon-wrap svg {
        width: 12px;
        height: 12px;
      }
      .card-title {
        font-size: 16px;
      }
      .time-tab {
        font-size: 9px;
        padding: 3px 8px;
      }
    }

    @media (max-width: 480px) {
      .kpi-grid {
        grid-template-columns: 1fr;
      }
      .content-scroll {
        padding: 0.75rem;
        gap: 0.75rem;
      }
      .chart-card, .donut-card {
        padding: 1rem;
      }
      .card-header {
        flex-direction: column;
        align-items: flex-start;
      }
      .donut-wrap svg {
        width: 120px;
        height: 120px;
      }
      .donut-center-val {
        font-size: 20px;
      }
      .donut-legend-item {
        font-size: 10px;
      }
      .product-row-name {
        font-size: 11px;
      }
      .product-row-revenue {
        font-size: 13px;
      }
    }
  </style>
  <?php
  @include('sidebar.php')?>

  <div class="content-scroll">
    <!-- KPI Grid -->
    <div class="kpi-grid fade-in">
      <div class="kpi-card k1">
        <div class="kpi-header"><div class="kpi-label">Total Revenue</div><div class="kpi-icon-wrap"><svg viewBox="0 0 24 24"><line x1="12" y1="1" x2="12" y2="23"/><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/></svg></div></div>
        <div class="kpi-value" id="kpi-revenue">€0</div>
        <div class="kpi-footer"><span class="kpi-change up">↑ 18.4%</span><span class="kpi-period">vs last month</span></div>
      </div>
      <div class="kpi-card k2">
        <div class="kpi-header"><div class="kpi-label">Total Orders</div><div class="kpi-icon-wrap"><svg viewBox="0 0 24 24"><path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/></svg></div></div>
        <div class="kpi-value" id="kpi-orders">0</div>
        <div class="kpi-footer"><span class="kpi-change up">↑ 9.2%</span><span class="kpi-period">vs last month</span></div>
      </div>
      <div class="kpi-card k3">
        <div class="kpi-header"><div class="kpi-label">Avg. Order Value</div><div class="kpi-icon-wrap"><svg viewBox="0 0 24 24"><polyline points="22 12 18 12 15 21 9 3 6 12 2 12"/></svg></div></div>
        <div class="kpi-value" id="kpi-aov">€0</div>
        <div class="kpi-footer"><span class="kpi-change up">↑ 3.1%</span><span class="kpi-period">vs last month</span></div>
      </div>
      <div class="kpi-card k4">
        <div class="kpi-header"><div class="kpi-label">Active Customers</div><div class="kpi-icon-wrap"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg></div></div>
        <div class="kpi-value" id="kpi-customers">0</div>
        <div class="kpi-footer"><span class="kpi-change down">↓ 1.8%</span><span class="kpi-period">vs last month</span></div>
      </div>
    </div>

    <!-- Middle Row -->
    <div class="mid-row fade-in">
      <div class="chart-card">
        <div class="card-header"><div><div class="card-title">Revenue Overview</div><div class="card-subtitle">Monthly net revenue across all product lines</div></div><div class="time-tabs"><div class="time-tab active">7d</div><div class="time-tab">1m</div><div class="time-tab">6m</div><div class="time-tab">1y</div></div></div>
        <div class="chart-wrap"><svg viewBox="0 0 560 180"><line x1="40" y1="20" x2="540" y2="20" stroke="#E2D5C3" stroke-width="0.5" stroke-dasharray="4,4"/><line x1="40" y1="55" x2="540" y2="55" stroke="#E2D5C3" stroke-width="0.5" stroke-dasharray="4,4"/><line x1="40" y1="90" x2="540" y2="90" stroke="#E2D5C3" stroke-width="0.5" stroke-dasharray="4,4"/><line x1="40" y1="125" x2="540" y2="125" stroke="#E2D5C3" stroke-width="0.5" stroke-dasharray="4,4"/><line x1="40" y1="160" x2="540" y2="160" stroke="#E2D5C3" stroke-width="0.5"/><text x="30" y="24" font-size="9" fill="#9A8F83" text-anchor="end">€80k</text><text x="30" y="59" font-size="9" fill="#9A8F83" text-anchor="end">€60k</text><text x="30" y="94" font-size="9" fill="#9A8F83" text-anchor="end">€40k</text><text x="30" y="129" font-size="9" fill="#9A8F83" text-anchor="end">€20k</text><text x="30" y="163" font-size="9" fill="#9A8F83" text-anchor="end">€0</text><defs><linearGradient id="revenueGrad" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#C4A882" stop-opacity="0.25"/><stop offset="100%" stop-color="#C4A882" stop-opacity="0.01"/></linearGradient><linearGradient id="prevGrad" x1="0" y1="0" x2="0" y2="1"><stop offset="0%" stop-color="#6B8F5E" stop-opacity="0.15"/><stop offset="100%" stop-color="#6B8F5E" stop-opacity="0.01"/></linearGradient></defs><path d="M 50 120 C 90 115 120 105 160 100 C 200 95 230 108 270 100 C 310 92 340 80 380 75 C 420 70 460 85 500 78 C 520 75 530 72 540 70 L 540 160 L 50 160 Z" fill="url(#prevGrad)"/><path d="M 50 120 C 90 115 120 105 160 100 C 200 95 230 108 270 100 C 310 92 340 80 380 75 C 420 70 460 85 500 78 C 520 75 530 72 540 70" fill="none" stroke="#6B8F5E" stroke-width="1.5" stroke-dasharray="5,3"/><path d="M 50 130 C 90 118 120 95 160 82 C 200 68 230 90 270 65 C 310 42 340 55 380 38 C 420 22 460 45 500 32 C 520 26 530 24 540 22 L 540 160 L 50 160 Z" fill="url(#revenueGrad)"/><path d="M 50 130 C 90 118 120 95 160 82 C 200 68 230 90 270 65 C 310 42 340 55 380 38 C 420 22 460 45 500 32 C 520 26 530 24 540 22" fill="none" stroke="#C4A882" stroke-width="2"/><circle cx="380" cy="38" r="4" fill="#8C6E50" stroke="#FAF7F2" stroke-width="2"/><line x1="380" y1="38" x2="380" y2="160" stroke="#8C6E50" stroke-width="0.5" stroke-dasharray="3,3"/><rect x="355" y="22" width="50" height="18" rx="4" fill="#1C1917"/><text x="380" y="34" font-size="9" fill="#F5EFE4" text-anchor="middle">€68,420</text><text x="50" y="175" font-size="9" fill="#9A8F83" text-anchor="middle">Nov</text><text x="120" y="175" font-size="9" fill="#9A8F83" text-anchor="middle">Dec</text><text x="190" y="175" font-size="9" fill="#9A8F83" text-anchor="middle">Jan</text><text x="260" y="175" font-size="9" fill="#9A8F83" text-anchor="middle">Feb</text><text x="330" y="175" font-size="9" fill="#9A8F83" text-anchor="middle">Mar</text><text x="400" y="175" font-size="9" fill="#9A8F83" text-anchor="middle">Apr</text><text x="470" y="175" font-size="9" fill="#9A8F83" text-anchor="middle">May</text></svg></div>
        <div class="chart-legend"><div class="legend-item"><div class="legend-dot" style="background:var(--tan);"></div>Current period</div><div class="legend-item"><div class="legend-dot" style="background:var(--success);opacity:0.6;"></div>Previous period</div></div>
      </div>

      <div class="donut-card">
        <div class="card-header"><div><div class="card-title">Sales by Category</div><div class="card-subtitle">Revenue distribution</div></div></div>
        <div class="donut-wrap"><svg width="160" height="160" viewBox="0 0 160 160"><circle cx="80" cy="80" r="58" fill="none" stroke="#E2D5C3" stroke-width="22"/><circle cx="80" cy="80" r="58" fill="none" stroke="#C4A882" stroke-width="22" stroke-dasharray="152.9 211.3" stroke-dashoffset="0" transform="rotate(-90 80 80)"/><circle cx="80" cy="80" r="58" fill="none" stroke="#6B8F5E" stroke-width="22" stroke-dasharray="101.8 262.4" stroke-dashoffset="-152.9" transform="rotate(-90 80 80)"/><circle cx="80" cy="80" r="58" fill="none" stroke="#8C6E50" stroke-width="22" stroke-dasharray="65.4 298.8" stroke-dashoffset="-254.7" transform="rotate(-90 80 80)"/><circle cx="80" cy="80" r="58" fill="none" stroke="#D4B896" stroke-width="22" stroke-dasharray="43.6 320.6" stroke-dashoffset="-320.1" transform="rotate(-90 80 80)"/></svg><div class="donut-center"><div class="donut-center-val">€142k</div><div class="donut-center-lbl">Total</div></div></div>
        <div class="donut-legend"><div class="donut-legend-item"><div class="donut-legend-left"><div class="legend-dot" style="background:#C4A882;"></div>Face Care</div><div class="donut-legend-bar-wrap"><div class="donut-legend-bar" style="width:42%;background:#C4A882;"></div></div><span>42%</span></div><div class="donut-legend-item"><div class="donut-legend-left"><div class="legend-dot" style="background:#6B8F5E;"></div>Body</div><div class="donut-legend-bar-wrap"><div class="donut-legend-bar" style="width:28%;background:#6B8F5E;"></div></div><span>28%</span></div><div class="donut-legend-item"><div class="donut-legend-left"><div class="legend-dot" style="background:#8C6E50;"></div>Tools</div><div class="donut-legend-bar-wrap"><div class="donut-legend-bar" style="width:18%;background:#8C6E50;"></div></div><span>18%</span></div><div class="donut-legend-item"><div class="donut-legend-left"><div class="legend-dot" style="background:#D4B896;"></div>Sets</div><div class="donut-legend-bar-wrap"><div class="donut-legend-bar" style="width:12%;background:#D4B896;"></div></div><span>12%</span></div></div>
      </div>
    </div>

    <!-- Bottom Row -->
    <div class="bottom-row fade-in">
      <div class="table-card">
        <div class="card-header"><div><div class="card-title">Recent Orders</div><div class="card-subtitle">Last 24 hours</div></div><button class="pill-action">View all</button></div>
        <table class="data-table"><thead><tr><th>Order</th><th>Customer</th><th>Product</th><th>Amount</th><th>Status</th></tr></thead><tbody><tr><td><span class="order-id">PSC-4821</span></td><td>Layla Hassan</td><td>Calm Restore Serum</td><td>€58.00</td><td><span class="status-pill shipped">shipped</span></td></tr><tr><td><span class="order-id">PSC-4820</span></td><td>Nadia Farooq</td><td>Barrier Shield Mist</td><td>€42.00</td><td><span class="status-pill processing">processing</span></td></tr><tr><td><span class="order-id">PSC-4819</span></td><td>Imran Siddiq</td><td>The Calm Ritual Set</td><td>€148.00</td><td><span class="status-pill shipped">shipped</span></td></tr><tr><td><span class="order-id">PSC-4818</span></td><td>Sara Qureshi</td><td>Radiance Day Oil</td><td>€65.00</td><td><span class="status-pill pending">pending</span></td></tr><tr><td><span class="order-id">PSC-4817</span></td><td>Omar Raza</td><td>Night Renewal Balm</td><td>€74.00</td><td><span class="status-pill returned">returned</span></td></tr><tr><td><span class="order-id">PSC-4816</span></td><td>Hina Malik</td><td>Travel Essentials Duo</td><td>€68.00</td><td><span class="status-pill shipped">shipped</span></td></tr></tbody></table>
      </div>

      <div style="display:flex;flex-direction:column;gap:1rem;">

        <div class="chart-card" style="padding:1.25rem 1.5rem;">
          <div class="card-header" style="margin-bottom:1rem;"><div class="card-title">Top Products</div><div class="card-subtitle">By revenue this month</div></div>
          <div><div class="product-row"><div class="product-thumb"><svg width="24" height="40" viewBox="0 0 80 160"><rect x="14" y="28" width="52" height="118" rx="6" fill="#C4A882" opacity="0.85"/><rect x="30" y="10" width="20" height="20" rx="3" fill="#C4A882" opacity="0.6"/></svg></div><div class="product-info"><div class="product-row-name">Calm Restore Serum</div><div class="product-row-cat">Face Care</div></div><div style="text-align:right;"><div class="product-row-revenue">€18,240</div><div class="product-row-units">314 units</div></div></div><div class="product-row"><div class="product-thumb"><svg width="24" height="40" viewBox="0 0 80 160"><rect x="14" y="28" width="52" height="118" rx="6" fill="#8C6E50" opacity="0.85"/><rect x="30" y="10" width="20" height="20" rx="3" fill="#8C6E50" opacity="0.6"/></svg></div><div class="product-info"><div class="product-row-name">Radiance Day Oil</div><div class="product-row-cat">Face Care</div></div><div style="text-align:right;"><div class="product-row-revenue">€14,625</div><div class="product-row-units">225 units</div></div></div><div class="product-row"><div class="product-thumb"><svg width="24" height="40" viewBox="0 0 80 160"><rect x="14" y="28" width="52" height="118" rx="6" fill="#1C1917" opacity="0.85"/><rect x="30" y="10" width="20" height="20" rx="3" fill="#1C1917" opacity="0.6"/></svg></div><div class="product-info"><div class="product-row-name">Night Renewal Balm</div><div class="product-row-cat">Face Care</div></div><div style="text-align:right;"><div class="product-row-revenue">€11,840</div><div class="product-row-units">160 units</div></div></div><div class="product-row"><div class="product-thumb"><svg width="24" height="40" viewBox="0 0 80 160"><rect x="14" y="28" width="52" height="118" rx="6" fill="#6B8F5E" opacity="0.85"/><rect x="30" y="10" width="20" height="20" rx="3" fill="#6B8F5E" opacity="0.6"/></svg></div><div class="product-info"><div class="product-row-name">Barrier Shield Mist</div><div class="product-row-cat">Body</div></div><div style="text-align:right;"><div class="product-row-revenue">€9,030</div><div class="product-row-units">215 units</div></div></div></div>
        </div>
      </div>
    </div>
  </div>
</section>

<script>
  function animateCounter(el, target, prefix = '', suffix = '') {
    if (!el) return;
    let start = 0;
    const step = target / 90;
    const timer = setInterval(() => {
      start += step;
      if (start >= target) {
        start = target;
        clearInterval(timer);
      }
      el.textContent = prefix + Math.floor(start).toLocaleString() + suffix;
    }, 16);
  }

  setTimeout(() => {
    animateCounter(document.getElementById('kpi-revenue'), 142680, '€');
    animateCounter(document.getElementById('kpi-orders'), 2841, '', '');
    animateCounter(document.getElementById('kpi-aov'), 63, '€');
    animateCounter(document.getElementById('kpi-customers'), 1204, '', '');
  }, 300);
</script>