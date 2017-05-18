<div id="content">
	<!-- if you want active dragable panel, you should add #sortable-panel. handler drag-drop configured on .panel -->
	<div  class="">

		<div id="titr-content" class="col-md-12">
			<h2>jQuery Sparklines</h2>
			<h5>inline charts ...</h5>
			<div class="actions">
				<button class="btn btn-success ">Add new</button>
				<button class="btn btn-default ">Options</button>
			</div>
		</div>

		<div class="col-md-12 ">
			<div  class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						 <span id="bar2">
							<canvas ></canvas>
						</span>
						Inline Charts
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

						<div class="row">

							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
								<div class="well well-sm well-light">
									<h4>Pie <strong>Chart</strong> <a  class="pull-right"><i class="fa fa-refresh"></i></a></h4>
									<br>
									<div class="text-center">
										<div id="pie1" class="sparkline txt-color-blue display-inline">40,60,70</div>
										<div id="pie2" class="sparkline txt-color-blue display-inline">20,30,40</div>
									</div>

								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
								<div class="well well-sm well-light padding-10">
									<h4 >
										Composite <strong>Chart</strong>
										<a href="javascript:void(0);" class="pull-right ">
											<i class="fa fa-refresh"></i>
										</a>
									</h4>
									<br>
									<span id="compositeline-big" >4,1,5,7,9,9,8,7,6,6,4,7,8,4,3,2,2,5,6,7</span>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
								<div class="well well-sm well-light">
									<h4>Bar <strong >Chart</strong> <a href="javascript:void(0);" class="pull-right "><i class="fa fa-refresh"></i></a></h4>
									<br>
									<div id="bar-big" class="sparkline txt-color-blueLight text-center" >6,5,6,8,3,5,6,4,9,6,7,2,5,4,9,3</div>
								</div>
							</div>
							<div class="col-xs-12 col-sm-6 col-md-6 col-lg-3">
								<div class="well well-sm well-light">
									<h4>Bar <strong>Stacked Chart</strong> <a href="javascript:void(0);" class="pull-right"><i class="fa fa-refresh"></i></a></h4>
									<br>
									<div id="stacked-bar-big" class="sparkline txt-color-blue text-center" ></div>
								</div>
							</div>

						</div>

						<div class="row">
							<div class="col-sm-6">

								<ul>
									<li>

										Realtime chart generate by mouse speed
										<span id="mousespeed"></span>
										<p class="note">
											update display every 500ms. Please move your mouse to see change.
										</p>
									</li>
									<li>
										Inline
										<span id="inline" >5,6,7,9,9,5,3,2,2,4,6,7</span>
										& line graphs
										<span id="inline-graphs" >5,6,7,9,9,5,3,2,2,4,6,7</span>
										& Inline with normal range
										<span id="normalline">1,9,8,7,6,6,4,7,8,4,10,9,4</span>
										<p class="note">
											$("#inline").sparkline('html', {
												type: 'line',
												width: '40px'
											});
											<br>
											$("#inline-graphs").sparkline('html', {
												type: 'line',
												width: '100px'
											});
											<br>
											$('#normalline').sparkline('html', {
												fillColor: false,
												normalRangeMin: -1,
												normalRangeMax: 6
											});
										</p>

									</li>
									<li>
										 Bar charts
										<span id="bar">5,15,7,2,4,10,12,5,4</span>
										and negative values
										<span id="negative-bar">5,15,7,2,0,-10,-5,4,10,12,5,4,6</span>
										and stacked
										<span id="stacked-bar"></span>
										<p class="note">
											$("#bar").sparkline('html', {
												type: 'bar',
												barWidth: 6
											});
											<br>
											$("#negative-bar").sparkline('html', {
												type: 'bar',
												barWidth: 6
											});
											<br>
											$("#stacked-bar").sparkline('[ [1,4], [2, 6], [3, 2], [4, 1] ,[5,3],[3,8] ]', {
												type: 'bar'
											});
										</p>
									</li>
									<li>
										Tristate charts
										<span id="sparktristate">1,1,0,1,-1,-1,1,-1,0,0,1,1</span>
										(think games won, lost or drawn)
										<p class="note">
											$("#sparktristate").sparkline('html', {
												type: 'tristate',
												posBarColor: '#428400',
												negBarColor: '#005fbf'
											});
										</p>
									</li>
								</ul>


							</div>
							<div class="col-sm-6">
								<ul>
									<li>
										Composite inline
										<span id="compositeline">1,2,3,4,5,4,3,2,1,5,6,9,4,3,5,1,2</span>
										& Composite bar
										<span id="compositebar">4,1,5,7,9,9,8,7,6,6,4,7,8,4,3,2,2,5,6,7</span>
										<p class="note">
											$('#compositeline').sparkline('html', {
												fillColor: false,
												changeRangeMin: 0,
												chartRangeMax: 10
											});
											<br>
											$('#compositeline').sparkline([4,1,5,7,9,9,8,7,6,6,4,7,8,4,3,2,2,5,6,7],  {
												composite: true,
												fillColor: false,
												lineColor: 'red',
												changeRangeMin: 0,
												chartRangeMax: 10
											});
											<br>
											<br>
											$('#compositebar').sparkline('html', {
												type: 'bar',
												barColor: '#aaf'
											});
											<br>
											$('#compositebar').sparkline([4,1,5,7,9,9,8,7,6,6,4,7,8,4,3,2,2,5,6,7], {
												composite: true,
												fillColor: false,
												lineColor: 'red'
											});
										</p>
									</li>
									<li>
										Discrete
										<span id="discrete3">1,2,3,2,1,5,6,7,8,9,8,6,4,3,2,5</span>
										and Discrete with threshold
										<span id="discrete2">4,6,7,7,4,3,2,-1,-6,-8,-6,9,4,5,2,6,4,5</span>
										<p class="note">
											$("#discrete3").sparkline('html', {
												type: 'discrete',
												thresholdColor: '#ff0000'
											});
											<br>
											$("#discrete2").sparkline('html', {
												type: 'discrete',
												thresholdValue: 0,
												thresholdColor: '#ff0000'
											});
										</p>
									</li>
									<li>
										Box Plot
										<span id="sparkboxplot">4,27,34,52,54,59,61,68,78,82,85,87,91,93,100</span>
										& Pie charts
										<span id="sparkpie">20,30,50,60</span>
										& Bullet charts
										<span id="sparkbullet">10,12,12,9,7</span>
										<p class="note">
											$("#sparkboxplot").sparkline('html', {
												type: 'box'
											});
											<br>
											$("#sparkpie").sparkline('html', {
												type: 'pie'
											});
											<br>
											$("#sparkbullet").sparkline('html', {
												type: 'bullet'
											});
										</p>
									</li>
								</ul>
							</div>
						</div>


				</div>
			</div><!-- end panel -->
		</div><!-- end .col-md-12 -->

	</div><!-- end col-md-12 -->
</div>