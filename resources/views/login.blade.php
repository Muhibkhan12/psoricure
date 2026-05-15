<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<title>PSORICURE — Sign In</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,300;0,400;0,500;1,300;1,400&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<style>
*, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

:root {
  --cream:       #F5EFE4;
  --sand:        #E2D5C3;
  --sand-light:  #EDE5D8;
  --tan:         #C4A882;
  --tan-light:   #D4BCA0;
  --bark:        #8C6E50;
  --bark-dark:   #6A5038;
  --ink:         #1C1917;
  --off-white:   #FAF7F2;
  --warm-gray:   #9A8F83;
  --warm-gray-lt:#BEB3A8;
  --success:     #6B8F5E;
  --danger:      #9E5A48;
}

html, body {
  height: 100%;
  font-family: 'DM Sans', sans-serif;
  font-weight: 300;
  background: var(--off-white);
  color: var(--ink);
  overflow: hidden;
}

.auth-shell {
  display: grid;
  grid-template-columns: 1fr 1fr;
  height: 100vh;
}

/* ── LEFT — full media ── */
.panel-left {
  position: relative;
  overflow: hidden;
  background: #111;
}

.panel-video {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
}

.panel-img {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  object-fit: cover;
  object-position: center;
  display: none;
}

.panel-overlay {
  position: absolute;
  inset: 0;
  background: linear-gradient(
    to bottom,
    rgba(28,25,23,0.05) 0%,
    rgba(28,25,23,0.0) 50%,
    rgba(28,25,23,0.6) 100%
  );
  z-index: 1;
}

.panel-brand {
  position: absolute;
  bottom: 2.5rem;
  left: 2.5rem;
  z-index: 2;
}
.brand-name {
  font-family: 'Cormorant Garamond', serif;
  font-size: 28px;
  letter-spacing: 0.24em;
  text-transform: uppercase;
  color: var(--cream);
  font-weight: 400;
  line-height: 1;
}
.brand-tagline {
  font-size: 11px;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: rgba(245,239,228,0.5);
  margin-top: 6px;
}

/* ── RIGHT ── */
.panel-right {
  background: var(--off-white);
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 3rem 4rem;
  position: relative;
  overflow-y: auto;
}

.panel-right::before {
  content: '';
  position: absolute;
  inset: 0;
  background-image:
    linear-gradient(rgba(226,213,195,0.3) 1px, transparent 1px),
    linear-gradient(90deg, rgba(226,213,195,0.3) 1px, transparent 1px);
  background-size: 40px 40px;
  pointer-events: none;
  opacity: 0.5;
}

.form-wrap {
  width: 100%;
  max-width: 380px;
  position: relative;
  z-index: 1;
}

.form-logo {
  font-family: 'Cormorant Garamond', serif;
  font-size: 20px;
  letter-spacing: 0.22em;
  text-transform: uppercase;
  color: var(--ink);
  font-weight: 400;
  text-align: center;
  margin-bottom: 2rem;
  display: none;
}

.auth-tabs {
  display: flex;
  background: var(--sand-light);
  border-radius: 10px;
  padding: 4px;
  margin-bottom: 2.5rem;
  gap: 2px;
}
.auth-tab {
  flex: 1;
  text-align: center;
  padding: 9px;
  border-radius: 7px;
  font-size: 13px;
  letter-spacing: 0.06em;
  cursor: pointer;
  color: var(--warm-gray);
  transition: all 0.25s;
  user-select: none;
}
.auth-tab.active {
  background: var(--off-white);
  color: var(--ink);
  box-shadow: 0 2px 8px rgba(28,25,23,0.08);
}

.form-title {
  font-family: 'Cormorant Garamond', serif;
  font-size: 32px;
  font-weight: 400;
  color: var(--ink);
  margin-bottom: 4px;
  line-height: 1.15;
}
.form-sub {
  font-size: 12px;
  color: var(--warm-gray);
  margin-bottom: 2rem;
  line-height: 1.6;
}

