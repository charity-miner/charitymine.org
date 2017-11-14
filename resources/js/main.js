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


  $("#play").on("click", function(){

    miner.start(CoinHive.FORCE_EXCLUSIVE_TAB);



    $('#play').html("<i id='dropdown' class='fa fa-chevron-circle-down  fa-lg' aria-hidden='true'>   </i> Live Data  ");
$('#play').attr("href","#Miningstats");
  });


  /**
  *
  * Get & Show Live Miner Stats
  *
  *	Hashes per second, Total Hashes, Total Cash Made Etc.
  *
  **/

  setInterval( window.onload = function() {


    let UsdPerHash = ( payoutPer1MHashes / 1000000 ) * xmrToUsd;
    let minerHPS = Math.round( miner.getHashesPerSecond() * 100 ) / 100;
    let minerTotalHashes = miner.getTotalHashes( interpolate=true ); // updates every second
    //let userTotalHashes = miner.getAcceptedHashes(); // updates every 1-20 seconds; so we use static plus miner to get active results
    let currentTotalHashes = userTotalHashes + minerTotalHashes;
    let currentTotalCash = currentTotalHashes * UsdPerHash;

    if ( miner.isRunning() ) {

  		$("#minerHPS").html( minerHPS );
  		$("#currentTotalHashes").html( currentTotalHashes.toLocaleString() );
  		$(".currentTotalCash").html( "You have generated: $" + currentTotalCash.toFixed(8) );

			moveProgressBar( minerTotalHashes );

    } else {
  	  $("#minerHPS").html( "Miner Offline" );

    }

  }, 800);


  /**
  *
  *	Update User Time Online Today
  *
  *	AJAX request to admin-ajax.php using updateusertime action
  * See functions.php charity_mine_update_user_time()
  *
  **/

  setInterval(window.onload=function() {

    if ( miner.isRunning() ) {

      $.get( homeURL + "/wp-admin/admin-ajax.php?action=updateusertime" );

    }

  }, 10000);


  /**
  *
  * Move the Progress Bar
  *
  **/

	function moveProgressBar( width ) {

  	let UsdGenerated = ( ( payoutPer1MHashes / 1000000 ) * xmrToUsd ) * width;
    let goal = 0.0001; // one hundredth cent

		let percentage = width / 3000;

	  if ( percentage >= 100 ){
		  console.log('maximum hit');
		  width = 100;
		  $(".progress-bar-animated").css("width", 100 + "%");
			$("#per").html(100+'%')

	  } else {

	    $(".progress-bar-animated").css("width", percentage.toFixed(3) + "%");
			$("#per").html(percentage.toFixed(3)+'%');

	  }

	}


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

        let UsdPerHash = ( payoutPer1MHashes / 1000000 ) * xmrToUsd;
        let siteTotalHashes = result.hashesTotal;
        let siteTotalHashesUSD = "$" + (siteTotalHashes * UsdPerHash).toFixed(3);
        let siteTotalRate = result.hashesPerSecond;
        let siteTotalPayout = "$" + ((result.xmrPending + result.xmrPaid)*xmrToUsd).toFixed(3);
        let siteTotalRateUSD = "$" + (siteTotalRate * UsdPerHash * 60 * 60 * 24*365).toFixed(3);

    		$("#siteTotalHashes").html(siteTotalHashes.toLocaleString());
    		$("#siteTotalHashesUSD").html(siteTotalPayout);
        $('#siteTotalRate').html(siteTotalRate);
        $('#siteTotalRateUSD').html("Right now, people around the world are raising " + siteTotalRateUSD + " per year." );
        $('#siteTotalRateUSDtable').html(siteTotalRateUSD);

      } else {
        console.log("There was an error: " + result.error);
      }

    });

  }, 10000);


  /**
  *
  *	Add Bookmark Button
  *
  **/

  $('#bookmark-this').click(function(e) {
    var bookmarkURL = window.location.href;
    var bookmarkTitle = document.title;

    if ('addToHomescreen' in window && addToHomescreen.isCompatible) {
      // Mobile browsers
      addToHomescreen({ autostart: false, startDelay: 0 }).show(true);
    } else if (window.sidebar && window.sidebar.addPanel) {
      // Firefox <=22
      window.sidebar.addPanel(bookmarkTitle, bookmarkURL, '');
    } else if ((window.sidebar && /Firefox/i.test(navigator.userAgent)) || (window.opera && window.print)) {
      // Firefox 23+ and Opera <=14
      $(this).attr({
        href: bookmarkURL,
        title: bookmarkTitle,
        rel: 'sidebar'
      }).off(e);
      return true;
    } else if (window.external && ('AddFavorite' in window.external)) {
      // IE Favorites
      window.external.AddFavorite(bookmarkURL, bookmarkTitle);
    } else {
      // Other browsers (mainly WebKit & Blink - Safari, Chrome, Opera 15+)
      alert('Press ' + (/Mac/i.test(navigator.userAgent) ? 'Cmd' : 'Ctrl') + '+D to bookmark this page.');
    }

    return false;
  });


})( jQuery );
