<!DOCTYPE HTML>
<!--
	Prologue 1.1 by HTML5 UP
	html5up.net | @n33co
	Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
	<head>
		<title>Open Institute Dashboard</title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="Open Institute" />
		<link href="http://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,400,600" rel="stylesheet" type="text/css" />
		<!--[if lte IE 8]><script src="js/html5shiv.js"></script><![endif]-->
		 <script>
		  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		  ga('create', 'UA-45632034-1', 'openinstitute.com');
		  ga('send', 'pageview');
		</script>

		<script src="js/jquery-1.9.1.min.js"></script>	
		<script src="js/jquery.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-panels.min.js"></script>
		<script src="js/init.js"></script>
		 <link rel="stylesheet" href="css/bootstrap.css" />
		<noscript>
			<link rel="stylesheet" href="css/skel-noscript.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-wide.css" />
			<link rel="stylesheet" href="css/style-normal.css" />
			<link rel="stylesheet" href="css/style-narrower.css" />
			<link rel="stylesheet" href="css/style-narrow.css" />
			<link rel="stylesheet" href="css/style-mobile.css" />
			<link rel="stylesheet" href="css/style-noscript.css" />
			<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.2/css/font-awesome.css" rel="stylesheet">
		</noscript>
            <link rel="stylesheet" href="css/font-icons/entypo/css/entypo.css">
			<link href="http://www.openinstitute.com/wp-content/uploads/2015/07/favicon.png" rel="icon" type="image/x-icon">
			<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie8.css" /><![endif]-->
		<script type="text/javascript" src="js/knockout-2.2.1.js"></script>
		<script type="text/javascript" src="js/globalize.min.js"></script>
		<script type="text/javascript" src="js/dx.chartjs.js"></script>
		<script type="text/javascript" src="js/data.js"></script>

	<?php
// apitest.php
// by Karl Kranich - karl.kranich.org
// version 3.1 - edited query section

include 'google-api-php-client/vendor/autoload.php';
//include_once "google-api-php-client/examples/templates/base.php";

$client = new Google_Client();

/************************************************
  ATTENTION: Fill in these values, or make sure you
  have set the GOOGLE_APPLICATION_CREDENTIALS
  environment variable. You can get these credentials
  by creating a new Service Account in the
  API console. Be sure to store the key file
  somewhere you can get to it - though in real
  operations you'd want to make sure it wasn't
  accessible from the webserver!
 ************************************************/
putenv("GOOGLE_APPLICATION_CREDENTIALS=APIProject-9b9e5816eded.json");
//echo getenv('GOOGLE_APPLICATION_CREDENTIALS'); exit;
  // use the application default credentials
  $client->useApplicationDefaultCredentials();


$client->setApplicationName("OI Dashboard Data");
$client->setScopes(['https://www.googleapis.com/auth/drive','https://spreadsheets.google.com/feeds']);

// Some people have reported needing to use the following setAuthConfig command
// which requires the email address of your service account (you can get that from the json file)
// $client->setAuthConfig(["type" => "service_account", "client_email" => "my-service-account@developer.gserviceaccount.com"]);

// The file ID was copied from a URL while editing the sheet in Chrome
$fileId = '1gbdRFxWBwGOlMdNJRMwm1bsdP4jpqhridQ6i0wwUr5Y';

// Access Token is used for Steps 2 and beyond
$tokenArray = $client->fetchAccessTokenWithAssertion();
$accessToken = $tokenArray["access_token"];

 $url = "https://spreadsheets.google.com/feeds/list/$fileId/od6/private/full";
 //$myQuery = 'quantity>9';  // and here is an example with a space in it: $myQuery = 'gear="mifi device"';
 $method = 'GET';
 $headers = ["Authorization" => "Bearer $accessToken", "GData-Version" => "3.0"];
 $httpClient = new GuzzleHttp\Client(['headers' => $headers]);
