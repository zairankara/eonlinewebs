<?php

$location = $options_page; 

?>

<script type="text/javascript">
    function updatePreview(){
            
			
			var feed_url    = document.rss_feeder.feed_url.value;
			var swf_url    = document.rss_feeder.swf_url.value;
			var proxy_status    = document.rss_feeder.proxy.value;
			document.getElementById("code").style.display = "block";
			
            if(swf_url.length < 12) {
			
	
			document.rss_feeder.code_text.value = 'wrong .swf URL';
				}
				 
			else if(feed_url.length < 12) {
			
	
			document.rss_feeder.code_text.value = 'wrong Feed URL';
			
				}
				
			else {
				document.rss_feeder.code_text.value = '<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="335" height="368" id="wp_RSStoMS" align="middle"><param name="allowScriptAccess" value="sameDomain" /><param name="allowFullScreen" value="false" /><param name="movie" value="'+swf_url+'" /><param name="quality" value="high" /><param name="bgcolor" value="#ffffff" />< embed src="'+swf_url+'" flashvars="rssfeed='+feed_url+'&proxy='+proxy_status+'" quality="high" bgcolor="#ffffff" width="335" height="368" name="wp_RSStoMS" align="middle" allowScriptAccess="sameDomain" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" /></object>';
			  }
			  
			if (proxy_status == 'false') {
						document.getElementById("crossdomain").style.display = "block";
						

}
			if (proxy_status == 'true') {
									document.getElementById("crossdomain").style.display = "none";
			
			}
			  
			  
    	}
		
</script>

<div class="wrap">
  <h2>RSS Feed anywhere</h2>
  

  <p> visit <a href="http://feeder.solverat.com">http://feeder.solverat.com</a> for more Information.
</p>
<fieldset class="options">
 <form name="rss_feeder" onclick="updatePreview();">
		<table class="form-table">
			<tr>
				<td width="30%" valign="top"><label for="limit">URL to your Feed</label>:<br /></td>
        
               
              
				<td><input name="feed_url" type="text"  value="<?php bloginfo('rss_url'); ?>" size="70"  />	<br /> 	<br /> </td>
  
   		</tr>
             
             <tr>
				<td><label for="limit">URL to your .swf File</label>:</td>
        
                
              
				<td><input name="swf_url" type="text" value="http://"  size="70"  /><br /><small>ex: http://www.yourdomain.com/wp_RSSfa.swf</small>	<br /> 	<br /></td>
  
   			 </tr>
		
           	<tr>
			 <td><label for="show_pass_post">Proxy?</label></td>
				<td>
            	<select name="proxy">
                <option value="true">true</option>
              	<option value="false">false</option>
              	
            	</select> <br /><br />
				</td>
			</tr>
            <tr><br /><br />
			 <td><label for="show_pass_post"></label></td>
				<td>
            	<input type="button" class="button"  value="generate code" /><br /><br />
				</td>
			</tr>
          
        	</table>
        	<table id="code" width="100%" style="display:none;" class="form-table" >
             <tr>
				<td width="40%" valign="top"><label>your code:<br /><br /><small>cute copy & past into your website</small></label></td>
				<td>
            	<textarea name="code_text" style="overflow:hidden;" cols="70" rows="15"></textarea>
                </form>
				</td>
			</tr>
            </table>
            <br /><br />
            
            <table width="100%" id="crossdomain" class="form-table"  style="display:none;">
             <tr>
				<td width="40%" valign="top"><label>crossdomain.xml:<br /><br /><small>because you won&rsquo;t use the<br /> proxy function, you have
                to place<br /> a crossdomain.xml on your root.<br /><br />copy this text into a textfile,<br /> remove the space between<br /> the "<" and "?" and place 				it on your root.<br<br><b>note:</b><br />www.yourdomain.com/crossdomain.xml</small></label></td>
				<td>
            	<textarea name="code_xml" style="overflow:hidden;" cols="70" rows="15">
              < ?xml version="1.0"  ?><cross-domain-policy><allow-access-from domain="www.<?php echo $_SERVER['HTTP_HOST']; ?>" /><allow-access-from domain="<?php echo $_SERVER['HTTP_HOST']; ?>" /></cross-domain-policy> </textarea>
                </form>
				</td>
			</tr>
            </table>
            
             
			
            
            
		</table>
<br /><br /><br /><br />
        <table width="100%" class="form-table">
<tr>
					<td>
		     			The current project home is at <a href="http://feeder.solverat.com/">feeder.solverat.com</a>. You&rsquo;ll find the article about this plugin <a href="http://solverat.com/blog/12-25/rss-feed-an-myspace/">here</a>. If you want to contribute <a href="mailto:info@solverat.com">e-mail me</a> your modifications. 
	     			  Take care. <a href="http://www.solverat.com/blog/">solverat</a>					</td>
		  </tr>
                </table>
  </fieldset>
</div>