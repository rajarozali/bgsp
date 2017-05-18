<div id="content">
	<div id="sortable-panel" class="">

		<div id="titr-content" class="col-md-12">
			<h2>jQuery File Upload</h2>
			<h5>File Upload widget with multiple file selection, drag and drop support...</h5>
			<div class="actions">
				<button class="btn btn-success ">Add new</button>
				<button class="btn btn-default ">Options</button>
			</div>
		</div>

		<div class="col-md-12 ">
			<div  class="panel panel-default">
				<div class="panel-heading">
					<div class="panel-title">
						<i class="fa fa-upload"></i>
						Multiple File Upload
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
					<blockquote>
						<p>File Upload widget with multiple file selection, drag&amp;drop support, progress bars, validation and preview images, audio and video for jQuery.
						Supports cross-domain, chunked and resumable file uploads and client-side image resizing.
						Works with any server-side platform (PHP, Python, Ruby on Rails, Java, Node.js, Go etc.) that supports standard HTML form file uploads.</p>
					</blockquote>
					<br>
					<!-- The file upload form used as target for the file upload widget -->
					<form id="fileupload" class="fileupload" action="//jquery-file-upload.appspot.com/" method="POST" enctype="multipart/form-data">
						<!-- Redirect browsers with JavaScript disabled to the origin page -->
						<noscript><input type="hidden" name="redirect" value="https://blueimp.github.io/jQuery-File-Upload/"></noscript>
						<!-- The fileupload-buttonbar contains buttons to add/delete files and start/cancel the upload -->
						<div class="row fileupload-buttonbar">
							<div class="col-lg-7">
								<!-- The fileinput-button span is used to style the file input field as button -->
								<span class="btn btn-success fileinput-button">
									<i class="glyphicon glyphicon-plus"></i>
									<span>Add files...</span>
									<input type="file" name="files[]" multiple>
								</span>
								<button type="submit" class="btn btn-primary start">
									<i class="glyphicon glyphicon-upload"></i>
									<span>Start upload</span>
								</button>
								<button type="reset" class="btn btn-warning cancel">
									<i class="glyphicon glyphicon-ban-circle"></i>
									<span>Cancel upload</span>
								</button>
								<button type="button" class="btn btn-danger delete">
									<i class="glyphicon glyphicon-trash"></i>
									<span>Delete</span>
								</button>
								<!-- <input type="checkbox" class="toggle"> -->
								<div class="m-checkbox">
									<input id="ck1" type="checkbox" class="toggle" >
									<label for="ck1"> All items </label>
								</div>

								<!-- The global file processing state -->
								<span class="fileupload-process"></span>
							</div>
							<!-- The global progress state -->
							<div class="col-lg-5 fileupload-progress fade">
								<!-- The global progress bar -->
								<div class="progress progress-striped active" role="progressbar"  >
									<div class="progress-bar progress-bar-success" style="width:0%;"></div>
								</div>
								<!-- The extended global progress state -->
								<div class="progress-extended">&nbsp;</div>
							</div>
						</div>
						<!-- The table listing the files available for upload/download -->
						<table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>
					</form>
					<br>
					<div class="well">
						<h4 class="bold">Demo Notes</h4>
						<ul>
							<li>The maximum file size for uploads in this demo is <strong>999 KB</strong> (default file size is unlimited).</li>
							<li>Only image files (<strong>JPG, GIF, PNG</strong>) are allowed in this demo (by default there is no file type restriction).</li>
							<li>Uploaded files will be deleted automatically after <strong>5 minutes or less</strong> (demo files are stored in memory).</li>
							<li>You can <strong>drag &amp; drop</strong> files from your desktop on this webpage (see <a href="https://github.com/blueimp/jQuery-File-Upload/wiki/Browser-support">Browser support</a>).</li>
							<li>Please refer to the <a href="https://github.com/blueimp/jQuery-File-Upload">project website</a> and <a href="https://github.com/blueimp/jQuery-File-Upload/wiki">documentation</a> for more information.</li>
							<li>Built with the <a href="http://getbootstrap.com/">Bootstrap</a> CSS framework and Icons from <a href="http://glyphicons.com/">Glyphicons</a>.</li>
						</ul>
					</div>

					<!-- The blueimp Gallery widget -->
					<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-filter=":even">
						<div class="slides"></div>
						<h3 class="title">Sample</h3>
						<a class="prev">‹</a>
						<a class="next">›</a>
						<a class="close">×</a>
						<a class="play-pause"></a>
						<ol class="indicator"></ol>
					</div>
					<!-- The template to display files available for upload -->
					<script id="template-upload" type="text/x-tmpl">
					{% for (var i=0, file; file=o.files[i]; i++) { %}
						<tr class="template-upload fade">
							<td>
								<span class="preview"></span>
							</td>
							<td>
								<p class="name">{%=file.name%}</p>
								<strong class="error text-danger"></strong>
							</td>
							<td>
								<p class="size">Processing...</p>
								<div class="progress progress-striped active" role="progressbar"   ><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
							</td>
							<td>
								{% if (!i && !o.options.autoUpload) { %}
									<button class="btn btn-primary start" disabled>
										<i class="glyphicon glyphicon-upload"></i>
										<span>Start</span>
									</button>
								{% } %}
								{% if (!i) { %}
									<button class="btn btn-warning cancel">
										<i class="glyphicon glyphicon-ban-circle"></i>
										<span>Cancel</span>
									</button>
								{% } %}
							</td>
						</tr>
					{% } %}
					</script>
					<!-- The template to display files available for download -->
					<script id="template-download" type="text/x-tmpl">
					{% for (var i=0, file; file=o.files[i]; i++) { %}
						<tr class="template-download fade">
							<td>
								<span class="preview">
									{% if (file.thumbnailUrl) { %}
										<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
									{% } %}
								</span>
							</td>
							<td>
								<p class="name">
									{% if (file.url) { %}
										<a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
									{% } else { %}
										<span>{%=file.name%}</span>
									{% } %}
								</p>
								{% if (file.error) { %}
									<div><span class="label label-danger">Error</span> {%=file.error%}</div>
								{% } %}
							</td>
							<td>
								<span class="size">{%=o.formatFileSize(file.size)%}</span>
							</td>
							<td>
								{% if (file.deleteUrl) { %}
									<button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
										<i class="glyphicon glyphicon-trash"></i>
										<span>Delete</span>
									</button>
									 <div class="m-checkbox">
										<input type="checkbox" name="delete" value="1" class="toggle">
									</div>
								{% } else { %}
									<button class="btn btn-warning cancel">
										<i class="glyphicon glyphicon-ban-circle"></i>
										<span>Cancel</span>
									</button>
								{% } %}
							</td>
						</tr>
					{% } %}
					</script>



				</div>
				<div class="panel-footer">
					<button class="btn btn-primary ">Save Setting</button>
					<button class="btn btn-default ">Reset</button>
				</div>
			</div><!-- end panel -->
		</div><!-- end .col-md-12 -->

	</div><!-- end col-md-12 -->
</div>