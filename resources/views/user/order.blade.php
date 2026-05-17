<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>Psoricure - My Orders</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=DM+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>
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

/* Main Content - Matches sidebar */
.main-content {
  margin-left: 230px;
  margin-top: 56px;
  padding: 1.5rem;
  min-height: calc(100vh - 56px);
  background: #FAF7F2;
}

/* Page Header */
.page-header {
  margin-bottom: 1.5rem;
}

.page-title {
  font-family: 'Cormorant Garamond', serif;
  font-size: 28px;
  font-weight: 400;
  color: #1C1917;
  margin-bottom: 4px;
}

.page-subtitle {
  font-size: 13px;
  color: #9A8F83;
}

/* Filters Bar */
.filters-bar {
  background: #F5EFE4;
  border: 0.5px solid #E2D5C3;
  border-radius: 12px;
  padding: 1rem 1.5rem;
  margin-bottom: 1.5rem;
  display: flex;
  gap: 1rem;
  flex-wrap: wrap;
  align-items: center;
  justify-content: space-between;
}

.filter-group {
  display: flex;
  gap: 0.75rem;
  align-items: center;
  flex-wrap: wrap;
}

.filter-select {
  padding: 6px 12px;
  background: #FAF7F2;
  border: 0.5px solid #E2D5C3;
  border-radius: 8px;
  font-family: 'DM Sans', sans-serif;
  font-size: 12px;
  color: #1C1917;
  cursor: pointer;
}

.search-input {
  padding: 6px 12px;
  background: #FAF7F2;
  border: 0.5px solid #E2D5C3;
  border-radius: 8px;
  font-family: 'DM Sans', sans-serif;
  font-size: 12px;
  width: 200px;
}

.action-btn {
  background: #1C1917;
  color: #F5EFE4;
  border: none;
  padding: 6px 16px;
  border-radius: 8px;
  font-size: 11px;
  letter-spacing: 0.08em;
  text-transform: uppercase;
  cursor: pointer;
  transition: background 0.2s;
  font-family: 'DM Sans', sans-serif;
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

/* Orders Grid */
.orders-grid {
  display: flex;
  flex-direction: column;
  gap: 1rem;
}

/* Order Card */
.order-card {
  background: #F5EFE4;
  border: 0.5px solid #E2D5C3;
  border-radius: 12px;
  overflow: hidden;
  transition: all 0.2s;
}

.order-card:hover {
  box-shadow: 0 4px 12px rgba(28, 25, 23, 0.06);
}

.order-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem 1.5rem;
  background: #FAF7F2;
  border-bottom: 0.5px solid #E2D5C3;
  flex-wrap: wrap;
  gap: 0.75rem;
}

.order-info {
  display: flex;
  gap: 2rem;
  align-items: baseline;
  flex-wrap: wrap;
}

.order-id {
  font-size: 14px;
  font-weight: 600;
  color: #8C6E50;
}

.order-date {
  font-size: 12px;
  color: #9A8F83;
}

.order-total {
  font-size: 16px;
  font-weight: 600;
  color: #1C1917;
}

.order-status {
  display: inline-flex;
  align-items: center;
  gap: 6px;
  padding: 4px 12px;
  border-radius: 20px;
  font-size: 11px;
  font-weight: 500;
}

.order-status::before {
  content: '';
  width: 6px;
  height: 6px;
  border-radius: 50%;
}

.order-status.delivered {
  background: #EEF4EB;
  color: #6B8F5E;
}

.order-status.delivered::before {
  background: #6B8F5E;
}

.order-status.shipped {
  background: rgba(196, 168, 130, 0.15);
  color: #8C6E50;
}

.order-status.shipped::before {
  background: #8C6E50;
}

.order-status.processing {
  background: #FBF3E5;
  color: #C4903A;
}

.order-status.processing::before {
  background: #C4903A;
}

.order-status.cancelled {
  background: #F9EDEA;
  color: #9E5A48;
}

.order-status.cancelled::before {
  background: #9E5A48;
}

/* Order Body */
.order-body {
  padding: 1.25rem 1.5rem;
}

/* Products List in Order */
.order-products {
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
}

.order-product {
  display: flex;
  align-items: center;
  gap: 1rem;
  padding: 0.5rem 0;
}

