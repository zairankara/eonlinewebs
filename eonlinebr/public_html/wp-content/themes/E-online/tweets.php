	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>Untitled Document</title>
	</head>
	 
	<body>
	<script src="http://widgets.twimg.com/j/2/widget.js"></script>
	<script>
	new TWTR.Widget({
	  version: 2,
	  type: 'profile',
	  rpp: 12,
	  interval: 6000,
	  width: 420,
	  height: 95,
	  theme: {
		shell: {
		  background: '#b50000',
		  color: '#ffffff'
		},
		tweets: {
		  background: '#b50000',
		  color: '#ffffff',
		  links: '#ebc107'
		}
	  },
	  features: {
		scrollbar: true,
		loop: false,
		live: true,
		hashtags: true,
		timestamp: true,
		avatars: false,
		behavior: 'all'
	  }
	}).render().setUser('Eonlinebrasil').start();
	</script>
	</body>
	</html>
