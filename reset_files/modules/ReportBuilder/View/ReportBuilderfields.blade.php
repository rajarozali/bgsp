<!-- Reportname Field -->
<div class="form-group">
	<label class="col-sm-3 control-label" for="form-field-1">
		Reportname
	</label>
	<div class="col-sm-9">
		<input value="{{isset($editReportBuilder['reportname']) ? $editReportBuilder['reportname'] : ''}}" name="reportname" type="text" placeholder="" class="form-control">
	</div>
</div>

<!-- Description Field -->
<div class="form-group">
	<label class="col-sm-3 control-label" for="form-field-1">
		Description
	</label>
	<div class="col-sm-9">
		<textarea  name="Description" type="text" placeholder="" class="form-control">{{isset($editReportBuilder['Description']) ? $editReportBuilder['Description'] : ''}}</textarea>
	</div>
</div>
