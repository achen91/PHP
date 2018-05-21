@extends('app')

@section('content')


<div class="rightside bg-grey-100">
	<div class="container-fluid">

	@include('flash::message')
	
	<div class="row"><!-- Main row -->
		<div class="col-md-12"><!-- Main col -->
			<div class="panel no-border ">
				<div class="panel-title">

				<div class="panel-head font-size-20">咨询者详细信息 </div>
					<div class="pull-right no-margin">				
						@if($enquiry->status == 1)
	                        @permission(['manage-gymie','manage-enquiries','edit-enquiry'])	                    
	                        <a href="#" class="mark-enquiry-as btn btn-sm btn-primary active pull-right margin-right-5" data-goto-url="{{ url('enquiries/'.$enquiry->id.'/markMember') }}" data-record-id="{{$enquiry->id}}"><i class="fa fa-user"></i> 标记会员</a>
	                        <a href="#" class="mark-enquiry-as btn btn-sm btn-primary active pull-right margin-right-5" data-goto-url="{{ url('enquiries/'.$enquiry->id.'/lost') }}" data-record-id="{{$enquiry->id}}"><i class="fa fa-times"></i> 标记丢失</a>
	                        @endpermission
	                    @endif
	                    
	                    @permission(['manage-gymie','manage-enquiries','edit-enquiry'])
							<a class="btn btn-sm btn-primary pull-right margin-right-5" href="{{ action('EnquiriesController@edit',['id' => $enquiry->id]) }}"><span>编辑</span></a>
						@endpermission
					</div>
				</div>

			<div class="panel-body">

				<div class="row">				<!--inner row start-->
					<div class="col-sm-8">          <!-- inner column start -->       
					<div class="row">
					<div class="col-sm-4">
					<i class="fa fa-user center-icons color-blue-grey-100 fa-7x"></i>
					</div> 

					<div class="col-sm-8">

						<!-- Spacer -->
					<div class="row visible-md visible-lg">
						<div class="col-sm-4">
							<label>&nbsp;</label>
						</div>
					</div>

						<div class="row">
							<div class="col-sm-4">
							<label>姓名</label>
							</div>
							<div class="col-sm-8">
							<span class="show-data">{{$enquiry->name}}</span>
							</div>
						</div>
						<hr class="margin-top-0 margin-bottom-10">
						<div class="row">
							<div class="col-sm-4">
							<label>出生日期</label>
							</div>
							<div class="col-sm-8">
							<span class="show-data">{{$enquiry->DOB}}</span>
							</div>
						</div>
						<hr class="margin-top-0 margin-bottom-10">
						<div class="row">
							<div class="col-sm-4">
							<label>电子邮箱</label>
							</div>
							<div class="col-sm-8">
							<span class="show-data">{{$enquiry->email}}</span>
							</div>
						</div>
						<hr class="margin-top-0 margin-bottom-10">
						<div class="row">
							<div class="col-sm-4">
							<label>会籍记录</label>
							</div>
							<div class="col-sm-8">
							<span class="show-data">{{$enquiry->address}}</span>
							</div>
						</div>
						<hr class="margin-top-0 margin-bottom-10">
						<div class="row">
							<div class="col-sm-4">
							<label>性别</label>
							</div>
							<div class="col-sm-8">
							<span class="show-data">{{Utilities::getGender($enquiry->gender)}}</span>
							</div>
						</div>
						<hr class="margin-top-0 margin-bottom-10">
						<div class="row">
							<div class="col-sm-4">
							<label>联系电话</label>
							</div>
							<div class="col-sm-8">
							<span class="show-data">{{$enquiry->contact}}</span>
							</div>
						</div>
						<hr class="margin-top-0 margin-bottom-10">
						<div class="row">
							<div class="col-sm-4">
							<label>Pin 码</label>
							</div>
							<div class="col-sm-8">
							<span class="show-data">{{$enquiry->pin_code}}</span>
							</div>
						</div>
						
					</div>
					</div>
					</div>

					<div class="col-sm-4">
			<div class="row"><!-- Main row -->
			<div class="col-md-12"><!-- Main Col -->
				<div class="panel bg-grey-50">
					<div class="panel-title margin-top-5 bg-transparent">
						<div class="panel-head"><strong><span class="fa-stack">
							  <i class="fa fa-circle-thin fa-stack-2x"></i>
							  <i class="fa fa-ellipsis-h fa-stack-1x"></i>
							</span> 附加信息</strong></div>
						</div>
						<div class="panel-body">

						<div class="row">
							<div class="col-sm-4">
							<label>职业</label>
							</div>
							<div class="col-sm-8">
							<span class="show-data">{{Utilities::getOccupation($enquiry->occupation)}}</span>
							</div>
						</div>
						<hr class="margin-top-0 margin-bottom-10">
						<div class="row">
							<div class="col-sm-4">
							<label>开始日期</label>
							</div>
							<div class="col-sm-8">
							<span class="show-data">{{$enquiry->start_by}}</span>
							</div>
						</div>
						<hr class="margin-top-0 margin-bottom-10">
						<div class="row">
							<div class="col-sm-4">
							<label>感兴趣</label>
							</div>
							<div class="col-sm-8">
								<?php 
									$Int1 = array();
									$InName = App\Service::whereIn('id',explode(',',$enquiry->interested_in))->get();

									foreach($InName as $Int2)
									{
										$Int1[] = $Int2->name;
									}
								 ?>
								<span class="show-data">{{ implode(",",$Int1) }}</span>
							</div>
						</div>
