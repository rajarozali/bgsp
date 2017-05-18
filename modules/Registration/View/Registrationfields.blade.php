<!-- Name Field -->
<div class="form-group">
	<label class="col-sm-3 control-label" for="form-field-1">
		Name
	</label>
	<div class="col-sm-9">
		<input value="{{isset($editRegistration['name']) ? $editRegistration['name'] : ''}}" name="name" type="text" placeholder="" class="form-control">
	</div>
</div>

<!-- Email Field -->
<div class="form-group">
	<label class="col-sm-3 control-label" for="form-field-1">
		Email
	</label>
	<div class="col-sm-9">
		<input value="{{isset($editRegistration['email']) ? $editRegistration['email'] : ''}}" name="email" type="email" placeholder="" class="form-control">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="form-field-1">
		Oneimage
	</label>
	<div class="col-sm-10">
		<div class="dropzone dz-clickable dz-single dz-uploadimage1" data-name="oneimage" ></div>
		<input name="oneimage" type="hidden" value="{{ isset($editRegistration['oneimage']) ? $editRegistration['oneimage'] : ''}}">
	</div>
</div>

<div class="form-group">
	<label class="col-sm-2 control-label" for="form-field-1">
		Multipleimage
	</label>
	<div class="col-sm-10">
		<div  class="dropzone multi-uploader" id="dropzone" data-name="multipleimage"></div>
		<input name="multipleimage" type="hidden" value="{{isset($editRegistration['multipleimage']) ? $editRegistration['multipleimage'] : ''}}" style="width:100%;">
	</div>
</div>
