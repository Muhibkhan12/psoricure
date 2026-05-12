<?php
// orders.php - Orders Management Page
include('sidebar.php');
?>

<style>
  /* Import fonts */
  @import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&family=Instrument+Serif:ital@0;1&display=swap');

  /* Main Content Override */
  .main-content {
    margin-left: 240px;
    margin-top: 60px;
    flex: 1;
    display: flex;
    flex-direction: column;
    background: linear-gradient(135deg, #FAF7F2 0%, #F5EFE4 100%);
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
    font-family: 'Instrument Serif', serif;
    font-size: 32px;
    font-weight: 400;
    color: var(--ink);
    margin-bottom: 0.25rem;
  }
  
  .page-title-section p {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 14px;
    color: var(--warm-gray);
  }
  
  /* Filters Bar */
  .filters-bar {
    background: rgba(245,239,228,0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(226,213,195,0.5);
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
    font-family: 'Plus Jakarta Sans', sans-serif;
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
    border: 1.5px solid rgba(226,213,195,0.6);
    border-radius: 12px;
    font-family: 'Plus Jakarta Sans', sans-serif;
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
    border: 1.5px solid rgba(226,213,195,0.6);
    border-radius: 12px;
    padding: 0.625rem 1.25rem;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 500;
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
    background: rgba(245,239,228,0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(226,213,195,0.5);
    border-radius: 16px;
    padding: 1.25rem;
    transition: all 0.3s ease;
  }
  
  .stat-card:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 24px rgba(0,0,0,0.06);
  }
  
  .stat-label {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 11px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--warm-gray);
    margin-bottom: 0.5rem;
  }
  
  .stat-value {
    font-family: 'Instrument Serif', serif;
    font-size: 32px;
    font-weight: 400;
    color: var(--ink);
  }
  
  .stat-change {
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 11px;
    margin-top: 0.5rem;
  }
  
  .stat-change.positive {
    color: var(--success);
  }
  
  .stat-change.negative {
    color: var(--danger);
  }
  
  /* Orders Table */
  .orders-table-container {
    background: rgba(245,239,228,0.8);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(226,213,195,0.5);
    border-radius: 20px;
    overflow-x: auto;
  }
  
  .orders-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 800px;
  }
  
  .orders-table th {
    text-align: left;
    padding: 1rem 1.25rem;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 12px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 0.05em;
    color: var(--warm-gray);
    border-bottom: 1px solid rgba(226,213,195,0.5);
    background: rgba(245,239,228,0.5);
  }
  
  .orders-table td {
    padding: 1rem 1.25rem;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: var(--ink);
    border-bottom: 1px solid rgba(226,213,195,0.3);
    vertical-align: middle;
  }
  
  .orders-table tr:hover {
    background: rgba(196,168,130,0.05);
  }
  
  .orders-table tr:last-child td {
    border-bottom: none;
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
    text-transform: capitalize;
  }
  
  .status-badge::before {
    content: '';
    width: 8px;
    height: 8px;
    border-radius: 50%;
  }
  
  .status-pending {
    background: rgba(196,144,58,0.15);
    color: var(--warning);
  }
  
  .status-pending::before {
    background: var(--warning);
  }
  
  .status-processing {
    background: rgba(196,168,130,0.15);
    color: var(--bark);
  }
  
  .status-processing::before {
    background: var(--tan);
  }
  
  .status-shipped {
    background: rgba(107,143,94,0.15);
    color: var(--success);
  }
  
  .status-shipped::before {
    background: var(--success);
  }
  
  .status-delivered {
    background: rgba(107,143,94,0.15);
    color: var(--success);
  }
  
  .status-delivered::before {
    background: var(--success);
  }
  
  .status-cancelled {
    background: rgba(158,90,72,0.15);
    color: var(--danger);
  }
  
  .status-cancelled::before {
    background: var(--danger);
  }
  
  .status-refunded {
    background: rgba(158,90,72,0.15);
    color: var(--danger);
  }
  
  .status-refunded::before {
    background: var(--danger);
  }
  
  /* Action Buttons */
  .action-buttons {
    display: flex;
    gap: 0.5rem;
  }
  
  .action-btn {
    width: 32px;
    height: 32px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 8px;
    background: transparent;
    border: 1px solid rgba(226,213,195,0.6);
    cursor: pointer;
    transition: all 0.2s;
  }
  
  .action-btn:hover {
    background: rgba(196,168,130,0.1);
    border-color: var(--tan);
  }
  
  .action-btn svg {
    width: 16px;
    height: 16px;
    stroke: var(--warm-gray);
    transition: all 0.2s;
  }
  
  .action-btn:hover svg {
    stroke: var(--bark);
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
    border: 1px solid rgba(226,213,195,0.6);
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    font-weight: 500;
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
    border-radius: 24px;
    max-width: 600px;
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
    border-bottom: 1px solid rgba(226,213,195,0.5);
  }
  
  .modal-header h2 {
    font-family: 'Instrument Serif', serif;
    font-size: 24px;
    font-weight: 400;
    color: var(--ink);
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
    font-family: 'Plus Jakarta Sans', sans-serif;
  }
  
  .order-detail-row {
    display: flex;
    margin-bottom: 1rem;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid rgba(226,213,195,0.3);
  }
  
  .order-detail-label {
    width: 120px;
    font-weight: 600;
    color: var(--warm-gray);
    font-size: 12px;
  }
  
  .order-detail-value {
    flex: 1;
    font-weight: 500;
    color: var(--ink);
    font-size: 13px;
  }
  
  .order-items-table {
    width: 100%;
    margin-top: 1rem;
    border-collapse: collapse;
  }
  
  .order-items-table th {
    text-align: left;
    padding: 0.5rem 0;
    font-size: 11px;
    font-weight: 600;
    color: var(--warm-gray);
  }
  
  .order-items-table td {
    padding: 0.5rem 0;
    font-size: 12px;
    border-top: 1px solid rgba(226,213,195,0.3);
  }
  
  .status-update {
    margin-top: 1.5rem;
    padding-top: 1rem;
    border-top: 1px solid rgba(226,213,195,0.5);
  }
  
  .status-update select {
    padding: 0.625rem 1rem;
    border-radius: 12px;
    border: 1.5px solid rgba(226,213,195,0.6);
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-size: 13px;
    margin-right: 1rem;
  }
  
  .update-status-btn {
    background: var(--ink);
    color: var(--cream);
    border: none;
    padding: 0.625rem 1.25rem;
    border-radius: 12px;
    font-family: 'Plus Jakarta Sans', sans-serif;
    font-weight: 500;
    cursor: pointer;
    transition: all 0.2s;
  }
  
  .update-status-btn:hover {
    background: var(--bark);
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
  }
