<!--
 * Template Name: page-contact
-->
<?php get_header(); ?>
        <div class="contact_page">
            <section class="contact_section">
                <div class="contact_section__wrap">
                    <div class="contact_section__title">
                        <p class="page_heading__sub_title">CONTACT</p>
                        <h1 class="page_heading__title">お問い合わせ</h1>
                    </div>
                    <div class="contact_section__column">
                        <div class="contact_section__left">
                            <p class="contact_section__txt">右記のフォームよりお問い合わせください。<br>当社オペレーターからご返信いたします。</p>
                            <p class="contact_section__sub-txt"><span class="contact_section__required">●</span>は必須項目です</p>
                        </div>
                        <div class="contact_section__right">
                            <!-- contact form 7 -->
                            <?php the_content();?>
                        </div>
                    </div>
                </div>
            </section>
        </div>

<?php get_footer(); ?>
