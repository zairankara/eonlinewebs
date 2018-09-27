<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="stylesheet" type="text/css" media="screen" href="http://la.eonline.com/andes/wp-content/themes/abz-child/assets/style_gallery.css" />
    <link rel="stylesheet" type="text/css" media="screen" href="http://la.eonline.com/common/owl.carousel/assets/owl.carousel.css" />

    <style type="text/css">
       
        .owl-carousel .owl-stage{
            margin: 0 auto;
        }
        .titulo_galeria p, .titulo_galeria p p a{
            font-size: 16px;
        }
        h2{
            font-family: "Oswald";
            color: #f3f3f3;
            font-size: 30px;
            margin: 10px 20px 0;
            float: left;
            width: 50%;
        }
        h4{
            float: right;
        }
        .mainGallery {
            margin-top: 15px;
        }
        .tresemme{
            width: 200px;
            height: 95px;
            float: right;
            margin-right: 10px;
        }
         @media (max-width: 767px) {
            #sync1.owl-carousel .owl-item img {
                width: 100%;
                margin: 0 auto;
            }
            .tresemme{
                width: auto;
                height: 65px;
                float: right;
                margin-right: 10px;
            }
            .tresemme img{
                width: auto;
                height: 65px;
            }
            h2{
                width: 25%;
            }
        }
    </style>
</head>
<body>


    <div style="display: block; width: 100%; height: 100px;">
        <h2>GALERIA</h2>
        <img src="assets/logo_tresemme.jpg" alt="Logo tresemme" class="tresemme"/>
    </div>
    <div class="mainGallery">

        <div id="sync1" class="owl-carousel">
            <?php
            	
            	$galleries2[0]["filename"] = "http://la.eonline.com/varios/anunciantes/tresemme/assets/WE-wenn28722225.jpg"; 
            	$galleries2[0]["title"] = "Vestidos casuales con cortes asimétricos discretos";
            	$galleries2[0]["description"] = "Clasos";
            	$galleries2[1]["filename"] = "http://la.eonline.com/varios/anunciantes/tresemme/assets/WE-wenn28720923.jpg"; 
            	$galleries2[1]["title"] = "Vestidos con pliegues desiguales.";
            	$galleries2[1]["description"] = "Clasos";
            	$galleries2[2]["filename"] = "http://la.eonline.com/varios/anunciantes/tresemme/assets/WE-wenn28720893.jpg"; 
            	$galleries2[2]["title"] = "Crop tops con cortes divertidos";
            	$galleries2[2]["description"] = "Clasos";
            	$galleries2[3]["filename"] = "http://la.eonline.com/varios/anunciantes/tresemme/assets/FFN-KM-TEEN-CHOICE-1-07312016-52137658.jpg"; 
            	$galleries2[3]["title"] = "Diversos cortes en el escote, las mangas y el borde inferior";
            	$galleries2[3]["description"] = "Clasos";
                $galleries2[4]["filename"] = "http://la.eonline.com/varios/anunciantes/tresemme/assets/WE-wenn28720951.jpg"; 
                $galleries2[4]["title"] = "Hombros escotados con ayuda de cortes rectos";
                $galleries2[4]["description"] = "Clasos";

            	$contador=count($galleries2);
				 
			//var_dump($galleries2);

            $cont_img=1;
            foreach($galleries2 as $image_gr){

                $description_limpio=strip_tags($image_gr["description"]);
                $titulo=$image_gr["title"];
                $image_gr_explode_resize=$image_gr["filename"];
                $title_gal="";
                ?>

                <picture class="item">
                    <div class="titulo_galeria">
                        <h3><?php echo $titulo; ?></h3>
                        <p>Foto: <?php echo $description_limpio; ?></p>
                        <h4><?php echo $cont_img;?>/<?php echo $contador; ?></h4>
                    </div>
                    <img class="owl-lazy img-responsive" style='height: auto;' data-src="<?php echo $image_gr_explode_resize;?>" alt="<?php echo $titulo; ?>" title="<?php echo $titulo; ?>"/>
                </picture>
                <?php
                $cont_img++;
            }?>
        </div>
    </div>
    <div class="thumbs">
        <div class="container">
            <div id="sync2" class=" owl-carousel">
                <?php 

                $cont_img=1;
                foreach($galleries2 as $image_ch){

                   	$description_limpio=strip_tags($image_ch["description"]);
	                $titulo=$image_ch["title"];
	                $image_ch_thumb_explode_resize=$image_ch["filename"];
                    ?>
                    <picture>
                        <img src="<?php echo $image_ch_thumb_explode_resize;?>" width="90" alt="<?php echo $titulo; ?>" title="<?php echo $titulo; ?>"/>
                    </picture>
                    <?php
                    $cont_img++;
                }?>
            </div>
        </div>
    </div>
<script type='text/javascript' src='http://la.eonline.com/andes/wp-includes/js/jquery/jquery.js?ver=1.11.3'></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/owl.carousel.min.js"></script>

<script type="text/javascript">

    jQuery(document).ready(function($) {
        var sync1 = $("#sync1");
        var sync2 = $("#sync2");
        var slidesPerPage=10;

        var syncedSecondary = true;

        sync1.owlCarousel({
            items : 1,
            slideSpeed : 2000,
            nav: true,
            dots: false,
            lazyLoad:true,
            lazyContent: true,
            loop: true,
            navText: ['',''],
        }).on('changed.owl.carousel', syncPosition);

        sync2
            .on('initialized.owl.carousel', function () {
                sync2.find(".owl-item").eq(0).addClass("current");
            })
            .owlCarousel({
                items : slidesPerPage,
                dots: false,
                nav: false,
                navText: ['',''],
                slideBy: slidesPerPage,
                responsive : {
                    0 : {
                        nav: false,
                    },
                    480 : {
                        nav: true,
                    }
                }
            });

        function syncPosition(el) {

            var count = el.item.count-1;
            var current = Math.round(el.item.index - (el.item.count/2) - .5);
            if(current < 0) {
                current = count;
            }
            if(current > count) {
                current = 0;
            }

            sync2
                .find(".owl-item")
                .removeClass("current")
                .eq(current)
                .addClass("current");
            var onscreen = sync2.find('.owl-item.active').length - 1;
            var start = sync2.find('.owl-item.active').first().index();
            var end = sync2.find('.owl-item.active').last().index();

            if (current > end) {
                sync2.data('owl.carousel').to(current, 100, true);
            }
            if (current < start) {
                sync2.data('owl.carousel').to(current - onscreen, 100, true);
            }

           

        }

        function syncPosition2(el) {
            if(syncedSecondary) {
                var number = el.item.index;
                sync1.data('owl.carousel').to(number, 100, true);
            }
        }

        sync2.on("click", ".owl-item", function(e){
            e.preventDefault();
            var number = $(this).index();
            sync1.data('owl.carousel').to(number, 300, true);
        });

        sync2.on('mousewheel', '.owl-stage', function (e) {
            if (e.deltaY>0) {
                sync2.trigger('next.owl');
            } else {
                sync2.trigger('prev.owl');
            }
            e.preventDefault();
        });
       

    });

</script>
</body>
</html>