</style>

<section class="main-content">
  <div class="content-scroll">
    <!-- Page Header -->
    <div class="page-header">
      <div class="page-title-section">
        <h1>Orders</h1>
        <p>Manage and track all customer orders</p>
      </div>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid">
      <div class="stat-card">
        <div class="stat-label">Total Orders</div>
        <div class="stat-value" id="totalOrders">0</div>
        <div class="stat-change positive">↑ 12% vs last month</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Pending</div>
        <div class="stat-value" id="pendingOrders">0</div>
        <div class="stat-change">Awaiting confirmation</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Processing</div>
        <div class="stat-value" id="processingOrders">0</div>
        <div class="stat-change">Being prepared</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Shipped</div>
        <div class="stat-value" id="shippedOrders">0</div>
        <div class="stat-change positive">On the way</div>
      </div>
    </div>

    <!-- Filters Bar -->
    <div class="filters-bar">
      <div class="filter-group">
        <label>Status</label>
        <select id="statusFilter" onchange="filterOrders()">
          <option value="all">All Orders</option>
          <option value="pending">Pending</option>
          <option value="processing">Processing</option>
          <option value="shipped">Shipped</option>
          <option value="delivered">Delivered</option>
          <option value="cancelled">Cancelled</option>
          <option value="refunded">Refunded</option>
        </select>
      </div>
      <div class="filter-group">
        <label>Date Range</label>
        <select id="dateFilter" onchange="filterOrders()">
          <option value="all">All Time</option>
          <option value="today">Today</option>
          <option value="week">This Week</option>
          <option value="month">This Month</option>
          <option value="year">This Year</option>
        </select>
      </div>
      <div class="filter-group search-group">
        <label>Search</label>
        <input type="text" id="searchInput" placeholder="Search by order ID, customer name, or email..." onkeyup="filterOrders()">
      </div>
      <button class="reset-filters" onclick="resetFilters()">Reset Filters</button>
    </div>

    <!-- Orders Table -->
    <div class="orders-table-container">
      <table class="orders-table">
        <thead>
          <tr>
            <th>Order ID</th>
            <th>Customer</th>
            <th>Date</th>
            <th>Amount</th>
            <th>Status</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody id="ordersTableBody">
          <!-- Dynamic content -->
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="pagination" id="pagination"></div>
  </div>
