btgads = {
	"channel" : "",
	"site": 724,
	"plc": {
		"home": {
			"b300": {
				"placement": "3905",
				"plan": "4297976"
			},
			"b728": {
				"placement": "3906",
				"plan": "4297994"
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
			}
		},
		"eshows": {
			"b300": {
				"placement": "3914",
				"plan": "4591758"
			},
			"b728": {
				"placement": "3915",
				"plan": "4591759"
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
			}
		}
	}
};
btgads.render = function(category, size, tags) {
	if(this.channel == '') {


		channels = category.split(',');
		max = channels.length;
		if(max == 1) {
			this.channel = channels[0];
		} else {
			this.channel = channels[Math.floor((Math.random() * max) + 1)];}
		}

	}
	bsize = 'b728';
	if(size == '300x250') {
		bsize = 'b300';
	}
	window.btgsize = size;
	window.btgsite = this.site;
	window.btgplacement = this.plc[this.channel][bsize]['placement'];
	window.btgplan = this.plc[this.channel][bsize]['plan'];

	if(tags != '') {
		window.btgkv = 'btgtags=' + tags;
	}
	//console.log(btgsize + "   "+btgplacement+ "     "+btgplan +"    "+this.channel);
	document.write("<script type=\"text\/javascript\" src=\"\/\/static.batanga.net\/publisher\/adbtgmedia_opt.js\"><\/script>");
};