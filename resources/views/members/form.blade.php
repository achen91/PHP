<?php use Carbon\Carbon; ?>

<!-- Hidden Fields -->
@if(Request::is('members/create'))
{!! Form::hidden('invoiceCounter',$invoiceCounter) !!}
{!! Form::hidden('memberCounter',$memberCounter) !!}
@endif
								 
<div class="row">
	<div class="col-sm-6">
	<div class="form-group">
{!! Form::label('member_code','会员编码') !!}
{!! Form::text('member_code',$member_code,['class'=>'form-control', 'id' => 'member_code', ($member_number_mode == \constNumberingMode::Auto ? 'readonly' : '')]) !!}		
	</div>
	</div>

	<div class="col-sm-6">
	<div class="form-group">
{!! Form::label('name','姓名',['class'=>'control-label']) !!}
{!! Form::text('name',null,['class'=>'form-control', 'id' => 'name']) !!}		
	</div>
	</div>
</div>	

<div class="row">	
@if(isset($member))
    <div class="col-sm-6">
		<div class="form-group">
			{!! Form::label('DOB','出生日期') !!}
			{!! Form::text('DOB',$member->DOB->format('Y-m-d'),['class'=>'form-control datepicker-default', 'id' => 'DOB']) !!}	
	    </div>								
    </div>
    @else
        <div class="col-sm-6">
		<div class="form-group">
			{!! Form::label('DOB','出生日期') !!}
			{!! Form::text('DOB',null,['class'=>'form-control datepicker-default', 'id' => 'DOB']) !!}	
	    </div>								
    </div>
@endif
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
    {!! Form::label('emergency_contact','紧急联系方式') !!}
{!! Form::text('emergency_contact',null,['class'=>'form-control', 'id' => 'emergency_contact']) !!}											
	</div>
	</div>
	<div class="col-sm-6">
    <div class="form-group">
    {!! Form::label('health_issues','健康问题') !!}
{!! Form::text('health_issues',null,['class'=>'form-control', 'id' => 'health_issues']) !!}
    </div>								
    </div>								
</div>

<div class="row">
	<div class="col-sm-6">
	<div class="form-group">
{!! Form::label('proof_name','会籍顾问') !!}
{!! Form::text('proof_name',null,['class'=>'form-control', 'id' => 'proof_name']) !!}		
	</div>
	</div>

	@if(isset($member))
	<?php
        $media = $member->getMedia('proof');
        $image = ($media->isEmpty() ? 'https://placeholdit.imgix.net/~text?txtsize=18&txt=NA&w=70&h=70' : url($media[0]->getUrl('form')));
    ?>
    <div class="col-sm-4">
	<div class="form-group">
{!! Form::label('proof_photo','会籍照片') !!}
{!! Form::file('proof_photo',['class'=>'form-control', 'id' => 'proof_photo']) !!}	
    </div>								
    </div>
    <div class="col-sm-2">
	<img alt="proof Pic" class="pull-right" src="{{ $image }}"/>
    </div>
	@else
	<div class="col-sm-6">
	<div class="form-group">
{!! Form::label('proof_photo','会籍照片') !!}
{!! Form::file('proof_photo',['class'=>'form-control', 'id' => 'proof_photo']) !!}	
    </div>								
    </div>
    @endif								
</div>

<div class="row">
@if(isset($member))
<?php
    $media = $member->getMedia('profile');
    $image = ($media->isEmpty() ? 'https://placeholdit.imgix.net/~text?txtsize=18&txt=NA&w=70&h=70' : url($media[0]->getUrl('form')));
?>
    <div class="col-sm-4">
	<div class="form-group">
{!! Form::label('photo','照片') !!}
{!! Form::file('photo',['class'=>'form-control', 'id' => 'photo']) !!}	
    </div>								
    </div>
    <div class="col-sm-2">
	<img alt="profile Pic" class="pull-right" src="{{ $image }}"/>
    </div>
	@else
	<div class="col-sm-6">
	<div class="form-group">
{!! Form::label('photo','照片') !!}
{!! Form::file('photo',['class'=>'form-control', 'id' => 'photo']) !!}	
    </div>								
    </div>
    @endif

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
{!! Form::label('aim','加入原因?',['class'=>'control-label']) !!}
{!! Form::select('aim',array('0' => '健康', '1' => '社交', '2' => '健身', '3' => '减肥', '4' => '增肌', '5' => '其他'),null,['class' => 'form-control selectpicker show-tick show-menu-arrow', 'id' => 'aim']) !!}		
	</div>
	</div>
	<div class="col-sm-6">
	<div class="form-group">
{!! Form::label('source','通过什么方式了解到我们?',['class'=>'control-label']) !!}
{!! Form::select('source',array('0' => '朋友推荐', '1' => '口头宣传', '2' => '其他'),null,['class' => 'form-control selectpicker show-tick show-menu-arrow', 'id' => 'source']) !!}		
	</div>
	</div>
</div>

<div class="row">	
	<div class="col-sm-6">
	<div class="row">
	<div class="col-sm-12">
    <div class="form-group">
{!! Form::label('occupation','职业') !!}
{!! Form::select('occupation',array('0' => '学生', '1' => '家庭主妇','2' => '个体经营','3' => '职业运动员','4' => '自由作家','5' => '其他'),null,['class' => 'form-control selectpicker show-tick show-menu-arrow', 'id' => 'occupation']) !!}											
	</div>
	</div>
	

	<div class="col-sm-12">
	<div class="form-group">
{!! Form::label('pin_code','手环编码',['class'=>'control-label']) !!}
{!! Form::text('pin_code',null,['class'=>'form-control', 'id' => 'pin_code']) !!}		
	</div>
	</div>
	</div>
	</div>

	<div class="col-sm-6">
	<div class="form-group">
	{!! Form::label('address','会籍记录') !!}
{!! Form::textarea('address',null,['class'=>'form-control', 'id' => 'address', 'rows' => 5]) !!}		
	</div>
	</div>
</div>