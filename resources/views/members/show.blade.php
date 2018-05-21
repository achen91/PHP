@extends('app')

@section('content')
<?php use Carbon\Carbon; ?>

<div class="rightside bg-grey-100">
	<div class="page-head bg-grey-100 padding-top-15 no-padding-bottom">
		@include('flash::message')
	</div>
	<div class="container-fluid">

		<div class="row"><!-- Main row -->
			<div class="col-md-12"><!-- Main Col -->
				<div class="panel no-border ">
					<div class="panel-title">
						<div class="panel-head font-size-20">会员详细信息</div>
							<div class="pull-right no-margin">
									@permission(['manage-gymie','manage-members','edit-member'])
									<a class="btn btn-primary" href="{{ action('MembersController@edit',['id' => $member->id]) }}">
							        <span>编辑</span>                                          
							        </a>
							        @endpermission

							        @permission(['manage-gymie','manage-members','delete-member'])
							        <button class="btn btn-danger" data-toggle="modal" data-target="#deleteModal-{{$member->id}}" data-id="{{$member->id}}">
							        <span>删除</span> 
							        </button>
							        @endpermission

							        <!-- Modal -->
							        <div id="deleteModal-{{$member->id}}" class="modal fade" role="dialog">
								        <div class="modal-dialog">

									        <!-- Modal content-->
									        <div class="modal-content">
										        <div class="modal-header">
											        <button type="button" class="close" data-dismiss="modal">&times;</button>
											        <h4 class="modal-title">警告</h4>
										        </div>
										        <div class="modal-body">
										        	<p>确认要删除么？</p>
										        </div>
										        <div class="modal-footer">
											        {!! Form::Open(['action'=>['MembersController@archive',$member->id],'method' => 'POST','id'=>'archiveform-'.$member->id]) !!}
											        	<input type="submit" class="btn btn-danger" value="是的" id="btn-{{ $member->id }}"/>
											        	<button type="button" class="btn btn-info" data-dismiss="modal">取消</button>
											        {!! Form::Close() !!}
										        </div>
									        </div>
								        </div>
							        </div>
							</div>
					</div>

		<div class="panel-body">
			<div class="row">				<!--Main row start-->
				<div class="col-sm-8">
				<div class="row">				
					<div class="col-sm-4">
					<!-- Spacer -->
					<div class="row visible-md visible-lg">
						<div class="col-sm-4">
							<label>&nbsp;</label>
						</div>
					</div>
						<?php 
							$images = $member->getMedia('profile'); 
							$profileImage = ($images->isEmpty() ? 'https://placeholdit.imgix.net/~text?txtsize=22&txt=NA&w=200&h=180' : url($images[0]->getUrl()));
						?>
						<img class="AutoFitResponsive" src="{{ $profileImage }}"/>
					</div>
				
					      
				<div class="col-sm-8">			<!-- Outer Row Start -->

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
						<span class="show-data">{{$member->name}}</span>
						</div>
					</div>

					<hr class="margin-top-0 margin-bottom-10">

					<div class="row">
						<div class="col-sm-4">
						<label>会员卡号</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{$member->member_code}}</span>
						</div>
					</div>
					<hr class="margin-top-0 margin-bottom-10">

					<div class="row">
						<div class="col-sm-4">
						<label>出生日期</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{$member->DOB->format('Y-m-d')}}</span>
						</div>
					</div>
					<hr class="margin-top-0 margin-bottom-10">
					<div class="row">
						<div class="col-sm-4">
						<label>性别</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{Utilities::getGender($member->gender)}}</span>
						</div>
					</div>
					<hr class="margin-top-0 margin-bottom-10">

					<div class="row">
						<div class="col-sm-4">
						<label>电话</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{$member->contact}}</span>
						</div>
					</div>

					<hr class="margin-top-0 margin-bottom-10">
					<div class="row">
						<div class="col-sm-4">
						<label>电子邮箱</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{$member->email}}</span>
						</div>
					</div>

					<hr class="margin-top-0 margin-bottom-10">
					<div class="row">
						<div class="col-sm-4">
						<label>会员起始日</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{$member->created_at->toFormattedDateString()}}</span>
						</div>
					</div>
					<hr class="margin-top-0 margin-bottom-10">
					<div class="row">
						<div class="col-sm-4">
						<label>紧急联系电话</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{$member->emergency_contact}}</span>
						</div>
					</div>
					<hr class="margin-top-0 margin-bottom-10">
					<div class="row">
						<div class="col-sm-4">
						<label>签到状态</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">未签到</span>
						<!-- <form action = "infoHandle.php" method = "post"> -->
						<a href="{{ action('MembersController@launch',['id' => $member->id]) }}" style= "border:1px;border-radius:6px;background-color:blue;width:100px;color:white;margin-left:20px;padding:7px">签到</a>
						<!-- <input type="button" name = "launchAction" value = "签到" style= "border:1px;background-color:blue;width:60px;color:white;margin-left:20px"></button> -->
						</div>
					</div>

				</div>  <!-- End of outer Row -->
				</div>
			</div>   <!-- End of Outer Column -->

			<div class="col-sm-4">
			<div class="row"><!-- Main row -->
			<div class="col-md-12"><!-- Main Col -->
				<div class="panel bg-grey-50">
					<div class="panel-title bg-transparent">
						<div class="panel-head"><strong><span class="fa-stack">
							  <i class="fa fa-circle-thin fa-stack-2x"></i>
							  <i class="fa fa-ellipsis-h fa-stack-1x"></i>
							</span> 附加信息</strong></div>
						</div>
						<div class="panel-body">

				<div class="row">
				<?php 
                    $subscriptions = $member->subscriptions;
                    $plansArray = array();
                    foreach($subscriptions as $subscription)
                    {
                        $plansArray[] = $subscription->plan->plan_name;
                    }
                 ?>
						<div class="col-sm-4">
						<label>套餐</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{implode(",",$plansArray)}}</span>
						</div>
					</div>