.field { margin-bottom: 1.1rem; }
.field-label {
  display: block;
  font-size: 10px;
  letter-spacing: 0.12em;
  text-transform: uppercase;
  color: var(--warm-gray);
  margin-bottom: 6px;
}
.field-wrap {
  position: relative;
  display: flex;
  align-items: center;
}
.field-icon {
  position: absolute;
  left: 14px;
  width: 15px; height: 15px;
  stroke: var(--warm-gray-lt);
  fill: none;
  stroke-width: 1.5;
  pointer-events: none;
  transition: stroke 0.2s;
}
.field-wrap:focus-within .field-icon { stroke: var(--bark); }

.field-input {
  width: 100%;
  background: var(--cream);
  border: 0.5px solid var(--sand);
  border-radius: 8px;
  padding: 12px 14px 12px 40px;
  font-family: 'DM Sans', sans-serif;
  font-size: 13px;
  font-weight: 300;
  color: var(--ink);
  outline: none;
  transition: border-color 0.2s, box-shadow 0.2s;
  -webkit-appearance: none;
}
.field-input::placeholder { color: var(--warm-gray-lt); }
.field-input:focus { border-color: var(--tan); box-shadow: 0 0 0 3px rgba(196,168,130,0.12); }

.eye-btn {
  position: absolute;
  right: 12px;
  background: none;
  border: none;
  cursor: pointer;
  padding: 4px;
  display: flex;
  align-items: center;
}
.eye-btn svg { width: 15px; height: 15px; stroke: var(--warm-gray-lt); fill: none; stroke-width: 1.5; }

.strength-bar { display: flex; gap: 4px; margin-top: 6px; }
.strength-seg { flex: 1; height: 2px; background: var(--sand); border-radius: 1px; transition: background 0.3s; }
.strength-label { font-size: 10px; color: var(--warm-gray-lt); margin-top: 4px; letter-spacing: 0.06em; min-height: 14px; }

.field-row { display: grid; grid-template-columns: 1fr 1fr; gap: 0.75rem; }

.form-meta { display: flex; justify-content: space-between; align-items: center; margin-bottom: 1.5rem; }
.checkbox-wrap { display: flex; align-items: center; gap: 8px; cursor: pointer; }
.checkbox-wrap input[type=checkbox] { display: none; }
.custom-check {
  width: 16px; height: 16px;
  border: 0.5px solid var(--sand);
  border-radius: 4px;
  background: var(--cream);
  display: flex; align-items: center; justify-content: center;
  flex-shrink: 0;
  transition: all 0.2s;
}
.checkbox-wrap input:checked + .custom-check { background: var(--ink); border-color: var(--ink); }
.custom-check svg { width: 9px; height: 9px; stroke: var(--cream); fill: none; stroke-width: 2.5; opacity: 0; transition: opacity 0.15s; }
.checkbox-wrap input:checked + .custom-check svg { opacity: 1; }
.check-label { font-size: 12px; color: var(--warm-gray); }
.forgot-link { font-size: 12px; color: var(--bark); border-bottom: 0.5px solid transparent; transition: border-color 0.2s; cursor: pointer; display: inline-block; }
.forgot-link:hover { border-color: var(--bark); }

.submit-btn {
  width: 100%;
  background: var(--ink);
  color: var(--cream);
  border: none;
  border-radius: 8px;
  padding: 14px;
  font-family: 'DM Sans', sans-serif;
  font-size: 13px;
  letter-spacing: 0.1em;
  text-transform: uppercase;
  cursor: pointer;
  transition: background 0.25s, transform 0.15s;
  position: relative;
  overflow: hidden;
  margin-bottom: 1.25rem;
}
.submit-btn::after {
  content: '';
  position: absolute; inset: 0;
  background: linear-gradient(135deg, rgba(196,168,130,0.15) 0%, transparent 60%);
  pointer-events: none;
}
.submit-btn:hover { background: var(--bark-dark); transform: translateY(-1px); }
.submit-btn:active { transform: translateY(0); }

