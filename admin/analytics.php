<?php
// analytics.php - Analytics Dashboard Page
// Make sure sidebar-header.php contains both sidebar and topbar
include('sidebar.php');
?>

<!-- Google Charts Library -->
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<section class="main-content">
  <style>
    /* Main Content Override - respects sidebar and header */
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
    
    .content-scroll {
      padding: 2rem;
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
      overflow-y: auto;
      height: 100%;
    }

    /* Analytics Page Specific Styles */
    .analytics-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 1rem;
      margin-bottom: 0.5rem;
    }
    
    .date-range-selector {
      display: flex;
      gap: 0.5rem;
      background: var(--sand-light);
      padding: 0.25rem;
      border-radius: 10px;
    }
    
    .date-btn {
      padding: 0.5rem 1rem;
      font-size: 12px;
      font-weight: 500;
      border: none;
      background: transparent;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.2s;
      color: var(--warm-gray);
      font-family: 'Inter', sans-serif;
    }
    
    .date-btn.active {
      background: var(--off-white);
      color: var(--ink);
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
    }
    
    .date-btn:hover:not(.active) {
      background: rgba(196,168,130,0.2);
      color: var(--bark);
    }
    
    /* Analytics Grid */
    .analytics-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1rem;
      margin-bottom: 0.5rem;
    }
    
    .metric-card {
      background: var(--cream);
      border: 0.5px solid var(--sand);
      border-radius: 12px;
      padding: 1.25rem;
      transition: all 0.2s;
    }
    
    .metric-card:hover {
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(28,25,23,0.06);
    }
    
    .metric-label {
      font-size: 11px;
      text-transform: uppercase;
      letter-spacing: 0.1em;
      color: var(--warm-gray);
      font-weight: 500;
      margin-bottom: 0.5rem;
    }
    
    .metric-value {
      font-family: 'Playfair Display', serif;
      font-size: 32px;
      font-weight: 600;
      color: var(--ink);
      margin-bottom: 0.25rem;
    }
    
    .metric-trend {
      display: flex;
      align-items: center;
      gap: 0.5rem;
      font-size: 11px;
    }
    
    .trend-up {
      color: var(--success);
      background: var(--success-bg);
      padding: 2px 6px;
      border-radius: 10px;
    }
    
    .trend-down {
      color: var(--danger);
      background: var(--danger-bg);
      padding: 2px 6px;
      border-radius: 10px;
    }
    
    /* Two Column Layout */
    .two-col {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
    }
    
    /* Chart Cards */
    .chart-card-lg {
      background: var(--cream);
      border: 0.5px solid var(--sand);
      border-radius: 12px;
      padding: 1.25rem;
    }
    
    .chart-title {
      font-family: 'Playfair Display', serif;
      font-size: 16px;
      font-weight: 600;
      margin-bottom: 0.25rem;
    }
    
    .chart-subtitle {
      font-size: 11px;
      color: var(--warm-gray);
      margin-bottom: 1rem;
    }
    
    .chart-container {
      width: 100%;
      height: 280px;
    }
    
    /* Product Performance Table */
    .product-table {
      width: 100%;
      border-collapse: collapse;
    }
    
    .product-table th {
      text-align: left;
      padding: 0.75rem 0;
      font-size: 10px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: var(--warm-gray);
      border-bottom: 1px solid var(--sand);
    }
    
    .product-table td {
      padding: 0.75rem 0;
      font-size: 12px;
      border-bottom: 0.5px solid rgba(226,213,195,0.5);
    }
    
    .product-table tr:last-child td {
      border-bottom: none;
    }
    
    .product-rank {
      width: 30px;
      font-weight: 600;
      color: var(--bark);
    }
    
    .product-name-cell {
      font-weight: 500;
    }
    
    /* Top Countries */
    .country-list {
      display: flex;
      flex-direction: column;
      gap: 0.75rem;
    }
    
    .country-item {
      display: flex;
      align-items: center;
      gap: 0.75rem;
    }
    
    .country-flag {
      font-size: 18px;
      width: 28px;
    }
    
    .country-name {
      flex: 1;
      font-size: 12px;
      font-weight: 500;
    }
    
    .country-revenue {
      font-size: 12px;
      font-weight: 600;
    }
    
    .country-growth {
      font-size: 10px;
      padding: 2px 6px;
      border-radius: 10px;
    }
    
    /* Hourly Heatmap */
    .heatmap-grid {
      display: grid;
      grid-template-columns: repeat(7, 1fr);
      gap: 6px;
      margin-top: 1rem;
    }
    
    .heatmap-day {
      text-align: center;
    }
    
    .heatmap-day-label {
      font-size: 9px;
      color: var(--warm-gray);
      margin-bottom: 8px;
      text-transform: uppercase;
    }
    
    .heatmap-hours {
      display: flex;
      flex-direction: column;
      gap: 4px;
    }
    
    .heatmap-cell {
      height: 28px;
      border-radius: 4px;
      transition: all 0.2s;
      cursor: pointer;
    }
    
    .heatmap-cell:hover {
      transform: scale(1.05);
      opacity: 0.8;
    }
    
    /* KPIs Row */
    .kpi-row {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1rem;
    }
    
    .kpi-mini-card {
      background: var(--cream);
      border: 0.5px solid var(--sand);
      border-radius: 10px;
      padding: 1rem;
      text-align: center;
    }
    
    .kpi-mini-value {
      font-family: 'Playfair Display', serif;
      font-size: 24px;
      font-weight: 600;
    }
    
    .kpi-mini-label {
      font-size: 10px;
      color: var(--warm-gray);
      text-transform: uppercase;
      letter-spacing: 0.08em;
      margin-top: 4px;
    }
    
    /* Responsive Breakpoints */
    @media (max-width: 1024px) {
      .main-content {
        margin-left: 0;
      }
      .analytics-grid {
        grid-template-columns: repeat(2, 1fr);
      }
      .two-col {
        grid-template-columns: 1fr;
      }
      .kpi-row {
        grid-template-columns: repeat(3, 1fr);
      }
    }
    
    @media (max-width: 768px) {
      .main-content {
        margin-left: 0;
      }
      .content-scroll {
        padding: 1rem;
      }
      .analytics-header {
        flex-direction: column;
        align-items: stretch;
      }
      .date-range-selector {
        justify-content: center;
      }
      .analytics-grid {
        grid-template-columns: 1fr;
      }
      .kpi-row {
        grid-template-columns: 1fr;
      }
      .chart-container {
        height: 220px;
      }
    }
    
    @media (max-width: 480px) {
      .content-scroll {
        padding: 0.75rem;
        gap: 0.75rem;
      }
      .metric-value {
        font-size: 24px;
      }
      .chart-card-lg {
        padding: 0.75rem;
      }
    }
  </style>

  <div class="content-scroll">
    <!-- Page Header -->
    <div class="analytics-header">
      <div>
        <div class="page-title">Analytics</div>
        <div class="page-breadcrumb">Real-time insights & performance metrics</div>
      </div>
      <div class="date-range-selector">
        <button class="date-btn active" onclick="changeDateRange(this, '7d')">7 days</button>
        <button class="date-btn" onclick="changeDateRange(this, '30d')">30 days</button>
        <button class="date-btn" onclick="changeDateRange(this, '90d')">90 days</button>
        <button class="date-btn" onclick="changeDateRange(this, '1y')">1 year</button>
      </div>
    </div>

    <!-- Main KPI Grid -->
    <div class="analytics-grid fade-in">
      <div class="metric-card">
        <div class="metric-label">Total Revenue</div>
        <div class="metric-value" id="analytics-revenue">€0</div>
        <div class="metric-trend"><span class="trend-up">↑ 23.5%</span> <span style="color:var(--warm-gray);">vs previous</span></div>
      </div>
      <div class="metric-card">
        <div class="metric-label">Total Orders</div>
        <div class="metric-value" id="analytics-orders">0</div>
        <div class="metric-trend"><span class="trend-up">↑ 15.2%</span> <span style="color:var(--warm-gray);">vs previous</span></div>
      </div>
      <div class="metric-card">
        <div class="metric-label">Conversion Rate</div>
        <div class="metric-value">3.24%</div>
        <div class="metric-trend"><span class="trend-up">↑ 0.42%</span> <span style="color:var(--warm-gray);">vs previous</span></div>
      </div>
      <div class="metric-card">
        <div class="metric-label">Customer LTV</div>
        <div class="metric-value">€342</div>
        <div class="metric-trend"><span class="trend-up">↑ 8.7%</span> <span style="color:var(--warm-gray);">vs previous</span></div>
      </div>
    </div>

    <!-- Mini KPIs Row -->
    <div class="kpi-row fade-in">
      <div class="kpi-mini-card">
        <div class="kpi-mini-value">4.2</div>
        <div class="kpi-mini-label">Avg. Items Per Order</div>
      </div>
      <div class="kpi-mini-card">
        <div class="kpi-mini-value">€89</div>
        <div class="kpi-mini-label">Avg. Order Value</div>
      </div>
      <div class="kpi-mini-card">
        <div class="kpi-mini-value">32%</div>
        <div class="kpi-mini-label">Repeat Purchase Rate</div>
      </div>
    </div>

    <!-- Two Column Charts -->
    <div class="two-col fade-in">
      <!-- Revenue Trend Chart -->
      <div class="chart-card-lg">
        <div class="chart-title">Revenue Trend</div>
        <div class="chart-subtitle">Daily revenue over selected period</div>
        <div id="revenue-trend-chart" class="chart-container"></div>
      </div>
      
      <!-- Sales by Channel -->
      <div class="chart-card-lg">
        <div class="chart-title">Sales by Channel</div>
        <div class="chart-subtitle">Revenue distribution across channels</div>
        <div id="channel-chart" class="chart-container"></div>
      </div>
    </div>

    <!-- Second Row -->
    <div class="two-col fade-in">
      <!-- Top Products Table -->
      <div class="chart-card-lg">
        <div class="chart-title">Top Performing Products</div>
        <div class="chart-subtitle">Best sellers by revenue</div>
        <table class="product-table">
          <thead>
            <tr><th>#</th><th>Product</th><th>Revenue</th><th>Units</th><th>Growth</th></tr>
          </thead>
          <tbody id="top-products-table"></tbody>
        </table>
      </div>
      
      <!-- Customer Geography -->
      <div class="chart-card-lg">
        <div class="chart-title">Top Markets</div>
        <div class="chart-subtitle">Revenue by country</div>
        <div class="country-list" id="top-countries"></div>
      </div>
    </div>

    <!-- Third Row -->
    <div class="two-col fade-in">
      <!-- Hourly Activity Heatmap -->
      <div class="chart-card-lg">
        <div class="chart-title">Hourly Activity</div>
        <div class="chart-subtitle">Orders by hour & day (heatmap)</div>
        <div id="heatmap-container"></div>
      </div>
      
      <!-- Customer Segments -->
      <div class="chart-card-lg">
        <div class="chart-title">Customer Segments</div>
        <div class="chart-subtitle">Distribution by customer type</div>
        <div id="segments-chart" class="chart-container"></div>
      </div>
    </div>
  </div>
