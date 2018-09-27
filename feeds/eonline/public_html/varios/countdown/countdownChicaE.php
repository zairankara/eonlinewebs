<?
$hoy=date("Ymdhi");
$fin="201508252100";
if($hoy<$fin){
?>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" type="text/css">
    <style>
    .count_mundial{
      margin: 0;
      width: 290px;
      background-color: #f8f8f8;
      text-align: center;
      padding: 10px 0;
      font: 13px/1.4 'Open Sans', 'Helvetica','Arial', sans-serif;
    }
    .callback,
    .simple {
      font-size: 20px;
      background: #27ae60;
      padding: 0.5em 0.7em;
      color: #ecf0f1;
      margin-bottom: 50px;
      -webkit-transition: background 0.5s ease-out;
      transition: background 0.5s ease-out;
      font: 13px/1.4 'Open Sans', 'Helvetica','Arial', sans-serif;
        color: #333;
    }
    .callback{
      cursor: pointer;
    }
    .ended {
      background: #c0392b;
    }
    .styled{
      margin-bottom: 10px;
      text-align: center;
    }
    .title {
      display: inline-block;
      /* margin-left: 10px; */
      font-size: 16px;
      font-weight: 700;
      line-height: 1;
      text-align: center;
      color: #0399d8 !important;
      margin-bottom: 8px;
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
    <div class="count_mundial">
      <div class="countdown title">FALTA PARA EL CIERRE DE CHICA E!</div>
      <div class="countdown styled"></div>
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