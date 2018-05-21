@extends('app')

@section('content')
<style type = "text/CSS">
    body {
        margin: 0;
        padding: 0;
        line-height: 1.5em;
        font-family: "Times New Roman", Times, serif;
        font-size: 14px;
        color: #000000;
        background: #f2e7ca url(images/templatemo_body.jpg) top center no-repeat;
    }
    .memberInfoDetail {
        margin: 15px;
        padding: 15px;
        top: 250px;
        left: 350px;
        width: 1000px;
        height: 110px;
        /* border: 1px solid red; */
        color: black;
        z-index: 1000;
        display: block;
    }
    table.altrowstable {
        font-family: verdana,arial,sans-serif;
        font-size:11px;
        color:#333333;
        border-width: 1px;
        border-color: #a9c6c9;
        border-collapse: collapse;
    }
    table.altrowstable th {
        border-width: 1px;
        padding: 8px;
        text-align: center;
        width: 200px;
        height: 50px;
        border-style: solid;
        border-color: #a9c6c9;
    }
    table.altrowstable td {
        border-width: 1px;
        padding: 10px;
        height: 50px;
        text-align: center;
        border-style: solid;
        border-color: #a9c6c9;
    }
    .oddrowcolor{
        background-color:#fff;
    }
    .evenrowcolor{
        background-color:#ddd;
    }
</style>
<div class="rightside bg-grey-100">

    <!-- BEGIN PAGE HEADING -->
    <div class="page-head bg-grey-100 padding-top-15 no-padding-bottom">
        @include('flash::message')
        <ul class="nav nav-tabs">
            <li id = "logoutHandle" class="active"><a href="{{ action('MembersController@showMemSts') }}"><h3>会员信息</h3></a></li>
            <li id = "loginHandle" ><a href="{{ action('MembersController@launch') }}"><h3>会员签到</h3></a></li>
            <li id = "logoutHandle" ><a href="{{ action('MembersController@logout') }}"><h3>会员注销</h3></a></li>
        </ul>
    </div><!-- / PageHead -->


    <div class = "memberInfoDetail">
        <table class="altrowstable" id="alternatecolor">
            <thead>
                <tr>
					<th>照片</th>
					<th>会员ID</th>
		            <th>会员姓名</th>            
		            <th>联系方式</th>
		            <th>套餐</th>
		            <th>会员卡状态</th>
		            <th>签到状态</th>
		            <th>绑定手环</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($members as $member)
                <?php 
                    $subscriptions = $member->subscriptions;
                    foreach($subscriptions as $subscription)
                    {
                    	$plansArray[] = $subscription->plan->plan_name;
                    }
                    $images = $member->getMedia('profile');
                    $profileImage = ($images->isEmpty() ? 'https://placeholdit.imgix.net/~text?txtsize=18&txt=NA&w=50&h=50' : url($images[0]->getUrl('thumb')));
                    //echo "<pre>";
                    //print_r($plansArray);
                    //echo "</pre>";
                ?>
                    <tr>
                    	<td><a href="{{ action('MembersController@show',['id' => $member->id]) }}"><img src="{{ $profileImage }}"/></a></td>
                        <td><a href="{{ action('MembersController@show',['id' => $member->id]) }}">{{ $member->member_code}}</a></td>
                        <td><a href="{{ action('MembersController@show',['id' => $member->id]) }}">{{ $member->name}}</a></td>
                        <td>{{ $member->contact}}</td>
                        <td>{{ implode(",",$plansArray) }}</td>
                        <td><span class="{{ Utilities::getActiveInactive ($member->status) }}">{{ Utilities::getStatusValue ($member->status) }}</span></td>
                        @if($member->pin_code != 0)
                        <td>签到</td>
                        <td>{{ $member->pin_code}}</td>
                        @else
                        <td>未签到</td>
                        <td>-</td>
                        @endif
                    </tr>
                @endforeach
            </tbody>	
        </table>
    </div>

</div><!-- / RightSide -->
@stop
@section('footer_script_init')
    <script type="text/javascript" runat = "server">
        $(document).ready(function(){
            gymie.deleterecord();                      
        });

        var tableHdl = document.getElementById("alternatecolor");
        var rows = tableHdl.getElementsByTagName("tr");
        for(var i = 0; i < rows.length; i++){
            if((i % 2) == 0) {
                rows[i].className = "evenrowcolor";
            } else {
                rows[i].className = "oddrowcolor";
            }
        }
    </script>
@stop        
