<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Psoricure - Analytics</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Inter', -apple-system, BlinkMacSystemFont, 'Segoe UI', sans-serif;
      background: #FAF7F2;
      overflow-x: hidden;
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

    /* ── Main Content ── */
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
    }
    .content-scroll::-webkit-scrollbar { width: 4px; }
    .content-scroll::-webkit-scrollbar-track { background: transparent; }
    .content-scroll::-webkit-scrollbar-thumb { background: var(--sand); border-radius: 2px; }

    /* ── Analytics Header ── */
    .analytics-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 1rem;
    }
    .page-heading {
      font-family: 'Inter', sans-serif;
      font-size: 28px;
      font-weight: 700;
      color: var(--ink);
      letter-spacing: -0.02em;
    }
    .page-subheading {
      font-size: 13px;
      color: var(--warm-gray);
      font-weight: 500;
      margin-top: 4px;
    }
    .date-range-selector {
      display: flex;
      gap: 0.25rem;
      background: var(--sand-light);
      padding: 0.25rem;
      border-radius: 10px;
    }
    .date-btn {
      padding: 0.5rem 1rem;
      font-size: 12px;
      font-weight: 600;
      border: none;
      background: transparent;
      border-radius: 8px;
      cursor: pointer;
      transition: all 0.2s;
      color: var(--warm-gray);
      font-family: 'Inter', sans-serif;
    }
    .date-btn.active { background: var(--off-white); color: var(--ink); box-shadow: 0 1px 3px rgba(0,0,0,0.1); }
    .date-btn:hover:not(.active) { background: rgba(196,168,130,0.2); color: var(--bark); }

    /* ── Analytics KPI Grid ── */
    .analytics-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1rem;
    }
    .metric-card {
      background: var(--cream);
      border: 0.5px solid var(--sand);
      border-radius: 14px;
      padding: 1.25rem;
      transition: all 0.2s;
    }
    .metric-card:hover { transform: translateY(-2px); box-shadow: 0 8px 24px rgba(28,25,23,0.06); }
    .metric-label { font-size: 11px; text-transform: uppercase; letter-spacing: 0.08em; color: var(--warm-gray); font-weight: 600; margin-bottom: 0.5rem; }
    .metric-value { font-size: 32px; font-weight: 800; color: var(--ink); margin-bottom: 0.5rem; letter-spacing: -0.02em; }
    .metric-trend { display: flex; align-items: center; gap: 0.5rem; font-size: 11px; font-weight: 500; }
    .trend-up   { color: var(--success); background: var(--success-bg); padding: 3px 8px; border-radius: 20px; font-weight: 600; }
    .trend-down { color: var(--danger);  background: var(--danger-bg);  padding: 3px 8px; border-radius: 20px; font-weight: 600; }

    /* ── Mini KPI Row ── */
    .kpi-row {
      display: grid;
      grid-template-columns: repeat(3, 1fr);
      gap: 1rem;
    }
    .kpi-mini-card {
      background: var(--cream);
      border: 0.5px solid var(--sand);
      border-radius: 12px;
      padding: 1rem;
      text-align: center;
    }
    .kpi-mini-value { font-size: 24px; font-weight: 800; color: var(--ink); letter-spacing: -0.02em; }
    .kpi-mini-label { font-size: 10px; color: var(--warm-gray); text-transform: uppercase; letter-spacing: 0.08em; margin-top: 6px; font-weight: 600; }

    /* ── Two-Column Layout ── */
    .two-col { display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; }

    /* ── Chart Cards ── */
    .chart-card-lg {
      background: var(--cream);
      border: 0.5px solid var(--sand);
      border-radius: 14px;
      padding: 1.25rem;
    }
    .chart-title    { font-size: 16px; font-weight: 700; color: var(--ink); margin-bottom: 0.25rem; }
    .chart-subtitle { font-size: 11px; color: var(--warm-gray); margin-bottom: 1rem; font-weight: 500; }
    .chart-container { width: 100%; height: 280px; }

    /* ── Product Table ── */
    .product-table { width: 100%; border-collapse: collapse; }
    .product-table th {
      text-align: left; padding: 0.75rem 0;
      font-size: 10px; font-weight: 700; text-transform: uppercase;
      letter-spacing: 0.08em; color: var(--warm-gray);
      border-bottom: 1px solid var(--sand);
    }
    .product-table td {
      padding: 0.75rem 0; font-size: 12px; font-weight: 500;
      border-bottom: 0.5px solid rgba(226,213,195,0.5);
    }
    .product-table tr:last-child td { border-bottom: none; }
    .product-rank { width: 30px; font-weight: 700; color: var(--bark); }
    .product-name-cell { font-weight: 600; }

    /* ── Countries ── */
    .country-list { display: flex; flex-direction: column; gap: 0.75rem; }
    .country-item { display: flex; align-items: center; gap: 0.75rem; }
    .country-flag  { font-size: 20px; width: 32px; }
    .country-name  { flex: 1; font-size: 12px; font-weight: 600; color: var(--ink); }
    .country-revenue { font-size: 13px; font-weight: 700; color: var(--ink); }
    .country-growth  { font-size: 10px; padding: 3px 8px; border-radius: 20px; font-weight: 600; white-space: nowrap; }

    /* ── Heatmap ── */
    .heatmap-grid { display: grid; grid-template-columns: repeat(7, 1fr); gap: 6px; margin-top: 1rem; }
    .heatmap-day { text-align: center; }
    .heatmap-day-label { font-size: 9px; color: var(--warm-gray); margin-bottom: 8px; text-transform: uppercase; font-weight: 600; letter-spacing: 0.05em; }
    .heatmap-hours { display: flex; flex-direction: column; gap: 4px; }
    .heatmap-cell { height: 28px; border-radius: 6px; transition: all 0.2s; cursor: pointer; }
    .heatmap-cell:hover { transform: scale(1.05); opacity: 0.8; }

    /* ── Animation ── */
    .fade-in { animation: fadeIn 0.5s ease both; }
    @keyframes fadeIn { from { opacity: 0; transform: translateY(12px); } to { opacity: 1; transform: translateY(0); } }

    /* ── Responsive ── */
    @media (max-width: 1024px) {
      .main-content { margin-left: 0; }
      .analytics-grid { grid-template-columns: repeat(2, 1fr); }
      .two-col { grid-template-columns: 1fr; }
    }
    @media (max-width: 768px) {
      .content-scroll { padding: 1rem; }
      .analytics-header { flex-direction: column; align-items: stretch; }
      .date-range-selector { justify-content: center; }
      .analytics-grid { grid-template-columns: 1fr; }
      .kpi-row { grid-template-columns: 1fr; }
      .chart-container { height: 220px; }
      .page-heading { font-size: 22px; }
      .metric-value { font-size: 26px; }
    }
    @media (max-width: 480px) {
      .main-content { margin-left: 0; margin-top: 60px; }
      .content-scroll { padding: 0.75rem; gap: 0.75rem; }
      .metric-value { font-size: 22px; }
      .chart-card-lg { padding: 0.75rem; }
      .page-heading { font-size: 20px; }
      .kpi-mini-value { font-size: 20px; }
    }
  </style>
