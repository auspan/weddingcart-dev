<!DOCTYPE html>
<html dir="ltr" lang="en-US"><head>

	<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta name="author" content="WeddingCart">

	<!-- Stylesheets
	============================================= -->
	<link href="css/css.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/bootstrap.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<link rel="stylesheet" href="css/dark.css" type="text/css">
	<link rel="stylesheet" href="css/font-icons.css" type="text/css">
	<link rel="stylesheet" href="css/animate.css" type="text/css">
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/style1.css" type="text/css">
    
	<!-- Travel Demo Specific Stylesheet -->
	<link rel="stylesheet" href="css/datepicker.css" type="text/css">
	<!-- / -->

	<link rel="stylesheet" href="css/responsive.css" type="text/css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/plugins.js"></script>
    
	<!-- Travel Demo Specific Script -->
	<script type="text/javascript" src="js/datepicker.js"></script>
	<!-- / -->

	<!-- Document Title
	============================================= -->
	<title>WeddingCart | Transforming Indian Weddings</title>

    <script>
    function selectimage(txt)
    {
         var imageId=txt;
        
        document.getElementById(imageId).click() 
        {
           
        $("#"+imageId).change(function(e){
            // get file name only
            //var fileName = e.target.files[0].name;
            // get complete path of local machine
            var fileName=URL.createObjectURL(e.target.files[0]); 

            $("img#"+imageId).fadeIn("fast").attr('src',fileName);
        });
    }
        return false;
    }
    </script>


