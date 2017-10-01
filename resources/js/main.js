/** Get Live  Monero Price
*
*
* Contacts the Coinmarketcap API, grabs up to date Monero Price
*
*	
*/
var XMRPrice;

jQuery.getJSON("https://api.coinmarketcap.com/v1/ticker/monero/", callback);

function callback(data) {
	for (var i=0; i < data.length; i++) {
		XMRPrice=data[i]['price_usd'];
	}
}
/**  JQuery Wrapper
*
*
*
*/

(function($) {

  /**
  *
  *	Create Coinhive Miner 
  *	
  *	Checks for User, if no user, set user to 'website'.
  *
  *	Start the Miner.
  *
  */

  // Set coinhive user to userID if logged in; else default to website user
  var user = userID != 0 ? userID : "website";

  var miner = new CoinHive.User(publicKey, user,{
  	threads: 2,
  	autoThreads: false,
  	throttle: 0,
  	forceASMJS: false
  });

  miner.start(CoinHive.FORCE_EXCLUSIVE_TAB);

  /** Website Stats
* 
*	Hashes per second, Total Hashes, Total Cash Made Etc.
*
*
*/
  setInterval(window.onload=function() {

    var hashesPerSecond = Math.round(miner.getHashesPerSecond() * 100) / 100;
    var totalHashes = miner.getTotalHashes(interpolate=true);
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
  		$("#UTCM").html("Your contribution: $" + UsersTotalCashMade.toFixed(8));
    } else {
  	  $("#hps").html("Miner Offline");
    }
  }, 800);

/** Thread Slider
* 
*
*	Range 1-8 
*
*/
  var slider = $("#threadRange");
  var output = $("#threadCount");
  output.html(miner.getNumThreads());

  slider.change( function() {
    output.html(this.value);
    miner.setNumThreads(this.value);
  });


/**
*	Coin Hive Users 
*	
*	Coin Hive HTTP Section
*
*	User Stats, Overall User Stats.
*/
  setInterval(window.onload=function() {
    $.get( "wp-admin/admin-ajax.php?action=coinhiveapi", function( data ) {

      let result = JSON.parse(data);

      if (data != false && !result.error) {

        let totalHashes = result.hashesTotal;
        let totalHashesUSD = "$" + ((totalHashes / 6000000000) * XMRPrice).toFixed(3);
        let totalRate = result.hashesPerSecond;
        let totalRateUSD = "$" + ((totalRate / 6000000000) * XMRPrice * 60 * 60 * 24).toFixed(3);

    		$("#tah").html(totalHashes);
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