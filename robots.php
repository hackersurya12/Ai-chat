<?php
/**
 * Dynamic Robots.txt Generator
 */

require_once __DIR__ . '/config.php';

header('Content-Type: text/plain; charset=utf-8');
header('Cache-Control: public, max-age=86400'); // Cache for 1 day

$baseUrl = 'https://' . $_SERVER['HTTP_HOST'];

echo "User-agent: *\n";
echo "Allow: /\n\n";
echo "Sitemap: $baseUrl/sitemap.xml\n\n";
echo "# Disallow admin/private areas\n";
echo "Disallow: /cache/\n";
echo "Disallow: /config.php\n";
echo "Disallow: /composer.json\n";
echo "Disallow: /composer.lock\n";
echo "Disallow: /README.md\n";
echo "Disallow: /nginx.conf\n";
echo "Disallow: /.htaccess\n";
echo "Disallow: /*.log$\n";