<?php
if (!defined('ABSPATH')) exit;
function prodvizhenie_v9_setup(){
 add_theme_support('title-tag'); add_theme_support('post-thumbnails'); add_theme_support('html5',['search-form','comment-form','comment-list','gallery','caption','style','script']);
 register_nav_menus(['primary'=>'Основное меню']);
}
add_action('after_setup_theme','prodvizhenie_v9_setup');
function prodvizhenie_v9_assets(){ wp_enqueue_style('prodvizhenie-v10',get_stylesheet_uri(),[], '23.2'); wp_enqueue_script('prodvizhenie-v10',get_template_directory_uri().'/assets/js/theme.js',[], '23.2',true); }
add_action('wp_enqueue_scripts','prodvizhenie_v9_assets');
function pv_icon($name){
 $svg=[
 'tg'=>'<svg viewBox="0 0 24 24"><path d="M21.7 3.4 18.4 20c-.25 1.17-.9 1.46-1.82.91l-5-3.68-2.41 2.32c-.27.27-.5.5-1.03.5l.37-5.09 9.26-8.36c.4-.36-.09-.56-.62-.2L5.7 13.5.78 11.96c-1.07-.34-1.09-1.07.22-1.58L20.2 2.94c.88-.32 1.65.2 1.5.46Z"/></svg>',
 'vk'=>'<svg viewBox="0 0 24 24"><path d="M12.7 17.1h1.4s.42-.05.64-.28c.2-.2.2-.58.2-.58s-.03-1.78.8-2.04c.82-.26 1.87 1.72 2.98 2.48.84.57 1.48.45 1.48.45l2.97-.04s1.55-.1.81-1.31c-.06-.1-.43-.89-2.23-2.51-1.88-1.69-1.63-1.42.64-4.36 1.38-1.8 1.93-2.9 1.76-3.37-.16-.45-1.18-.33-1.18-.33l-3.34.02s-.25-.03-.44.08c-.18.11-.3.36-.3.36s-.53 1.42-1.23 2.62c-1.48 2.51-2.08 2.65-2.32 2.49-.57-.37-.43-1.48-.43-2.27 0-2.46.37-3.49-.72-3.75-.36-.09-.62-.15-1.53-.16-1.17-.01-2.16 0-2.72.28-.37.18-.65.57-.48.59.21.03.68.13.93.48.32.45.31 1.45.31 1.45s.18 2.76-.43 3.1c-.42.23-.99-.24-2.22-2.54-.63-1.18-1.1-2.49-1.1-2.49s-.09-.24-.26-.37c-.21-.16-.5-.21-.5-.21l-3.17.02s-.48.01-.65.22c-.15.18-.01.55-.01.55s2.48 5.8 5.28 8.73c2.57 2.68 5.49 2.5 5.49 2.5Z"/></svg>',
 'max'=>'<svg viewBox="0 0 24 24"><path d="M4 18V6h2.7l5.3 6.7L17.3 6H20v12h-2.9v-7.2L12 17.3 6.9 10.8V18H4Z"/></svg>',
 'wa'=>'<svg viewBox="0 0 24 24"><path d="M20.5 3.5A11.83 11.83 0 0 0 12.08 0C5.54 0 .22 5.32.22 11.86c0 2.09.55 4.13 1.59 5.92L.1 24l6.36-1.67a11.86 11.86 0 0 0 5.62 1.43h.01c6.54 0 11.86-5.32 11.86-11.86 0-3.17-1.23-6.15-3.45-8.4Zm-8.41 18.2h-.01a9.83 9.83 0 0 1-5.01-1.37l-.36-.21-3.77.99 1.01-3.67-.23-.38a9.84 9.84 0 1 1 8.37 4.64Zm5.4-7.37c-.29-.15-1.7-.84-1.97-.94-.26-.1-.45-.15-.64.15-.19.29-.73.94-.9 1.14-.16.19-.33.22-.62.07-.29-.15-1.22-.45-2.32-1.44-.86-.77-1.44-1.72-1.61-2.01-.17-.29-.02-.45.13-.6.13-.13.29-.33.43-.49.14-.16.19-.27.29-.45.1-.19.05-.35-.02-.49-.07-.15-.64-1.55-.88-2.12-.23-.55-.47-.48-.64-.49h-.54c-.19 0-.49.07-.75.35-.26.29-.98.96-.98 2.35s1 2.72 1.14 2.91c.14.19 1.97 3.01 4.78 4.22.67.29 1.19.46 1.6.59.67.21 1.28.18 1.76.11.54-.08 1.7-.7 1.94-1.37.24-.67.24-1.25.17-1.37-.07-.12-.26-.19-.55-.34Z"/></svg>',
 'phone'=>'<svg viewBox="0 0 24 24"><path d="M6.7 2.8 9.4 2c.6-.2 1.2.1 1.5.7l1.3 3.1c.2.5.1 1-.3 1.4L10.3 8.8a13.7 13.7 0 0 0 4.9 4.9l1.6-1.6c.4-.4.9-.5 1.4-.3l3.1 1.3c.6.3.9.9.7 1.5l-.8 2.7c-.2.7-.8 1.1-1.5 1.1C11.1 18.4 5.6 12.9 5.6 6.3c0-.7.4-1.3 1.1-1.5Z"/></svg>'
 ]; return $svg[$name] ?? '';
}
function prodvizhenie_v10_header_socials(){
 $items=[['tg','Telegram','https://t.me/prmoscowagency'],['wa','WhatsApp','https://api.whatsapp.com/send?phone=79778240200'],['max','MAX','https://max.ru/channel_VysotskayaLive'],['vk','VK','https://vk.ru/pr_agency_rus']];
 echo '<div class="socials">'; foreach($items as $x){ echo '<a class="s-'.$x[0].'" href="'.esc_url($x[2]).'" target="_blank" rel="noopener" aria-label="'.esc_attr($x[1]).'">'.pv_icon($x[0]).'</a>'; } echo '</div>';
}
function prodvizhenie_v9_customize($wp_customize){
 $wp_customize->add_section('pv_contacts',['title'=>'PRодвижение — контакты и соцсети','priority'=>30]);
 foreach([['pv_phone','Телефон','+7 (977) 824-02-00'],['pv_email','Email','5107118@mail.ru']] as $c){$wp_customize->add_setting($c[0],['default'=>$c[2],'sanitize_callback'=>'sanitize_text_field']);$wp_customize->add_control($c[0],['section'=>'pv_contacts','label'=>$c[1],'type'=>'text']);}
}
add_action('customize_register','prodvizhenie_v9_customize');
function prodvizhenie_v9_schema(){ if(is_front_page()){ echo '<script type="application/ld+json">'.wp_json_encode(['@context'=>'https://schema.org','@type'=>'ProfessionalService','name'=>'PRодвижение','url'=>home_url('/'),'telephone'=>get_theme_mod('pv_phone','+7 (977) 824-02-00'),'email'=>get_theme_mod('pv_email','5107118@mail.ru'),'areaServed'=>'Москва, Россия','description'=>'PR агентство в Москве. Продвижение артистов, бизнеса, брендов, политических проектов, музыки, сайтов и социальных сетей.']).'</script>'; } }
add_action('wp_head','prodvizhenie_v9_schema',30);

