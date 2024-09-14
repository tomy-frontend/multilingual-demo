<?php get_header(); ?>

<div class="fv">
    <div class="fv__content">
        <h2 class="fv__title">HELLO!!</h2>
        <h3 class="fv__sub-title">This is multilingual Demo Site!</h3>
    </div>
</div>

<section class="contents">
    <div class="inner">
        <h2 class="section__title">セクションタイトルが入ります。言語切り替え可能です。</h2>
        <div class="contents__text">
            <p>この文章は言語切り替え対応しています。
                この文章は言語切り替え対応しています。
            </p>
            <p>この文章は言語切り替え対応しています。
                この文章は言語切り替え対応しています。
            </p>
            <p>この文章は言語切り替え対応しています。
                この文章は言語切り替え対応しています。
            </p>
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
        <h2 class="section__title">記事一覧も多言語対応しています。</h2>
        <?php if (have_posts()) : ?>
            <div class="articles__container">
                <?php while (have_posts()) : the_post(); ?>

                    <article class="article">
                        <div class="articles__img">
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
                        <h3 class="articles__title"><?php the_title(); ?></h3>
                        <div class="articles__excerpt"><?php the_excerpt(); ?></div>
                    </article>

                <?php endwhile; ?>
            </div>
        <?php else : ?>
            <p>現在、表示する投稿がありません。</p>
        <?php endif; ?>
    </div>
</section>

<?php get_footer(); ?>