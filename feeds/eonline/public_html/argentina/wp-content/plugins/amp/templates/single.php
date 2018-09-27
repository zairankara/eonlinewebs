<!doctype html>
<html amp <?php echo AMP_HTML_Utils::build_attributes_string( $this->get( 'html_tag_attributes' ) ); ?>>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
    <link rel="stylesheet" href='https://fonts.googleapis.com/css?family=Lato:400,700,300%7COswald:400,300,700' type='text/css'>        
	<?php do_action( 'amp_post_template_head', $this ); ?>
	<style amp-custom>
		<?php $this->load_parts( array( 'style' ) ); ?>
		<?php do_action( 'amp_post_template_css', $this ); ?>
		.ads{
			width: 100%;
			text-align: center;
			margin: 10px auto;
		}
		/*amp-ad{
			margin: 10px auto;
		}*/
		.amp-button{
			background: none;
		    border: 0;
		    color: #fff;
		    right: 10px;
		    top: 5px;
		}
		.amp-shares{
			margin: 0 auto;
			text-align: center;
		}
		.amp-wp-header {
			background-image: url(http://la.eonline.com/common/imgs/navRedesign2016-sprite.png);
		    background-repeat: no-repeat;
		    background-position: left -566px;
		}
		amp-social-share{
		    border-radius: 15px;
		    background-size: 75%;
    		margin: 0 2px;
	    }
	    .amp-wp-article-content amp-img{
	    	margin: 0 -16px;
	    	width: calc(100% + 32px);
	    	max-width: calc(100% + 32px);
	    }
	    aside.list{
	    	display: block;
		    background-color: #f5f5f5;
		    padding: 20px 30px;
		    margin-top: 20px; 
	    }
	    aside.list li{
	    	    list-style: none;
			    padding: 10px;
			    border-bottom: 1px solid #d8d8d8;
			    text-align: center;
	    }
	    aside.list li:last-child{
	    	border-bottom:none;
	    }
	     aside.list li a{
	     	text-decoration: none;
	     	
	     }
	     aside h2{
	     	text-align: center;
	     }
	      aside.list h3{
	     	width: calc(100% - 220px);
		    display: table-cell;
		    color: #219fd0;
	      } 
	    aside.list amp-img{
	    	margin-right: 10px;
	    	display: inline-block;
	    	width: 200px;
	    }
	    .amp-sticky-ad-close-button {
	      min-width: 0;
	    }
	    .amp-flying-carpet-text-border {
		    background-color: #999;
		    color: white;
		    text-align: center;
		}
	</style>
<script async custom-element="amp-sticky-ad" src="https://cdn.ampproject.org/v0/amp-sticky-ad-1.0.js"></script>
<script async custom-element="amp-fx-flying-carpet" src="https://cdn.ampproject.org/v0/amp-fx-flying-carpet-0.1.js"></script>
<script async custom-element="amp-ad" src="https://cdn.ampproject.org/v0/amp-ad-0.1.js"></script>
<script async custom-element="amp-social-share" src="https://cdn.ampproject.org/v0/amp-social-share-0.1.js"></script>
<script async custom-element="amp-brightcove" src="https://cdn.ampproject.org/v0/amp-brightcove-0.1.js"></script>
</head>

<body class="<?php echo esc_attr( $this->get( 'body_class' ) ); ?>">

<amp-sticky-ad layout="nodisplay">
  <amp-ad width="320"
      height="50"
      type="doubleclick"
      data-slot="/8877/Argentina/Mobile/banner_1">
  </amp-ad>
</amp-sticky-ad>

<?php $this->load_parts( array( 'header-bar' ) ); ?>

<article class="amp-wp-article">

		<!--<div class="ads">
			<amp-ad width=320 height=50
			    type="doubleclick"
			    data-slot="/8877/Argentina/Mobile/banner_1">
			</amp-ad>
		</div>-->
		

	<header class="amp-wp-article-header">
		<h1 class="amp-wp-title"><?php echo wp_kses_data( $this->get( 'post_title' ) ); ?></h1>
		<p><?php echo the_time(); ?></p>
		<?php //$this->load_parts( apply_filters( 'amp_post_article_header_meta', array( 'meta-author', 'meta-time' ) ) ); ?>
		<div class="amp-shares">
		     <amp-social-share type="facebook"
		        width="30"
		        height="30" 
		        data-param-app_id="634812053340480"></amp-social-share>
		    <amp-social-share type="twitter"
		        width="30"
		        height="30" > </amp-social-share>
		    <amp-social-share type="gplus"
		        width="30"
		        height="30" ></amp-social-share>
		    <amp-social-share type="pinterest"
		        width="30"
		        height="30" ></amp-social-share>
		    <amp-social-share type="email"
		        width="30"
		        height="30" ></amp-social-share>
		    
		       
		  </div>
	</header>

	<?php //$this->load_parts( array( 'featured-image' ) ); ?>

	<div class="amp-wp-article-content">
		<?php echo $this->get( 'post_amp_content' ); // amphtml content; no kses ?>
	</div>

	<div class="ads">
	    <div class="amp-flying-carpet-text-border">Publicidad</div>
		<amp-fx-flying-carpet height="300px">
	      <amp-ad width="300"
	        height="600"
	        class="align-center"
	        layout="fixed"
	        type="doubleclick"
	        data-slot="/8877/Argentina/Mobile/flying_carpet">
	      </amp-ad>
	    </amp-fx-flying-carpet>
	    <div class="amp-flying-carpet-text-border">Publicidad</div>
	</div>
	
	<amp-brightcove
	    data-account="96980687001"
	    data-player="B1pqtqxtx"
	    data-embed="default"
	    data-playlist-id="664965066001"
	    data-param-language="es"
	    layout="responsive"
	    width="480" height="270">
	</amp-brightcove>

	<div class="ads">
		<amp-ad width=300 height=250
		    type="doubleclick"
		    data-slot="/8877/Argentina/Home/BoxBanner_1">
		</amp-ad>
	</div>

	
<?php
    echo '<aside class="list"><h2 class="amp-wp-title">OTRAS NOTICIAS</h2><ul>';
   	$url = 'http://la.eonline.com/varios/JSON/JSONanalytics/argentina.json';
    $contents = file_get_contents($url);
    $json_str = utf8_encode($contents);
    $mas_leidos = json_decode($json_str,true);
		foreach ($mas_leidos as $key) {

			$mas_leidas_titulo_explode = explode("|", $key[0]);
			$mas_leidas_titulo_sin = str_replace('"', '', $mas_leidas_titulo_explode[0]);
			$mas_leidas_titulo = str_replace("'", "", $mas_leidas_titulo_sin);
			$mas_leidas_url = $key[1];
			$mas_leidas_image = $key[5];

			$extrae3 = explode("//rs_",$mas_leidas_image);
			if($extrae3[1]!=""){
	            $image3 = explode("-",$extrae3[1]);
	            $image3=$image3[0];

	            $image_wh = explode("x",$image3);
	            $image_w = $image_wh[0];
	            $image_h = $image_wh[1];
	        }
			$regla=round(200*$image_h/$image_w);

			?>
			<li><a href="<?php echo $mas_leidas_url;?>amp/" title="<?php echo $mas_leidas_titulo;?>">
				<amp-img src="<?php echo $mas_leidas_image;?>" alt="<?php echo $mas_leidas_titulo;?>" title="<?php echo $mas_leidas_titulo;?>" width="200" height="<?php echo $regla;?>" ></amp-img>
				<h3 class="amp-wp-title"><?php echo $mas_leidas_titulo;?></h3>
			</a></li>

		<?php }
		echo '</ul></aside>';

?>
<div class="ads">
	<amp-ad width=300 height=250
	    type="doubleclick"
	    data-slot="/8877/Argentina/Home/BoxBanner_2">
	</amp-ad>
</div>


<footer class="amp-wp-article-footer">
		<?php //$this->load_parts( apply_filters( 'amp_post_article_footer_meta', array( 'meta-taxonomy', 'meta-comments-link' ) ) ); ?>
	</footer>

</article>
<?php if($_GET["debug"]!=""){?>
	
	<?php //echo "<pre>"; ?>
	<?php //var_dump($this); ?>
	<?php //echo "</pre>"; ?>
<?php }?>


<?php
$category = get_the_category();
$firstCategory = $category[0]->slug;
?>
 <amp-analytics type="adobeanalytics" id="adobeanalytics">
  <script type="application/json">
  {
  	"transport": {"xhrpost": false, "beacon": true},
    "requests": {
      "base": "https://${host}/b/ss/${reportSuites}/1/AMP-0.1/s${random}",
      "myClick": "${click}&v1=${eVar1}"
    },
    "vars": {
      "host": "elatinar.112.2o7.net",
      "reportSuites": "elatinar"
    },
    "extraUrlParams": {
    	"channel" : "<?php echo $firstCategory;?>",
    	"pageName": "<?php echo $this->get( 'canonical_url' );?>amp/",
        "v2": "Mobile",
        "v6": "AMP Google",
        "v11": "<?php echo $this->get( 'document_title' );?>",
        "v12": "<?php echo $this->get( 'canonical_url' );?>amp/",
        "v51": "Google - Organic",
        "v52": "AMP Google",
        "v53": "AMP Google",
        "v54": "<?php echo $this->get( 'document_title' );?>"
    },
    "triggers": {
      "pageLoad": {
        "on": "visible",
        "request": "pageview"
      },
      "click": {
        "on": "click",
        "selector": "button",
        "request": "myClick",
        "vars": {
          "eVar1": "button clicked"
        }
      }
    }
  }
  </script>
</amp-analytics>

<amp-analytics type="comscore">
	<script type="application/json">
	{
		"vars": {
			"c2": "6035083"
		},
		"extraUrlParams": {
			"comscorekw": "amp"
		}
	}
	</script>
</amp-analytics>

<?php $this->load_parts( array( 'footer' ) ); ?>

<?php do_action( 'amp_post_template_footer', $this ); ?>

</body>
</html>
