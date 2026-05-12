<?php
// header.php - Copy this entire file to your includes folder
?>
<style>
    /* Root variables for consistent theming */
    :root {
        --cream: #F5EFE4;
        --sand: #E2D5C3;
        --tan: #C4A882;
        --bark: #8C6E50;
        --ink: #1C1917;
        --off-white: #FAF7F2;
        --warm-gray: #9A8F83;
    }

    /* Nav */
    nav {
        background: var(--off-white);
        border-bottom: 0.5px solid var(--sand);
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 1000;
        padding: 0 3rem;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: space-between;
        transition: transform 0.3s ease, box-shadow 0.3s ease, background 0.3s ease;
    }

    /* Hide nav on scroll */
    nav.nav-hidden {
        transform: translateY(-100%);
    }

    /* Scrolled state */
    nav.nav-scrolled {
        background: rgba(250, 247, 242, 0.98);
        backdrop-filter: blur(8px);
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.05);
    }

    /* Body padding for fixed nav */
    body {
        padding-top: 60px !important;
        margin: 0 !important;
    }

    .nav-logo {
        font-family: 'Cormorant Garamond', serif;
        font-size: 22px;
        font-weight: 400;
        letter-spacing: 0.2em;
        color: var(--ink);
        text-transform: uppercase;
        text-decoration: none;
        transition: font-size 0.3s ease;
    }

    nav.nav-scrolled .nav-logo {
        font-size: 20px;
    }

    .nav-links {
        display: flex;
        gap: 2.5rem;
        list-style: none;
        font-size: 12px;
        letter-spacing: 0.08em;
        color: var(--warm-gray);
        margin: 0;
        padding: 0;
    }

    .nav-links li a {
        text-decoration: none;
        color: var(--warm-gray);
        transition: color 0.2s;
        font-family: 'DM Sans', sans-serif;
    }

    .nav-links a:hover {
        color: var(--ink);
    }

    .nav-icons {
        display: flex;
        gap: 1.5rem;
        align-items: center;
    }

    .nav-icons span {
        font-size: 11px;
        letter-spacing: 0.08em;
        color: var(--warm-gray);
        font-family: 'DM Sans', sans-serif;
    }

    .nav-icons svg {
        width: 18px;
        height: 18px;
        stroke: var(--warm-gray);
        fill: none;
        stroke-width: 1.5;
        cursor: pointer;
        transition: stroke 0.2s;
    }

    .nav-icons svg:hover {
        stroke: var(--ink);
    }

    /* Cart Icon with Badge */
    .cart-icon {
        position: relative;
        cursor: pointer;
    }
    .cart-badge {
        position: absolute;
        top: -8px;
        right: -10px;
        background: var(--bark);
        color: white;
        font-size: 9px;
        font-weight: 600;
        width: 16px;
        height: 16px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: 'DM Sans', sans-serif;
    }

    /* Mobile Menu Button */
    .mobile-menu-btn {
        display: none;
        background: none;
        border: none;
        cursor: pointer;
        padding: 8px;
        z-index: 101;
    }

    .mobile-menu-btn span {
        display: block;
        width: 22px;
        height: 2px;
        background: var(--ink);
        margin: 5px 0;
        transition: 0.3s;
    }

    /* ========== SLIDE-OUT CART STYLES ========== */
    .cart-overlay {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
        z-index: 2000;
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.3s ease, visibility 0.3s ease;
    }
    .cart-overlay.active {
        opacity: 1;
        visibility: visible;
    }
    .cart-sidebar {
        position: fixed;
        top: 0;
        right: -100%;
        width: 100%;
        max-width: 480px;
        height: 100%;
        background: var(--off-white);
        z-index: 2001;
        transition: right 0.3s ease;
        display: flex;
        flex-direction: column;
        box-shadow: -5px 0 25px rgba(0, 0, 0, 0.1);
    }
    .cart-sidebar.active {
        right: 0;
    }
    .cart-header {
        padding: 1.5rem;
        border-bottom: 0.5px solid var(--sand);
        display: flex;
        justify-content: space-between;
        align-items: center;
    }
    .cart-header h2 {
        font-family: 'Cormorant Garamond', serif;
        font-size: 24px;
        font-weight: 400;
        color: var(--ink);
        margin: 0;
    }
    .cart-close {
        background: none;
        border: none;
        cursor: pointer;
        font-size: 28px;
        color: var(--warm-gray);
        transition: color 0.2s;
        padding: 0;
        width: 32px;
        height: 32px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .cart-close:hover {
        color: var(--ink);
    }
    .cart-items {
        flex: 1;
        overflow-y: auto;
        padding: 1rem 1.5rem;
    }
    .cart-item {
        display: flex;
        gap: 1rem;
        padding: 1rem 0;
        border-bottom: 0.5px solid var(--sand);
    }
    .cart-item-image {
        width: 80px;
        height: 80px;
        background: var(--cream);
        border-radius: 12px;
        overflow: hidden;
        flex-shrink: 0;
    }
    .cart-item-image img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .cart-item-details {
        flex: 1;
    }
    .cart-item-title {
        font-family: 'Cormorant Garamond', serif;
        font-size: 16px;
        font-weight: 500;
        color: var(--ink);
        margin-bottom: 4px;
    }
    .cart-item-price {
        font-size: 13px;
        color: var(--bark);
        font-weight: 500;
    }
    .cart-item-quantity {
        display: flex;
        align-items: center;
        gap: 12px;
        margin-top: 8px;
    }
    .cart-qty-btn {
        background: var(--cream);
        border: none;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.2s;
    }
    .cart-qty-btn:hover {
        background: var(--sand);
    }
    .cart-item-qty {
        font-size: 13px;
        font-weight: 500;
    }
    .cart-item-remove {
        background: none;
        border: none;
        cursor: pointer;
        color: var(--warm-gray);
        font-size: 18px;
        transition: color 0.2s;
        padding: 0 4px;
    }
    .cart-item-remove:hover {
        color: #d9534f;
    }
    .cart-footer {
        padding: 1.5rem;
        border-top: 0.5px solid var(--sand);
        background: var(--off-white);
    }
    .cart-total {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        font-family: 'Cormorant Garamond', serif;
        font-size: 18px;
        font-weight: 500;
    }
    .cart-total span:first-child {
        color: var(--warm-gray);
        font-size: 14px;
        font-family: 'DM Sans', sans-serif;
    }
    .cart-total span:last-child {
        font-size: 22px;
        font-weight: 600;
        color: var(--ink);
    }
    .checkout-btn {
        width: 100%;
        background: var(--ink);
        color: var(--cream);
        border: none;
        padding: 14px;
        border-radius: 999px;
        font-size: 12px;
        letter-spacing: 0.1em;
        text-transform: uppercase;
        cursor: pointer;
        transition: background 0.3s;
        font-weight: 500;
    }
    .checkout-btn:hover {
        background: var(--bark);
    }
    .empty-cart {
        text-align: center;
        padding: 3rem 1.5rem;
        color: var(--warm-gray);
    }
    .empty-cart svg {
        margin-bottom: 1rem;
        opacity: 0.5;
    }
    .empty-cart p {
        font-size: 14px;
    }

    /* Responsive Styles */
    @media (max-width: 768px) {
        nav {
            padding: 0 1.5rem;
        }
        .mobile-menu-btn {
            display: block;
        }
        .nav-links {
            position: fixed;
            top: 60px;
            left: -100%;
            width: 100%;
            height: calc(100vh - 60px);
            background: var(--off-white);
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            padding-top: 3rem;
            gap: 2rem;
            transition: left 0.3s ease;
            z-index: 999;
            margin: 0;
        }
        .nav-links.active {
            left: 0;
        }
        .nav-links li a {
            font-size: 16px;
            letter-spacing: 0.1em;
        }
        .nav-icons {
            gap: 1rem;
        }
        .nav-icons span {
            display: none;
        }
        .mobile-menu-btn.active span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }
        .mobile-menu-btn.active span:nth-child(2) {
            opacity: 0;
        }
        .mobile-menu-btn.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -6px);
        }
        .cart-sidebar {
            max-width: 100%;
        }
        .cart-item-image {
            width: 60px;
            height: 60px;
        }
    }

    @media (min-width: 769px) {
        .nav-icons span {
            display: inline-block !important;
        }
    }

    @media (max-width: 480px) {
        nav {
            padding: 0 1rem;
        }
        .nav-logo {
            font-size: 18px;
            letter-spacing: 0.15em;
        }
        .nav-icons svg {
            width: 16px;
            height: 16px;
        }
        .cart-header h2 {
            font-size: 20px;
        }
        .cart-item-title {
            font-size: 14px;
        }
    }

    /* Announcement Bar */
    .announcement-bar {
        position: fixed;
        top: 60px;
        left: 0;
        right: 0;
        background: var(--ink);
        color: var(--cream);
        font-size: 11px;
        letter-spacing: 0.12em;
        text-transform: uppercase;
        text-align: center;
        padding: 8px 1rem;
        z-index: 999;
        font-family: 'DM Sans', sans-serif;
    }

    @keyframes ticker {
        from { transform: translateX(0); }
        to { transform: translateX(-50%); }
    }

    .announcement-track {
        display: inline-flex;
        gap: 3rem;
        animation: ticker 25s linear infinite;
        white-space: nowrap;
    }
