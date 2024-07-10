<?php
$page_id = get_the_ID();
?>
<?php get_header(); ?>


<?php if (is_user_logged_in()) : ?>


    <div class="business_detail_page">
        <section class="cases_section">
            <div class="cases_section__wrap">
                <div class="cases_section__title">
                    <p class="page_heading__sub_title">CASES</p>
                    <h1 class="page_heading__title">案件を探す</h1>
                </div>
                <div class="cases_section__column">
                    <div class="cases_section__left">
                        <h2 class="cases_section__project">Registered Title: <?= the_title(); ?></h2>
                    </div>
                    <div class="cases_section__right">
                        <div class="cases_section__date">
                            <img class="cases_section__ico" src="/assets/img/common/ico_new.svg" alt="NEW">
                            <p class="cases_section__release">RELEASE DATE：<?php the_field('release_date'); ?></p>
                            <p class="cases_section__update">UPDATE DATE：<?php the_field('update_dateupdate_date'); ?></p>
                        </div>
                    </div>
                </div>
                <div class="cases_section__block">
                    <dl class="cases_section__definition">
                        <dt class="cases_section__team team team--ico--status">
                            <span class="teamIcon teamIcon--status">Recruitment status</span>
                        </dt>
                        <dd class="cases_section__description"><?php the_field('recruitment_status'); ?> </dd>
                    </dl>
                    <dl class="cases_section__definition">
                        <dt class="cases_section__team team team--ico--profile">
                            Our Business
                        </dt>
                        <dd class="cases_section__description"><?php the_field('our_business'); ?></dd>
                    </dl>
                    <dl class="cases_section__definition">
                        <dt class="cases_section__team team team--ico--location">
                            Area
                        </dt>
                        <dd class="cases_section__description"><?php the_field('area'); ?></dd>
                    </dl>
                    <dl class="cases_section__definition">
                        <dt class="cases_section__team team team--ico--price">
                            Suggested price
                        </dt>
                        <dd class="cases_section__description"><?php the_field('suggested_price'); ?></dd>
                    </dl>
                    <dl class="cases_section__definition">
                        <dt class="cases_section__team team team--ico--format">
                            Transfer format
                        </dt>
                        <dd class="cases_section__description"><?php the_field('transfer_format'); ?></dd>
                    </dl>
                    <dl class="cases_section__definition">
                        <dt class="cases_section__team team team--ico--summary">
                            Summary
                        </dt>
                        <dd class="cases_section__description"><?php the_field('summary'); ?></dd>
                    </dl>
                </div>
                <div class="cases_section__thumbnail">

                    <?php if (have_rows('imgset')) : ?>
                        <?php while (have_rows('imgset')) : the_row(); ?>

                            <figure class="cases_section__img">
                                <?php $image = get_sub_field('img'); ?>
                                <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>">
                            </figure>

                        <?php endwhile; ?>
                    <?php endif; ?>

                </div>
            </div>
        </section>

        <section class="contact_section">
            <div class="contact_section__wrap">
                <div class="contact_section__block">
                    <p class="contact_section__sub_title">CONTACT</p>
                    <h2 class="contact_section__title">案件について問い合わせる</h2>
                </div>
                <div class="contact_section__column">
                    <div class="contact_section__left">
                        <p class="contact_section__txt">必要事項をご記入のうえ、送信してください。<br>内容を確認し、担当より折り返しご連絡させていただきます。</p>
                        <p class="contact_section__sub-txt"><span class="contact_section__required">●</span>は必須項目です</p>
                    </div>
                    <div class="contact_section__right">
                        <!-- contact form 7 -->
                        <?php echo apply_shortcodes('[contact-form-7 id="4e2006a" title="案件についての問い合わせ"]'); ?>

                    </div>
                </div>
            </div>
        </section>
    </div>


<?php else : ?>
    <?php #未ログイン ?>
    <div class="login_page">
            <section class="popup_section">
                <div class="popup_section__wrap">
                    <div class="popup_section__block">
                        <h2 class="popup_section__title">会員登録 / ログイン</h2>
                        <p class="popup_section__txt">詳細情報を見るには<br class="is-sp">会員登録またはログインをしてください。</p>
                    </div>
                    <div class="popup_section__column">
                        <div class="popup_section__btn">
                            <a href="/create-account">会員登録はこちらから</a>
                        </div>
                        <div class="popup_section__btn">
                            <a href="/membership-login">ログインはこちらから</a>
                        </div>
                    </div>
                </div>
            </section>
        </div>
<?php endif; ?>

<?php get_footer(); ?>