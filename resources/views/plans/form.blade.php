							<div class="panel-body">								 								
								<div class="row">
									<div class="col-sm-6">
										<div class="form-group">
											{!! Form::label('plan_code','计划编码') !!}
											{!! Form::text('plan_code',null,['class'=>'form-control', 'id' => 'plan_code']) !!}							
										</div>	
									</div>							
								</div>							
									 
								<div class="row">   							
									<div class="col-sm-6">
										<div class="form-group">
											{!! Form::label('plan_name','计划名称') !!}
											{!! Form::text('plan_name',null,['class'=>'form-control', 'id' => 'plan_name']) !!}						
										</div>		
									</div>							
								</div>							
							    

								<div class="row">
									<div class="col-sm-6">
									<div class="form-group">
								{!! Form::label('plan_details','计划的详细信息') !!}
								{!! Form::text('plan_details',null,['class'=>'form-control', 'id' => 'plan_details']) !!}		
									</div>							
									</div>	
								</div>

								<div class="row">
									<div class="col-sm-6">
									<div class="form-group">
									<?php $services = App\Service::lists('name', 'id'); ?>
									{!! Form::label('service_id','服务') !!}
									{!! Form::select('service_id',$services,null,['class'=>'form-control selectpicker show-tick show-menu-arrow','id'=>'service_id','data-live-search'=> 'true']) !!}		
									</div>							
									</div>	
								</div>						
									 
								<div class="row">   							
									<div class="col-sm-6">
										<div class="form-group">
									{!! Form::label('days','天数') !!}
									{!! Form::text('days',null,['class'=>'form-control', 'id' => 'days']) !!}		
										</div>							
								    </div>								
							    </div>								
							   

									<div class="row">
										<div class="col-sm-6">
							    		<div class="form-group">
									{!! Form::label('amount','总价 (不含税)') !!}
									<div class="input-group">
  									<div class="input-group-addon"><i class="fa fa-rmb"></i></div>
									{!! Form::text('amount',null,['class'=>'form-control', 'id' => 'amount']) !!}		
										</div>							
										</div>							
										</div>							
										</div>							
									   
									   <div class="row">
										<div class="col-sm-6">
							    <div class="form-group">
									{!! Form::label('status','状态') !!}
									<!--0 for inactive , 1 for active-->
									{!! Form::select('status',array('1' => '激活', '0' => '未激活'),null,['class' => 'form-control selectpicker show-tick show-menu-arrow', 'id' => 'status']) !!}		
										</div>							
									    </div>								
									    </div>								
							   
									     <div class="row">
										<div class="col-sm-6">
								 <div class="form-group">
                                 {!! Form::submit($submitButtonText, ['class' => 'btn btn-primary pull-right']) !!}
                                 </div>
                            </div>
                            </div>
                            </div>
                            