// $resp = $httpClient->request($method, $url, ['query' => ['sq' => $myQuery]]);
 $resp = $httpClient->request($method, $url);
 $body = $resp->getBody()->getContents();
 $tableXML = simplexml_load_string($body);
 //echo "Rows:\n";
 $cont = array();
 foreach ($tableXML->entry as $entry) {
  // $etag = $entry->attributes('gd', TRUE);
  // $id = $entry->id;
 //  echo "etag: $etag\n";
 //  echo "id: $id\n";
 
   foreach ($entry->children('gsx', TRUE) as $column) {
     $colName = (string)$column->getName();
     $colValue = (string)$column;
     $cont[$colName][] = $colValue;
   }
 }
 
 //echo $cont['oc'][3];
$dat = $cont['data'];

$ocHeadCount =  $cont['oc'][array_search("OI Head Count",$dat, true)];
$ocTrainees =  $cont['oc'][array_search("Trainees",$dat, true)];
$ocOIPartnerships =  $cont['oc'][array_search("OI Partnerships",$dat, true)];
$ocPeopleReached =  $cont['oc'][array_search("People Reached",$dat, true)];
$ocGovtOfficialsReached =  $cont['oc'][array_search("Govt Officials Reached",$dat, true)];
$ocSubNatGovtsReached =  $cont['oc'][array_search("Sub Nat Govts Reached",$dat, true)];
$ocSubNatGovtsTarget =  $cont['oc'][array_search("Sub Nat Govts Target",$dat, true)];
$ocGovtAgenciesReached =  $cont['oc'][array_search("Govt Agencies Reached",$dat, true)];
$ocEvents =  $cont['oc'][array_search("Events",$dat, true)];
$ocVideosDone =  $cont['oc'][array_search("Videos Done",$dat, true)];
$ocBlogsDone =  $cont['oc'][array_search("Blogs Done",$dat, true)];
$ocDatasetC =  $cont['oc'][array_search("Current Datasets",$dat, true)];
$ocDatasetT =  $cont['oc'][array_search("Target Datasets",$dat, true)];
//echo $ocDataset;

$odHeadCount =  $cont['od'][array_search("OI Head Count",$dat, true)];
$odTrainees =  $cont['od'][array_search("Trainees",$dat, true)];
$odOIPartnerships =  $cont['od'][array_search("OI Partnerships",$dat, true)];
$odPeopleReached =  $cont['od'][array_search("People Reached",$dat, true)];
$odGovtOfficialsReached =  $cont['od'][array_search("Govt Officials Reached",$dat, true)];
$odSubNatGovtsReached =  $cont['od'][array_search("Sub Nat Govts Reached",$dat, true)];
$odSubNatGovtsTarget =  $cont['od'][array_search("Sub Nat Govts Target",$dat, true)];
$odGovtAgenciesReached =  $cont['od'][array_search("Govt Agencies Reached",$dat, true)];
$odEvents =  $cont['od'][array_search("Events",$dat, true)];
$odVideosDone =  $cont['od'][array_search("Videos Done",$dat, true)];
$odBlogsDone =  $cont['od'][array_search("Blogs Done",$dat, true)];
$odDatasetC =  $cont['od'][array_search("Current Datasets",$dat, true)];
$odDatasetT =  $cont['od'][array_search("Target Datasets",$dat, true)];
//echo $ocDataset;

?>

	</head>
	<body>
<!--header container-->
		<div id="header-container" class="skel-panels-fixed">
			<div class="grve-logo">	
				<a class="grve-sticky" href="http://www.openinstitute.com/">
					<img src="http://www.openinstitute.com/wp-content/uploads/2015/08/oi-logo1-e1439800605360.png" alt="Open Institute" title="Open Institute" data-at2x="http://www.openinstitute.com/wp-content/uploads/2015/08/oi-logo1-e1439800605360.png" width="200" height="58">
				</a>
			</div>				
			<!-- Main Menu -->						
			<nav id="grve-main-menu" class="grve-menu-pointer-none" data-animation-style="fade-in">
				<ul id="menu-top-menu-1" class="grve-menu">
					<li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-4014 current_page_item menu-item-4323"><a href="http://www.openinstitute.com/">Home</a></li>
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4324"><a href="http://www.openinstitute.com/about-us/">About Us</a></li>
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4638"><a href="http://www.openinstitute.com/blog/">Blog</a></li>
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-4773"><a href="http://www.openinstitute.com/contact-us/">Contact Us</a></li>
				</ul>
			</nav>	
		</div>
