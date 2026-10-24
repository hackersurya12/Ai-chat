<?php
require_once __DIR__ . '/config.php';
$pageTitle = 'Terms & Conditions';
$pageDescription = 'Terms and Conditions for ' . $config['appName'] . ' AI Assistant App.';
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
      <a href="contact.php">Contact</a>
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
        <p class="updated">Last updated: <?= date('F j, Y') ?></p>
      </header>

      <article class="legal-content">
        <section>
          <h2>1. Acceptance of Terms</h2>
          <p>By downloading, installing, or using the <?= htmlspecialchars($config['appName']) ?> mobile application ("App"), you agree to be bound by these Terms and Conditions ("Terms"). If you do not agree, do not use the App.</p>
        </section>

        <section>
          <h2>2. Description of Service</h2>
          <p><?= htmlspecialchars($config['appName']) ?> is an AI-powered assistant application for Android devices. It provides text and voice-based AI assistance including answering questions, writing help, translation, learning support, and file analysis. Premium features are available via optional paid plans.</p>
        </section>

        <section>
          <h2>3. User Accounts</h2>
          <p>You must sign in with a Google account to use the App. You are responsible for maintaining the confidentiality of your account and for all activities under your account. We use Firebase Authentication for secure sign-in.</p>
        </section>

        <section>
          <h2>4. Premium Plans</h2>
          <p>Optional premium plans ("Pro Plans") are available for purchase within the App. Plans are billed in Indian Rupees (INR) through our payment partner Razorpay.</p>
          <ul>
            <li><strong>No auto-renewal:</strong> Plans run for their stated duration (31 or 365 days) and then expire.</li>
            <li><strong>Pricing:</strong> Prices shown in the App include applicable taxes.</li>
            <li><strong>Refunds:</strong> Subject to our Refund & Cancellation Policy.</li>
          </ul>
        </section>

        <section>
          <h2>5. Acceptable Use</h2>
          <p>You agree not to:</p>
          <ul>
            <li>Use the App for illegal activities or to generate harmful content</li>
            <li>Attempt to reverse engineer, decompile, or extract source code</li>
            <li>Interfere with the App's servers or other users' access</li>
            <li>Share your account credentials or allow unauthorized access</li>
            <li>Violate any applicable laws or third-party rights</li>
          </ul>
        </section>

        <section>
          <h2>6. Intellectual Property</h2>
          <p>The App, its content, features, and functionality are owned by <?= htmlspecialchars($config['appName']) ?> and are protected by copyright, trademark, and other intellectual property laws. You receive a limited, non-exclusive, non-transferable license to use the App for personal, non-commercial purposes.</p>
        </section>

        <section>
          <h2>7. Privacy</h2>
          <p>Your use of the App is also governed by our <a href="privacy.php">Privacy Policy</a>. We do not sell your data. Conversations are stored locally on your device.</p>
        </section>

        <section>
          <h2>8. Disclaimers</h2>
          <p>The App is provided "as is" and "as available" without warranties of any kind. AI-generated responses may be inaccurate, incomplete, or inappropriate. You should verify important information independently. We do not guarantee uninterrupted or error-free service.</p>
        </section>

        <section>
          <h2>9. Limitation of Liability</h2>
          <p>To the maximum extent permitted by law, <?= htmlspecialchars($config['appName']) ?> shall not be liable for any indirect, incidental, special, consequential, or punitive damages, or any loss of profits, data, or goodwill arising from your use of the App.</p>
        </section>

        <section>
          <h2>10. Termination</h2>
          <p>We may suspend or terminate your access to the App if you violate these Terms. Upon termination, your right to use the App ceases immediately. Provisions that should survive termination will survive.</p>
        </section>

        <section>
          <h2>11. Changes to Terms</h2>
          <p>We may update these Terms from time to time. Continued use of the App after changes constitutes acceptance. We will notify you of material changes via the App or email.</p>
        </section>

        <section>
          <h2>12. Governing Law</h2>
          <p>These Terms are governed by the laws of India. Disputes will be resolved in the courts of the relevant jurisdiction.</p>
        </section>

        <section>
          <h2>13. Contact</h2>
          <p>Questions about these Terms? Contact us at <a href="mailto:<?= htmlspecialchars($config['contactEmail']) ?>"><?= htmlspecialchars($config['contactEmail']) ?></a>.</p>
        </section>
      </article>
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