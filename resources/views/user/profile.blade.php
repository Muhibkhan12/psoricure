<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Psoricure - My Profile</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600&display=swap" rel="stylesheet">
  <style>
    * { margin: 0; padding: 0; box-sizing: border-box; }

    body {
      font-family: 'Inter', sans-serif;
      background: #FAF7F2;
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
      --success: #6B8F5E;
      --success-bg: #EEF4EB;
      --danger: #9E5A48;
      --danger-bg: #F9EDEA;
    }

    .main-content {
      margin-left: 240px;
      margin-top: 60px;
      padding: 2rem;
      min-height: calc(100vh - 60px);
    }

    /* Profile Layout */
    .profile-grid {
      display: grid;
      grid-template-columns: 300px 1fr;
      gap: 2rem;
      max-width: 1200px;
      margin: 0 auto;
    }

    /* Sidebar */
    .profile-sidebar {
      background: var(--cream);
      border: 1px solid var(--sand);
      border-radius: 20px;
      padding: 2rem 1.5rem;
      text-align: center;
      height: fit-content;
    }

    .avatar {
      width: 100px;
      height: 100px;
      background: var(--sand-light);
      border-radius: 50%;
      margin: 0 auto 1rem;
      display: flex;
      align-items: center;
      justify-content: center;
      border: 3px solid var(--tan);
    }

    .avatar svg {
      width: 50px;
      height: 50px;
      stroke: var(--bark);
    }

    .profile-sidebar h2 {
      font-size: 1.25rem;
      color: var(--ink);
      margin-bottom: 0.25rem;
    }

    .profile-sidebar .email {
      font-size: 0.75rem;
      color: var(--warm-gray);
      margin-bottom: 1rem;
    }

    .member-since {
      font-size: 0.7rem;
      color: var(--warm-gray);
      padding-top: 1rem;
      border-top: 1px solid var(--sand);
    }

    .stats {
      display: flex;
      justify-content: space-around;
      margin: 1.5rem 0;
      padding: 1rem 0;
      border-top: 1px solid var(--sand);
      border-bottom: 1px solid var(--sand);
    }

    .stat {
      text-align: center;
    }

    .stat .number {
      font-size: 1.5rem;
      font-weight: 700;
      color: var(--bark);
    }

    .stat .label {
      font-size: 0.7rem;
      text-transform: uppercase;
      color: var(--warm-gray);
      margin-top: 0.25rem;
    }

    /* Main Content Area */
    .profile-main {
      background: var(--cream);
      border: 1px solid var(--sand);
      border-radius: 20px;
      padding: 2rem;
    }

    /* Tabs - Pure CSS, no JS */
    .tabs {
      display: flex;
      gap: 0.5rem;
      border-bottom: 1px solid var(--sand);
      margin-bottom: 2rem;
      flex-wrap: wrap;
    }

    .tab-btn {
      padding: 0.75rem 1.5rem;
      font-size: 0.8rem;
      font-weight: 500;
      color: var(--warm-gray);
      cursor: pointer;
      background: none;
      border: none;
      border-bottom: 2px solid transparent;
      transition: all 0.2s;
    }

    .tab-btn:hover {
      color: var(--ink);
    }

    /* Radio hack for tabs - no JavaScript */
    .tab-input {
      display: none;
    }

    .tab-panel {
      display: none;
      animation: fadeIn 0.3s ease;
    }

    #tab1:checked ~ .tabs label[for="tab1"],
    #tab2:checked ~ .tabs label[for="tab2"],
    #tab3:checked ~ .tabs label[for="tab3"] {
      color: var(--bark);
      border-bottom-color: var(--bark);
    }

    #tab1:checked ~ .tab-panels #panel1,
    #tab2:checked ~ .tab-panels #panel2,
    #tab3:checked ~ .tab-panels #panel3 {
      display: block;
    }

    /* Form Styles */
    .form-group {
      margin-bottom: 1.25rem;
    }

    .form-row {
      display: grid;
      grid-template-columns: 1fr 1fr;
      gap: 1rem;
      margin-bottom: 1.25rem;
    }

    label {
      display: block;
      font-size: 0.7rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      color: var(--warm-gray);
      margin-bottom: 0.5rem;
    }

    input, textarea, select {
      width: 100%;
      padding: 0.75rem;
      background: var(--off-white);
      border: 1px solid var(--sand);
      border-radius: 10px;
      font-family: 'Inter', sans-serif;
      font-size: 0.85rem;
      transition: all 0.2s;
    }

    input:focus, textarea:focus, select:focus {
      outline: none;
      border-color: var(--tan);
      box-shadow: 0 0 0 3px rgba(196,168,130,0.1);
    }

    input:disabled {
      background: var(--sand-light);
      color: var(--warm-gray);
    }

    /* Buttons */
    .btn {
      padding: 0.75rem 1.5rem;
      border-radius: 10px;
      font-size: 0.75rem;
      font-weight: 600;
      text-transform: uppercase;
      letter-spacing: 0.08em;
      cursor: pointer;
      border: none;
      transition: all 0.2s;
    }

    .btn-primary {
      background: var(--ink);
      color: var(--cream);
    }

    .btn-primary:hover {
      background: var(--bark-dark);
      transform: translateY(-1px);
    }

    .btn-secondary {
      background: transparent;
      color: var(--warm-gray);
      border: 1px solid var(--sand);
    }

    .btn-secondary:hover {
      background: var(--sand-light);
      color: var(--ink);
    }

    .btn-danger {
      background: var(--danger);
      color: white;
    }

    .btn-danger:hover {
      background: #7a3f32;
    }

    .btn-group {
      display: flex;
      gap: 1rem;
      margin-top: 1.5rem;
    }

    /* Address Cards */
    .address-card {
      background: var(--off-white);
      border: 1px solid var(--sand);
      border-radius: 12px;
      padding: 1rem;
      margin-bottom: 1rem;
      display: flex;
      justify-content: space-between;
      align-items: start;
    }

    .address-info p {
      font-size: 0.8rem;
      color: var(--warm-gray);
      margin-bottom: 0.25rem;
    }

    .address-info strong {
      color: var(--ink);
      font-size: 0.85rem;
    }

    .address-actions {
      display: flex;
      gap: 0.5rem;
    }

    .address-actions button {
      background: none;
      border: none;
      cursor: pointer;
      color: var(--warm-gray);
      font-size: 1rem;
      padding: 0.25rem;
    }

    .address-actions button:hover {
      color: var(--bark);
    }

    .add-address {
      width: 100%;
      margin-top: 1rem;
      padding: 0.75rem;
      background: var(--sand-light);
      border: 1px solid var(--sand);
      border-radius: 12px;
      cursor: pointer;
      font-size: 0.8rem;
      font-weight: 500;
    }

    .add-address:hover {
      background: var(--sand);
    }

    /* Orders Table */
    .orders-table {
      width: 100%;
      border-collapse: collapse;
    }

    .orders-table th {
      text-align: left;
      padding: 0.75rem 0;
      font-size: 0.7rem;
      text-transform: uppercase;
      color: var(--warm-gray);
      border-bottom: 1px solid var(--sand);
    }

    .orders-table td {
      padding: 1rem 0;
      font-size: 0.85rem;
      border-bottom: 1px solid rgba(226,213,195,0.5);
    }

    .status {
      display: inline-block;
      padding: 0.25rem 0.75rem;
      border-radius: 20px;
      font-size: 0.7rem;
      font-weight: 600;
    }

    .status-delivered { background: var(--success-bg); color: var(--success); }
    .status-shipped { background: #FBF3E5; color: #C4903A; }
    .status-processing { background: rgba(196,168,130,0.18); color: var(--bark); }

    /* Alert Messages */
    .alert {
      padding: 0.75rem 1rem;
      border-radius: 10px;
      margin-bottom: 1.5rem;
      font-size: 0.85rem;
    }

    .alert-success {
      background: var(--success-bg);
      color: var(--success);
      border-left: 3px solid var(--success);
    }

    .alert-error {
      background: var(--danger-bg);
      color: var(--danger);
      border-left: 3px solid var(--danger);
    }

    .field-error {
      color: var(--danger);
      font-size: 0.7rem;
      margin-top: 0.25rem;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(10px); }
      to { opacity: 1; transform: translateY(0); }
    }

    /* Responsive */
    @media (max-width: 768px) {
      .main-content {
        margin-left: 0;
        padding: 1rem;
      }
      .profile-grid {
        grid-template-columns: 1fr;
        gap: 1rem;
      }
      .form-row {
        grid-template-columns: 1fr;
      }
      .orders-table {
        font-size: 0.75rem;
      }
      .orders-table th, .orders-table td {
        padding: 0.5rem 0;
      }
    }
  </style>
