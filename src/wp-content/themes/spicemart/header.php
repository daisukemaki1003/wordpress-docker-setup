<!DOCTYPE html>
<html lang="ja">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <title>
    Game Asset Biz Opp
  </title>
  <meta name="description" content="ゲーム業界専門マッチングサービスです。アセットをお求めの企業様と、ゲームの譲渡、移管先をお探しの企業様を仲介。海外展開をお考えの企業様も是非ご相談ください。">
  <meta property="og:title" content='Game Asset Biz Opp'>
  <meta property="og:description" content="ゲーム業界専門マッチングサービスです。アセットをお求めの企業様と、ゲームの譲渡、移管先をお探しの企業様を仲介。海外展開をお考えの企業様も是非ご相談ください。">
  <meta property="og:image" content="/assets/img/common/ogp.png">
  <meta property="og:image:width" content="1200">
  <meta property="og:image:height" content="630">
  <meta property="og:url" content="">
  <meta property="og:locale" content="ja_JP">
  <meta property="twitter:card" content="summary_large_image">
  <meta name="keywords" content="ゲーム業界, マッチング, 海外展開, ゲーム資産, 売却" />
  <meta name="format-detection" content="telephone=no">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <script type="module" src="/assets/js/bundle.js?123456789"></script>
  <link type="text/css" rel="stylesheet" href="/assets/css/style.css?123456789">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Zen+Maru+Gothic:wght@300;400;500;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@300;400;500;600;700&family=Inter:wght@100..900&family=Roboto:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  <?php wp_head(); ?>
</head>

<body>
  <header class="header_block" data-header>
    <div class="header_logo">
      <h1 class="header_logo__img">
        <a href="/"><img src="/assets/img/common/logo.svg" alt="Spicemart"></a>
      </h1>
      <p class="header_logo__text">Game Asset Biz Opp</p>
    </div>
    <button class="header_hamburger" data-hamburger-btn><span>MENU</span></button>
    <nav class="header_nav">
      <div class="header_nav__head">
        <ul class="header_nav__list">
          <li class="header_nav__item"><a href="/about">ABOUT</a></li>
          <li class="header_nav__item"><a href="/contact">CONTACT</a></li>
          <li class="header_nav__item">
            <span>LANGUAGE</span>
            <ul class="header_sublist">
              <li class="header_sublist__item"><a href="/" class="is-active">日本語</a></li>
              <li class="header_sublist__item"><a href="/">English</a></li>
              <li class="header_sublist__item"><a href="/">中文</a></li>
              <li class="header_sublist__item"><a href="/">한국어</a></li>
            </ul>
          </li>
        </ul>
        <?php if (is_user_logged_in()) : ?>
          <div class="header_btns">
            <p class="header_btns__user_name">
              <?php if (is_user_logged_in()) :
                $current_user = wp_get_current_user(); ?>
                <img src="<?php echo esc_url(get_avatar_url($current_user->ID)); ?>" alt="<?php echo esc_attr($current_user->display_name); ?>" />
                <?php echo esc_html($current_user->display_name); ?>
              <?php endif; ?>
            </p>
            <div class="header_btns__logout"><a href="/?a=logout">ログアウト</a></div>
          </div>
        <?php else : ?>
          <?php #未ログイン  
          ?>
          <div class="header_btns">
            <p class="header_btns__item header_btns__item--light"><a href="/create-account">Sign up</a></p>
            <p class="header_btns__item header_btns__item--dark"><a href="/membership-login">Log in</a></p>
          </div>
        <?php endif; ?>
      </div>
      <div class="header_bottom">
        <ul class="header_bottom__list">
          <li class="header_bottom__item">
            <a href="/cases"><img src="/assets/img/common/ico_game.svg" alt="">
              <p>ALL CASES</p>
            </a>
          </li>
          <li class="header_bottom__item">
            <a href="/business_fillform"><img src="/assets/img/common/ico_search.svg" alt="">
              <p>BUY A BUSINESS</p>
            </a>
          </li>
          <li class="header_bottom__item">
            <a href="/cases"><img src="/assets/img/common/ico_register.svg" alt="">
              <p>REGISTER ASSETS</p>
            </a>
          </li>
        </ul>
      </div>

    </nav>
  </header>

  <div class="header_modal" data-hamburger-menu>
    <div class="header_modal__inner">
      <ul class="header_modal__list">
        <li class="header_modal__item"><a href="/about">ABOUT</a></li>
        <li class="header_modal__item"><a href="/contact">CONTACT</a></li>
        <li class="header_modal__item">
          <details class="langage_box__definition">
            <summary class="langage_box__team">LANGUAGE </summary>
            <div class="accordion_content js-accordion_container">
              <ul class="langage_box__description">
                <li class="langage_box__item is-active"><a href="/">日本語</a></li>
                <li class="langage_box__item"><a href="/">English</a></li>
                <li class="langage_box__item"><a href="/">中文</a></li>
                <li class="langage_box__item"><a href="/">한국어</a></li>
              </ul>
            </div>
          </details>
        </li>
      </ul>
      <div class="modal_btns">
        <p class="modal_btns__item modal_btns__item--light"><a href="/create-account">Sign up</a></p>
        <p class="modal_btns__item modal_btns__item--dark"><a href="/membership-login">Log in</a></p>
      </div>
      <ul class="modal_bottom">
        <li class="modal_bottom__item">
          <a href="/cases">
            <img src="/assets/img/common/ico_game.svg" alt="">
            <p>ALL CASES</p>
          </a>
        </li>
        <li class="modal_bottom__item">
          <a href="/business_fillform">
            <img src="/assets/img/common/ico_search.svg" alt="">
            <p>BUY A BUSINESS</p>
          </a>
        </li>
        <li class="modal_bottom__item">
          <a href="/cases">
            <img src="/assets/img/common/ico_register.svg" alt="">
            <p>REGISTER ASSETS</p>
          </a>
        </li>
      </ul>
    </div>
  </div>