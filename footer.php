<?php if (!defined('__TYPECHO_ROOT_DIR__'))
    exit; ?>

</div><!-- end .row -->
</div><!-- end #container -->

<div id="footer" role="contentinfo">
    &copy; <?php echo date('Y'); ?> <a href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title(); ?></a>.
    <?php _e('<a href="https://github.com/MrXiaoM/typecho-theme-old-fashion">Old Fasion</a> Theme. Powered by <a href="http://www.typecho.org">Typecho</a>.'); ?>
</div><!-- end #footer -->

<?php $this->footer(); ?>
</div><!-- end outbox -->

<!-- 侧边栏 -->
<script src="<?php $this->options->themeUrl('script/sidebar.js'); ?>"></script>

<!-- 代码高亮 -->
<script src="<?php $this->options->themeUrl('script/highlight.js'); ?>"></script>

<!-- 暗色主题 -->
<script>
    const darkStyleLink = "<?php $this->options->themeUrl('style/dark.css'); ?>";
</script>
<script src="<?php $this->options->themeUrl('script/dark.js'); ?>"></script>

<!-- 额外用户配置 -->
<?php if ($this->options->extraScript): ?>
    <script>
        <?php $this->options->extraScript(); ?>
    </script>
<?php endif; ?>
<?php if ($this->options->extraHtml): ?>
    <?php $this->options->extraHtml(); ?>
<?php endif; ?>

</body>

</html>