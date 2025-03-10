<?php
/**
 * 复古主题, 基于 MrXiaoM/typecho-theme-old-fashion 修改
 *
 * @package Old Fasion Theme (R1a改)
 * @author Runoneall
 * @version 1.3
 * @link https://dev.oneall.eu.org/
 */

if (!defined('__TYPECHO_ROOT_DIR__'))
    exit;
$this->need('header.php');
?>

<div id="main" role="main">
    <?php while ($this->next()): ?>
        <article class="post" itemscope itemtype="http://schema.org/BlogPosting">
            <h2 class="post-title" itemprop="name headline">
                <a itemprop="url" href="<?php $this->permalink() ?>"><?php $this->title() ?></a>
            </h2>
            <ul class="post-meta">
                <li itemprop="author" itemscope itemtype="http://schema.org/Person"><?php _e('作者: '); ?><a itemprop="name"
                        href="<?php $this->author->permalink(); ?>" rel="author"><?php $this->author(); ?></a></li>
                <li><?php _e('时间: '); ?>
                    <time datetime="<?php $this->date('c'); ?>" itemprop="datePublished"><?php $this->date(); ?></time>
                </li>
                <li><?php _e('分类: '); ?><?php $this->category(','); ?></li>
                <li itemprop="interactionCount">
                    <a itemprop="discussionUrl"
                        href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('评论', '1 条评论', '%d 条评论'); ?></a>
                </li>
            </ul>
            <div class="post-content index-post-content" itemprop="articleBody">
                <?php $this->excerpt((int) $this->options->postMaxSymbols, '...'); ?>
            </div>
        </article>
    <?php endwhile; ?>

    <?php $this->pageNav('&laquo; 前一页', '后一页 &raquo;'); ?>
</div><!-- end #main-->

<?php $this->need('footer.php'); ?>