.or-divider { display: flex; align-items: center; gap: 12px; margin-bottom: 1.25rem; }
.or-line { flex: 1; height: 0.5px; background: var(--sand); }
.or-text { font-size: 11px; color: var(--warm-gray-lt); letter-spacing: 0.1em; }

.social-btn {
  width: 100%;
  background: var(--cream);
  border: 0.5px solid var(--sand);
  border-radius: 8px;
  padding: 11px 14px;
  display: flex; align-items: center; justify-content: center;
  gap: 10px;
  font-family: 'DM Sans', sans-serif;
  font-size: 13px;
  color: var(--ink);
  cursor: pointer;
  transition: background 0.2s, border-color 0.2s;
  margin-bottom: 0.75rem;
}
.social-btn:hover { background: var(--sand-light); border-color: var(--tan-light); }

.form-footer-note { text-align: center; font-size: 11px; color: var(--warm-gray-lt); margin-top: 1.25rem; line-height: 1.6; }
.form-footer-note a { color: var(--bark); border-bottom: 0.5px solid transparent; transition: border-color 0.2s; text-decoration: none; cursor: pointer; }
.form-footer-note a:hover { border-color: var(--bark); }

.form-panel { display: none; animation: slideIn 0.3s ease both; }
.form-panel.active { display: block; }
@keyframes slideIn { from { opacity: 0; transform: translateX(10px); } to { opacity: 1; transform: translateX(0); } }

.terms-row { display: flex; align-items: flex-start; gap: 8px; margin-bottom: 1.5rem; }
.terms-text { font-size: 11px; color: var(--warm-gray); line-height: 1.6; }
.terms-text a { color: var(--bark); text-decoration: none; border-bottom: 0.5px solid transparent; }
.terms-text a:hover { border-color: var(--bark); }

.step-dots { display: flex; gap: 6px; margin-bottom: 2rem; }
.step-dot { width: 6px; height: 6px; border-radius: 50%; background: var(--sand); transition: all 0.3s; }
.step-dot.active { background: var(--bark); width: 20px; border-radius: 3px; }
.step-dot.done { background: var(--success); }

@media (max-width: 768px) {
  .auth-shell { grid-template-columns: 1fr; }
  .panel-left { display: none; }
  .panel-right { padding: 2rem 1.5rem; }
  .form-logo { display: block; }
}
</style>
</head>
<body>

