@include('admin.sidebar');

<style>
  @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap');

  .main-content {
    margin-left: 240px;
    margin-top: 60px;
    flex: 1;
    background: #FAF7F2;
    min-height: calc(100vh - 60px);
  }
  
  .content-scroll {
    padding: 2rem;
    overflow-y: auto;
    height: 100%;
  }

  :root {
    --cream: #F5EFE4;
    --sand: #E2D5C3;
    --bark: #8C6E50;
    --ink: #1C1917;
    --off-white: #FAF7F2;
    --warm-gray: #9A8F83;
    --success: #6B8F5E;
    --danger: #9E5A48;
  }

  .form-container {
    max-width: 1200px;
    margin: 0 auto;
  }
  
  .welcome-banner {
    background: linear-gradient(135deg, #1C1917 0%, #2E2A26 100%);
    border-radius: 20px;
    padding: 2rem 2.5rem;
    margin-bottom: 2rem;
  }
  
  .welcome-banner h1 {
    font-family: 'Inter', sans-serif;
    font-size: 32px;
    font-weight: 700;
    color: #F5EFE4;
    margin-bottom: 0.5rem;
  }
  
  .welcome-banner p {
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    color: rgba(245,239,228,0.7);
  }
  
  .form-card {
    background: var(--cream);
    border: 1px solid var(--sand);
    border-radius: 24px;
    padding: 2.5rem;
  }
  
  .form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 2rem;
  }
  
  .form-section {
    background: var(--off-white);
    border-radius: 16px;
    padding: 1.5rem;
  }
  
  .section-title {
    font-family: 'Inter', sans-serif;
    font-size: 16px;
    font-weight: 700;
    color: var(--ink);
    margin-bottom: 0.25rem;
  }
  
  .section-subtitle {
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    color: var(--warm-gray);
    margin-bottom: 1.5rem;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid var(--sand);
  }
  
  .form-group {
    margin-bottom: 1.25rem;
  }
  
  label {
    display: block;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 0.5rem;
  }
  
  .required::after {
    content: '*';
    color: var(--danger);
    margin-left: 4px;
  }
  
  input, textarea, select {
    width: 100%;
    padding: 0.75rem 1rem;
    background: var(--off-white);
    border: 1.5px solid var(--sand);
    border-radius: 12px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
  }
  
  input:focus, textarea:focus, select:focus {
    outline: none;
    border-color: var(--bark);
  }
  
  textarea {
    resize: vertical;
    min-height: 120px;
  }
  
  .slug-preview {
    font-size: 12px;
    color: var(--warm-gray);
    margin-top: 0.5rem;
  }
  
  .slug-preview span {
    color: var(--bark);
    background: rgba(196,168,130,0.1);
    padding: 2px 6px;
    border-radius: 4px;
  }
  
  .image-upload {
    border: 2px dashed var(--sand);
    border-radius: 16px;
    padding: 2rem;
    text-align: center;
    cursor: pointer;
    background: var(--off-white);
  }
  
  .image-upload:hover {
    border-color: var(--bark);
    background: rgba(196,168,130,0.05);
  }
  
  .image-upload svg {
    width: 48px;
    height: 48px;
    stroke: var(--warm-gray);
    margin-bottom: 0.5rem;
  }
  
  .image-preview {
    margin-top: 1rem;
    text-align: center;
  }
  
  .image-preview img {
    max-width: 150px;
    max-height: 150px;
    border-radius: 12px;
    border: 2px solid var(--sand);
  }
  
  .status-group {
    display: flex;
    gap: 2rem;
    align-items: center;
    flex-wrap: wrap;
  }
  
  .status-option {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
  }
  
  .status-option input {
    width: 18px;
    height: 18px;
    accent-color: var(--bark);
  }
  
  .form-actions {
    display: flex;
    justify-content: flex-end;
    gap: 1rem;
    margin-top: 2rem;
    padding-top: 1.5rem;
    border-top: 1px solid var(--sand);
  }
  
  .btn-primary {
    background: var(--ink);
    color: var(--cream);
    border: none;
    padding: 0.75rem 2rem;
    border-radius: 40px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
  }
  
  .btn-primary:hover {
    background: var(--bark);
  }
  
  .btn-secondary {
    background: transparent;
    color: var(--ink);
    border: 1.5px solid var(--sand);
    padding: 0.75rem 2rem;
    border-radius: 40px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
  }
  
  .btn-secondary:hover {
    background: rgba(226,213,195,0.3);
  }
  
  /* Alert Messages */
  .alert {
    padding: 1rem 1.5rem;
    border-radius: 12px;
    margin-bottom: 1.5rem;
    font-weight: 500;
  }
  
  .alert-success {
    background: var(--success);
    color: white;
  }
  
  .alert-error {
    background: var(--danger);
    color: white;
  }
  
  @media (max-width: 1024px) {
    .form-grid {
      grid-template-columns: 1fr;
      gap: 1.5rem;
    }
    .main-content {
      margin-left: 0;
    }
  }
  
  @media (max-width: 768px) {
    .content-scroll {
      padding: 1rem;
    }
    .form-card {
      padding: 1.5rem;
    }
    .welcome-banner {
      padding: 1.5rem;
    }
    .welcome-banner h1 {
      font-size: 24px;
    }
    .form-actions {
      flex-direction: column;
    }
    .btn-primary, .btn-secondary {
      width: 100%;
      text-align: center;
    }
  }
