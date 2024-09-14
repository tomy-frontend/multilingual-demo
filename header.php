<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <header class="header">
        <nav class="global-nav">
            <?php
            $locale = get_locale();
            $link = '#';

            if ($locale == 'ja') {
                // 日本語の場合
                $link = home_url('/');
            } elseif ($locale == 'en') {
                // 英語の場合
                $link = home_url('/en');
            } elseif ($locale == 'ar') {
                // アラビア語の場合
                $link = home_url('/ar');
            } else {
                // デフォルト（日本語）
                $link = home_url('/');
            }
            ?>
            <h1><a href="<?php echo esc_url($link); ?>">LOGO</a></h1>
            <ul class="global-nav__list">
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
                <li class="global-nav__item">
                    <a href="<?php echo esc_url($link); ?>">
                        <?php
                        $locale = get_locale();
                        if ($locale == 'ja'): ?>
                            <!-- 日本語用のテキスト -->
                            私について
                        <?php elseif ($locale == 'ar'): ?>
                            <!-- アラビア語用のテキスト -->
                            عن
                        <?php else: ?>
                            <!-- 英語用のテキスト -->
                            ABOUT
                        <?php endif; ?>
                    </a>
                </li>
                <li class="global-nav__item">
                    <?php
                    $locale = get_locale();
                    $link = home_url('/company'); // デフォルトは日本語

                    if ($locale == 'en') {
                        // 英語の場合
                        $link = home_url('/en/company');
                    } elseif ($locale == 'ar') {
                        // アラビア語の場合
                        $link = home_url('/ar/company');
                    }
                    ?>
                    <a href="<?php echo esc_url($link); ?>">
                        <?php
                        $locale = get_locale();
                        if ($locale == 'ja'): ?>
                            <!-- 日本語用のテキスト -->
                            会社情報
                        <?php elseif ($locale == 'ar'): ?>
                            <!-- アラビア語用のテキスト -->
                            شركة
                        <?php else: ?>
                            <!-- 英語用のテキスト -->
                            COMPANY
                        <?php endif; ?>
                    </a>
                </li>
                <li class="global-nav__item">
                    <!-- 言語切り替えスイッチ -->
                    <?php echo do_shortcode('[bogo]'); ?>
                    <!-- 言語切り替えスイッチ -->
                </li>
            </ul>
        </nav>
    </header>

    <main>