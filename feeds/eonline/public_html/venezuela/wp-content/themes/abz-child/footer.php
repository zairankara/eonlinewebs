<?php
/**
 * The theme footer
 * 
 * @package bootstrap-basic
 */
?>

			</div><!--.site-content-->


			<footer id="site-footer" role="contentinfo">
				<div id="footer-row" class="site-footer">

                    <div id="footer" class="col-md-12">
                                                <!-- LOGO E! online latino -->
                        <div id="site-info" class="col-md-2 col-xs-6">
                            <a href="<?php echo home_url( '/' ) ?>"><img src="/common/imgs/footer_eonlinelatino.png" class="img-responsive"> </a>
                        </div>

                        <!-- / LOGO E! online latino -->
                        <div class=" col-md-2 col-md-push-8 col-xs-6">
                            <a href="http://www.enowlatino.com" target="_blank" class="pull-right"><img src="/common/imgs/logoEnow.png" class="img-responsive"> </a>
                        </div>

                        <!-- links Pie -->
                        <div class="links_pie col-md-8 col-md-pull-2 col-xs-12 text-center">
                            <div class="ad_sales"><a href="http://enowlatino.com/" target="_blank" class="menu-item-a" >E Now Latino</a>
                                <!--| <a href="http://www.eonlinesaladeprensa.com/" target="_blank" class="menu-item-a" >DIGITAL PressRoom</a>-->
                                | <a href="http://www.nbcupdate.com/dac/" rel="noopener" target="_blank" class="menu-item-a" >DIGITAL ADS CATALOG</a>
                               <!--| <a href="http://www.eonlineadsales.com/" rel="noopener" target="_blank" class="menu-item-a" >ad sales</a></div>-->

                               
                            <?php wp_nav_menu( array( 'container_class' => 'menu-header', 'theme_location' => 'tertiary' ) ); ?>

                            <!-- MENU redes sociales-->
                            <div class="marginT25 text-center">
                                <?php include(STYLESHEETPATH."/pages/menu_redes.php"); ?>
                            </div>
                            <!-- MENU redes sociales-->
                            <div class="marginT10">
                                <form id="formCountry" method="post" name="buscador2" action="<?php echo $_SERVER["REQUEST_URI"]?>">
                                    <select id="changeCountry" name="cual" onchange="document.forms.buscador2.submit();_satellite.track('changeCountry');">
                                        <option value="" selected="">Selecciona tu país</option>
                                        <option value="2-AR">Argentina</option>
                                        <option value="1-CO">Aruba</option>
                                        <option value="1-CO">Barbados</option>
                                        <option value="1-CO">Bolivia</option>
                                        <option value="99-BR">Brasil</option>
                                        <option value="1-CO">Chile</option>
                                        <option value="1-CO">Colombia</option>
                                        <option value="1-CO">Costa Rica</option>
                                        <option value="1-CO">Curacao</option>
                                        <option value="1-CO">Ecuador</option>
                                        <option value="1-CO">El Salvador</option>
                                        <option value="1-CO">Guatemala</option>
                                        <option value="1-CO">Honduras</option>
                                        <option value="3-mx">México</option>
                                        <option value="1-CO">Nicaragua</option>
                                        <option value="1-CO">Panamá</option>
                                        <option value="2-AR">Paraguay</option>
                                        <option value="1-CO">Perú</option>
                                        <option value="1-CO">Puerto Rico</option>
                                        <option value="1-CO">Republica Dominicana</option>
                                        <option value="1-CO">Trinidad &amp; Tobago</option>
                                        <option value="2-AR">Uruguay</option>
                                        <option value="4-VE">Venezuela</option>
                                    </select>
                                    <input type="hidden" name="flag" value="1">
                                </form>
                            </div>

                        </div>
                        <!-- / links Pie -->
                        




                        <div class="logo_lamac"></div>
                        <div class="abz"><a href="http://www.abzcomunicacion.com" target="_blank">ABZ Diseño y Comunicación: Diseño y desarrollo de sitios web, marketing digital y BTL.</a></div>

					</div>

				</div>
			</footer>
            <footer>

                <div class="col-xs-12 text-center">
                    <p class="copy">&copy; <?php echo date('Y'); ?> E! Entertaiment Television, Inc. Todos los derechos reservados.</p>
                </div>

            </footer>

		</div><!--.container page-container-->
		
		
		<!--wordpress footer-->
		<?php wp_footer(); ?>


		<!--personalizacion-->

			<!--/* ScrollAnimacion */-->
			<?php if( is_home() || is_category() || is_search() || is_tag() || is_archive() ){?>
                <script src="/common/AnimOnScroll/modernizr.custom.js"></script>
                <script src="/common/AnimOnScroll/masonry.pkgd.min.js"></script>
                <script src="/common/AnimOnScroll/imagesloaded.pkgd.min.js"></script>
                <script src="/common/AnimOnScroll/classie.js"></script>
                <script src="/common/AnimOnScroll/AnimOnScroll2016.js"></script>

                <!--<script src="https://cdn.jsdelivr.net/jquery.sticky-kit/1.1.2/jquery.sticky-kit.min.js"></script>-->

                <script>
					jQuery(document).ready(function($) {

                        $('#status').fadeOut(); // will first fade out the loading animation
                        $('#preloader').fadeOut('slow'); // will fade out the white DIV that covers the website.
                        $('body').css({'overflow':'visible'});


                            function showpanel() {

                                $('.grid').fadeIn();
                                new AnimOnScroll(document.getElementById('grid'), {
                                    minDuration: 0.4,
                                    maxDuration: 0.7,
                                    viewportFactor: 0.2
                                });
                            }
                            setTimeout(showpanel, 800);


                        /* SEARCH */
                        if( $("body").hasClass("search") ){

                            $('#tabs a').click(function (e) {
                                e.preventDefault()
                                $(this).tab('show');
                                var cat = $(this).attr("data-category");

                                if(cat=="videos"){
                                    console.log("videos");
                                    /*var $container = $('.gridGalerias');
                                    $container.imagesLoaded( function () {
                                        $container.fadeIn();
                                        $container.masonry({
                                            columnWidth: '.grid-item-Gal',
                                            itemSelector: '.grid-item-Gal'
                                        });
                                        $('.grid-item-Gal img').addClass('not-loaded');
                                        $('.grid-item-Gal img.not-loaded').lazyload({
                                            effect: 'fadeIn',
                                            load: function() {
                                                // Disable trigger on this image
                                                $(this).removeClass("not-loaded");
                                                $container.masonry('layout');
                                                $(this).parent().parent().find(".caption_img").show();
                                                $(this).parent().parent().find(".social-icons-small").show();
                                                $(this).parent().parent().find(".nav__image-icon--video").show();
                                            }
                                        });
                                        $('.grid-item-Gal img.not-loaded').trigger('scroll');
                                        $container.masonry('layout');
                                    });*/

                                    function showpanel1() {
                                        new AnimOnScroll(document.getElementById('gridGalerias'), {
                                            minDuration: 0.4,
                                            maxDuration: 0.7,
                                            viewportFactor: 0.2
                                        });
                                    }
                                    setTimeout(showpanel1, 800);

                                }else if(cat=="galerias"){
                                    console.log("galerias");

                                    function showpanel2() {
                                        new AnimOnScroll(document.getElementById('gridGaleriasSearch'), {
                                             minDuration: 0.4,
                                             maxDuration: 0.7,
                                             viewportFactor: 0.2
                                         });
                                    }
                                    setTimeout(showpanel2, 800);

                                    /*var $containerGalSearch = $('.gridGaleriasSearch');
                                    $containerGalSearch.imagesLoaded( function () {
                                        $containerGalSearch.fadeIn();
                                        $containerGalSearch.masonry({
                                            columnWidth: '.grid-item-GalSearch',
                                            itemSelector: '.grid-item-GalSearch'
                                        });
                                        $('.grid-item-GalSearch img').addClass('not-loaded');
                                        $('.grid-item-GalSearch img.not-loaded').lazyload({
                                            effect: 'fadeIn',
                                            load: function() {
                                                // Disable trigger on this image
                                                $(this).removeClass("not-loaded");
                                                $containerGalSearch.masonry('layout');
                                                $(this).parent().parent().find(".caption_img").show();
                                                $(this).parent().parent().find(".social-icons-small").show();
                                                $(this).parent().parent().find(".nav__image-icon--photo").show();
                                            }
                                        });
                                        $('.grid-item-GalSearch img.not-loaded').trigger('scroll');
                                        $containerGalSearch.masonry('layout');
                                    });*/

                                }

                            })

                        }/* SEARCH */


                    });
				</script>

            <?}elseif( is_page("fotos-venezuela") ){?>
                
                <script src="/common/AnimOnScroll/modernizr.custom.js"></script>
                <script src="/common/AnimOnScroll/masonry.pkgd.min.js"></script>
                <script src="/common/AnimOnScroll/imagesloaded.pkgd.min.js"></script>
                <script src="/common/AnimOnScroll/classie.js"></script>
                <script src="/common/AnimOnScroll/AnimOnScroll2016.js"></script>
                <script src="http://cdn.jsdelivr.net/jquery.lazyload/1.8.4/jquery.lazyload.js"></script>
                <script>
					jQuery(document).ready(function($) {
                        $('#status').fadeOut(); // will first fade out the loading animation
                        $('#preloader').fadeOut('slow'); // will fade out the white DIV that covers the website.
                        $('body').css({'overflow':'visible'});
                        
                        var $container = $('.gridGalerias');
                        $container.imagesLoaded( function () {
                            $container.fadeIn();
                            $container.masonry({
                                columnWidth: '.grid-item-Gal',
                                itemSelector: '.grid-item-Gal'
                            });
                            $('.grid-item-Gal img').addClass('not-loaded');
                            $('.grid-item-Gal img.not-loaded').lazyload({
                                effect: 'fadeIn',
                                load: function() {
                                    // Disable trigger on this image
                                    $(this).removeClass("not-loaded");
                                    $container.masonry('layout');
                                    $(this).parent().parent().find(".caption_img").show();
                                    $(this).parent().parent().find(".social-icons-small").show();
                                    $(this).parent().parent().find(".nav__image-icon--photo").show();
                                    $(this).parent().parent().find(".nav__image-icon--video").show();
                                }
                            });
                            $('.grid-item-Gal img.not-loaded').trigger('scroll');
                        });
                    });
                </script>

            <?}elseif(is_single()){?>

                <script async src="/common/feeds/single_vz.min.js"></script>

            <?}?>

        <?php if(is_page("galerias")){?>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.0.0-beta.3/owl.carousel.min.js"></script>
        <?}else{?>
            <script src="/common/owl.carousel/owl.carousel.min.js"></script>
        <?}?>

        <!--/* script_skin */-->
        <?php include(STYLESHEETPATH."/pages/script_skin.php");?>
        <!--/* script_skin */-->
        

        <div id="fb-root"></div>
        <script>
            (function(d, s, id) {
                var js, fjs = d.getElementsByTagName(s)[0];
                if (d.getElementById(id)) return;
                js = d.createElement(s); js.id = id;
                js.src = "//connect.facebook.net/es_LA/all.js#xfbml=1&version=v2.6&appId=<?php echo APPID_FACEBOOK; ?>";
                fjs.parentNode.insertBefore(js, fjs);
            }(document, 'script', 'facebook-jssdk'));
        </script>
        <script>

        var objectGlobal = {};
        function share(que, hrefGET, titleGET, type, img){

            objectGlobal.netContent = que;
            objectGlobal.titleContent = titleGET;
            objectGlobal.typeContent = type;

            if(jQuery("body").hasClass("home")){
                //_satellite.track('sharedContentFrom');
            }else{
               // _satellite.track('sharedContentNotHomesCategoryes');
            }

            //console.log(hrefGET);
            if(que=='Facebook') {

                if(!img){
                    FB.ui({
                        app_Id: '<?php echo APPID_FACEBOOK; ?>',
                        method: 'share',
                        redirect_uri: hrefGET,
                        href: hrefGET,
                        title: titleGET,
                    }, function (response) {
                    });
                }else{
                    FB.ui({
                        app_Id: '<?php echo APPID_FACEBOOK; ?>',
                        method: 'share',
                        redirect_uri: hrefGET,
                        href: hrefGET,
                        picture: img,
                        title: titleGET,
                    }, function (response) {
                    });
                }


            }else if(que=='Twitter') {

                var prehref = '';

                /*if(isMobile()){
                    prehref="twitter://post?message=";
                }else{
                    prehref="https://twitter.com/share?text=".titleGET;
                }*/
                prehref="https://twitter.com/share?text="+titleGET;


                window.open(prehref, que, 'width=640,height=300');

            }else{
                window.open(hrefGET, que, 'width=640,height=300');
            }

        }

        jQuery(document).ready(function($) {

            /*var permalink = window.location.href;
            var getFacebookCount = function () {
                $.getJSON('http://graph.facebook.com/?ids='+permalink+'&callback=?', function(data){
                    var facebookShares = data[permalink].shares;
                    $('.facebook .share-count').text(facebookShares);
                });
            };
            getFacebookCount();

            var getPinterestCount = function () {
                $.getJSON('http://api.pinterest.com/v1/urls/count.json?url=' + permalink + '&callback=?', function(data) {
                    var pinterestShares = data.count;
                    $('.pinterest .share-count').text(pinterestShares);
                });
            };
            getPinterestCount();*/

            $('a.page-scroll, #NavR_Header_SearchBlock').bind('click', function(event) {
                jQuery("html, body").animate({
                    scrollTop: jQuery("html, body").offset().top
                }, 'slow');
                event.preventDefault();
            });

            jQuery(window).on("resize", (function(_this) {
                return function(e) {
                    return $(document.body).trigger("sticky_kit:recalc");
                };
            })(this));


            jQuery('#slides, .slides_container_EFB, #slideInstagram').owlCarousel({ // slides home y EFB
                items : 1,
                loop:true,
                dots:true,
                lazyLoad:true,
                autoplay:true,
                autoplayTimeout:3000,
                autoplayHoverPause:true
            });

            


            $("#NavR_Header_SearchBlock").click(function(){
                $("#NavR_Header_Search_Action").show()
                $("#NavR_Header_NavItemBlock").hide();
            });
            $(".NavR_Header_Search_Close").click(function(){
                $("#NavR_Header_Search_Action").hide()
                $("#NavR_Header_NavItemBlock").show();
            });


            function activaSubmenu(){
                $( ".submenu,#masthead ul li.menu-item").mouseenter(function() {
                    var linkMenu = $(this).attr("data-link") || $(this).attr("id");
                    $("#"+linkMenu).show();
                });

                $( ".submenu,#masthead ul li.menu-item").mouseleave(function() {
                    $(".submenu").hide();
                });
            }
            

            /*if(!isMobile())
            {                    
                jQuery.get("/common/submenues.php", { feed:"<?php echo NAMEFEED;?>", token:"<?php echo TOKEN;?>", playlist: "<?php echo playlist_HM;?>" }, function(data, status){
                    jQuery(".submenues").html(data);
                     activaSubmenu();
                    //alert("Data: " + data + "\nStatus: " + status);
                });
            }*/


            $(".submenu, #mas_leidas").find("img").addClass("img-responsive");

            //borro elementos vacios
            $(".site-main").find("br").remove();
            $(".site-main").find("a.more-link, br").remove();
            //$(".site-main").find("p, div, span").empty().remove();


            $(".NavR_Header_world").click(function(){
                if($(".div_select").width() == 0){
                    $(".div_select").animate({
                        // opacity: 0.25,
                        width: "140px",
                        //height: "toggle"
                        }, 600, function() {
                        // Animation complete.
                    });
                }else{
                    $(".div_select").animate({
                        // opacity: 0.25,
                        width: "0px",
                        //height: "toggle"
                        }, 600, function() {
                        // Animation complete.
                    });
                }

            });

            /* menu fixed */
            var menu = $('#masthead'),
                pos = menu.offset();


            $(window).scroll(function(){
                if($(this).scrollTop() > pos.top+menu.height() && menu.hasClass('default')){
                    menu.fadeOut('fast', function(){
                        $(this).removeClass('default').addClass('fixed').fadeIn('fast');
                         $("html").addClass('fixed');
                          if( jQuery("body").hasClass('single') && jQuery("html").hasClass("mobile") ){
                            jQuery("#related-single_mobile").show().addClass('animated fadeInUpBig');
                        }
                    });
                } else if($(this).scrollTop() <= pos.top && menu.hasClass('fixed')){
                    menu.fadeOut('fast', function(){
                        $(this).removeClass('fixed').addClass('default').fadeIn('fast');
                         $("html").removeClass('fixed');
                         if( jQuery("body").hasClass('single') && jQuery("html").hasClass("mobile") ){
                            jQuery("#related-single_mobile").fadeIn().removeClass('animated fadeInUpBig');
                        }
                    });
                }

            });
            window.onload = function() {
                if(/iP(hone|ad)/.test(window.navigator.userAgent)) {
                    var elements = document.querySelectorAll('button');
                    var emptyFunction = function() {};
                    for(var i = 0; i < elements.length; i++) {
                        elements[i].addEventListener('touchstart', emptyFunction, false);
                    }
                }
            };


            $(window).bind("resize", methodToFixLayout);
            function methodToFixLayout( e ) {
                var winWidth = $(window).width();

                //flechas single
                var pos_flecha=(winWidth/2)-500-50;
                var pos_flecha_der=(winWidth/2)+490;

                $('.navigation_single .nav-next').css({right: 0});
                $('.navigation_single .nav-previous').css({left: 0});

            }
            methodToFixLayout();

            /*$("#sidebar-right").stick_in_parent()
                .on("sticky_kit:stick", function(e) {
                    console.log("has stuck!", e.target);
                })
                .on("sticky_kit:unstick", function(e) {
                    console.log("has unstuck!", e.target);
                });*/

            /* SI ES MOBILE*/
            if(isTablet()) {
                 var $container = $('#sidebar-right');
                    $container.imagesLoaded( function () {
                        $container.masonry({
                            columnWidth: 'aside',
                            itemSelector: 'aside'
                        });
                    });

                 setTimeout(function() {
                    $container.imagesLoaded( function () {
                        $container.masonry({
                            columnWidth: 'aside',
                            itemSelector: 'aside'
                        });
                    });
                 },10000);
            }else{
                //console.log("NO ES TABLET");
            }

            if(isMobile()){

                /*f( $("body").hasClass("single") ){
                    var menu = $('.entry-social'),
                        pos = menu.offset();

                    $(window).scroll(function(){
                        if($(this).scrollTop() > pos.top+menu.height() && menu.hasClass('default')){
                            menu.fadeOut('fast', function(){
                                $(this).removeClass('default').addClass('fixed').fadeIn('fast');
                            });
                        } else if($(this).scrollTop() <= pos.top && menu.hasClass('fixed')){
                            menu.fadeOut('fast', function(){
                                $(this).removeClass('fixed').addClass('default').fadeIn('fast');
                            });
                        }
                    });
                }*/

                $(".search").click(function(){
                    if($(this).hasClass("colapsado")){
                        $(".menu_search").animate({top:"0"},250);
                        $(this).removeClass("colapsado");
                        $(this).addClass("expand");
                    }else{
                        $(".menu_search").animate({top:"-70px"},250);
                        $(this).removeClass("expand");
                        $(this).addClass("colapsado");
                    }
                });

                $(".navbar-toggle").click(function(){

                    if($(this).hasClass("colapsado")){
                        $("#NavR_Header_NavItemBlock_mobile").animate({right:"0"},250);
                        $(".grid").animate({left:"-160px"},250);
                        $(this).removeClass("colapsado");
                        $(this).addClass("expand");
                    }else{
                        $("#NavR_Header_NavItemBlock_mobile").animate({right:"-160px"},250);
                        $(".grid").animate({left:"0"},250);
                        $(this).removeClass("expand");
                        $(this).addClass("colapsado");
                    }
                });


            }else{/* SI NO ES MOBILE*/
                //$("#sidebar-right, #main-column").trigger("sticky_kit:detach");
            }

            if( $("body").hasClass("single") ){
                $(".entry-content>p").first().addClass("dest");
            }



            /*$(".owl-carousel").owlCarousel({
                responsive : {
                    // breakpoint from 0 up
                    0 : {
                        items:1,
                        nav:true
                    },
                        // breakpoint from 480 up
                        480 : {
                            items:4,
                            nav:true
                        }
                    }
            });*/

        });
    </script>

