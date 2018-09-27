<?php if (!is_sticky()) {?>

    <?php //if (!is_single()) { echo '<li class="col-sm-4 col-xs-12">'; }?>
        <article id="post-<?php the_ID(); ?>" <?php post_class("col-sm-4 col-xs-12 grid-item"); ?> >

                <div class="entry-content">

                    <?php
                    $anchofoto=420;

                    $Html="";
                    $Html = get_the_content();
                    $patron = '|<p class=["\']wp-caption-text["\']>(.*?)</p>|is';
                    $extracto_caption = '';

                    if (preg_match($patron, $Html, $extracto1))
                    {
                        $extracto_caption = $extracto1[1];
                        $cant_len=strlen($extracto_caption);
                    }

                    $tiene_video_home=sacar_video($Html);
                    $image_ch_explode=sacar_img_con_src($Html);
                    $image_ch_explode_resize=url_resize($Html,$anchofoto);

                    if($tiene_video_home==""){
                        if($image_ch_explode_resize)
                        {?>
                            <div class="imagen_post">
                                <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><img src="<?php echo $image_ch_explode_resize;?>" alt="<?php the_title(); ?>" title="<?php the_title(); ?>" class="img-responsive"/></a>
                                <?php echo("<div class='caption_img'>".$extracto_caption."</div>");?>

                                <!-- REDES SOCIALES POR POST-->
                                <div class="social-icons-small" data-url="<?php the_permalink() ?>?utm_campaign=VisitorShare" data-title="<?php echo $post->post_title; ?>">
                                    <div class="social-icon facebook">
                                        <a class="social-fb" target="_blank" onclick="share('Facebook','<?php the_permalink() ?>?utm_campaign=VisitorShare', '<?php echo $post->post_title; ?>', 'Article', '<?php echo $image_ch_explode_resize;?>');" href="javascript:void(0);"></a>
                                    </div>
                                    <div class="social-icon twitter">
                                        <a class="social-tw" onclick="share('Twitter', '<?php the_permalink(); ?>?utm_campaign%3DVisitorShare', '<?php echo $post->post_title; ?>', 'Article', '<?php echo $image_ch_explode_resize;?>')" href="javascript:void(0);" ></a>
                                    </div>
                                    <?php if( wp_is_mobile() ){?> 
                                        <div class="social-icon whatsapp">
                                            <a class="social-whatsapp" onclick="share('Whatsapp', 'whatsapp://send?text=<?php echo $post->post_title; ?> <?php the_permalink(); ?>?utm_campaign%3DVisitorShare', '<?php echo $post->post_title; ?>', 'Article', null)" href="javascript:void(0);" ></a>
                                        </div>
                                    <?php } ?>
                                </div>
                                <!-- / REDES SOCIALES POR POST-->

                            </div>
                        <?}?>
                    <?}else{?>
                        <?php echo $tiene_video_home;?>
                    <?}?>

                    <?php if ('post' == get_post_type()) { // Hide category and tag text for pages on Search ?>

                        <div class="entry-meta-category-tag">
                            <?php
                            /* translators: used between list items, there is a space after the comma */
                            $categories_list = get_the_category_list(__(', ', 'bootstrap-basic'));
                            if (!empty($categories_list)) {
                                ?>
                                <span class="cat-links">
                                        <?php echo bootstrapBasicCategoriesList($categories_list); ?>
                                    </span>
                            <?php } // End if categories ?>

                            <?php
                            /* translators: used between list items, there is a space after the comma */
                            /* $tags_list = get_the_tag_list('', __(', ', 'bootstrap-basic'));
                            if ($tags_list) {
                                ?>
                                <span class="tags-links">
                                <?php echo bootstrapBasicTagsList($tags_list); ?>
                            </span>
                            <?php } // End if $tags_list */?>
                        </div><!--.entry-meta-category-tag-->


                    <?php } // End if 'post' == get_post_type() ?>

                    <div class="contenido_nota_ch">
                        <header class="entry-header">
                            <h2 class="entry-title"><a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                        </header><!-- .entry-header -->

                        <?php //the_content(bootstrapBasicMoreLinkText()); ?>
                        <?php //wp_limit_abz($cant_len); ?>


                        <?php
                        /**
                         * This wp_link_pages option adapt to use bootstrap pagination style.
                         * The other part of this pager is in inc/template-tags.php function name bootstrapBasicLinkPagesLink() which is called by wp_link_pages_link filter.
                         */
                        wp_link_pages(array(
                            'before' => '<div class="page-links" >' . __('Pages:', 'bootstrap-basic') . ' <ul class="pagination">',
                            'after'  => '</ul></div>',
                            'separator' => ''
                        ));
                        ?>
                        <div class="clearfix"></div>
                            <?php if ('post' == get_post_type()) { ?>
                                <div class="entry-meta">
                                    <time class="pull-left date updated"><span class="glyphicon glyphicon-time"></span>&nbsp;<?php echo the_time(); ?></time>
                                    <div class="pull-right"><?php echo getPostViews(get_the_ID()); ?></div>
                                </div><!-- .entry-meta -->
                            <?php } //endif; ?>
                            <span class="vcard author " style="display:none;">
                                    <span class="fn"><a href="https://plus.google.com/109640549139413649832?rel=author" rel="author">Eonline Latino</a></span>
                            </span>
                            <div class="clearfix"></div>
                    </div>
                </div><!-- .entry-content -->



        </article><!-- #post-## -->
    <?php //if (!is_single()) { echo '</li>'; }?>
<?php } ?>