/* V12 SEO: clean metadata, canonical, Open Graph and structured data. */
function prodvizhenie_v12_meta(){
 if (is_admin()) return;
 $title=''; $desc='';
 if(is_front_page()){
  $title='PR агентство в Москве — PRодвижение | PR, продвижение и репутация';
  $desc='PR агентство в Москве: PR-продвижение бизнеса, брендов, артистов и экспертов, работа со СМИ, репутацией, SMM, digital и SEO. PRодвижение — стратегии под задачи клиента.';
 } elseif(is_singular()){
  $title=wp_get_document_title();
  $desc=has_excerpt()?wp_strip_all_tags(get_the_excerpt()):wp_trim_words(wp_strip_all_tags(get_post_field('post_content',get_queried_object_id())),28,'…');
 } else { $title=wp_get_document_title(); $desc=get_bloginfo('description'); }
 $canonical=is_singular()?get_permalink(): (is_front_page()?home_url('/'):'');
 if($desc) echo '<meta name="description" content="'.esc_attr($desc).'">';
 echo '<meta name="robots" content="index,follow,max-image-preview:large,max-snippet:-1,max-video-preview:-1">';
 if($canonical) echo '<link rel="canonical" href="'.esc_url($canonical).'">';
 echo '<meta property="og:locale" content="ru_RU"><meta property="og:type" content="'.(is_singular('post')?'article':'website').'"><meta property="og:title" content="'.esc_attr($title).'"><meta property="og:description" content="'.esc_attr($desc).'"><meta property="og:url" content="'.esc_url($canonical?:home_url('/')).'"><meta property="og:site_name" content="PRодвижение">';
 echo '<meta name="twitter:card" content="summary_large_image">';
}
add_action('wp_head','prodvizhenie_v12_meta',2);
add_filter('pre_get_document_title',function($title){ if(is_front_page()) return 'PR агентство в Москве — PRодвижение | PR, продвижение и репутация'; return $title; });

