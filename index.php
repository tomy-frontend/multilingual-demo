<?php get_header(); ?>

<div class="fv">
    <div class="fv__content">
        <h2 class="fv__title">
            <?php
            $locale = get_locale();
            if ($locale == 'ja'): ?>
                <!-- 日本語用のテキスト -->
                HELLO!!
            <?php elseif ($locale == 'ar'): ?>
                <!-- アラビア語用のテキスト -->
                مرحبًا!!
            <?php else: ?>
                <!-- 英語用のテキスト -->
                HELLO!!
            <?php endif; ?>
        </h2>
        <h3 class="fv__sub-title">
            <?php
            $locale = get_locale();
            if ($locale == 'ja'): ?>
                <!-- 日本語用のテキスト -->
                多言語対応デモサイトです！
            <?php elseif ($locale == 'ar'): ?>
                <!-- アラビア語用のテキスト -->
                هذا موقع تجريبي متعدد اللغات!
            <?php else: ?>
                <!-- 英語用のテキスト -->
                This is multilingual Demo Site!
            <?php endif; ?>
        </h3>
    </div>
</div>

<section class="contents">
    <div class="inner">
        <h2 class="section__title">
            <?php
            $locale = get_locale();
            if ($locale == 'ja'): ?>
                <!-- 日本語用のテキスト -->
                セクションタイトルが入ります。固定テキストも言語切り替え可能です。
            <?php elseif ($locale == 'ar'): ?>
                <!-- アラビア語用のテキスト -->
                يحتوي على عنوان القسم تبديل اللغة ممكن.
            <?php else: ?>
                <!-- 英語用のテキスト -->
                Contains the section title. Language switching is possible.
            <?php endif; ?>
        </h2>
        <div class="contents__text">
            <?php
            $locale = get_locale();
            if ($locale == 'ja'): ?>
                <!-- 日本語用のテキスト -->
                <p>この文章も言語切り替え対応しています。
                </p>
                <p>固定の文章も条件切り替えで多言語対応することが可能です。
                </p>
                <p>PCを想定しているためレスポンシブは最低限にしています🙇
                </p>
            <?php elseif ($locale == 'ar'): ?>
                <!-- アラビア語用のテキスト -->
                <p>يدعم هذا النص تبديل اللغة. يدعم هذا النص تبديل اللغة.</p>
                <p>يمكن أيضًا جعل الجمل الثابتة متعددة اللغات عن طريق تغيير الظروف.</p>
                <p>نظرًا لأنه مخصص للكمبيوتر الشخصي، يتم الاحتفاظ بالاستجابة إلى الحد الأدنى.🙇</p>
            <?php else: ?>
                <!-- 英語用のテキスト -->
                <p>This text also supports language switching.</p>
                <p>Fixed sentences can also be made multilingual by changing conditions.</p>
                <p>Since it is intended for PC, responsiveness is kept to a minimum.🙇</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- 固定ページへのボタン -->
    <div class="contents__btn">
        <?php
        $locale = get_locale();
        $link = home_url('/about'); // デフォルトは日本語

        if ($locale == 'en') {
            // 英語の場合
            $link = home_url('/en/about');
        } elseif ($locale == 'ar') {
            // アラビア語の場合
            $link = home_url('/ar/about');
        }
        ?>
        <a href="<?php echo esc_url($link); ?>" class="c-btn">
            <?php
            $locale = get_locale();
            if ($locale == 'ja'): ?>
                <!-- 日本語用のテキスト -->
                ABOUTボタン
            <?php elseif ($locale == 'ar'): ?>
                <!-- アラビア語用のテキスト -->
                حول زر
            <?php else: ?>
                <!-- 英語用のテキスト -->
                ABOUT Button
            <?php endif; ?>
        </a>
    </div>
</section>

<section class="articles">
    <div class="inner">
        <h2 class="section__title">
            <?php
            $locale = get_locale();
            if ($locale == 'ja'): ?>
                <!-- 日本語用のテキスト -->
                記事一覧も多言語対応しています。
            <?php elseif ($locale == 'ar'): ?>
                <!-- アラビア語用のテキスト -->
                قائمة المقالات متاحة أيضًا بلغات متعددة.
            <?php else: ?>
                <!-- 英語用のテキスト -->
                The article list is also available in multiple languages.
            <?php endif; ?>
        </h2>
        <?php if (have_posts()) : ?>
            <div class="articles__container">
                <?php while (have_posts()) : the_post(); ?>
                    <a href="<?php the_permalink(); ?>" class="article">
                        <div class="article__img">
                            <?php if (has_post_thumbnail()) : ?>
                                <img
                                    src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'full'); ?>"
                                    alt="<?php the_title_attribute(); ?>"
                                    width="600"
                                    height="600">
                            <?php else : ?>
                                <img
                                    src="<?php echo get_template_directory_uri(); ?>/img/default-thumbnail.webp"
                                    alt="デフォルトサムネイル"
                                    width="300"
                                    height="300">
                            <?php endif; ?>
                        </div>
                        <h3 class="article__title"><?php the_title(); ?></h3>
                        <div class="article__excerpt"><?php the_excerpt(); ?></div>
                    </a>
                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <?php
            $locale = get_locale();
            if ($locale == 'ja'): ?>
                <!-- 日本語用のテキスト -->
                <p>現在、表示する投稿がありません。</p>
            <?php elseif ($locale == 'ar'): ?>
                <!-- アラビア語用のテキスト -->
                <p>لا يوجد حاليا أي مشاركات لعرضها.</p>
            <?php else: ?>
                <!-- 英語用のテキスト -->
                <p>There are currently no posts to display.</p>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>