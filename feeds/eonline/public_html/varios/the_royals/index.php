    <style>
        #contendor_royals{
            margin: 0 10px;
            width: 630px;
            height: 495px;
            text-align: center;
            background: #000;
        }
        #royals{
            position:relative;
            width: 610px;
            height: 365px;
            margin: 0 auto;
        }
        #all{
            display:block;
        }
        #bannerRoyals{
            margin: 10px auto;
            width: 630px;
            height: 80px;
        }

        .images-royals{
            position:absolute;
            top:0;
            left:0;
            display:none;
        }
        .clicksFront{
            position:absolute;
            z-index:99;
            cursor: pointer;
        }

        .marcus{
            width: 70px;
            height: 66px;
            top: 35px;
            left: 17px;
        }
        .ashok {
            width: 70px;
            height: 110px;
            top: 173px;
            left: 21px;
        }
        .ophelia {
            width: 49px;
            height: 110px;
            top: 66px;
            left: 90px;
        }
        .penelope {
            width: 52px;
            height: 110px;
            top: 17px;
            left: 142px;
        }
        .liam {
            width: 48px;
            height: 110px;
            top: 123px;
            left: 164px;
        }
        .cyrus {
            width: 48px;
            height: 110px;
            top: 30px;
            left: 198px;
        }
        .gemma {
            width: 48px;
            height: 110px;
            top: 175px;
            left: 212px;
        }
        .maribel {
            width: 48px;
            height: 60px;
            top: 31px;
            left: 255px;
        }
        .helena {
            width: 48px;
            height: 210px;
            top: 27px;
            left: 314px;
        }
        .ted {
            width: 48px;
            height: 68px;
            top: 24px;
            left: 369px;
        }
        .simon {
            width: 65px;
            height: 110px;
            top: 82px;
            left: 385px;
        }
        .eleanor {
            width: 50px;
            height: 110px;
            top: 46px;
            left: 460px;
        }
        .jasper {
            width: 62px;
            height: 171px;
            top: 15px;
            left: 538px;
        }

    </style>
    <script>
        $(document).ready(function(){
            $(".clicksFront").click(function(){
                var name = $(this).attr("data-name");
                $("#all").hide();
                $(".images-royals").hide();
                $("#"+name).show();
            });
        });
    </script>
<div id="contendor_royals">
    <article><img src="/varios/the_royals/images/cab_map.jpg" class="cab-royals" width="630" height="30" alt="todos"/></article>
    <article id="royals">
        <img src="/varios/the_royals/images/todos.jpg" class="images-royals" id="all" width="610" height="365" alt="todos"/>

        <img src="/varios/the_royals/images/ted.jpg" class="images-royals" id="ted" width="610" height="365" alt="ted"/>
        <img src="/varios/the_royals/images/simon.jpg" class="images-royals" id="simon" width="610" height="365" alt="simon"/>
        <img src="/varios/the_royals/images/penelope.jpg" class="images-royals" id="penelope" width="610" height="365" alt="penelope"/>
        <img src="/varios/the_royals/images/ophelia.jpg" class="images-royals" id="ophelia" width="610" height="365" alt="ophelia"/>
        <img src="/varios/the_royals/images/maribel.jpg" class="images-royals" id="maribel" width="610" height="365" alt="maribel"/>
        <img src="/varios/the_royals/images/marcus.jpg" class="images-royals" id="marcus" width="610" height="365" alt="marcus"/>
        <img src="/varios/the_royals/images/liam.jpg" class="images-royals" id="liam" width="610" height="365" alt="liam"/>
        <img src="/varios/the_royals/images/jasper.jpg" class="images-royals" id="jasper" width="610" height="365" alt="jasper"/>
        <img src="/varios/the_royals/images/helena.jpg" class="images-royals" id="helena" width="610" height="365" alt="helena"/>
        <img src="/varios/the_royals/images/gemma.jpg" class="images-royals" id="gemma" width="610" height="365" alt="gemma"/>
        <img src="/varios/the_royals/images/eleanor.jpg" class="images-royals" id="eleanor" width="610" height="365" alt="eleanor"/>
        <img src="/varios/the_royals/images/cyrus.jpg" class="images-royals" id="cyrus" width="610" height="365" alt="cyrus"/>
        <img src="/varios/the_royals/images/ashok.jpg" class="images-royals" id="ashok" width="610" height="365" alt="ashok"/>

        <div data-name="ted" class="ted clicksFront"></div>
        <div data-name="simon" class="simon clicksFront"></div>
        <div data-name="penelope" class="penelope clicksFront"></div>
        <div data-name="ophelia" class="ophelia clicksFront"></div>
        <div data-name="maribel" class="maribel clicksFront"></div>
        <div data-name="marcus" class="marcus clicksFront"></div>
        <div data-name="liam" class="liam clicksFront"></div>
        <div data-name="jasper" class="jasper clicksFront"></div>
        <div data-name="helena" class="helena clicksFront"></div>
        <div data-name="gemma" class="gemma clicksFront"></div>
        <div data-name="eleanor" class="eleanor clicksFront"></div>
        <div data-name="cyrus" class="cyrus clicksFront"></div>
        <div data-name="ashok" class="ashok clicksFront"></div>
    </article>
     <article id="bannerRoyals"><a href="http://la.eonline.com/experience/quizzes/TheRoyals/" target="_blank"><img src="/varios/the_royals/images/banner_royals.jpg" class="cab-royals" width="630" height="80" alt="todos"/></a></article>
    
</div>