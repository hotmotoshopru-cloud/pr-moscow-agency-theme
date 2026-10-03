<?php
if (!defined('ABSPATH')) exit;

/* V24.2 — legacy service menu with reliable links to both Pages and Posts. */
function pv_fixed_service_url_map(){
    static $map = null;
    if($map !== null) return $map;

    $cache_key = 'pv_fixed_service_url_map_v3';
    $cached = get_transient($cache_key);
    if(is_array($cached)){
        $map = $cached;
        return $map;
    }

    global $wpdb;
    $catalog = pv_fixed_service_catalog();
    $titles = [];

    foreach($catalog as $group){
        $titles[] = trim(wp_strip_all_tags($group[0]));
        foreach($group[1] as $child){
            $titles[] = trim(wp_strip_all_tags($child));
        }
    }

    $titles = array_values(array_unique(array_filter($titles)));
    if(empty($titles)){
        $map = [];
        return $map;
    }

    $placeholders = implode(',', array_fill(0, count($titles), '%s'));
    $sql = "SELECT ID, post_title, post_type
            FROM {$wpdb->posts}
            WHERE post_status = 'publish'
              AND post_type IN ('page','post')
              AND post_title IN ($placeholders)
            ORDER BY FIELD(post_type,'page','post'), post_date ASC";

    $rows = $wpdb->get_results($wpdb->prepare($sql, ...$titles));

    $map = [];
    foreach((array)$rows as $row){
        $key = trim(wp_strip_all_tags($row->post_title));
        if($key !== '' && !isset($map[$key])){
            $map[$key] = get_permalink((int)$row->ID);
        }
    }

    /* Cache the resolved URLs so the large legacy menu does not query
       WordPress for every single menu item on every page view. */
    set_transient($cache_key, $map, 12 * HOUR_IN_SECONDS);

    return $map;
}

function pv_fixed_find_service_url($title){
    $title = trim(wp_strip_all_tags($title));
    if($title === '') return '';

    $map = pv_fixed_service_url_map();
    return isset($map[$title]) ? $map[$title] : '';
}

function pv_fixed_service_link($title){
    $url = pv_fixed_find_service_url($title);
    return $url ? $url : '#';
}