</section>

<script>
// Data
const topProductsData = [
  { name: 'Calm Restore Serum', revenue: 18240, units: 314, growth: 12.5, category: 'Skincare' },
  { name: 'Radiance Day Oil', revenue: 14625, units: 225, growth: 8.3, category: 'Face Care' },
  { name: 'Night Renewal Balm', revenue: 11840, units: 160, growth: 15.2, category: 'Night Care' },
  { name: 'Barrier Shield Mist', revenue: 9030, units: 215, growth: 5.8, category: 'Face Care' },
  { name: 'The Calm Ritual Set', revenue: 8732, units: 59, growth: 22.1, category: 'Sets' }
];

const countriesData = [
  { flag: '🇩🇪', name: 'Germany', revenue: 68420, growth: 18.4 },
  { flag: '🇫🇷', name: 'France', revenue: 45230, growth: 12.7 },
  { flag: '🇬🇧', name: 'United Kingdom', revenue: 38900, growth: 9.2 },
  { flag: '🇮🇹', name: 'Italy', revenue: 27540, growth: -2.3 },
  { flag: '🇪🇸', name: 'Spain', revenue: 21380, growth: 15.8 }
];

// Google Charts
google.charts.load('current', { packages: ['corechart'] });
google.charts.setOnLoadCallback(drawAllCharts);

