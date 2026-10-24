<?php
/**
 * AI Chat Website - Supabase Configuration
 * PHP 8.1+ required
 */

// Supabase Configuration
define('SUPABASE_URL', 'https://dwxgrmahesmacnjfvegy.supabase.co');
define('SUPABASE_ANON_KEY', 'eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJpc3MiOiJzdXBhYmFzZSIsInJlZiI6ImR3eGdybWFoZXNtYWNuamZ2ZWd5Iiwicm9sZSI6ImFub24iLCJpYXQiOjE3OTI2NzU4MzcsImV4cCI6MjEwODI1MTgzN30.FzQJQJQJQJQJQJQJQJQJQJQJQJQJQJQJQJQJQJQJQJQ');

// Service Role Key - Get from Supabase Dashboard > Settings > API > service_role key
// Keep secret! Only use server-side. Can also set via $_ENV['SUPABASE_SERVICE_KEY']
define('SUPABASE_SERVICE_KEY', $_ENV['SUPABASE_SERVICE_KEY'] ?? '');

// Database Configuration
define('SUPABASE_DB_URL', SUPABASE_URL . '/rest/v1');
define('SUPABASE_STORAGE_URL', SUPABASE_URL . '/storage/v1');

// App Configuration
define('APP_NAME', 'AI Chat');
define('APP_VERSION', '1.1.9');
define('APP_BUILD', 10);
define('CONTACT_EMAIL', 'suryaarun5@gmail.com');

// Cache Configuration
define('CACHE_TTL', 300); // 5 minutes
define('CACHE_DIR', __DIR__ . '/cache');

// Ensure cache directory exists
if (!is_dir(CACHE_DIR)) {
    mkdir(CACHE_DIR, 0755, true);
}

/**
 * Supabase HTTP Client
 */
class SupabaseClient {
    private $url;
    private $key;
    private $serviceKey;
    private $ch;
    
    public function __construct($url, $anonKey, $serviceKey = '') {
        $this->url = rtrim($url, '/');
        $this->key = $anonKey;
        $this->serviceKey = $serviceKey;
        $this->ch = curl_init();
        curl_setopt_array($this->ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_CONNECTTIMEOUT => 10,
            CURLOPT_SSL_VERIFYPEER => true,
            CURLOPT_HTTPHEADER => [
                'apikey: ' . $this->key,
                'Authorization: Bearer ' . $this->key,
                'Content-Type: application/json',
                'Prefer: return=minimal'
            ]
        ]);
    }
    
    public function __destruct() {
        if ($this->ch) curl_close($this->ch);
    }
    
    private function request($method, $endpoint, $params = [], $body = null, $useServiceKey = false) {
        $url = $this->url . $endpoint;
        if ($params) {
            $url .= '?' . http_build_query($params);
        }
        
        $headers = [
            'apikey: ' . ($useServiceKey && $this->serviceKey ? $this->serviceKey : $this->key),
            'Authorization: Bearer ' . ($useServiceKey && $this->serviceKey ? $this->serviceKey : $this->key),
            'Content-Type: application/json'
        ];
        
        if ($method === 'GET' && strpos($endpoint, '/storage/') !== false) {
            $headers[] = 'Accept: application/json';
        }
        
        curl_setopt_array($this->ch, [
            CURLOPT_URL => $url,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => $headers
        ]);
        
        if ($body) {
            curl_setopt($this->ch, CURLOPT_POSTFIELDS, json_encode($body));
        }
        
        $response = curl_exec($this->ch);
        $httpCode = curl_getinfo($this->ch, CURLINFO_HTTP_CODE);
        $error = curl_error($this->ch);
        
        if ($error) {
            error_log("Supabase cURL error: $error");
            return ['error' => $error, 'code' => 0];
        }
        
        $data = json_decode($response, true);
        
        if ($httpCode >= 400) {
            error_log("Supabase API error ($httpCode): " . print_r($data, true));
            return ['error' => $data, 'code' => $httpCode];
        }
        
        return ['data' => $data, 'code' => $httpCode];
    }
    
    // Database methods
    public function select($table, $columns = '*', $filters = [], $options = []) {
        $params = ['select' => $columns];
        foreach ($filters as $k => $v) {
            if (is_array($v)) {
                $params[$k] = $v[0] . '.' . $v[1];
            } else {
                $params[$k] = "eq.$v";
            }
        }
        if (!empty($options['order'])) {
            $params['order'] = $options['order'];
        }
        if (!empty($options['limit'])) {
            $params['limit'] = $options['limit'];
        }
        if (!empty($options['offset'])) {
            $params['offset'] = $options['offset'];
        }
        return $this->request('GET', "/$table", $params);
    }
    
    public function single($table, $filters = [], $columns = '*') {
        $result = $this->select($table, $columns, $filters, ['limit' => 1]);
        if (isset($result['data'][0])) {
            return ['data' => $result['data'][0], 'code' => $result['code']];
        }
        return ['data' => null, 'code' => 404];
    }
    
    // Storage methods
    public function listFiles($bucket, $prefix = '', $options = []) {
        $body = array_merge([
            'prefix' => $prefix,
            'limit' => 100,
            'offset' => 0,
            'sortBy' => ['column' => 'name', 'order' => 'asc']
        ], $options);
        return $this->request('POST', "/object/list/$bucket", [], $body, true);
    }
    
    public function getPublicUrl($bucket, $path) {
        return SUPABASE_URL . "/storage/v1/object/public/$bucket/" . ltrim($path, '/');
    }
    
    public function getSignedUrl($bucket, $path, $expiresIn = 3600) {
        return $this->request('POST', "/object/sign/$bucket/" . ltrim($path, '/'), [], ['expiresIn' => $expiresIn], true);
    }
    
    public function deleteFile($bucket, $path) {
        return $this->request('DELETE', "/object/$bucket/" . ltrim($path, '/'), [], null, true);
    }
}