function prodvizhenie_v12_schema(){
 if(!is_front_page()) return;
 $phone=get_theme_mod('pv_phone','+7 (977) 824-02-00');
 $graph=[
  '@context'=>'https://schema.org','@graph'=>[
   ['@type'=>['Organization','ProfessionalService'],'@id'=>home_url('/').'#organization','name'=>'PRодвижение','url'=>home_url('/'),'telephone'=>$phone,'email'=>get_theme_mod('pv_email','5107118@mail.ru'),'areaServed'=>[['@type'=>'City','name'=>'Москва'],['@type'=>'Country','name'=>'Россия']],'description'=>'PR агентство в Москве: PR-продвижение, связи со СМИ, репутация, продвижение артистов, бизнеса и брендов, SMM, digital и SEO.','sameAs'=>['https://t.me/prmoscowagency','https://max.ru/channel_VysotskayaLive','https://vk.ru/pr_agency_rus','https://api.whatsapp.com/send?phone=79778240200']],
   ['@type'=>'WebSite','@id'=>home_url('/').'#website','url'=>home_url('/'),'name'=>'PRодвижение — PR агентство в Москве','publisher'=>['@id'=>home_url('/').'#organization'],'inLanguage'=>'ru-RU'],
   ['@type'=>'WebPage','@id'=>home_url('/').'#webpage','url'=>home_url('/'),'name'=>'PR агентство в Москве — PRодвижение','isPartOf'=>['@id'=>home_url('/').'#website'],'about'=>['@id'=>home_url('/').'#organization'],'inLanguage'=>'ru-RU']
  ]
 ];
 echo '<script type="application/ld+json">'.wp_json_encode($graph,JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES).'</script>';
}
remove_action('wp_head','prodvizhenie_v9_schema',30);
add_action('wp_head','prodvizhenie_v12_schema',30);

/* Native WordPress sitemap is available at /wp-sitemap.xml on modern WordPress. */

/* V23.2 — clean service navigation: services only in «Услуги», articles/utility pages in the main navigation. */
function pv_page_url_by_title($title, $fallback=''){
    $page=get_page_by_title($title, OBJECT, 'page');
    return $page ? get_permalink($page) : $fallback;
}
function pv_articles_page_url(){
    $page=get_post(1709);
    return ($page && $page->post_status==='publish') ? get_permalink($page) : home_url('/stati/');
}
function pv_find_page_url($title){
    $page=get_page_by_title($title, OBJECT, 'page');
    return $page ? get_permalink($page) : '';
}

/* V24 — explicit legacy service hierarchy. This mirrors the site's real service tree,
   so article titles and utility pages never get mixed into «Услуги». */
