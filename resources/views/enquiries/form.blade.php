<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			{!! Form::label('name','姓名',['class'=>'control-label']) !!}
			{!! Form::text('name',null,['class'=>'form-control', 'id' => 'name']) !!}		
		</div>
	</div>
</div>


<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			{!! Form::label('contact','联系方式') !!}
			{!! Form::text('contact',null,['class'=>'form-control', 'id' => 'contact']) !!}
		</div>								
	</div>	

	<div class="col-sm-6">
		<div class="form-group">
			{!! Form::label('email','电子邮箱') !!}
			{!! Form::text('email',null,['class'=>'form-control', 'id' => 'email']) !!}		
		</div>
	</div>							
</div>


<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			{!! Form::label('DOB','出生日期') !!}
			{!! Form::text('DOB',null,['class'=>'form-control datepicker-default', 'id' => 'DOB']) !!}		
		</div>
	</div>

	<div class="col-sm-6">
		<div class="form-group">
			{!! Form::label('gender','性别') !!}
			{!! Form::select('gender',array('m' => '男', 'f' => '女'),null,['class'=>'form-control selectpicker show-tick show-menu-arrow', 'id' => 'gender']) !!}											
		</div>
	</div>
</div>


<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			{!! Form::label('occupation','职业') !!}
{!! Form::select('occupation',array('0' => '学生', '1' => '家庭主妇','2' => '个体经营','3' => '职员','4' => '自由职业','5' => '其他'),null,['class' => 'form-control selectpicker show-tick show-menu-arrow', 'id' => 'occupation']) !!}											
		</div>
	</div>

	<div class="col-sm-6">
		<div class="form-group">
			{!! Form::label('start_by','开始日期') !!}
			{!! Form::text('start_by',null,['class'=>'form-control datepicker-default', 'id' => 'start_by']) !!}											
		</div>
	</div>
</div>

<div class="row">
	<div class="col-sm-6">
		<div class="form-group">
			<?php $services = App\Service::lists('name', 'id'); ?>
			{!! Form::label('interested_in','感兴趣') !!}
			{!! Form::select('interested_in[]',$services,1,['class'=>'form-control selectpicker show-tick show-menu-arrow','multiple' => 'multiple','id' => 'interested_in']) !!}		
		</div>
	</div>

	<div class="col-sm-6">
		<div class="form-group">
			{!! Form::label('aim','入会目的?',['class'=>'control-label']) !!}
			{!! Form::select('aim',array('0' => '健身', '1' => '社交', '2' => '塑形', '3' => '减脂', '4' => '增肌', '5' => '其他'),null,['class' => 'form-control selectpicker show-tick show-menu-arrow', 'id' => 'aim']) !!}		
		</div>
	</div>
</div>


<div class="row">
	<div class="col-sm-6">
	<div class="row">
	<div class="col-sm-12">
		<div class="form-group">
			{!! Form::label('source','如何知道我们?',['class'=>'control-label']) !!}
			{!! Form::select('source',array('0' => '促销', '1' => '推荐', '2' => '其他'),null,['class' => 'form-control selectpicker show-tick show-menu-arrow', 'id' => 'source']) !!}
		</div>	
	</div>	
	<div class="col-sm-12">
		<div class="form-group">
			{!! Form::label('pin_code','个人识别码',['class'=>'control-label']) !!}
			{!! Form::text('pin_code',null,['class'=>'form-control', 'id' => 'pin_code']) !!}		
		</div>
	</div>						
	</div>
	</div>

	<div class="col-sm-6">
		<div class="form-group">
			{!! Form::label('address','会籍') !!}
			{!! Form::textarea('address',null,['class'=>'form-control', 'id' => 'address', 'rows' => 5]) !!}		
		</div>
	</div>								
</div>
