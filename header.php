<?php if (!defined('ABSPATH')) exit; ?>
<?php if (file_exists(get_template_directory().'/service-menu.php')) require_once get_template_directory().'/service-menu.php'; ?>
<!doctype html><html <?php language_attributes(); ?>><head><meta charset="<?php bloginfo('charset'); ?>"><meta name="viewport" content="width=device-width, initial-scale=1"><?php wp_head(); ?></head><body <?php body_class(); ?>><?php wp_body_open(); ?>
<?php $phone=get_theme_mod('pv_phone','+7 (977) 824-02-00'); $phone_raw=preg_replace('/\D+/','',$phone); ?>
<?php $about_url=pv_page_url_by_title('О нас',home_url('/#about')); $contacts_url=pv_page_url_by_title('Контакты',home_url('/#contact')); $articles_url=pv_articles_page_url(); ?>
<div class="topbar"><div class="wrap topbar-inner"><span class="top-location">Москва, работаем по всей России и СНГ</span><span class="top-center">Ваш бренд — наша стратегия!</span><div class="top-contact"><b>Напишите нам:</b><a class="top-mini tg" href="https://t.me/prmoscowagency" target="_blank" rel="noopener" aria-label="Telegram"><?php echo pv_icon('tg'); ?></a><a class="top-mini wa" href="https://api.whatsapp.com/send?phone=79778240200" target="_blank" rel="noopener" aria-label="WhatsApp"><?php echo pv_icon('wa'); ?></a><a class="top-mini max" href="https://max.ru/channel_VysotskayaLive" target="_blank" rel="noopener" aria-label="MAX"><?php echo pv_icon('max'); ?></a><a class="top-mini vk" href="https://vk.ru/pr_agency_rus" target="_blank" rel="noopener" aria-label="VK"><?php echo pv_icon('vk'); ?></a><a class="top-phone" href="tel:+79778240200"><?php echo pv_icon('phone'); ?><?php echo esc_html($phone); ?></a><a class="top-call" href="tel:+79778240200" aria-label="Позвонить"><?php echo pv_icon('phone'); ?><span>Позвонить</span></a></div></div></div>
<header class="site-header">
<div class="wrap nav">
<a class="brand" href="<?php echo esc_url(home_url('/')); ?>"><span class="pr">PR</span>одвижение<small>PR АГЕНТСТВО · ПРОДЮСЕРСКИЙ ЦЕНТР</small></a>
<nav class="menu" aria-label="Основное меню">
<a href="<?php echo esc_url(home_url('/')); ?>">Главная</a>
<div class="menu-dropdown-wrap"><a class="menu-dropdown-toggle" href="#directions" aria-haspopup="true">Услуги <span class="menu-caret">⌄</span></a><div class="mega-menu" role="menu"><?php echo function_exists('pv_fixed_services_menu') ? pv_fixed_services_menu(false) : pv_all_services_menu(); ?></div></div>
<a href="#cases">Кейсы</a><a href="<?php echo esc_url($about_url); ?>">О нас</a><a href="<?php echo esc_url($articles_url); ?>">Статьи</a><a href="<?php echo esc_url($contacts_url); ?>">Контакты</a>
</nav>
<a class="search-btn" href="<?php echo esc_url(home_url('/?s=')); ?>" aria-label="Поиск"><svg viewBox="0 0 24 24" aria-hidden="true"><circle cx="11" cy="11" r="6.5"/><path d="m16 16 5 5"/></svg></a>
<div class="socials main-socials"><a class="s-tg" href="https://t.me/prmoscowagency" target="_blank" rel="noopener" aria-label="Telegram"><?php echo pv_icon('tg'); ?></a><a class="s-wa" href="https://api.whatsapp.com/send?phone=79778240200" target="_blank" rel="noopener" aria-label="WhatsApp"><?php echo pv_icon('wa'); ?></a><a class="s-max" href="https://max.ru/channel_VysotskayaLive" target="_blank" rel="noopener" aria-label="MAX"><?php echo pv_icon('max'); ?></a><a class="s-vk" href="https://vk.ru/pr_agency_rus" target="_blank" rel="noopener" aria-label="VK"><?php echo pv_icon('vk'); ?></a></div>
<a class="cta header-cta" href="#contact">Получить консультацию →</a><button class="mobile-toggle" type="button" aria-expanded="false" aria-controls="mobile-menu">☰</button>
</div>
<div class="mobile-menu" id="mobile-menu">
<a href="<?php echo esc_url(home_url('/')); ?>">Главная</a><a href="#directions">Услуги</a><a href="#cases">Кейсы</a><a href="<?php echo esc_url($about_url); ?>">О нас</a><a href="<?php echo esc_url($articles_url); ?>">Статьи</a><a href="<?php echo esc_url($contacts_url); ?>">Контакты</a>
<div class="mobile-services-title">Все услуги и разделы</div><div class="mobile-services-list"><?php echo function_exists('pv_fixed_services_menu') ? pv_fixed_services_menu(true) : pv_all_services_menu(true); ?></div>
</div>
</header>
