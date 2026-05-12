@include('admin.sidebar')

<style>
  /* Import the same sans-serif font as dashboard */
  @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap');

  /* Main Content Override */
  .main-content {
    margin-left: 240px;
    margin-top: 60px;
    flex: 1;
    display: flex;
    flex-direction: column;
    background: #FAF7F2;
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

  /* Root variables */
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

  /* Page Header */
  .page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 1rem;
  }
  
  .page-title-section h1 {
    font-family: 'Inter', sans-serif;
    font-size: 28px;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 0.25rem;
    letter-spacing: -0.02em;
  }
  
  .page-title-section p {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: var(--warm-gray);
    font-weight: 500;
  }
  
  .add-product-btn {
    background: var(--ink);
    color: var(--cream);
    border: none;
    padding: 0.75rem 1.5rem;
    border-radius: 40px;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }
  
  .add-product-btn:hover {
    background: var(--bark);
    transform: translateY(-2px);
  }
  
  /* Filters Bar */
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
    font-family: 'Inter', sans-serif;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--warm-gray);
    margin-bottom: 0.5rem;
  }
  
  .filter-group select, .filter-group input {
    width: 100%;
    padding: 0.625rem 1rem;
    background: var(--off-white);
    border: 1.5px solid var(--sand);
    border-radius: 12px;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: var(--ink);
    transition: all 0.2s;
  }
  
  .filter-group select:focus, .filter-group input:focus {
    outline: none;
    border-color: var(--bark);
    box-shadow: 0 0 0 3px rgba(140,110,80,0.1);
  }
  
  .search-group {
    flex: 2;
    min-width: 250px;
  }
  
  .reset-filters {
    background: transparent;
    border: 1.5px solid var(--sand);
    border-radius: 12px;
    padding: 0.625rem 1.25rem;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: var(--warm-gray);
    cursor: pointer;
    transition: all 0.2s;
  }
  
  .reset-filters:hover {
    background: rgba(226,213,195,0.3);
    border-color: var(--tan);
    color: var(--ink);
  }
  
  /* Stats Cards */
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
    transition: all 0.3s ease;
  }
  
  .stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.06);
  }
  
  .stat-label {
    font-family: 'Inter', sans-serif;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--warm-gray);
    margin-bottom: 0.5rem;
  }
  
  .stat-value {
    font-family: 'Inter', sans-serif;
    font-size: 32px;
    font-weight: 800;
    color: var(--ink);
    letter-spacing: -0.02em;
  }
  
  .stat-change {
    font-family: 'Inter', sans-serif;
    font-size: 11px;
    font-weight: 500;
    margin-top: 0.5rem;
  }
  
  .stat-change.positive {
    color: var(--success);
  }
  
  .stat-change.negative {
    color: var(--danger);
  }
  
  /* Products Table */
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
    font-family: 'Inter', sans-serif;
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
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: var(--ink);
    border-bottom: 0.5px solid rgba(226,213,195,0.3);
    vertical-align: middle;
  }
  
  .products-table tr:hover {
    background: rgba(196,168,130,0.05);
  }
  
  .products-table tr:last-child td {
    border-bottom: none;
  }
  
  /* Product Image */
  .product-image {
    width: 50px;
    height: 50px;
    border-radius: 10px;
    background: var(--sand-light);
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
  }
  
  .product-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  .product-info {
    display: flex;
    align-items: center;
    gap: 12px;
  }
  
  .product-details {
    display: flex;
    flex-direction: column;
  }
  
  .product-name {
    font-weight: 700;
    color: var(--ink);
  }
  
  .product-sku {
    font-size: 10px;
    color: var(--warm-gray);
    font-weight: 500;
    margin-top: 2px;
  }
  
  /* Stock Badges */
  .stock-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.375rem 0.875rem;
    border-radius: 40px;
    font-size: 11px;
    font-weight: 600;
  }
  
  .stock-in {
    background: rgba(107,143,94,0.15);
    color: var(--success);
  }
  
  .stock-low {
    background: rgba(196,144,58,0.15);
    color: var(--warning);
  }
  
  .stock-out {
    background: rgba(158,90,72,0.15);
    color: var(--danger);
  }
  
  .stock-preorder {
    background: rgba(140,110,80,0.15);
    color: var(--bark);
  }
  
  /* Status Badges */
  .status-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.375rem 0.875rem;
    border-radius: 40px;
    font-size: 11px;
    font-weight: 600;
  }
  
  .status-active {
    background: rgba(107,143,94,0.15);
    color: var(--success);
  }
  
  .status-draft {
    background: rgba(196,144,58,0.15);
    color: var(--warning);
  }
  
  .status-archived {
    background: rgba(158,90,72,0.15);
    color: var(--danger);
  }
  
  /* Category Badges */
  .category-badge {
    background: var(--sand-light);
    padding: 0.25rem 0.75rem;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 600;
    color: var(--bark);
    display: inline-block;
  }
  
  /* Action Buttons */
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
    cursor: pointer;
    transition: all 0.2s;
  }
  
  .action-btn:hover {
    background: var(--ink);
    border-color: var(--ink);
  }
  
  .action-btn:hover svg {
    stroke: var(--cream);
  }
  
  .action-btn svg {
    width: 16px;
    height: 16px;
    stroke: var(--warm-gray);
    transition: all 0.2s;
  }
  
  /* Pagination */
  .pagination {
    display: flex;
    justify-content: flex-end;
    gap: 0.5rem;
    margin-top: 1rem;
  }
  
  .page-btn {
    padding: 0.5rem 1rem;
    border-radius: 10px;
    background: transparent;
    border: 1px solid var(--sand);
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: var(--warm-gray);
    cursor: pointer;
    transition: all 0.2s;
  }
  
  .page-btn:hover {
    background: rgba(196,168,130,0.1);
    border-color: var(--tan);
    color: var(--ink);
  }
  
  .page-btn.active {
    background: var(--ink);
    border-color: var(--ink);
    color: var(--cream);
  }
  
  /* Modal */
  .modal-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(28,25,23,0.8);
    backdrop-filter: blur(4px);
    display: flex;
    align-items: center;
    justify-content: center;
    z-index: 1000;
    opacity: 0;
    visibility: hidden;
    transition: all 0.3s;
  }
  
  .modal-overlay.active {
    opacity: 1;
    visibility: visible;
  }
  
  .modal {
    background: var(--cream);
    border-radius: 20px;
    max-width: 500px;
    width: 90%;
    max-height: 85vh;
    overflow-y: auto;
    padding: 2rem;
    position: relative;
    transform: scale(0.9);
    transition: transform 0.3s;
  }
  
  .modal-overlay.active .modal {
    transform: scale(1);
  }
  
  .modal-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1.5rem;
    padding-bottom: 1rem;
    border-bottom: 1px solid var(--sand);
  }
  
  .modal-header h2 {
    font-family: 'Inter', sans-serif;
    font-size: 22px;
    font-weight: 700;
    color: var(--ink);
    letter-spacing: -0.02em;
  }
  
  .close-modal {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: all 0.2s;
  }
  
  .close-modal:hover {
    background: rgba(226,213,195,0.5);
  }
  
  .modal-body {
    font-family: 'Inter', sans-serif;
  }
  
  .product-detail-row {
    display: flex;
    margin-bottom: 1rem;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid rgba(226,213,195,0.3);
  }
  
  .product-detail-label {
    width: 120px;
    font-weight: 600;
    color: var(--warm-gray);
    font-size: 12px;
  }
  
  .product-detail-value {
    flex: 1;
    font-weight: 500;
    color: var(--ink);
    font-size: 13px;
  }
  
  .fade-in {
    animation: fadeIn 0.5s ease both;
  }
  
  @keyframes fadeIn {
    from {
      opacity: 0;
      transform: translateY(12px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
  
  @media (max-width: 1024px) {
    .main-content {
      margin-left: 0;
    }
    .stats-grid {
      grid-template-columns: repeat(2, 1fr);
    }
  }
  
  @media (max-width: 768px) {
    .content-scroll {
      padding: 1rem;
    }
    .stats-grid {
      grid-template-columns: 1fr;
    }
    .filters-bar {
      flex-direction: column;
    }
    .filter-group, .search-group {
      width: 100%;
    }
    .page-title-section h1 {
      font-size: 24px;
    }
  }
  
  @media (max-width: 480px) {
    .content-scroll {
      padding: 0.75rem;
    }
    .stat-value {
      font-size: 24px;
    }
  }
</style>

<section class="main-content">
  <div class="content-scroll">
    <!-- Page Header -->
    <div class="page-header fade-in">
      <div class="page-title-section">
        <h1>Products</h1>
        <p>Manage your product catalog and inventory</p>
      </div>
      <button class="add-product-btn" onclick="window.location.href='create-product.php'">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="12" y1="5" x2="12" y2="19"/>
          <line x1="5" y1="12" x2="19" y2="12"/>
        </svg>
        Add Product
      </button>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid fade-in">
      <div class="stat-card">
        <div class="stat-label">Total Products</div>
        <div class="stat-value" id="totalProducts">0</div>
        <div class="stat-change positive">↑ 8 new this month</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Active Products</div>
        <div class="stat-value" id="activeProducts">0</div>
        <div class="stat-change positive">Available for sale</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Low Stock</div>
        <div class="stat-value" id="lowStockProducts">0</div>
        <div class="stat-change negative">Need restock</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Out of Stock</div>
        <div class="stat-value" id="outOfStockProducts">0</div>
        <div class="stat-change negative">Unavailable</div>
      </div>
    </div>

    <!-- Filters Bar -->
    <div class="filters-bar fade-in">
      <div class="filter-group">
        <label>Category</label>
        <select id="categoryFilter" onchange="filterProducts()">
          <option value="all">All Categories</option>
          <option value="Skincare">Skincare</option>
          <option value="Face Care">Face Care</option>
          <option value="Night Care">Night Care</option>
          <option value="Body">Body</option>
          <option value="Sets">Sets</option>
          <option value="Tools">Tools</option>
        </select>
      </div>
      <div class="filter-group">
        <label>Status</label>
        <select id="statusFilter" onchange="filterProducts()">
          <option value="all">All Status</option>
          <option value="active">Active</option>
          <option value="draft">Draft</option>
          <option value="archived">Archived</option>
        </select>
      </div>
      <div class="filter-group">
        <label>Stock</label>
        <select id="stockFilter" onchange="filterProducts()">
          <option value="all">All Stock</option>
          <option value="in_stock">In Stock</option>
          <option value="low_stock">Low Stock</option>
          <option value="out_of_stock">Out of Stock</option>
        </select>
      </div>
      <div class="filter-group search-group">
        <label>Search</label>
        <input type="text" id="searchInput" placeholder="Search by name, SKU, or category..." onkeyup="filterProducts()">
      </div>
      <button class="reset-filters" onclick="resetFilters()">Reset Filters</button>
    </div>

    <!-- Products Table -->
    <div class="products-table-container fade-in">
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
            <th style="text-align: center;">Actions</th>
          </tr>
        </thead>
        <tbody id="productsTableBody">
          <!-- Dynamic content -->
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="pagination" id="pagination"></div>
  </div>
</section>

<!-- Product Details Modal -->
<div class="modal-overlay" id="productModal">
  <div class="modal">
    <div class="modal-header">
      <h2>Product Details</h2>
      <div class="close-modal" onclick="closeProductModal()">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="18" y1="6" x2="6" y2="18"/>
          <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
      </div>
    </div>
    <div class="modal-body" id="productModalBody">
      <!-- Dynamic content -->
    </div>
  </div>
</div>

<script>
  // Products Data
  const productsData = [
    { id: 1, name: 'Calm Restore Serum', sku: 'PS-SER-001', category: 'Skincare', price: 58.00, stock: 45, stockStatus: 'in_stock', sales: 314, status: 'active', image: null, description: 'A calming serum that restores skin barrier.', created: '2024-01-15' },
    { id: 2, name: 'Radiance Day Oil', sku: 'PS-OIL-002', category: 'Face Care', price: 65.00, stock: 28, stockStatus: 'in_stock', sales: 225, status: 'active', image: null, description: 'Lightweight day oil for radiant skin.', created: '2024-01-20' },
    { id: 3, name: 'Night Renewal Balm', sku: 'PS-BLM-003', category: 'Night Care', price: 74.00, stock: 12, stockStatus: 'low_stock', sales: 160, status: 'active', image: null, description: 'Overnight renewal balm.', created: '2024-02-01' },
    { id: 4, name: 'Barrier Shield Mist', sku: 'PS-MST-004', category: 'Face Care', price: 42.00, stock: 8, stockStatus: 'low_stock', sales: 215, status: 'active', image: null, description: 'Protective facial mist.', created: '2024-02-10' },
    { id: 5, name: 'The Calm Ritual Set', sku: 'PS-SET-005', category: 'Sets', price: 148.00, stock: 3, stockStatus: 'low_stock', sales: 59, status: 'active', image: null, description: 'Complete calming skincare set.', created: '2024-01-25' },
    { id: 6, name: 'Travel Essentials Duo', sku: 'PS-TVL-006', category: 'Sets', price: 34.00, stock: 0, stockStatus: 'out_of_stock', sales: 89, status: 'draft', image: null, description: 'Perfect travel-sized duo.', created: '2024-03-05' },
    { id: 7, name: 'Glow Exfoliating Powder', sku: 'PS-PWD-007', category: 'Face Care', price: 52.00, stock: 67, stockStatus: 'in_stock', sales: 78, status: 'active', image: null, description: 'Gentle exfoliating powder.', created: '2024-02-15' },
    { id: 8, name: 'Soothing Eye Cream', sku: 'PS-EYE-008', category: 'Skincare', price: 45.00, stock: 34, stockStatus: 'in_stock', sales: 92, status: 'active', image: null, description: 'Puffiness reducing eye cream.', created: '2024-02-20' }
  ];

  let currentPage = 1;
  const rowsPerPage = 8;
  let filteredProducts = [...productsData];

  function formatCurrency(amount) {
    return '€' + amount.toFixed(2);
  }

  function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
  }

  function getStockClass(stockStatus) {
    const stockMap = {
      'in_stock': 'stock-in',
      'low_stock': 'stock-low',
      'out_of_stock': 'stock-out'
    };
    return stockMap[stockStatus] || 'stock-in';
  }

  function getStockText(stockStatus, stock) {
    const textMap = {
      'in_stock': `${stock} in stock`,
      'low_stock': `Only ${stock} left`,
      'out_of_stock': 'Out of stock'
    };
    return textMap[stockStatus] || `${stock} in stock`;
  }

  function getStatusClass(status) {
    const statusMap = {
      'active': 'status-active',
      'draft': 'status-draft',
      'archived': 'status-archived'
    };
    return statusMap[status] || 'status-active';
  }

  function filterProducts() {
    const categoryFilter = document.getElementById('categoryFilter').value;
    const statusFilter = document.getElementById('statusFilter').value;
    const stockFilter = document.getElementById('stockFilter').value;
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    
    filteredProducts = productsData.filter(product => {
      if (categoryFilter !== 'all' && product.category !== categoryFilter) return false;
      if (statusFilter !== 'all' && product.status !== statusFilter) return false;
      if (stockFilter !== 'all' && product.stockStatus !== stockFilter) return false;
      if (searchTerm) {
        return product.name.toLowerCase().includes(searchTerm) ||
               product.sku.toLowerCase().includes(searchTerm) ||
               product.category.toLowerCase().includes(searchTerm);
      }
      return true;
    });
    
    currentPage = 1;
    renderProductsTable();
    updateStats();
  }

  function resetFilters() {
    document.getElementById('categoryFilter').value = 'all';
    document.getElementById('statusFilter').value = 'all';
    document.getElementById('stockFilter').value = 'all';
    document.getElementById('searchInput').value = '';
    filteredProducts = [...productsData];
    currentPage = 1;
    renderProductsTable();
    updateStats();
  }

  function updateStats() {
    const total = filteredProducts.length;
    const active = filteredProducts.filter(p => p.status === 'active').length;
    const lowStock = filteredProducts.filter(p => p.stockStatus === 'low_stock').length;
    const outOfStock = filteredProducts.filter(p => p.stockStatus === 'out_of_stock').length;
    
    document.getElementById('totalProducts').textContent = total;
    document.getElementById('activeProducts').textContent = active;
    document.getElementById('lowStockProducts').textContent = lowStock;
    document.getElementById('outOfStockProducts').textContent = outOfStock;
  }

  function renderProductsTable() {
    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    const paginatedProducts = filteredProducts.slice(start, end);
    
    const tbody = document.getElementById('productsTableBody');
    tbody.innerHTML = paginatedProducts.map(product => `
      <tr>
        <td>
          <div class="product-info">
            <div class="product-image">
              <svg width="30" height="30" viewBox="0 0 80 160" style="transform: scale(0.5);">
                <rect x="14" y="28" width="52" height="118" rx="6" fill="var(--tan)" opacity="0.7"/>
                <rect x="30" y="10" width="20" height="20" rx="3" fill="var(--bark)" opacity="0.5"/>
              </svg>
            </div>
            <div class="product-details">
              <div class="product-name">${product.name}</div>
            </div>
          </div>
        </td>
        <td style="font-family: monospace; font-size: 11px;">${product.sku}</td>
        <td><span class="category-badge">${product.category}</span></td>
        <td style="font-weight: 700;">${formatCurrency(product.price)}</td>
        <td><span class="stock-badge ${getStockClass(product.stockStatus)}">${getStockText(product.stockStatus, product.stock)}</span></td>
        <td style="font-weight: 600;">${product.sales}</td>
        <td><span class="status-badge ${getStatusClass(product.status)}">${product.status}</span></td>
        <td style="text-align: center;">
          <div class="action-buttons">
            <button class="action-btn" onclick="viewProductDetails(${product.id})" title="View Details">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                <circle cx="12" cy="12" r="3"/>
              </svg>
            </button>
            <button class="action-btn" onclick="editProduct(${product.id})" title="Edit Product">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"/>
                <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"/>
              </svg>
            </button>
            <button class="action-btn" onclick="duplicateProduct(${product.id})" title="Duplicate Product">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <rect x="9" y="9" width="13" height="13" rx="2" ry="2"/>
                <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/>
              </svg>
            </button>
            <button class="action-btn" onclick="deleteProduct(${product.id})" title="Delete Product" style="border-color: var(--danger);">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <polyline points="3 6 5 6 21 6"/>
                <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/>
                <line x1="10" y1="11" x2="10" y2="17"/>
                <line x1="14" y1="11" x2="14" y2="17"/>
              </svg>
            </button>
          </div>
        </td>
      </tr>
    `).join('');
    
    renderPagination();
  }

  function renderPagination() {
    const totalPages = Math.ceil(filteredProducts.length / rowsPerPage);
    const paginationDiv = document.getElementById('pagination');
    
    if (totalPages <= 1) {
      paginationDiv.innerHTML = '';
      return;
    }
    
    let buttons = '';
    for (let i = 1; i <= totalPages; i++) {
      buttons += `<button class="page-btn ${i === currentPage ? 'active' : ''}" onclick="goToPage(${i})">${i}</button>`;
    }
    
    paginationDiv.innerHTML = buttons;
  }

  function goToPage(page) {
    currentPage = page;
    renderProductsTable();
  }

  function viewProductDetails(productId) {
    const product = productsData.find(p => p.id === productId);
    if (!product) return;
    
    const modalBody = document.getElementById('productModalBody');
    modalBody.innerHTML = `
      <div class="product-detail-row">
        <div class="product-detail-label">Product Name</div>
        <div class="product-detail-value">${product.name}</div>
      </div>
      <div class="product-detail-row">
        <div class="product-detail-label">SKU</div>
        <div class="product-detail-value">${product.sku}</div>
      </div>
      <div class="product-detail-row">
        <div class="product-detail-label">Category</div>
        <div class="product-detail-value">${product.category}</div>
      </div>
      <div class="product-detail-row">
        <div class="product-detail-label">Price</div>
        <div class="product-detail-value">${formatCurrency(product.price)}</div>
      </div>
      <div class="product-detail-row">
        <div class="product-detail-label">Stock</div>
        <div class="product-detail-value">${product.stock} units</div>
      </div>
      <div class="product-detail-row">
        <div class="product-detail-label">Total Sales</div>
        <div class="product-detail-value">${product.sales} units</div>
      </div>
      <div class="product-detail-row">
        <div class="product-detail-label">Status</div>
        <div class="product-detail-value"><span class="status-badge ${getStatusClass(product.status)}">${product.status}</span></div>
      </div>
      <div class="product-detail-row">
        <div class="product-detail-label">Created</div>
        <div class="product-detail-value">${formatDate(product.created)}</div>
      </div>
      <div class="product-detail-row">
        <div class="product-detail-label">Description</div>
        <div class="product-detail-value">${product.description}</div>
      </div>
    `;
    
    document.getElementById('productModal').classList.add('active');
  }

  function closeProductModal() {
    document.getElementById('productModal').classList.remove('active');
  }

  function editProduct(productId) {
    window.location.href = `edit-product.php?id=${productId}`;
  }

  function duplicateProduct(productId) {
    const product = productsData.find(p => p.id === productId);
    if (product) {
      const newProduct = {
        ...product,
        id: productsData.length + 1,
        name: `${product.name} (Copy)`,
        sku: `${product.sku}-COPY`,
        stock: 0,
        sales: 0,
        created: new Date().toISOString().split('T')[0]
      };
      productsData.push(newProduct);
      filteredProducts = [...productsData];
      filterProducts();
      alert(`Product "${product.name}" duplicated successfully!`);
    }
  }

  function deleteProduct(productId) {
    const product = productsData.find(p => p.id === productId);
    if (confirm(`Are you sure you want to delete product "${product?.name}"?`)) {
      const index = productsData.findIndex(p => p.id === productId);
      if (index !== -1) {
        productsData.splice(index, 1);
        filteredProducts = [...productsData];
        filterProducts();
        alert(`Product "${product?.name}" has been deleted.`);
      }
    }
  }

  function init() {
    filteredProducts = [...productsData];
    renderProductsTable();
    updateStats();
  }
  
  init();
</script>