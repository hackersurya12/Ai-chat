<?php
require_once __DIR__ . '/config.php';
$pageTitle = 'Privacy Policy';
$pageDescription = 'Privacy Policy for ' . $config['appName'] . ' AI Assistant App.';
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
        <p><strong><?= htmlspecialchars($config['appName']) ?></strong> ("we", "us", "our") respects your privacy. This policy explains what data we collect, how we use it, and your rights.</p>

        <section>
          <h2>1. Data We Collect</h2>
          <h3>Account Information</h3>
          <ul>
            <li>Google account email and profile name (via Firebase Authentication)</li>
            <li>User ID (Firebase UID)</li>
          </ul>
          <h3>Usage Data</h3>
          <ul>
            <li>App version, device model, OS version</li>
            <li>Feature usage (chat, voice, file uploads)</li>
            <li>Error logs and crash reports (anonymized)</li>
          </ul>
          <h3>Payment Data</h3>
          <ul>
            <li>Razorpay order ID, payment ID, signature</li>
            <li>Plan purchased, amount, currency</li>
            <li>No credit card details stored on our servers</li>
          </ul>
          <h3>Content You Provide</h3>
          <ul>
            <li>Chat messages, voice recordings, uploaded files</li>
            <li>Stored locally on your device by default</li>
            <li>Synced to Firestore only when you're signed in</li>
          </ul>
        </section>

        <section>
          <h2>2. How We Use Your Data</h2>
          <ul>
            <li>Provide and improve the App's AI features</li>
            <li>Authenticate and secure your account</li>
            <li>Process payments and manage Pro Plans</li>
            <li>Send important updates (security, billing)</li>
            <li>Comply with legal obligations</li>
          </ul>
          <p>We do <strong>not</strong> sell your data. We do <strong>not</strong> use your conversations for advertising.</p>
        </section>

        <section>
          <h2>3. Data Storage & Security</h2>
          <ul>
            <li><strong>Local-first:</strong> Chats and files stay on your device unless you enable cloud sync</li>
            <li><strong>Encryption:</strong> Data in transit via TLS 1.2+; at rest via Firebase/Supabase encryption</li>
            <li><strong>Access control:</strong> Only you can access your data (Firebase UID-based rules)</li>
            <li><strong>Retention:</strong> Account data kept while account is active; deleted within 30 days of account deletion</li>
          </ul>
        </section>

        <section>
          <h2>4. Third-Party Services</h2>
          <table>
            <thead><tr><th>Service</th><th>Purpose</th><th>Data Shared</th></tr></thead>
            <tbody>
              <tr><td>Firebase Authentication</td><td>Google Sign-In</td><td>Email, name, UID</td></tr>
              <tr><td>Firebase Firestore</td><td>Cloud sync, config</td><td>Chat history (if synced), preferences</td></tr>
              <tr><td>Firebase Cloud Messaging</td><td>Push notifications</td><td>FCM token</td></tr>
              <tr><td>Razorpay</td><td>Payment processing</td><td>Order amount, email, phone (if provided)</td></tr>
              <tr><td>Supabase</td><td>Config, file storage</td><td>App config, uploaded APKs, images</td></tr>
              <tr><td>Google Speech/ML Kit</td><td>Voice input</td><td>Audio (processed on-device when possible)</td></tr>
            </tbody>
          </table>
        </section>

        <section>
          <h2>5. Your Rights</h2>
          <p>Under applicable law (including India's DPDP Act), you may:</p>
          <ul>
            <li>Access your personal data</li>
            <li>Request correction of inaccurate data</li>
            <li>Request deletion of your account and data</li>
            <li>Export your data</li>
            <li>Opt out of non-essential communications</li>
          </ul>
          <p>To exercise these rights, email <a href="mailto:<?= htmlspecialchars($config['contactEmail']) ?>"><?= htmlspecialchars($config['contactEmail']) ?></a>.</p>
        </section>

        <section>
          <h2>6. Children's Privacy</h2>
          <p>The App is not directed to children under 13. We do not knowingly collect data from children under 13. If you believe a child has provided data, contact us for deletion.</p>
        </section>

        <section>
          <h2>7. International Transfers</h2>
          <p>Your data may be processed on servers outside India (Firebase, Supabase, Razorpay use global infrastructure). We ensure appropriate safeguards (standard contractual clauses, adequacy decisions).</p>
        </section>

        <section>
          <h2>8. Changes to This Policy</h2>
          <p>We may update this policy. Material changes will be notified via the App or email. Continued use constitutes acceptance.</p>
        </section>

        <section>
          <h2>9. Contact</h2>
          <p>Privacy questions? Email <a href="mailto:<?= htmlspecialchars($config['contactEmail']) ?>"><?= htmlspecialchars($config['contactEmail']) ?></a>.</p>
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