</head>
<body>

@include('admin.sidebar')

<section class="main-content">
  <div class="content-scroll">

    <!-- Header -->
    <div class="analytics-header fade-in">
      <div>
        <div class="page-heading">Analytics</div>
        <div class="page-subheading">Real-time insights &amp; performance metrics</div>
      </div>
      <div class="date-range-selector">
        <button class="date-btn active" onclick="changeDateRange(this,'7d')">7 days</button>
        <button class="date-btn" onclick="changeDateRange(this,'30d')">30 days</button>
        <button class="date-btn" onclick="changeDateRange(this,'90d')">90 days</button>
        <button class="date-btn" onclick="changeDateRange(this,'1y')">1 year</button>
      </div>
    </div>

    <!-- KPI Grid -->
    <div class="analytics-grid fade-in">
      <div class="metric-card">
        <div class="metric-label">Total Revenue</div>
        <div class="metric-value" id="analytics-revenue">€0</div>
        <div class="metric-trend"><span class="trend-up">↑ 23.5%</span><span style="color:var(--warm-gray);">vs previous</span></div>
      </div>
      <div class="metric-card">
        <div class="metric-label">Total Orders</div>
        <div class="metric-value" id="analytics-orders">0</div>
        <div class="metric-trend"><span class="trend-up">↑ 15.2%</span><span style="color:var(--warm-gray);">vs previous</span></div>
      </div>
      <div class="metric-card">
        <div class="metric-label">Conversion Rate</div>
        <div class="metric-value">3.24%</div>
        <div class="metric-trend"><span class="trend-up">↑ 0.42%</span><span style="color:var(--warm-gray);">vs previous</span></div>
      </div>
      <div class="metric-card">
        <div class="metric-label">Customer LTV</div>
        <div class="metric-value">€342</div>
        <div class="metric-trend"><span class="trend-up">↑ 8.7%</span><span style="color:var(--warm-gray);">vs previous</span></div>
      </div>
    </div>

    <!-- Mini KPIs -->
    <div class="kpi-row fade-in">
      <div class="kpi-mini-card"><div class="kpi-mini-value">4.2</div><div class="kpi-mini-label">Avg. Items Per Order</div></div>
      <div class="kpi-mini-card"><div class="kpi-mini-value">€89</div><div class="kpi-mini-label">Avg. Order Value</div></div>
      <div class="kpi-mini-card"><div class="kpi-mini-value">32%</div><div class="kpi-mini-label">Repeat Purchase Rate</div></div>
    </div>

    <!-- Row 1 Charts -->
    <div class="two-col fade-in">
      <div class="chart-card-lg">
        <div class="chart-title">Revenue Trend</div>
        <div class="chart-subtitle">Daily revenue over selected period</div>
        <div id="revenue-trend-chart" class="chart-container"></div>
      </div>
      <div class="chart-card-lg">
        <div class="chart-title">Sales by Channel</div>
        <div class="chart-subtitle">Revenue distribution across channels</div>
        <div id="channel-chart" class="chart-container"></div>
      </div>
    </div>

    <!-- Row 2 -->
    <div class="two-col fade-in">
      <div class="chart-card-lg">
        <div class="chart-title">Top Performing Products</div>
        <div class="chart-subtitle">Best sellers by revenue</div>
        <table class="product-table">
          <thead><tr><th>#</th><th>Product</th><th>Revenue</th><th>Units</th><th>Growth</th></tr></thead>
          <tbody id="top-products-table"></tbody>
        </table>
      </div>
      <div class="chart-card-lg">
        <div class="chart-title">Top Markets</div>
        <div class="chart-subtitle">Revenue by country</div>
        <div class="country-list" id="top-countries"></div>
      </div>
    </div>

    <!-- Row 3 -->
    <div class="two-col fade-in">
      <div class="chart-card-lg">
        <div class="chart-title">Hourly Activity</div>
        <div class="chart-subtitle">Orders by hour &amp; day (heatmap)</div>
        <div id="heatmap-container"></div>
      </div>
      <div class="chart-card-lg">
        <div class="chart-title">Customer Segments</div>
        <div class="chart-subtitle">Distribution by customer type</div>
        <div id="segments-chart" class="chart-container"></div>
      </div>
    </div>

  </div>
