<div class="widget_twitter_api_int">
<script charset="utf-8" src="http://widgets.twimg.com/j/2/widget.js"></script>
<script>
new TWTR.Widget({
  version: 2,
  type: 'list',
  rpp: 30,
  interval: 6000,
  width: 300,
  height: 400,
  theme: {
	shell: {
	  background: '#FFFFFF',
	  color: '#E5E5E5'
	},
	tweets: {
	  background: '#ffffff',
	  color: '#626262',
	  links: '#00C0FF'
	}
  },
  features: {
	scrollbar: true,
	loop: false,
	live: true,
	hashtags: true,
	timestamp: true,
	avatars: true,
	behavior: 'all'
  }
}).render().setList('CelebEonlineB', 'test').start();
</script>
</div>