<body class="stretched device-lg">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix animate">

		<!-- Header
		============================================= -->
		<header class="sticky-header" id="header">

			<div id="header-wrap">

				<div class="container clearfix">

					<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

					<!-- Logo
					============================================= -->
					<div id="logo">
						<a href="#" class="standard-logo" data-dark-logo="images/logo-dark.png"><img src="images/logo.png" alt="WeddingCart Logo"></a>
						<a href="#" class="retina-logo" data-dark-logo="images/logo-dark@2x.png"><img src="images/logo2x.png" alt="WeddingCart Logo"></a>
					</div><!-- #logo end -->

					<!-- Primary Navigation
					============================================= -->
					<nav id="primary-menu">

						<ul class="sf-js-enabled">
							<li><a href="#"><div>Home</div></a></li>
							<li><a href="#"><div>Services</div></a></li>
							<li><a href="#"><div>Testimonials</div></a></li>
							<li><a href="#"><div>About</div></a></li>
							<li><a href="#"><div>Contact</div></a></li>
						</ul>

						<!-- Top Search
						============================================= -->
						<div id="top-search">
							<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
							<form action="search.html" method="get">
								<input name="q" class="form-control" placeholder="Type &amp; Hit Enter.." type="text">
							</form>
						</div><!-- #top-search end -->

					</nav><!-- #primary-menu end -->

				</div>

			</div>

		</header><!-- #header end -->
        
		<!-- Page Sub Menu
		============================================= -->
		<div class="sticky-page-menu" id="page-menu">

			<div id="page-menu-wrap">

				<div class="container clearfix">

					<div class="menu-title"><a href="{{ url('/logout') }}">Logout</a></div>

					<nav>
						<ul>
							<li><a href="{{ url('/home') }}">Dashboard</a></li>
							<li class="current"><a href="{{ url('/wedding') }}">Wedding</a></li>
							<li><a href="{{ url('/wishlist') }}">Wish List</a></li>
							<li><a href="#">Invite</a></li>
							<li><a href="#">Send</a></li>
						</ul>
					</nav>

				<div id="page-submenu-trigger"><i class="icon-reorder"></i></div>

				</div>

			</div>

		</div><!-- #page-menu end -->


		<!-- Content
		============================================= -->
		<section id="content" class="secbkgrnd">

			<div class="content-wrap">

				<div class="container clearfix">
                
						<div class="heading-block center">
							<h2>Create your event</h2>
							<span class="divcenter">Please fill-up the details of the Bride and Groom.</span>
                            
                            <div class="tab-container">
    
                               <div class="clearfix">

                        @if($errors->any())
                            <ul class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <li> {{ $error }} </li>
                                @endforeach
                            </ul>
                        @endif
                               		
								{!! Form::open(['action'=>'WeddingController@store', 'class'=>'form-horizontal nobottommargin', 'method'=>'post', 'files'=>true]) !!}
                               		<div class="row">
                                                <div class="input-daterange travel-date-group bottommargin-sm">
                                                    <div class="col-md-4 divcenter">
                                                        <label for="">Wedding Date</label>
                                                        <input class="sm-form-control" name="wedding_date" placeholder="MM/DD/YYYY" type="text">
                                                    </div>
                                                        <input type="hidden" name="wed_date" class="form-control" value="wdt">
                                                    
                                                </div>
                                            </div>
                                        
                                </div>
    
                            </div>
    
                            
                                                
						</div>

						<div class="col_half">
                                    
                            <!-- Contact Form Overlay
                            ============================================= -->
                            <div id="contact-form-overlay" class="clearfix">
                                <input id="bimg" name="bride_image" class="sm-form-control required" type="file" style="display: none">
                                        <input type="hidden" name="bride_img" class="form-control" value="bim">
								<div class="bride-image divcenter">
										<a href="" onclick="return selectimage('bimg')"><img src="images/favatar.png" id="bimg" alt="Groom" class="img-rounded img-responsive"></a>
								</div>
                                <div class="col_full center bottommargin">Minimum size 300 x 300 pixel.</div>
                                
                                <!-- Contact Form
                                ============================================= -->
                               
                                    <div class="col_full">
                                    <center>
                                        <label for="template-contactform-service">Bride</label>
                                     </center>  
                                  	
            
                                    <div class="clear"></div>
            
                                    <div class="col_full">
                                        <label for="template-contactform-name">Name <small>*</small></label>
                                        <input id="template-contactform-name" name="bride_name" class="sm-form-control required" type="text">
                                        <input type="hidden" name="bride" class="form-control" value="bnm">
                                    </div>
            
                             <!--       <div class="clear"></div>
            
                                    <div class="col_full">
                                        <label for="template-contactform-name">Father Name <small>*</small></label>
                                        <input id="template-contactform-name" name="template-contactform-name" class="sm-form-control required" type="text">
                                    </div>
            
                                    <div class="col_full">
                                        <label for="template-contactform-name">Mother Name <small>*</small></label>
                                        <input id="template-contactform-name" name="template-contactform-name" class="sm-form-control required" type="text">
                                    </div>
            
                                    <div class="clear"></div>
            
                                    <div class="col_full">
                                        <label for="template-contactform-subject">Address <small>*</small></label>
                                        <input id="template-contactform-subject" name="template-contactform-subject" class="required sm-form-control" type="text">
                                    </div>
                                    
                                    <div class="col_full">
                                        <label for="template-contactform-service">City</label>
                                        <select id="template-contactform-service" name="template-contactform-service" class="sm-form-control">
                                            <option selected="selected" value="">-- Select One --</option>
                                            <option value="Wordpress">New Delhi</option>
                                            <option value="PHP / MySQL">Bangalore</option>
                                            <option value="Wordpress">Mumbai</option>
                                            <option value="PHP / MySQL">Kolkata</option>
                                            <option value="Wordpress">Chandigarh</option>
                                            <option value="PHP / MySQL">Chennai</option>
                                            <option value="Wordpress">Jaipur</option>
                                            <option value="PHP / MySQL">Dehradun</option>
                                        </select>
                                    </div>
            
                                    <div class="col_full">
                                        <label for="template-contactform-service">State</label>
                                        <select id="template-contactform-service" name="template-contactform-service" class="sm-form-control">
                                            <option selected="selected" value="">-- Select One --</option>
                                            <option value="Wordpress">NCR</option>
                                            <option value="PHP / MySQL">Karnataka</option>
                                            <option value="Wordpress">Maharashtra</option>
                                            <option value="PHP / MySQL">West Bengal</option>
                                            <option value="Wordpress">Punjab</option>
                                            <option value="PHP / MySQL">Tamil Nadu</option>
                                            <option value="Wordpress">Rajasthan</option>
                                            <option value="PHP / MySQL">Uttarakhand</option>
                                        </select>
                                    </div>  -->
            
                              </div>
            
                            </div><!-- Contact Form Overlay End -->
            
						</div>
                        
						<div class="col_half col_last">
                                    
                            <!-- Contact Form Overlay
                            ============================================= -->
                            <div id="contact-form-overlay" class="clearfix">
                                <input id="gimg" name="groom_image" class="sm-form-control required" type="file" style="display: none">

                                <input type="hidden" name="groom_img" class="form-control" value="gim">

								<div class="bride-image divcenter">
										<a href="" onclick="return selectimage('gimg')"><img src="images/mavatar.png" id="gimg" alt="Groom" class="img-responsive"></a>
								</div>
                                <div class="col_full center bottommargin">Minimum size 300 x 300 pixel.</div>
                                
                                <!-- Contact Form
                                ============================================= -->
                                
            
                                    <div class="col_full">
                                    	<center>
                                        <label for="template-contactform-service">Groom</label>
                                       	</center>
                                    
                                    <div class="clear"></div>
            
                                    <div class="col_full">
                                        <label for="template-contactform-name">Name <small>*</small></label>
                                        <input id="template-contactform-name" name="groom_name" class="sm-form-control required" type="text">
                                        <input type="hidden" name="groom" class="form-control" value="gnm">
                                    </div>
            
                          <!--          <div class="clear"></div>
            
                                    <div class="col_full">
                                        <label for="template-contactform-name">Father Name <small>*</small></label>
                                        <input id="template-contactform-name" name="template-contactform-name" class="sm-form-control required" type="text">
                                    </div>
            
                                    <div class="col_full">
                                        <label for="template-contactform-name">Mother Name <small>*</small></label>
                                        <input id="template-contactform-name" name="template-contactform-name" class="sm-form-control required" type="text">
                                    </div>
            
                                    <div class="clear"></div>
            
                                    <div class="col_full">
                                        <label for="template-contactform-subject">Address <small>*</small></label>
                                        <input id="template-contactform-subject" name="template-contactform-subject" class="required sm-form-control" type="text">
                                    </div>
                                    
                                    <div class="col_full">
                                        <label for="template-contactform-service">City</label>
                                        <select id="template-contactform-service" name="template-contactform-service" class="sm-form-control">
                                            <option selected="selected" value="">-- Select One --</option>
                                            <option value="Wordpress">New Delhi</option>
                                            <option value="PHP / MySQL">Bangalore</option>
                                            <option value="Wordpress">Mumbai</option>
                                            <option value="PHP / MySQL">Kolkata</option>
                                            <option value="Wordpress">Chandigarh</option>
                                            <option value="PHP / MySQL">Chennai</option>
                                            <option value="Wordpress">Jaipur</option>
                                            <option value="PHP / MySQL">Dehradun</option>
                                        </select>
                                    </div>
            
                                    <div class="col_full">
                                        <label for="template-contactform-service">State</label>
                                        <select id="template-contactform-service" name="template-contactform-service" class="sm-form-control">
                                            <option selected="selected" value="">-- Select One --</option>
                                            <option value="Wordpress">NCR</option>
                                            <option value="PHP / MySQL">Karnataka</option>
                                            <option value="Wordpress">Maharashtra</option>
                                            <option value="PHP / MySQL">West Bengal</option>
                                            <option value="Wordpress">Punjab</option>
                                            <option value="PHP / MySQL">Tamil Nadu</option>
                                            <option value="Wordpress">Rajasthan</option>
                                            <option value="PHP / MySQL">Uttarakhand</option>
                                        </select>
                                    </div>  -->
            
                               
            
                            </div><!-- Contact Form Overlay End -->
            
						</div>
                                                
				</div>

				<div class="center bottommargin-lg">

					{!! Form::button('Save', ['class'=>'button button-rounded button-xlarge', 'type'=>'submit'] ) !!}
					<a href="#" class="button button-rounded button-xlarge">Back</a>
					</form>
            </div>

			</div>

		</section><!-- #content end -->

		<!-- Footer
		============================================= -->
		<footer id="footer" class="dark">

			<div class="container">

				<!-- Footer Widgets
				============================================= -->
				<div class="footer-widgets-wrap clearfix">

					<div class="col_one_third">

						<div class="widget clearfix">

							<p><strong>Lorem ipsum dolor sit amet</strong>, consectetur 
adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore 
magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
 laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor 
in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla 
pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa 
qui officia deserunt mollit anim id est laborum.</p>

                            <a href="#" class="button button-rounded button-large"><span>Login</span></a>

						</div>

					</div>

                    <div class="col_one_third">
    
                            <div class="widget clearfix">
                                <h4>Instagram Photos</h4>
                                <div id="instagram-photos" class="instagram-photos masonry-thumbs col-5 instagramimg" data-user="269801886" data-count="15" data-type="tag">
                                <a class="hyper1" href="#">
                                	<img src="images/12627947_928049467307998_1548544331_n.jpg">
                                </a>
                                <a class="hyper2" href="#">
                                	<img src="images/12479572_1258841370799354_300798424_n.jpg">
                                </a>
                                <a class="hyper3" href="#">
                                	<img src="images/12502053_560826100736513_970833958_n.jpg">
                                </a>
                                <a class="hyper4" href="#">
                                	<img src="images/12558359_228315584169958_1743372768_n.jpg">
                                </a>
                                <a class="hyper5" href="#">
                                	<img src="images/1169906_806242632852917_47570257_n.jpg">
                                </a>
                                <a class="hyper6" href="#">
                                	<img src="images/12568231_918762371512586_1040873415_n.jpg">
                                </a>
                                <a class="hyper7" href="#">
                                	<img src="images/12716684_1552261678417854_1140101475_n.jpg">
                                </a>
                                <a class="hyper8" href="#">
                                	<img src="images/12728598_223758741300408_2017447898_n.jpg">
                                </a>
                                <a class="hyper9" href="#">
                                	<img src="images/12729430_1522581344705024_655977111_n.jpg">
                                </a>
                                <a class="hyper10" href="#">
                                	<img src="images/12545470_435972426610458_427357728_n.jpg">
                                </a>
                                <a class="hyper11" href="#">
                                	<img src="images/12627892_673848462718933_716411164_n.jpg">
                                </a>
                                <a class="hyper12" href="#">
                                	<img src="images/12716777_1007733635964330_19468703_n.jpg">
                                </a>
                                <a class="hyper13" href="#">
                                	<img src="images/1724887_1018462798192776_1065085569_n.jpg">
                                </a>
                                <a class="hyper14" href="#">
                                	<img src="images/12556144_806298586159465_904407255_n.jpg">
                                </a>
                                <a class="hyper15" href="#">
                                	<img src="images/12729490_848976251877989_1325898334_n.jpg">
                                </a>
                                </div>
                            </div>
    
    
                        </div>

					<div class="col_one_third col_last">

						<div class="widget subscribe-widget clearfix">
							<h5><strong>Subscribe</strong> to Our Newsletter to get Important News, Amazing Offers &amp; Inside Scoops:</h5>
							<div id="widget-subscribe-form-result" data-notify-type="success" data-notify-msg=""></div>
							<form novalidate="novalidate" id="widget-subscribe-form" action="include/subscribe.php" role="form" method="post" class="nobottommargin">
								<div class="input-group divcenter">
									<span class="input-group-addon"><i class="icon-email2"></i></span>
									<input aria-required="true" id="widget-subscribe-form-email" name="widget-subscribe-form-email" class="form-control required email" placeholder="Enter your Email" type="email">
									<span class="input-group-btn">
										<button class="btn btn-success" type="submit">Subscribe</button>
									</span>
								</div>
							</form>
							
						</div>
                        
						<div class="widget clearfix">

							<h5><strong>Be Social &amp; Stay Connected</strong></h5>

							<a href="#" class="social-icon si-dark si-rounded si-facebook">
								<i class="icon-facebook"></i>
								<i class="icon-facebook"></i>
							</a>
                            
							<a href="#" class="social-icon si-dark si-rounded si-linkedin">
								<i class="icon-linkedin"></i>
								<i class="icon-linkedin"></i>
							</a>

							<a href="#" class="social-icon si-dark si-rounded si-twitter">
								<i class="icon-twitter"></i>
								<i class="icon-twitter"></i>
							</a>

							<a href="#" class="social-icon si-dark si-rounded si-gplus">
								<i class="icon-gplus"></i>
								<i class="icon-gplus"></i>
							</a>

							<a href="#" class="social-icon si-dark si-rounded si-pinterest">
								<i class="icon-pinterest"></i>
								<i class="icon-pinterest"></i>
							</a>


						</div>

					</div>

				</div><!-- .footer-widgets-wrap end -->

			</div>

			<!-- Copyrights
			============================================= -->
			<div id="copyrights">

				<div class="container clearfix">

					<div class="col_full nobottommargin center">
						Copyrights © 2014 All Rights Reserved by WeddingCart.
					</div>

				</div>

			</div><!-- #copyrights end -->

		</footer><!-- #footer end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up divangle"></div>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="js/functions.js"></script>
    <script type="text/javascript" src="js/newjs.js"></script>


</body></html>