</section>

<script>
  // ── Data ──────────────────────────────────────────
  const topProductsData = [
    { name: 'Calm Restore Serum',  revenue: 18240, units: 314, growth: 12.5, category: 'Skincare'  },
    { name: 'Radiance Day Oil',    revenue: 14625, units: 225, growth:  8.3, category: 'Face Care' },
    { name: 'Night Renewal Balm',  revenue: 11840, units: 160, growth: 15.2, category: 'Night Care'},
    { name: 'Barrier Shield Mist', revenue:  9030, units: 215, growth:  5.8, category: 'Face Care' },
    { name: 'The Calm Ritual Set', revenue:  8732, units:  59, growth: 22.1, category: 'Sets'      }
  ];

  const countriesData = [
    { flag: '🇩🇪', name: 'Germany',        revenue: 68420, growth:  18.4 },
    { flag: '🇫🇷', name: 'France',         revenue: 45230, growth:  12.7 },
    { flag: '🇬🇧', name: 'United Kingdom', revenue: 38900, growth:   9.2 },
    { flag: '🇮🇹', name: 'Italy',          revenue: 27540, growth:  -2.3 },
    { flag: '🇪🇸', name: 'Spain',          revenue: 21380, growth:  15.8 }
  ];

  // ── Google Charts ────────────────────────────────
  google.charts.load('current', { packages: ['corechart'] });
  google.charts.setOnLoadCallback(drawAllCharts);

  function drawAllCharts() {
    drawRevenueTrendChart();
    drawChannelChart();
    drawSegmentsChart();
  }

  function drawRevenueTrendChart() {
    const data = google.visualization.arrayToDataTable([
      ['Date','Revenue','Orders'],
      ['May 1',3200,42],['May 2',4100,48],['May 3',3850,45],['May 4',5200,58],
      ['May 5',4780,52],['May 6',6100,67],['May 7',5840,63],['May 8',4450,49],
      ['May 9',5120,55],['May 10',6780,72],['May 11',7230,78],['May 12',6950,74],
      ['May 13',5340,58],['May 14',7890,84]
    ]);
    const options = {
      curveType:'function',
      legend:{ position:'bottom', textStyle:{ fontName:'Inter', fontSize:10 } },
      chartArea:{ width:'85%', height:'70%' },
      colors:['#C4A882','#6B8F5E'],
      backgroundColor:'transparent',
      lineWidth:2, pointSize:4,
      vAxis:{ textStyle:{ fontName:'Inter', fontSize:9 }, gridlines:{ color:'#E2D5C3' } },
      hAxis:{ textStyle:{ fontName:'Inter', fontSize:9 }, slantedText:true }
    };
    new google.visualization.LineChart(document.getElementById('revenue-trend-chart')).draw(data, options);
  }

  function drawChannelChart() {
    const data = google.visualization.arrayToDataTable([
      ['Channel','Revenue',{ role:'style' }],
      ['Direct',42500,'#C4A882'],
      ['Organic',38700,'#D4BCA0'],
      ['Social',29400,'#8C6E50'],
      ['Email',18700,'#6B8F5E'],
      ['Referral',12400,'#C4903A']
    ]);
    const options = {
      legend:{ position:'bottom', textStyle:{ fontName:'Inter', fontSize:10 } },
      chartArea:{ width:'85%', height:'70%' },
      backgroundColor:'transparent',
      bar:{ groupWidth:'60%' },
      vAxis:{ textStyle:{ fontName:'Inter', fontSize:9 } },
      hAxis:{ textStyle:{ fontName:'Inter', fontSize:9 } }
    };
    new google.visualization.ColumnChart(document.getElementById('channel-chart')).draw(data, options);
  }

  function drawSegmentsChart() {
    const data = google.visualization.arrayToDataTable([
      ['Segment','Percentage'],
      ['New Customers',38],
      ['Returning',32],
      ['VIP / Loyal',18],
      ['At Risk',12]
    ]);
    const options = {
      legend:{ position:'bottom', textStyle:{ fontName:'Inter', fontSize:10 } },
      pieHole:0.4,
      chartArea:{ width:'90%', height:'80%' },
      backgroundColor:'transparent',
      colors:['#C4A882','#6B8F5E','#8C6E50','#D4BCA0']
    };
    new google.visualization.PieChart(document.getElementById('segments-chart')).draw(data, options);
  }

  // ── Render helpers ───────────────────────────────
  function renderTopProducts() {
    document.getElementById('top-products-table').innerHTML = topProductsData.map((p, i) => {
      const cls = p.growth >= 0 ? 'trend-up' : 'trend-down';
      const sym = p.growth >= 0 ? '↑' : '↓';
      return `<tr>
        <td class="product-rank">${i + 1}</td>
        <td class="product-name-cell">${p.name}<br><span style="font-size:10px;color:var(--warm-gray);font-weight:500;">${p.category}</span></td>
        <td style="font-weight:700;">€${p.revenue.toLocaleString()}</td>
        <td style="font-weight:600;">${p.units}</td>
        <td><span class="${cls}" style="padding:3px 8px;border-radius:20px;font-size:10px;font-weight:600;white-space:nowrap;">${sym} ${Math.abs(p.growth)}%</span></td>
      </tr>`;
    }).join('');
  }

  function renderTopCountries() {
    document.getElementById('top-countries').innerHTML = countriesData.map(c => {
      const cls = c.growth >= 0 ? 'trend-up' : 'trend-down';
      const sym = c.growth >= 0 ? '↑' : '↓';
      return `<div class="country-item">
        <div class="country-flag">${c.flag}</div>
        <div class="country-name">${c.name}</div>
        <div class="country-revenue">€${c.revenue.toLocaleString()}</div>
        <div class="country-growth ${cls}">${sym} ${Math.abs(c.growth)}%</div>
      </div>`;
    }).join('');
  }

  function renderHeatmap() {
    const days = ['Mon','Tue','Wed','Thu','Fri','Sat','Sun'];
    const data = [
      [45,62,78,85,72,58,42],[48,65,82,88,75,60,44],[52,68,85,92,78,62,46],
      [55,72,88,95,80,65,48],[58,78,92,98,85,70,52],[72,85,88,82,78,68,58],
      [38,52,65,72,68,55,42]
    ];
    const hours = [8,10,12,14,16,18,20,22];
    let html = '<div class="heatmap-grid">';
    days.forEach((day, i) => {
      html += `<div class="heatmap-day"><div class="heatmap-day-label">${day}</div><div class="heatmap-hours">`;
      data[i].forEach((val, j) => {
        const opacity = 0.2 + (val / 100) * 0.7;
        html += `<div class="heatmap-cell" style="background:rgba(140,110,80,${opacity});" title="${day} ${hours[j]}:00 – ${val} orders"></div>`;
      });
      html += `</div></div>`;
    });
    html += '</div>';
    document.getElementById('heatmap-container').innerHTML = html;
  }

  function changeDateRange(btn, range) {
    document.querySelectorAll('.date-btn').forEach(b => b.classList.remove('active'));
    btn.classList.add('active');
    drawAllCharts();
  }

  function animateCounter(el, target, prefix = '') {
    if (!el) return;
    let start = 0;
    const step = target / 90;
    const timer = setInterval(() => {
      start += step;
      if (start >= target) { start = target; clearInterval(timer); }
      el.textContent = prefix + Math.floor(start).toLocaleString();
    }, 16);
  }

  // ── Init ─────────────────────────────────────────
  renderTopProducts();
  renderTopCountries();
  renderHeatmap();
  setTimeout(() => {
    animateCounter(document.getElementById('analytics-revenue'), 142680, '€');
    animateCounter(document.getElementById('analytics-orders'),  2841);
  }, 300);

  window.addEventListener('resize', drawAllCharts);
</script>
</body>
</html>