function pv_service_link($title){
    $url=pv_find_page_url($title);
    return $url ? $url : '#';
}
function pv_service_catalog(){
    return [
      ['PR Услуги',['Создание Презентаций','Написание Пресс Релиза','Реклама Концертов, Мероприятий, а также Услуг и Товаров в Соц. Сетях','Приведем Клиентов на ваш Сайт, Покупателей на ваши Услуги и Товары','Регистрация Артистов в Сервисах для получения Заказов','Публикация Объявления на Популярных сайтах объявлений','Выездной Фотограф']],
      ['Концертный Директор',['Певцам / Музыкантам / Артистам','Концертный Директор в тарифе Lait','Концертный Директор для Артистов из Регионов','Концертный Директор в тарифе Promo','Концертный Директор в тарифе Maxi','Концертный Директор в тарифе Full','Концертный Директор в тарифе Super','Детский Концертный Директор','Личный Концертный Директор','Реклама Концертов, Мероприятий, а также Услуг и Товаров в Соц. Сетях','Приглашение Зрителей на ваш Концерт или Мероприятие','Регистрация Артистов в Сервисах для получения Заказов','Публикация Объявления на Популярных сайтах объявлений','Выездной Фотограф']],
      ['Провести свой КОНЦЕРТ',['Тариф – КОНЦЕРТ','Тариф – Большой Концерт','Реклама Концертов, Мероприятий, а также Услуг и Товаров в Соц. Сетях','Приглашение Зрителей на ваш Концерт или Мероприятие','Публикация Объявления на Популярных сайтах объявлений','Выездной Фотограф']],
      ['Тариф – Концертный Тур',['Тариф – Большой Концертный Тур','Реклама Концертов, Мероприятий, а также Услуг и Товаров в Соц. Сетях','Приглашение Зрителей на ваш Концерт или Мероприятие','Регистрация Артистов в Сервисах для получения Заказов','Публикация Объявления на Популярных сайтах объявлений']],
      ['Пиар Менеджер',['Тарифы работы Пиар Менеджера','Личный Пиар Менеджер','Создание Презентаций','Регистрация Артистов в Сервисах для получения Заказов','Приведем Клиентов на ваш Сайт, Покупателей на ваши Услуги и Товары','Публикация Объявления на Популярных сайтах объявлений','Выездной Фотограф']],
      ['Съемка Клипа',['Клип Менеджер','Караоке Клип','Концертный Клип','Уличный Клип']],
      ['Создание Сайта',['Консультация Специалиста по Продвижению Сайта или Социальных сетей','SEO Аудит Сайта','Тарифы создания Сайтов','Оптимизация САЙТА','Поисковое продвижение Сайта. Раскрутка Сайта. Вывод в Топ поисковых систем.','КОНТЕНТ-АРХИВАТОР','Ведение сайта. Поддержание сайта.','Продвижение в Яндекс']],
      ['Контент Менеджер',['«КРОССПЛАТФОРМЕННЫЙ КОНТЕНТ-МЕНЕДЖМЕНТ»','Контент Менеджер в тарифе Start','Контент Менеджер в тарифе Next','Раскрутка канала на YouTube','Регистрация Артистов в Сервисах для получения Заказов','Публикация Объявления на Популярных сайтах объявлений']],
      ['Поэтам и Писателям',['Литературный агент','Арт Директор Поэта','Продвижение Художников']],
      ['Продвижение Песни',['Дистрибьюция ИИ песен.','Дистрибьюция Музыки. Дистрибьюция Музыки в России.','Выпуск Музыкального релиза','Продвижение Песен в Плей-листах']],
      ['Продвижение в Одноклассниках',['Консультация Специалиста по Продвижению Сайта или Социальных сетей','Создание Групп в Одноклассниках','Продвижение и Раскрутка Песен и Клипов ВКонтакте и Одноклассниках','Реклама Концертов, Мероприятий, а также Услуг и Товаров в Соц. Сетях','Приведем Клиентов на ваш Сайт, Покупателей на ваши Услуги и Товары']],
      ['Продвижение ВКонтакте',['Кабинет Артиста ВК Музыка','Карточка Артиста, Музыканта','Консультация Специалиста по Продвижению Сайта или Социальных сетей','Создание Страниц и Групп ВКонтакте','Продвижение и Раскрутка Песен и Клипов ВКонтакте и Одноклассниках','Раскрутка ВКонтакте','Реклама Концертов, Мероприятий, а также Услуг и Товаров в Соц. Сетях','Приведем Клиентов на ваш Сайт, Покупателей на ваши Услуги и Товары','Репосты ВКонтакте для рекламы Видео, Песни, Книги!']],
      ['Продвижение в Telegram',['Раскрутка Telegram канала','Создание и ведение канала в Telegram']],
      ['Арт Директор для Моделей',['СОЗДАНИЕ ПОРТФОЛИО','Выездной Фотограф']],
      ['Создание Портфолио',['Выездной Фотограф']],
      ['Консультации, Встречи',['Консультация Специалиста по Продвижению Сайта или Социальных сетей']],
      ['Управление репутацией в интернете',['Сколько стоит убрать плохой отзыв?','Что делать с накрученными отзывами конкурентов?','Через сколько виден результат от управления репутацией?']],
      ['Купить Песню',['Песни для детей']],
      ['Политический PR',[]],
      ['Певцам / Музыкантам / Артистам',[]],
      ['Попасть в журналы',['Выездной Фотограф']],
      ['Радио Менеджер',[]],
      ['ПРОДВИЖЕНИЕ ХУДОЖНИКА',['Возможности для Художников, Скульпторов, Дизайнеров','Участие в Московских Выставках, Биенале, Вернисажах']],
    ];
}
function pv_all_services_menu($mobile=false){
    $catalog=pv_service_catalog();
    if($mobile){
        $html='<div class="mega-mobile-items">';
        foreach($catalog as $group){
            $html.='<div class="mobile-service-group"><a class="mobile-service-parent" href="'.esc_url(pv_service_link($group[0])).'">'.esc_html($group[0]).'</a>';
            if(!empty($group[1])){ $html.='<div class="mobile-service-children">'; foreach($group[1] as $child){$u=pv_service_link($child); if($u!=='#') $html.='<a href="'.esc_url($u).'">'.esc_html($child).'</a>';} $html.='</div>'; }
            $html.='</div>';
        }
        $html.='<div class="mobile-service-extra"><a class="mobile-service-parent" href="'.esc_url(pv_articles_page_url()).'">Статьи и новости</a><a class="mobile-service-parent" href="'.esc_url(pv_page_url_by_title('Контакты',home_url('/#contact'))).'">Контакты</a></div></div>';
        return $html;
    }
    $cols=array_chunk($catalog, max(1,(int)ceil(count($catalog)/4)));
    $html='<div class="mega-inner">';
    foreach($cols as $col){
        $html.='<div class="mega-col">';
        foreach($col as $group){
            $html.='<div class="mega-group"><a class="mega-parent" href="'.esc_url(pv_service_link($group[0])).'">'.esc_html($group[0]).'</a>';
            if(!empty($group[1])){ $html.='<div class="mega-children">'; foreach($group[1] as $child){$u=pv_service_link($child); if($u!=='#') $html.='<a href="'.esc_url($u).'">'.esc_html($child).'</a>';} $html.='</div>'; }
            $html.='</div>';
        }
        $html.='</div>';
    }
    $html.='<aside class="mega-extra"><strong>Разделы сайта</strong><a href="'.esc_url(pv_articles_page_url()).'">Статьи и новости</a><a href="'.esc_url(pv_page_url_by_title('О нас',home_url('/#about'))).'">О нас</a><a href="'.esc_url(pv_page_url_by_title('Контакты',home_url('/#contact'))).'">Контакты</a></aside></div>';
    return $html;
}

function pv_articles_query_var($vars){$vars[]='pv_articles';return $vars;}
add_filter('query_vars','pv_articles_query_var');
function pv_articles_rewrite(){add_rewrite_rule('^stati/?$','index.php?pv_articles=1','top');}
add_action('init','pv_articles_rewrite');
function pv_articles_template($template){
    if((int)get_query_var('pv_articles')===1){
        $custom=get_template_directory().'/articles.php';
        if(file_exists($custom)) return $custom;
    }
    return $template;
}
add_filter('template_include','pv_articles_template');
add_action('after_switch_theme',function(){pv_articles_rewrite();flush_rewrite_rules();});
