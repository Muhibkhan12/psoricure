<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apotheke | Products</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap" rel="stylesheet">
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body {
      background: #FAF7F2;
      font-family: 'Inter', sans-serif;
      display: flex;
      min-height: 100vh;
    }

    /* SIDEBAR */
    .admin-sidebar {
      width: 240px;
      background: #F5EFE4;
      border-right: 1px solid #E2D5C3;
      position: fixed;
      top: 0;
      left: 0;
      bottom: 0;
      padding: 1.5rem 1rem;
      display: flex;
      flex-direction: column;
      gap: 2rem;
      z-index: 10;
    }

    .logo-area {
      font-size: 20px;
      font-weight: 800;
      letter-spacing: -0.3px;
      color: #1C1917;
      padding-left: 0.5rem;
      border-left: 3px solid #C4A882;
    }

    .nav-items {
      display: flex;
      flex-direction: column;
      gap: 0.5rem;
    }

    .nav-link {
      display: flex;
      align-items: center;
      gap: 12px;
      padding: 0.75rem 1rem;
      border-radius: 14px;
      font-weight: 500;
      font-size: 14px;
      color: #5a4c3c;
      transition: all 0.2s;
    }

    .nav-link.active {
      background: #E2D5C3;
      color: #1C1917;
      font-weight: 600;
    }

    /* MAIN CONTENT */
    .main-content {
      margin-left: 240px;
      flex: 1;
      background: #FAF7F2;
      min-height: 100vh;
    }

    .content-scroll {
      padding: 2rem;
      display: flex;
      flex-direction: column;
      gap: 1.5rem;
    }

    /* COLORS */
    :root {
      --cream: #F5EFE4;
      --sand: #E2D5C3;
      --sand-light: #EDE5D8;
      --tan: #C4A882;
      --bark: #8C6E50;
      --ink: #1C1917;
      --off-white: #FAF7F2;
      --warm-gray: #9A8F83;
      --success: #6B8F5E;
      --warning: #C4903A;
      --danger: #9E5A48;
    }

    /* HEADER */
    .page-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      flex-wrap: wrap;
      gap: 1rem;
    }

    .page-title-section h1 {
      font-size: 28px;
      font-weight: 700;
      color: var(--ink);
      letter-spacing: -0.02em;
    }

    .page-title-section p {
      font-size: 13px;
      color: var(--warm-gray);
      font-weight: 500;
      margin-top: 4px;
    }

    .add-product-btn {
      background: var(--ink);
      color: var(--cream);
      border: none;
      padding: 0.7rem 1.5rem;
      border-radius: 40px;
      font-size: 13px;
      font-weight: 600;
      display: inline-flex;
      align-items: center;
      gap: 0.5rem;
      font-family: inherit;
      cursor: default;
    }

    /* STATS CARDS - STATIC VALUES (NO JS) */
    .stats-grid {
      display: grid;
      grid-template-columns: repeat(4, 1fr);
      gap: 1rem;
    }

    .stat-card {
      background: var(--cream);
      border: 0.5px solid var(--sand);
      border-radius: 14px;
      padding: 1.25rem;
    }

    .stat-label {
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      color: var(--warm-gray);
      margin-bottom: 0.5rem;
    }

    .stat-value {
      font-size: 32px;
      font-weight: 800;
      color: var(--ink);
    }

    .stat-change {
      font-size: 11px;
      margin-top: 0.5rem;
    }
    .stat-change.positive { color: var(--success); }
    .stat-change.negative { color: var(--danger); }

    /* FILTERS BAR - PURE UI */
    .filters-bar {
      background: var(--cream);
      border: 0.5px solid var(--sand);
      border-radius: 16px;
      padding: 1.25rem;
      display: flex;
      flex-wrap: wrap;
      gap: 1rem;
      align-items: flex-end;
    }

    .filter-group {
      flex: 1;
      min-width: 150px;
    }

    .filter-group label {
      display: block;
      font-size: 11px;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.05em;
      color: var(--warm-gray);
      margin-bottom: 0.5rem;
    }

    .filter-group select,
    .filter-group input {
      width: 100%;
      padding: 0.6rem 1rem;
      background: var(--off-white);
      border: 1.5px solid var(--sand);
      border-radius: 12px;
      font-family: 'Inter', sans-serif;
      font-size: 13px;
      font-weight: 500;
    }

    .reset-filters {
      background: transparent;
      border: 1.5px solid var(--sand);
      border-radius: 12px;
      padding: 0.6rem 1.25rem;
      font-weight: 600;
      font-size: 13px;
      cursor: default;
    }

    /* PRODUCTS TABLE - STATIC CONTENT */
    .products-table-container {
      background: var(--cream);
      border: 0.5px solid var(--sand);
      border-radius: 16px;
      overflow-x: auto;
    }

    .products-table {
      width: 100%;
      border-collapse: collapse;
      min-width: 1000px;
    }

    .products-table th {
      text-align: left;
      padding: 1rem 1.25rem;
      font-size: 11px;
      font-weight: 700;
      text-transform: uppercase;
      letter-spacing: 0.06em;
      color: var(--warm-gray);
      border-bottom: 1px solid var(--sand);
      background: var(--sand-light);
    }

    .products-table td {
      padding: 1rem 1.25rem;
      font-size: 13px;
      font-weight: 500;
      border-bottom: 0.5px solid rgba(226, 213, 195, 0.4);
      vertical-align: middle;
      color: var(--ink);
    }

    .product-info {
      display: flex;
      align-items: center;
      gap: 12px;
    }

    .product-image {
      width: 50px;
      height: 50px;
      background: var(--sand-light);
      border-radius: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .product-name {
      font-weight: 700;
    }

    .product-sku {
      font-size: 10px;
      color: var(--warm-gray);
    }

    /* BADGES */
    .stock-badge, .status-badge {
      display: inline-flex;
      padding: 0.35rem 0.85rem;
      border-radius: 40px;
      font-size: 11px;
      font-weight: 600;
    }
    .stock-in { background: rgba(107,143,94,0.15); color: var(--success); }
    .stock-low { background: rgba(196,144,58,0.15); color: var(--warning); }
    .stock-out { background: rgba(158,90,72,0.15); color: var(--danger); }
    .status-active { background: rgba(107,143,94,0.15); color: var(--success); }
    .status-draft { background: rgba(196,144,58,0.15); color: var(--warning); }
    .category-badge {
      background: var(--sand-light);
      padding: 0.25rem 0.75rem;
      border-radius: 20px;
      font-size: 11px;
      font-weight: 600;
      color: var(--bark);
    }

    /* ACTION BUTTONS - STATIC DECORATION */
    .action-buttons {
      display: flex;
      gap: 0.5rem;
      justify-content: center;
    }
    .action-btn {
      width: 34px;
      height: 34px;
      display: flex;
      align-items: center;
      justify-content: center;
      border-radius: 8px;
      background: var(--off-white);
      border: 1px solid var(--sand);
      cursor: default;
    }
    .action-btn svg {
      width: 15px;
      height: 15px;
      stroke: #5f5346;
    }

    /* PAGINATION STATIC */
    .pagination {
      display: flex;
      justify-content: flex-end;
      gap: 0.5rem;
    }
    .page-btn {
      padding: 0.5rem 1rem;
      border-radius: 10px;
      background: transparent;
      border: 1px solid var(--sand);
      font-weight: 600;
      cursor: default;
    }
    .page-btn.active {
      background: var(--ink);
      border-color: var(--ink);
      color: white;
    }

    @media (max-width: 1024px) {
      .admin-sidebar { display: none; }
      .main-content { margin-left: 0; }
    }
    @media (max-width: 700px) {
      .stats-grid { grid-template-columns: 1fr 1fr; }
      .content-scroll { padding: 1rem; }
    }
  </style>
</head>
<body>


  <!-- MAIN CONTENT - COMPLETELY STATIC, ZERO JAVASCRIPT -->
  <section class="main-content">
    <div class="content-scroll">

      <!-- Page Header -->
      <div class="page-header">
        <div class="page-title-section">
          <h1>Products</h1>
          <p>Manage your product catalog and inventory</p>
        </div>
        <button class="add-product-btn">
          <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5">
            <line x1="12" y1="5" x2="12" y2="19"/>
            <line x1="5" y1="12" x2="19" y2="12"/>
          </svg>
          Add Product
        </button>
      </div>

      <!-- STATS CARDS - HARDCODED NUMBERS (NO JS) -->
      <div class="stats-grid">
        <div class="stat-card">
          <div class="stat-label">Total Products</div>
          <div class="stat-value">8</div>
          <div class="stat-change positive">↑ 8 new this month</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Active Products</div>
          <div class="stat-value">7</div>
          <div class="stat-change positive">Available for sale</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Low Stock</div>
          <div class="stat-value">3</div>
          <div class="stat-change negative">Need restock</div>
        </div>
        <div class="stat-card">
          <div class="stat-label">Out of Stock</div>
          <div class="stat-value">1</div>
          <div class="stat-change negative">Unavailable</div>
        </div>
      </div>

      <!-- FILTERS BAR - PURE UI (non-functional) -->
      <div class="filters-bar">
        <div class="filter-group">
          <label>Category</label>
          <select>
            <option value="all">All Categories</option>
            <option value="Skincare">Skincare</option>
            <option value="Face Care">Face Care</option>
            <option value="Night Care">Night Care</option>
            <option value="Sets">Sets</option>
          </select>
        </div>
        <div class="filter-group">
          <label>Status</label>
          <select>
            <option value="all">All Status</option>
            <option value="active">Active</option>
            <option value="draft">Draft</option>
          </select>
        </div>
        <div class="filter-group">
          <label>Stock</label>
          <select>
            <option value="all">All Stock</option>
            <option value="in_stock">In Stock</option>
            <option value="low_stock">Low Stock</option>
            <option value="out_of_stock">Out of Stock</option>
          </select>
        </div>
        <div class="filter-group search-group">
          <label>Search</label>
          <input type="text" placeholder="Name, SKU, category...">
        </div>
        <button class="reset-filters">Reset Filters</button>
      </div>

      <!-- PRODUCTS TABLE - STATIC CONTENT (SINGLE ROW EXAMPLE - YOU WILL REPLACE WITH YOUR OWN) -->
      <div class="products-table-container">
        <table class="products-table">
          <thead>
            <tr>
              <th>Product</th>
              <th>SKU</th>
              <th>Category</th>
              <th>Price</th>
              <th>Stock</th>
              <th>Sales</th>
              <th>Status</th>
              <th style="text-align:center;">Actions</th>
            </tr>
          </thead>
          <tbody>
            <!-- 
            -->
            @foreach($products as $product)
            <tr>
              <td>
                <div class="product-info">
                  <div class="product-image">
                    <svg width="30" height="30" viewBox="0 0 80 160">
                      <rect x="14" y="28" width="52" height="118" rx="6" fill="#C4A882" opacity="0.7"/>
                      <rect x="30" y="10" width="20" height="20" rx="3" fill="#8C6E50" opacity="0.5"/>
                    </svg>
                  </div>
                  <div>
                    <div class="product-name"> {{$product->name}} </div>
                    <div class="product-sku">PS-SER-001</div>
                  </div>
                </div>
              </td>
              <td style="font-family: monospace;">PS-SER-001</td>
              <td><span class="category-badge">Skincare</span></td>
              <td style="font-weight: 700;">€58.00</td>
              <td><span class="stock-badge stock-in">45 in stock</span></td>
              <td>314</td>
              <td><span class="status-badge status-active">active</span></td>
              <td style="text-align: center;">
                <div class="action-buttons">
                  <div class="action-btn" title="View">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                      <circle cx="12" cy="12" r="3"/>
                    </svg>
                  </div>
                  <div class="action-btn" title="Edit">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"/>
                      <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"/>
                    </svg>
                  </div>
                  <div class="action-btn" title="Duplicate">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <rect x="9" y="9" width="13" height="13" rx="2" ry="2"/>
                      <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
                    </svg>
                  </div>
                  <div class="action-btn" title="Delete" style="border-color: #9E5A48;">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                      <polyline points="3 6 5 6 21 6"/>
                      <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                      <line x1="10" y1="11" x2="10" y2="17"/>
                      <line x1="14" y1="11" x2="14" y2="17"/>
                    </svg>
                  </div>
                </div>
              </td>
            </tr>
            @endforeach
            <!-- END OF EXAMPLE ROW. REPLACE ENTIRE TBODY WITH YOUR OWN DATA ROWS -->
          </tbody>
        </table>
      </div>

      <!-- PAGINATION - STATIC -->
      <div class="pagination">
        <button class="page-btn">Prev</button>
        <button class="page-btn active">1</button>
        <button class="page-btn">2</button>
        <button class="page-btn">Next</button>
      </div>

    </div>
  </section>

</body>
</html>