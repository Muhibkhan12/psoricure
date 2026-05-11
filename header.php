<style>
    /* Nav */
    nav {
        background: var(--off-white);
        border-bottom: 0.5px solid var(--sand);
        position: sticky;
        top: 0;
        z-index: 100;
        padding: 0 3rem;
        height: 60px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .nav-logo {
        font-family: 'Cormorant Garamond', serif;
        font-size: 22px;
        font-weight: 400;
        letter-spacing: 0.2em;
        color: var(--ink);
        text-transform: uppercase;
    }

    .nav-links {
        display: flex;
        gap: 2.5rem;
        list-style: none;
        font-size: 12px;
        letter-spacing: 0.08em;
        color: var(--warm-gray);
    }

    .nav-links a:hover {
        color: var(--ink);
        transition: color 0.2s;
    }

    .nav-icons {
        display: flex;
        gap: 1.5rem;
        align-items: center;
    }

    .nav-icons svg {
        width: 18px;
        height: 18px;
        stroke: var(--warm-gray);
        fill: none;
        stroke-width: 1.5;
        cursor: none;
    }

    .nav-icons svg:hover {
        stroke: var(--ink);
        transition: stroke 0.2s;
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
            z-index: 99;
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

        /* Hamburger animation */
        .mobile-menu-btn.active span:nth-child(1) {
            transform: rotate(45deg) translate(5px, 5px);
        }

        .mobile-menu-btn.active span:nth-child(2) {
            opacity: 0;
        }

        .mobile-menu-btn.active span:nth-child(3) {
            transform: rotate(-45deg) translate(7px, -6px);
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

        .nav-icons span {
            font-size: 10px;
        }
    }
</style>

<nav>
    <div class="nav-logo">Psoricure</div>
    <button class="mobile-menu-btn" id="mobileMenuBtn" aria-label="Menu">
        <span></span>
        <span></span>
        <span></span>
    </button>
    <ul class="nav-links" id="navLinks">
        <li><a href="index.php">Home</a></li>
        <li><a href="product.php">Products</a></li>
        <li><a href="#">About</a></li>
        <li><a href="#">Contact</a></li>
    </ul>
    <div class="nav-icons">
        <span style="font-size:11px;letter-spacing:0.08em;color:var(--warm-gray);">€ EUR</span>
        <svg viewBox="0 0 24 24">
            <circle cx="11" cy="11" r="7" />
            <path d="m21 21-4.35-4.35" />
        </svg>
        <svg viewBox="0 0 24 24">
            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2" />
            <circle cx="12" cy="7" r="4" />
        </svg>
        <svg viewBox="0 0 24 24">
            <path d="M6 2 3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z" />
            <line x1="3" y1="6" x2="21" y2="6" />
            <path d="M16 10a4 4 0 0 1-8 0" />
        </svg>
    </div>
</nav>

<script>
    // Mobile menu toggle functionality
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const navLinks = document.getElementById('navLinks');

    if (mobileMenuBtn && navLinks) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenuBtn.classList.toggle('active');
            navLinks.classList.toggle('active');
            // Prevent body scroll when menu is open
            if (navLinks.classList.contains('active')) {
                document.body.style.overflow = 'hidden';
            } else {
                document.body.style.overflow = '';
            }
        });

        // Close menu when clicking on a link
        const navLinksItems = navLinks.querySelectorAll('a');
        navLinksItems.forEach(link => {
            link.addEventListener('click', () => {
                mobileMenuBtn.classList.remove('active');
                navLinks.classList.remove('active');
                document.body.style.overflow = '';
            });
        });
    }

    // Handle window resize - reset menu state if needed
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            if (navLinks.classList.contains('active')) {
                navLinks.classList.remove('active');
                mobileMenuBtn.classList.remove('active');
                document.body.style.overflow = '';
            }
        }
    });
</script>