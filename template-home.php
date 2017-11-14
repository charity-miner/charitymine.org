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

        <p class="display-4" id="DD">Your daily donation goal</p>
        <p class="display-4" id="per">0.000%</p>
        <div class="progress">
          <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="height: 40px; font-size:35px;"></div>
        </div>
        <br>
          <a id="play" data-toggle="collapse" class="btn btn-brand text-white btn-lg" role="button" title="Start Mining" aria-expanded="false" aria-controls="Miningstats"><i id="dropdown" class="fa fa-play-circle  fa-lg" aria-hidden="true">   </i> Start Mining  </a>
          <br>
          <br>

  <div class="collapse" id="Miningstats">
    <div class="card " style="width:auto; " >
      <div class="card-header">
        <i class="fa fa-bar-chart fa-2x" aria-hidden="true"></i>
        <h2 class="display-4">
<p>Live Data </h2>

      </div>


    <div class="card-body text-left text-black" >
    <center>

      <table class="table table-hover">
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
            <td>Your Total Hashes:</td>
            <td id="currentTotalHashes"></td>
          </tr>
          <tr>
            <td>Community Total Hashes:</td>
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
          <br>
        <p class="lead"><i>Just keep this tab open while you browse the web and you'll contribute real money to charity. <b>That's it.</b></i></p>


        <center>


          <div class="fb-share-button" data-href="https://www.charitymine.org" data-layout="button" data-size="large" data-mobile-iframe="true"><a class="fb-xfbml-parse-ignore" target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.charitymine.org%2F&amp;src=sdkpreparse">Share</a></div>
        </center>
      </div>
    </div>
  </header>

  <section class="bg-dark">
    <div class="container ">
      <div class="row ">



          <div class="col ">

            <div class="p-4">

              <div class="card" style="width:auto; ">
                <div class="card-header text-center"  >
                  <h2 class="display-4"  >Total USD Raised: </h2>

                </div>


              <div class="card-body text-black">
<center>
              <p  style="font-weight:500; color:#E8832D;" id="siteTotalHashesUSD" class="display-4" ></p>
</center>
              </div>
              </div>
<br>
                <div class="card" style="width:auto;">
                  <div class="card-header">
                    <center>
                    <i class="fa fa-medkit fa-3x" aria-hidden="true"></i>
                  </center>
                    <h2 class="display-4 text-center">


<p>Current Charity: </h2>
  <h2 class="display-4 text-center"> <a href="https://www.directrelief.org/" style="color: #E8832D" target="_blank">Direct Relief</a></h2>
                  </div>
                  <img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/img/logos/direct.jpg" width="auto" height="auto" class="card-img-top"/>

    <div class="card-body text-black">

      <p class="card-text">"Direct Relief is a humanitarian aid organization, active in all 50 states and more than 80 countries, with a mission to improve the health and lives of people affected by poverty or emergencies.​" - Direct Relief</p>
      <center>
      <a href="https://www.directrelief.org/" class="btn btn-brand">Visit Website</a>
    </center>
    </div>
  </div>






            </div>
          </div>

          <div class=" col">
            <div class="p-4">
              <div class="card " style="width:auto; " >
                <div class="card-header text-center">
                  <i class="fa fa-cogs fa-3x" aria-hidden="true"></i>
                    <h2 class="display-4" > <p> How it works </h2>

                </div>


              <div class="card-body text-left text-black" >

                <p>This site uses a small portion of your computing power to help solve mathematical puzzles. When a puzzle gets solved it generates Monero (XMR), a cryptocurrency which can be traded in for US Dollars. If more users visit this site, more Monero is mined for charity.</p>

                <p ><i>* Donations are made every fifty dollars earned and receipts will be posted to the site.</i> </p>
                <center>
                <a class="btn btn-brand" role="button" href="https://www.charitymine.org/how-it-works/" title="Learn More">Learn More</a>
              </center>
              </div>
              </div>

            <br>
  <br>

              <div class="card " style="width:auto; " >
                <div class="card-header">
                        <center>
                  <i class="fa fa-line-chart fa-3x" aria-hidden="true"></i>
            </center>

                  <h2 class="display-4 text-center">
