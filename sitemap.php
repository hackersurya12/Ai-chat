<?php
/**
 * Dynamic Sitemap Generator
 * Outputs XML sitemap for search engines
 */

require_once __DIR__ . '/config.php';

header('Content-Type: application/xml; charset=utf-8');
header('Cache-Control: public, max-age=3600'); // Cache for 1 hour

$baseUrl = 'https://' . $_SERVER['HTTP_HOST'];
$pages = [
    '' => ['changefreq' => 'daily', 'priority' => 1.0],
    'features' => ['changefreq' => 'weekly', 'priority' => 0.8],
    'how-it-works' => ['changefreq' => 'monthly', 'priority' => 0.7],
    'voice' => ['changefreq' => 'monthly', 'priority' => 0.8],
    'plans' => ['changefreq' => 'weekly', 'priority' => 0.9],
    'screenshots' => ['changefreq' => 'monthly', 'priority' => 0.6],
    'download' => ['changefreq' => 'daily', 'priority' => 0.9],
    'faq' => ['changefreq' => 'weekly', 'priority' => 0.7],
    'contact' => ['changefreq' => 'monthly', 'priority' => 0.7],
    'terms' => ['changefreq' => 'yearly', 'priority' => 0.3],
    'privacy' => ['changefreq' => 'yearly', 'priority' => 0.3],
    'refund' => ['changefreq' => 'yearly', 'priority' => 0.3],
];

echo '<?xml version="1.0" encoding="UTF-8"?>' . "\n";
echo '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . "\n";

foreach ($pages as $path => $meta) {
    $url = $baseUrl . '/' . ($path ? $path : '');
    $lastmod = date('Y-m-d');
    echo "  <url>\n";
    echo "    <loc>" . htmlspecialchars($url) . "</loc>\n";
    echo "    <lastmod>$lastmod</lastmod>\n";
    echo "    <changefreq>{$meta['changefreq']}</changefreq>\n";
    echo "    <priority>{$meta['priority']}</priority>\n";
    echo "  </url>\n";
}

echo '</urlset>';