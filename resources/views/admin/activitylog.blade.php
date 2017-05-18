@extends('master')
@section('content')
    <form id="form"   class="form-horizontal form" method="post" action="{{url("/admin/activitylogs")}}">
        <input type="hidden" name="_token" id="_token" value="{{csrf_token()}}">
        <input type="hidden" name="url" id="url" value="{{url("/admin/activitylogs")}}">
        <input type="hidden" name="id" id="id" value="{{isset($editrole['id']) ? $editrole['id'] : '' }}">
        <input type="hidden" name="page" id="page" value="{{isset($request['page']) ?$request['page'] : 1 }}">
        </form>
    <div id="ajax_div">
        @include('admin.activitylogajax')
    </div>
@endsection