<p>The Potential</h2>

                </div>


              <div class="card-body text-left text-black" >

                <table style="width: auto;" class="table table-hover table-responsive text-black">
                  <thead>
                  <tr>
                    <th># of people completing their daily goal for a month</th>
                    <th>USD generated per month</th>
                    <th>USD generated per year</th>
                  </tr>
                    </thead>
                  <tbody>
                    <tr>
                      <td>4,000</td>
                      <td><i>$594</i></td>
                      <td><i>$7,128</i></td>
                    </tr>
                    <tr>
                    <td>40,000</td>
                      <td><i>$5,940</i></td>
                      <td><i>$71,280</i></td>
                    </tr>
                    <tr>
                      <td>400,000</td>
                      <td><i>$59,400</i></td>
                      <td><i>$712,800</i></td>
                    </tr>
                    <tr>
                      <td>4,000,000</td>
                      <td><i>$594,000</i></td>
                      <td><i>$7,128,000</i></td>
                    </tr>

                  </tbody>
                </table>

              </div>
              </div>

            </div>

          </div>
          <?php
          $topUsers = json_decode(charity_mine_get_coin_hive_top_users_data());
          if ( $topUsers && $topUsers->success ) { ?>
          <div class="col">
            <div class="p-4">
              <center>
                <div class="card " style="width:auto; " >
                  <div class="card-header">
                    <center>
                    <i class="fa fa-user fa-3x" aria-hidden="true"></i>
                  </center>
                    <h2 class="display-4"><p>
Top Users</h2>

                  </div>


                <div class="card-body text-left text-black" >

                  <table class="table table-hover text-center table-responsive">
                    <thead>
                      <tr>
                        <th class="text-center">User</th>
                        <th class="text-center">Hashes Contributed</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                      $count = 0;
                      $bans = [
                        'test',
                        'website',
                        'Golf',
                        '1',
                        '2'
                      ];
                      foreach ( $topUsers->users as $user ) {
                        if ( $count < 5 && !in_array($user->name, $bans) ) {
                          $userData = get_userdata($user->name);
                          $name = ($userData->display_name) ? ucwords($userData->display_name) : 'User #' . $user->name;
                          $currentUser = ( get_current_user_id() == $user->name ) ? ' (you)' : '';
                          echo '<tr>';
                            echo '<td>' . $name . $currentUser . '</td>';
                            echo '<td>' . number_format($user->balance) . '</td>';
                          echo '</tr>';
                          ++$count;
                        }
                      }
                      ?>
                    </tbody>
                  </table>
                  <a class="btn btn-brand" role="button" href="https://www.charitymine.org/register/">Register to track your stats</a>

                </div>
                </div>


              </center>
  <?php } ?>
  <br>
  <br>
<br>
<br>
  <center>
<img src="<?php echo get_stylesheet_directory_uri(); ?>/resources/img/logos/logo-icon.png" width="160" height="184"/>
<br>
<br>
</center>



          </div>
        </div>
      </div>
    </div>
  </section>






    <section style="background:gray;">
      <div class="container">
        <div class="row align-items-center">
<center>
          <div class=" col-md-6 ">
            <div class="p-4">
              <div class="card " style="width:auto; " >
                <div class="card-header">
                  <h2 class="display-4"><i class="fa fa-globe" aria-hidden="true"></i>
<p>Together we can change the world.</h2>

                </div>


              <div class="card-body text-left text-black" >


              <p>What if there was an ultra-efficient way for millions of people to crowdsource money
            towards humanitarian causes simply by opening a webpage? </p>
              <p>We believe that doing good should be easy, and in today’s increasingly
            complex, time-stretched society, we want to provide a medium for people to do just that.</p>
            <center>
              <a id="bookmark-this" class="btn btn-brand" role="button" href="#" title="Bookmark">Bookmark this page</a>
            </center>
            </div>
            </div>


            </div>
          </div>
</center>
        </div>
      </div>
    </section>



  <script>

</script>

<?php get_footer(); ?>