<hr class="margin-top-0 margin-bottom-10">					

					<div class="row">
						<div class="col-sm-4">
						<label>状态</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{Utilities::getStatusValue ($member->status)}}</span>
						</div>
					</div>
<hr class="margin-top-0 margin-bottom-10">
					<div class="row">
						<div class="col-sm-4">
						<label>目的</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{Utilities::getAim ($member->aim)}}</span>
						</div>
					</div>
<hr class="margin-top-0 margin-bottom-10">
					<div class="row">
						<div class="col-sm-4">
						<label>会籍顾问</label>
						</div>
						<div class="col-sm-8">
						<span class="show-data">{{$member->proof_name}}</span>
						</div>
					</div>
<hr class="margin-top-0 margin-bottom-10">
					<div class="row">
					<div class="col-sm-4">
					<label>会籍记录</label>
					</div>
					<div class="col-sm-8">
					<span class="show-data">{{$member->address}}</span>
					</div>
				</div>
				<hr class="margin-top-0 margin-bottom-10">
					<div class="row">
					<div class="col-sm-4">
					<label>健康状况</label>
					</div>
					<div class="col-sm-8">
					<span class="show-data">{{$member->health_issues}}</span>
					</div>
				</div>

					</div>
					</div>
					</div>
					</div>

			</div>

			</div>   <!-- End Of Main Row -->
		</div>
	</div>
</div>
</div>

<!--######################### Subscription history for the member ################################# -->
<div class="row">
	<div class="col-md-12">
		<div class="panel no-border ">
			<div class="panel-title">
				<div class="panel-head font-size-20">会员订阅记录</div>
			</div>
				<div class="panel-body">
					<table id="_payment" class="table table-bordered table-striped">
						<thead>
			                <tr>
				                <th>编号</th>
				                <th>套餐</th>
				                <th>开始日期</th>
				                <th>结束日期</th>
				                <th>状态</th>
				                <th>付款状态</th>
			                </tr>
		                </thead>
		                <tbody>
			                @foreach ($member->subscriptions->sortByDesc('created_at') as $subscription)  
			                <tr>                                         
				                <td><a href="{{ action('InvoicesController@show',['id' => $subscription->invoice_id]) }}">{{ $subscription->invoice->invoice_number }}</a></td>           
				                <td>{{ $subscription->plan->plan_name }}</td>           
				                <td>{{ $subscription->start_date->format('Y-m-d') }}</td>           
			                	<td>{{ $subscription->end_date->format('Y-m-d') }}</td>           
			                	<td><span class="{{ Utilities::getSubscriptionLabel ($subscription->status) }}">{{ Utilities::getSubscriptionStatus ($subscription->status) }}</span></td>           
			                	<td>{{ Utilities::getInvoiceStatus ($subscription->invoice->status) }}</td>           
			                </tr>
			                @endforeach
						</tbody>	
					</table>
				</div>
		</div>
	</div>
</div>

</div>
</div>
@stop