</style>

<nav id="mainNav">
    <a href="{{ url('/home') }}" class="nav-logo">Psoricure</a>
    <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Menu">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <ul class="nav-links" id="navLinks">
        <li><a href="{{ url('/home') }}">Home</a></li>
        <li><a href="{{ url('/products') }}">Products</a></li>
        <li><a href="{{ url('/about') }}">About</a></li>
        <li><a href="{{ url('/contact') }}">Contact</a></li>
    </ul>
    <div class="nav-icons">
        <span>€ EUR</span>
        <svg viewBox="0 0 24 24">
            <circle cx="11" cy="11" r="7" />
            <path d="m21 21-4.35-4.35" />
        </svg>
        <div class="cart-icon" id="cartIcon">
            <svg viewBox="0 0 24 24">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
                <circle cx="12" cy="7" r="4" />
            </svg>
            <span class="cart-badge" id="cartCount">0</span>
        </div>
        <svg viewBox="0 0 24 24">
            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
            <line x1="3" y1="6" x2="21" y2="6" />
            <path d="M16 10a4 4 0 0 1-8 0" />
        </svg>
    </div>
</nav>

<!-- SLIDE-OUT CART OVERLAY & SIDEBAR -->
<div class="cart-overlay" id="cartOverlay"></div>
<div class="cart-sidebar" id="cartSidebar">
    <div class="cart-header">
        <h2>Your Cart</h2>
        <button class="cart-close" id="cartCloseBtn">&times;</button>
    </div>
    <div class="cart-items" id="cartItemsContainer">
        <div class="empty-cart">
            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                <circle cx="12" cy="7" r="4"/>
            </svg>
            <p>Your cart is empty</p>
            <p style="font-size: 12px; margin-top: 8px;">Add some beautiful products to your cart</p>
        </div>
    </div>
    <div class="cart-footer" id="cartFooter" style="display: none;">
        <div class="cart-total">
            <span>Subtotal</span>
            <span id="cartTotalPrice">€0.00</span>
        </div>
        <button class="checkout-btn" id="checkoutBtn">Checkout →</button>
        <p style="font-size: 10px; text-align: center; margin-top: 12px; color: var(--warm-gray);">Shipping & taxes calculated at checkout</p>
    </div>
