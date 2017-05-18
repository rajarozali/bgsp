
					<div id="content">
						<!-- if you want active dragable panel, you should add #sortable-panel. handler drag-drop configured on .panel -->
						<div  class="">

							<div id="titr-content" class="col-md-12">
								<h2>Tab & Accordian</h2>
								<h5>Common tabs & accordion elements...</h5>
								<div class="actions">
									<button class="btn btn-success ">Add new</button>
									<button class="btn btn-default ">Options</button>
								</div>
							</div>
						
							<div class="col-md-6 layout no-padding">
								<div class="col-md-12 ">												
									<div class="panel with-nav-tabs panel-default">
										<div class="panel-heading">
											<div class="panel-title">												
												<div class="bars pull-right">
													<a href="#"><i class="maximum fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="Maximize"></i></a>
													<a href="#"><i class="minimize fa fa-chevron-down" data-toggle="tooltip" data-placement="bottom" title="Collapse"></i></a>
													<a href="#"><i data-target="#panel2" data-dismiss="alert" data-toggle="tooltip" data-placement="bottom" title="Close" class="fa fa-times"></i></a>
												</div>
											</div>
											<ul class="nav nav-tabs">
												<li class="active">
													<a href="#tab1default" data-toggle="tab">															
														<i class="fa fa-home success"></i>
														Home
													</a>
												</li>
												<li>
													<a href="#tab2default" data-toggle="tab">
														<i class="fa fa-dashboard primary"></i>
														Profile																														
													</a>
												</li>
												<li>
													<a href="#tab3default" data-toggle="tab">
														<span class="badge badge-danger">4</span>
														Message
														
													</a>
												</li>
												<li class="dropdown">
													<a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
													<ul class="dropdown-menu multi-level" role="menu">
														<li><a href="#tab4default" data-toggle="tab">Default 4</a></li>
														<li><a href="#tab5default" data-toggle="tab">Default 5</a></li>
													</ul>
												</li>
											</ul>
										</div>
										<div class="panel-body">
											<div class="tab-content">
												<div class="tab-pane fade in active" id="tab1default">
													for this style use <code>.with-nav-tabs</code> class in <code>.panel</code>
												</div>
												<div class="tab-pane fade" id="tab2default">Default 2</div>
												<div class="tab-pane fade" id="tab3default">Default 3</div>
												<div class="tab-pane fade" id="tab4default">Default 4</div>
												<div class="tab-pane fade" id="tab5default">Default 5</div>
											</div>
										</div>
									</div><!-- end panel -->
								</div><!-- end .col-md-12 -->								

								<div class="col-md-12 ">
									<h4><i class="fa fa-th-list"></i> Accordions </h4>
									<div class="panel-group yep-accordion" id="accordion">
										<div class="panel panel-default">
											<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#collapseOne">
												<h4 class="panel-title">
													<a class="accordion-toggle"> 
														<i class="indicator fa fa-lg fa-angle-up pull-right"></i> 
														Collapsible Group Item #1 
													</a>
												</h4>
											</div>
											<div id="collapseOne" class="panel-collapse collapse in">
												<div class="panel-body">
													To use a Yep Standard Accordions you should use <code>.yep-accordion</code>  in <code>div.panel-group</code><br><br><br><br>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#collapseTwo" >
												<h4 class="panel-title">
													<a  class="collapsed"> 
														<i class="fa fa-lg fa-angle-down pull-right"></i> 
														Collapsible Group Item #2 
													</a>
												</h4>
											</div>
											<div id="collapseTwo" class="panel-collapse collapse">
												<div class="panel-body">
													Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#collapseThree" >
												<h4 class="panel-title" >
													<a class="collapsed"> 
														<i class="fa fa-lg fa-angle-down pull-right"></i> 
														Collapsible Group Item #3 
													</a>
												</h4>
											</div>
											<div id="collapseThree" class="panel-collapse collapse">
												<div class="panel-body">
													Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
												</div>
											</div>
										</div>
									</div>
								</div><!-- end .col-md-12 -->										
								
								<div class="col-md-12 ">
									<h4><i class="fa fa-th-list"></i> Accordions without padding</h4>
									<div class="panel-group yep-accordion no-padding" id="accordion2">
										<div class="panel panel-default">
											<div class="panel-heading" data-toggle="collapse" data-parent="#accordion2" data-target="#collapseA">
												<h4 class="panel-title">
													<a class="accordion-toggle" > 
														<i class="indicator fa fa-lg fa-angle-up pull-right"></i> 
														Collapsible Group Item #1 
													</a>
												</h4>
											</div>
											<div id="collapseA" class="panel-collapse collapse in">
												<div class="panel-body">
													To use a Accordions without padding and space  you should use <code>.yep-accordion</code> ,<code>.no-padding</code> in <code>div.panel-group</code><br><br><br>
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading" data-toggle="collapse" data-parent="#accordion2" data-target="#collapseB" >
												<h4 class="panel-title">
													<a class="collapsed"> 
														<i class="fa fa-lg fa-angle-down pull-right"></i>
														 Collapsible Group Item #2 
													</a>
												</h4>
											</div>
											<div id="collapseB" class="panel-collapse collapse">
												<div class="panel-body">
													Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
												</div>
											</div>
										</div>
										<div class="panel panel-default">
											<div class="panel-heading" data-toggle="collapse" data-parent="#accordion2" data-target="#collapseC" >
												<h4 class="panel-title">
													<a class="collapsed"> 
														<i class="fa fa-lg fa-angle-down pull-right"></i>
														 Collapsible Group Item #3 
													</a>
												</h4>
											</div>
											<div id="collapseC" class="panel-collapse collapse">
												<div class="panel-body">
													Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
												</div>
											</div>
										</div>
									</div>
								</div><!-- end .col-md-12 -->

								<div class="col-md-12">
									<div  class="panel panel-default">
										<div class="panel-heading">
											<div class="panel-title">
												<i class="fa fa-th-large"></i>
												Pills
												<div class="bars pull-right">
													<a href="#"><i class="maximum fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="Maximize"></i></a>
													<a href="#"><i class="minimize fa fa-chevron-down" data-toggle="tooltip" data-placement="bottom" title="Collapse"></i></a>
													<a href="#"><i data-target="#panel2" data-dismiss="alert" data-toggle="tooltip" data-placement="bottom" title="Close" class="fa fa-times"></i></a>
												</div>
											</div>
										</div>
										<div class="panel-body">
											<p>Pills are also vertically stackable. Just add <code>.nav-stacked</code>.</p>													
											<ul class="nav nav-pills  nav-stacked">
												<li role="presentation" class="active"><a href="#">Home</a></li>
												<li role="presentation"><a href="#">Profile</a></li>
												<li role="presentation"><a href="#">Messages</a></li>
											</ul>
										</div>												
									</div><!-- end panel -->											
								</div>

								<div class="col-md-12 ">
									<div class="panel with-nav-tabs panel-primary">
										<div class="panel-heading">
											<h3 class="panel-title">												
												
											</h3>
											<ul class="nav nav-tabs">
												<li class="active">
													<a href="#tab1primary" data-toggle="tab">														
														Home
													</a>
												</li>
												<li>
													<a href="#tab2primary" data-toggle="tab">														
														Profile																														
													</a>
												</li>
												<li>
													<a href="#tab3primary" data-toggle="tab">														
														Message														
													</a>
												</li>
												<li class="dropdown">
													<a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
													<ul class="dropdown-menu multi-level" role="menu">
														<li><a href="#tab4primary" data-toggle="tab">Default 4</a></li>
														<li><a href="#tab5primary" data-toggle="tab">Default 5</a></li>
													</ul>
												</li>
											</ul>
										</div>
										<div class="panel-body">
											<div class="tab-content">
												<div class="tab-pane fade in active" id="tab1primary">
													for this style use <code>.with-nav-tabs</code> class in <code>.panel</code>
													<br>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, doloribus, animi, qui tenetur maxime cum iste ex natus facilis laudantium eos repellendus quod officiis quas a molestiae at aliquid! Assumenda!
												</div>
												<div class="tab-pane fade" id="tab2primary">Default 2</div>
												<div class="tab-pane fade" id="tab3primary">Default 3</div>
												<div class="tab-pane fade" id="tab4primary">Default 4</div>
												<div class="tab-pane fade" id="tab5primary">Default 5</div>
											</div>
										</div>
									</div><!-- end panel -->
								</div><!-- end .col-md-12 -->

								<div class="col-md-12 ">
									<div class="panel with-nav-tabs panel-info">
										<div class="panel-heading">
											<h3 class="panel-title">												
												
											</h3>
											<ul class="nav nav-tabs">
												<li class="active">
													<a href="#tab1info" data-toggle="tab">														
														Home
													</a>
												</li>
												<li>
													<a href="#tab2info" data-toggle="tab">														
														Profile																														
													</a>
												</li>
												<li>
													<a href="#tab3info" data-toggle="tab">														
														Message														
													</a>
												</li>
												<li class="dropdown">
													<a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
													<ul class="dropdown-menu multi-level" role="menu">
														<li><a href="#tab4info" data-toggle="tab">Default 4</a></li>
														<li><a href="#tab5info" data-toggle="tab">Default 5</a></li>
													</ul>
												</li>
											</ul>
										</div>
										<div class="panel-body">
											<div class="tab-content">
												<div class="tab-pane fade in active" id="tab1info">
													for this style use <code>.with-nav-tabs</code> class in <code>.panel</code>
													<br>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, doloribus, animi, qui tenetur maxime cum iste ex natus facilis laudantium eos repellendus quod officiis quas a molestiae at aliquid! Assumenda!
												</div>
												<div class="tab-pane fade" id="tab2info">Default 2</div>
												<div class="tab-pane fade" id="tab3info">Default 3</div>
												<div class="tab-pane fade" id="tab4info">Default 4</div>
												<div class="tab-pane fade" id="tab5info">Default 5</div>
											</div>
										</div>
									</div><!-- end panel -->
								</div><!-- end .col-md-12 -->
						
								<div class="col-md-12 ">
									<div class="panel with-nav-tabs panel-success">
										<div class="panel-heading">
											<h3 class="panel-title">												
												
											</h3>
											<ul class="nav nav-tabs">
												<li class="active">
													<a href="#tab1success" data-toggle="tab">														
														Home
													</a>
												</li>
												<li>
													<a href="#tab2success" data-toggle="tab">														
														Profile																														
													</a>
												</li>
												<li>
													<a href="#tab3success" data-toggle="tab">														
														Message														
													</a>
												</li>
												<li class="dropdown">
													<a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
													<ul class="dropdown-menu multi-level" role="menu">
														<li><a href="#tab4success" data-toggle="tab">Default 4</a></li>
														<li><a href="#tab5success" data-toggle="tab">Default 5</a></li>
													</ul>
												</li>
											</ul>
										</div>
										<div class="panel-body">
											<div class="tab-content">
												<div class="tab-pane fade in active" id="tab1success">
													for this style use <code>.with-nav-tabs</code> class in <code>.panel</code>
													<br>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, doloribus, animi, qui tenetur maxime cum iste ex natus facilis laudantium eos repellendus quod officiis quas a molestiae at aliquid! Assumenda!
												</div>
												<div class="tab-pane fade" id="tab2success">Default 2</div>
												<div class="tab-pane fade" id="tab3success">Default 3</div>
												<div class="tab-pane fade" id="tab4success">Default 4</div>
												<div class="tab-pane fade" id="tab5success">Default 5</div>
											</div>
										</div>
									</div><!-- end panel -->
								</div><!-- end .col-md-12 -->

								<div class="col-md-12 ">
									<div class="panel with-nav-tabs panel-warning">
										<div class="panel-heading">
											<h3 class="panel-title">												
												
											</h3>
											<ul class="nav nav-tabs">
												<li class="active">
													<a href="#tab1warning" data-toggle="tab">														
														Home
													</a>
												</li>
												<li>
													<a href="#tab2warning" data-toggle="tab">														
														Profile																														
													</a>
												</li>
												<li>
													<a href="#tab3warning" data-toggle="tab">														
														Message														
													</a>
												</li>
												<li class="dropdown">
													<a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
													<ul class="dropdown-menu multi-level" role="menu">
														<li><a href="#tab4warning" data-toggle="tab">Default 4</a></li>
														<li><a href="#tab5warning" data-toggle="tab">Default 5</a></li>
													</ul>
												</li>
											</ul>
										</div>
										<div class="panel-body">
											<div class="tab-content">
												<div class="tab-pane fade in active" id="tab1warning">
													for this style use <code>.with-nav-tabs</code> class in <code>.panel</code>
													<br>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, doloribus, animi, qui tenetur maxime cum iste ex natus facilis laudantium eos repellendus quod officiis quas a molestiae at aliquid! Assumenda!
												</div>
												<div class="tab-pane fade" id="tab2warning">Default 2</div>
												<div class="tab-pane fade" id="tab3warning">Default 3</div>
												<div class="tab-pane fade" id="tab4warning">Default 4</div>
												<div class="tab-pane fade" id="tab5warning">Default 5</div>
											</div>
										</div>
									</div><!-- end panel -->
								</div><!-- end .col-md-12 -->

								<div class="col-md-12 ">
									<div class="panel with-nav-tabs panel-danger">
										<div class="panel-heading">
											<h3 class="panel-title">												
												
											</h3>
											<ul class="nav nav-tabs">
												<li class="active">
													<a href="#tab1danger" data-toggle="tab">														
														Home
													</a>
												</li>
												<li>
													<a href="#tab2danger" data-toggle="tab">														
														Profile																														
													</a>
												</li>
												<li>
													<a href="#tab3danger" data-toggle="tab">														
														Message														
													</a>
												</li>
												<li class="dropdown">
													<a href="#" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
													<ul class="dropdown-menu multi-level" role="menu">
														<li><a href="#tab4danger" data-toggle="tab">Default 4</a></li>
														<li><a href="#tab5danger" data-toggle="tab">Default 5</a></li>
													</ul>
												</li>
											</ul>
										</div>
										<div class="panel-body">
											<div class="tab-content">
												<div class="tab-pane fade in active" id="tab1danger">
													for this style use <code>.with-nav-tabs</code> class in <code>.panel</code>
													<br>
													Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, doloribus, animi, qui tenetur maxime cum iste ex natus facilis laudantium eos repellendus quod officiis quas a molestiae at aliquid! Assumenda!
												</div>
												<div class="tab-pane fade" id="tab2danger">Default 2</div>
												<div class="tab-pane fade" id="tab3danger">Default 3</div>
												<div class="tab-pane fade" id="tab4danger">Default 4</div>
												<div class="tab-pane fade" id="tab5danger">Default 5</div>
											</div>
										</div>
									</div><!-- end panel -->
								</div><!-- end .col-md-12 -->
							</div>

							<div class="col-md-6 layout no-padding">
								<div class="col-md-12 ">
									<div  class="panel panel-default ">												
										<div class="panel-body no-padding">												
											<div class="tabbable tabs-above ">
												<ul class="nav nav-tabs">
													<li class="active">
														<a href="#one" data-toggle="tab">
															<i class="fa fa-home success"></i> One
														</a>
													</li>
													<li>
														<a href="#two" data-toggle="tab">
															<i class="fa fa-dashboard primary"></i> Two
														</a>
													</li>
													<li>
														<a href="#twee" data-toggle="tab">
															<span class="badge badge-danger">4</span> Twee
														</a>
													</li>
													<li class="dropdown pull-right">
														<a href="#" data-toggle="dropdown"> <i class="fa fa-lg fa-cog"></i> <span class="caret"></span></a>
														<ul class="dropdown-menu multi-level" role="menu">
															<li><a href="#four" data-toggle="tab">Setting One</a></li>
															<li><a href="#five" data-toggle="tab">Setting Two</a></li>
														</ul>
													</li>
												</ul>
												<div class="tab-content padding-10 ">
													<div class="tab-pane active" id="one">
														<h4>Tabs Above</h4>
														<div class="alert alert-info">
															To use this type of Tabs you should use <code>.tabs-above</code> class with <code>.tabbable</code> class & <code>.no-padding</code> class with <code>.panel-body</code>
														</div>	
														<div class="alert alert-info">
															to use <code>.pull-right</code> class with <code>.dropdown</code> class
														</div>															
														Lorem ipsum dolor sit amet, charetra varius quam sit amet vulputate. 
														Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero.
													</div>
													<div class="tab-pane" id="two">Secondo sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
														Aliquam in felis sit amet augue.
													</div>
													<div class="tab-pane" id="twee">Thirdamuno, ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
														Quisque mauris augue, molestie tincidunt condimentum vitae.
													</div>
													<div class="tab-pane" id="four">
														<h4>Setting One</h4>
														Lorem ipsum dolor sit amet, charetra varius quam sit amet vulputate. 
														Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero.
													</div>
													<div class="tab-pane" id="five">
														<h4>Setting Two</h4>
														Lorem ipsum dolor sit amet, charetra varius quam sit amet vulputate. 
														Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero.
													 </div>
												</div>
											</div>												
										</div>										
									</div><!-- end panel -->
								</div><!-- end .col-md-12 -->
								
								<div class="col-md-12 ">
									<div class="tabbable tabs-above bordered">
										<ul class="nav nav-tabs">
											<li class="active">
												<a href="#one11" data-toggle="tab">
													<i class="fa fa-home success"></i> One
												</a>
											</li>
											<li>
												<a href="#two22" data-toggle="tab">
													<i class="fa fa-dashboard primary"></i> Two
												</a>
											</li>
											<li>
												<a href="#twee33" data-toggle="tab">
													<span class="badge badge-danger">4</span> Twee
												</a>
											</li>
										</ul>
										<div class="tab-content padding-10 ">
											<div class="tab-pane active" id="one11">
												<h4>Tabs Above Standalone with Border</h4>
												<div class="alert alert-info">
													To use this type of Tabs you should use <code>.bordered</code> class with <code>.tabbable, tabs-*</code> class
												</div>																
												Lorem ipsum dolor sit amet, charetra varius quam sit amet vulputate. 
												Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero.
											</div>
											<div class="tab-pane" id="two22">Secondo sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
												Aliquam in felis sit amet augue.
											</div>
											<div class="tab-pane" id="twee33">Thirdamuno, ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
												Quisque mauris augue, molestie tincidunt condimentum vitae.
											</div>
										</div>
									</div>		
								</div><!-- end .col-md-12 -->

								<div class="col-md-12 ">
									<div  class="panel panel-default">
										<div class="panel-heading">
											<div class="panel-title">
												<i class="fa fa-file-text"></i>
												Tabs below
												<div class="bars pull-right">
													<a href="#"><i class="maximum fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="Maximize"></i></a>
													<a href="#"><i class="minimize fa fa-chevron-down" data-toggle="tooltip" data-placement="bottom" title="Collapse"></i></a>
													<a href="#"><i data-target="#panel2" data-dismiss="alert" data-toggle="tooltip" data-placement="bottom" title="Close" class="fa fa-times"></i></a>
												</div>
											</div>
										</div>
										<div class="panel-body no-padding">
											<div class="tabbable tabs-below">
												<div class="tab-content padding-10">
													<div class="tab-pane active" id="one_">
														<div class="alert alert-info">
															To use this type of Tabs you should use <code>.tabs-below</code> class with <code>.tabbable</code> class & <code>.no-padding</code> class with <code>.panel-body</code> class
														</div>																
														Lorem ipsum dolor sit amet, charetra varius quam sit amet vulputate. 
														Quisque mauris augue, molestie tincidunt condimentum vitae, gravida a libero.
													</div>
													<div class="tab-pane" id="two_">Secondo sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
														Aliquam in felis sit amet augue.
													</div>
													<div class="tab-pane" id="twee_">Thirdamuno, ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
														Quisque mauris augue, molestie tincidunt condimentum vitae. 
													</div>
												</div>
												<ul class="nav nav-tabs">
													<li class="active">
														<a href="#one_" data-toggle="tab">
															<span class="badge badge-danger">4</span> One
														</a>
													</li>
													<li>
														<a href="#two_" data-toggle="tab">
															<i class="fa fa-home primary"></i> Two
														</a>
													</li>
													<li>
														<a href="#twee_" data-toggle="tab">
															<i class="fa fa-dashboard success"></i> Twee
														</a>
													</li>
												</ul>
											</div>											
										</div>											
									</div><!-- end panel -->
								</div><!-- end .col-md-12 -->

								<div class="col-md-12 ">
									<div  class="panel panel-default">
										<div class="panel-heading">
											<div class="panel-title">
												<i class="fa fa-file-text"></i>
												Tabs left
												<div class="bars pull-right">
													<a href="#"><i class="maximum fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="Maximize"></i></a>
													<a href="#"><i class="minimize fa fa-chevron-down" data-toggle="tooltip" data-placement="bottom" title="Collapse"></i></a>
													<a href="#"><i data-target="#panel2" data-dismiss="alert" data-toggle="tooltip" data-placement="bottom" title="Close" class="fa fa-times"></i></a>
												</div>
											</div>
										</div>
										<div class="panel-body no-padding">
											<div class="tabbable tabs-left">
												<ul class="nav nav-tabs">
													<li>
														<a href="#a" data-toggle="tab">
															<i class="fa fa-home success"></i> One
														</a>
													</li>
													<li class="active">
														<a href="#b" data-toggle="tab">
															<i class="primary fa fa-user"></i> Two
														</a>
													</li>
													<li>
														<a href="#c" data-toggle="tab">
															<i class="primary fa fa-rocket"></i> Twee
														</a>
													</li>
												</ul>
												<div class="tab-content padding-10">
													<div class="tab-pane active" id="a">
														To use this type of Tabs you should use <code>.tabs-left</code> class with <code>.tabbable</code> class & <code>.no-padding</code> with <code>.panel-body</code> class
														
													</div>
													<div class="tab-pane" id="b">Secondo sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
														Aliquam in felis sit amet augue.
													</div>
													<div class="tab-pane" id="c">Thirdamuno, ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
														Quisque mauris augue, molestie tincidunt condimentum vitae. 
													</div>
												</div>
											</div>
											
										</div>											
									</div><!-- end panel -->
								</div><!-- end .col-md-12 -->
				
								<div class="col-md-12 ">
									<div  class="panel panel-default">										
										<div class="panel-body no-padding">
											<div class="tabbable tabs-right">
												<ul class="nav nav-tabs">
													<li class="active">
														<a href="#1" data-toggle="tab">
															 One <i class="fa fa-heart danger"></i>
														</a>
													</li>
													<li>
														<a href="#2" data-toggle="tab">
															Two <i class="fa fa-image primary"></i>
														</a>
													</li>
													<li>
														<a href="#3" data-toggle="tab">
															Twee <span class="badge badge-danger">4</span>
														</a>
													</li>
												</ul>
												<div class="tab-content padding-10">
													<div class="tab-pane active" id="1">
														<h4 class="bold">  Tab Right</h4>
														To use this type of Tabs you should use <code>.tabs-right</code> class with <code>.tabbable</code> class & <code>.no-padding</code> with <code>.panel-body</code> class													
													</div>
													<div class="tab-pane" id="2">Secondo sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
														Aliquam in felis sit amet augue.
													</div>
													<div class="tab-pane" id="3">Thirdamuno, ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
														Quisque mauris augue, molestie tincidunt condimentum vitae. 
													</div>
												</div>
											</div>
											
										</div>											
									</div><!-- end panel -->
								</div><!-- end .col-md-12 -->

								<div class="col-md-12 ">
									<div  class="panel panel-default">										
										<div class="panel-body ">
											<h4 class="bold"> Tab Line Justified</h4>
											<p>A justified line tab by adding class of <code>.nav-line</code></p>
											<br>
											<div class="tabbable ">
												<ul class="nav nav-tabs nav-line nav-justified">
													<li class="active">
														<a href="#line1" data-toggle="tab">
															Tab Line One 
														</a>
													</li>
													<li>
														<a href="#line2" data-toggle="tab">
															Tab Line Two
														</a>
													</li>
													<li>
														<a href="#line3" data-toggle="tab">
															Tab Line Three 
														</a>
													</li>
												</ul>
												<div class="tab-content padding-10">
													<div class="tab-pane active" id="line1">													
														Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, doloribus, animi, qui tenetur maxime cum iste ex natus facilis laudantium eos repellendus quod officiis quas a molestiae at aliquid! Assumenda!
													</div>
													<div class="tab-pane" id="line2">Secondo sed ac orci quis tortor imperdiet venenatis. Duis elementum auctor accumsan. 
														Aliquam in felis sit amet augue.
													</div>
													<div class="tab-pane" id="line3">Thirdamuno, ipsum dolor sit amet, consectetur adipiscing elit. Duis pharetra varius quam sit amet vulputate. 
														Quisque mauris augue, molestie tincidunt condimentum vitae. 
													</div>
												</div>
											</div>
											
										</div>											
									</div><!-- end panel -->
								</div><!-- end .col-md-12 -->

								<div class="col-md-12 ">
									<div  class="panel panel-default">										
										<div class="panel-body no-padding">											
											<div class="tabbable ">
												<ul class="nav nav-tabs nav-line nav-justified">
													<li class="active">
														<a href="#line11" data-toggle="tab">
															Tab Line One 
														</a>
													</li>
													<li>
														<a href="#line22" data-toggle="tab">
															Tab Line Two
														</a>
													</li>
													<li>
														<a href="#line33" data-toggle="tab">
															Tab Line Three 
														</a>
													</li>
												</ul>
												<div class="tab-content padding-10">
													<div class="tab-pane active" id="line11">	
														<h4 class="bold">Tab Line Justified</h4>												
														One Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, doloribus, animi, qui tenetur maxime cum iste ex natus facilis laudantium eos repellendus quod officiis quas a molestiae at aliquid! Assumenda!
													</div>
													<div class="tab-pane" id="line22">
														Two Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, doloribus, animi, qui tenetur maxime cum iste ex natus facilis laudantium eos repellendus quod officiis quas a molestiae at aliquid! Assumenda!
													</div>
													<div class="tab-pane" id="line33">
														Three Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, doloribus, animi, qui tenetur maxime cum iste ex natus facilis laudantium eos repellendus quod officiis quas a molestiae at aliquid! Assumenda!
													</div>
												</div>
											</div>
											
										</div>											
									</div><!-- end panel -->
								</div><!-- end .col-md-12 -->

								<div class="col-md-12 ">
									<div  class="panel panel-default">										
										<div class="panel-body no-padding">											
											<div class="tabbable ">
												<ul class="nav nav-tabs nav-line ">
													<li class="active">
														<a href="#lineOne" data-toggle="tab">
															Tab Line One 
														</a>
													</li>
													<li>
														<a href="#lineTwo" data-toggle="tab">
															Tab Line Two
														</a>
													</li>
													<li>
														<a href="#lineThree" data-toggle="tab">
															Tab Line Three 
														</a>
													</li>
												</ul>
												<div class="tab-content padding-10">
													<div class="tab-pane active" id="lineOne">													
														1-Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, doloribus, animi, qui tenetur maxime cum iste ex natus facilis laudantium eos repellendus quod officiis quas a molestiae at aliquid! Assumenda!
													</div>
													<div class="tab-pane" id="lineTwo">
														2- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, doloribus, animi, qui tenetur maxime cum iste ex natus facilis laudantium eos repellendus quod officiis quas a molestiae at aliquid! Assumenda!
													</div>
													<div class="tab-pane" id="lineThree">
														3- Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quae, doloribus, animi, qui tenetur maxime cum iste ex natus facilis laudantium eos repellendus quod officiis quas a molestiae at aliquid! Assumenda!
													</div>
												</div>
											</div>
											
										</div>											
									</div><!-- end panel -->
								</div><!-- end .col-md-12 -->

								<div class="col-md-12 ">
									<div  class="panel panel-default">
										<div class="panel-heading">
											<div class="panel-title">
												<i class="fa fa-file-text"></i>
												Default Panel 
												<div class="bars pull-right">
													<a href="#"><i class="maximum fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="Maximize"></i></a>
													<a href="#"><i class="minimize fa fa-chevron-down" data-toggle="tooltip" data-placement="bottom" title="Collapse"></i></a>
													<a href="#"><i data-target="#panel2" data-dismiss="alert" data-toggle="tooltip" data-placement="bottom" title="Close" class="fa fa-times"></i></a>
												</div>
											</div>
										</div>
										<div class="panel-body">
											
											
										</div>
										<div class="panel-footer">
											<button class="btn btn-primary ">Save Setting</button>
											<button class="btn btn-default ">Reset</button>
										</div>
									</div><!-- end panel -->
								</div><!-- end .col-md-12 -->
							</div>

						</div><!-- end col-md-12 -->
					</div>