</section>

<!-- Order Details Modal -->
<div class="modal-overlay" id="orderModal">
  <div class="modal">
    <div class="modal-header">
      <h2>Order Details</h2>
      <div class="close-modal" onclick="closeOrderModal()">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="18" y1="6" x2="6" y2="18"/>
          <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
      </div>
    </div>
    <div class="modal-body" id="orderModalBody">
      <!-- Dynamic content -->
    </div>
  </div>
</div>

<script>
  // Orders Data
  const ordersData = [
    { id: 'PS-24821', customer: 'Layla Hassan', email: 'layla@example.com', date: '2024-05-15', amount: 158.00, status: 'pending', items: [{ name: 'Calm Restore Serum', quantity: 2, price: 58.00 }, { name: 'Barrier Shield Mist', quantity: 1, price: 42.00 }], shipping: { address: '123 Main St, Berlin, Germany', method: 'Express' } },
    { id: 'PS-24820', customer: 'Nadia Farooq', email: 'nadia@example.com', date: '2024-05-14', amount: 89.00, status: 'processing', items: [{ name: 'Radiance Day Oil', quantity: 1, price: 65.00 }, { name: 'Travel Essentials Duo', quantity: 1, price: 24.00 }], shipping: { address: '45 Oak Ave, Munich, Germany', method: 'Standard' } },
    { id: 'PS-24819', customer: 'Imran Siddiq', email: 'imran@example.com', date: '2024-05-14', amount: 148.00, status: 'shipped', items: [{ name: 'The Calm Ritual Set', quantity: 1, price: 148.00 }], shipping: { address: '78 Pine Road, Hamburg, Germany', method: 'Express' } },
    { id: 'PS-24818', customer: 'Sara Qureshi', email: 'sara@example.com', date: '2024-05-13', amount: 65.00, status: 'delivered', items: [{ name: 'Radiance Day Oil', quantity: 1, price: 65.00 }], shipping: { address: '12 Elm Street, Cologne, Germany', method: 'Standard' } },
    { id: 'PS-24817', customer: 'Omar Raza', email: 'omar@example.com', date: '2024-05-12', amount: 74.00, status: 'cancelled', items: [{ name: 'Night Renewal Balm', quantity: 1, price: 74.00 }], shipping: { address: '90 Birch Lane, Frankfurt, Germany', method: 'Standard' } },
    { id: 'PS-24816', customer: 'Hina Malik', email: 'hina@example.com', date: '2024-05-11', amount: 68.00, status: 'shipped', items: [{ name: 'Travel Essentials Duo', quantity: 2, price: 34.00 }], shipping: { address: '234 Cedar Court, Stuttgart, Germany', method: 'Express' } },
    { id: 'PS-24815', customer: 'Ahmed Khan', email: 'ahmed@example.com', date: '2024-05-10', amount: 210.00, status: 'processing', items: [{ name: 'Calm Restore Serum', quantity: 2, price: 58.00 }, { name: 'Night Renewal Balm', quantity: 1, price: 74.00 }, { name: 'Barrier Shield Mist', quantity: 1, price: 42.00 }], shipping: { address: '567 Willow Way, Dusseldorf, Germany', method: 'Express' } },
    { id: 'PS-24814', customer: 'Fatima Zafar', email: 'fatima@example.com', date: '2024-05-09', amount: 116.00, status: 'delivered', items: [{ name: 'Calm Restore Serum', quantity: 2, price: 58.00 }], shipping: { address: '321 Aspen Drive, Leipzig, Germany', method: 'Standard' } },
    { id: 'PS-24813', customer: 'Bilal Ahmed', email: 'bilal@example.com', date: '2024-05-08', amount: 42.00, status: 'refunded', items: [{ name: 'Barrier Shield Mist', quantity: 1, price: 42.00 }], shipping: { address: '876 Spruce Street, Dresden, Germany', method: 'Standard' } },
    { id: 'PS-24812', customer: 'Zara Hussain', email: 'zara@example.com', date: '2024-05-07', amount: 234.00, status: 'pending', items: [{ name: 'The Calm Ritual Set', quantity: 1, price: 148.00 }, { name: 'Radiance Day Oil', quantity: 1, price: 65.00 }], shipping: { address: '543 Maple Avenue, Nuremberg, Germany', method: 'Express' } }
  ];

  let currentPage = 1;
  const rowsPerPage = 8;
  let filteredOrders = [...ordersData];

  // Format date
  function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
  }

  // Format currency
  function formatCurrency(amount) {
    return '€' + amount.toFixed(2);
  }

  // Get status badge class
  function getStatusClass(status) {
    const statusMap = {
      'pending': 'status-pending',
      'processing': 'status-processing',
      'shipped': 'status-shipped',
      'delivered': 'status-delivered',
      'cancelled': 'status-cancelled',
      'refunded': 'status-refunded'
    };
    return statusMap[status] || 'status-pending';
  }

  // Filter orders
  function filterOrders() {
    const statusFilter = document.getElementById('statusFilter').value;
    const dateFilter = document.getElementById('dateFilter').value;
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    
    filteredOrders = ordersData.filter(order => {
      // Status filter
      if (statusFilter !== 'all' && order.status !== statusFilter) return false;
      
      // Date filter
      if (dateFilter !== 'all') {
        const orderDate = new Date(order.date);
        const today = new Date();
        const todayStr = today.toDateString();
        
        if (dateFilter === 'today') {
          if (orderDate.toDateString() !== todayStr) return false;
        } else if (dateFilter === 'week') {
          const weekAgo = new Date(today.setDate(today.getDate() - 7));
          if (orderDate < weekAgo) return false;
        } else if (dateFilter === 'month') {
          const monthAgo = new Date(today.setMonth(today.getMonth() - 1));
          if (orderDate < monthAgo) return false;
        } else if (dateFilter === 'year') {
          const yearAgo = new Date(today.setFullYear(today.getFullYear() - 1));
          if (orderDate < yearAgo) return false;
        }
      }
      
      // Search filter
      if (searchTerm) {
        return order.id.toLowerCase().includes(searchTerm) ||
               order.customer.toLowerCase().includes(searchTerm) ||
               order.email.toLowerCase().includes(searchTerm);
      }
      
      return true;
    });
    
    currentPage = 1;
    renderOrdersTable();
    updateStats();
  }

  // Reset filters
  function resetFilters() {
    document.getElementById('statusFilter').value = 'all';
    document.getElementById('dateFilter').value = 'all';
    document.getElementById('searchInput').value = '';
    filteredOrders = [...ordersData];
    currentPage = 1;
    renderOrdersTable();
    updateStats();
  }

  // Update stats
  function updateStats() {
    const total = filteredOrders.length;
    const pending = filteredOrders.filter(o => o.status === 'pending').length;
    const processing = filteredOrders.filter(o => o.status === 'processing').length;
    const shipped = filteredOrders.filter(o => o.status === 'shipped' || o.status === 'delivered').length;
    
    document.getElementById('totalOrders').textContent = total;
    document.getElementById('pendingOrders').textContent = pending;
    document.getElementById('processingOrders').textContent = processing;
    document.getElementById('shippedOrders').textContent = shipped;
  }

  // Render orders table
  function renderOrdersTable() {
    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    const paginatedOrders = filteredOrders.slice(start, end);
    
    const tbody = document.getElementById('ordersTableBody');
    tbody.innerHTML = paginatedOrders.map(order => `
      <tr>
        <td style="font-weight: 600; color: var(--bark);">${order.id}</td>
        <td>
          ${order.customer}<br>
          <small style="color: var(--warm-gray); font-size: 11px;">${order.email}</small>
        </td>
        <td>${formatDate(order.date)}</td>
        <td style="font-weight: 600;">${formatCurrency(order.amount)}</td>
        <td><span class="status-badge ${getStatusClass(order.status)}">${order.status}</span></td>
        <td>
          <div class="action-buttons">
            <button class="action-btn" onclick="viewOrderDetails('${order.id}')" title="View Details">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                <circle cx="12" cy="12" r="3"/>
              </svg>
            </button>
            <button class="action-btn" onclick="updateOrderStatus('${order.id}')" title="Update Status">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"/>
                <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"/>
              </svg>
            </button>
          </div>
        </td>
      </tr>
    `).join('');
    
    renderPagination();
  }

  // Render pagination
  function renderPagination() {
    const totalPages = Math.ceil(filteredOrders.length / rowsPerPage);
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
    renderOrdersTable();
  }

  // View order details
  function viewOrderDetails(orderId) {
    const order = ordersData.find(o => o.id === orderId);
    if (!order) return;
    
    const modalBody = document.getElementById('orderModalBody');
    modalBody.innerHTML = `
      <div class="order-detail-row">
        <div class="order-detail-label">Order ID</div>
        <div class="order-detail-value">${order.id}</div>
      </div>
      <div class="order-detail-row">
        <div class="order-detail-label">Customer</div>
        <div class="order-detail-value">${order.customer}<br><small style="color: var(--warm-gray);">${order.email}</small></div>
      </div>
      <div class="order-detail-row">
        <div class="order-detail-label">Order Date</div>
        <div class="order-detail-value">${formatDate(order.date)}</div>
      </div>
      <div class="order-detail-row">
        <div class="order-detail-label">Shipping Address</div>
        <div class="order-detail-value">${order.shipping.address}<br><small>Method: ${order.shipping.method}</small></div>
      </div>
      <div class="order-detail-row">
        <div class="order-detail-label">Items</div>
        <div class="order-detail-value">
          <table class="order-items-table">
            <thead><tr><th>Product</th><th>Qty</th><th>Price</th><th>Total</th></tr></thead>
            <tbody>
              ${order.items.map(item => `
                <tr>
                  <td>${item.name}</td>
                  <td>${item.quantity}</td>
                  <td>${formatCurrency(item.price)}</td>
                  <td>${formatCurrency(item.price * item.quantity)}</td>
                </tr>
              `).join('')}
              <tr style="border-top: 2px solid var(--sand);">
                <td colspan="3" style="text-align: right; font-weight: 600;">Total:</td>
                <td style="font-weight: 600;">${formatCurrency(order.amount)}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <div class="status-update">
        <label style="display: block; margin-bottom: 0.5rem;">Update Status</label>
        <select id="modalStatusSelect">
          <option value="pending" ${order.status === 'pending' ? 'selected' : ''}>Pending</option>
          <option value="processing" ${order.status === 'processing' ? 'selected' : ''}>Processing</option>
          <option value="shipped" ${order.status === 'shipped' ? 'selected' : ''}>Shipped</option>
          <option value="delivered" ${order.status === 'delivered' ? 'selected' : ''}>Delivered</option>
          <option value="cancelled" ${order.status === 'cancelled' ? 'selected' : ''}>Cancelled</option>
          <option value="refunded" ${order.status === 'refunded' ? 'selected' : ''}>Refunded</option>
        </select>
        <button class="update-status-btn" onclick="changeOrderStatus('${order.id}')">Update Status</button>
      </div>
    `;
    
    document.getElementById('orderModal').classList.add('active');
  }

  function closeOrderModal() {
    document.getElementById('orderModal').classList.remove('active');
  }

  function changeOrderStatus(orderId) {
    const newStatus = document.getElementById('modalStatusSelect').value;
    const orderIndex = ordersData.findIndex(o => o.id === orderId);
    if (orderIndex !== -1) {
      ordersData[orderIndex].status = newStatus;
      filteredOrders = [...ordersData];
      filterOrders();
      closeOrderModal();
      alert(`Order ${orderId} status updated to ${newStatus}`);
    }
  }

  function updateOrderStatus(orderId) {
    viewOrderDetails(orderId);
  }

  // Initialize
  function init() {
    filteredOrders = [...ordersData];
    renderOrdersTable();
    updateStats();
  }
  
  init();
</script>