<?php get_header(); ?>
<main class="section articles-page"><div class="wrap">
<div class="section-head"><div><span class="kicker">PR · МЕДИА · DIGITAL</span><h1>Статьи и новости</h1><p class="lead">Экспертные материалы PRодвижения: PR, продвижение, репутация, SMM, сайты, SEO, музыка и события.</p></div></div>
<div class="blog-grid articles-grid">
<?php $q=new WP_Query(['posts_per_page'=>30,'post_status'=>'publish','ignore_sticky_posts'=>true]); $icons=['PR','SEO','SMM','MEDIA','BRAND','ART','WEB','PR','DIGITAL','MEDIA']; $n=0; if($q->have_posts()): while($q->have_posts()):$q->the_post();$icon=$icons[$n%count($icons)]; ?>
<article class="post"><a href="<?php the_permalink(); ?>"><?php if(has_post_thumbnail()): ?><div class="post-media"><img class="post-img" src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(),'medium_large')); ?>" alt="<?php the_title_attribute(); ?>"><span class="post-icon"><?php echo esc_html($icon); ?></span></div><?php else: ?><div class="post-media post-placeholder"><span class="post-placeholder-word"><?php echo esc_html($icon); ?></span></div><?php endif; ?><div class="post-body"><span class="post-date"><?php echo esc_html(get_the_date('d.m.Y')); ?></span><h3><?php the_title(); ?></h3><p><?php echo esc_html(wp_trim_words(get_the_excerpt(),24,'…')); ?></p><span class="post-more">Читать статью <b>→</b></span></div></a></article>
<?php $n++; endwhile; wp_reset_postdata(); else: ?><p>Статьи пока не опубликованы.</p><?php endif; ?>
</div></div></main><?php get_footer(); ?>
