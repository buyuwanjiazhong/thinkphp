<style type="text/css">
        .corInsertHref
        {
            position: absolute;
            z-index: 10000;
            width: 370px;
            float: left;
            display: none;
            background-color: #fff;
            padding: 10px;
        }
        .corBackground
        {
            width: 100%;
            height: 100%;
            position: absolute;
            background-color: #000;
            top: 0;
            left: 0;
            filter: alpha(opacity=30);
            -moz-opacity: 0.30;
            -khtml-opacity: 0.30;
            opacity: 0.30;
            z-index: 9999;
            display: none;
        }
    </style>
 
    <script type="text/javascript">
        $(function() {
            //点击登录按钮 弹出层并初始化弹出层位置
            $("#btnlogin").click(function() {
                $("#corBackground").animate({ opacity: "show" }, "slow");
                $("#corInsertHref").animate({ opacity: "show" }, "slow");
                autoSize($("#corInsertHref"));
            });
            //窗口大小缩放事件
            $(window).resize(function() {
                autoSize($("#corInsertHref"));
            });
            //窗口大小缩放时调整弹出层的位置
            var autoSize = function(corObj) {
                var wWidth = $(window).width(), wHeight = $(window).height();
                var ihWidth = corObj.outerWidth(true), ihHeight = corObj.outerHeight(true);
 
                corObj.css({ "top": ((wHeight - ihHeight) / 2) + "px", "left": ((wWidth - ihWidth) / 2) + "px" });
            }
        });
    </script>

    <div id="corInsertHref" class="corInsertHref">
        <p>
            账号<input id="txtName" type="text" /></p>
        <p>
            密码<input id="txtPwd" type="text" /></p>
        <p>
            <input type="button" value="登 录" /></p>
    </div>
    <div id="corBackground" class="corBackground">
    </div>