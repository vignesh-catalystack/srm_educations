<?php
header('Content-Type: application/xml; charset=UTF-8');

$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host = $_SERVER['HTTP_HOST'] ?? 'localhost';
$base = $scheme . '://' . $host;

$paths = [
    '/',
    '/pages/index.php',
    '/pages/course.php',
    '/pages/institution.php',
    '/pages/all_institutions/paramedical.php',
    '/pages/all_institutions/computer-center.php',
    '/pages/all_institutions/spoken-english.php',
    '/pages/scholarship.php',
    '/pages/gallery.php',
    '/pages/contact.php',
    '/pages/student-corner/student-corner.php',
    '/download-application.php',
];

$now = date('Y-m-d');
echo '<?xml version="1.0" encoding="UTF-8"?>';
?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($paths as $path): ?>
  <url>
    <loc><?php echo htmlspecialchars($base . $path, ENT_QUOTES, 'UTF-8'); ?></loc>
    <lastmod><?php echo $now; ?></lastmod>
    <changefreq>weekly</changefreq>
    <priority><?php echo $path === '/' || $path === '/pages/index.php' ? '1.0' : '0.8'; ?></priority>
  </url>
<?php endforeach; ?>
</urlset>

