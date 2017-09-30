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
  $.get( "wp-admin/admin-ajax.php?action=coinhivepublic", function( data ) {

    var publicKey = data;

    var miner = new CoinHive.User(publicKey, 'test',{
    	threads: 2,
    	autoThreads: false,
    	throttle: 0,
    	forceASMJS: false
    });

    ///////////////////////////////////START THE MINER/////////////////////////////////////////
    miner.start(CoinHive.FORCE_EXCLUSIVE_TAB);

    // Update stats once per second
    setInterval(window.onload=function() {

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
    		$("#nTh").html(numThreads);
    		$("#UTCM").html("Your contribution: $" + UsersTotalCashMade.toFixed(8));
      } else {
    	  $("#hps").html("Miner Offline");
      }
    }, 800);

    /////////////////////////SET SLIDER FOR THREAD SELECTION///////////////////////////////
    var slider = $("#threadRange");
    var output = $("#threadCount");
    output.html(miner.getNumThreads());

    slider.change( function() {
      output.html(this.value);
      miner.setNumThreads(this.value);
    });

  });

  /////////////////////////GET TOTAL HASHRATE///////////////////////////////
  setInterval(window.onload=function() {
    $.get( "wp-admin/admin-ajax.php?action=coinhiveapi", function( data ) {

      let result = JSON.parse(data);

      if (data != false && !result.error) {

        let totalHashes = result.hashesTotal;
        let totalHashesUSD = "$" + ((totalHashes / 6000000000) * XMRPrice).toFixed(3);
        let totalRate = result.hashesPerSecond;
        let totalRateUSD = "$" + ((totalRate / 6000000000) * XMRPrice * 60 * 60 * 24).toFixed(3);

    		$("#tcm").html("Total USD Raised: " + totalHashesUSD);
        $('#totalrate').html(totalRate);
        $('#totalrateUSD').html("Right now, people around the world are raising " + totalRateUSD + " per day." );
        $('#totalrateUSDtable').html(totalRateUSD);

      } else {
        console.log("There was an error: " + result.error);
      }

    });
  }, 10000);

})( jQuery );