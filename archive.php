<?php
/**
 * 根据默认皮肤修改的主题
 *
 * @package Typecho Replica Theme
 * @author Typecho Team
 * @version 1.2
 * @link http://typecho.org
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

<div class="container main">
	<div class="row">
		<div class="col-md-8">
			<ol class="breadcrumb current">
				<li><a href="<?php $this->options->siteUrl(); ?>">首页</a></li>
                <li class="active"><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ''); ?></li>
			</ol>
			<?php if ($this->have()): ?>
			<?php while($this->next()): ?>
				<?php if(get_postthumb($this) == ''): ?>
				<div class="card nothumb-card">
				<?php else: ?>
				<div class="card">
				<?php endif; ?>
					<?php if(get_postthumb($this) != ''): ?>
						<a href="<?php $this->permalink() ?>" class="card-thumb">
							<div class="thumb-pic lazyload" data-original="<?php echo get_postthumb($this) ?>"></div>
						</a>
					<?php endif; ?>
					<div class="card-inner">
						<h5><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h5>
						<div class="meta"><span><i class="glyphicon glyphicon-time"
									aria-hidden="true"></i><?php $this->date('Y.m.d'); ?></span><span><i
									class="glyphicon glyphicon-file" aria-hidden="true"></i><?php $this->category(','); ?></span><span><i
									class="glyphicon glyphicon-comment" aria-hidden="true"></i><a itemprop="discussionUrl" href="<?php $this->permalink() ?>#comments"><?php $this->commentsNum('暂无评论', '1 条评论', '%d 条评论'); ?></a></span></div>
						<p class="desc"><?php $this->excerpt(160, ' ...'); ?></p>
					</div>
				</div>
			<?php endwhile; ?>
			<?php else: ?>
				<div class="no-data">
					<?php _e('没有找到内容'); ?>
				</div>
			<?php endif; ?>
			<div class="pages">
				<?php $this->pageNav('←', '→',1, '...', array('wrapTag' => 'ul', 'wrapClass' => 'pagination', 'itemTag' => 'li', 'textTag' => 'a', 'currentClass' => 'active')); ?>
			</div>
		</div>
		<?php $this->need('sidebar.php'); ?>
	</div>
</div>

<?php $this->need('footer.php'); ?>