<?=date("F j, Y, g:i a");?>
<?echo date_default_timezone_get() . ' => ' . date('e') . ' => ' . date('T');?>

<br><br>

<?$vect=getdate();?>
-><?=print_r($vect);?><br>
-><?=$vect[wday]?><br>
-><?=time()?><br>
->wp_time: 1341019651