// Initialize client
$supabase = new SupabaseClient(SUPABASE_DB_URL, SUPABASE_ANON_KEY, SUPABASE_SERVICE_KEY);

/**
 * Cache helper
 */
function cache_get($key) {
    $file = CACHE_DIR . '/' . md5($key) . '.cache';
    if (file_exists($file)) {
        $data = json_decode(file_get_contents($file), true);
        if ($data && $data['expires'] > time()) {
            return $data['value'];
        }
        unlink($file);
    }
    return null;
}

function cache_set($key, $value, $ttl = CACHE_TTL) {
    $file = CACHE_DIR . '/' . md5($key) . '.cache';
    file_put_contents($file, json_encode([
        'value' => $value,
        'expires' => time() + $ttl
    ]));
}

/**
 * Fetch app config from Supabase
 */
function get_app_config($supabase) {
    $cached = cache_get('app_config');
    if ($cached) return $cached;
    
    $result = $supabase->single('config/app', ['id' => 'app'], '*,plans(*)');
    
    if ($result['data']) {
        $data = $result['data'];
        $config = [
            'appName' => $data['appName'] ?? APP_NAME,
            'logoUrl' => $data['logoUrl'] ?? '',
            'apkUrl' => $data['apkUrl'] ?? '',
            'latestVersionName' => $data['latestVersionName'] ?? APP_VERSION,
            'latestVersionCode' => $data['latestVersionCode'] ?? APP_BUILD,
            'contactEmail' => $data['contactEmail'] ?? CONTACT_EMAIL,
            'contactPhone' => $data['contactPhone'] ?? '',
            'contactAddress' => $data['contactAddress'] ?? '',
            'updateMandatory' => $data['updateMandatory'] ?? false,
            'updateTitle' => $data['updateTitle'] ?? 'Update available',
            'updateNotes' => $data['updateNotes'] ?? '',
            'plans' => []
        ];
        
        if (isset($data['plans']) && is_array($data['plans'])) {
            foreach ($data['plans'] as $plan) {
                if (($plan['active'] ?? true) === true) {
                    $config['plans'][] = [
                        'id' => $plan['id'],
                        'title' => $plan['title'],
                        'description' => $plan['description'] ?? '',
                        'amount' => (int)($plan['amount'] ?? 0),
                        'currency' => $plan['currency'] ?? 'INR',
                        'durationDays' => (int)($plan['durationDays'] ?? 0),
                        'sortOrder' => (int)($plan['sortOrder'] ?? 0)
                    ];
                }
            }
            usort($config['plans'], fn($a, $b) => $a['sortOrder'] <=> $b['sortOrder']);
        }
        
        cache_set('app_config', $config);
        return $config;
    }
    
    return [
        'appName' => APP_NAME,
        'logoUrl' => '',
        'apkUrl' => '',
        'latestVersionName' => APP_VERSION,
        'latestVersionCode' => APP_BUILD,
        'contactEmail' => CONTACT_EMAIL,
        'contactPhone' => '',
        'contactAddress' => '',
        'updateMandatory' => false,
        'updateTitle' => 'Update available',
        'updateNotes' => '',
        'plans' => [
            ['id' => 'pro_monthly', 'title' => 'Pro Monthly Special', 'description' => 'Unlock premium models and priority support.', 'amount' => 1000, 'currency' => 'INR', 'durationDays' => 31],
            ['id' => 'pro_yearly', 'title' => 'Pro Yearly', 'description' => 'Best value — 12 months of Pro.', 'amount' => 199900, 'currency' => 'INR', 'durationDays' => 365]
        ]
    ];
}