</div>

<script>
    // Wait for DOM to be fully loaded
    document.addEventListener('DOMContentLoaded', function() {
        // Get elements
        const nav = document.getElementById('mainNav');
        const mobileMenuBtn = document.getElementById('mobileMenuBtn');
        const navLinks = document.getElementById('navLinks');
        const cartIcon = document.getElementById('cartIcon');
        const cartOverlay = document.getElementById('cartOverlay');
        const cartSidebar = document.getElementById('cartSidebar');
        const cartCloseBtn = document.getElementById('cartCloseBtn');
        const cartItemsContainer = document.getElementById('cartItemsContainer');
        const cartFooter = document.getElementById('cartFooter');
        const cartTotalPrice = document.getElementById('cartTotalPrice');
        const cartCountBadge = document.getElementById('cartCount');
        
        // ========== CART FUNCTIONALITY ==========
        // Load cart from localStorage
        let cart = JSON.parse(localStorage.getItem('psoricure_cart')) || [];
        
        // Save cart to localStorage
        function saveCart() {
            localStorage.setItem('psoricure_cart', JSON.stringify(cart));
            updateCartUI();
        }
        
        // Add to cart function (exposed globally)
        window.addToCart = function(productId, name, price, image) {
            const existingItem = cart.find(item => item.id === productId);
            if (existingItem) {
                existingItem.quantity++;
            } else {
                cart.push({
                    id: productId,
                    name: name,
                    price: price,
                    image: image || 'https://images.pexels.com/photos/4041392/pexels-photo-4041392.jpeg?w=100&h=100&fit=crop',
                    quantity: 1
                });
            }
            saveCart();
            // Show cart after adding
            openCart();
        };
        
        // Update quantity
        function updateQuantity(productId, change) {
            const item = cart.find(item => item.id === productId);
            if (item) {
                item.quantity += change;
                if (item.quantity <= 0) {
                    cart = cart.filter(item => item.id !== productId);
                }
                saveCart();
            }
        }
        
        // Remove item
        function removeItem(productId) {
            cart = cart.filter(item => item.id !== productId);
            saveCart();
        }
        
        // Update Cart UI
        function updateCartUI() {
            // Update cart badge
            const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
            if (cartCountBadge) {
                cartCountBadge.textContent = totalItems;
                cartCountBadge.style.display = totalItems > 0 ? 'flex' : 'flex';
            }
            
            // Update cart items display
            if (cartItemsContainer) {
                if (cart.length === 0) {
                    cartItemsContainer.innerHTML = `
                        <div class="empty-cart">
                            <svg width="64" height="64" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1">
                                <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                                <circle cx="12" cy="7" r="4"/>
                            </svg>
                            <p>Your cart is empty</p>
                            <p style="font-size: 12px; margin-top: 8px;">Add some beautiful products to your cart</p>
                        </div>
                    `;
                    if (cartFooter) cartFooter.style.display = 'none';
                } else {
                    let itemsHtml = '';
                    let total = 0;
                    cart.forEach(item => {
                        const itemTotal = item.price * item.quantity;
                        total += itemTotal;
                        itemsHtml += `
                            <div class="cart-item" data-id="${item.id}">
                                <div class="cart-item-image">
                                    <img src="${item.image}" alt="${item.name}">
                                </div>
                                <div class="cart-item-details">
                                    <div class="cart-item-title">${item.name}</div>
                                    <div class="cart-item-price">€${item.price.toFixed(2)}</div>
                                    <div class="cart-item-quantity">
                                        <button class="cart-qty-btn" onclick="updateQuantity('${item.id}', -1)">-</button>
                                        <span class="cart-item-qty">${item.quantity}</span>
                                        <button class="cart-qty-btn" onclick="updateQuantity('${item.id}', 1)">+</button>
                                        <button class="cart-item-remove" onclick="removeItem('${item.id}')">✕</button>
                                    </div>
                                </div>
                            </div>
                        `;
                    });
                    cartItemsContainer.innerHTML = itemsHtml;
                    if (cartFooter) cartFooter.style.display = 'block';
                    if (cartTotalPrice) cartTotalPrice.textContent = `€${total.toFixed(2)}`;
                }
            }
        }
        
        // Open cart
        function openCart() {
            if (cartOverlay) cartOverlay.classList.add('active');
            if (cartSidebar) cartSidebar.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        // Close cart
        function closeCart() {
            if (cartOverlay) cartOverlay.classList.remove('active');
            if (cartSidebar) cartSidebar.classList.remove('active');
            document.body.style.overflow = '';
        }
        
        // Expose functions globally
        window.updateQuantity = updateQuantity;
        window.removeItem = removeItem;
        
        // Cart icon click
        if (cartIcon) {
            cartIcon.addEventListener('click', openCart);
        }
        
        // Close cart events
        if (cartCloseBtn) {
            cartCloseBtn.addEventListener('click', closeCart);
        }
        if (cartOverlay) {
            cartOverlay.addEventListener('click', closeCart);
        }
        
        // Checkout button
        const checkoutBtn = document.getElementById('checkoutBtn');
        if (checkoutBtn) {
            checkoutBtn.addEventListener('click', function() {
                alert('Proceeding to checkout. Total: ' + cartTotalPrice.textContent);
                // You can redirect to checkout page here
                // window.location.href = "{{ url('/checkout') }}";
            });
        }
        
        // Initialize cart UI
        updateCartUI();
        
        // ========== SCROLL HIDE FUNCTIONALITY ==========
        if (nav) {
            let lastScrollY = window.scrollY;
            let ticking = false;
            
            function handleScroll() {
                const currentScrollY = window.scrollY;
                
                if (currentScrollY > 10) {
                    nav.classList.add('nav-scrolled');
                } else {
                    nav.classList.remove('nav-scrolled');
                }
                
                if (currentScrollY > lastScrollY && currentScrollY > 100) {
                    nav.classList.add('nav-hidden');
                } else if (currentScrollY < lastScrollY) {
                    nav.classList.remove('nav-hidden');
                }
                
                lastScrollY = currentScrollY;
                ticking = false;
            }
            
            window.addEventListener('scroll', function() {
                if (!ticking) {
                    requestAnimationFrame(handleScroll);
                    ticking = true;
                }
            });
            
            handleScroll();
        }
        
        // ========== MOBILE MENU TOGGLE ==========
        if (mobileMenuBtn && navLinks) {
            mobileMenuBtn.addEventListener('click', function(e) {
                e.stopPropagation();
                mobileMenuBtn.classList.toggle('active');
                navLinks.classList.toggle('active');
                
                if (navLinks.classList.contains('active')) {
                    document.body.style.overflow = 'hidden';
                } else {
                    document.body.style.overflow = '';
                }
            });
            
            const navLinksItems = navLinks.querySelectorAll('a');
            navLinksItems.forEach(function(link) {
                link.addEventListener('click', function() {
                    mobileMenuBtn.classList.remove('active');
                    navLinks.classList.remove('active');
                    document.body.style.overflow = '';
                });
            });
        }
        
        // ========== HANDLE WINDOW RESIZE ==========
        window.addEventListener('resize', function() {
            if (window.innerWidth > 768) {
                if (navLinks && navLinks.classList.contains('active')) {
                    navLinks.classList.remove('active');
                    if (mobileMenuBtn) mobileMenuBtn.classList.remove('active');
                    document.body.style.overflow = '';
                }
            }
        });
    });
</script>