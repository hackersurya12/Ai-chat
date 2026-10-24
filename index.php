<?php
require_once __DIR__ . '/config.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?= htmlspecialchars($config['appName']) ?> — Your Everyday AI Assistant</title>
<meta name="description" content="<?= htmlspecialchars($config['appName']) ?> is an AI assistant app for Android. Write, learn, translate, and get answers with text or voice. Premium plans available. Download the latest APK." />
<meta name="theme-color" content="#7c5cff" />
<link rel="preconnect" href="<?= SUPABASE_URL ?>" />
<link rel="icon" href="<?= htmlspecialchars($config['logoUrl'] ?: 'assets/logo.png') ?>" />
<link rel="stylesheet" href="assets/styles.css?v=<?= APP_VERSION ?>" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" />
</head>
<body>

<header class="site-header" id="header" role="banner">
  <div class="wrap header-inner">
    <a class="brand" href="#top" aria-label="<?= htmlspecialchars($config['appName']) ?> - Home">
      <img src="<?= htmlspecialchars($config['logoUrl'] ?: 'assets/logo.png') ?>" alt="" class="brand-logo" loading="eager" width="36" height="36" />
      <span class="brand-name"><?= htmlspecialchars($config['appName']) ?></span>
    </a>
    <nav class="nav" id="nav" role="navigation" aria-label="Main navigation">
      <a href="#features">Features</a>
      <a href="#how-it-works">How it works</a>
      <a href="#voice">Voice</a>
      <a href="#plans">Pricing</a>
      <a href="#screenshots">Screenshots</a>
      <a href="#download">Download</a>
      <a href="#faq">FAQ</a>
      <a href="#contact">Contact</a>
    </nav>
    <a class="btn primary nav-cta" href="#download" aria-label="Download <?= htmlspecialchars($config['appName']) ?>">
      <svg class="btn-icon" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><path fill="currentColor" d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg>
      <span>Download</span>
    </a>
    <button class="nav-toggle" id="navToggle" aria-label="Toggle menu" aria-expanded="false" aria-controls="nav">
      <span class="hamburger"></span>
    </button>
  </div>
</header>