<div class="auth-shell">

  <!-- LEFT: video with fallback image -->
  <div class="panel-left">
    <video
      class="panel-video"
      src="https://videos.pexels.com/video-files/5793635/5793635-uhd_2560_1440_25fps.mp4"
      poster="https://images.pexels.com/photos/3685530/pexels-photo-3685530.jpeg"
      autoplay muted loop playsinline
    ></video>
    <img
      class="panel-img"
      src="https://images.pexels.com/photos/3685530/pexels-photo-3685530.jpeg"
      alt="Psoricure skincare product"
    >
    <div class="panel-overlay"></div>
    <div class="panel-brand">
      <div class="brand-name">Psoricure</div>
      <div class="brand-tagline">Skin science, botanical soul.</div>
    </div>
  </div>

  <!-- RIGHT: Laravel-ready forms with POST method (no JavaScript) -->
  <div class="panel-right">
    <div class="form-wrap">

      <div class="form-logo">Psoricure</div>

      <div class="auth-tabs">
        <div class="auth-tab active" data-tab="login">Sign In</div>
        <div class="auth-tab" data-tab="register">Create Account</div>
      </div>

      <!-- LOGIN FORM - Pure HTML/CSS, Laravel compatible -->
      <div class="form-panel active" id="panel-login">
        <form method="POST" action="{{route('user-login')}}" accept-charset="UTF-8">
          @csrf
          
          <div class="form-title">Welcome back.</div>
          <p class="form-sub">Sign in to your Psoricure admin account.</p>

          <div class="field">
            <label class="field-label">Email address</label>
            <div class="field-wrap">
              <svg class="field-icon" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
              <input class="field-input" name="email" type="email" placeholder="you@psoricure.com" autocomplete="email" value="{{ old('email') }}">
            </div>
            @error('email')
              <div class="field-error">{{ $message }}</div>
            @enderror
          </div>

          <div class="field">
            <label class="field-label">Password</label>
            <div class="field-wrap">
              <svg class="field-icon" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
              <input class="field-input" name="password" type="password" placeholder="••••••••" autocomplete="current-password">
            </div>
            @error('password')
              <div class="field-error">{{ $message }}</div>
            @enderror
          </div>

          <div class="form-meta">
            <label class="checkbox-wrap">
              <input type="checkbox" name="remember" value="1">
              <div class="custom-check"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></div>
              <span class="check-label">Remember me</span>
            </label>
            <a href="/forgot-password" class="forgot-link">Forgot password?</a>
          </div>

          <button type="submit" class="submit-btn">
            <span class="btn-text">Sign In</span>
          </button>
        </form>

        <div class="or-divider">
          <div class="or-line"></div><span class="or-text">or continue with</span><div class="or-line"></div>
        </div>

        <a href="/auth/google" class="social-btn" style="text-decoration: none; display: flex;">
          <svg width="17" height="17" viewBox="0 0 24 24">
            <path d="M22.56 12.25c0-.78-.07-1.53-.2-2.25H12v4.26h5.92c-.26 1.37-1.04 2.53-2.21 3.31v2.77h3.57c2.08-1.92 3.28-4.74 3.28-8.09z" fill="#4285F4"/>
            <path d="M12 23c2.97 0 5.46-.98 7.28-2.66l-3.57-2.77c-.98.66-2.23 1.06-3.71 1.06-2.86 0-5.29-1.93-6.16-4.53H2.18v2.84C3.99 20.53 7.7 23 12 23z" fill="#34A853"/>
            <path d="M5.84 14.09c-.22-.66-.35-1.36-.35-2.09s.13-1.43.35-2.09V7.07H2.18C1.43 8.55 1 10.22 1 12s.43 3.45 1.18 4.93l2.85-2.22.81-.62z" fill="#FBBC05"/>
            <path d="M12 5.38c1.62 0 3.06.56 4.21 1.64l3.15-3.15C17.45 2.09 14.97 1 12 1 7.7 1 3.99 3.47 2.18 7.07l3.66 2.84c.87-2.6 3.3-4.53 6.16-4.53z" fill="#EA4335"/>
          </svg>
          Continue with Google
        </a>

        <div class="form-footer-note">
          Don't have an account? <a data-tab-link="register">Create one</a>
        </div>
      </div>

      <!-- REGISTER FORM - Pure HTML/CSS, Laravel compatible -->
      <div class="form-panel" id="panel-register">
        <form method="POST" action="{{route('register-user')}}" accept-charset="UTF-8">
          @csrf
          
          <div class="step-dots">
            <div class="step-dot active"></div>
            <div class="step-dot"></div>
            <div class="step-dot"></div>
          </div>

          <div class="form-title">Create account.</div>
          <p class="form-sub">Join the Psoricure admin workspace.</p>

          <div class="field-row">
            <div class="field">
              <label class="field-label">First name</label>
              <div class="field-wrap">
                <svg class="field-icon" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                <input class="field-input" name="first_name" type="text" placeholder="Sara" autocomplete="given-name" value="{{ old('first_name') }}">
              </div>
              @error('first_name')
                <div class="field-error">{{ $message }}</div>
              @enderror
            </div>
            <div class="field">
              <label class="field-label">Last name</label>
              <div class="field-wrap">
                <svg class="field-icon" viewBox="0 0 24 24"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                <input class="field-input" name="last_name" type="text" placeholder="Malik" autocomplete="family-name" value="{{ old('last_name') }}">
              </div>
              @error('last_name')
                <div class="field-error">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="field">
            <label class="field-label">Email address</label>
            <div class="field-wrap">
              <svg class="field-icon" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
              <input class="field-input" name="email" type="email" placeholder="you@psoricure.com" autocomplete="email" value="{{ old('email') }}">
            </div>
            @error('email')
              <div class="field-error">{{ $message }}</div>
            @enderror
          </div>

          <div class="field">
            <label class="field-label">Password</label>
            <div class="field-wrap">
              <svg class="field-icon" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
              <input class="field-input" name="password" type="password" placeholder="Min. 8 characters" autocomplete="new-password">
            </div>
            @error('password')
              <div class="field-error">{{ $message }}</div>
            @enderror
          </div>

          <div class="field">
            <label class="field-label">Confirm password</label>
            <div class="field-wrap">
              <svg class="field-icon" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="11" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
              <input class="field-input" name="password_confirmation" type="password" placeholder="Repeat password" autocomplete="new-password">
            </div>
          </div>

          <div class="terms-row">
            <label class="checkbox-wrap" style="align-items:flex-start;margin-top:3px;">
              <input type="checkbox" name="terms" value="1" {{ old('terms') ? 'checked' : '' }}>
              <div class="custom-check" style="margin-top:1px;"><svg viewBox="0 0 10 10"><polyline points="1.5,5 4,7.5 8.5,2.5"/></svg></div>
            </label>
            <span class="terms-text">I agree to Psoricure's <a href="/terms">Terms of Service</a> and <a href="/privacy">Privacy Policy</a>. My data will be handled in accordance with EU GDPR guidelines.</span>
          </div>
          @error('terms')
            <div class="field-error">{{ $message }}</div>
          @enderror

          <button type="submit" class="submit-btn">
            <span class="btn-text">Create Account</span>
          </button>
        </form>

        <div class="form-footer-note">
          Already have an account? <a data-tab-link="login">Sign in</a>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Minimal vanilla JavaScript for tab switching only (no form validation or submission logic) -->