.product-image {
  width: 56px;
  height: 56px;
  background: #EDE5D8;
  border-radius: 10px;
  display: flex;
  align-items: center;
  justify-content: center;
  flex-shrink: 0;
}

.product-details {
  flex: 1;
}

.product-name {
  font-size: 14px;
  font-weight: 500;
  color: #1C1917;
  margin-bottom: 4px;
}

.product-meta {
  font-size: 11px;
  color: #9A8F83;
}

.product-price {
  font-size: 14px;
  font-weight: 500;
  color: #8C6E50;
}

.product-quantity {
  font-size: 12px;
  color: #9A8F83;
  margin-left: 1rem;
}

/* Order Footer */
.order-footer {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem 1.5rem;
  background: #FAF7F2;
  border-top: 0.5px solid #E2D5C3;
  flex-wrap: wrap;
  gap: 0.75rem;
}

.order-actions {
  display: flex;
  gap: 0.75rem;
}

/* Empty State */
.empty-state {
  text-align: center;
  padding: 4rem 2rem;
  background: #F5EFE4;
  border: 0.5px solid #E2D5C3;
  border-radius: 12px;
}

.empty-state svg {
  margin-bottom: 1rem;
  opacity: 0.5;
}

.empty-state h3 {
  font-family: 'Cormorant Garamond', serif;
  font-size: 22px;
  font-weight: 400;
  color: #1C1917;
  margin-bottom: 0.5rem;
}

.empty-state p {
  font-size: 13px;
  color: #9A8F83;
  margin-bottom: 1.5rem;
}

/* Pagination */
.pagination {
  display: flex;
  justify-content: center;
  gap: 0.5rem;
  margin-top: 2rem;
}

.page-link {
  padding: 6px 12px;
  background: #F5EFE4;
  border: 0.5px solid #E2D5C3;
  border-radius: 6px;
  cursor: pointer;
  font-size: 12px;
  transition: all 0.2s;
}

.page-link:hover {
  background: #EDE5D8;
}

.page-link.active {
  background: #8C6E50;
  color: white;
  border-color: #8C6E50;
}

/* Modal */
.modal-overlay {
  position: fixed;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background: rgba(0, 0, 0, 0.5);
  z-index: 2000;
  display: none;
  align-items: center;
  justify-content: center;
}

.modal-overlay.active {
  display: flex;
}

.modal {
  background: #FAF7F2;
  border-radius: 16px;
  width: 90%;
  max-width: 500px;
  max-height: 80vh;
  overflow-y: auto;
  animation: fadeIn 0.3s ease;
}

.modal-header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1.25rem 1.5rem;
  border-bottom: 0.5px solid #E2D5C3;
}

.modal-header h3 {
  font-family: 'Cormorant Garamond', serif;
  font-size: 20px;
  font-weight: 400;
  color: #1C1917;
}

.modal-close {
  background: none;
  border: none;
  font-size: 24px;
  cursor: pointer;
  color: #9A8F83;
}

.modal-body {
  padding: 1.5rem;
}

.modal-footer {
  padding: 1rem 1.5rem;
  border-top: 0.5px solid #E2D5C3;
  display: flex;
  justify-content: flex-end;
  gap: 0.75rem;
}

