<!--
 * Template Name: page-member
-->
<?php get_header(); ?>

<?php if (is_user_logged_in()):?>
    <div class="registration_page">
            <section class="registration_section">
                <div class="registration_section__wrap">
                    <div class="registration_section__title">
                        <p class="page_heading__sub_title">LOGIN</p>
                        <h1 class="page_heading__title">ログイン</h1>
                    </div>
                    <div class="registration_section__column">
                        <div class="registration_section__left">
                        </div>
                        <div class="registration_section__right">
                            <div class="contact_form__completion">
                                <!-- <p class="contact_form__completion-txt">新規ユーザーのご登録ありがとうございます</p> -->
                                <div class="contact_form__completion-cta">
                                    <div class="contact_form__completion-btn">
                                        <p class="contact_form__completion-lead">◆ 事業を買いたい方はこちら</p>
                                        <a href="/cases">案件を探す</a>
                                    </div>
                                    <div class="contact_form__completion-btn">
                                        <p class="contact_form__completion-lead">◆ 事業を売りたい方はこちら</p>
                                        <a href="/business_fillform">売却案件のご相談</a>
                                    </div>
                                </div>
                                <p>ログアウトは<a href="/membership-login?a=logout">こちら</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        
<?php else: ?>
    <div class="registration_page">
            <section class="registration_section">
                <div class="registration_section__wrap">
                    <div class="registration_section__title register_view">
                        <p class="page_heading__sub_title">NEW USER REGISTRATION</p>
                        <h1 class="page_heading__title">新規ユーザー登録</h1>
                    </div>
                    <div class="registration_section__title login_view">
                        <p class="page_heading__sub_title">LOGIN</p>
                        <h1 class="page_heading__title">ログイン</h1>
                    </div>
                    <div class="registration_section__title pwdreset_view">
                        <p class="page_heading__sub_title">LOGIN</p>
                        <h1 class="page_heading__title">ログイン</h1>
                    </div>
                    <div class="registration_section__column">
                        <div class="registration_section__left register_view">
                            <p class="registration_section__txt">右記の項目を入力し<br class="is-pc">利用規約・個人情報保護方針に同意の上<br class="is-pc">登録ボタンを押してください。</p>
                            <p class="registration_section__sub-txt"><span class="registration_section__required">*</span>は必須項目です</p>
                        </div>
                        <div class="registration_section__left login_view">
                            <p class="registration_section__txt">パスワードを忘れた方は→<a href="/password-reset?a=pwdreset">こちら</a></p>
                            <p class="registration_section__txt">会員登録がお済みではないですか？<br>→<a href="/create-account">新規ユーザー登録</a></p>
                        </div>
                        <div class="registration_section__left pwdreset_view">
                            <p class="registration_section__txt">パスワード再設定用URLを送信しますので、<br>ご登録いただいているメールアドレスを入力し、<br>「送信する」ボタンをクリックしてください。</p>
                        </div>
                        <div class="registration_section__right">

                            <?php the_content();?>

                        </div>
                    </div>
                </div>
            </section>
        </div>
<?php endif; ?>

<script>
// クラス .text を持つ要素をすべて取得
var textElements = document.querySelectorAll('.text');

// 各要素に対してループ処理
textElements.forEach(function(element) {
    // 要素のテキストが指定の正規表現にマッチするかチェック
    if (/メールアドレス確認※同じメールアドレスを確認の為、再度入力ください。/.test(element.textContent)) {
        // マッチした場合、innerHTMLを更新
        element.innerHTML = 'メールアドレス<br>確認<span class="req">*</span>';
    }
});

// ID 'register' を持つ要素を取得
var registerElement = document.getElementById('register');
// クラス 'register_view' を持つ要素をすべて取得
var registerViewElements = document.querySelectorAll('.register_view');
// ID 'register' を持つ要素が存在するかどうかチェック
if (registerElement) {
    // 存在する場合、クラス 'register_view' を持つ要素を表示
    registerViewElements.forEach(function(element) {
        element.style.display = 'block';  // displayをblockに設定して表示
    });
} else {
    // 存在しない場合、クラス 'register_view' を持つ要素を非表示
    registerViewElements.forEach(function(element) {
        element.style.display = 'none';  // displayをnoneに設定して非表示
    });
}

// ID 'register' を持つ要素を取得
var loginElement = document.getElementById('login');
// クラス 'register_view' を持つ要素をすべて取得
var loginViewElements = document.querySelectorAll('.login_view');
// ID 'register' を持つ要素が存在するかどうかチェック
if (loginElement) {
    // 存在する場合、クラス 'register_view' を持つ要素を表示
    loginViewElements.forEach(function(element) {
        element.style.display = 'block';  // displayをblockに設定して表示
    });
} else {
    // 存在しない場合、クラス 'register_view' を持つ要素を非表示
    loginViewElements.forEach(function(element) {
        element.style.display = 'none';  // displayをnoneに設定して非表示
    });
}


// ID 'register' を持つ要素を取得
var pwdresetElement = document.getElementById('pwdreset');
// クラス 'register_view' を持つ要素をすべて取得
var passViewElements = document.querySelectorAll('.pwdreset_view');
// ID 'register' を持つ要素が存在するかどうかチェック
if (pwdresetElement) {
    // 存在する場合、クラス 'register_view' を持つ要素を表示
    passViewElements.forEach(function(element) {
        element.style.display = 'block';  // displayをblockに設定して表示
    });
} else {
    // 存在しない場合、クラス 'register_view' を持つ要素を非表示
    passViewElements.forEach(function(element) {
        element.style.display = 'none';  // displayをnoneに設定して非表示
    });
}


</script>

<?php get_footer(); ?>
