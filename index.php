<!DOCTYPE html>
<html>
<head>
    <title>土豆炖蘑菇的店</title>
	<meta charset="utf-8">
    <meta name="format-detection" content="telephone=no, email=no"/>
    <script type="text/javascript" src="../../js/jquery-1.11.0.min.js"></script>
    <script type="text/javascript" src="js/mydpr.js"></script>
    <link rel="stylesheet" type="text/css" href="http://ilovecc.ren/wp-content/themes/quest/css/normalize.css"/>
    <link rel="stylesheet" type="text/css" href="css/base.css?version=654654"/>
</head>
<body>
<div id="wrap">
    <div id="banner-area">
	    <div class = "banner-card"></div>
        <div class="banner">
            <div class="banner-title">
                <h1 class = "firm">土豆炖蘑菇的店</h1>
            </div>
			<div class = "describe">
			    <div class = "discount"><span class = "big">8</span><span class = "round"></span>6折</div>
				<div class = "type">会员卡</div>
			</div>
        </div>
    </div>
	
    <div class="content hide">
        <div class="button-area" id="user-record">
            <form id="form_member">
                <div class = "button-wrapper">
                    <input type="text" name="mobile" class = "mobile" placeholder="请输入手机号码"/><!--
					--><div id="btnSendCode"/>验证码</div>
                    <input type="hidden" name="sid" class = "sid" value="{==$data['serialId']=}">	
                </div>
				<div class = "button-wrapper">
                    <input type="text" name="verCode" class = "code" placeholder="请输入验证码"/>
                </div>
                <div class = "button"><div id="btnGet" class = "red-button">立即领取</div></div>
            </form>
        </div>
    </div>

	<div class="react hide">
	    <div class = "success"></div>
        <div class="button-area" id="user-record">
            <div class = "button-wrapper"><a href="http://www.ilovecc.ren" class = "red-button">清除cookie</a></div>
        </div>
    </div>
	
	
    <div class="rule">
        <div class="des-title">
            <div class="title">使用规则</div>
        </div>
        <div class="rule-detail">
		    <div class = "detail-wrapper">
			    <ul class = "details">
				    <li>1、领取的会员卡需要下载APP使用，当进入APP时登录此手机号码，即可以使用</li>
				</ul>
			</div>
			
		</div>
    </div>
</div>
<script type="text/javascript">
$(function () {      
    var activeInfo = myCookie.getCookie("active_1");
    if (!activeInfo) {
        $(".content").show();
    } else {
        $(".react").show();
    }

    $("#btnGet").on("click", function () {
        var mobile = $(".mobile").val(),
		    code = $(".code").val();
        if (!mobile) {
            alert("请输入手机号码!");
            return false;
        } else if(!code) {
			alert("请输入验证码！");
			return false;
		} else {
            myCookie.setCookie("active_1", 1);
            window.location.reload();
		}
    });
});
$('#btnSendCode').click(function(){
    var mobile = $(".mobile").val();
	var that = $(this),
		delay = 60;
    function count() {
        delay--;
		that.find("span").html(delay);
        if (delay > 0) {
            setTimeout(count, 1000);
        } else {
            that.html("验证码");
			that.removeClass("prevent");
        }
    }
	if(!mobile) {
		alert("请输入验证码！");
		return false;
	} else {
		alert('验证码已经下发，请注意查收');
	    that.addClass("prevent");
        that.html("<span>60</span>s后重试");
	    setTimeout(count, 1000);
	}
})
$('.clear').click(function(){
    myCookie.clearCookie("active_1");
	window.location.reload();
})

 var myCookie = {
    getCookie: function (name) {
        var arr, reg = new RegExp("(^| )" + name + "=([^;]*)(;|$)");
        if (arr = document.cookie.match(reg)) {
            return unescape(arr[2]);
        } else {
            return null;
        }
    },
    //设置cookie
    setCookie: function (name, value, path, domain, exdays) {
        var d = new Date();
        exdays = exdays ? exdays : 1;
        d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
        var expires = ";expires=" + d.toUTCString();
        document.cookie = name + "=" + value +
            ((path) ? ";path=" + path : "") +
            ((domain) ? ";domain=" + domain : "") +
            expires;
    },
    //清除cookie
    clearCookie: function (name, path, domain) {
        if (this.getCookie(name)) {
            document.cookie = name + "=" +
                ((path) ? ";path=" + path : "") +
                ((domain) ? ";domain=" + domain : "") +
                ";expires=Thu, 01 Jan 1970 00:00:01 GMT";
        }
    },
    checkCookie: function () {
        var user = this.getCookie("username");
        if (user != "") {
            alert("Welcome again " + user);
        } else {
            user = prompt("Please enter your name:", "");
            if (user != "" && user != null) {
                setCookie("username", user, 365);
            }
        }
    }
}

</script>
</body>
</html>
