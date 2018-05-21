<div class="row">
	<div class="col-sm-6">
    <div class="form-group">
{!! Form::label('followup_by','追访') !!}
{!! Form::select('followup_by',array('0' => '电话', '1' => '短信', '2' => '个人来访'),null,['class'=>'form-control selectpicker show-tick show-menu-arrow', 'id' => 'followup_by']) !!}											
	</div>
	</div>

	<div class="col-sm-6">
	<div class="form-group">
{!! Form::label('due_date','到期日') !!}
{!! Form::text('due_date',null,['class'=>'form-control datepicker-default', 'id' => 'due_date']) !!}		
	</div>
	</div>
</div>