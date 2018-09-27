btgads = {
	"channel": "",
	"site": 724,
	"site_mobile": 735,
	"plc": {
		"home": {
			"b300": {
				"placement": "3905",
				"plan": "4297976"
			},
			"b728": {
				"placement": "3906",
				"plan": "4297994"
			},
			"b300m": {
				"placement": "4159",
				"plan": "4838337"
			},
			"b728m": {
				"placement": "4160",
				"plan": "4838338"
			}
		},
		"amamos-cinema": {
			"b300": {
				"placement": "3910",
				"plan": "4591740"
			},
			"b728": {
				"placement": "3911",
				"plan": "4591741"
			},
			"b300m": {
				"placement": "4161",
				"plan": "4838339"
			},
			"b728m": {
				"placement": "4162",
				"plan": "4838340"
			}
		},
		"eshows": {
			"b300": {
				"placement": "3914",
				"plan": "4591758"
			},
			"b728": {
				"placement": "3915",
				"plan": "4838342"
			},
			"b300m": {
				"placement": "4163",
				"plan": "4838342"
			},
			"b728m": {
				"placement": "4164",
				"plan": "4838343"
			}
		},
		"galerias": {
			"b300": {
				"placement": "3918",
				"plan": "4591765"
			},
			"b728": {
				"placement": "3919",
				"plan": "4591766"
			},
			"b300m": {
				"placement": "4165",
				"plan": "4838347"
			},
			"b728m": {
				"placement": "4166",
				"plan": "4838348"
			}
		},
		"the-kardashians": {
			"b300": {
				"placement": "3922",
				"plan": "4591770"
			},
			"b728": {
				"placement": "3923",
				"plan": "4591771"
			},
			"b300m": {
				"placement": "4167",
				"plan": "4838356"
			},
			"b728m": {
				"placement": "4168",
				"plan": "4838357"
			}
		},
		"lol": {
			"b300": {
				"placement": "3926",
				"plan": "4591787"
			},
			"b728": {
				"placement": "3927",
				"plan": "4591788"
			},
			"b300m": {
				"placement": "4169",
				"plan": "4838362"
			},
			"b728m": {
				"placement": "4170",
				"plan": "4838363"
			}
		},
		"efashionblogger": {
			"b300": {
				"placement": "3930",
				"plan": "4591798"
			},
			"b728": {
				"placement": "3931",
				"plan": "4591799"
			},
			"b300m": {
				"placement": "4171",
				"plan": "4838364"
			},
			"b728m": {
				"placement": "4172",
				"plan": "4838365"
			}
		},
		"musica": {
			"b300": {
				"placement": "3934",
				"plan": "4591804"
			},
			"b728": {
				"placement": "3935",
				"plan": "4591805"
			},
			"b300m": {
				"placement": "4173",
				"plan": "4838366"
			},
			"b728m": {
				"placement": "4174",
				"plan": "4838367"
			}
		},
		"enews": {
			"b300": {
				"placement": "3938",
				"plan": "4591813"
			},
			"b728": {
				"placement": "3939",
				"plan": "4591814"
			},
			"b300m": {
				"placement": "4175",
				"plan": "4838369"
			},
			"b728m": {
				"placement": "4176",
				"plan": "4838370"
			}
		},
		"programas": {
			"b300": {
				"placement": "3942",
				"plan": "4591819"
			},
			"b728": {
				"placement": "3943",
				"plan": "4591820"
			},
			"b300m": {
				"placement": "4177",
				"plan": "4838371"
			},
			"b728m": {
				"placement": "4178",
				"plan": "4838372"
			}
		},
		"tapetevermelho": {
			"b300": {
				"placement": "3946",
				"plan": "4591824"
			},
			"b728": {
				"placement": "3947",
				"plan": "4591825"
			},
			"b300m": {
				"placement": "4179",
				"plan": "4845330"
			},
			"b728m": {
				"placement": "4180",
				"plan": "4845331"
			}
		},
		"thetrend": {
			"b300": {
				"placement": "3950",
				"plan": "4591831"
			},
			"b728": {
				"placement": "3951",
				"plan": "4591832"
			},
			"b300m": {
				"placement": "4181",
				"plan": "4845333"
			},
			"b728m": {
				"placement": "4182",
				"plan": "4845335"
			}
		},
		"noivas": {
			"b300": {
				"placement": "3954",
				"plan": "4591841"
			},
			"b728": {
				"placement": "3955",
				"plan": "4591842"
			},
			"b300m": {
				"placement": "4183",
				"plan": "4845338"
			},
			"b728m": {
				"placement": "4184",
				"plan": "4845339"
			}
		},
		"videos": {
			"b300": {
				"placement": "3958",
				"plan": "4591857"
			},
			"b728": {
				"placement": "3959",
				"plan": "4591859"
			},
			"b300m": {
				"placement": "4185",
				"plan": "4845342"
			},
			"b728m": {
				"placement": "4186",
				"plan": "4845343"
			}
		},
		"the-royals": {
			"b300": {
				"placement": "4193",
				"plan": "4898454"
			},
			"b728": {
				"placement": "4194",
				"plan": "4898455"
			},
			"b300m": {
				"placement": "4195",
				"plan": "4898457"
			},
			"b728m": {
				"placement": "4196",
				"plan": "4898458"
			}
		}
	}
};
btgads.is_mobile = function(){return/ip(hone|od)|android.*(mobile)|blackberry.*applewebkit|bb1\d.*mobile/i.test(navigator.appVersion)};
btgads.render = function(category, size, tags) {
	if(this.channel == '') {
		channels = category.split(',');
		max = channels.length;
		if(max == 1) {
			this.channel = channels[0];
		} else {
			this.channel = channels[Math.floor((Math.random() * max) + 1)];
		}
	}
	bsize = 'b728';
	if(size == '300x250') {
		bsize = 'b300';
	}
	if(btgads.is_mobile()){
	  //console.log("ES MOBILE 2");
	  bsize+="m";
	}
	if(btgads.is_mobile() && size == '728x90'){
	  size = '320x50';
	}

	/*if channel does not exists. Fallback to home*/
	if(typeof this.plc[this.channel] == 'undefined'){
	  this.channel = 'home';
	}
	
	window.btgsize = size;
	window.btgsite = (this.is_mobile)?this.site_mobile:this.site;
	window.btgplacement = this.plc[this.channel][bsize]['placement'];
	window.btgplan = this.plc[this.channel][bsize]['plan'];

	if(tags != '') {
		window.btgkv = 'btgtags=' + tags;
	}
	//console.log(btgsize + " ---  "+btgplacement+ "  --- "+btgplan +"  ----  "+this.channel);
	document.write("<script type=\"text\/javascript\" src=\"\/\/static.batanga.net\/publisher\/adbtgmedia_opt.js\"><\/script>");
};