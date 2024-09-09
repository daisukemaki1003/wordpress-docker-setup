<?php
$pageTitle = isset($pageTitle) ? $pageTitle : '';
$description = isset($description) ? $description : '';
$ogpDescription = isset($ogpDescription) ? $ogpDescription : $description;
$pageUrl = isset($pageUrl) ? $pageUrl : '';
$ogpimg = isset($ogpimg) ? $ogpimg : '';
$keywords = isset($keywords) ? $keywords : '';
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title><?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>
    <meta name="description" content="<?php echo htmlspecialchars($description, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:title" content="<?php echo htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:description" content="<?php echo htmlspecialchars($ogpDescription, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image" content="<?php echo htmlspecialchars($ogpimg, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:image:width" content="1200">
    <meta property="og:image:height" content="630">
    <meta property="og:url" content="<?php echo htmlspecialchars($pageUrl, ENT_QUOTES, 'UTF-8'); ?>">
    <meta property="og:locale" content="ja_JP">
    <meta property="twitter:card" content="summary_large_image">
    <meta name="keywords" content="<?php echo htmlspecialchars($keywords, ENT_QUOTES, 'UTF-8'); ?>" />
    <meta name="format-detection" content="telephone=no">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <script type="module" src="/assets/js/bundle.js?123456789"></script>
    <link type="text/css" rel="stylesheet" href="/assets/css/style.css?123456789">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <header class="header_block">
    </header>