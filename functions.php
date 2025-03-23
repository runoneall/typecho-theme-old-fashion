<?php
if (!defined('__TYPECHO_ROOT_DIR__'))
    exit;

function themeInit($self)
{
    $postsCount = $self->size(
        $self->select()
            ->where('table.contents.status = ?', 'publish')
            ->where('table.contents.type = ?', 'post')
    );
    $self->parameter->pageSize = $postsCount;
}

function themeConfig($form)
{
    $logoUrl = new \Typecho\Widget\Helper\Form\Element\Text(
        'logoUrl',
        null,
        null,
        _t('站点 LOGO 地址'),
        _t('在这里填入一个图片 URL 地址, 以在网站标题前加上一个 LOGO')
    );
    $form->addInput($logoUrl);

    $extraSideHtml = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'extraSideHtml',
        null,
        null,
        _t('侧边栏额外html')
    );
    $form->addInput($extraSideHtml);

    $postMaxSymbols = new \Typecho\Widget\Helper\Form\Element\Text(
        'postMaxSymbols',
        null,
        '150',
        _t('简介文章最大字数')
    );
    $form->addInput($postMaxSymbols);

    $corsProvider = new \Typecho\Widget\Helper\Form\Element\Text(
        'corsProvider',
        null,
        '',
        _t('CORS跨域代理'),
        _t('跨域代理地址, 留空为使用默认, 请求URL将会拼接到此代理地址之后')
    );
    $form->addInput($corsProvider);

    $siteIntroduce = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'siteIntroduce',
        null,
        null,
        _t('随机站点介绍, 每行一个')
    );
    $form->addInput($siteIntroduce);

    $siteOutLinks = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'siteOutLinks',
        null,
        null,
        _t('链接页面JSON')
    );
    $form->addInput($siteOutLinks);

    $showRecentPosts = new \Typecho\Widget\Helper\Form\Element\Text(
        'showRecentPosts',
        null,
        '最新文章',
        _t('显示最新文章'),
        _t('填写字符修改标题，留空为不显示')
    );
    $form->addInput($showRecentPosts);

    $showRecentComments = new \Typecho\Widget\Helper\Form\Element\Text(
        'showRecentComments',
        null,
        '最近回复',
        _t('显示最近回复'),
        _t('填写字符修改标题，留空为不显示')
    );
    $form->addInput($showRecentComments);

    $showCategory = new \Typecho\Widget\Helper\Form\Element\Text(
        'showCategory',
        null,
        '分类',
        _t('显示分类'),
        _t('填写字符修改标题，留空为不显示')
    );
    $form->addInput($showCategory);

    $showArchive = new \Typecho\Widget\Helper\Form\Element\Text(
        'showArchive',
        null,
        '归档',
        _t('显示归档'),
        _t('填写字符修改标题，留空为不显示')
    );
    $form->addInput($showArchive);

    $showOther = new \Typecho\Widget\Helper\Form\Element\Text(
        'showOther',
        null,
        '其它',
        _t('显示其它杂项'),
        _t('填写字符修改标题，留空为不显示')
    );
    $form->addInput($showOther);

    $extraStyle = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'extraStyle',
        null,
        null,
        _t('额外css')
    );
    $form->addInput($extraStyle);

    $extraScript = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'extraScript',
        null,
        null,
        _t('额外javascript (footer)')
    );
    $form->addInput($extraScript);

    $extraHtml = new \Typecho\Widget\Helper\Form\Element\Textarea(
        'extraHtml',
        null,
        null,
        _t('额外html (body末尾)')
    );
    $form->addInput($extraHtml);
}