@keyframes fadeIn {
  from {
    opacity: 0;
    transform: translateY(-10px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}

/* Responsive */
@media (max-width: 768px) {
  .main-content {
    margin-left: 0;
    padding: 1rem;
  }
  
  .order-header {
    flex-direction: column;
    align-items: flex-start;
  }
  
  .order-info {
    flex-direction: column;
    gap: 0.5rem;
  }
  
  .order-footer {
    flex-direction: column;
    align-items: flex-start;
  }
  
  .order-actions {
    width: 100%;
    justify-content: flex-start;
  }
  
  .filter-group {
    width: 100%;
  }
  
  .search-input {
    width: 100%;
  }
}

@media (max-width: 480px) {
  .order-product {
    flex-wrap: wrap;
  }
  
  .product-price {
    margin-left: auto;
  }
}
</style>
</head>
<body>

<!-- Include Sidebar -->
@include('sections.userSidebar')

<!-- Main Content -->
<main class="main-content">
  <!-- Page Header -->
  <div class="page-header">
    <h1 class="page-title">My Orders</h1>
    <p class="page-subtitle">Track and manage your purchases</p>
  </div>

  <!-- Filters -->
  <div class="filters-bar">
    <div class="filter-group">
      <select class="filter-select" id="statusFilter">
        <option value="all">All Orders</option>
        <option value="delivered">Delivered</option>
        <option value="shipped">Shipped</option>
        <option value="processing">Processing</option>
        <option value="cancelled">Cancelled</option>
      </select>
      <input type="text" class="search-input" id="searchInput" placeholder="Search orders...">
    </div>
    <button class="action-btn outline" id="exportBtn">Export Orders</button>
  </div>

  <!-- Orders Container -->
  <div class="orders-grid" id="ordersContainer">
    <!-- Orders will be loaded here -->
  </div>

  <!-- Pagination -->
  <div class="pagination" id="pagination">
    <!-- Pagination will be loaded here -->
  </div>
</main>

<!-- Order Details Modal -->
<div class="modal-overlay" id="orderModal">
  <div class="modal">
    <div class="modal-header">
      <h3 id="modalTitle">Order Details</h3>
      <button class="modal-close" onclick="closeModal()">&times;</button>
    </div>
    <div class="modal-body" id="modalBody">
      <!-- Modal content will be injected -->
    </div>
    <div class="modal-footer">
      <button class="action-btn outline" onclick="closeModal()">Close</button>
      <button class="action-btn" id="modalActionBtn">Reorder</button>
    </div>
  </div>
</div>

<script>
// Sample Order Data
const ordersData = [
  {
    id: 'PSC-4820',
    date: '2026-05-14',
    total: 42.00,
    status: 'shipped',
    items: [
      { name: 'Barrier Shield Mist', quantity: 1, price: 42.00, image: 'mist' }
    ],
    shipping: {
      address: 'Plot 12, Khayaban-e-Ittehad, Phase 6, DHA, Karachi',
      method: 'DHL Express',
      tracking: 'JD014600007168020001'
    }
  },
  {
    id: 'PSC-4801',
    date: '2026-05-02',
    total: 58.00,
    status: 'delivered',
    items: [
      { name: 'Calm Restore Serum', quantity: 1, price: 58.00, image: 'serum' }
    ],
    shipping: {
      address: 'Plot 12, Khayaban-e-Ittehad, Phase 6, DHA, Karachi',
      method: 'DHL Express',
      tracking: 'JD014600007168019892'
    }
  },
  {
    id: 'PSC-4789',
    date: '2026-04-18',
    total: 148.00,
    status: 'delivered',
    items: [
      { name: 'The Calm Ritual Set', quantity: 1, price: 148.00, image: 'set' }
    ],
    shipping: {
      address: 'Plot 12, Khayaban-e-Ittehad, Phase 6, DHA, Karachi',
      method: 'DHL Express',
      tracking: 'JD014600007168019100'
    }
  },
  {
    id: 'PSC-4762',
    date: '2026-03-30',
    total: 74.00,
    status: 'delivered',
    items: [
      { name: 'Night Renewal Balm', quantity: 1, price: 74.00, image: 'balm' }
    ],
    shipping: {
      address: 'Plot 12, Khayaban-e-Ittehad, Phase 6, DHA, Karachi',
      method: 'DHL Express',
      tracking: 'JD014600007168018567'
    }
  },
  {
    id: 'PSC-4741',
    date: '2026-03-10',
    total: 65.00,
    status: 'cancelled',
    items: [
      { name: 'Radiance Day Oil', quantity: 1, price: 65.00, image: 'oil' }
    ],
    shipping: {
      address: 'Plot 12, Khayaban-e-Ittehad, Phase 6, DHA, Karachi',
      method: 'DHL Express',
      tracking: 'JD014600007168017234'
    }
  },
  {
    id: 'PSC-4710',
    date: '2026-02-20',
    total: 48.00,
    status: 'delivered',
    items: [
      { name: 'Micro-Probiotic Toner', quantity: 1, price: 48.00, image: 'toner' }
    ],
    shipping: {
      address: 'Plot 12, Khayaban-e-Ittehad, Phase 6, DHA, Karachi',
      method: 'DHL Express',
      tracking: 'JD014600007168016543'
    }
  },
  {
    id: 'PSC-4685',
    date: '2026-02-05',
    total: 42.00,
    status: 'delivered',
    items: [
      { name: 'Barrier Shield Mist', quantity: 1, price: 42.00, image: 'mist' }
    ],
    shipping: {
      address: 'Plot 12, Khayaban-e-Ittehad, Phase 6, DHA, Karachi',
      method: 'DHL Express',
      tracking: 'JD014600007168015432'
    }
  },
  {
    id: 'PSC-4640',
    date: '2026-01-12',
    total: 58.00,
    status: 'processing',
    items: [
      { name: 'Calm Restore Serum', quantity: 1, price: 58.00, image: 'serum' }
    ],
    shipping: {
      address: 'Plot 12, Khayaban-e-Ittehad, Phase 6, DHA, Karachi',
      method: 'DHL Express',
      tracking: 'JD014600007168014321'
    }
  }
];

let currentPage = 1;
const itemsPerPage = 5;

// Helper Functions
function formatDate(dateString) {
  const date = new Date(dateString);
  return date.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
}

function getStatusBadge(status) {
  const statusNames = {
    delivered: 'Delivered',
    shipped: 'Shipped',
    processing: 'Processing',
    cancelled: 'Cancelled'
  };
  return `<span class="order-status ${status}">${statusNames[status] || status}</span>`;
}

// Render Order Card
function renderOrderCard(order) {
  return `
    <div class="order-card" data-order-id="${order.id}">
      <div class="order-header">
        <div class="order-info">
          <span class="order-id">#${order.id}</span>
          <span class="order-date">${formatDate(order.date)}</span>
          <span class="order-total">€${order.total.toFixed(2)}</span>
        </div>
        ${getStatusBadge(order.status)}
      </div>
      
      <div class="order-body">
        <div class="order-products">
          ${order.items.map(item => `
            <div class="order-product">
              <div class="product-image">
                <svg width="24" height="36" viewBox="0 0 80 160">
                  <rect x="14" y="28" width="52" height="118" rx="6" fill="#C4A882" opacity="0.85"/>
                  <rect x="30" y="10" width="20" height="20" rx="3" fill="#C4A882" opacity="0.6"/>
                </svg>
              </div>
              <div class="product-details">
                <div class="product-name">${item.name}</div>
                <div class="product-meta">Qty: ${item.quantity}</div>
              </div>
              <div class="product-price">€${item.price.toFixed(2)}</div>
            </div>
          `).join('')}
        </div>
      </div>
      
      <div class="order-footer">
        <div class="order-actions">
          <button class="action-btn outline" onclick="viewOrder('${order.id}')">View Details</button>
          ${order.status !== 'cancelled' ? `<button class="action-btn" onclick="reorder('${order.id}')">Reorder</button>` : ''}
          ${order.status === 'shipped' ? `<button class="action-btn outline" onclick="trackOrder('${order.id}')">Track Order</button>` : ''}
        </div>
      </div>
    </div>
  `;
}

// Render Orders
function renderOrders() {
  const statusFilter = document.getElementById('statusFilter').value;
  const searchTerm = document.getElementById('searchInput').value.toLowerCase();
  
  let filteredOrders = [...ordersData];
  
  // Apply status filter
  if (statusFilter !== 'all') {
    filteredOrders = filteredOrders.filter(order => order.status === statusFilter);
  }
  
  // Apply search filter
  if (searchTerm) {
    filteredOrders = filteredOrders.filter(order => 
      order.id.toLowerCase().includes(searchTerm) ||
      order.items.some(item => item.name.toLowerCase().includes(searchTerm))
    );
  }
  
  // Pagination
  const totalPages = Math.ceil(filteredOrders.length / itemsPerPage);
  const startIndex = (currentPage - 1) * itemsPerPage;
  const paginatedOrders = filteredOrders.slice(startIndex, startIndex + itemsPerPage);
  
  // Render orders
  const container = document.getElementById('ordersContainer');
  if (paginatedOrders.length === 0) {
    container.innerHTML = `
      <div class="empty-state">
        <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="#9A8F83" stroke-width="1">
          <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/>
          <line x1="3" y1="6" x2="21" y2="6"/>
          <path d="M16 10a4 4 0 0 1-8 0"/>
        </svg>
        <h3>No orders found</h3>
        <p>Try adjusting your filters or start shopping</p>
        <button class="action-btn" onclick="alert('Start shopping')">Shop Now</button>
      </div>
    `;
  } else {
    container.innerHTML = paginatedOrders.map(order => renderOrderCard(order)).join('');
  }
  
  // Render pagination
  renderPagination(totalPages);
}

function renderPagination(totalPages) {
  const paginationContainer = document.getElementById('pagination');
  if (totalPages <= 1) {
    paginationContainer.innerHTML = '';
    return;
  }
  
  let paginationHtml = '';
  for (let i = 1; i <= totalPages; i++) {
    paginationHtml += `
      <button class="page-link ${i === currentPage ? 'active' : ''}" onclick="goToPage(${i})">${i}</button>
    `;
  }
  paginationContainer.innerHTML = paginationHtml;
}

function goToPage(page) {
  currentPage = page;
  renderOrders();
}

// Modal Functions
function viewOrder(orderId) {
  const order = ordersData.find(o => o.id === orderId);
  if (!order) return;
  
  const modal = document.getElementById('orderModal');
  const modalBody = document.getElementById('modalBody');
  const modalActionBtn = document.getElementById('modalActionBtn');
  
  modalBody.innerHTML = `
    <div style="margin-bottom: 1rem;">
      <strong style="font-size: 12px; color: #9A8F83;">Order #${order.id}</strong>
      <div style="font-size: 11px; color: #9A8F83; margin-top: 4px;">Placed on ${formatDate(order.date)}</div>
    </div>
    
    <div style="margin-bottom: 1.5rem;">
      <h4 style="font-size: 13px; margin-bottom: 0.75rem;">Items</h4>
      ${order.items.map(item => `
        <div style="display: flex; justify-content: space-between; padding: 8px 0; border-bottom: 0.5px solid #E2D5C3;">
          <span>${item.name} × ${item.quantity}</span>
          <span>€${item.price.toFixed(2)}</span>
        </div>
      `).join('')}
      <div style="display: flex; justify-content: space-between; padding-top: 12px; margin-top: 8px; font-weight: 600;">
        <span>Total</span>
        <span>€${order.total.toFixed(2)}</span>
      </div>
    </div>
    
    <div style="margin-bottom: 1rem;">
      <h4 style="font-size: 13px; margin-bottom: 0.5rem;">Shipping Address</h4>
      <p style="font-size: 12px; color: #9A8F83; line-height: 1.5;">${order.shipping.address}</p>
    </div>
    
    ${order.shipping.tracking ? `
      <div>
        <h4 style="font-size: 13px; margin-bottom: 0.5rem;">Tracking Number</h4>
        <p style="font-size: 12px; color: #8C6E50;">${order.shipping.tracking}</p>
      </div>
    ` : ''}
  `;
  
  modalActionBtn.onclick = () => reorder(orderId);
  modal.classList.add('active');
}

function closeModal() {
  document.getElementById('orderModal').classList.remove('active');
}

function reorder(orderId) {
  const order = ordersData.find(o => o.id === orderId);
  if (order) {
    alert(`Added ${order.items.length} item(s) to cart`);
  }
  closeModal();
}

function trackOrder(orderId) {
  const order = ordersData.find(o => o.id === orderId);
  if (order) {
    alert(`Tracking order ${order.id}\nTracking #: ${order.shipping.tracking}\nCarrier: ${order.shipping.method}`);
  }
}

// Event Listeners
document.getElementById('statusFilter').addEventListener('change', () => {
  currentPage = 1;
  renderOrders();
});

document.getElementById('searchInput').addEventListener('input', () => {
  currentPage = 1;
  renderOrders();
});

document.getElementById('exportBtn').addEventListener('click', () => {
  alert('Exporting orders as CSV...');
});

// Close modal when clicking outside
document.getElementById('orderModal').addEventListener('click', (e) => {
  if (e.target === document.getElementById('orderModal')) {
    closeModal();
  }
});

// Initialize
renderOrders();
</script>
</body>
</html>