<main id="main" role="main">

  <!-- HERO SECTION -->
  <section class="hero" id="top" aria-labelledby="hero-title">
    <div class="wrap hero-inner">
      <div class="hero-copy">
        <span class="hero-badge">Now with Voice Assistant & Pro Plans</span>
        <h1 id="hero-title">Your everyday AI assistant</h1>
        <p class="lead">
          <?= htmlspecialchars($config['appName']) ?> helps you write, summarise, translate, learn and get clear answers — by text or voice.
          Supports English, Tamil and Tanglish.
        </p>
        <div class="hero-stats" aria-label="App statistics">
          <div class="stat">
            <span class="stat-value" id="stat-users">10K+</span>
            <span class="stat-label">Users</span>
          </div>
          <div class="stat">
            <span class="stat-value" id="stat-rating">4.8★</span>
            <span class="stat-label">Rating</span>
          </div>
          <div class="stat">
            <span class="stat-value" id="stat-langs">3</span>
            <span class="stat-label">Languages</span>
          </div>
        </div>
        <div class="hero-actions">
          <a class="btn primary btn-lg" id="hero-download" href="#download" aria-label="Download <?= htmlspecialchars($config['appName']) ?> for Android">
            <svg class="btn-icon" viewBox="0 0 24 24" width="20" height="20" aria-hidden="true"><path fill="currentColor" d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg>
            <span>Download for Android</span>
          </a>
          <a class="btn ghost btn-lg" href="#features">Explore Features</a>
        </div>
        <p class="hero-note" id="hero-version">
          <?php if ($config['latestVersionName']): ?>
            v<?= htmlspecialchars($config['latestVersionName']) ?> • Build <?= (int)$config['latestVersionCode'] ?> • Updated <?= date('F Y') ?>
          <?php endif; ?>
        </p>
        <div class="hero-trust" aria-label="Trust indicators">
          <span class="trust-item">No ads</span>
          <span class="trust-divider" aria-hidden="true">•</span>
          <span class="trust-item">Private &amp; secure</span>
          <span class="trust-divider" aria-hidden="true">•</span>
          <span class="trust-item">Offline-first</span>
        </div>
      </div>
      <div class="hero-art" aria-hidden="true">
        <div class="phone-mockup">
          <div class="phone-frame">
            <div class="phone-screen" id="phoneScreen">
              <div class="mock-chat">
                <div class="mock-message user">How do I write a formal email in Tamil?</div>
                <div class="mock-message assistant">Here's a template for a formal Tamil email...</div>
                <div class="mock-message user">Translate this to English</div>
                <div class="mock-message assistant">Translation: 'Dear Sir/Madam...'</div>
              </div>
              <div class="mock-input">
                <span class="mock-mic" aria-hidden="true">🎤</span>
                <span class="mock-text">Ask me anything...</span>
              </div>
            </div>
          </div>
          <div class="phone-shadow"></div>
        </div>
      </div>
    </div>
    <div class="hero-wave" aria-hidden="true"><svg viewBox="0 0 1440 100" preserveAspectRatio="none"><path d="M0,0 C360,60 1080,0 1440,40 L1440,100 L0,100 Z" fill="var(--bg)"></path></svg></div>
  </section>

  <!-- FEATURES SECTION -->
  <section class="section" id="features" aria-labelledby="features-title">
    <div class="wrap">
      <header class="section-header">
        <h2 id="features-title">Everything you need in one app</h2>
        <p class="muted">Built for everyday use — fast, private, and works offline.</p>
      </header>
      <div class="features-grid" id="featuresGrid">
        <?php
        $features = [
          ['icon' => 'chat', 'title' => 'Ask Anything', 'desc' => 'Get instant answers, explanations, and creative help on any topic.'],
          ['icon' => 'write', 'title' => 'Writing Assistant', 'desc' => 'Draft emails, messages, notes, and improve your wording instantly.'],
          ['icon' => 'learn', 'title' => 'Learning &amp; Study', 'desc' => 'Understand concepts, summarize text, practice languages, and more.'],
          ['icon' => 'translate', 'title' => 'Translation', 'desc' => 'Translate and converse in English, Tamil, and Tanglish (mixed).'],
          ['icon' => 'voice', 'title' => 'Voice Conversation', 'desc' => 'Speak naturally — auto language detection, male voice replies.'],
          ['icon' => 'files', 'title' => 'File Attachments', 'desc' => 'Attach images or documents and ask questions about them.'],
          ['icon' => 'offline', 'title' => 'Works Offline', 'desc' => 'Core features work without internet; syncs when online.'],
          ['icon' => 'privacy', 'title' => 'Privacy First', 'desc' => 'No ads, no tracking. Your data stays on your device.'],
          ['icon' => 'premium', 'title' => 'Pro Plans', 'desc' => 'Optional premium for priority models and faster responses.']
        ];
        foreach ($features as $f): ?>
        <article class="feature-card">
          <div class="feature-icon"><?= get_feature_icon_svg($f['icon']) ?></div>
          <h3><?= htmlspecialchars($f['title']) ?></h3>
          <p><?= htmlspecialchars($f['desc']) ?></p>
        </article>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- HOW IT WORKS -->
  <section class="section alt" id="how-it-works" aria-labelledby="how-title">
    <div class="wrap">
      <header class="section-header">
        <h2 id="how-title">How it works</h2>
        <p class="muted">Get started in three simple steps.</p>
      </header>
      <div class="steps-grid">
        <article class="step-card">
          <div class="step-number">1</div>
          <h3>Download &amp; Install</h3>
          <p>Get the APK from this page, enable "Install from unknown sources" once, and install.</p>
        </article>
        <article class="step-card">
          <div class="step-number">2</div>
          <h3>Sign in with Google</h3>
          <p>Use your Google account to sign in — no passwords, no tracking, just secure authentication.</p>
        </article>
        <article class="step-card">
          <div class="step-number">3</div>
          <h3>Start chatting</h3>
          <p>Type or speak your question. Get instant answers, translations, summaries and more.</p>
        </article>
      </div>
    </div>
  </section>

  <!-- VOICE SECTION -->
  <section class="section" id="voice" aria-labelledby="voice-title">
    <div class="wrap">
      <header class="section-header">
        <h2 id="voice-title">Voice Assistant — Talk naturally</h2>
        <p class="muted">New in v<?= htmlspecialchars($config['latestVersionName']) ?>: Full voice conversation with male voice output.</p>
      </header>
      <div class="voice-demo">
        <div class="voice-features">
          <div class="voice-feature">
            <svg class="voice-icon" viewBox="0 0 24 24" width="28" height="28" aria-hidden="true"><path fill="currentColor" d="M12 14c1.66 0 3-1.34 3-3V5c0-1.66-1.34-3-3-3S9 3.34 9 5v6c0 1.66 1.34 3 3 3zM17 11c0 2.76-2.24 5-5 5s-5-2.24-5-5H5c0 3.53 2.61 6.43 6 6.92V21h2v-3.08c3.39-.49 6-3.39 6-6.92h-2z"/></svg>
            <h4>Voice Input</h4>
            <p>Speak your question — the app transcribes in real-time with auto language detection.</p>
          </div>
          <div class="voice-feature">
            <svg class="voice-icon" viewBox="0 0 24 24" width="28" height="28" aria-hidden="true"><path fill="currentColor" d="M12 3v10.55c-.59-.34-1.27-.55-2-.55-2.21 0-4 1.79-4 4s1.79 4 4 4 4-1.79 4-4V7h4V3h-6z"/></svg>
            <h4>Male Voice Output</h4>
            <p>Responses are read aloud in a natural male voice — no female/synthetic voices.</p>
          </div>
          <div class="voice-feature">
            <svg class="voice-icon" viewBox="0 0 24 24" width="28" height="28" aria-hidden="true"><path fill="currentColor" d="M12.87 15.07l-2.54 2.51.03.03A17.52 17.52 0 0 0 14 19.08V5h4v14.08a17.52 17.52 0 0 0-1.13-1.92l-.03-.03zM5 4.27L3.27 6 12 14.73V4.27H5zm19.73 10.46L20.73 18 12 9.27V18h7.73z"/></svg>
            <h4>Multi-language</h4>
            <p>Detects and responds in English, Tamil, or Tanglish automatically.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- PLANS SECTION -->
  <section class="section alt" id="plans" aria-labelledby="plans-title">
    <div class="wrap">
      <header class="section-header">
        <h2 id="plans-title">Simple, transparent pricing</h2>
        <p class="muted">Free tier with daily limits. Premium plans unlock priority models and support. No auto-renewal.</p>
      </header>
      <div class="plans-grid" id="plansGrid">
        <?php foreach ($config['plans'] as $i => $plan):
          $isPopular = $plan['id'] === 'pro_yearly';
          $period = $plan['durationDays'] === 31 ? 'month' : 'year';
          $periodLabel = $plan['durationDays'] === 31 ? 'month' : 'year';
        ?>
        <article class="plan-card<?= $isPopular ? ' popular' : '' ?>">
          <?php if ($isPopular): ?>
          <span class="popular-badge">Best value</span>
          <?php endif; ?>
          <h3><?= htmlspecialchars($plan['title']) ?></h3>
          <div class="plan-price">
            <span class="amount"><?= format_inr($plan['amount']) ?></span>
            <span class="period">/<?= $periodLabel ?></span>
          </div>
          <p class="plan-desc"><?= htmlspecialchars($plan['description']) ?></p>
          <ul class="plan-features">
            <li>Priority AI models</li>
            <li>Faster responses</li>
            <li>Priority support</li>
            <li>No daily limits</li>
          </ul>
          <a class="btn<?= $isPopular ? ' primary' : ' ghost' ?>" href="#download">Get Started</a>
        </article>
        <?php endforeach; ?>
      </div>
      <p class="plans-note">Prices include applicable taxes. Plans run for their stated duration and do not auto-renew.</p>
    </div>
  </section>

  <!-- SCREENSHOTS -->
  <section class="section" id="screenshots" aria-labelledby="screenshots-title">
    <div class="wrap">
      <header class="section-header">
        <h2 id="screenshots-title">Screenshots</h2>
        <p class="muted">Clean, modern interface designed for Android.</p>
      </header>
      <div class="screenshots-carousel" id="screenshotsCarousel">
        <div class="screenshot-track" id="screenshotTrack">
          <?php
          // Use placeholder screenshots - in production, upload real screenshots to Supabase
          $screenshots = [
            'assets/screenshot-chat.png',
            'assets/screenshot-voice.png',
            'assets/screenshot-plans.png',
            'assets/screenshot-settings.png'
          ];
          foreach ($screenshots as $i => $src): ?>
          <div class="screenshot-slide<?= $i === 0 ? ' active' : '' ?>" style="background-image: url('<?= $src ?>')"></div>
          <?php endforeach; ?>
        </div>
        <button class="carousel-btn prev" id="carouselPrev" aria-label="Previous screenshot"><svg viewBox="0 0 24 24" width="24" height="24"><path fill="currentColor" d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg></button>
        <button class="carousel-btn next" id="carouselNext" aria-label="Next screenshot"><svg viewBox="0 0 24 24" width="24" height="24"><path fill="currentColor" d="M8.59 16.59L10 18l6-6-6-6-1.41 1.41L13.17 12z"/></svg></button>
      </div>
      <div class="carousel-dots" id="carouselDots" aria-label="Screenshot navigation"></div>
    </div>
  </section>

  <!-- DOWNLOAD SECTION -->
  <section class="section" id="download" aria-labelledby="download-title">
    <div class="wrap">
      <header class="section-header">
        <h2 id="download-title">Download <?= htmlspecialchars($config['appName']) ?></h2>
        <p class="muted">Latest version with all features. Direct APK download — no Play Store required.</p>
      </header>
      <div class="download-card" id="downloadCard">
        <div class="download-info">
          <div class="download-icon">
            <img src="<?= htmlspecialchars($config['logoUrl'] ?: 'assets/logo.png') ?>" alt="<?= htmlspecialchars($config['appName']) ?> icon" width="64" height="64" loading="eager" />
          </div>
          <div class="download-details">
            <h3><?= htmlspecialchars($config['appName']) ?></h3>
            <p class="download-meta">
              <span id="dl-version">Version <?= htmlspecialchars($config['latestVersionName']) ?></span>
              <span class="divider" aria-hidden="true">•</span>
              <span id="dl-size"><?= $apkFile ? format_bytes($apkFile['size']) : '34 MB' ?></span>
              <span class="divider" aria-hidden="true">•</span>
              <span id="dl-date">Updated <?= date('M Y') ?></span>
            </p>
            <p class="download-desc">AI Assistant with Voice, Tamil/Tanglish support, File attachments, and Pro plans.</p>
          </div>
        </div>
        <div class="download-actions">
          <a class="btn primary btn-xl" id="apk-download" href="<?= htmlspecialchars($apkUrl) ?>" download aria-label="Download <?= htmlspecialchars($config['appName']) ?> APK for Android">
            <svg class="btn-icon" viewBox="0 0 24 24" width="22" height="22" aria-hidden="true"><path fill="currentColor" d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg>
            <span>
              <strong>Download APK</strong>
              <span class="btn-sub">v<?= htmlspecialchars($config['latestVersionName']) ?> • <?= $apkFile ? format_bytes($apkFile['size']) : '34 MB' ?></span>
            </span>
          </a>
          <p class="download-note" id="downloadNote">Enable "Install from unknown sources" in Android settings after download.</p>
        </div>
        <details class="download-howto">
          <summary>How to install the APK</summary>
          <ol>
            <li>Tap "Download APK" above</li>
            <li>Open the downloaded file from notifications or Files app</li>
            <li>If prompted, allow installation from this source (Settings → Apps → Special access → Install unknown apps)</li>
            <li>Tap Install, then Open</li>
            <li>Sign in with your Google account</li>
          </ol>
        </details>
      </div>
    </div>
  </section>

  <!-- FAQ -->
  <section class="section alt" id="faq" aria-labelledby="faq-title">
    <div class="wrap">
      <header class="section-header">
        <h2 id="faq-title">Frequently asked questions</h2>
      </header>
      <div class="faq-grid" id="faqGrid">
        <?php
        $faqs = [
          ['q' => 'Is ' . $config['appName'] . ' free to use?', 'a' => 'Yes, ' . $config['appName'] . ' has a free tier with daily usage limits. Optional premium plans unlock priority models and support.'],
          ['q' => 'How do I install the APK?', 'a' => 'Download the APK from this page, open it from your notifications or Files app, and allow installation from unknown sources when prompted. See the download section for step-by-step instructions.'],
          ['q' => 'What languages does it support?', 'a' => 'AI Chat supports English, Tamil, and Tanglish (mixed English-Tamil). The voice assistant auto-detects the language you speak.'],
          ['q' => 'Does the voice assistant use a female voice?', 'a' => 'No — the app uses a natural male voice for all spoken responses.'],
          ['q' => 'Are there automatic renewals for Pro plans?', 'a' => 'No. Pro plans run for their stated duration (31 or 365 days) and then end. There is no auto-renewal.'],
          ['q' => 'How do I get a refund?', 'a' => 'Contact us at ' . $config['contactEmail'] . ' with your account email and Razorpay payment/order reference. Refunds are processed per our policy.'],
          ['q' => 'Is my data private?', 'a' => 'Yes. Your chats stay on your device. We don\'t sell data or show ads. See our Privacy Policy for details.'],
          ['q' => 'What Android version is required?', 'a' => 'Android 8.0 (API 26) or higher.']
        ];
        foreach ($faqs as $f): ?>
        <details class="faq-item">
          <summary><?= htmlspecialchars($f['q']) ?></summary>
          <p><?= htmlspecialchars($f['a']) ?></p>
        </details>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <!-- CONTACT -->
  <section class="section" id="contact" aria-labelledby="contact-title">
    <div class="wrap">
      <header class="section-header">
        <h2 id="contact-title">Contact &amp; Support</h2>
        <p class="muted">We're here to help. Reach out for any questions about the app, payments, or refunds.</p>
      </header>
      <div class="contact-grid">
        <div class="contact-card">
          <h3>Email</h3>
          <a class="contact-link" href="mailto:<?= htmlspecialchars($config['contactEmail']) ?>"><?= htmlspecialchars($config['contactEmail']) ?></a>
          <p class="muted">Best for payment issues, refunds, and technical support</p>
        </div>
        <div class="contact-card">
          <h3>Business</h3>
          <p><?= htmlspecialchars($config['appName']) ?></p>
          <p class="muted">Registered business — invoices available on request</p>
        </div>
        <div class="contact-card">
          <h3>Response time</h3>
          <p>1–2 business days</p>
          <p class="muted">Include your account email and payment reference for faster help</p>
        </div>
      </div>
    </div>
  </section>

