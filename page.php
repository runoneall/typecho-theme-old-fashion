<?php if (!defined('__TYPECHO_ROOT_DIR__'))
    exit; ?>
<?php $this->need('header.php'); ?>

<!-- 在链接页面引入额外css -->
<?php if ($this->is('page', 'links')): ?>
    <link rel="stylesheet" href="<?php $this->options->themeUrl('style/links.css'); ?>">
<?php endif; ?>

<div class="col-mb-12 col-8" id="main" role="main">
    <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
        <h1 class="post-title" itemprop="name headline">
            <a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
        </h1>
        <div class="post-content" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
    </article>
    <?php $this->need('comments.php'); ?>
</div><!-- end #main-->

<!-- 在链接页面引入额外js -->
<?php if ($this->is('page', 'links')): ?>
    <script src="<?php $this->options->themeUrl('script/links.js'); ?>"></script>
    <script>
        CORS_DRIVER = '<?php $corsProvider = $this->options->corsProvider;
        echo ($corsProvider == '') ? $this->options->themeUrl . '/netdrive.php/' : $corsProvider; ?>';
        putLinks(`<?php $this->options->siteOutLinks() ?>`);
    </script>
<?php endif; ?>

<?php $this->need('footer.php'); ?>