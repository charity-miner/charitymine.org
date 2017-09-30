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
        <div id="UTCM" class="display-4"></div>
    		<br>
        <p class="lead"><i>Just keep this tab open while you browse the web and you'll automatically contribute real money to charity. <b>That's it.</b></i></p>
    		<br>
        <center>
          <div class="fb-share-button" data-href="https://www.charitymine.org" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.charitymine.org%2F&amp;src=sdkpreparse">Share</a></div>
        </center>
      </div>
    </div>
  </header>

  <section class="bg-dark text-white">
    <div class="container ">
      <div class="row align-items-center">
        <div class="col-md-6 order-2">
          <div class="p-5">
            <h3 class="display-4">A new way to donate:</h3>
            <p>This site uses a small portion of your computing power to help solve mathematical puzzles. When a puzzle gets solved it generates Monero (XMR), a cryptocurrency which can be traded in for US Dollars. If more users visit this site, more Monero is mined for charity.</p>
            <p id="totalrateUSD"></p>
            <p><i>* Donations are made every fifty dollars earned and receipts will be posted to the site.</i> </p>
          </div>
        </div>
        <div class="col-md-6 order-1">
          <div class="p-5">
            <center>
              <p class="display-4 text-black " id="tcm"> </p>
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
            <h2 class="display-4">Current Charity<p> <a href="http://www.redcross.org/about-us/our-work/disaster-relief" style="color: #E8832D" target="_blank">Red Cross: Disaster Relief</a></h2>
            <p>"The American Red Cross prevents and alleviates human suffering in the face of emergencies by mobilizing the power of volunteers and the generosity of donors.​" - The American Red Cross</p>
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
                    <td id="hps"></td>
                  </tr>
                  <tr>
                  <td>Community Hashes Per Second:</td>
                    <td id="totalrate"></td>
                  </tr>
                  <tr>
                    <td>Your Est. USD per Hour:</td>
                    <td id="cph"></td>
                  </tr>
                  <tr>
                    <td>Est. Community USD per Day:</td>
                    <td id="totalrateUSDtable"></td>
                  </tr>
                  <tr>
                    <td>Your Total Hashes:</td>
                    <td id="ths"></td>
                  </tr>
                  <tr>
                    <td>Community Total Hashes</td>
                    <td id="tah"></td>
                  </tr>
                </tbody>
              </table>
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
          </div>
        </div>
      </div>
    </div>
  </section>

<?php get_footer(); ?>