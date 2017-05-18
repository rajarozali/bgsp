<div id="content">
	<div id="sortable-panel" class="">

		<div id="titr-content" class="col-md-12">
			<h2>Form Plugins</h2>
			<h5>Anythings that related to form...</h5>
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
						X-editable
						<div class="bars pull-right">
							<a href="#"><i class="maximum fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="Maximize"></i></a>
							<a href="#"><i class="minimize fa fa-chevron-down" data-toggle="tooltip" data-placement="bottom" title="Collapse"></i></a>
							<a href="#"><i data-target="#panel2" data-dismiss="alert" data-toggle="tooltip" data-placement="bottom" title="Close" class="fa fa-times"></i></a>
						</div>
					</div>
				</div>
				<div class="panel-body">

					<table id="user" class="table table-bordered table-striped" style="clear: both">
						<tbody>
							<tr>
								<td style="width:35%;">Simple text field</td>
								<td style="width:65%"><a href="#" class="editable" id="username" data-type="text" data-pk="1" data-original-title="Enter username">superuser</a></td>
							</tr>
							<tr>
								<td>Empty text field, required</td>
								<td><a class="editable" href="#" id="firstname" data-type="text" data-pk="1" data-placement="right" data-placeholder="Required" data-original-title="Enter your firstname"></a></td>
							</tr>
							<tr>
								<td>Select, local array, custom display</td>
								<td><a href="#" id="sex" data-type="select" data-pk="1" data-value="" data-original-title="Select sex"></a></td>
							</tr>
							<tr>
								<td>Select, remote array, no buttons</td>
								<td><a href="#" id="group" data-type="select" data-pk="1" data-value="5" data-source="/groups" data-original-title="Select group">Admin</a></td>
							</tr>
							<tr>
								<td>Select, error while loading</td>
								<td><a href="#" id="status" data-type="select" data-pk="1" data-value="0" data-source="/status" data-original-title="Select status">Active</a></td>
							</tr>

							<tr>
								<td>Datepicker</td>
								<td><a href="#" id="vacation" class="editablemoment" data-type="date" data-viewformat="dd.mm.yyyy" data-pk="1" data-placement="right" data-original-title="When you want vacation to start?">25.02.2013</a></td>
							</tr>
							<tr>
								<td>Combodate (date)</td>
								<td><a href="#" id="dob" class="editablemoment" data-type="combodate" data-value="1984-05-15" data-format="YYYY-MM-DD" data-viewformat="DD/MM/YYYY" data-template="D / MMM / YYYY" data-pk="1" data-original-title="Select Date of birth"></a></td>
							</tr>
							<tr>
								<td>Combodate (datetime)</td>
								<td><a href="#" id="event" class="editablemoment" data-type="combodate" data-template="D MMM YYYY  HH:mm" data-format="YYYY-MM-DD HH:mm" data-viewformat="MMM D, YYYY, HH:mm" data-pk="1" data-original-title="Setup event date and time"></a></td>
							</tr>

							<tr>
								<td>Textarea, buttons below. Submit by <i>ctrl+enter</i></td>
								<td><a href="#" id="comments" data-type="textarea" data-pk="1" data-placeholder="Your comments here..." data-original-title="Enter comments">awesome user!</a></td>
							</tr>

							<tr>
								<td>Twitter typeahead.js</td>
								<td><a href="#" id="state2" class="editabletypeahead" data-type="typeaheadjs" data-pk="1" data-placement="right" data-original-title="Start typing State.."></a></td>
							</tr>

							<tr>
								<td>Checklist</td>
								<td><a href="#" id="fruits" data-type="checklist" data-value="2,3" data-original-title="Select fruits"></a></td>
							</tr>

							<tr>
								<td>Select2 (tags mode)</td>
								<td><a href="#" id="tags" data-type="select2" data-pk="1" data-original-title="Enter tags">html, javascript</a></td>
							</tr>

							<tr>
								<td>Select2 (dropdown mode)</td>
								<td><a href="#" id="country" data-type="select2" data-pk="1" data-select-search="true" data-value="BS" data-original-title="Select country"></a></td>
							</tr>

							<tr>
								<td>Custom input, several fields</td>
								<td><a href="#" id="address" data-type="address" data-pk="1" data-original-title="Please, fill address"></a></td>
							</tr>
							<tr>
								<td>Notes <a id="pencil" href="#"><i class="fa fa-pencil"></i> [edit]</a>
								<br>
								<span class="text-muted">Wysihtml5 (bootstrap only).
									<br>
									Toggle by another element</span></td>
								<td>
								<div data-original-title="Enter notes" data-toggle="manual" data-type="wysihtml5" data-pk="1" id="note" class="editable editablewysihtml5" tabindex="-1" style="display: block;">
									<h3>WYSIWYG</h3>
									WYSIWYG means <i>What You See Is What You Get</i>.
									<br>
									But may also refer to:
									<ul>
										<li>
											WYSIWYG (album), a 2000 album by Chumbawamba
										</li>
										<li>
											"Whatcha See is Whatcha Get", a 1971 song by The Dramatics
										</li>
										<li>
											WYSIWYG Film Festival, an annual Christian film festival
										</li>
									</ul>
									<i>Source:</i>
									<a href="http://en.wikipedia.org/wiki/WYSIWYG_%28disambiguation%29">
										wikipedia.org
									</a>
								</div></td>
							</tr>
						</tbody>
					</table>


				</div>
				<div class="panel-footer">
					<textarea id="console" style="width:100%"  rows="6"></textarea>
				</div>
			</div><!-- end panel -->
		</div><!-- end .col-md-12 -->

		<div class="col-md-6">
			<div class="col-md-12 layout no-padding">
				<div  class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">
							<i class="fa fa-edit"></i>
							File Input
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

						<fieldset>
							<legend>
								File Input
							</legend>

							<label>File input widgets 1</label>
							<div class="fileinput fileinput-new input-group" data-provides="fileinput">
								<div class="form-control" data-trigger="fileinput"><i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span></div>
								<span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span><span class="fileinput-exists">Change</span><input class="jasny" type="file" name="..."></span>
								<a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
							</div>

							<br>
							<label>Image upload widgets</label><br>
							<div class="fileinput fileinput-new" data-provides="fileinput">
								<div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
									<img data-src="holder.js/100%x100%" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxOTAiIGhlaWdodD0iMTQwIj48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI2VlZSIvPjx0ZXh0IHRleHQtYW5jaG9yPSJtaWRkbGUiIHg9Ijk1IiB5PSI3MCIgc3R5bGU9ImZpbGw6I2FhYTtmb250LXdlaWdodDpib2xkO2ZvbnQtc2l6ZToxMnB4O2ZvbnQtZmFtaWx5OkFyaWFsLEhlbHZldGljYSxzYW5zLXNlcmlmO2RvbWluYW50LWJhc2VsaW5lOmNlbnRyYWwiPjE5MHgxNDA8L3RleHQ+PC9zdmc+" alt="...">
								</div>
								<div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
								<div>
									<span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span><span class="fileinput-exists">Change</span><input class="jasny" type="file" name="..."></span>
									<a href="#" class="btn btn-danger fileinput-exists" data-dismiss="fileinput">Remove</a>
								</div>
							</div>

						</fieldset>
					</div>

				</div><!-- end panel -->
			</div><!-- end .col-md-12 -->

			<div class="col-md-12 layout no-padding">
				<div  class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">
							<i class="fa fa-tachometer"></i>
							Knob Input
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

							<div class="yep-knob">

								<input class="knob" data-width="75" data-displayPrevious=true data-fgColor="#c99d00" data-skin="tron" data-cursor=true value="75" data-thickness=".2">
							</div>
							<div class="yep-knob" >

								<input class="knob" data-width="150" data-displayPrevious=true data-fgColor="#000" data-skin="tron" data-thickness=".2" value="75">
							</div>
							<div class="yep-knob" >

								<input class="knob" data-width="150" data-angleOffset="180" data-fgColor="#0085ff" data-skin="tron" data-thickness=".1" value="35">
							</div>

					</div>
					<div class="panel-footer">
						<button class="btn btn-primary "><i class="fa fa-save"></i> Save</button>
						<button class="btn btn-default ">Reset</button>
					</div>
				</div><!-- end panel -->
			</div><!-- end .col-md-12 -->


			<div class="col-md-12 layout no-padding">
				<div  class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">
							<i class="fa fa-calendar"></i>
							Pickers
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

						<fieldset>
							<legend>
								Date Picker (Jquery UI)
							</legend>

							<div class="row">
								<div class="col-sm-12">
									<div class="form-group">
										<label>Select a date (single):</label>
										<div class="input-group">
											<input type="text" name="mydate" placeholder="Select a date" class="form-control datepicker" data-dateformat="dd/mm/yy">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										</div>
									</div>
								</div>

								<div class="col-sm-12">
									<label>Select a date (range):</label>
								</div>
								<div class="col-sm-6">

									<div class="form-group">
										<div class="input-group">
											<input class="form-control" id="from" type="text" placeholder="From">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										</div>
									</div>

								</div>
								<div class="col-sm-6">

									<div class="form-group">
										<div class="input-group">
											<input class="form-control" id="to" type="text" placeholder="Select a date">
											<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
										</div>
									</div>

								</div>

							</div>
						</fieldset>

						<fieldset>
							<legend>
								Bootstrap Timepicker
							</legend>

							<div class="row">

								<div class="col-sm-12">
									<div class="row">

										<div class="col-sm-12">
											<div class="form-group">
												<label>Timepicker (default):</label>
												<div class="input-group">
													<input class="form-control timepicker" id="timepicker" type="text" placeholder="Select time">
													<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
												</div>
											</div>
										</div>

									</div>
								</div>

							</div>
						</fieldset>

						<fieldset>
							<legend>
								Clockpicker
							</legend>

							<div class="row">

								<div class="col-sm-12">
									<div class="row">

										<div class="col-sm-12">
											<div class="form-group">
												<label>Clockpicker:</label>
												<div class="input-group">
													<input class="form-control clockpicker" id="clockpicker" type="text" placeholder="Select time" data-autoclose="true">
													<span class="input-group-addon"><i class="fa fa-clock-o"></i></span>
												</div>
											</div>
										</div>

									</div>
								</div>

							</div>
						</fieldset>

						<fieldset>
							<legend>
								Color Pickers
							</legend>

							<div class="row">

								<div class="col-sm-6">

									<div class="form-group">
										<label>Color Picker (HEX)</label>
										<input class="form-control colorpicker" id="colorpicker-1" type="text" value="#8fff00">
									</div>

								</div>
								<div class="col-sm-6">
									<label>Color Picker (RGBA)</label>
									<div class="input-group colorpicker" id="colorpicker-2">
										<input type="text" value="#5e0c0c" class="form-control" />
										<span class="input-group-addon"><i></i></span>
									</div>
								</div>
							</div>
						</fieldset>

					</div>
					<div class="panel-footer">
						<button class="btn btn-primary "><i class="fa fa-save"></i> Submit</button>
						<button class="btn btn-default ">Reset</button>
					</div>

				</div><!-- end panel -->
			</div><!-- end .col-md-12 -->
		</div>
		<!-- end .col-md-6 -->


		<div class="col-md-6 ">
			<div class="col-md-12 layout no-padding">
				<div  class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">
							<i class="fa fa-edit"></i>
							Jasny Input Masking
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
						<p class="alert alert-info text-align-center">
							USAGE: &lt;input type=&quot;text&quot; <strong>data-mask=&quot;99/99/9999&quot; data-placeholder= &quot;-&quot;&gt;</strong>
						</p>

						<form>

							<fieldset>
								<legend>
									Input Masking made easier!
								</legend>

								<div class="form-group">
									<label>Date masking</label>
									<div class="input-group">
										<input type="text" class="form-control jasny" data-mask="99/99/9999" data-placeholder= "-">
										<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
									</div>
									<p class="note">
										Data format **/**/****
									</p>
								</div>

								<div class="form-group">
									<label>Phone masking</label>
									<div class="input-group">
										<input type="text" class="form-control jasny" data-mask="(999) 999-9999" data-placeholder= "X">
										<span class="input-group-addon"><i class="fa fa-phone"></i></span>
									</div>
									<p class="note">
										Data format (XXX) XXX-XXXX
									</p>
								</div>

								<div class="form-group">
									<label>Credit card masking</label>
									<div class="input-group">
										<input type="text" class="form-control jasny" data-mask="9999-9999-9999-9999" data-placeholder= "*">
										<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
									</div>
									<p class="note">
										Data format ****-****-****-****
									</p>
								</div>

								<div class="form-group">
									<label>Serial number masking</label>
									<div class="input-group">
										<input type="text" class="form-control jasny" data-mask="***-***-***-***-***-***" data-placeholder= "_">
										<span class="input-group-addon"><i class="fa fa-asterisk"></i></span>
									</div>
									<p class="note">
										Data format ***-***-***-***-***-***
									</p>
								</div>

								<div class="form-group">
									<label>Tax ID masking</label>
									<div class="input-group">
										<input type="text" class="form-control jasny" data-mask="99-9999999" data-placeholder= "X">
										<span class="input-group-addon"><i class="fa fa-briefcase"></i></span>
									</div>
									<p class="note">
										Data format 99-9999999
									</p>
								</div>

							</fieldset>
						</form>

					</div>
					<div class="panel-footer">
						<button class="btn btn-primary "><i class="fa fa-save"></i> Submit</button>
						<button class="btn btn-default ">Reset</button>
					</div>
				</div><!-- end panel -->
			</div><!-- end .col-md-12 -->

			<div class="col-md-12 layout no-padding">
				<div  class="panel panel-default">
					<div class="panel-heading">
						<div class="panel-title">
							<i class="fa fa-edit"></i>
							Select Elements
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

						<fieldset>
							<legend>
								Standard Select
							</legend>
							<div class="row">

								<div class="col-sm-12">
									<div class="form-group">
										<select class="form-control">
											<option value="1">Administrator</option>
											<option value="1">Guest</option>
											<option value="1">Power User</option>
											<option value="1">Support User</option>
										</select>
									</div>
								</div>

							</div>

						</fieldset>

						<fieldset>
							<legend>
								Select 2
							</legend>

							<div class="form-group">
								<label>Select2 Plugin (select)</label>
								<select style="width:100%" class="select2">
									<optgroup label="Alaskan/Hawaiian Time Zone">
										<option value="AK">Alaska</option>
										<option value="HI">Hawaii</option>
									</optgroup>
									<optgroup label="Pacific Time Zone">
										<option value="CA">California</option>
										<option value="NV">Nevada</option>
										<option value="OR">Oregon</option>
										<option value="WA">Washington</option>
									</optgroup>
									<optgroup label="Mountain Time Zone">
										<option value="AZ">Arizona</option>
										<option value="CO">Colorado</option>
										<option value="ID">Idaho</option>
										<option value="MT">Montana</option><option value="NE">Nebraska</option>
										<option value="NM">New Mexico</option>
										<option value="ND">North Dakota</option>
										<option value="UT">Utah</option>
										<option value="WY">Wyoming</option>
									</optgroup>
									<optgroup label="Central Time Zone">
										<option value="AL">Alabama</option>
										<option value="AR">Arkansas</option>
										<option value="IL">Illinois</option>
										<option value="IA">Iowa</option>
										<option value="KS">Kansas</option>
										<option value="KY">Kentucky</option>
										<option value="LA">Louisiana</option>
										<option value="MN">Minnesota</option>
										<option value="MS">Mississippi</option>
										<option value="MO">Missouri</option>
										<option value="OK">Oklahoma</option>
										<option value="SD">South Dakota</option>
										<option value="TX">Texas</option>
										<option value="TN">Tennessee</option>
										<option value="WI">Wisconsin</option>
									</optgroup>
									<optgroup label="Eastern Time Zone">
										<option value="CT">Connecticut</option>
										<option value="DE">Delaware</option>
										<option value="FL">Florida</option>
										<option value="GA">Georgia</option>
										<option value="IN">Indiana</option>
										<option value="ME">Maine</option>
										<option value="MD">Maryland</option>
										<option value="MA">Massachusetts</option>
										<option value="MI">Michigan</option>
										<option value="NH">New Hampshire</option><option value="NJ">New Jersey</option>
										<option value="NY">New York</option>
										<option value="NC">North Carolina</option>
										<option value="OH">Ohio</option>
										<option value="PA">Pennsylvania</option><option value="RI">Rhode Island</option><option value="SC">South Carolina</option>
										<option value="VT">Vermont</option><option value="VA">Virginia</option>
										<option value="WV">West Virginia</option>
									</optgroup>
								</select>
								<p></p>
								<p class="alert alert-info text-align-center">
									<strong>Usage:</strong> &lt;select style=&quot;width:100%&quot; class=&quot;select2&quot; &quot;&gt;...&lt;/select&gt;
								</p>
							</div>

							<div class="form-group">
								<label>Select2 Plugin (multi-select)</label>
								<select multiple style="width:100%" class="select2">
									<optgroup label="Alaskan/Hawaiian Time Zone">
										<option value="AK">Alaska</option>
										<option value="HI">Hawaii</option>
									</optgroup>
									<optgroup label="Pacific Time Zone">
										<option value="CA">California</option>
										<option value="NV" selected="selected">Nevada</option>
										<option value="OR">Oregon</option>
										<option value="WA">Washington</option>
									</optgroup>
									<optgroup label="Mountain Time Zone">
										<option value="AZ">Arizona</option>
										<option value="CO">Colorado</option>
										<option value="ID">Idaho</option>
										<option value="MT" selected="selected">Montana</option><option value="NE">Nebraska</option>
										<option value="NM">New Mexico</option>
										<option value="ND">North Dakota</option>
										<option value="UT">Utah</option>
										<option value="WY">Wyoming</option>
									</optgroup>
									<optgroup label="Central Time Zone">
										<option value="AL">Alabama</option>
										<option value="AR">Arkansas</option>
										<option value="IL">Illinois</option>
										<option value="IA">Iowa</option>
										<option value="KS">Kansas</option>
										<option value="KY">Kentucky</option>
										<option value="LA">Louisiana</option>
										<option value="MN">Minnesota</option>
										<option value="MS">Mississippi</option>
										<option value="MO">Missouri</option>
										<option value="OK">Oklahoma</option>
										<option value="SD">South Dakota</option>
										<option value="TX">Texas</option>
										<option value="TN">Tennessee</option>
										<option value="WI">Wisconsin</option>
									</optgroup>
									<optgroup label="Eastern Time Zone">
										<option value="CT">Connecticut</option>
										<option value="DE">Delaware</option>
										<option value="FL">Florida</option>
										<option value="GA">Georgia</option>
										<option value="IN">Indiana</option>
										<option value="ME">Maine</option>
										<option value="MD">Maryland</option>
										<option value="MA">Massachusetts</option>
										<option value="MI" selected="selected">Michigan</option>
										<option value="NH">New Hampshire</option>
										<option value="NJ">New Jersey</option>
										<option value="NY">New York</option>
										<option value="NC">North Carolina</option>
										<option value="OH">Ohio</option>
										<option value="PA">Pennsylvania</option>
										<option value="RI">Rhode Island</option>
										<option value="SC">South Carolina</option>
										<option value="VT">Vermont</option>
										<option value="VA">Virginia</option>
										<option value="WV">West Virginia</option>
									</optgroup>
								</select>

								<p></p>
								<p class="alert alert-info text-align-center">
									<strong>Usage:</strong> &lt;select multiple style=&quot;width:100%&quot; class=&quot;select2&quot; &gt;...&lt;/select&gt;
								</p>
							</div>

						</fieldset>


						<fieldset>
							<legend>
								Tags
							</legend>

							<div class="row">

								<div class="col-sm-12">
									<div class="form-group">
										<label>Type and enter to add tag</label>
										<input class="form-control tagsinput" value="Amsterdam,Washington,Sydney,Beijing,Cairo" data-role="tagsinput">
									</div>
								</div>

							</div>

						</fieldset>

					</div>
					<div class="panel-footer">
						<button class="btn btn-primary "><i class="fa fa-save"></i> Submit</button>
						<button class="btn btn-default ">Reset</button>
					</div>
				</div><!-- end panel -->
			</div><!-- end .col-md-12 -->
		</div>

	</div>
</div>