</main>

<footer class="site-footer" id="footer" role="contentinfo">
  <div class="wrap footer-inner">
    <div class="footer-brand">
      <a class="brand" href="#top">
        <img src="<?= htmlspecialchars($config['logoUrl'] ?: 'assets/logo.png') ?>" alt="" class="brand-logo" width="36" height="36" />
        <span class="brand-name"><?= htmlspecialchars($config['appName']) ?></span>
      </a>
      <p class="small muted">AI assistant app for Android.</p>
    </div>
    <nav class="footer-nav" aria-label="Footer navigation">
      <div class="footer-col">
        <h4>Product</h4>
        <a href="#features">Features</a>
        <a href="#voice">Voice Assistant</a>
        <a href="#plans">Pricing</a>
        <a href="#download">Download</a>
        <a href="#faq">FAQ</a>
      </div>
      <div class="footer-col">
        <h4>Legal</h4>
        <a href="terms.php">Terms &amp; Conditions</a>
        <a href="privacy.php">Privacy Policy</a>
        <a href="refund.php">Refund &amp; Cancellation</a>
      </div>
      <div class="footer-col">
        <h4>Support</h4>
        <a href="#contact">Contact Us</a>
        <a href="mailto:<?= htmlspecialchars($config['contactEmail']) ?>">Email Support</a>
      </div>
    </nav>
  </div>
  <div class="wrap small muted copyright">
    &copy; <?= date('Y') ?> <?= htmlspecialchars($config['appName']) ?>. All rights reserved.
  </div>
