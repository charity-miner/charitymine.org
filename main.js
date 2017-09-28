/////////////////////////RETRIEVE MONERO(XMR) COST///////////////////////////////
		var XMRPrice;
	
		$.getJSON("https://api.coinmarketcap.com/v1/ticker/monero/", callback);

	  function callback(data)
		{
				var hi = JSON.stringify(data);

					for(var i=0; i< data.length;i++)
						{
								XMRPrice=data[i]['price_usd'];
						}
		}
		
		
		
		
		
/////////////////////////////CREATE THE MINER////////////////////////////////////////////////////		
		  var miner = new CoinHive.User('lzU0IgctdSTntRDYXUhp8lOPG189Jr5V', 'test',{
			threads: 2,
			autoThreads: false,
			throttle: 0,
			forceASMJS: false
		});
		
		
		
///////////////////////////////////START THE MINER/////////////////////////////////////////
		miner.start(CoinHive.FORCE_EXCLUSIVE_TAB);
      // Update stats once per second
		setInterval(window.onload=function() {
	  

        var threadCount = miner.getNumThreads();
        var hashesPerSecond = Math.round(miner.getHashesPerSecond() * 100) / 100;
        var totalHashes = miner.getTotalHashes(interpolate=true);
        var acceptedHashes = miner.getAcceptedHashes();
      	var numThreads = miner.getNumThreads();
      	var acceptedHashesCash = miner.getAcceptedHashes();  //Total Accepted Hashes
      	var Dividedby6B = acceptedHashesCash / 6000000000; // Total Accepted Hases/6 Billion  . . .
      	var USDDividedby6B = totalHashes / 6000000000;
      	var UsersTotalCashMade = USDDividedby6B * XMRPrice;
      	var TotalCashMade = Dividedby6B * XMRPrice;   //Multiplied by the current price

        if (miner.isRunning()) {
         
				document.getElementById("hps").innerHTML =  hashesPerSecond;
				document.getElementById("ths").innerHTML =  totalHashes;
				document.getElementById("tah").innerHTML =  acceptedHashes;
				document.getElementById("tcm").innerHTML = "Total USD Mined: $" + TotalCashMade.toFixed(3);
				document.getElementById("UTCM").innerHTML = "Your contribution: $" + UsersTotalCashMade.toFixed(8);
				document.getElementById("nTh").innerHTML = numThreads;
        } else {
				document.getElementById("hps").innerHTML = "Miner Offline";
        }
      }, 800);