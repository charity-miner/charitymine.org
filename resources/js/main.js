/////////////////////////RETRIEVE MONERO(XMR) COST///////////////////////////////
var XMRPrice;

jQuery.getJSON("https://api.coinmarketcap.com/v1/ticker/monero/", callback);

function callback(data) {
	for (var i=0; i < data.length; i++) {
		XMRPrice=data[i]['price_usd'];
	}
}


(function($) {
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
  	var acceptedHashesCash = miner.getAcceptedHashes();  // Total Accepted Hashes
  	var Dividedby6B = acceptedHashesCash / 6000000000; // Total Accepted Hashes/6 Billion  . . .
  	var USDDividedby6B = totalHashes / 6000000000;
  	var UsersTotalCashMade = USDDividedby6B * XMRPrice;
  	var TotalCashMade = Dividedby6B * XMRPrice;   // Multiplied by the current price
  	var EstUSDperHour = (hashesPerSecond / 6000000000) * XMRPrice * 60 * 60;   // Estimated USD per hour based on HPS

    if (miner.isRunning()) {
  		$("#hps").html(hashesPerSecond);
  		$("#cph").html("$" + EstUSDperHour.toFixed(8));
  		$("#ths").html(totalHashes);
  		$("#tah").html(acceptedHashes);
  		$("#tcm").html("Total USD Raised: $" + TotalCashMade.toFixed(3));
  		$("#nTh").html(numThreads);
  		$("#UTCM").html("Your contribution: $" + UsersTotalCashMade.toFixed(8));
    } else {
  	  $("#hps").html("Miner Offline");
    }
  }, 800);
})( jQuery );

/////////////////////////SET SLIDER FOR THREAD SELECTION///////////////////////////////
var slider = document.getElementById("threadRange");
var output = document.getElementById("threadCount");
output.innerHTML = slider.value;

slider.oninput = function() {
  output.innerHTML = this.value;
  miner.setNumThreads(slider.value);
}