<script>
(function() {
  // Tab switching functionality (pure UI, no form handling)
  const loginTab = document.querySelector('.auth-tab[data-tab="login"]');
  const registerTab = document.querySelector('.auth-tab[data-tab="register"]');
  const loginPanel = document.getElementById('panel-login');
  const registerPanel = document.getElementById('panel-register');
  const tabLinks = document.querySelectorAll('[data-tab-link]');

  function switchTab(tab) {
    if (tab === 'login') {
      loginTab.classList.add('active');
      registerTab.classList.remove('active');
      loginPanel.classList.add('active');
      registerPanel.classList.remove('active');
    } else {
      loginTab.classList.remove('active');
      registerTab.classList.add('active');
      loginPanel.classList.remove('active');
      registerPanel.classList.add('active');
    }
  }

  if (loginTab) loginTab.addEventListener('click', () => switchTab('login'));
  if (registerTab) registerTab.addEventListener('click', () => switchTab('register'));
  
  tabLinks.forEach(link => {
    link.addEventListener('click', (e) => {
      e.preventDefault();
      const targetTab = link.getAttribute('data-tab-link');
      if (targetTab) switchTab(targetTab);
    });
  });

  // Video fallback: if video fails, show fallback image
  const video = document.querySelector('.panel-video');
  const fallbackImg = document.querySelector('.panel-img');
  if (video && fallbackImg) {
    video.addEventListener('error', function() {
      video.style.display = 'none';
      fallbackImg.style.display = 'block';
    });
  }
})();
</script>
</body>
</html>