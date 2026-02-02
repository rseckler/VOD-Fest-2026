    </div><!-- #main-content -->

<footer class="footer" role="contentinfo">
    <div class="footer-waveform waveform" aria-hidden="true">
        <?php for ($i = 0; $i < 20; $i++) : ?>
            <div class="waveform-bar"></div>
        <?php endfor; ?>
    </div>

    <div class="footer-content container">
        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 40px; padding: 60px 20px;">

            <div class="footer-section">
                <h4 style="color: var(--color-gold); margin-bottom: 20px;">VOD FEST 2026</h4>
                <p>17-19 July 2026<br>Friedrichshafen<br>Germany</p>
                <p style="margin-top: 20px;"><a href="mailto:frank@vod-records.com" style="color: var(--color-gold);">frank@vod-records.com</a></p>
            </div>

            <div class="footer-section">
                <h4 style="color: var(--color-gold); margin-bottom: 20px;">Quick Links</h4>
                <ul style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 10px;"><a href="<?php echo home_url('/'); ?>">Home</a></li>
                    <li style="margin-bottom: 10px;"><a href="<?php echo home_url('/lineup/'); ?>">Lineup</a></li>
                    <li style="margin-bottom: 10px;"><a href="<?php echo home_url('/timetable/'); ?>">Schedule</a></li>
                    <li style="margin-bottom: 10px;"><a href="<?php echo home_url('/tickets/'); ?>">Tickets</a></li>
                    <li style="margin-bottom: 10px;"><a href="<?php echo home_url('/contact/'); ?>">Contact</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h4 style="color: var(--color-gold); margin-bottom: 20px;">Legal</h4>
                <ul style="list-style: none; padding: 0;">
                    <li style="margin-bottom: 10px;"><a href="<?php echo home_url('/impressum/'); ?>">Impressum</a></li>
                    <li style="margin-bottom: 10px;"><a href="<?php echo home_url('/datenschutzerklaerung/'); ?>">Datenschutz</a></li>
                    <li style="margin-bottom: 10px;"><a href="<?php echo home_url('/terms-conditions/'); ?>">Terms & Conditions</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h4 style="color: var(--color-gold); margin-bottom: 20px;">Follow Us</h4>
                <div style="display: flex; gap: 15px; margin-top: 20px; flex-wrap: wrap;">
                    <?php if (get_theme_mod('vod_fest_facebook')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('vod_fest_facebook')); ?>" target="_blank" rel="noopener" title="Facebook" style="width: 40px; height: 40px; border: 2px solid var(--color-brass); display: flex; align-items: center; justify-content: center; transition: all var(--transition-base);" onmouseover="this.style.borderColor='var(--color-gold)'; this.style.boxShadow='0 0 10px rgba(212, 175, 55, 0.5)'" onmouseout="this.style.borderColor='var(--color-brass)'; this.style.boxShadow='none'">FB</a>
                    <?php endif; ?>
                    <?php if (get_theme_mod('vod_fest_instagram')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('vod_fest_instagram')); ?>" target="_blank" rel="noopener" title="Instagram" style="width: 40px; height: 40px; border: 2px solid var(--color-brass); display: flex; align-items: center; justify-content: center; transition: all var(--transition-base);" onmouseover="this.style.borderColor='var(--color-gold)'; this.style.boxShadow='0 0 10px rgba(212, 175, 55, 0.5)'" onmouseout="this.style.borderColor='var(--color-brass)'; this.style.boxShadow='none'">IG</a>
                    <?php endif; ?>
                    <?php if (get_theme_mod('vod_fest_youtube')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('vod_fest_youtube')); ?>" target="_blank" rel="noopener" title="YouTube" style="width: 40px; height: 40px; border: 2px solid var(--color-brass); display: flex; align-items: center; justify-content: center; transition: all var(--transition-base);" onmouseover="this.style.borderColor='var(--color-gold)'; this.style.boxShadow='0 0 10px rgba(212, 175, 55, 0.5)'" onmouseout="this.style.borderColor='var(--color-brass)'; this.style.boxShadow='none'">YT</a>
                    <?php endif; ?>
                    <?php if (get_theme_mod('vod_fest_bandcamp')) : ?>
                        <a href="<?php echo esc_url(get_theme_mod('vod_fest_bandcamp')); ?>" target="_blank" rel="noopener" title="Bandcamp" style="width: 40px; height: 40px; border: 2px solid var(--color-brass); display: flex; align-items: center; justify-content: center; transition: all var(--transition-base);" onmouseover="this.style.borderColor='var(--color-gold)'; this.style.boxShadow='0 0 10px rgba(212, 175, 55, 0.5)'" onmouseout="this.style.borderColor='var(--color-brass)'; this.style.boxShadow='none'">BC</a>
                    <?php endif; ?>
                </div>
            </div>

        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <p style="text-align: center; padding: 20px; font-size: 14px; color: var(--color-brass);">
                &copy; <?php echo date('Y'); ?> VOD Fest. All Rights Reserved.
            </p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