/**
 * Fetch uploaded files from Supabase Storage
 */
function get_uploaded_files($supabase) {
    $cached = cache_get('uploaded_files');
    if ($cached) return $cached;
    
    $result = $supabase->listFiles('app', 'app/');
    $files = [];
    
    if (isset($result['data']) && is_array($result['data'])) {
        foreach ($result['data'] as $file) {
            if (!isset($file['name'])) continue;
            $name = $file['name'];
            $isApk = str_ends_with(strtolower($name), '.apk');
            $isImage = in_array(strtolower(pathinfo($name, PATHINFO_EXTENSION)), ['png', 'jpg', 'jpeg', 'webp', 'gif', 'svg']);
            
            if ($isApk || $isImage || $name === 'logo.png') {
                $files[] = [
                    'name' => $name,
                    'path' => "app/$name",
                    'url' => $supabase->getPublicUrl('app', "app/$name"),
                    'size' => $file['metadata']['size'] ?? 0,
                    'mimetype' => $file['metadata']['mimetype'] ?? '',
                    'updated_at' => $file['updated_at'] ?? '',
                    'created_at' => $file['created_at'] ?? '',
                    'is_apk' => $isApk,
                    'is_image' => $isImage
                ];
            }
        }
        usort($files, fn($a, $b) => strtotime($b['updated_at']) <=> strtotime($a['updated_at']));
    }
    
    cache_set('uploaded_files', $files);
    return $files;
}

/**
 * Format bytes to human readable
 */
function format_bytes($bytes) {
    if ($bytes >= 1073741824) return number_format($bytes / 1073741824, 1) . ' GB';
    if ($bytes >= 1048576) return number_format($bytes / 1048576, 1) . ' MB';
    if ($bytes >= 1024) return number_format($bytes / 1024, 1) . ' KB';
    return $bytes . ' B';
}

/**
 * Format INR currency
 */
function format_inr($amount) {
    return '₹' . number_format($amount / 100, 0, '.', ',');
}

/**
 * Get APK download URL
 */
function get_apk_url($config, $supabase) {
    if ($config['apkUrl']) return $config['apkUrl'];
    
    // Fallback: find latest APK in storage
    $files = get_uploaded_files($supabase);
    $apks = array_filter($files, fn($f) => $f['is_apk']);
    if ($apks) {
        uasort($apks, fn($a, $b) => $b['updated_at'] <=> $a['updated_at']);
        return reset($apks)['url'];
    }
    return '#';
}

// Initialize config
$config = get_app_config($supabase);
$uploadedFiles = get_uploaded_files($supabase);
$apkUrl = get_apk_url($config, $supabase);
$apkFile = null;
foreach ($uploadedFiles as $f) {
    if ($f['is_apk'] && $f['url'] === $apkUrl) {
        $apkFile = $f;
        break;
    }
}
if (!$apkFile && $uploadedFiles) {
    $apks = array_filter($uploadedFiles, fn($f) => $f['is_apk']);
    if ($apks) $apkFile = array_shift($apks);
}