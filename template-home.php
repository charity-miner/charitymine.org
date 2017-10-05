<?php
/*
  Template Name: Homepage
*/
?>

<?php get_header(); ?>

  <!-- Hero section -->
  <header class="masthead">
    <div class="overlay">
      <div class="container">
    		<img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/img/logos/logo-icon.png" width="80" height="92"/>
    		<br>
    		<br>
        <h1 class="display-4 text-black">Charity Mine</h1>
        <hr>
        <div class="currentTotalCash display-4">You have generated: $0.00000000</div>
    		<br>
        <p class="lead"><i>Just keep this tab open while you browse the web and you'll automatically contribute real money to charity. <b>That's it.</b></i></p>
		
    		<br>
        <center>
		<a id="learnmore-this" href="https://www.charitymine.org/how-it-works/" title="How it Works">How it works</a><p><br>
	
          <div class="fb-share-button" data-href="https://www.charitymine.org" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.charitymine.org%2F&amp;src=sdkpreparse">Share</a></div>
		  

        </center>
      </div>
    </div>
  </header>
  
  

  <section class="bg-dark">
    <div class="container ">
      <div class="row align-items-center">
        <div class="text-white col-md-6 order-2">
          <div class="p-5">
            <h3 class="display-4">A new way to donate:</h3>
            <p>This site uses a small portion of your computing power to help solve mathematical puzzles. When a puzzle gets solved it generates Monero (XMR), a cryptocurrency which can be traded in for US Dollars. If more users visit this site, more Monero is mined for charity.</p>
            <p id="siteTotalRateUSD"></p>
            <p><i>* Donations are made every fifty dollars earned and receipts will be posted to the site.</i> </p>
			<a id="learnmore-this" href="https://www.charitymine.org/how-it-works/" title="Learn More">Learn More</a><br>
          </div>
        </div>
        <div class="col-md-6 order-1">
          <div class="p-4">
            <center>
              <div class="boxUSD">
                <p id="siteTotalHashesUSD" class="display-4"></p>
				
              </div>
            </center>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="text-white" style="background:gray">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
          <div class="p-5">
            <h2 class="display-4">Current Charity<p> <a href="https://www.directrelief.org/" style="color: #E8832D" target="_blank">Direct Relief</a></h2>
            <p>"Direct Relief is a humanitarian aid organization, active in all 50 states and more than 80 countries, with a mission to improve the health and lives of people affected by poverty or emergencies.​" - Direct Relief</p>
          </div>
        </div>
        <div class="col-md-6">
          <div class="p-5">
      			<center>
        			<h1 class="display-4">Stats</h1>
              <table class="table">
                <tbody>
                  <tr>
                    <td>Your Hashes Per Second (HPS):</td>
                    <td id="minerHPS"></td>
                  </tr>
                  <tr>
                  <td>Community Hashes Per Second:</td>
                    <td id="siteTotalRate"></td>
                  </tr>
                  <tr>
                    <td>Est. Community USD per Day:</td>
                    <td id="siteTotalRateUSDtable"></td>
                  </tr>
                  <tr>
                    <td>Your Total Hashes:</td>
                    <td id="currentTotalHashes"></td>
                  </tr>
                  <tr>
                    <td>Community Total Hashes</td>
                    <td id="siteTotalHashes"></td>
                  </tr>
                </tbody>
              </table>
			  <a href="https://www.charitymine.org/register/" style="color: #E8832D" class="lead"><i>Register an account to keep track of your stats.</i></a><p>
              <div id="slidecontainer">
                <h3>Speed (Threads)</h3>
                <input type="range" min="1" max="8" value="2" class="slider" id="threadRange"><br><strong>Threads: <span id="threadCount"></span></strong></input>
                <p><small><i>Slide to change the number of threads being used (increases HPS). More threads will increase the donation amount, but may slow down your computer. Use with caution.</i></small></p>
				
              </div>
            </center>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6 order-2">
          <div class="p-5">
            <img class="img-fluid" src="<?php echo get_stylesheet_directory_uri(); ?>/resources/img/logos/logo-large.jpg" alt="">
          </div>
        </div>
        <div class="col-md-6 order-1">
          <div class="p-5">
            <h2 class="display-4">Together we can change the world.</h2>
            <p>What if there was an ultra-efficient way for millions of people to crowdsource money
towards humanitarian causes simply by opening a webpage? </p>
            <p>We believe that doing good should be easy, and in today’s increasingly
complex, time-stretched society, we want to provide a medium for people to do just that.</p>
<a id="bookmark-this" href="#" title="Bookmark">Bookmark this page</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <script>
 
</script>

<?php get_footer(); ?>