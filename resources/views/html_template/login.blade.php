	<!-- You can use .rtl CSS in #login-page -->
	<body id="login-page" >
		<canvas id="spiders" class="hidden-xs" ></canvas>
		<div class="">
			<div style="margin: 5% auto; position: relative; width: 400px;">
				<!-- <div class="page-header">
				  	<h1 class="logo"><img src="../assets/img/logo.png" height="28" width="175" alt=""></h1>
				  	<div class="login-links pull-right">
		                <a id="sign-in" href="#"  title="Sign In" style="display:none;">Sign In </a>
		                <a id="register" href="#" class="" title="Register Form" > Register</a>	
		                <span id="division"> | </span>
		                <a id="forget" href="#" class="" title="Forget Password" > Forget Password</a>	               
		            </div>
				</div>	 -->			
				<div id="sign-form" class="panel panel-default">					
					<div class="panel-body">										 
						<div class="row">
							<div class="col-md-12">
								<div class="text-center">									
									<h2>Golabi Admin Login</h2>
									<h5 class="grey">Sign in with social network or local account</h5>
									<br>
								</div>
								<div class="btn-group btn-group-justified">
									<a href="#" class="btn btn-primary" ><i class="fa fa-facebook"></i> Facebook</a>
									<a href="#" class="btn btn-info"><i class="fa fa-twitter"></i> Twitters</a>									
								</div>
								<br>
								<!-- <button type="button" class="btn btn-labeled btn-primary btn-block" >
					                <span class="btn-label"><i class="fa fa-facebook"></i></span>
					                <span class="txt">sign in with <strong>Facebook</strong></span>
					            </button>
					            <button type="button" class="btn btn-labeled btn-info btn-block" >
					                <span class="btn-label"><i class="fa fa-twitter"></i></span>
					                <span class="txt">sign in with <strong>Twitters</strong></span>
					            </button>
					            <button type="button" class="btn btn-labeled btn-danger btn-block" >
					                <span class="btn-label"><i class="fa fa-google-plus"></i></span>
					                <span class="txt">sign in with <strong>Google+</strong></span>
					            </button>	 -->
					            <span class="or-login">OR</span>
					            <hr>
								<form class="form-horizontal">
									<fieldset>
										<div class="text-center">									
											<img src="../assets/img/avatars/default.png" width="75" alt="avatar">
										</div>
										<div class="spacing hidden-md"></div>
										<div  class="input-group">
	                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
	                                        <input id="login-username" type="text" class="form-control" name="username" value="" placeholder="username or email">                                        
	                                    </div>
										<div class="spacing"></div>
										<div  class="input-group">
	                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
	                                        <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
	                                    </div>
										<div class="spacing"></div>
										<div class="checkbox checkbox-primary"> <input id="remember" type="checkbox"  > <label for="remember"> Remember me </label> </div>
										<button id="singlebutton" name="singlebutton" class="btn btn-success btn-sm  pull-right">Sign In</button>
										
									</fieldset>
								</form>
								<a href="#" class="grey">Forget Password?</a>
							</div>

						</div>

					</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-body text-center">
						Not a registered user yet? 
						<a id="register" class="animate" href="#"> <b>Sign up now!</b></a>
					</div>
				</div>

				<div id="forget-form" class="panel panel-default animated " style="display:none;">
					
					<div class="panel-body">
						<h4>
							Reset Password
						</h4>
						<div class="row">

							<div class="col-md-6 " >
								<p class="text-justify black">
									Lorem ipsum dolor sit amet, commodo prompta mentitum nam ex, tota elaboraret mediocritatem ne mei. Cum everti dissentiunt te. Audire forensibus nec cu, eius pertinax ei pri, labore aliquid																
								</p>
							</div>

							<div class="col-md-6 seprate-login">
								<form class="form-horizontal">
									<fieldset>

										<div class="spacing hidden-md"></div>
										<div  class="input-group">
	                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
	                                        <input id="login-email-1" type="email" class="form-control" name="email" placeholder="Enter Your Email">
	                                    </div>
										<div class="spacing"></div>
										<div  class="input-group">
	                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
	                                        <input id="login-birthday-1" type="text" class="form-control" name="birthday" placeholder="Enter Your Birthday">
	                                    </div>
										<div class="spacing"><br></div>
										<button id="singlebutton1" name="singlebutton" class="btn btn-info btn-sm pull-right">Submit</button>

									</fieldset>
								</form>
							</div>

						</div>

					</div>
				</div>

				<div id="register-form" class="panel panel-default animated " style="display:none;">
					
					<div class="panel-body">
						<div class="text-center">
							<h2>Create new account</h2>
							<h5 class="grey">Sign up with social network or local account</h5>
						</div>
						<div class="btn-group btn-group-justified">
							<a href="#" class="btn btn-primary" ><i class="fa fa-facebook"></i> Facebook</a>
							<a href="#" class="btn btn-info"><i class="fa fa-twitter"></i> Twitters</a>									
						</div>
						<br>
						<span class="or-login">OR</span>
					    <hr>
						<div class="row">

							<div class="col-md-12">
								<form class="form-horizontal">
									<fieldset>

										<div class="spacing hidden-md"></div>
										<div  class="input-group">
	                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
	                                        <input id="login-email-2" type="email" class="form-control" name="email" placeholder="Enter Your Email">
	                                    </div>										
	                                    <div class="spacing hidden-md"></div>
										<div  class="input-group">
	                                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
	                                        <input id="login-name" type="text" class="form-control" name="name" placeholder="Enter Your Name">
	                                    </div>
	                                    <div class="spacing"></div>
										<div  class="input-group">
	                                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
	                                        <input id="login-birthday-2" type="text" class="form-control" name="birthday" placeholder="Enter Your Birthday">
	                                    </div>
	                                    <div class="spacing hidden-md"></div>
										<div  class="input-group">
	                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
	                                        <input id="login-pass" type="password" class="form-control" name="password" placeholder="Enter Your password">
	                                    </div>
	                                    <div class="spacing hidden-md"></div>
										<div  class="input-group">
	                                        <span class="input-group-addon"><i class="fa fa-key"></i></span>
	                                        <input id="login-password-1" type="password" class="form-control" name="password2" placeholder="Enter Your Confirm Password">
	                                    </div>
										<div class="spacing"><br></div>
										<button id="singlebutton2" name="singlebutton" class="btn btn-success btn-sm pull-right">Submit</button>

									</fieldset>
								</form>
							</div>

						</div>

					</div>
				</div>
				<p>Copyright 2015 YEP Corporation. All right reserved.</p>
			</div>

		</div>
