<div id="content">
	<div id="sortable-panel" class="">

		<div id="titr-content" class="col-md-12">
			<h2>Dual List</h2>
			<h5>Bootstrap Dual Listbox is a responsive dual listbox widget...</h5>
			<div class="actions">
				<button class="btn btn-success ">Add new</button>
				<button class="btn btn-default ">Options</button>
			</div>
		</div>

		<div class="col-md-6 ">
			<div  class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<i class="fa fa-th-list"></i>
						Example with default values
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

					<form id="demoform" action="#" method="post" class="dual-list">
						<select multiple="multiple" size="10" name="duallistbox_demo1[]">
							<option value="option1">Option 1</option>
							<option value="option2">Option 2</option>
							<option value="option3" selected="selected">Option 3</option>
							<option value="option4">Option 4</option>
							<option value="option5">Option 5</option>
							<option value="option6" selected="selected">Option 6</option>
							<option value="option7">Option 7</option>
							<option value="option8">Option 8</option>
							<option value="option9">Option 9</option>
							<option value="option0">Option 10</option>
						</select>
						<br>
						<button type="submit" class="btn btn-primary btn-block">Submit data</button>
					</form>

				</div>

			</div><!-- end panel -->
		</div><!-- end .col-md-6 -->

		<div class="col-md-6 ">
			<div  class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<i class="fa fa-th-list"></i>
						Example with custom settings
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
					<select multiple="multiple" size="10" name="duallistbox_demo2" class="demo2">
						<option value="option1">Option 1</option>
						<option value="option2">Option 2</option>
						<option value="option3" selected="selected">Option 3</option>
						<option value="option4">Option 4</option>
						<option value="option5">Option 5</option>
						<option value="option6" selected="selected">Option 6</option>
						<option value="option7">Option 7</option>
						<option value="option8">Option 8</option>
						<option value="option9">Option 9</option>
						<option value="option0">Option 10</option>
						<option value="option0">Option 11</option>
						<option value="option0">Option 12</option>
						<option value="option0">Option 13</option>
						<option value="option0">Option 14</option>
						<option value="option0">Option 15</option>
						<option value="option0">Option 16</option>
						<option value="option0">Option 17</option>
						<option value="option0">Option 18</option>
						<option value="option0">Option 19</option>
						<option value="option0">Option 20</option>
					 </select>

				</div>

			</div><!-- end panel -->
		</div><!-- end .col-md-6 -->

		<div class="col-md-12 ">
			<div  class="panel panel-default">
				<div class="panel-body">
					<h4 class="bold">Example with default values</h4>
					<p>The dual listbox is created from a select multiple by calling <code>.bootstrapDualListbox(settings);</code>on a selector. The selector can be any element, not just selects. When the method is called on a selector other than a select, then all select childrens are converted into dual list boxes.</p>
					<pre>var demo1 = $('select[name="duallistbox_demo1[]"]').bootstrapDualListbox();</pre>
				</div>
			</div><!-- end panel -->
		</div><!-- end .col-md-12 -->

	</div><!-- end #sortable-panel -->
</div>