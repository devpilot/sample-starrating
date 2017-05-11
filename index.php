<!DOCTYPE HTML>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>Star</title>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.6.2.min.js"></script>
        <script type="text/javascript">
            var curClas;
            $(document).ready(function(){
                // Get data from store on load
                $.post("pro.php",function(data){
                    StarSwitcher(data);
                    // Store the css position to a veriable for later use
                    _pick = y;
                    $("#rate").css("background-position", y);
                })
                $("#rate>div").hover(function(){
                    curClas = (this.className).slice(1);
                    StarSwitcher(curClas);
                    $("#rate").css("background-position", y);
                },function(){
                    $("#rate").css("background-position", _pick)
                }).click(function(){
                    $.post("pro.php",{q:"_p",v:curClas}, function(data){
                        StarSwitcher(data);
                        _pick = y;
                        $("#rate").hide();
                        $(".fb").fadeIn().delay(800).fadeOut("slow", function(){
                            $("#rate").css("background-position", y).fadeIn("fast");
                        });
                        
                    });
                });
            });
            function StarSwitcher(_v){
                switch (_v)
                {
                    case "1":
                        y ="0 -30px";
                        break;
                    case "2":
                        y ="0 -60px";
                        break;
                    case "3":
                        y ="0 -90px";
                        break;
                    case "4":
                        y ="0 -120px";
                        break;
                    case "5":
                        y ="0 -150px";
                        break;
                    default:
                        y = "0 0";
                }
                return y;
            }
        </script>
        <style type="text/css">
            #r_cont {
                width: 150px;
                height: 30px;
            }
            #rate {
                width: 150px;
                height: 30px;
                background:url(star.png) top;
            }
            .s1, .s2, .s3, .s4, .s5 {
                float:left;
                width:30px;
                height:30px;
            }
            .fb {
                display: none;
                padding: 3px;
                background: #f6f1b4;
                border: 1px solid #d9d282;
                text-align: center;
                -webkit-border-radius: 5px;
                -moz-border-radius: 5px;
                border-radius: 5px; 

            }
        </style>
    </head>

    <body>
        <div id="r_cont">
            <div id="rate">
                <div class="s1"></div>
                <div class="s2"></div>
                <div class="s3"></div>
                <div class="s4"></div>
                <div class="s5"></div>
            </div>
            <div class="fb"><i>Thank you for your rating</i></div>
        </div>
    </body>
</html>
