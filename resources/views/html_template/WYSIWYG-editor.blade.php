
					<div id="content">
						<!-- if you want active dragable panel, you should add #sortable-panel. handler drag-drop configured on .panel -->
						<div  class="">

							<div id="titr-content" class="col-md-12">
								<h2>Wysiwyg Editor</h2>
								<h5>Bootstrap simple and advanced editor...</h5>
								<div class="actions">
									<button class="btn btn-success ">Add new</button>
									<button class="btn btn-default ">Options</button>
								</div>
							</div>								
						
							<div class="col-md-6 ">
								<div  class="panel panel-default">									
									<div class="panel-body no-padding">
										<h4 class="bold">
											&nbsp;&nbsp;<i class="fa fa-pencil"></i>
											Summernote										
										</h4>
										<!-- summernote section -->
										<div id="summernote" class="summernote">
											Because Summernote and CKEditor
											<span style="background-color: rgb(247, 198, 206);">overlap </span>with each other,&nbsp;<br>we are using this style for disable hover top toolbar CKEditor.&nbsp;<br>We recommend don't using these editors together unless use this style
											<p>*/</p>
											<p>#cke_2_toolbox{<br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;display: none;<br>&nbsp;}<br></p>
										</div>
										
									</div>	
									<div class="panel-footer">
										<button class="btn btn-primary ">Save </button>
										<button class="btn btn-default ">Cancel</button>
									</div>													
								</div><!-- end panel -->
							</div><!-- end .col-md-6 -->

							<div class="col-md-6 ">
								<div  class="panel panel-default">									
									<div class="panel-body no-padding">
										<h4 class="bold">
											&nbsp;&nbsp;<i class="fa fa-pencil"></i>
											Bootstrap Markdown
										</h4>
										<textarea id="markdown-1" class="markdown" data-iconlibrary="fa" name="content" data-provide="markdown" rows="9">> > `How are you?`</textarea>
										
									</div>
									<div class="panel-footer">
										<button class="btn btn-primary ">Publish</button>
										
									</div>
								</div><!-- end panel -->
							</div><!-- end .col-md-6 -->
							
							<div class="col-md-12 ">
								<div  class="panel panel-default">
									<div class="panel-heading">
										<div class="panel-title">
											<i class="fa fa-pencil"></i>
											CKEditor
											<div class="bars pull-right">
												<a href="#"><i class="maximum fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="Maximize"></i></a>
												<a href="#"><i class="minimize fa fa-chevron-down" data-toggle="tooltip" data-placement="bottom" title="Collapse"></i></a>
												<a href="#"><i data-target="#panel2" data-dismiss="alert" data-toggle="tooltip" data-placement="bottom" title="Close" class="fa fa-times"></i></a>
											</div>
										</div>
									</div>
									<div class="panel-body no-padding">
										
										<textarea cols="80" id="editor1" class="ckeditor" name="editor1" rows="10"></textarea>
										
									</div>
									<div class="panel-footer">
										<button class="btn btn-primary ">Publish</button>
										
									</div>
								</div><!-- end panel -->
							</div><!-- end .col-md-12 -->

							<div class="col-md-12 ">
								<div  class="panel panel-default">
									<div class="panel-heading">
										<div class="panel-title">
											<i class="fa fa-pencil"></i>
											TinyMCE Editor
											<div class="bars pull-right">
												<a href="#"><i class="maximum fa fa-expand" data-toggle="tooltip" data-placement="bottom" title="Maximize"></i></a>
												<a href="#"><i class="minimize fa fa-chevron-down" data-toggle="tooltip" data-placement="bottom" title="Collapse"></i></a>
												<a href="#"><i data-target="#panel2" data-dismiss="alert" data-toggle="tooltip" data-placement="bottom" title="Close" class="fa fa-times"></i></a>
											</div>
										</div>
									</div>
									<div class="panel-body no-padding">
										
										<textarea cols="80" id="editor2" class="tinymce" name="editor2" rows="10"></textarea>
										
									</div>
									
								</div><!-- end panel -->
							</div><!-- end .col-md-12 -->

						</div><!-- end col-md-12 -->
					</div>