function pv_fixed_service_catalog(){
    return [
      ['PR Услуги',['Создание Презентаций','Написание Пресс Релиза','Реклама Концертов, Мероприятий, а также Услуг и Товаров в Соц. Сетях','Приведем Клиентов на ваш Сайт, Покупателей на ваши Услуги и Товары','Регистрация Артистов в Сервисах для получения Заказов','Публикация Объявления на Популярных сайтах объявлений','Выездной Фотограф']],
      ['Концертный Директор',['Певцам / Музыкантам / Артистам','Концертный Директор в тарифе Lait','Концертный Директор для Артистов из Регионов','Концертный Директор в тарифе Promo','Концертный Директор в тарифе Maxi','Концертный Директор в тарифе Full','Концертный Директор в тарифе Super','Детский Концертный Директор','Личный Концертный Директор','Реклама Концертов, Мероприятий, а также Услуг и Товаров в Соц. Сетях','Приглашение Зрителей на ваш Концерт или Мероприятие','Регистрация Артистов в Сервисах для получения Заказов','Публикация Объявления на Популярных сайтах объявлений','Выездной Фотограф']],
      ['Провести свой КОНЦЕРТ',['Тариф – КОНЦЕРТ','Тариф – Большой Концерт','Реклама Концертов, Мероприятий, а также Услуг и Товаров в Соц. Сетях','Приглашение Зрителей на ваш Концерт или Мероприятие','Публикация Объявления на Популярных сайтах объявлений','Выездной Фотограф']],
      ['Тариф – Концертный Тур',['Тариф – Большой Концертный Тур','Реклама Концертов, Мероприятий, а также Услуг и Товаров в Соц. Сетях','Приглашение Зрителей на ваш Концерт или Мероприятие','Регистрация Артистов в Сервисах для получения Заказов','Публикация Объявления на Популярных сайтах объявлений']],
      ['Пиар Менеджер',['Тарифы работы Пиар Менеджера','Личный Пиар Менеджер','Создание Презентаций','Регистрация Артистов в Сервисах для получения Заказов','Приведем Клиентов на ваш Сайт, Покупателей на ваши Услуги и Товары','Публикация Объявления на Популярных сайтах объявлений','Выездной Фотограф']],
      ['Съемка Клипа',['Клип Менеджер','Караоке Клип','Концертный Клип','Уличный Клип']],
      ['Создание Сайта',['Консультация Специалиста по Продвижению Сайта или Социальных сетей','SEO Аудит Сайта','Тарифы создания Сайтов','Оптимизация САЙТА','Поисковое продвижение Сайта. Раскрутка Сайта. Вывод в Топ поисковых систем.','КОНТЕНТ-АРХИВАТОР','Ведение сайта. Поддержание сайта.','Продвижение в Яндекс','Приведем Клиентов на ваш Сайт, Покупателей на ваши Услуги и Товары']],
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

function pv_fixed_services_menu($mobile=false){
    $cache_key=$mobile ? 'pv_fixed_services_menu_mobile_v2' : 'pv_fixed_services_menu_desktop_v2';
    $cached=get_transient($cache_key);
    if(is_string($cached) && $cached!=='') return $cached;

    $catalog=pv_fixed_service_catalog();
    if($mobile){
        $html='<div class="mega-mobile-items">';
        foreach($catalog as $group){
            $parent_url=pv_fixed_service_link($group[0]);
            $html.='<div class="mobile-service-group"><a class="mobile-service-parent" href="'.esc_url($parent_url).'">'.esc_html($group[0]).'</a>';
            if(!empty($group[1])){
                $html.='<div class="mobile-service-children">';
                foreach($group[1] as $child){
                    $u=pv_fixed_service_link($child);
                    if($u!=='#') $html.='<a href="'.esc_url($u).'">'.esc_html($child).'</a>';
                }
                $html.='</div>';
            }
            $html.='</div>';
        }
        $html.='<div class="mobile-service-extra"><a class="mobile-service-parent" href="'.esc_url(pv_articles_page_url()).'">Статьи и новости</a><a class="mobile-service-parent" href="'.esc_url(pv_page_url_by_title('Контакты',home_url('/#contact'))).'">Контакты</a></div></div>';
        set_transient($cache_key,$html,12 * HOUR_IN_SECONDS);
        return $html;
    }
    $cols=array_chunk($catalog,max(1,(int)ceil(count($catalog)/4)));
    $html='<div class="mega-inner">';
    foreach($cols as $col){
        $html.='<div class="mega-col">';
        foreach($col as $group){
            $html.='<div class="mega-group"><a class="mega-parent" href="'.esc_url(pv_fixed_service_link($group[0])).'">'.esc_html($group[0]).'</a>';
            if(!empty($group[1])){
                $html.='<div class="mega-children">';
                foreach($group[1] as $child){
                    $u=pv_fixed_service_link($child);
                    if($u!=='#') $html.='<a href="'.esc_url($u).'">'.esc_html($child).'</a>';
                }
                $html.='</div>';
            }
            $html.='</div>';
        }
        $html.='</div>';
    }
    $html.='<aside class="mega-extra"><strong>Разделы сайта</strong><a href="'.esc_url(pv_articles_page_url()).'">Статьи и новости</a><a href="'.esc_url(pv_page_url_by_title('О нас',home_url('/#about'))).'">О нас</a><a href="'.esc_url(pv_page_url_by_title('Контакты',home_url('/#contact'))).'">Контакты</a></aside></div>';
    set_transient($cache_key,$html,12 * HOUR_IN_SECONDS);
    return $html;
}
