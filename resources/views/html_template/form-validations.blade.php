<div id="content">
	<div id="sortable-panel" class="">

		<div id="titr-content" class="col-md-12">
			<h2>Form Validation</h2>
			<h5>You may also check the form validation by clicking on the form action button...</h5>
			<div class="actions">
				<button class="btn btn-success ">Add new</button>
				<button class="btn btn-default ">Options</button>
			</div>
		</div>


		<div class="col-md-12 ">
			<div  class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<i class="fa fa-edit"></i>
						Form Validation
						<div class="bars pull-right">
							<div class="dropdown ">
								<a href="#" class="dropdown-toggle" data-toggle="dropdown">
									<i class="fa fa-cog"></i>
								</a>
								<ul class="dropdown-menu yep-panel-menu">
									<li>
										<a href="#">Daily<span class="badge pull-right"></span></a>
									</li>
									<li>
										<a href="#">Monthly<span class="badge pull-right"></span></a>
									</li>
									<li>
										<a href="#">Yearly<span class="badge pull-right"> 42 </span></a>
									</li>
									<li class="divider">
									</li>
									<li>
										<a href="#">All time<span class="badge pull-right">56</span></a>
									</li>
								</ul>
							</div>
							<a href="#"><i class="maximum fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="Maximize"></i></a>
							<a href="#"><i class="minimize fa fa-chevron-down" data-toggle="tooltip" data-placement="bottom" title="Collapse"></i></a>
							<a href="#"><i data-target="#panel2" data-dismiss="alert" data-toggle="tooltip" data-placement="bottom" title="Close" class="fa fa-times"></i></a>

						</div>
					</div>
				</div>
				<div class="panel-body">

					<hr>
					<form action="#" role="form" id="form1" class="validate">
						<div class="row">
							<div class="col-md-12">
								<div class="errorHandler alert alert-danger no-display">
									<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
								</div>
								<div class="successHandler alert alert-success no-display">
									<i class="fa fa-ok"></i> Your form validation is successful!
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label class="control-label">
										First Name <span class="symbol required"></span>
									</label>
									<input type="text" placeholder="Insert your First Name" class="form-control" id="firstname" name="firstname">
								</div>
								<div class="form-group">
									<label class="control-label">
										Last Name <span class="symbol required"></span>
									</label>
									<input type="text" placeholder="Insert your Last Name" class="form-control" id="lastname" name="lastname">
								</div>
								<div class="form-group">
									<label class="control-label">
										Email Address <span class="symbol required"></span>
									</label>
									<input type="email" placeholder="Text Field" class="form-control" id="email" name="email">
								</div>
								<div class="form-group">
									<label class="control-label">
										Password <span class="symbol required"></span>
									</label>
									<input type="password" class="form-control" name="password" id="password">
								</div>
								<div class="form-group">
									<label class="control-label">
										Confirm Password <span class="symbol required"></span>
									</label>
									<input type="password" class="form-control" id="password_again" name="password_again">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group connected-group">
									<label class="control-label">
										Date of Birth <span class="symbol required"></span>
									</label>
									<div class="row">
										<div class="col-md-3">
											<select name="dd" id="dd" class="form-control" >
												<option value="">DD</option>
												<option value="01">1</option>
												<option value="02">2</option>
												<option value="03">3</option>
												<option value="04">4</option>
												<option value="05">5</option>
												<option value="06">6</option>
												<option value="07">7</option>
												<option value="08">8</option>
												<option value="09">9</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
												<option value="13">13</option>
												<option value="14">14</option>
												<option value="15">15</option>
												<option value="16">16</option>
												<option value="17">17</option>
												<option value="18">18</option>
												<option value="19">19</option>
												<option value="20">20</option>
												<option value="21">21</option>
												<option value="22">22</option>
												<option value="23">23</option>
												<option value="24">24</option>
												<option value="25">25</option>
												<option value="26">26</option>
												<option value="27">27</option>
												<option value="28">28</option>
												<option value="29">29</option>
												<option value="30">30</option>
												<option value="31">31</option>
											</select>
										</div>
										<div class="col-md-3">
											<select name="mm" id="mm" class="form-control" >
												<option value="">MM</option>
												<option value="01">1</option>
												<option value="02">2</option>
												<option value="03">3</option>
												<option value="04">4</option>
												<option value="05">5</option>
												<option value="06">6</option>
												<option value="07">7</option>
												<option value="08">8</option>
												<option value="09">9</option>
												<option value="10">10</option>
												<option value="11">11</option>
												<option value="12">12</option>
											</select>
										</div>
										<div class="col-md-3">
											<input type="text" placeholder="YYYY" id="yyyy" name="yyyy" class="form-control">
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="control-label">
										Gender <span class="symbol required"></span>
									</label>
									<div>

										<div class="radio radio-primary radio-inline">
											<input type="radio"  value="" name="gender" id="gender_female" >
											<label for="gender_female">Female</label>
										</div>
										<div class="radio radio-primary radio-inline">
											<input type="radio"  value="" name="gender" id="gender_male" >
											<label for="gender_male">male</label>
										</div>

									</div>
								</div>
								<div class="row">
									<div class="col-md-4">
										<div class="form-group">
											<label class="control-label">
												Zip Code <span class="symbol required"></span>
											</label>
											<input class="form-control" type="text" name="zipcode" id="zipcode">
										</div>
									</div>
									<div class="col-md-8">
										<div class="form-group">
											<label class="control-label">
												City <span class="symbol required"></span>
											</label>
											<input class="form-control tooltips" type="text" data-original-title="We'll display it when you write reviews" data-rel="tooltip"  title="" data-placement="top" name="city" id="city">
										</div>
									</div>
								</div>
								<div class="form-group">
									<hr>
									<label class="control-label">
										<strong>Signup for Clip-One Emails</strong> <span class="symbol required"></span>
									</label>
									<p>
										Would you like to review Clip-One emails?
									</p>
									<div>
										<div class="radio radio-primary radio-inline">
											<input type="radio"  value="" name="newsletter" id="no" >
											<label for="no">Female</label>
										</div>
										<div class="radio radio-primary radio-inline">
											<input type="radio"  value="" name="newsletter" id="yes" >
											<label for="yes">male</label>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-12">
								<div>
									<span class="symbol required"></span>Required Fields *
									<hr>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-8">
								<p>
									By clicking REGISTER, you are agreeing to the Policy and Terms &amp; Conditions.
								</p>
							</div>
							<div class="col-md-4">
								<button class="btn btn-success btn-block" type="submit">
									Register <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</div>
					</form>


				</div>
			</div><!-- end panel -->
		</div><!-- end .col-md-6 -->


		<div class="col-md-12 ">
			<div  class="panel panel-default">
				<form action="#" role="form" id="form2" class="validate">
					<div class="panel-heading">
						<div class="panel-title">
							<i class="fa fa-file-text"></i>
							Form Checkout
							<div class="bars pull-right">
								<a href="#"><i class="maximum fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="Maximize"></i></a>
								<a href="#"><i class="minimize fa fa-chevron-down" data-toggle="tooltip" data-placement="bottom" title="Collapse"></i></a>
								<a href="#"><i data-target="#panel2" data-dismiss="alert" data-toggle="tooltip" data-placement="bottom" title="Close" class="fa fa-times"></i></a>
							</div>
						</div>
					</div>
					<div class="panel-body">


							<div class="row">
								<div class="col-md-12">
									<div class="errorHandler alert alert-danger no-display">
										<i class="fa fa-times-sign"></i> You have some form errors. Please check below.
									</div>
									<div class="successHandler alert alert-success no-display">
										<i class="fa fa-ok"></i> Your form validation is successful!
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											First Name <span class="symbol required"></span>
										</label>
										<input type="text" placeholder="Insert your First Name" class="form-control" id="firstname2" name="firstname2">
									</div>
									<div class="form-group">
										<label class="control-label">
											Last Name <span class="symbol required"></span>
										</label>
										<input type="text" placeholder="Insert your Last Name" class="form-control" id="lastname2" name="lastname2">
									</div>
									<div class="form-group">
										<label class="control-label">
											Email Address <span class="symbol required"></span>
										</label>
										<input type="email" placeholder="Text Field" class="form-control" id="email2" name="email2">
									</div>
									<div class="form-group">
										<label class="control-label">
											Occupation <span class="symbol required"></span>
										</label>
										<input type="text" class="form-control" name="occupation" id="occupation">
									</div>
									<div class="form-group">
										<label class="control-label">
											Dropdown <span class="symbol required"></span>
										</label>
										<select class="form-control" id="dropdown" name="dropdown">
											<option value="">Select...</option>
											<option value="Category 1">Category 1</option>
											<option value="Category 2">Category 2</option>
											<option value="Category 3">Category 5</option>
											<option value="Category 4">Category 4</option>
										</select>
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label class="control-label">
											Services <em>(select at least two)</em> <span class="symbol required"></span>
										</label>
										<div>
											<div class="checkbox checkbox-default">
												<input  type="checkbox" name="services" id="service1" value="">
												<label for="service1">
													Service 1
												</label>
											</div>
											<div class="checkbox checkbox-default">
												<input  type="checkbox" name="services" id="service2" value="">
												<label for="service2">
													Service 2
												</label>
											</div>
											<div class="checkbox checkbox-default">
												<input  type="checkbox" name="services" id="service3" value="">
												<label for="service3">
													Service 3
												</label>
											</div>
											<div class="checkbox checkbox-default">
												<input  type="checkbox" name="services" id="service4" value="">
												<label for="service4">
													Service 4
												</label>
											</div>
										</div>
									</div>
									<div class="form-group connected-group">
										<label class="control-label">
											Credit Card <em>(e.g: 0000 0000 0000 0000)</em> <span class="symbol required"></span>
										</label>
										<input type="text" class="form-control" id="creditcard" name="creditcard">
									</div>
									<div class="form-group connected-group">
										<label class="control-label">
											URL <em>(e.g: http://www.yoursite.com)</em> <span class="symbol required"></span>
										</label>
										<input type="text" class="form-control" id="url" name="url">
									</div>
									<div class="row">
										<div class="col-md-4">
											<div class="form-group">
												<label class="control-label">
													Zip Code <span class="symbol required"></span>
												</label>
												<input class="form-control" type="text" name="zipcode2" id="zipcode2">
											</div>
										</div>
										<div class="col-md-8">
											<div class="form-group">
												<label class="control-label">
													City <span class="symbol required"></span>
												</label>
												<input class="form-control tooltips" type="text" data-original-title="We'll display it when you write reviews" data-rel="tooltip"  title="" data-placement="top" name="city2" id="city2">
											</div>
										</div>
									</div>
								</div>
							</div>


					</div>
					<div class="panel-footer">

						<div class="row">
							<div class="col-md-8">
								<p>
									By clicking REGISTER, you are agreeing to the Policy and Terms &amp; Conditions.
								</p>
							</div>
							<div class="col-md-4">
								<button class="btn btn-primary btn-block" type="submit">
									Register <i class="fa fa-arrow-circle-right"></i>
								</button>
							</div>
						</div>

					</div>
				</form>
			</div><!-- end panel -->
		</div><!-- end .col-md-6 -->

	</div><!-- end col-md-12 -->
</div>