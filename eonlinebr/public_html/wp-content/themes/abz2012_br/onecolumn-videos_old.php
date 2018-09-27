<?php include (TEMPLATEPATH . '/var_constantes.php'); ?>

<?php
/**
 * Template Name: VIDEOS
 *
 * A custom page template without sidebar.
 *
 * The "Template Name:" bit above allows this to be selectable
 * from a dropdown menu on the edit page screen.
 *
 * @package WordPress
 * @subpackage Twenty_Ten
 * @since Twenty Ten 1.0
 */

get_header(); ?>



    <div id="container" class="one-column">
      <div id="content" role="main">
        <div class="cont_one-clumn">
               <h2 style="color:<?php echo cat_color('videos');?>; margin-bottom:20px;">VIDEOS</h2>
      
          
                  <!-- Start of Brightcove Player -->
                  <div style="display:none"></div>
                  <object id="myExperience" class="BrightcoveExperience">
                    <param name="bgcolor" value="#FFFFFF" />
                    <param name="width" value="930" />
                    <param name="height" value="654" />
                    <param name="playerID" value="<?=$var_con[7]?>" />
                    <param name="playerKey" value="<?=$var_con[8]?>" />
                    <param name="isVid" value="true" />
                    <param name="isUI" value="true" />
                    <param name="dynamicStreaming" value="true" />
                    <param name="wmode" value="transparent" />
                  </object>
                  <script type="text/javascript">brightcove.createExperiences();</script>

          <!-- End of Brightcove Player -->
        </div>
      </div><!-- #content -->
    </div><!-- #container -->

<?php get_footer(); ?>
