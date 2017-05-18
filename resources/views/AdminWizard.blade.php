@extends('master')

@section('content')

		<!-- main content  -->
@role('administrators')

			<!-- if you want active dragable panel, you should add #sortable-panel. handler drag-drop configured on .panel -->
			<div  class="">
				<div id="adminwizard_div">
				<div id="titr-content" class="col-md-12">
					<h2>{{ trans('messages.configuration-wizard') }}</h2>
					<h5>{{ trans('messages.all-software-configuration') }}</h5>
					<div class="actions">
						<a class="pre-page btn btn-default"> {{ trans('messages.prev') }}</a>
						<a class="next-page btn btn-info">{{ trans('messages.next') }} <i class="fa fa-angle-double-left"></i></a>
					</div>
				</div>

				<!-- col-md-3 -->
				<div   class="col-md-3 ">
					<!-- #accordion is necessary to work correctly -->
					<div  id="accordion" class="vertical-menu yep-accordion panel-group">
						<div class="panel panel-default">
							<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#BasicSetting">
								<h5 class="panel-title">
									<a class="accordion-toggle" >
										<i class="indicator fa fa-lg fa-angle-up pull-right"></i>
										<span class="fa fa-cogs"></span>
										{{ trans('messages.basic-information') }}
									</a>
								</h5>
							</div>
							<div id="BasicSetting" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table">
										<tbody>
											<tr>
												<td>
													<a href="{{url('/adminwizard/companydetails')}}" >{{ trans('messages.company-details') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/emailserversetting')}}" >{{ trans('messages.mail-server-settings') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/smsserversetting')}}" >{{ trans('messages.sms-panel-setting') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/ippbxsetting')}}" >{{ trans('messages.ippbx-setting') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/site')}}" >{{ trans('messages.sites') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/worktime')}}" >{{ trans('messages.operational-hours') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/holiday')}}" >{{ trans('messages.holiday') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/notification')}}" >{{ trans('messages.notification-rules') }}</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#Users">
								<h5 class="panel-title">
									<a class="accordion-toggle" >
										<i class="indicator fa fa-lg fa-angle-down pull-right"></i>
										<span class="fa fa-users"></span>
										{{ trans('messages.users') }}
									</a>
								</h5>
							</div>
							<div id="Users" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table">
										<tbody>
											<tr>
												<td>
													<a href="{{url('/adminwizard/techniciangroup')}}" >{{ trans('messages.user-groups') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/technician')}}" > {{ trans('messages.technicians') }}</a>

												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/requester')}}" >{{ trans('messages.requesters') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/company')}}" >{{ trans('messages.organizations') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/leavingwork')}}" >{{ trans('messages.leave-types') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/cab')}}" >{{ trans('messages.advisory-board-members') }}</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#requests">
								<h5 class="panel-title" >
									<a class="accordion-toggle">
										<i class="indicator fa fa-lg fa-angle-down pull-right"></i>
										<span class="fa fa-file-text-o"></span>
										{{ trans('messages.request') }}
									</a>
								</h5>
							</div>
							<div id="requests" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table">
										<tbody>
											<tr>
												<td>
													<a href="{{url('/adminwizard/category')}}" >{{ trans('messages.category') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/requeststatus')}}" >{{ trans('messages.status') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/priority')}}" >{{ trans('messages.priority') }}</a>
												</td>
											</tr>
											<!--tr>
												<td>
													<a href="Custom-field.html" >{{ trans('messages.custom-fields') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="incident-template.html" >{{ trans('messages.incident-template') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="#" >{{ trans('messages.requests-rules') }}</a>
												</td>
											</tr-->
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#catalog">
								<h5 class="panel-title" >
									<a class="accordion-toggle">
										<i class="indicator fa fa-lg fa-angle-down pull-right"></i>
										<span class="fa fa-file"></span>
										{{ trans('messages.services-catalog') }}
									</a>
								</h5>
							</div>
							<div id="catalog" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table">
										<tbody>
											<tr>
												<td>
													<a href="{{url('/adminwizard/servicescategory')}}" >{{ trans('messages.services-category') }}</a>
												</td>
											</tr>
											<!--tr>
												<td>
													<a href="services.html" >{{ trans('messages.services') }}</a>
												</td>
											</tr-->
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#collapseFour">
								<h5 class="panel-title" >
									<a class="accordion-toggle">
										<i class="indicator fa fa-lg fa-angle-down pull-right"></i>
										<span class="fa fa-pencil-square-o"> </span>
										{{ trans('messages.survey') }}
									</a>
								</h5>
							</div>
							<div id="collapseFour" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table">
										<tbody>
											<tr>
												<td>
													<a href="{{url('/adminwizard/surveysetting')}}" >{{ trans('messages.survey-setting') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/survey')}}" >{{ trans('messages.survey-define') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/surveypreview')}}" >{{ trans('messages.survey-preview') }}</a>
												</td>
											</tr>
											<!--tr>
												<td>
													<a href="Poll-Results.html" >{{ trans('messages.view-result') }}</a>
												</td>
											</tr-->
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading"  data-toggle="collapse" data-parent="#accordion" data-target="#general">
								<h5 class="panel-title" >
									<a class="accordion-toggle">
										<i class="indicator fa fa-lg fa-angle-down pull-right"></i>
										<span class="fa fa-wrench"> </span>
										{{ trans('messages.public') }}
									</a>
								</h5>
							</div>
							<div id="general" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table">
										<tbody>
											<tr>
												<td>
													<a href="{{url('/adminwizard/portalsettings')}}" >{{ trans('messages.portal-setting') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/schedulebackup')}}" >{{ trans('messages.backup-scheduling') }}</a>
												</td>
											</tr>
											{{--<tr>--}}
												{{--<td>--}}
													{{--<a href="#" >{{ trans('messages.languages') }}</a>--}}
												{{--</td>--}}
											{{--</tr>--}}
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading" data-toggle="collapse" data-parent="#accordion" data-target="#a-contract">
								<h5 class="panel-title" >
									<a class="accordion-toggle">
										<i class="indicator fa fa-lg fa-angle-down pull-right"></i>
										<span class="fa fa-cube"> </span>
										{{ trans('messages.productContract-management') }}
									</a>
								</h5>
							</div>
							<div id="a-contract" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table">
										<tbody>
											<tr>
												<td>
													<a href="{{url('/adminwizard/contracttype')}}" >{{ trans('messages.contract-type') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/contractplan')}}" >{{ trans('messages.contract-plans') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/additionalservicesupport')}}" >{{ trans('messages.additional-support-service') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/product')}}" >{{ trans('messages.products') }}</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
						<div class="panel panel-default">
							<div class="panel-heading">
								<h5 class="panel-title" data-toggle="collapse" data-parent="#accordion" data-target="#accordian-project">
									<a  class="accordion-toggle">
										<i class="indicator fa fa-lg fa-angle-down pull-right"></i>
										<span class="fa fa-tasks"> </span>
										{{ trans('messages.project-management') }}
									</a>
								</h5>
							</div>
							<div id="accordian-project" class="panel-collapse collapse">
								<div class="panel-body">
									<table class="table">
										<tbody>
											<tr>
												<td>
													<a href="{{url('/adminwizard/worktype')}}" >{{ trans('messages.tasks-type') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/checklistfield ')}}" >{{ trans('messages.checklists-fields') }}</a>
												</td>
											</tr>
											<tr>
												<td>
													<a href="{{url('/adminwizard/checklist')}}" >{{ trans('messages.checklists') }}</a>
												</td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- / col-md-3-->

				<!-- col-md-9 -->

				 <!-- adminwizard_div -->
			</div>
				@yield('dashborad')
				<!-- / col-md-9-->


			</div><!-- end col-md-12 -->
		</div>
 
@endrole
<!-- ./end #main  -->
<!-- footer -->
@stop
