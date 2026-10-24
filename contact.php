<?php
require_once __DIR__ . '/config.php';
$pageTitle = 'Contact & Support';
$pageDescription = 'Contact AI Chat support for help with the app, payments, refunds, or general questions.';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title><?= htmlspecialchars($pageTitle) ?> — <?= htmlspecialchars($config['appName']) ?></title>
<meta name="description" content="<?= htmlspecialchars($pageDescription) ?>" />
<link rel="icon" href="<?= htmlspecialchars($config['logoUrl'] ?: 'assets/logo.png') ?>" />
<link rel="stylesheet" href="assets/styles.css?v=<?= APP_VERSION ?>" />
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" />
</head>
<body>

<header class="site-header" id="header" role="banner">
  <div class="wrap header-inner">
    <a class="brand" href="index.php" aria-label="<?= htmlspecialchars($config['appName']) ?> - Home">
      <img src="<?= htmlspecialchars($config['logoUrl'] ?: 'assets/logo.png') ?>" alt="" class="brand-logo" width="36" height="36" />
      <span class="brand-name"><?= htmlspecialchars($config['appName']) ?></span>
    </a>
    <nav class="nav" id="nav" role="navigation" aria-label="Main navigation">
      <a href="index.php#features">Features</a>
      <a href="index.php#plans">Pricing</a>
      <a href="index.php#download">Download</a>
    </nav>
    <button class="nav-toggle" id="navToggle" aria-label="Toggle menu" aria-expanded="false" aria-controls="nav">
      <span class="hamburger"></span>
    </button>
  </div>
</header>

<main id="main" role="main">
  <section class="page" aria-labelledby="page-title">
    <div class="wrap">
      <header class="section-header">
        <h1 id="page-title"><?= htmlspecialchars($pageTitle) ?></h1>
        <p class="updated">We usually respond within 1–2 business days.</p>
      </header>

      <div class="contact-grid">
        <div class="contact-card">
          <h3>Email Support</h3>
          <a class="contact-link" href="mailto:<?= htmlspecialchars($config['contactEmail']) ?>?subject=AI%20Chat%20Support"><?= htmlspecialchars($config['contactEmail']) ?></a>
          <p class="muted">Best for: payment issues, refunds, technical bugs, account help</p>
          <p class="small muted">Include your account email and any error messages for faster help.</p>
        </div>

        <div class="contact-card">
          <h3>Business Information</h3>
          <p><?= htmlspecialchars($config['appName']) ?></p>
          <p class="muted">Registered business — GST invoices available on request</p>
          <?php if ($config['contactPhone']): ?>
          <p><a href="tel:<?= htmlspecialchars($config['contactPhone']) ?>"><?= htmlspecialchars($config['contactPhone']) ?></a></p>
          <?php endif; ?>
          <?php if ($config['contactAddress']): ?>
          <p class="small muted"><?= htmlspecialchars($config['contactAddress']) ?></p>
          <?php endif; ?>
        </div>

        <div class="contact-card">
          <h3>Quick Help</h3>
          <ul class="contact-list" style="list-style:none;padding:0;margin:0;text-align:left;">
            <li style="margin:8px 0;"><a href="index.php#download">Download Issues</a></li>
            <li style="margin:8px 0;"><a href="refund.php">Refund Request</a></li>
            <li style="margin:8px 0;"><a href="privacy.php">Privacy Questions</a></li>
            <li style="margin:8px 0;"><a href="terms.php">Terms Questions</a></li>
          </ul>
        </div>
      </div>

      <section style="margin-top: 48px; padding-top: 32px; border-top: 1px solid var(--line);">
        <h2>Before You Contact Us</h2>
        <div class="steps-grid" style="margin-top: 24px;">
          <article class="step-card">
            <div class="step-number">1</div>
            <h3>Check the FAQ</h3>
            <p><a href="index.php#faq">Most common questions</a> are answered there.</p>
          </article>
          <article class="step-card">
            <div class="step-number">2</div>
            <h3>Restart the App</h3>
            <p>Force close and reopen — fixes many temporary issues.</p>
          </article>
          <article class="step-card">
            <div class="step-number">3</div>
            <h3>Update the App</h3>
            <p>Ensure you're on the latest version from <a href="index.php#download">this page</a>.</p>
          </article>
        </div>
      </section>

      <section style="margin-top: 48px; padding-top: 32px; border-top: 1px solid var(--line);">
        <h2>What to Include in Your Email</h2>
        <p>For fastest resolution, please include:</p>
        <ul>
          <li>Your account email (used to sign in)</li>
          <li>App version (Settings → About)</li>
          <li>Device model and Android version</li>
          <li>What you were doing when the issue occurred</li>
          <li>Screenshots or screen recordings if possible</li>
          <li>For payments: Razorpay Payment ID and Order ID</li>
        </ul>
      </section>

      <section style="margin-top: 48px; padding-top: 32px; border-top: 1px solid var(--line);">
        <h2>Press & Business Inquiries</h2>
        <p>For partnerships, press, or business development, email <a href="mailto:<?= htmlspecialchars($config['contactEmail']) ?>?subject=Business%20Inquiry"><?= htmlspecialchars($config['contactEmail']) ?></a> with "Business Inquiry" in the subject line.</p>
      </section>
    </div>
  </section>
</main>

<footer class="site-footer" id="footer" role="contentinfo">
  <div class="wrap footer-inner">
    <div class="footer-brand">
      <a class="brand" href="index.php">
        <img src="<?= htmlspecialchars($config['logoUrl'] ?: 'assets/logo.png') ?>" alt="" class="brand-logo" width="36" height="36" />
        <span class="brand-name"><?= htmlspecialchars($config['appName']) ?></span>
      </a>
      <p class="small muted">AI assistant app for Android.</p>
    </div>
    <nav class="footer-nav" aria-label="Footer navigation">
      <div class="footer-col">
        <h4>Product</h4>
        <a href="index.php#features">Features</a>
        <a href="index.php#plans">Pricing</a>
        <a href="index.php#download">Download</a>
      </div>
      <div class="footer-col">
        <h4>Legal</h4>
        <a href="terms.php">Terms &amp; Conditions</a>
        <a href="privacy.php">Privacy Policy</a>
        <a href="refund.php">Refund &amp; Cancellation</a>
      </div>
      <div class="footer-col">
        <h4>Support</h4>
        <a href="contact.php">Contact Us</a>
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