<div id="content">
	<div id="sortable-panel" class="">

		<div id="titr-content" class="col-md-12">
			<h2>Nestable Lists</h2>
			<h5>Drag & drop hierarchical list...</h5>
			<div class="actions">
				<button class="btn btn-success ">Add new</button>
				<button class="btn btn-default ">Options</button>
			</div>
		</div>

		<div class="col-md-6 ">
			<div  class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<i class="fa fa-cube"></i>
						Draggable Handlers
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

					<div class="dd nestable" id="nestable2">
						<ol class="dd-list">
							<li class="dd-item dd3-item" data-id="13">
								<div class="dd-handle dd3-handle">
									Drag
								</div>
								<div class="dd3-content">
									Item 13

									<div class="pull-right">
										<div class="checkbox checkbox-primary">
											<input id="checkbox2" type="checkbox" checked="" >
											<label for="checkbox2">
												Primary
											</label>
										</div>
									</div>

								</div>
							</li>
							<li class="dd-item dd3-item" data-id="14">
								<div class="dd-handle dd3-handle">
									Drag
								</div>
								<div class="dd3-content">
									Item 14
									<i class="pull-right  fa fa-exclamation-triangle danger"></i>
								</div>
							</li>
							<li class="dd-item dd3-item" data-id="15">
								<div class="dd-handle dd3-handle">
									Drag
								</div>
								<div class="dd3-content">
									With a switch

									<span class="pull-right">

										<span class="onoffswitch">
											<input type="checkbox" name="start_interval" class="onoffswitch-checkbox" id="start_interval">
											<label class="onoffswitch-label" for="start_interval">
												<span class="onoffswitch-inner" data-swchon-text="ON" data-swchoff-text="OFF"></span>
												<span class="onoffswitch-switch"></span>
											</label>
										</span>
									</span>

								</div>
								<ol class="dd-list">
									<li class="dd-item dd3-item" data-id="16">
										<div class="dd-handle dd3-handle">
											Drag
										</div>
										<div class="dd3-content">
											Item 16
										</div>
									</li>
									<li class="dd-item dd3-item" data-id="17">
										<div class="dd-handle dd3-handle">
											Drag
										</div>
										<div class="dd3-content">
											Item 17
										</div>
									</li>
									<li class="dd-item dd3-item" data-id="18">
										<div class="dd-handle dd3-handle">
											Drag
										</div>
										<div class="dd3-content">
											Item 18
										</div>
									</li>
									<li class="dd-item dd3-item" data-id="19">
										<div class="dd-handle dd3-handle">
											Drag
										</div>
										<div class="dd3-content">
											Item 19
											<div class="pull-right action-buttons">
												<a class="blue" href="#">
													<i class=" fa fa-pencil "></i>
												</a>

												<a class="red" href="#">
													<i class=" fa fa-trash-o "></i>
												</a>
											</div>
										</div>
									</li>
									<li class="dd-item dd3-item" data-id="20">
										<div class="dd-handle dd3-handle">
											Drag
										</div>
										<div class="dd3-content">
											Item 20
										</div>
									</li>
								</ol>
							</li>
						</ol>
					</div>

				</div>
				<div id="nestable-menu-2" class="panel-footer" >
					<button class="btn btn-primary" data-action="expand-all">Expand All</button>
					<button class="btn btn-default" data-action="collapse-all">Collapse All</button>
				</div>
			</div><!-- end panel -->
		</div><!-- end .col-md-6 -->

		<div class="col-md-6 ">
			<div  class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<i class="fa fa-bars"></i>
						Nestable Default
						<div class="bars pull-right">
							<a href="#"><i class="maximum fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="Maximize"></i></a>
							<a href="#"><i class="minimize fa fa-chevron-down" data-toggle="tooltip" data-placement="bottom" title="Collapse"></i></a>
							<a href="#"><i data-target="#panel2" data-dismiss="alert" data-toggle="tooltip" data-placement="bottom" title="Close" class="fa fa-times"></i></a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<!-- nestable1 start -->
					<div class="dd nestable" id="nestable1">
						<ol class="dd-list">
							<li class="dd-item" data-id="1">
								<div class="dd-handle">Item 1</div>
								<em class="badge pull-right bg-color-purple">99</em>
							</li>
							<li class="dd-item" data-id="2">
								<div class="dd-handle">
									Item 2
									<div class="pull-right action-buttons">
										<a class="blue" href="#">
											<i class=" fa fa-pencil "></i>
										</a>

										<a class="red" href="#">
											<i class=" fa fa-trash-o "></i>
										</a>
									</div>
								</div>
								<ol class="dd-list">
									<li class="dd-item" data-id="3"><div class="dd-handle">Item 3</div></li>
									<li class="dd-item" data-id="4">
										<div class="dd-handle">Item 4</div>
										<ol class="dd-list">
											<li class="dd-item" data-id="5"><div class="dd-handle">
											Item 5
											<i class="pull-right fa fa-exclamation-triangle warning"></i>
											</div></li>
											<li class="dd-item" data-id="6"><div class="dd-handle">Item 6</div></li>
										</ol>
									</li>
									<li class="dd-item" data-id="7"><div class="dd-handle">Item 7</div></li>
								</ol>
							</li>
							<li class="dd-item" data-id="8">
								<div class="dd-handle">Item 8</div>
							</li>

						</ol>
					</div>
					<!-- nestable1 end -->
				</div>
				<div id="nestable-menu-1" class="panel-footer" >
					<button class="btn btn-primary" data-action="expand-all">Expand All</button>
					<button class="btn btn-default" data-action="collapse-all">Collapse All</button>
				</div>
			</div><!-- end panel -->
		</div><!-- end .col-md-6 -->

		<div class="col-md-12 ">
			<div  class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<i class="fa fa-file-text"></i>
						Serialised Output
						<div class="bars pull-right">
							<a href="#"><i class="maximum fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="Maximize"></i></a>
							<a href="#"><i class="minimize fa fa-chevron-down" data-toggle="tooltip" data-placement="bottom" title="Collapse"></i></a>
							<a href="#"><i data-target="#panel2" data-dismiss="alert" data-toggle="tooltip" data-placement="bottom" title="Close" class="fa fa-times"></i></a>
						</div>
					</div>
				</div>
				<div class="panel-body">
					<p><strong>Serialised Output (per list)</strong></p>

					<textarea id="nestable1-output"></textarea>
					<textarea id="nestable2-output"></textarea>
				</div>

			</div><!-- end panel -->
		</div><!-- end .col-md-12 -->

	</div><!-- end col-md-12 -->
</div>