<!--end of header container-->

		<!-- Header -->
			<div id="header" class="skel-panels-fixed">
				<div class="top">
					<!-- Logo --><!--
						<div id="logo">
							
							<span class="image"><img src="images/oi-white.png" alt="" /></span>

							<!--<h1 id="title">OI Trends</h1>
							<span class="byline"></span> 
						</div>-->

					<!-- Nav -->
						<nav id="nav">
							<ul>
								<li><a href="#home" id="home-link" class="skel-panels-ignoreHref"><span class="fa fa-home"></span>Home</a></li>
								<li><a href="#octrends" id="octrends-link" class="skel-panels-ignoreHref"><span class="fa fa-bar-chart-o">OC Trends</span></a></li>
								<li><a href="#odtrends" id="odtrends-link" class="skel-panels-ignoreHref"><span class="fa fa-comments-o">OD Trends</span></a></li>
								<li><a href="#about" id="about-link" class="skel-panels-ignoreHref"><span class="fa fa-info-circle">About OI Trends</span></a></li>
								<li><a href="#contact" id="contact-link" class="skel-panels-ignoreHref"><span class="fa fa-envelope">Contact</span></a></li>
							</ul>
						</nav>
						
				</div>
				
				<div class="bottom">

				    <ul class="oi">
				        <li><a href="http://openinstitute.com/"><img class="image" src="images/oi-white.png" alt="" style="max-width: 120px;" /></a></li>
				    </ul>

				    <!-- Social Icons -->
				        <ul class="icons">
				            <li><a href="http://twitter.com/open_institute" class="fa fa-twitter solo"><span>Twitter</span></a></li>
				            <li><a href="http://plus.google.com/+OpenInstitute" class="fa fa-google-plus solo"><span>Google+</span></a></li>
				            <li><a href="http://facebook.com/theopeninstitute" class="fa fa-facebook solo"><span>Facebook</span></a></li>
				            <li><a href="http://github.com/openinstitute" class="fa fa-github-alt solo"><span>Github</span></a></li>
				            <li><a href="http://www.linkedin.com/company/2865525" class="fa fa-linkedin solo"><span>Linkedin</span></a></li>
				            <li><a href="mailto:hello@openinstitute.com" class="fa fa-envelope solo"><span>Email</span></a></li>
				        </ul>
				</div>
			</div>

		<!-- Main -->
				<div id="main">
			
				 <!-- Intro -->
                    <section id="home" class="one">
                        <div class="container">

                            <header>
                                <h1 class="alt">OI Project <strong>Performance</strong>.</h1>
                            </header>

                        </div>
                    </section>

				<!-- octrends -->
					<section id="octrends" class="two">
					<div class="container">
						<header>
							<h2>Open County</h2>
						</header>
						<div class="tab-pane active" id="profile-1">
							<div class="clearfix">&nbsp;</div>
								<h3><center><strong>Impact</strong></center></h3>		
								<div class="col-md-4 col-lg-4">
									<div class="row">
										<div class="col-md-12">
											<h4>Number of Datasets Extracted</h4>
											<?php
												$ocpde = ($ocDatasetC/$ocDatasetT)*100;
												$ocsn = ($ocSubNatGovtsReached/$ocSubNatGovtsTarget)*100;
											?>
											<div class="progress progress-striped active">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $ocpde; ?>%;">
												</div>
											</div>
											<center><span class="small"><?php echo $ocDatasetC;?> of <?php echo $ocDatasetT;?> datasets</span></center>
									
										</div> <br/>
										<div class="col-md-12">
											<h4>Number of Sub-National Govs</h4>
											<div class="progress progress-striped active">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="47" style="width: <?php echo $ocsn; ?>%">
												</div>
											</div>
											<center><span class="small"><?php echo $ocSubNatGovtsReached;?> Out of <?php echo $ocSubNatGovtsTarget;?> Governors</span></center>
									
										</div>
										
									</div>
								</div>
								
								<div class="col-md-8 col-lg-8">
									 <div class="col-md-4 col-sm-4">
									
											<div class="tile-stats tile-blue height">
												<div class="icon"><i class="entypo-users"></i></div>
												<center>
													<div class="num top_" data-start="0" data-end="<?php echo $ocTrainees;?>" data-postfix="" data-duration="1500" data-delay="0"><?php echo $ocTrainees;?></div>
													<h3>Trainees</h3>
												</center>
											</div>
									
									 </div>
									
									<div class="col-md-4 col-sm-4">
								
										<div class="tile-stats tile-green height">
											<div class="icon"><i class="entypo-user-add"></i></div>
											<center>
												<div class="num top_" data-start="0" data-end="<?php echo $ocPeopleReached;?>" data-postfix="" data-duration="1500" data-delay="600"><?php echo $ocPeopleReached;?></div>
												<h3>People Reached</h3>
											</center>
										</div>
								
									</div>
									
									<div class="col-md-4 col-sm-4">
								
										<div class="tile-stats tile-white height">
											<div class="icon"><i class="entypo-suitcase"></i></div>
											<center>
												<div class="num top_" data-start="0" data-end="<?php echo $ocGovtOfficialsReached;?>" data-postfix="" data-duration="1500" data-delay="1200"><?php echo $ocGovtOfficialsReached;?></div>
												<h3>Govt. Officials Reached</h3>
											</center>
										</div>
								
									</div>

								</div>
									

								<div class="clearfix"></div>
									
								<div class="row">
									<h3><center><strong>Resources</strong></center></h3>
										<div class="col-md-5ths">
									
											<div class="tile-stats tile-red">
												<div class="icon"><i class="entypo-users"></i></div>
												<center>
													<div class="num" data-start="0" data-end="<?php echo $ocHeadCount;?>" data-postfix="" data-duration="1500" data-delay="0"><?php echo $ocHeadCount;?></div>
													<h3>Headcount</h3>
												</center>
											</div>
									
										</div>
									
										<div class="col-md-5ths">
									
											<div class="tile-stats tile-green">
												<div class="icon"><i class="entypo-calendar"></i></div>
												<center>
													<div class="num" data-start="0" data-end="<?php echo $ocEvents;?>" data-postfix="" data-duration="1500" data-delay="600"><?php echo $ocEvents;?></div>
													<h3>Events</h3>
												</center>
											</div>
									
										</div>
									
										<div class="col-md-5ths">
									
											<div class="tile-stats tile-aqua">
												<div class="icon"><i class="entypo-users"></i></div>
												<center>
													<div class="num" data-start="0" data-end="<?php echo $ocOIPartnerships;?>" data-postfix="" data-duration="1500" data-delay="1200"><?php echo $ocOIPartnerships;?></div>
													<h3>Partnerships</h3>
												</center>
											</div>
									
										</div>
									
										<div class="col-md-5ths">
									
											<div class="tile-stats tile-orange">
												<div class="icon"><i class="entypo-rss"></i></div>
												<center>
													<div class="num" data-start="0" data-end="<?php echo $ocBlogsDone;?>" data-postfix="" data-duration="1500" data-delay="1800"><?php echo $ocBlogsDone;?></div>
													<h3>Blogs</h3>
												</center>
											</div>
									
										</div>

										<div class="col-md-5ths">
									
											<div class="tile-stats tile-primary">
												<div class="icon"><i class="entypo-video"></i></div>
												<center>
													<div class="num" data-start="0" data-end="<?php echo $ocVideosDone;?>" data-postfix="" data-duration="1500" data-delay="1800"><?php echo $ocVideosDone;?></div>
													<h3>Videos</h3>
												</center>
											</div>
									
										</div>
								</div>
							</div>
						</div>	
					</section>
				<!-- odtrends -->
					<section id="odtrends" class="three">
					<div class="container">
						<header>
							<h2>Open Duka</h2>
						</header>
						<div class="tab-pane active" id="profile-1">
							<div class="clearfix"></div>
								<h3><center><strong>Impact</strong></center></h3>		
								<div class="col-md-4 col-lg-4">
									<div class="row">
										<div class="col-md-12">
											<h4>Number of Datasets Extracted</h4>
											<?php
												$odpde = ($odDatasetC/$odDatasetT)*100;
												$odsn = ($odSubNatGovtsReached/$odSubNatGovtsTarget)*100;
											?>
											<div class="progress progress-striped active">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: <?php echo $odpde; ?>%;">
												</div>
											</div>
											<center><span class="small"><?php echo $odDatasetC;?> of <?php echo $odDatasetT;?> datasets</span></center>
									
										</div> <br/>
										<div class="col-md-12">
											<h4>Number of Sub-National Govs</h4>
											<div class="progress progress-striped active">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="45" aria-valuemin="0" aria-valuemax="47" style="width: <?php echo $odsn; ?>%">
												</div>
											</div>
											<center><span class="small"><?php echo $odSubNatGovtsReached;?> Out of <?php echo $odSubNatGovtsTarget;?> Governors</span></center>
									
										</div>
										
									</div>
								</div>
								
								<div class="col-md-8 col-lg-8">
									 <div class="col-md-4 col-sm-4">
									
											<div class="tile-stats tile-blue height">
												<div class="icon"><i class="entypo-users"></i></div>
												<center>
													<div class="num top_" data-start="0" data-end="<?php echo $odTrainees;?>" data-postfix="" data-duration="1500" data-delay="0"><?php echo $odTrainees;?></div>
													<h3>Trainees</h3>
												</center>
											</div>
									
									 </div>
									
									<div class="col-md-4 col-sm-4">
								
										<div class="tile-stats tile-green height">
											<div class="icon"><i class="entypo-user-add"></i></div>
											<center>
												<div class="num top_" data-start="0" data-end="<?php echo $odPeopleReached;?>" data-postfix="" data-duration="1500" data-delay="600"><?php echo $odPeopleReached;?></div>
												<h3>People Reached</h3>
											</center>
										</div>
								
									</div>
									
									<div class="col-md-4 col-sm-4">
								
										<div class="tile-stats tile-white height">
											<div class="icon"><i class="entypo-suitcase"></i></div>
											<center>
												<div class="num top_" data-start="0" data-end="<?php echo $odGovtOfficialsReached;?>" data-postfix="" data-duration="1500" data-delay="1200"><?php echo $odGovtOfficialsReached;?></div>
												<h3>Govt. Officials Reached</h3>
											</center>
										</div>
								
									</div>
								 </div>
									

								<div class="clearfix"></div>
									
								<div class="row">
									<h3><center><strong>Resources</strong></center></h3>
										<div class="col-md-5ths">
									
											<div class="tile-stats tile-red">
												<div class="icon"><i class="entypo-users"></i></div>
												<center>
													<div class="num" data-start="0" data-end="<?php echo $odHeadCount;?>" data-postfix="" data-duration="1500" data-delay="0"><?php echo $odHeadCount;?></div>
													<h3>Headcount</h3>
												</center>
											</div>
									
										</div>
									
										<div class="col-md-5ths">
									
											<div class="tile-stats tile-green">
												<div class="icon"><i class="entypo-calendar"></i></div>
												<center>
													<div class="num" data-start="0" data-end="<?php echo $odEvents;?>" data-postfix="" data-duration="1500" data-delay="600"><?php echo $odEvents;?></div>
													<h3>Events</h3>
												</center>
											</div>
									
										</div>
									
										<div class="col-md-5ths">
									
											<div class="tile-stats tile-aqua">
												<div class="icon"><i class="entypo-users"></i></div>
												<center>
													<div class="num" data-start="0" data-end="<?php echo $odOIPartnerships;?>" data-postfix="" data-duration="1500" data-delay="1200"><?php echo $odOIPartnerships;?></div>
													<h3>Partnerships</h3>
												</center>
											</div>
									
										</div>
									
										<div class="col-md-5ths">
									
											<div class="tile-stats tile-orange">
												<div class="icon"><i class="entypo-rss"></i></div>
												<center>
													<div class="num" data-start="0" data-end="<?php echo $odBlogsDone;?>" data-postfix="" data-duration="1500" data-delay="1800"><?php echo $odBlogsDone;?></div>
													<h3>Blogs</h3>
												</center>
											</div>
									
										</div>

										<div class="col-md-5ths">
									
											<div class="tile-stats tile-primary">
												<div class="icon"><i class="entypo-video"></i></div>
												<center>
													<div class="num" data-start="0" data-end="<?php echo $odVideosDone;?>" data-postfix="" data-duration="1500" data-delay="1800"><?php echo $odVideosDone;?></div>
													<h3>Videos</h3>
												</center>
											</div>
									
										</div>
								</div>
							</div>
						</div>	
					</section>
			<!-- About -->
					<section id="about" class="four">
						<div class="container">
							<header>
								<h2>About Open Institute Dashboard</h2>
							</header>
							<p>
								This Dashboard seeks to show....
							</p>
							
						</div>
					</section>

				<!-- Contact -->
					<section id="contact" class="five">
						<div class="container">

							<header>
								<h2>Contact</h2>
							</header>

							<p>Stay in touch.</p>

							<?php
							   if (isset($_POST['submit'])) {
							   	$name = $_POST['name'];
							   	$email = $_POST['email'];
							   	$messsage = $_POST['message'];
							   	$msg = wordwrap($message,70);
							   	$headers = 'From: '.$email;
							   	$headers .= 'Reply-To: '.$email;
							   	$headers .= 'X-Mailer: PHP/' . phpversion();
							   	$to = "kevin@openinstitute.com";
							   	$subject = "Message From $name on the OI Dashboard";

							   	mail($to, $subject, $msg, $headers);
							   	$success = "Message sent successfully";
							   } 


							?>
							<form action="#contact" method="POST" id="ss-form" target="_self" onsubmit="">
  					
								<div class="row half">
									<div class="6u"><input type="text" class="text" name="name" placeholder="Name" id="entry_0" /></div>
									<div class="6u"><input type="text" class="text" name="email" placeholder="Email" id="entry_1" /></div>
								</div>
								<div class="row half">
									<div class="12u">
										<textarea name="message" placeholder="Message" id="entry_2"></textarea>
									</div>
								</div>
								<!-- <div class="row">
									<div class="12u">
										<a href="#" class="button submit">Send Message</a>
									</div>
								</div> -->

								<div class="ss-item ss-navigate">
									<div class="ss-form-entry">
										<input type="submit" name="submit" value="Submit" class="button" style="margin-top:10px;" />
								</div>
								<p>
								<?php echo $success; ?>
								
								</p>

							</form>
							<!--
							<form action="https://docs.google.com/a/openinstitute.com/forms/d/13frkRA5TQlDFfueJtRKCjbOzfEWoh2Lg7vc_904ouo4/formResponse" method="POST" id="ss-form" target="_self" onsubmit="">
  					
								<div class="row half">
									<div class="6u"><input type="text" class="text" name="entry.783466386" placeholder="Name" id="entry_0" /></div>
									<div class="6u"><input type="text" class="text" name="entry.1281195243" placeholder="Email" id="entry_1" /></div>
								</div>
								<div class="row half">
									<div class="12u">
										<textarea name="entry.600532200" placeholder="Message" id="entry_2"></textarea>
									</div>
								</div>
								<-- <div class="row">
									<div class="12u">
										<a href="#" class="button submit">Send Message</a>
									</div>
								</div> 

								<div class="ss-item ss-navigate">
									<div class="ss-form-entry">
										<input type="submit" name="submit" value="Submit" class="button" style="margin-top:10px;" />
								</div>

							</form>
							-->

						</div>
					</section>
			
			</div>

		<!-- Footer -->
            <div id="footer">
                
                <!-- Copyright -->
                    <div class="copyright">
                        <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.en_US"><img alt="Creative Commons License" style="border-width:0" src="http://i.creativecommons.org/l/by-sa/3.0/80x15.png" /></a><br /><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">Open Institute</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="http://openinstitute.com" property="cc:attributionName" rel="cc:attributionURL">Open Institute</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by-sa/3.0/deed.en_US">Creative Commons Attribution-ShareAlike 3.0 Unported License</a>.
                    </div>

                <!-- Credits
                Photo - Kenya: Student using his fingers to solve a problem on the Early Grade Mathematics Assessment (EGMA)
                By - GlobalPartnership for Education
                Link - http://www.flickr.com/photos/gpforeducation/8493336550/
                -->    
            </div>
<!-- Bottom scripts (common) -->
	

	<!-- JavaScripts initializations and stuff -->
	<script src="js/neon-custom.js"></script>

	<script src="js/bootstrap.js"></script>
	<script src="js/joinable.js"></script>
	<script src="js/resizeable.js"></script>
	<script src="js/neon-api.js"></script>


</html>

