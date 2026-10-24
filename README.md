# AI Chat Website - PHP Version

A modern, responsive landing page for the AI Chat Android app with real-time Supabase integration.

## Features

- **Real-time Supabase Connection**: Fetches app config, plans, and uploaded files from Supabase
- **Modern UI/UX**: Clean, responsive design with Inter font, smooth animations, mobile-first
- **Live Data**: APK download link, version info, pricing plans all from Supabase
- **PHP 8.1+**: Modern PHP with proper error handling, caching, and security
- **SEO Optimized**: Semantic HTML, meta tags, structured data ready
- **Legal Pages**: Terms, Privacy, Refund, Contact with dynamic content
- **Accessibility**: WCAG 2.1 AA compliant, keyboard navigation, screen reader support

## Quick Start

### Requirements
- PHP 8.1 or higher
- Composer (for dependencies - optional)
- Web server (Apache/Nginx) with PHP-FPM
- SSL certificate (Let's Encrypt recommended)

### Installation

1. **Clone/Upload** the `website-php` folder to your web root:
   ```bash
   cp -r website-php /var/www/ai-chat
   ```

2. **Configure Supabase** in `config.php`:
   ```php
   define('SUPABASE_URL', 'https://your-project.supabase.co');
   define('SUPABASE_ANON_KEY', 'your-anon-key');
   define('SUPABASE_SERVICE_KEY', 'your-service-role-key'); // Optional, for admin operations
   ```

3. **Set up web server**:

   **Apache** (with mod_rewrite):
   ```apache
   <VirtualHost *:443>
       DocumentRoot /var/www/ai-chat/website-php
       ServerName ai-chat.example.com
       # SSL config...
       # Use .htaccess for rewriting
   </VirtualHost>
   ```

   **Nginx** (with PHP-FPM):
   ```bash
   cp nginx.conf /etc/nginx/sites-available/ai-chat
   ln -s /etc/nginx/sites-available/ai-chat /etc/nginx/sites-enabled/
   nginx -t && systemctl reload nginx
   ```

4. **Set permissions**:
   ```bash
   chown -R www-data:www-data /var/www/ai-chat
   chmod 755 /var/www/ai-chat/cache
   ```

5. **Test**: Visit `https://your-domain.com` - should show the landing page with live data from Supabase.

## Supabase Setup

### Database Tables

Run these in Supabase SQL Editor:

```sql
-- Config table
CREATE TABLE config (
  id text PRIMARY KEY DEFAULT 'app',
  "appName" text DEFAULT 'AI Chat',
  "logoUrl" text,
  "apkUrl" text,
  "latestVersionName" text DEFAULT '1.1.9',
  "latestVersionCode" integer DEFAULT 10,
  "contactEmail" text DEFAULT 'support@example.com',
  "contactPhone" text,
  "contactAddress" text,
  "updateMandatory" boolean DEFAULT false,
  "updateTitle" text DEFAULT 'Update available',
  "updateNotes" text,
  created_at timestamptz DEFAULT now(),
  updated_at timestamptz DEFAULT now()
);

-- Plans table
CREATE TABLE plans (
  id text PRIMARY KEY,
  title text NOT NULL,
  description text,
  amount integer NOT NULL, -- in paise (₹1000 = ₹10)
  currency text DEFAULT 'INR',
  "durationDays" integer NOT NULL,
  active boolean DEFAULT true,
  "sortOrder" integer DEFAULT 0,
  created_at timestamptz DEFAULT now()
);

-- Insert default config
INSERT INTO config (id) VALUES ('app') ON CONFLICT DO NOTHING;

-- Insert default plans
INSERT INTO plans (id, title, description, amount, "durationDays", "sortOrder") VALUES
  ('pro_monthly', 'Pro Monthly Special', 'Unlock premium models and priority support.', 1000, 31, 1),
  ('pro_yearly', 'Pro Yearly', 'Best value — 12 months of Pro.', 199900, 365, 2)
ON CONFLICT (id) DO NOTHING;

-- RLS Policies
ALTER TABLE config ENABLE ROW LEVEL SECURITY;
ALTER TABLE plans ENABLE ROW LEVEL SECURITY;

-- Public read access for website
CREATE POLICY "Public read config" ON config FOR SELECT USING (true);
CREATE POLICY "Public read plans" ON plans FOR SELECT USING (active = true);

-- Admin write access (requires service role)
CREATE POLICY "Admin write config" ON config FOR ALL USING (auth.role() = 'service_role');
CREATE POLICY "Admin write plans" ON plans FOR ALL USING (auth.role() = 'service_role');
```

### Storage Buckets

Create bucket `app` (public) for:
- `app/logo.png` - App logo
- `app/aichat-*.apk` - APK files
- `app/site/*` - Website assets

## Caching

The site uses file-based caching (5-minute TTL by default) in `/cache`. Adjust in `config.php`:
```php
define('CACHE_TTL', 300); // seconds
```

Clear cache manually:
```bash
rm -rf /var/www/ai-chat/website-php/cache/*
```

## File Structure

```
website-php/
├── index.php           # Main landing page
├── terms.php           # Terms & Conditions
├── privacy.php         # Privacy Policy
├── refund.php          # Refund & Cancellation
├── contact.php         # Contact & Support
├── config.php          # Supabase config & helpers
├── .htaccess           # Apache config
├── nginx.conf          # Nginx config
├── robots.txt          # Robots.txt
├── README.md           # This file
├── assets/
│   ├── styles.css      # Main stylesheet
│   ├── site.js         # Client-side JS
│   ├── logo.png        # App logo
│   └── screenshot-*.png # App screenshots
└── cache/              # Auto-created, file cache
```

## Customization

### Colors
Edit CSS variables in `assets/styles.css`:
```css
:root {
  --brand: #7c5cff;      /* Primary purple */
  --brand-dark: #5b3fd6; /* Darker purple */
  --brand-light: #f4f0ff;/* Light purple */
  --text: #1a1a2e;       /* Dark text */
  --muted: #6b7280;      /* Muted text */
  /* ... */
}
```

### Content
- Update plans in Supabase `plans` table
- Update app info in Supabase `config` table
- Upload new APKs to Supabase Storage `app/` bucket
- Screenshots: add `assets/screenshot-*.png` and update `$screenshots` array in `index.php`

## Analytics

Add your analytics in `assets/site.js` `boot()` function:
```javascript
// Google Analytics
gtag('config', 'GA_MEASUREMENT_ID');

// Or custom analytics endpoint
fetch('/analytics', { method: 'POST', body: JSON.stringify({...}) });
```

## Deployment Checklist

- [ ] Supabase credentials configured in `config.php`
- [ ] SSL certificate installed (Let's Encrypt)
- [ ] Web server configured (Apache/Nginx)
- [ ] PHP 8.1+ with required extensions (curl, json, mbstring)
- [ ] Cache directory writable
- [ ] `robots.txt` accessible
- [ ] Sitemap generated (optional)
- [ ] Error logging configured
- [ ] CSP headers tested
- [ ] Mobile responsive tested
- [ ] All legal pages reviewed

## Security Notes

- Never commit `config.php` with real keys to version control
- Use environment variables for production:
  ```php
  define('SUPABASE_ANON_KEY', $_ENV['SUPABASE_ANON_KEY'] ?? '');
  ```
- Keep PHP and server updated
- Monitor error logs: `tail -f /var/log/php_errors.log`

## Support

For issues or questions, contact: suryaarun5@gmail.com