<div class="row">
	<div class="col-md-12">
		<div class="panel no-border">
			<div class="panel-title">
				<div class="panel-head font-size-20">输入付款的详细信息</div>
			</div>

			<div class="panel-body">
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							{!! Form::label('payment_amount','收到金额') !!}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-rmb"></i></div>
							{!! Form::text('payment_amount',null,['class'=>'form-control', 'id' => 'payment_amount', 'data-amounttotal' => '0']) !!}
							</div>
						</div>
					</div>

					<div class="col-sm-3">
						<div class="form-group">
							{!! Form::label('payment_amount_pending','待定金额') !!}
							<div class="input-group">
							<div class="input-group-addon"><i class="fa fa-rmb"></i></div>
							{!! Form::text('payment_amount_pending',null,['class'=>'form-control', 'id' => 'payment_amount_pending', 'readonly']) !!}
							</div>
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							{!! Form::label('mode','付款方式') !!}
							{!! Form::select('mode',array('1' => '现金', '0' => '支票'),1,['class'=>'form-control selectpicker show-tick show-menu-arrow', 'id' => 'mode']) !!}
						</div>
					</div>
				</div> <!-- /Row -->

				<div class="row" id="chequeDetails">
					<div class="col-sm-6">
						<div class="form-group">
							{!! Form::label('number','支票号') !!}
							{!! Form::text('number',null,['class'=>'form-control', 'id' => 'number']) !!}
						</div>
					</div>

					<div class="col-sm-6">
						<div class="form-group">
							{!! Form::label('date','支票日期') !!}
							{!! Form::text('date',null,['class'=>'form-control datepicker-default', 'id' => 'date']) !!}
						</div>
					</div>
				</div>

			</div> <!-- /Panel-body -->

		</div> <!-- /Panel-no-border -->
	</div> <!-- /Main Column -->
</div> <!-- /Main Row -->
