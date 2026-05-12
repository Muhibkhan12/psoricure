<?php
// customers.php - Customers Management Page
include('sidebar.php');
?>

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
  
  .add-customer-btn {
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
  
  .add-customer-btn:hover {
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
  
  /* Customers Table */
  .customers-table-container {
    background: var(--cream);
    border: 0.5px solid var(--sand);
    border-radius: 16px;
    overflow-x: auto;
  }
  
  .customers-table {
    width: 100%;
    border-collapse: collapse;
    min-width: 900px;
  }
  
  .customers-table th {
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
  
  .customers-table td {
    padding: 1rem 1.25rem;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: var(--ink);
    border-bottom: 0.5px solid rgba(226,213,195,0.3);
    vertical-align: middle;
  }
  
  .customers-table tr:hover {
    background: rgba(196,168,130,0.05);
  }
  
  .customers-table tr:last-child td {
    border-bottom: none;
  }
  
  /* Customer Avatar */
  .customer-avatar {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: linear-gradient(135deg, var(--tan), var(--bark));
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-weight: 600;
    font-size: 14px;
  }
  
  .customer-info {
    display: flex;
    align-items: center;
    gap: 12px;
  }
  
  .customer-details {
    display: flex;
    flex-direction: column;
  }
  
  .customer-name {
    font-weight: 700;
    color: var(--ink);
  }
  
  .customer-email {
    font-size: 11px;
    color: var(--warm-gray);
    font-weight: 500;
  }
  
  /* Tier Badges */
  .tier-badge {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    padding: 0.375rem 0.875rem;
    border-radius: 40px;
    font-size: 11px;
    font-weight: 600;
  }
  
  .tier-platinum {
    background: rgba(140,110,80,0.15);
    color: var(--bark-dark);
  }
  
  .tier-gold {
    background: rgba(196,144,58,0.15);
    color: var(--warning);
  }
  
  .tier-silver {
    background: rgba(158,90,72,0.15);
    color: var(--danger);
  }
  
  .tier-bronze {
    background: rgba(196,168,130,0.15);
    color: var(--bark);
  }
  
  .tier-new {
    background: rgba(107,143,94,0.15);
    color: var(--success);
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
  
  .customer-detail-row {
    display: flex;
    margin-bottom: 1rem;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid rgba(226,213,195,0.3);
  }
  
  .customer-detail-label {
    width: 120px;
    font-weight: 600;
    color: var(--warm-gray);
    font-size: 12px;
  }
  
  .customer-detail-value {
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
        <h1>Customers</h1>
        <p>Manage and view all customer information</p>
      </div>
      <button class="add-customer-btn" onclick="openAddCustomerModal()">
        <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="12" y1="5" x2="12" y2="19"/>
          <line x1="5" y1="12" x2="19" y2="12"/>
        </svg>
        Add Customer
      </button>
    </div>

    <!-- Stats Cards -->
    <div class="stats-grid fade-in">
      <div class="stat-card">
        <div class="stat-label">Total Customers</div>
        <div class="stat-value" id="totalCustomers">0</div>
        <div class="stat-change positive">↑ 12% vs last month</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">Active Customers</div>
        <div class="stat-value" id="activeCustomers">0</div>
        <div class="stat-change positive">↑ 8% vs last month</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">New This Month</div>
        <div class="stat-value" id="newCustomers">0</div>
        <div class="stat-change positive">↑ 15% vs last month</div>
      </div>
      <div class="stat-card">
        <div class="stat-label">VIP/Loyal</div>
        <div class="stat-value" id="vipCustomers">0</div>
        <div class="stat-change positive">↑ 5% vs last month</div>
      </div>
    </div>

    <!-- Filters Bar -->
    <div class="filters-bar fade-in">
      <div class="filter-group">
        <label>Tier</label>
        <select id="tierFilter" onchange="filterCustomers()">
          <option value="all">All Tiers</option>
          <option value="platinum">Platinum</option>
          <option value="gold">Gold</option>
          <option value="silver">Silver</option>
          <option value="bronze">Bronze</option>
          <option value="new">New</option>
        </select>
      </div>
      <div class="filter-group">
        <label>Status</label>
        <select id="statusFilter" onchange="filterCustomers()">
          <option value="all">All Status</option>
          <option value="active">Active</option>
          <option value="inactive">Inactive</option>
        </select>
      </div>
      <div class="filter-group search-group">
        <label>Search</label>
        <input type="text" id="searchInput" placeholder="Search by name, email, or phone..." onkeyup="filterCustomers()">
      </div>
      <button class="reset-filters" onclick="resetFilters()">Reset Filters</button>
    </div>

    <!-- Customers Table -->
    <div class="customers-table-container fade-in">
      <table class="customers-table">
        <thead>
          <tr>
            <th>Customer</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Total Spent</th>
            <th>Orders</th>
            <th>Tier</th>
            <th>Joined</th>
            <th style="text-align: center;">Actions</th>
          </tr>
        </thead>
        <tbody id="customersTableBody">
          <!-- Dynamic content -->
        </tbody>
      </table>
    </div>

    <!-- Pagination -->
    <div class="pagination" id="pagination"></div>
  </div>
</section>

<!-- Customer Details Modal -->
<div class="modal-overlay" id="customerModal">
  <div class="modal">
    <div class="modal-header">
      <h2>Customer Details</h2>
      <div class="close-modal" onclick="closeCustomerModal()">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="18" y1="6" x2="6" y2="18"/>
          <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
      </div>
    </div>
    <div class="modal-body" id="customerModalBody">
      <!-- Dynamic content -->
    </div>
  </div>
</div>

<!-- Add Customer Modal -->
<div class="modal-overlay" id="addCustomerModal">
  <div class="modal">
    <div class="modal-header">
      <h2>Add New Customer</h2>
      <div class="close-modal" onclick="closeAddCustomerModal()">
        <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
          <line x1="18" y1="6" x2="6" y2="18"/>
          <line x1="6" y1="6" x2="18" y2="18"/>
        </svg>
      </div>
    </div>
    <div class="modal-body">
      <form id="addCustomerForm" onsubmit="return addCustomer(event)">
        <div class="form-row" style="margin-bottom: 1rem;">
          <label style="display: block; margin-bottom: 0.5rem;">Full Name *</label>
          <input type="text" id="newCustomerName" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--sand); border-radius: 10px;">
        </div>
        <div class="form-row" style="margin-bottom: 1rem;">
          <label style="display: block; margin-bottom: 0.5rem;">Email *</label>
          <input type="email" id="newCustomerEmail" required style="width: 100%; padding: 0.75rem; border: 1px solid var(--sand); border-radius: 10px;">
        </div>
        <div class="form-row" style="margin-bottom: 1rem;">
          <label style="display: block; margin-bottom: 0.5rem;">Phone</label>
          <input type="text" id="newCustomerPhone" style="width: 100%; padding: 0.75rem; border: 1px solid var(--sand); border-radius: 10px;">
        </div>
        <div class="form-row" style="margin-bottom: 1rem;">
          <label style="display: block; margin-bottom: 0.5rem;">Location</label>
          <input type="text" id="newCustomerLocation" style="width: 100%; padding: 0.75rem; border: 1px solid var(--sand); border-radius: 10px;">
        </div>
        <div class="form-actions" style="display: flex; justify-content: flex-end; gap: 1rem; margin-top: 1.5rem;">
          <button type="button" class="btn-secondary" onclick="closeAddCustomerModal()" style="padding: 0.75rem 1.5rem; background: transparent; border: 1px solid var(--sand); border-radius: 40px; font-weight: 600;">Cancel</button>
          <button type="submit" class="btn-primary" style="padding: 0.75rem 1.5rem; background: var(--ink); color: white; border: none; border-radius: 40px; font-weight: 600;">Add Customer</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script>
  // Customers Data
  const customersData = [
    { id: 1, name: 'Layla Hassan', email: 'layla@example.com', phone: '+49 123 456 789', location: 'Berlin, Germany', totalSpent: 2840, orders: 12, tier: 'platinum', status: 'active', joined: '2023-01-15', avatar: 'L' },
    { id: 2, name: 'Nadia Farooq', email: 'nadia@example.com', phone: '+49 234 567 890', location: 'Munich, Germany', totalSpent: 1890, orders: 8, tier: 'gold', status: 'active', joined: '2023-03-20', avatar: 'N' },
    { id: 3, name: 'Imran Siddiq', email: 'imran@example.com', phone: '+49 345 678 901', location: 'Hamburg, Germany', totalSpent: 1250, orders: 5, tier: 'silver', status: 'active', joined: '2023-06-10', avatar: 'I' },
    { id: 4, name: 'Sara Qureshi', email: 'sara@example.com', phone: '+49 456 789 012', location: 'Cologne, Germany', totalSpent: 890, orders: 4, tier: 'bronze', status: 'active', joined: '2023-08-05', avatar: 'S' },
    { id: 5, name: 'Omar Raza', email: 'omar@example.com', phone: '+49 567 890 123', location: 'Frankfurt, Germany', totalSpent: 2340, orders: 9, tier: 'gold', status: 'active', joined: '2023-02-28', avatar: 'O' },
    { id: 6, name: 'Hina Malik', email: 'hina@example.com', phone: '+49 678 901 234', location: 'Stuttgart, Germany', totalSpent: 560, orders: 3, tier: 'bronze', status: 'inactive', joined: '2023-09-12', avatar: 'H' },
    { id: 7, name: 'Ahmed Khan', email: 'ahmed@example.com', phone: '+49 789 012 345', location: 'Dusseldorf, Germany', totalSpent: 3120, orders: 14, tier: 'platinum', status: 'active', joined: '2022-11-20', avatar: 'A' },
    { id: 8, name: 'Fatima Zafar', email: 'fatima@example.com', phone: '+49 890 123 456', location: 'Leipzig, Germany', totalSpent: 720, orders: 3, tier: 'new', status: 'active', joined: '2024-01-15', avatar: 'F' },
    { id: 9, name: 'Bilal Ahmed', email: 'bilal@example.com', phone: '+49 901 234 567', location: 'Dresden, Germany', totalSpent: 1580, orders: 7, tier: 'silver', status: 'active', joined: '2023-05-18', avatar: 'B' },
    { id: 10, name: 'Zara Hussain', email: 'zara@example.com', phone: '+49 012 345 678', location: 'Nuremberg, Germany', totalSpent: 3450, orders: 15, tier: 'platinum', status: 'active', joined: '2022-09-30', avatar: 'Z' },
    { id: 11, name: 'Usman Chaudhry', email: 'usman@example.com', phone: '+49 123 987 654', location: 'Bremen, Germany', totalSpent: 430, orders: 2, tier: 'new', status: 'active', joined: '2024-02-10', avatar: 'U' },
    { id: 12, name: 'Ayesha Tariq', email: 'ayesha@example.com', phone: '+49 234 876 543', location: 'Hannover, Germany', totalSpent: 2670, orders: 11, tier: 'gold', status: 'active', joined: '2023-04-22', avatar: 'A' }
  ];

  let currentPage = 1;
  const rowsPerPage = 8;
  let filteredCustomers = [...customersData];

  function formatCurrency(amount) {
    return '€' + amount.toLocaleString();
  }

  function formatDate(dateString) {
    const date = new Date(dateString);
    return date.toLocaleDateString('en-US', { month: 'short', day: 'numeric', year: 'numeric' });
  }

  function getTierClass(tier) {
    const tierMap = {
      'platinum': 'tier-platinum',
      'gold': 'tier-gold',
      'silver': 'tier-silver',
      'bronze': 'tier-bronze',
      'new': 'tier-new'
    };
    return tierMap[tier] || 'tier-new';
  }

  function filterCustomers() {
    const tierFilter = document.getElementById('tierFilter').value;
    const statusFilter = document.getElementById('statusFilter').value;
    const searchTerm = document.getElementById('searchInput').value.toLowerCase();
    
    filteredCustomers = customersData.filter(customer => {
      if (tierFilter !== 'all' && customer.tier !== tierFilter) return false;
      if (statusFilter !== 'all' && customer.status !== statusFilter) return false;
      if (searchTerm) {
        return customer.name.toLowerCase().includes(searchTerm) ||
               customer.email.toLowerCase().includes(searchTerm) ||
               customer.phone.includes(searchTerm);
      }
      return true;
    });
    
    currentPage = 1;
    renderCustomersTable();
    updateStats();
  }

  function resetFilters() {
    document.getElementById('tierFilter').value = 'all';
    document.getElementById('statusFilter').value = 'all';
    document.getElementById('searchInput').value = '';
    filteredCustomers = [...customersData];
    currentPage = 1;
    renderCustomersTable();
    updateStats();
  }

  function updateStats() {
    const total = filteredCustomers.length;
    const active = filteredCustomers.filter(c => c.status === 'active').length;
    const newCustomers = filteredCustomers.filter(c => c.tier === 'new').length;
    const vip = filteredCustomers.filter(c => c.tier === 'platinum' || c.tier === 'gold').length;
    
    document.getElementById('totalCustomers').textContent = total;
    document.getElementById('activeCustomers').textContent = active;
    document.getElementById('newCustomers').textContent = newCustomers;
    document.getElementById('vipCustomers').textContent = vip;
  }

  function renderCustomersTable() {
    const start = (currentPage - 1) * rowsPerPage;
    const end = start + rowsPerPage;
    const paginatedCustomers = filteredCustomers.slice(start, end);
    
    const tbody = document.getElementById('customersTableBody');
    tbody.innerHTML = paginatedCustomers.map(customer => `
      <tr>
        <td>
          <div class="customer-info">
            <div class="customer-avatar">${customer.avatar}</div>
            <div class="customer-details">
              <div class="customer-name">${customer.name}</div>
              <div class="customer-email">${customer.location}</div>
            </div>
          </div>
        </td>
        <td>${customer.email}</td>
        <td>${customer.phone}</td>
        <td style="font-weight: 700;">${formatCurrency(customer.totalSpent)}</td>
        <td>${customer.orders}</td>
        <td><span class="tier-badge ${getTierClass(customer.tier)}">${customer.tier.charAt(0).toUpperCase() + customer.tier.slice(1)}</span></td>
        <td>${formatDate(customer.joined)}</td>
        <td style="text-align: center;">
          <div class="action-buttons">
            <button class="action-btn" onclick="viewCustomerDetails(${customer.id})" title="View Details">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"/>
                <circle cx="12" cy="12" r="3"/>
              </svg>
            </button>
            <button class="action-btn" onclick="editCustomer(${customer.id})" title="Edit Customer">
              <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M20 14.66V20a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h5.34"/>
                <polygon points="18 2 22 6 12 16 8 16 8 12 18 2"/>
              </svg>
            </button>
            <button class="action-btn" onclick="deleteCustomer(${customer.id})" title="Delete Customer" style="border-color: var(--danger);">
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
    const totalPages = Math.ceil(filteredCustomers.length / rowsPerPage);
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
    renderCustomersTable();
  }

  function viewCustomerDetails(customerId) {
    const customer = customersData.find(c => c.id === customerId);
    if (!customer) return;
    
    const modalBody = document.getElementById('customerModalBody');
    modalBody.innerHTML = `
      <div class="customer-detail-row">
        <div class="customer-detail-label">Full Name</div>
        <div class="customer-detail-value">${customer.name}</div>
      </div>
      <div class="customer-detail-row">
        <div class="customer-detail-label">Email</div>
        <div class="customer-detail-value">${customer.email}</div>
      </div>
      <div class="customer-detail-row">
        <div class="customer-detail-label">Phone</div>
        <div class="customer-detail-value">${customer.phone}</div>
      </div>
      <div class="customer-detail-row">
        <div class="customer-detail-label">Location</div>
        <div class="customer-detail-value">${customer.location}</div>
      </div>
      <div class="customer-detail-row">
        <div class="customer-detail-label">Total Spent</div>
        <div class="customer-detail-value">${formatCurrency(customer.totalSpent)}</div>
      </div>
      <div class="customer-detail-row">
        <div class="customer-detail-label">Orders</div>
        <div class="customer-detail-value">${customer.orders}</div>
      </div>
      <div class="customer-detail-row">
        <div class="customer-detail-label">Tier</div>
        <div class="customer-detail-value"><span class="tier-badge ${getTierClass(customer.tier)}">${customer.tier.charAt(0).toUpperCase() + customer.tier.slice(1)}</span></div>
      </div>
      <div class="customer-detail-row">
        <div class="customer-detail-label">Status</div>
        <div class="customer-detail-value">${customer.status.charAt(0).toUpperCase() + customer.status.slice(1)}</div>
      </div>
      <div class="customer-detail-row">
        <div class="customer-detail-label">Member Since</div>
        <div class="customer-detail-value">${formatDate(customer.joined)}</div>
      </div>
    `;
    
    document.getElementById('customerModal').classList.add('active');
  }

  function closeCustomerModal() {
    document.getElementById('customerModal').classList.remove('active');
  }

  function editCustomer(customerId) {
    const customer = customersData.find(c => c.id === customerId);
    if (customer) {
      alert(`Edit customer: ${customer.name}\n\nEdit functionality would open here.`);
    }
  }

  function deleteCustomer(customerId) {
    const customer = customersData.find(c => c.id === customerId);
    if (confirm(`Are you sure you want to delete customer ${customer?.name}?`)) {
      const index = customersData.findIndex(c => c.id === customerId);
      if (index !== -1) {
        customersData.splice(index, 1);
        filteredCustomers = [...customersData];
        filterCustomers();
        alert(`Customer ${customer?.name} has been deleted.`);
      }
    }
  }

  function openAddCustomerModal() {
    document.getElementById('addCustomerModal').classList.add('active');
  }

  function closeAddCustomerModal() {
    document.getElementById('addCustomerModal').classList.remove('active');
    document.getElementById('addCustomerForm').reset();
  }

  function addCustomer(event) {
    event.preventDefault();
    
    const newCustomer = {
      id: customersData.length + 1,
      name: document.getElementById('newCustomerName').value,
      email: document.getElementById('newCustomerEmail').value,
      phone: document.getElementById('newCustomerPhone').value || 'Not provided',
      location: document.getElementById('newCustomerLocation').value || 'Not specified',
      totalSpent: 0,
      orders: 0,
      tier: 'new',
      status: 'active',
      joined: new Date().toISOString().split('T')[0],
      avatar: document.getElementById('newCustomerName').value.charAt(0).toUpperCase()
    };
    
    customersData.push(newCustomer);
    filteredCustomers = [...customersData];
    filterCustomers();
    closeAddCustomerModal();
    alert(`Customer ${newCustomer.name} added successfully!`);
  }

  function init() {
    filteredCustomers = [...customersData];
    renderCustomersTable();
    updateStats();
  }
  
  init();
</script>