function drawAllCharts() {
  drawRevenueTrendChart();
  drawChannelChart();
  drawSegmentsChart();
}

function drawRevenueTrendChart() {
  const data = google.visualization.arrayToDataTable([
    ['Date', 'Revenue', 'Orders'],
    ['May 1', 3200, 42],
    ['May 2', 4100, 48],
    ['May 3', 3850, 45],
    ['May 4', 5200, 58],
    ['May 5', 4780, 52],
    ['May 6', 6100, 67],
    ['May 7', 5840, 63],
    ['May 8', 4450, 49],
    ['May 9', 5120, 55],
    ['May 10', 6780, 72],
    ['May 11', 7230, 78],
    ['May 12', 6950, 74],
    ['May 13', 5340, 58],
    ['May 14', 7890, 84]
  ]);
  
  const options = {
    curveType: 'function',
    legend: { position: 'bottom', textStyle: { fontName: 'Inter', fontSize: 10 } },
    chartArea: { width: '85%', height: '70%' },
    colors: ['#C4A882', '#6B8F5E'],
    backgroundColor: 'transparent',
    lineWidth: 2,
    pointSize: 4,
    pointColor: '#8C6E50',
    vAxis: { textStyle: { fontName: 'Inter', fontSize: 9 }, gridlines: { color: '#E2D5C3' } },
    hAxis: { textStyle: { fontName: 'Inter', fontSize: 9 }, slantedText: true },
    tooltip: { textStyle: { fontName: 'Inter', fontSize: 11 } }
  };
  
  const chart = new google.visualization.LineChart(document.getElementById('revenue-trend-chart'));
  chart.draw(data, options);
}

