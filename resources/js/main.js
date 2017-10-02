/**
*
* Get Live Monero Price
*
* Contacts the Coinmarketcap API, grabs up to date Monero Price
*
**/

var XMRPrice;

jQuery.getJSON("https://api.coinmarketcap.com/v1/ticker/monero/", callback);

function callback(data) {
	for (var i=0; i < data.length; i++) {
		XMRPrice=data[i]['price_usd'];
	}
}


/**
*
* jQuery Wrapper for Coinhive Miner
*
* Contains all Coinhive miner functions and allows for jQuery usage
*
*/

(function($) {

  /**
  *
  *	Create Coinhive Miner
  *
  *	Checks for user id; if no user, sets user to 'website'.
  *
  *	Builds the default miner settings and starts the miner.
  *
  **/

  var user = userID != 0 ? userID : "website";
  var miner = new CoinHive.User(publicKey, user,{
  	threads: 2,
  	autoThreads: false,
  	throttle: 0,
  	forceASMJS: false
  });
  miner.start(CoinHive.FORCE_EXCLUSIVE_TAB);


  /**
  *
  * Get & Show Live Miner Stats
  *
  *	Hashes per second, Total Hashes, Total Cash Made Etc.
  *
  **/

  setInterval(window.onload=function() {

    var minerHPS = Math.round(miner.getHashesPerSecond() * 100) / 100;
    var minerTotalHashes = miner.getTotalHashes(interpolate=true); // updates every second
    //var userTotalHashes = miner.getAcceptedHashes(); // updates every 1-20 seconds; so we use static plus miner to get active results
    var currentTotalHashes = userID != 0 ? userTotalHashes + minerTotalHashes : minerTotalHashes;
    var currentTotalCash = ( currentTotalHashes / 6000000000 ) * XMRPrice;

    var estUsdPerHour = (minerHPS / 6000000000) * XMRPrice * 60 * 60;   // Estimated USD per hour based on HPS

    if (miner.isRunning()) {
  		$("#minerHPS").html(minerHPS);
  		$("#estUsdPerHour").html("$" + estUsdPerHour.toFixed(8));
  		$("#currentTotalHashes").html(currentTotalHashes);
  		$(".currentTotalCash").html("Your contribution: $" + currentTotalCash.toFixed(8));
    } else {
  	  $("#minerHPS").html("Miner Offline");
    }
  }, 800);


  /**
  *
  * Set Thread Slider
  *
  *	Pairs the homepage slider with the active thread count in the miner.
  *
  * Range 1-8
  *
  **/

  var slider = $("#threadRange");
  var output = $("#threadCount");

  output.html(miner.getNumThreads());

  slider.change( function() {
    output.html(this.value);
    miner.setNumThreads(this.value);
  });


  /**
  *
  *	Get & Show Coin Hive Account Stats
  *
  *	AJAX request to admin-ajax.php using coinhiveapi action
  * See functions.php charity_mine_get_coin_hive_account_data()
  *
  *	Returns total hashes, total hps, and history of hps.
  *
  **/

  setInterval(window.onload=function() {

    $.get( homeURL + "/wp-admin/admin-ajax.php?action=coinhiveapi", function( data ) {

      let result = JSON.parse(data);

      if (data != false && !result.error) {

        let siteTotalHashes = result.hashesTotal;
        let siteTotalHashesUSD = "$" + ((siteTotalHashes / 6000000000) * XMRPrice).toFixed(3);
        let siteTotalRate = result.hashesPerSecond;
        let siteTotalRateUSD = "$" + ((siteTotalRate / 6000000000) * XMRPrice * 60 * 60 * 24).toFixed(3);

    		$("#siteTotalHashes").html(siteTotalHashes);
    		$("#siteTotalHashesUSD").html("Total USD Raised: " + siteTotalHashesUSD);
        $('#siteTotalRate').html(siteTotalRate);
        $('#siteTotalRateUSD').html("Right now, people around the world are raising " + siteTotalRateUSD + " per day." );
        $('#siteTotalRateUSDtable').html(siteTotalRateUSD);

      } else {
        console.log("There was an error: " + result.error);
      }

    });

  }, 10000);


})( jQuery );