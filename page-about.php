<?php
/*
Template Name: about Page
*/
?>

<?php get_header(); ?>

<section class="page-about">
    <div class="inner">
        <h2 class="section__title">
            <?php
            $locale = get_locale();
            if ($locale == 'ja'): ?>
                <!-- 日本語用のテキスト -->
                ABOUTページ
            <?php elseif ($locale == 'ar'): ?>
                <!-- アラビア語用のテキスト -->
                حول الصفحة
            <?php else: ?>
                <!-- 英語用のテキスト -->
                ABOUT page
            <?php endif; ?>
        </h2>

    </div>
</section>

<?php get_footer(); ?>