</head>
<body>

{{-- @include('user.sidebar') --}}

<div class="main-content">
  <!-- Flash Messages -->
  @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
  @endif
  @if(session('error'))
    <div class="alert alert-error">{{ session('error') }}</div>
  @endif

  <div class="profile-grid">
    <!-- Sidebar -->
    <div class="profile-sidebar">
      <div class="avatar">
        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
          <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
          <circle cx="12" cy="7" r="4"/>
        </svg>
      </div>
      <h2>{{ Auth::user()->first_name ?? 'User' }} {{ Auth::user()->last_name ?? '' }}</h2>
      <div class="email">{{ Auth::user()->email ?? 'user@psoricure.com' }}</div>
      
      <div class="stats">
        <div class="stat">
          <div class="number" id="orderCount">0</div>
          <div class="label">Orders</div>
        </div>
        <div class="stat">
          <div class="number" id="totalSpent">€0</div>
          <div class="label">Spent</div>
        </div>
      </div>
      
      <div class="member-since">
        Member since {{ Auth::user()->created_at ? Auth::user()->created_at->format('M Y') : 'Jan 2024' }}
      </div>
    </div>

    <!-- Main Content - Pure CSS Tabs (No JavaScript) -->
    <div class="profile-main">
      <input type="radio" name="tab" id="tab1" class="tab-input" checked>
      <input type="radio" name="tab" id="tab2" class="tab-input">
      <input type="radio" name="tab" id="tab3" class="tab-input">
      
      <div class="tabs">
        <label for="tab1" class="tab-btn">Personal Info</label>
        <label for="tab2" class="tab-btn">Addresses</label>
        <label for="tab3" class="tab-btn">Order History</label>
      </div>
      
      <div class="tab-panels">
        <!-- Panel 1: Personal Info -->
        {{-- <div id="panel1" class="tab-panel">
          <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')
            
            <div class="form-row">
              <div class="form-group">
                <label>First Name</label>
                <input type="text" name="first_name" value="{{ old('first_name', Auth::user()->first_name ?? '') }}" required>
                @error('first_name') <div class="field-error">{{ $message }}</div> @enderror
              </div>
              <div class="form-group">
                <label>Last Name</label>
                <input type="text" name="last_name" value="{{ old('last_name', Auth::user()->last_name ?? '') }}" required>
                @error('last_name') <div class="field-error">{{ $message }}</div> @enderror
              </div>
            </div>
            
            <div class="form-group">
              <label>Email Address</label>
              <input type="email" name="email" value="{{ old('email', Auth::user()->email ?? '') }}" required>
              @error('email') <div class="field-error">{{ $message }}</div> @enderror
            </div>
            
            <div class="form-group">
              <label>Phone Number</label>
              <input type="tel" name="phone" value="{{ old('phone', Auth::user()->phone ?? '') }}" placeholder="+1 234 567 8900">
            </div>
            
            <div class="btn-group">
              <button type="submit" class="btn btn-primary">Save Changes</button>
            </div>
          </form>
        </div> --}}
        
        <!-- Panel 2: Addresses -->
        <div id="panel2" class="tab-panel">
          <div id="addressesList">
            @php
              $addresses = Auth::user()->addresses ?? [];
            @endphp
            
            @forelse($addresses as $address)
              <div class="address-card">
                <div class="address-info">
                  <p><strong>{{ $address->line1 }}</strong>@if($address->line2), {{ $address->line2 }}@endif</p>
                  <p>{{ $address->city }}, {{ $address->postal_code }}</p>
                  <p>{{ $address->country }}</p>
                  <p>{{ $address->phone }}</p>
                </div>
                {{-- <div class="address-actions">
                  <form method="POST" action="{{ route('address.delete', $address->id) }}" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Delete this address?')">🗑</button>
                  </form>
                </div> --}}
              </div>
            @empty
              <p style="text-align: center; color: var(--warm-gray); padding: 2rem;">No addresses saved yet.</p>
            @endforelse
          </div>
          
          {{-- <form method="POST" action="{{ route('address.store') }}">
            @csrf
            <div class="form-group">
              <label>Address Line 1</label>
              <input type="text" name="line1" required>
            </div>
            <div class="form-group">
              <label>Address Line 2 (Optional)</label>
              <input type="text" name="line2">
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>City</label>
                <input type="text" name="city" required>
              </div>
              <div class="form-group">
                <label>Postal Code</label>
                <input type="text" name="postal_code" required>
              </div>
            </div>
            <div class="form-row">
              <div class="form-group">
                <label>Country</label>
                <select name="country" required>
                  <option value="">Select Country</option>
                  <option value="USA">United States</option>
                  <option value="UK">United Kingdom</option>
                  <option value="Canada">Canada</option>
                  <option value="Australia">Australia</option>
                  <option value="Germany">Germany</option>
                  <option value="France">France</option>
                </select>
              </div>
              <div class="form-group">
                <label>Phone</label>
                <input type="tel" name="phone" required>
              </div>
            </div>
            <button type="submit" class="add-address">+ Add New Address</button>
          </form> --}}
        </div>
        
        <!-- Panel 3: Order History -->
        <div id="panel3" class="tab-panel">
          <table class="orders-table">
            <thead>
              <tr>
                <th>Order ID</th>
                <th>Date</th>
                <th>Total</th>
                <th>Status</th>
                <th></th>
              </tr>
            </thead>
            <tbody>
              @php
                $orders = Auth::user()->orders ?? [];
              @endphp
              
              @forelse($orders as $order)
                <tr>
                  <td><strong style="color: var(--bark);">#{{ $order->id }}</strong></td>
                  <td>{{ $order->created_at->format('M d, Y') }}</td>
                  <td>€{{ number_format($order->total, 2) }}</td>
                  <td>
                    <span class="status status-{{ $order->status }}">
                      {{ ucfirst($order->status) }}
                    </span>
                  </td>
                  <td>
                    <a href="{{ route('order.show', $order->id) }}" style="color: var(--bark); text-decoration: none;">View →</a>
                  </td>
                </tr>
              @empty
                <tr>
                  <td colspan="5" style="text-align: center; padding: 2rem; color: var(--warm-gray);">
                    No orders yet. Start shopping!
                  </td>
                </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Minimal JavaScript only for dynamic counters -->
<script>
  // Only used for updating stats - minimal JS
  document.addEventListener('DOMContentLoaded', function() {
    // Update order count and total spent from actual order data
    const orders = @json($orders ?? []);
    const orderCount = document.getElementById('orderCount');
    const totalSpent = document.getElementById('totalSpent');
    
    if (orderCount && orders) {
      orderCount.textContent = orders.length;
    }
    
    if (totalSpent && orders) {
      const total = orders.reduce((sum, order) => sum + parseFloat(order.total || 0), 0);
      totalSpent.textContent = `€${total.toLocaleString()}`;
    }
  });
</script>
</body>
</html>