<!-- CodeBasic Omniture-->
<script type="text/javascript" data-device="1">_satellite.pageBottom();</script>
<!-- / CodeBasic Omniture-->

<!-- TAGS CODE INFINIA -->
<!-- <script async id="infiniasdk" data="80840e8061aaa52911bfc224b4ca4ec0" src="https://api.infiniamobile.com/apis/sdkv1/websdk/"></script>-->
<!-- / TAGS CODE INFINIA -->


<!-- TAGS CODE mindshareworld.com -->
<!--<?php //include($_SERVER["DOCUMENT_ROOT"].'/varios/mindshare/code.php'); //jose pidio sacar 6/7?>-->
<!-- END TAGS CODE mindshareworld.com -->

<!-- TAGS CODE THE ROYALS -->
<!-- <?php if( is_category("the-royals") || in_array("category-the-royals", add_category_to_single()) ){?>
		<?php //include($_SERVER["DOCUMENT_ROOT"].'/varios/the_royals_codes/code_footer.php');?>
<?}?> -->
<!-- END TAGS CODE THE ROYALS -->

<!-- Google Code for Etiqueta de remarketing: -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/varios/remarketing/remarketing.php');?>

<!-- Crazzy Egg Code -->
<?php //include("/home/eonline/public_html/varios/crazzy_egg/index.php");?>

<!-- Comscore -->
<?php include($_SERVER["DOCUMENT_ROOT"].'/varios/comscore/index.php');?>


</body>
</html>
