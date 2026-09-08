from pathlib import Path
import re
p=Path('/mnt/data/v14work/front-page.php')
s=p.read_text()
# Replace service image filenames with exact reference crops
for i in range(1,7):
    s=s.replace(f"'service-{i}.jpg'", f"'ref-service-{i}.jpg'")
# Replace entire direction grid block
start=s.index('<div class="direction-grid">')
end=s.index('</div></div></section>', start)+len('</div>')
new='''<div class="direction-grid">
<a class="direction d1" href="<?php echo esc_url(home_url('/?page_id=844')); ?>"><div class="direction-copy"><span class="direction-num">01</span><b>Артисты<br>и музыка</b></div><img src="<?php echo esc_url($base.'/assets/img/ref-direction-1.jpg'); ?>" alt="Продвижение артистов и музыкальный PR"></a>
<a class="direction d2" href="<?php echo esc_url(home_url('/?page_id=1804')); ?>"><div class="direction-copy"><span class="direction-num">02</span><b>Политический<br>PR</b></div><img src="<?php echo esc_url($base.'/assets/img/ref-direction-2.jpg'); ?>" alt="Политический PR и коммуникации"></a>
<a class="direction d3" href="<?php echo esc_url(home_url('/?page_id=324')); ?>"><div class="direction-copy"><span class="direction-num">03</span><b>PR бизнеса<br>и брендов</b></div><img src="<?php echo esc_url($base.'/assets/img/ref-direction-3.jpg'); ?>" alt="PR бизнеса и брендов"></a>
<a class="direction d4" href="<?php echo esc_url(home_url('/?p=894')); ?>"><div class="direction-copy"><span class="direction-num">04</span><b>Сайты<br>и SEO</b></div><img src="<?php echo esc_url($base.'/assets/img/ref-direction-4.jpg'); ?>" alt="Создание сайтов и SEO-продвижение"></a>
<a class="direction d5" href="<?php echo esc_url(home_url('/?cat=321')); ?>"><div class="direction-copy"><span class="direction-num">05</span><b>VK<br>и соцсети</b></div><img src="<?php echo esc_url($base.'/assets/img/ref-direction-5.jpg'); ?>" alt="Продвижение VK и социальных сетей"></a>
<a class="direction d6" href="<?php echo esc_url(home_url('/?cat=373')); ?>"><div class="direction-copy"><span class="direction-num">06</span><b>Telegram<br>и мессенджеры</b></div><img src="<?php echo esc_url($base.'/assets/img/ref-direction-6.jpg'); ?>" alt="Продвижение Telegram и мессенджеров"></a>
<a class="direction d7" href="<?php echo esc_url(home_url('/?page_id=1733')); ?>"><div class="direction-copy"><span class="direction-num">07</span><b>Репутация<br>и антикризис</b></div><img src="<?php echo esc_url($base.'/assets/img/ref-direction-7.jpg'); ?>" alt="Управление репутацией и антикризисный PR"></a>
<a class="direction d8" href="<?php echo esc_url(home_url('/?page_id=290')); ?>"><div class="direction-copy"><span class="direction-num">08</span><b>Писатели, поэты,<br>художники</b></div><img src="<?php echo esc_url($base.'/assets/img/ref-direction-8.jpg'); ?>" alt="Продвижение писателей, поэтов и художников"></a>
</div>'''
s=s[:start]+new+s[end:]
p.write_text(s)

css=Path('/mnt/data/v14work/style.css')
c=css.read_text()
# Add V14 override block
c += '''\n\n/* V14 — exact approved reference layout for services and niche directions */
.services-section .services{grid-template-columns:repeat(6,minmax(0,1fr));gap:10px}
.services-section .service{border-radius:10px;box-shadow:0 8px 22px rgba(18,42,88,.07)}
.services-section .service img{height:112px;object-fit:cover}
.services-section .service-body{padding:10px 10px 11px}
.services-section .service h3{font-size:13px;line-height:1.12}
.services-section .service p{font-size:9.5px;line-height:1.32;min-height:40px}
.seo-directions{padding-top:26px;background:#fff}
.seo-directions .section-head{margin-bottom:16px}
.seo-directions h2{font-size:34px;letter-spacing:-1.5px}
.seo-directions .lead{max-width:900px;font-size:12px;margin-top:7px}
.seo-directions .direction-grid{grid-template-columns:repeat(4,minmax(0,1fr));gap:10px}
.seo-directions .direction{min-height:94px;height:94px;padding:14px 112px 12px 13px;border:1px solid #e0e6f2;border-radius:9px;background:#fff;box-shadow:0 6px 18px rgba(24,44,88,.045);display:block;position:relative;overflow:hidden}
.seo-directions .direction:before,.seo-directions .direction:after{display:none}
.seo-directions .direction-copy{position:relative;z-index:2}
.seo-directions .direction-num{display:block!important;font-size:8px!important;color:#536482!important;letter-spacing:.3px!important;font-weight:900!important;margin:0 0 6px!important}
.seo-directions .direction b{display:block;font-size:13px;line-height:1.08;margin:0;letter-spacing:-.2px}
.seo-directions .direction img{position:absolute;right:0;top:0;width:104px;height:94px;object-fit:cover;display:block;clip-path:polygon(17% 0,100% 0,100% 100%,0 100%);transition:transform .25s ease}
.seo-directions .direction:hover img{transform:scale(1.045)}
.seo-directions .direction:hover{transform:translateY(-2px);box-shadow:0 12px 26px rgba(24,44,88,.1)}
@media(max-width:1120px){.services-section .services{grid-template-columns:repeat(3,minmax(0,1fr))}.seo-directions .direction-grid{grid-template-columns:repeat(2,minmax(0,1fr))}}
@media(max-width:760px){.services-section .services{grid-template-columns:repeat(2,minmax(0,1fr))}.seo-directions .direction-grid{grid-template-columns:1fr}.seo-directions .direction{min-height:112px;height:112px}.seo-directions .direction img{height:112px;width:130px}}
@media(max-width:480px){.services-section .services{grid-template-columns:1fr}.seo-directions .direction{padding-right:135px}}
'''
css.write_text(c)

# Update theme version
c=css.read_text().replace('Version: 12.0','Version: 14.0')
css.write_text(c)