function drawChannelChart() {
  const data = google.visualization.arrayToDataTable([
    ['Channel', 'Revenue', { role: 'style' }],
    ['Direct', 42500, '#C4A882'],
    ['Organic Search', 38700, '#D4BCA0'],
    ['Social Media', 29400, '#8C6E50'],
    ['Email', 18700, '#6B8F5E'],
    ['Referral', 12400, '#C4903A']
  ]);
  
  const options = {
    legend: { position: 'bottom', textStyle: { fontName: 'Inter', fontSize: 10 } },
    chartArea: { width: '85%', height: '70%' },
    backgroundColor: 'transparent',
    bar: { groupWidth: '60%' },
    vAxis: { textStyle: { fontName: 'Inter', fontSize: 9 }, format: 'currency' },
    hAxis: { textStyle: { fontName: 'Inter', fontSize: 9 } }
  };
  
  const chart = new google.visualization.ColumnChart(document.getElementById('channel-chart'));
  chart.draw(data, options);
}

function drawSegmentsChart() {
  const data = google.visualization.arrayToDataTable([
    ['Segment', 'Percentage'],
    ['New Customers', 38],
    ['Returning Customers', 32],
    ['VIP/Loyal', 18],
    ['At Risk', 12]
  ]);
  
  const options = {
    legend: { position: 'bottom', textStyle: { fontName: 'Inter', fontSize: 10 } },
    pieHole: 0.4,
    chartArea: { width: '90%', height: '80%' },
    backgroundColor: 'transparent',
    colors: ['#C4A882', '#6B8F5E', '#8C6E50', '#D4BCA0'],
    tooltip: { textStyle: { fontName: 'Inter', fontSize: 11 } }
  };
  
  const chart = new google.visualization.PieChart(document.getElementById('segments-chart'));
  chart.draw(data, options);
}

