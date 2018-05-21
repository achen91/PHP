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
    .scanInput{
        position: absolute;
        top: 200px;
        left: 350px;
        width: 350px;
        height: 120px;
        /* border: 1px solid black; */
        color: black;
        z-index: 1000;
        background: #E9E9E9;
        /* border:1px solid #CCC;  */
        background-color:#F9F9F9; 
        border:1px solid #CCC; 
        padding:15px;
        box-shadow: #666 0px 0px 10px;
    }
    .memberInfoDetail {
        position: absolute;
        top: 370px;
        left: 350px;
        width: 1000px;
        height: 110px;
        /* border: 1px solid red; */
        color: black;
        z-index: 1000;
        display: none;
    }
    .cardFlashInput{
        position: absolute;
        top: 530px;
        left: 350px;
        width: 330px;
        height: 120px;
        /* border: 1px solid black; */
        color: black;
        z-index: 1000;
        background: #E9E9E9;
        /* border:1px solid #CCC;  */
        background-color:#F9F9F9; 
        border:1px solid #CCC; 
        padding:15px;
        box-shadow: #666 0px 0px 10px;
        display:none;
    }
    .loginUserInfo {
        position: absolute;
        top: 400px;
        left: 280px;
        width: 800px;
        height: 80px;
        /* border: 1px solid red; */
        color: blue;
        z-index: 1000;
        display:none;
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
<?php
	
    $CurrentScanUserId;
    $CurrentScanUserName;
    $CurrentScanUserContact;
    $CurrentScanUserIndexId;
    $CurrentScanUserSts;
    $CurrentScanUser;
    $CurrentReqExist;
    $images;
    $profileImage;
    $plansArray;

    $CurrentScanUserId = 0;
    $CurrentScanUserName = 0;
    $CurrentScanUserContact = 0;
    $CurrentScanUserIndexId = 0;
    $CurrentScanUserSts = 0;
    $CurrentScanUser = 0;
    $CurrentReqExist = 0;
    $images=0;
    $profileImage=0;
?>

<?php
    //$member111 = Member::findOrFail($id);
    //echo("<script>console.log('".json_encode("nb")."');</script>");
    //echo("<script>console.log('".json_encode($member111)."');</script>");
?>
<div class="rightside bg-grey-100">

    <!-- BEGIN PAGE HEADING -->
    <div class="page-head bg-grey-100 padding-top-15 no-padding-bottom">
        @include('flash::message')
        <ul class="nav nav-tabs">
            <li id = "logoutHandle" ><a href="{{ action('MembersController@showMemSts') }}"><h3>会员信息</h3></a></li>
            <li id = "loginHandle" class="active"><a href="{{ action('MembersController@launch') }}"><h3>会员签到</h3></a></li>
            <li id = "logoutHandle" ><a href="{{ action('MembersController@logout') }}"><h3>会员注销</h3></a></li>
        </ul>
    </div><!-- / PageHead -->

    <div class = "scanInput">
        <h4>请扫描会员卡:</h4>
        {!! Form::Open(['method' => 'GET']) !!}
        <input type = "text" id = "ScanInfo" name = "text" style = "margin-top: 10px;float:left"/>
        <input type = "submit" id = "startScanInfoButton" name = "sub" style = "float:left;margin-left:30px;margin-top: 10px;width:45px;" value = "确定"/>
        <input type = "button" id = "cleanScanInfoButton" style = "float:left;margin-left:10px;margin-top: 10px;width:45px;" value = "清除"/>
        {!! Form::Close() !!}
        @foreach ($members as $member)
        <?php
            
            $subscriptions = $member->subscriptions;
            echo("<script>console.log('".json_encode($member)."');</script>");
            
            $name = Input::get("text");
            echo("<script>console.log('".json_encode("获取到的name值<<<<<<<<<<<<<<：").json_encode($name)."');</script>");
            echo("<script>console.log('".json_encode("：").json_encode($member->id)."');</script>");
            echo("<script>console.log('".json_encode("获取到的name值>>>>>>>>>>>>>>：").json_encode($name)."');</script>");
            if($name == ($member->member_code))
            {
                $CurrentScanUserId = $member->member_code;
                $CurrentScanUserName = $member->name;
                $CurrentScanUserContact = $member->contact;
                $CurrentScanUserIndexId = $member->id;
                $CurrentScanUserSts = $member->pin_code;
                $CurrentScanUser = $member;
                $CurrentReqExist = 1;
                foreach($subscriptions as $subscription)
                {                	
                	$plansArray[] = $subscription->plan->plan_name;	  	
                }                

                 $images = $member->getMedia('profile');
                 $profileImage = ($images->isEmpty() ? 'https://placeholdit.imgix.net/~text?txtsize=18&txt=NA&w=50&h=50' : url($images[0]->getUrl('thumb')));
            }else {
                echo("<script>console.log('".json_encode("第一个没进来")."');</script>");
                //echo "不好意思，会员ID不存在";
            }


        ?>
        @endforeach
        <?php
            //echo("<script>console.log('".json_encode("获取到的id值：").json_encode($member->id)."');</script>");
        ?>
        <!-- <a id = "loginMemberUid" href="{{ action('MembersController@launch',['id' => $member->id]) }}" style = "display:none">请求登录</a> -->
    </div>
    
    <div class = "memberInfoDetail" id = "userInfoContainer">
        <!-- Table goes in the document BODY -->
        @if($CurrentReqExist == 1)
        <table class="altrowstable" id="alternatecolor">
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
        <tr> 
           <td><a href="{{ action('MembersController@show',['id' => $member->id]) }}"><img src="{{ $profileImage }}"/></a></td>
       		<td id = "userInfoId">
                none
            </td>   	
            <td id = "userInfoName">
                none
            </td>            
            <td>
                <span id = "userInfoContact">none</span>
            </td>
            <td>{{ implode(",",$plansArray) }}</td>
            	<td><span class="{{ Utilities::getActiveInactive ($member->status) }}">{{ Utilities::getStatusValue ($member->status) }}</span></td>
            <td>
                <span id = "userInfoLoginSts">none</span>
            </td>
            <td>
                <span id = "userInfoLoginId">none</span>
            </td>
        </tr>
        </table> 
        @endif
    </div>

    <div class = "cardFlashInput" id = "cardFlashInput">
        <h4>请刷卡登录:</h4>
        {!! Form::model($CurrentScanUser, ['method' => 'POST','files'=>'true','action' => ['MembersController@updatePinCode',$CurrentScanUserIndexId],'id'=>'membersform']) !!} 
        <input type = "text" name = "pin_code" id = "internalCardInfo" name = "text" style = "margin-top: 10px;float:left"/>
        <input type = "submit" name = "sub" style = "float:left;margin-left:30px;margin-top: 10px;width:45px;" value = "确定"/>
        <input type = "button" id = "cleanInternalCardInfo" style = "float:left;margin-left:10px;margin-top: 10px;width:45px;" value = "取消"/>
        {!! Form::Close() !!}
    </div>

</div><!-- / RightSide -->
@stop
@section('footer_script_init')
    <script type="text/javascript" runat = "server">
        $(document).ready(function(){
            gymie.deleterecord();  
            eventListenreStart();                     
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
        
        function cyclicTask() {
            var loginMemberId = "<?php echo $CurrentScanUserId; ?>";
            var loginMemberName = "<?php echo $CurrentScanUserName; ?>";
            var loginMemberContact = "<?php echo $CurrentScanUserContact; ?>";
            var loginMemberReq = "<?php echo $CurrentReqExist; ?>";
            var loginMemberPinCode = "<?php echo $CurrentScanUserSts; ?>";

            document.getElementById("userInfoId").innerHTML = loginMemberId;
            document.getElementById("userInfoName").innerHTML = loginMemberName;
            document.getElementById("userInfoContact").innerHTML = loginMemberContact;
            
            if(loginMemberReq == 1) {
                document.getElementById("userInfoContainer").style.display = "block";
                if(loginMemberPinCode != 0) {
                    document.getElementById("userInfoLoginSts").innerHTML = "签到";
                    document.getElementById("userInfoLoginId").innerHTML = loginMemberPinCode;
                    document.getElementById("cardFlashInput").style.display = "none";
                }else {
                    document.getElementById("userInfoLoginSts").innerHTML = "未签到";
                    document.getElementById("userInfoLoginId").innerHTML = "-";
                    document.getElementById("cardFlashInput").style.display = "block";
                }
            }else {
                document.getElementById("userInfoContainer").style.display = "none";
                document.getElementById("cardFlashInput").style.display = "none";
            }
        }

        var cyclicTaskObj = window.setInterval(cyclicTask,200);
        // document.getElementById("cancelButton").addEventListener("click", function() {
        //     loginMemberReq = 0;
        //     document.getElementById("userInfoContainer").style.display = "none";
        // })

        function eventListenreStart() {
            /*Add the tap event monitor*/
            document.getElementById("loginHandle").addEventListener("click", function() {
                document.getElementById("loginHandle").classList.add("active");
                document.getElementById("logoutHandle").classList.remove("active");
            });
            document.getElementById("logoutHandle").addEventListener("click", function() {
                document.getElementById("logoutHandle").classList.add("active");
                document.getElementById("loginHandle").classList.remove("active");
            });
            document.getElementById("cleanScanInfoButton").addEventListener("click", function() {
                document.getElementById("ScanInfo").value = "";
            });    
            document.getElementById("cleanScanInfoButton").addEventListener("click", function() {
                clearInterval(cyclicTaskObj);
                document.getElementById("userInfoContainer").style.display = "none";
                document.getElementById("cardFlashInput").style.display = "none";
            });  
            document.getElementById("cleanInternalCardInfo").addEventListener("click", function() {
                clearInterval(cyclicTaskObj);
                document.getElementById("userInfoContainer").style.display = "none";
                document.getElementById("cardFlashInput").style.display = "none";
            });   
            document.getElementById("startScanInfoButton").addEventListener("click", function() {
                window.setTimeout(function() {
                    cyclicTaskObj = window.setInterval(cyclicTaskObj,500);
                }, 200);
            });
        }
    </script>
@stop        