</footer>

<script src="assets/site.js?v=<?= APP_VERSION ?>"></script>
</body>
</html>
<?php
function get_feature_icon_svg($name) {
    $icons = [
        'chat' => '<svg viewBox="0 0 24 24" width="28" height="28"><path fill="currentColor" d="M20 2H4c-1.1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-2 12H6v-2h12v2zm0-3H6V9h12v2zm0-3H6V6h12v2z"/></svg>',
        'write' => '<svg viewBox="0 0 24 24" width="28" height="28"><path fill="currentColor" d="M3 17.25V21h3.75L17.81 9.94l-3.75-3.75L3 17.25zM20.71 7.04a.996.996 0 0 0 0-1.41l-2.34-2.34a.996.996 0 0 0-1.41 0l-1.83 1.83 3.75 3.75 1.83-1.83z"/></svg>',
        'learn' => '<svg viewBox="0 0 24 24" width="28" height="28"><path fill="currentColor" d="M12 3L1 9l11 6 9-4.91V17h2V9L12 3z"/></svg>',
        'translate' => '<svg viewBox="0 0 24 24" width="28" height="28"><path fill="currentColor" d="M12.87 15.07l-2.54 2.51.03.03A17.52 17.52 0 0 0 14 19.08V5h4v14.08a17.52 17.52 0 0 0-1.13-1.92l-.03-.03zM5 4.27L3.27 6 12 14.73V4.27H5zm19.73 10.46L20.73 18 12 9.27V18h7.73z"/></svg>',
        'voice' => '<svg viewBox="0 0 24 24" width="28" height="28"><path fill="currentColor" d="M12 14c1.66 0 3-1.34 3-3V5c0-1.66-1.34-3-3-3S9 3.34 9 5v6c0 1.66 1.34 3 3 3zM17 11c0 2.76-2.24 5-5 5s-5-2.24-5-5H5c0 3.53 2.61 6.43 6 6.92V21h2v-3.08c3.39-.49 6-3.39 6-6.92h-2z"/></svg>',
        'files' => '<svg viewBox="0 0 24 24" width="28" height="28"><path fill="currentColor" d="M14 2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V8l-6-6zm2 16H8v-2h8v2zm0-4H8v-2h8v2zm-3-5V3.5L18.5 9H13z"/></svg>',
        'offline' => '<svg viewBox="0 0 24 24" width="28" height="28"><path fill="currentColor" d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-1 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L9 15v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H8v-2h2.59c.94 0 1.71.71 1.96 1.6l.21.24c.12.12.25.22.39.29.13.06.27.09.41.09.14 0 .27-.03.4-.09.14-.07.27-.17.38-.29l.24-.24c.09-.24.14-.51.14-.79V7c0-.55-.45-1-1-1H9c-.55 0-1 .45-1 1v11.93c0 .81-.59 1.49-1.32 1.69-.35.1-.71.15-1.07.15-.95 0-1.83-.43-2.45-1.09L3 12.53V21h8l2.54-6.54z"/></svg>',
        'privacy' => '<svg viewBox="0 0 24 24" width="28" height="28"><path fill="currentColor" d="M18 8h-1V7c0-2.76-2.24-5-5-5S7 4.24 7 7v1H6c-1.1 0-2 .9-2 2v10c0 1.1.9 2 2 2h12c1.1 0 2-.9 2-2V10c0-1.1-.9-2-2-2zm-6 9c-1.1 0-2-.9-2-2s.9-2 2-2 2 .9 2 2-.9 2-2 2zm3.1-9H8.9V7c0-1.71 1.39-3.1 3.1-3.1 1.71 0 3.1 1.39 3.1 3.1v1z"/></svg>',
        'premium' => '<svg viewBox="0 0 24 24" width="28" height="28"><path fill="currentColor" d="M12 21.35l-1.45-1.32C5.4 15.36 2 12.28 2 8.5 2 5.42 4.42 3 7.5 3c1.74 0 3.41.81 4.5 2.09C13.09 3.81 14.76 3 16.5 3 19.58 3 22 5.42 22 8.5c0 3.78-3.4 6.86-8.55 11.54L12 21.35z"/></svg>'
    ];
    return $icons[$name] ?? $icons['chat'];
}