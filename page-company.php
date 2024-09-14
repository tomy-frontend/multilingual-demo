<?php
/*
Template Name: company Page
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
                会社情報
            <?php elseif ($locale == 'ar'): ?>
                <!-- アラビア語用のテキスト -->
                صفحة الشركة
            <?php else: ?>
                <!-- 英語用のテキスト -->
                COMPANY page
            <?php endif; ?>
        </h2>

        <div class="page-contents">
            <?php
            $locale = get_locale();
            if ($locale == 'ja'): ?>
                <!-- 日本語用のテキスト -->
                <p>固定ページに関するコンテンツが入ります。</p>
                <p>固定ページに関するコンテンツが入ります。</p>
                <p>固定ページに関するコンテンツが入ります。</p>
                <p>固定ページに関するコンテンツが入ります。</p>
                <p>固定ページに関するコンテンツが入ります。</p>
            <?php elseif ($locale == 'ar'): ?>
                <!-- アラビア語用のテキスト -->
                <p>يحتوي على محتوى متعلق بالصفحات الثابتة.</p>
                <p>يحتوي على محتوى متعلق بالصفحات الثابتة.</p>
                <p>يحتوي على محتوى متعلق بالصفحات الثابتة.</p>
                <p>يحتوي على محتوى متعلق بالصفحات الثابتة.</p>
                <p>يحتوي على محتوى متعلق بالصفحات الثابتة.</p>
            <?php else: ?>
                <!-- 英語用のテキスト -->
                <p>Contains content related to fixed pages.</p>
                <p>Contains content related to fixed pages.</p>
                <p>Contains content related to fixed pages.</p>
                <p>Contains content related to fixed pages.</p>
                <p>Contains content related to fixed pages.</p>
            <?php endif; ?>
        </div>

    </div>
</section>

<?php get_footer(); ?>