// Render Top Products Table
function renderTopProducts() {
  const tbody = document.getElementById('top-products-table');
  tbody.innerHTML = topProductsData.map((product, index) => {
    const growthClass = product.growth >= 0 ? 'trend-up' : 'trend-down';
    const growthSymbol = product.growth >= 0 ? '↑' : '↓';
    return `
      <tr>
        <td class="product-rank">${index + 1}</td>
        <td class="product-name-cell">${product.name}<br><span style="font-size:9px;color:var(--warm-gray);">${product.category}</span></td>
        <td style="font-weight:600;">€${product.revenue.toLocaleString()}</td>
        <td>${product.units}</td>
        <td><span class="${growthClass}" style="padding:2px 6px;border-radius:10px;font-size:9px;">${growthSymbol} ${Math.abs(product.growth)}%</span></td>
      </tr>
    `;
  }).join('');
}

// Render Top Countries
function renderTopCountries() {
  const container = document.getElementById('top-countries');
  container.innerHTML = countriesData.map(country => {
    const growthClass = country.growth >= 0 ? 'trend-up' : 'trend-down';
    const growthSymbol = country.growth >= 0 ? '↑' : '↓';
    return `
      <div class="country-item">
        <div class="country-flag">${country.flag}</div>
        <div class="country-name">${country.name}</div>
        <div class="country-revenue">€${country.revenue.toLocaleString()}</div>
        <div class="country-growth ${growthClass}" style="padding:2px 6px;border-radius:10px;font-size:9px;">${growthSymbol} ${Math.abs(country.growth)}%</div>
      </div>
    `;
  }).join('');
}

// Render Hourly Heatmap
function renderHeatmap() {
  const days = ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'];
  const hours = [8, 10, 12, 14, 16, 18, 20, 22];
  
  const heatmapData = [
    [45, 62, 78, 85, 72, 58, 42],
    [48, 65, 82, 88, 75, 60, 44],
    [52, 68, 85, 92, 78, 62, 46],
    [55, 72, 88, 95, 80, 65, 48],
    [58, 78, 92, 98, 85, 70, 52],
    [72, 85, 88, 82, 78, 68, 58],
    [38, 52, 65, 72, 68, 55, 42]
  ];
  
  let html = '<div class="heatmap-grid">';
  for (let i = 0; i < days.length; i++) {
    html += `<div class="heatmap-day"><div class="heatmap-day-label">${days[i]}</div><div class="heatmap-hours">`;
    for (let j = 0; j < heatmapData[i].length; j++) {
      const intensity = heatmapData[i][j];
      const opacity = 0.2 + (intensity / 100) * 0.7;
      html += `<div class="heatmap-cell" style="background:rgba(140,110,80,${opacity});" title="${days[i]} ${hours[j]}:00 - ${intensity} orders"></div>`;
    }
    html += `</div></div>`;
  }
  html += '</div>';
  document.getElementById('heatmap-container').innerHTML = html;
}

// Date range change handler
function changeDateRange(btn, range) {
  document.querySelectorAll('.date-btn').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
  drawAllCharts();
}

// Animate counter
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

// Initialize
renderTopProducts();
renderTopCountries();
renderHeatmap();

setTimeout(() => {
  animateCounter(document.getElementById('analytics-revenue'), 142680, '€');
  animateCounter(document.getElementById('analytics-orders'), 2841, '', '');
}, 300);

// Handle window resize
window.addEventListener('resize', () => {
  drawAllCharts();
});
</script>