<hr class="margin-top-0 margin-bottom-10">
						<div class="row">
							<div class="col-sm-4">
							<label>目的</label>
							</div>
							<div class="col-sm-8">
							<span class="show-data">{{Utilities::getAim($enquiry->aim)}}</span>
							</div>
						</div>
<hr class="margin-top-0 margin-bottom-10">
<div class="row">
							<div class="col-sm-4">
							<label>来源</label>
							</div>
							<div class="col-sm-8">
							<span class="show-data">{{Utilities::getSource($enquiry->source)}}</span>
							</div>
						</div>
<hr class="margin-top-0 margin-bottom-10">
						<div class="row">
							<div class="col-sm-4">
							<label>状态</label>
							</div>
							<div class="col-sm-8">
							<span class="show-data">{{Utilities::getEnquiryStatus ($enquiry->status)}}</span>
							</div>
						</div>

					</div>   <!-- End of inner Column -->
					</div>
					</div>
					</div>
					</div>   <!-- End Of inner Row -->
				</div>	<!-- / Panel-body -->
			</div><!-- / Panel-no-border -->
		</div><!-- / Main-col -->
	</div><!-- / Main-row -->
	</div>

	<!-- Already created followups -->

<!-- ############################ Already created followups Timeline ######################### -->

        <div class="row"><!-- Main row -->
            <div class="col-md-12">
                <div class="panel no-border">
                    <div class="panel-title bg-white no-border">
                        <div class="panel-head"><i class="fa fa-bookmark-o"></i> <span> 跟进记录</span></div>
                        @permission(['manage-gymie','manage-enquiries','add-enquiry-followup'])
                        <button class="btn btn-primary btn-sm pull-right" data-toggle="modal" data-target="#createFollowupModal" data-id="createFollowupModal">
                       	 跟进 
                        </button>
                        @endpermission
                    </div>

                    <div class="panel-body">

                    @if($followups->count() != 0)
                    <div class="timeline-centered">
                       @foreach($followups as $followup)                      
                            <article class="timeline-entry">
                                <div class="timeline-entry-inner">
                                    <time class="timeline-time"><span class="followup-time">{{ $followup->updated_at->toFormattedDateString() }}</span></time>
                                    <div class="timeline-icon {{ Utilities::getIconBg($followup->status) }}">
                                        <i class="{{ Utilities::getStatusIcon($followup->status) }}"></i>
                                    </div>
                                    <div class="timeline-label">
                                        <p>Via {{ Utilities::getFollowupBy($followup->followup_by) }}
                                        	@if($followup->status == 0)
                                        	@permission(['manage-gymie','manage-enquiries','edit-enquiry-followup'])
	                                        <button class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#editFollowupModal-{{$followup->id}}" data-id="{{$followup->id}}">
	                                        编辑 
	                                        </button>
	                                        @endpermission
	                                        @else
	                                        <span class="label label-primary pull-right followup-label">完成</span>
	                                        @endif
                                        </p>
                                        @if($followup->status == 0)                                        
                                        <p>截止日期: {{ $followup->due_date->format('Y-m-d') }}</p>
                                        @else
                                        <p>{{ $followup->outcome }}</p>
                                        @endif
                                    </div>
                                </div>
                            </article>                        
                       @endforeach
                       </div>
                       @else
                       <h2 class="text-center padding-top-15">No followups yet.</h2>
                       @endif
                    </div><!-- Panel Body End -->

                </div><!-- Panel End -->
            </div><!-- Col End -->
        </div><!-- / Row End -->

