<?php
require_once __DIR__ . '/config.php';
$pageTitle = 'Refund & Cancellation Policy';
$pageDescription = 'Refund and Cancellation Policy for ' . $config['appName'] . ' Pro Plans.';
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
        <p>This policy applies to Pro Plan purchases made in the <?= htmlspecialchars($config['appName']) ?> App via Razorpay.</p>

        <section>
          <h2>1. No Auto-Renewal</h2>
          <p>Pro Plans are one-time purchases for a fixed duration (31 days for Monthly, 365 days for Yearly). Plans <strong>do not auto-renew</strong>. Access expires at the end of the period unless you purchase a new plan.</p>
        </section>

        <section>
          <h2>2. Refund Eligibility</h2>
          <p>Refunds are available under the following conditions:</p>
          <ul>
            <li><strong>Technical failure:</strong> If Pro features are inaccessible due to a bug on our end for more than 48 hours after reporting</li>
            <li><strong>Duplicate charge:</strong> If you were charged multiple times for the same plan</li>
            <li><strong>Non-delivery:</strong> If the plan was not activated within 1 hour of successful payment</li>
          </ul>
          <p>Refunds are <strong>not</strong> granted for:</p>
          <ul>
            <li>Change of mind</li>
            <li>Not using the Pro features</li>
            <li>Device incompatibility (check Android 8+ requirement before purchase)</li>
            <li>Network/connectivity issues on your end</li>
          </ul>
        </section>

        <section>
          <h2>3. Refund Request Process</h2>
          <ol>
            <li>Email <a href="mailto:<?= htmlspecialchars($config['contactEmail']) ?>"><?= htmlspecialchars($config['contactEmail']) ?></a> within <strong>7 days</strong> of purchase</li>
            <li>Include: your account email, Razorpay Payment ID, Order ID, and reason</li>
            <li>We review within 2 business days</li>
            <li>Approved refunds processed to original payment method within 5-10 business days</li>
          </ol>
        </section>

        <section>
          <h2>4. Cancellation</h2>
          <p>Since plans don't auto-renew, there's no subscription to cancel. If you purchased a plan and want to stop using Pro features immediately, you can continue using them until the period ends. No prorated refunds for unused time.</p>
        </section>

        <section>
          <h2>5. Disputed Charges</h2>
          <p>If you dispute a charge with your bank/card issuer without contacting us first, we reserve the right to revoke Pro access and may block future purchases. Please contact us first — we resolve most issues quickly.</p>
        </section>

        <section>
          <h2>6. Regional Considerations (India)</h2>
          <p>Refunds comply with RBI guidelines and the Consumer Protection Act, 2019. For failed transactions, Razorpay auto-refunds within T+1 days. For merchant-initiated refunds, processing follows Razorpay's settlement cycle.</p>
        </section>

        <section>
          <h2>7. Contact</h2>
          <p>Refund requests and questions: <a href="mailto:<?= htmlspecialchars($config['contactEmail']) ?>"><?= htmlspecialchars($config['contactEmail']) ?></a></p>
          <p>Include: Account email, Payment ID, Order ID, Date, Amount, Reason.</p>
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