</style>

<section class="main-content">
  <div class="content-scroll">
    <div class="form-container">
      <div class="welcome-banner">
        <h1>Add New Product</h1>
        <p>Create a new product for your store</p>
      </div>

      <!-- Display Laravel Session Messages -->
      @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
      @endif
      
      @if(session('error'))
        <div class="alert alert-error">{{ session('error') }}</div>
      @endif
      
      @if($errors->any())
        @foreach($errors->all() as $error)
          <div class="alert alert-error">{{ $error }}</div>
        @endforeach
      @endif

      <form class="form-card" method="POST" action="{{ route('add-products') }}" enctype="multipart/form-data">
        @csrf
        
        <div class="form-grid">
          <!-- Left Column -->
          <div>
            <div class="form-section">
              <div class="section-title">Basic Information</div>
              <div class="section-subtitle">Product details</div>
              
              <div class="form-group">
                <label class="required">Product Name</label>
                <input type="text" name="name" id="name" placeholder="e.g., Calm Restore Serum" value="{{ old('name') }}" required>
              </div>
              
              <div class="form-group">
                <label class="required">Slug</label>
                <input type="text" name="slug" id="slug" placeholder="calm-restore-serum" value="{{ old('slug') }}" required>
                <div class="slug-preview">Preview: <span id="slugPreview">/product/</span></div>
              </div>
              
              <div class="form-group">
                <label>Description</label>
                <textarea name="description" placeholder="Write a detailed description...">{{ old('description') }}</textarea>
              </div>
            </div>
          </div>
          
          <!-- Right Column -->
          <div>
            <div class="form-section">
              <div class="section-title">Pricing & Inventory</div>
              <div class="section-subtitle">Set price and stock</div>
              
              <div class="form-group">
                <label class="required">Price (€)</label>
                <input type="number" name="price" step="0.01" placeholder="0.00" value="{{ old('price') }}" required>
              </div>
              
              <div class="form-group">
                <label class="required">Stock Quantity</label>
                <input type="number" name="stock" placeholder="0" value="{{ old('stock') }}" required>
              </div>
              
              <div class="form-group">
                <label class="required">Status</label>
                <div class="status-group">
                  <label class="status-option">
                    <input type="radio" name="status" value="active" {{ old('status', 'active') == 'active' ? 'checked' : '' }}>
                    <span>Active</span>
                  </label>
                  <label class="status-option">
                    <input type="radio" name="status" value="draft" {{ old('status') == 'draft' ? 'checked' : '' }}>
                    <span>Draft</span>
                  </label>
                </div>
              </div>
            </div>
            
            <div class="form-section" style="margin-top: 1.5rem;">
              <div class="section-title">Product Media</div>
              <div class="section-subtitle">Upload product image</div>
              
              <div class="form-group">
                <label>Product Image</label>
                <div class="image-upload" onclick="document.getElementById('imageInput').click()">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                    <circle cx="8.5" cy="8.5" r="1.5"/>
                    <polyline points="21 15 16 10 5 21"/>
                  </svg>
                  <p>Click to upload image</p>
                  <small>PNG, JPG up to 5MB</small>
                  <input type="file" name="image" id="imageInput" accept="image/*" style="display:none" onchange="previewImage(this)">
                </div>
                <div id="imagePreview" class="image-preview"></div>
              </div>
            </div>
          </div>
        </div>
        
        <div class="form-actions">
          <button type="button" class="btn-secondary" onclick="window.location.href='{{ url('admin/dashboard') }}'">Cancel</button>
          <button type="submit" class="btn-primary">Create Product</button>
        </div>
      </form>
    </div>
  </div>
</section>

<script>
  // Generate slug from name
  const nameField = document.getElementById('name');
  const slugField = document.getElementById('slug');
  const slugPreview = document.getElementById('slugPreview');
  
  if (nameField && slugField) {
    nameField.addEventListener('input', function() {
      let slug = this.value.toLowerCase()
        .replace(/[^a-z0-9]+/g, '-')
        .replace(/^-|-$/g, '');
      slugField.value = slug;
      if (slugPreview) {
        slugPreview.textContent = '/product/' + (slug || 'product-slug');
      }
    });
  }
  
  if (slugField && slugPreview) {
    slugField.addEventListener('input', function() {
      slugPreview.textContent = '/product/' + (this.value || 'product-slug');
    });
    // Initialize
    slugPreview.textContent = '/product/' + (slugField.value || 'product-slug');
  }
  
  // Image preview
  function previewImage(input) {
    const preview = document.getElementById('imagePreview');
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.innerHTML = '<img src="' + e.target.result + '" alt="Preview">';
      };
      reader.readAsDataURL(input.files[0]);
    } else {
      preview.innerHTML = '';
    }
  }
</script>