<!-- Edit Followup Modal -->
@if($followups->count() != 0)
   @foreach($followups as $followup)   
<div id="editFollowupModal-{{$followup->id}}" class="modal fade" role="dialog">
<div class="modal-dialog">

	<!-- Modal content-->
	<div class="modal-content">
		<div class="modal-header">
			<button type="button" class="close" data-dismiss="modal">&times;</button>
			<h4 class="modal-title">请更新状态和结果</h4>
		</div>
		{!! Form::Open(['action' => ['FollowupsController@update',$followup->id],'id' => 'followupform']) !!}
		<div class="modal-body">
			
			{!! Form::hidden('enquiry_id',$followup->enquiry->id) !!}

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						{!! Form::label('date','日期') !!}
						{!! Form::text('date',$followup->created_at->format('Y-m-d'),['class'=>'form-control', 'id' => 'date', 'readonly']) !!}		
					</div>
				</div>
				<div class="col-sm-6">
				    <div class="form-group">
					    {!! Form::label('followup_by','跟进项') !!}
						{!! Form::select('followup_by',array('0' => 'Call', '1' => 'SMS', '2' => 'Personal'),$followup->followup_by,['class'=>'form-control selectpicker show-tick show-menu-arrow', 'id' => 'followup_by']) !!}
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6">
					<div class="form-group">
						{!! Form::label('due_date','截止日期') !!}
						{!! Form::text('due_date',$followup->due_date->format('Y-m-d'),['class'=>'form-control', 'id' => 'due_date', 'readonly']) !!}		
					</div>
				</div>
				<div class="col-sm-6">
				    <div class="form-group">
					    {!! Form::label('status','状态') !!}
						{!! Form::select('status',array('0' => 'Pending', '1' => 'Done',),$followup->status,['class'=>'form-control selectpicker show-tick show-menu-arrow', 'id' => 'status']) !!}
					</div>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-12">
					<div class="form-group">
						{!! Form::label('outcome','结果') !!}
						{!! Form::text('outcome',$followup->outcome,['class'=>'form-control', 'id' => 'outcome']) !!}		
					</div>
				</div>
			</div>
		</div>
	
		<div class="modal-footer">
			<input type="submit" class="btn btn-info" value="完成" id="btn-{{ $followup->id }}"/>
		</div>
		{!! Form::Close() !!}
	</div>
	</div>
	</div>

	@endforeach
@endif

<!-- Create Followup Modal -->
<div id="createFollowupModal" class="modal fade" role="dialog">
<div class="modal-dialog">

<!-- Modal content-->
<div class="modal-content">
<div class="modal-header">
<button type="button" class="close" data-dismiss="modal">&times;</button>
<h4 class="modal-title">新的跟进</h4>
</div>
<div class="modal-body">
{!! Form::Open(['action' => 'FollowupsController@store','files'=>'true']) !!}
{!! Form::hidden('enquiry_id',$enquiry->id) !!}

<div class="row">
	<div class="col-sm-6">
    <div class="form-group">
{!! Form::label('followup_by','跟进项') !!}
{!! Form::select('followup_by',array('0' => '电话', '1' => '短信', '2' => '拜访'),null,['class'=>'form-control selectpicker show-tick show-menu-arrow', 'id' => 'followup_by']) !!}											
	</div>
	</div>

	<div class="col-sm-6">
	<div class="form-group">
{!! Form::label('due_date','截止日期') !!}
{!! Form::text('due_date',null,['class'=>'form-control datepicker-default', 'id' => 'due_date']) !!}		
	</div>
	</div>
</div>

</div>
<div class="modal-footer">
<input type="submit" class="btn btn-info" value="创建" id="createFollowup"/>
{!! Form::Close() !!}
</div>
</div>
</div>
</div>

</div>
</div>
@stop
@section('footer_scripts') 
    <script src="{{ URL::asset('assets/js/followup.js') }}" type="text/javascript"></script>
@stop
@section('footer_script_init')
    <script type="text/javascript">
        $(document).ready(function(){
            gymie.markEnquiryAs();                       
     });
    </script>
@stop