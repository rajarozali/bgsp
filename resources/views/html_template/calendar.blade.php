<div id="content">
	<!-- if you want active dragable panel, you should add #sortable-panel. handler drag-drop configured on .panel -->
	<div  class="">

		<div id="titr-content" class="col-md-12">
			<h2>Calendar</h2>
			<h5>A full-sized drag & drop event calendar ...</h5>
			<div class="actions">
				<button class="btn btn-success ">Add new</button>
				<button class="btn btn-default ">Options</button>
			</div>
		</div>


		<div class="col-md-3 ">
			<div  class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						Draggable events
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
							<a href="#"><i data-target="#panel2" data-dismiss="alert" data-toggle="tooltip" data-placement="bottom" title="Close" class="fa fa-times"></i></a>
						</div>
					</div>
				</div>
				<div class="panel-body no-padding">

					<div id='external-events'>

						<div class='fc-event'>My Event 1</div>
						<div class='fc-event'>My Event 2</div>
						<div class='fc-event'>My Event 3</div>
						<div class='fc-event'>My Event 4</div>
						<div class='fc-event'>My Event 5</div>
						<p>
							<input type='checkbox' id='drop-remove' />
							<label for='drop-remove'>remove after drop</label>
						</p>
					</div>

				</div>

			</div><!-- end panel -->
		</div><!-- end .col-md-3 -->

		<div class="col-md-9 no-padding">
			<div  class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<i class="fa fa-calendar"></i>
						My Events
						<div class="bars pull-right">
							<a href="#"><i class="maximum fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="Maximize"></i></a>
							<a href="#"><i class="minimize fa fa-chevron-down" data-toggle="tooltip" data-placement="bottom" title="Collapse"></i></a>
							<a href="#"><i data-target="#panel2" data-dismiss="alert" data-toggle="tooltip" data-placement="bottom" title="Close" class="fa fa-times"></i></a>
						</div>
					</div>
				</div>
				<div class="panel-body">

					<div id="calendar" class="fcalendar"></div>
					<div style="clear:both"></div>

				</div>

			</div><!-- end panel -->
		</div><!-- end .col-md-9 -->

	</div><!-- end col-md-12 -->
</div>
