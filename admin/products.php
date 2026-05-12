<?php
// create-product.php - Product Creation Page
include('sidebar.php');
?>

<style>
  /* Import the same sans-serif font as dashboard */
  @import url('https://fonts.googleapis.com/css2?family=Inter:opsz,wght@14..32,300;14..32,400;14..32,500;14..32,600;14..32,700;14..32,800&display=swap');

  /* Main Content Override - ensures space for sidebar and header */
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

  /* Product Form Specific Styles */
  .form-container {
    max-width: 1400px;
    margin: 0 auto;
  }
  
  /* Welcome Banner */
  .welcome-banner {
    background: linear-gradient(135deg, #1C1917 0%, #2E2A26 100%);
    border-radius: 20px;
    padding: 2rem;
    margin-bottom: 1.5rem;
    position: relative;
    overflow: hidden;
  }
  
  .welcome-banner::before {
    content: '';
    position: absolute;
    top: -50%;
    right: -20%;
    width: 300px;
    height: 300px;
    background: radial-gradient(circle, rgba(196,168,130,0.15) 0%, transparent 70%);
    border-radius: 50%;
  }
  
  .welcome-banner h1 {
    font-family: 'Inter', sans-serif;
    font-size: 28px;
    font-weight: 700;
    color: #F5EFE4;
    margin-bottom: 0.5rem;
    letter-spacing: -0.02em;
  }
  
  .welcome-banner p {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: rgba(245,239,228,0.7);
    font-weight: 500;
  }
  
  .form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 1.5rem;
  }
  
  .form-section {
    background: var(--cream);
    border: 0.5px solid var(--sand);
    border-radius: 16px;
    padding: 1.75rem;
    margin-bottom: 1.5rem;
    transition: all 0.3s ease;
  }
  
  .form-section:hover {
    box-shadow: 0 8px 24px rgba(0,0,0,0.06);
    border-color: var(--tan);
  }
  
  .section-title {
    font-family: 'Inter', sans-serif;
    font-size: 18px;
    font-weight: 700;
    margin-bottom: 0.25rem;
    color: var(--ink);
    letter-spacing: -0.01em;
  }
  
  .section-subtitle {
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    color: var(--warm-gray);
    margin-bottom: 1.5rem;
    padding-bottom: 0.75rem;
    border-bottom: 1px solid var(--sand);
    font-weight: 500;
  }
  
  .form-row {
    margin-bottom: 1.5rem;
  }
  
  label {
    display: block;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 600;
    color: var(--ink);
    margin-bottom: 0.5rem;
  }
  
  .label-required::after {
    content: '*';
    color: var(--danger);
    margin-left: 4px;
  }
  
  input, textarea, select {
    width: 100%;
    padding: 0.875rem 1.125rem;
    background: var(--off-white);
    border: 1.5px solid var(--sand);
    border-radius: 12px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 500;
    color: var(--ink);
    transition: all 0.2s;
  }
  
  input:hover, textarea:hover, select:hover {
    border-color: var(--tan);
  }
  
  input:focus, textarea:focus, select:focus {
    outline: none;
    border-color: var(--bark);
    box-shadow: 0 0 0 3px rgba(140,110,80,0.1);
  }
  
  textarea {
    resize: vertical;
    min-height: 120px;
  }
  
  /* Image Upload Area */
  .image-upload-area {
    border: 2px dashed var(--sand);
    border-radius: 14px;
    padding: 2rem;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s;
    background: var(--off-white);
  }
  
  .image-upload-area:hover {
    border-color: var(--tan);
    background: rgba(196,168,130,0.08);
    transform: scale(0.98);
  }
  
  .image-upload-area svg {
    width: 48px;
    height: 48px;
    stroke: var(--warm-gray);
    margin-bottom: 1rem;
    transition: all 0.3s;
  }
  
  .image-upload-area:hover svg {
    stroke: var(--bark);
    transform: translateY(-4px);
  }
  
  .image-upload-area p {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    font-weight: 500;
    color: var(--ink);
  }
  
  .image-preview {
    display: flex;
    gap: 1rem;
    flex-wrap: wrap;
    margin-top: 1rem;
  }
  
  .preview-item {
    position: relative;
    width: 100px;
    height: 100px;
    border-radius: 12px;
    overflow: hidden;
    border: 2px solid var(--sand);
    transition: all 0.2s;
  }
  
  .preview-item:hover {
    transform: scale(1.05);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
  }
  
  .preview-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }
  
  .preview-item .remove-btn {
    position: absolute;
    top: 6px;
    right: 6px;
    width: 22px;
    height: 22px;
    background: var(--danger);
    color: white;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    font-size: 14px;
    font-weight: bold;
    transition: all 0.2s;
  }
  
  .preview-item .remove-btn:hover {
    transform: scale(1.1);
    background: #c0392b;
  }
  
  /* Tags Input */
  .tags-input-container {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
    padding: 0.625rem;
    background: var(--off-white);
    border: 1.5px solid var(--sand);
    border-radius: 12px;
    min-height: 52px;
    transition: all 0.2s;
  }
  
  .tags-input-container:focus-within {
    border-color: var(--bark);
    box-shadow: 0 0 0 3px rgba(140,110,80,0.1);
  }
  
  .tag {
    background: var(--bark);
    color: white;
    padding: 0.375rem 0.875rem;
    border-radius: 20px;
    font-family: 'Inter', sans-serif;
    font-size: 12px;
    font-weight: 500;
    display: flex;
    align-items: center;
    gap: 0.5rem;
    transition: all 0.2s;
  }
  
  .tag:hover {
    transform: translateY(-2px);
    box-shadow: 0 2px 8px rgba(140,110,80,0.3);
  }
  
  .tag .remove-tag {
    cursor: pointer;
    font-weight: bold;
    font-size: 16px;
    transition: all 0.2s;
  }
  
  .tag .remove-tag:hover {
    transform: scale(1.2);
  }
  
  .tags-input {
    border: none;
    outline: none;
    padding: 0.375rem;
    flex: 1;
    min-width: 120px;
    background: transparent;
    font-family: 'Inter', sans-serif;
    font-size: 13px;
  }
  
  /* Status Toggle */
  .status-toggle {
    display: flex;
    gap: 1.5rem;
    align-items: center;
  }
  
  .status-option {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    cursor: pointer;
    padding: 0.5rem 1rem;
    border-radius: 40px;
    transition: all 0.2s;
  }
  
  .status-option:hover {
    background: rgba(196,168,130,0.1);
  }
  
  .status-option input {
    width: 18px;
    height: 18px;
    cursor: pointer;
    accent-color: var(--bark);
  }
  
  .status-badge {
    display: inline-block;
    width: 10px;
    height: 10px;
    border-radius: 50%;
    margin-right: 6px;
  }
  
  .status-badge.active {
    background: var(--success);
    box-shadow: 0 0 0 2px rgba(107,143,94,0.2);
  }
  
  .status-badge.draft {
    background: var(--warning);
    box-shadow: 0 0 0 2px rgba(196,144,58,0.2);
  }
  
  /* Stock Input */
  .stock-input-group {
    display: flex;
    gap: 1rem;
    align-items: center;
    flex-wrap: wrap;
  }
  
  .stock-input-group input {
    width: 180px;
  }
  
  .stock-type {
    display: flex;
    gap: 1.25rem;
    align-items: center;
    flex-wrap: wrap;
  }
  
  .stock-type label {
    display: inline-flex;
    align-items: center;
    gap: 0.5rem;
    margin: 0;
    font-weight: 500;
    cursor: pointer;
    padding: 0.25rem 0;
  }
  
  .stock-type input {
    width: 16px;
    height: 16px;
    accent-color: var(--bark);
  }
  
  /* Form Actions */
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
    padding: 0.875rem 2rem;
    border-radius: 40px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
    letter-spacing: 0.02em;
  }
  
  .btn-primary:hover {
    background: var(--bark);
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(28,25,23,0.2);
  }
  
  .btn-primary:active {
    transform: translateY(0);
  }
  
  .btn-secondary {
    background: transparent;
    color: var(--ink);
    border: 1.5px solid var(--sand);
    padding: 0.875rem 2rem;
    border-radius: 40px;
    font-family: 'Inter', sans-serif;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s;
  }
  
  .btn-secondary:hover {
    background: rgba(226,213,195,0.3);
    border-color: var(--tan);
    transform: translateY(-2px);
  }
  
  /* Slug Preview */
  .slug-preview {
    font-family: 'Inter', sans-serif;
    font-size: 11px;
    color: var(--warm-gray);
    margin-top: 0.5rem;
    font-weight: 500;
  }
  
  .slug-preview span {
    color: var(--bark);
    font-family: monospace;
    font-weight: 600;
    background: rgba(196,168,130,0.1);
    padding: 2px 6px;
    border-radius: 6px;
  }
  
  /* Page Header */
  .page-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 0.5rem;
  }
  
  .page-title {
    font-family: 'Inter', sans-serif;
    font-size: 28px;
    font-weight: 700;
    color: var(--ink);
    letter-spacing: -0.02em;
  }
  
  .page-breadcrumb {
    font-family: 'Inter', sans-serif;
    font-size: 13px;
    color: #9A8F83;
    letter-spacing: 0.02em;
    font-weight: 500;
  }
  
  /* Select dropdown styling */
  select {
    appearance: none;
    background-image: url("data:image/svg+xml;charset=UTF-8,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 24 24' fill='none' stroke='%238C6E50' stroke-width='2' stroke-linecap='round' stroke-linejoin='round'%3e%3cpolyline points='6 9 12 15 18 9'%3e%3c/polyline%3e%3c/svg%3e");
    background-repeat: no-repeat;
    background-position: right 1rem center;
    background-size: 1.2em;
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
    .welcome-banner h1 {
      font-size: 24px;
    }
  }
  
  @media (max-width: 768px) {
    .content-scroll {
      padding: 1rem;
    }
    .form-grid {
      grid-template-columns: 1fr;
    }
    .stock-input-group {
      flex-direction: column;
      align-items: flex-start;
    }
    .welcome-banner {
      padding: 1.5rem;
    }
    .welcome-banner h1 {
      font-size: 22px;
    }
    .page-title {
      font-size: 24px;
    }
  }
  
  @media (max-width: 480px) {
    .content-scroll {
      padding: 0.75rem;
    }
    .form-section {
      padding: 1rem;
    }
    .form-actions {
      flex-direction: column-reverse;
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
      <!-- Welcome Banner -->
      <div class="welcome-banner fade-in">
        <h1>Create New Product</h1>
        <p>Fill in the details below to add a new product to your catalog</p>
      </div>

      <!-- Product Form -->
      <form id="productForm" onsubmit="return handleSubmit(event)">
        <div class="form-grid">
          <!-- Left Column -->
          <div>
            <!-- Basic Information -->
            <div class="form-section fade-in">
              <div class="section-title">Basic Information</div>
              <div class="section-subtitle">Product details and identification</div>
              
              <div class="form-row">
                <label class="label-required">Product Name</label>
                <input type="text" id="productName" placeholder="e.g., Calm Restore Serum" onkeyup="generateSlug()" required>
              </div>
              
              <div class="form-row">
                <label class="label-required">Slug</label>
                <input type="text" id="productSlug" placeholder="calm-restore-serum" required>
                <div class="slug-preview">Preview: <span id="slugPreview">your-domain.com/products/</span></div>
              </div>
              
              <div class="form-row">
                <label class="label-required">Price (€)</label>
                <input type="number" id="productPrice" step="0.01" placeholder="0.00" required>
              </div>
              
              <div class="form-row">
                <label>Description</label>
                <textarea id="productDescription" placeholder="Write a detailed description of your product..."></textarea>
              </div>
            </div>
            
            <!-- Media -->
            <div class="form-section fade-in">
              <div class="section-title">Media</div>
              <div class="section-subtitle">Product images and gallery</div>
              
              <div class="form-row">
                <label class="label-required">Main Image</label>
                <div class="image-upload-area" onclick="document.getElementById('mainImageInput').click()">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                    <circle cx="8.5" cy="8.5" r="1.5"/>
                    <polyline points="21 15 16 10 5 21"/>
                  </svg>
                  <p>Click to upload main image</p>
                  <small style="color:var(--warm-gray);">PNG, JPG up to 5MB</small>
                  <input type="file" id="mainImageInput" accept="image/*" style="display:none" onchange="previewMainImage(this)">
                </div>
                <div id="mainImagePreview" class="image-preview"></div>
              </div>
              
              <div class="form-row">
                <label>Gallery Images</label>
                <div class="image-upload-area" onclick="document.getElementById('galleryImagesInput').click()">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
                    <rect x="3" y="3" width="18" height="18" rx="2" ry="2"/>
                    <circle cx="8.5" cy="8.5" r="1.5"/>
                    <polyline points="21 15 16 10 5 21"/>
                    <line x1="16" y1="3" x2="21" y2="8"/>
                    <line x1="21" y1="3" x2="16" y2="8"/>
                  </svg>
                  <p>Click to upload gallery images</p>
                  <small style="color:var(--warm-gray);">Multiple images allowed</small>
                  <input type="file" id="galleryImagesInput" accept="image/*" multiple style="display:none" onchange="previewGalleryImages(this)">
                </div>
                <div id="galleryImagesPreview" class="image-preview"></div>
              </div>
            </div>
          </div>
          
          <!-- Right Column -->
          <div>
            <!-- Product Details -->
            <div class="form-section fade-in">
              <div class="section-title">Product Details</div>
              <div class="section-subtitle">Categorization and attributes</div>
              
              <div class="form-row">
                <label>Skin Type</label>
                <select id="skinType">
                  <option value="">Select skin type</option>
                  <option value="all">All Skin Types</option>
                  <option value="dry">Dry Skin</option>
                  <option value="oily">Oily Skin</option>
                  <option value="combination">Combination Skin</option>
                  <option value="sensitive">Sensitive Skin</option>
                  <option value="normal">Normal Skin</option>
                </select>
              </div>
              
              <div class="form-row">
                <label>Ingredients</label>
                <div class="tags-input-container" id="ingredientsContainer">
                  <div class="tags-list" id="ingredientsList"></div>
                  <input type="text" class="tags-input" id="ingredientsInput" placeholder="Type ingredient and press Enter...">
                </div>
              </div>
              
              <div class="form-row">
                <label>Benefits</label>
                <div class="tags-input-container" id="benefitsContainer">
                  <div class="tags-list" id="benefitsList"></div>
                  <input type="text" class="tags-input" id="benefitsInput" placeholder="Type benefit and press Enter...">
                </div>
              </div>
            </div>
            
            <!-- Usage Instructions -->
            <div class="form-section fade-in">
              <div class="section-title">Usage Instructions</div>
              <div class="section-subtitle">How customers should use this product</div>
              
              <div class="form-row">
                <label>How to Use</label>
                <textarea id="howToUse" placeholder="Step by step instructions on how to use the product..."></textarea>
              </div>
            </div>
            
            <!-- Inventory & Status -->
            <div class="form-section fade-in">
              <div class="section-title">Inventory & Status</div>
              <div class="section-subtitle">Stock management and product visibility</div>
              
              <div class="form-row">
                <label>Stock</label>
                <div class="stock-input-group">
                  <input type="number" id="stockQuantity" placeholder="Quantity">
                  <div class="stock-type">
                    <label>
                      <input type="radio" name="stockType" value="in_stock" checked> In Stock
                    </label>
                    <label>
                      <input type="radio" name="stockType" value="out_of_stock"> Out of Stock
                    </label>
                    <label>
                      <input type="radio" name="stockType" value="pre_order"> Pre-Order
                    </label>
                  </div>
                </div>
              </div>
              
              <div class="form-row">
                <label>Status</label>
                <div class="status-toggle">
                  <label class="status-option">
                    <input type="radio" name="productStatus" value="active" checked>
                    <span class="status-badge active"></span>
                    <span>Active</span>
                  </label>
                  <label class="status-option">
                    <input type="radio" name="productStatus" value="draft">
                    <span class="status-badge draft"></span>
                    <span>Draft</span>
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Form Actions -->
        <div class="form-actions">
          <button type="button" class="btn-secondary" onclick="window.location.href='products.php'">Cancel</button>
          <button type="submit" class="btn-primary">Create Product</button>
        </div>
      </form>
    </div>
  </div>
</section>

<script>
  let ingredientsList = [];
  let benefitsList = [];
  
  function generateSlug() {
    const name = document.getElementById('productName').value;
    const slug = name.toLowerCase()
      .replace(/[^a-z0-9]+/g, '-')
      .replace(/^-|-$/g, '');
    document.getElementById('productSlug').value = slug;
    updateSlugPreview();
  }
  
  function updateSlugPreview() {
    const slug = document.getElementById('productSlug').value;
    document.getElementById('slugPreview').innerHTML = 'your-domain.com/products/' + slug;
  }
  
  document.getElementById('productSlug').addEventListener('input', updateSlugPreview);
  
  function handleTagAdd(event, type) {
    if (event.key === 'Enter') {
      event.preventDefault();
      const input = document.getElementById(`${type}Input`);
      const value = input.value.trim();
      
      if (value && !window[`${type}List`].includes(value)) {
        window[`${type}List`].push(value);
        renderTags(type);
        input.value = '';
      }
    }
  }
  
  function renderTags(type) {
    const container = document.getElementById(`${type}List`);
    const list = window[`${type}List`];
    container.innerHTML = list.map((tag, index) => `
      <div class="tag">
        ${tag}
        <span class="remove-tag" onclick="removeTag('${type}', ${index})">×</span>
      </div>
    `).join('');
  }
  
  function removeTag(type, index) {
    window[`${type}List`].splice(index, 1);
    renderTags(type);
  }
  
  document.getElementById('ingredientsInput').addEventListener('keypress', (e) => handleTagAdd(e, 'ingredients'));
  document.getElementById('benefitsInput').addEventListener('keypress', (e) => handleTagAdd(e, 'benefits'));
  
  function previewMainImage(input) {
    const preview = document.getElementById('mainImagePreview');
    if (input.files && input.files[0]) {
      const reader = new FileReader();
      reader.onload = function(e) {
        preview.innerHTML = `
          <div class="preview-item">
            <img src="${e.target.result}" alt="Main Image">
            <div class="remove-btn" onclick="removeMainImage()">×</div>
          </div>
        `;
      };
      reader.readAsDataURL(input.files[0]);
    }
  }
  
  function removeMainImage() {
    document.getElementById('mainImagePreview').innerHTML = '';
    document.getElementById('mainImageInput').value = '';
  }
  
  function previewGalleryImages(input) {
    const preview = document.getElementById('galleryImagesPreview');
    const files = Array.from(input.files);
    
    files.forEach((file) => {
      const reader = new FileReader();
      reader.onload = function(e) {
        const div = document.createElement('div');
        div.className = 'preview-item';
        div.innerHTML = `
          <img src="${e.target.result}" alt="Gallery Image">
          <div class="remove-btn" onclick="this.parentElement.remove()">×</div>
        `;
        preview.appendChild(div);
      };
      reader.readAsDataURL(file);
    });
  }
  
  function handleSubmit(event) {
    event.preventDefault();
    
    const productData = {
      name: document.getElementById('productName').value,
      slug: document.getElementById('productSlug').value,
      price: parseFloat(document.getElementById('productPrice').value),
      description: document.getElementById('productDescription').value,
      main_image: document.getElementById('mainImageInput').files[0]?.name || null,
      gallery_images: Array.from(document.getElementById('galleryImagesInput').files).map(f => f.name),
      skin_type: document.getElementById('skinType').value,
      ingredients: ingredientsList,
      benefits: benefitsList,
      how_to_use: document.getElementById('howToUse').value,
      stock: {
        quantity: parseInt(document.getElementById('stockQuantity').value) || 0,
        status: document.querySelector('input[name="stockType"]:checked').value
      },
      status: document.querySelector('input[name="productStatus"]:checked').value,
      created_at: new Date().toISOString()
    };
    
    if (!productData.name || !productData.slug || !productData.price) {
      alert('Please fill in all required fields (Name, Slug, Price)');
      return false;
    }
    
    console.log('Product Data:', productData);
    alert('Product created successfully!\n\nCheck console for complete data.');
    return false;
  }
  
  updateSlugPreview();
</script>