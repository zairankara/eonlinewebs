<?
$hoy=date("Ymdhi");
$fin="201508252100";
if($hoy<$fin){
?>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
    <style>
    html. body{
      margin: 0;
    }
    .count{
      float: right;
      width: 250px;
    }
    .bg{
      margin: 0;
      height: 100px;
      width: 635px;
      background: url('countdown.gif') no-repeat top left;
      text-align: center;
      padding: 10px 0;
      font: 12px/1.4 'Open Sans', 'Helvetica','Arial', sans-serif;
    }
    .callback,
    .simple {
      font-size: 20px;
      background: #ece2d6;
      padding: 0.5em 0.7em;
      color: #99479b;
      margin-bottom: 50px;
      -webkit-transition: background 0.5s ease-out;
      transition: background 0.5s ease-out;
      font: 12px/1.4 'Open Sans', 'Helvetica','Arial', sans-serif;
    }
    .callback{
      cursor: pointer;
    }
    .ended {
      background: #ece2d6;
    }
    .styled{
      margin-bottom: 10px;
      text-align: center;
    }
    .title {
      display: inline-block;
      /* margin-left: 10px; */
      font-size: 12px;
      font-weight: 700;
      line-height: 1;
      text-align: center;
      color: #99479b !important;
      margin-bottom: 8px;
          margin-top: 5px;
    }
    .styled div {
      display: inline-block;
      margin-left: 10px;
      font-size: 30px;
      font-weight: 100;
      line-height: 1;
      text-align: right;
    }
    /* IE7 inline-block hack */
    *+html .styled div{
      display: inline;
      zoom: 1;
    }
    .styled div:first-child {
      margin-left: 0;
    }
    .styled div span {
      display: block;
      border-top: 1px solid #cecece;
      padding-top: 3px;
      font-size: 12px;
      font-weight: normal;
      text-transform: uppercase;
      text-align: center;
    }

    </style>
    <div class="bg">
      <div class="count">
        <div class="countdown title">FALTA PARA LA GRAN FINAL</div>
        <div class="countdown styled"></div>
      </div>
     </div>
    <script src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript" src="jquery.countdown.js"></script>
    <script type="text/javascript">
      $(function() {
        var endDate = "August 25, 2015 21:00:25";

        $('.countdown.simple').countdown({ date: endDate });

        $('.countdown.styled').countdown({
          date: endDate,
          render: function(data) {
            $(this.el).html("<div>" + this.leadingZeros(data.days, 2) + " <span>días</span></div><div>" + this.leadingZeros(data.hours, 2) + " <span>horas</span></div><div>" + this.leadingZeros(data.min, 2) + " <span>min</span></div><div>" + this.leadingZeros(data.sec, 2) + " <span>seg</span></div>");
          }
        });

        $('.countdown.callback').countdown({
          date: +(new Date) + 10000,
          render: function(data) {
            $(this.el).text(this.leadingZeros(data.sec, 2) + " sec");
          },
          onEnd: function() {
            $(this.el).addClass('ended');
          }
        }).on("click", function() {
          $(this).removeClass('ended').data('countdown').update(+(new Date) + 10000).start();
        });

      });
    </script>
<?}?>