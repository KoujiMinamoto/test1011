window.onload=function(){
    
    var username;
    var usertype;
    var oDiv  =  document.getElementById('displayBox');
    var oUl = document.getElementsByTagName('ul')[0];
    var Li = oUl.getElementsByTagName('li');
    oUl.innerHTML = oUl.innerHTML+oUl.innerHTML;
    oUl.style.width = Li[0].offsetWidth*Li.length+'px';
    var speed = 2
    function move(){
        if(oUl.offsetLeft<-oUl.offsetWidth/speed){
            oUl.style.left = '0'
        }
        if(oUl.offsetLeft>0){
            oUl.style.left = -oUl.offsetWidth/speed+'px';
        }
        //oUl.style.left = oUl.offsetLeft-2+'px';//左
        oUl.style.left = oUl.offsetLeft+speed+'px';//右
    }    
    var timer = setInterval(move,30)
    oDiv.onmouseover=function(){
        clearInterval(timer);
    }	
    oDiv.onmouseout=function(){
         timer = setInterval(move,30)
    }   
}

function initPage() {

    var storage=window.localStorage;
    var login =storage.login;
    if (login == "login"){
        $("#login_id").html('dashboard');
        $("#register_id").html('logout');
    }else{
        $("#login_id").html('login');
        $("#register_id").html('register');
    }
    footerPosition();
    $(window).resize(footerPosition);

    //二级菜单
    $("#product_id").hover(function() {  
            $("#product_ul").show(200);  
        } ,
        function() {
            $("#product_ul").hide(200); 
        }
    ); 
    
    $("#design_id").hover(function() {  
        $("#design_ul").show(200);  
    } ,
        function() {
            $("#design_ul").hide(200); 
        }
    ); 

    $("#gallary_id").hover(function() {  
        $("#gallary_ul").show(200);  
    } ,
        function() {
            $("#gallary_ul").hide(200); 
        }
    ); 

}

function clickHeader(headerName) {
    reset();
    switch (headerName) {
        //product
        case 0:
            $(".home").addClass("clickOn");
            document.getElementById("home_div_id").style.display = "block";
            break;
        case 1:
            $(".product").addClass("clickOn");
            document.getElementById("product_div_id").style.display = "block";
            break;
        case 2:
            $(".design").addClass("clickOn");
            document.getElementById("design_div_id").style.display = "block";
            break;
        case 3:
            
            $(".gallary").addClass("clickOn");
            document.getElementById("gallary_div_id").style.display = "block";
            break;
        case 4:
            $(".support").addClass("clickOn");
            document.getElementById("support_div_id").style.display = "block";
            break;
        case 5:
            $(".aboutUs").addClass("clickOn");
            document.getElementById("aboutUs_div_id").style.display = "block";
            break;    
        case 6:
            $(".contact").addClass("clickOn");
            document.getElementById("contact_div_id").style.display = "block";
            break; 
        case 7:
            $(".cart").addClass("clickOn");
            document.getElementById("cart_div_id").style.display = "block";
            break;
        case 8:
            var storage=window.localStorage;
            var login =storage.login;
            if (login == "login"){
                document.getElementById("home_div_id").style.display = "block";
                var usertype = storage.usertype;
                document.getElementById("homepage_div_id").style.display = "none";
                if(usertype == '1'){
                    document.getElementById("dashboard_admin_div_id").style.display = "block";
                    document.getElementById("dashboard_div_id").style.display = "block";
                }
                else{
                    document.getElementById("dashboard_user_div_id").style.display = "block";
                }
            }else
            { 
                $(".login").addClass("clickOn");
                document.getElementById("login_div_id").style.display = "block";}
            break;
        case 9:
            var storage=window.localStorage;
            var login =storage.login;
            if (login == "login"){
                window.localStorage.setItem('login', "logout");
                $(".home").addClass("clickOn");
                document.getElementById("home_div_id").style.display = "block";
                $("#login_id").html('login');
                $("#register_id").html('register');
            }
            else{
            $(".register").addClass("clickOn");
            document.getElementById("register_div_id").style.display = "block";
            }
            break;  
        default :
            break;
    } 
    
}
function reset() {
    $(".home").removeClass("clickOn");
    $(".product").removeClass("clickOn");
    $(".design").removeClass("clickOn");
    $(".product").removeClass("clickOn");
    $(".gallary").removeClass("clickOn");
    $(".product").removeClass("clickOn");
    $(".support").removeClass("clickOn");
    $(".product").removeClass("clickOn");
    $(".aboutUs").removeClass("clickOn");
    $(".product").removeClass("clickOn");
    $(".contact").removeClass("clickOn");
    $(".cart").removeClass("clickOn");
    $(".login").removeClass("clickOn");
    $(".register").removeClass("clickOn");
    document.getElementById("home_div_id").style.display = "none";
    document.getElementById("product_div_id").style.display = "none";
    document.getElementById("design_div_id").style.display = "none";
    document.getElementById("gallary_div_id").style.display = "none";
    document.getElementById("support_div_id").style.display = "none";
    document.getElementById("aboutUs_div_id").style.display = "none";
    document.getElementById("contact_div_id").style.display = "none";
    document.getElementById("login_div_id").style.display = "none";
    document.getElementById("register_div_id").style.display = "none";
    document.getElementById("cart_div_id").style.display = "none";
    
}


function footerPosition(){
        $("footer").removeClass("fixed-bottom");
        var contentHeight = document.body.scrollHeight,//网页正文全文高度
            winHeight = window.innerHeight;//可视窗口高度，不包括浏览器顶部工具栏
        if(!(contentHeight > winHeight)){
            //当网页正文高度小于可视窗口高度时，为footer添加类fixed-bottom
            $("footer").addClass("fixed-bottom");
        }
}

//user login  need to move to a new file
function userLogin(){
    if ($('.login_div_un').val() == "" || $('.login_div_pass').val() == "") {
        alert("username or password can't be space");
    } else {
        let logininfo = {"username":'',"password":''};
        logininfo.username = $('.login_div_un').val();
        logininfo.password = $('.login_div_pass').val();
        
        $.ajax({
            type: "POST",
            url: "api/userLogin",
            dataType:'json',
            data: 
                    {
                        'username':logininfo.username,
                        'password':logininfo.password
                    },
            success: function (msg) {
                if (msg.logincheck == "success") {
                    // $.ajax({
                    //     headers: {
                    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    //     },
                    //     type: "POST",
                    //     url: "api/userLoginSuccess",
                    //     dataType:'json',
                    //     data: 
                    //             {
                    //                 'username':msg.username,
                    //                 'password':msg.type
                    //             },
                    // })
                    // window.localStorage.setItem('a', logininfo.username);
                    // window.location.href="http://localhost:81/dingo/public/userLogin";
                    window.localStorage.setItem('username', msg.username);
                    window.localStorage.setItem('usertype', msg.type);
                    window.localStorage.setItem('login', "login");
                    var storage=window.localStorage;
                    var usertype = storage.usertype;
                    document.getElementById("homepage_div_id").style.display = "none";
                    if(usertype == '1'){
                        document.getElementById("dashboard_admin_div_id").style.display = "block";}
                    else{
                        document.getElementById("dashboard_user_div_id").style.display = "block";
                    }

                }else if (msg.logincheck == false) {
                    alert("username or password is wrong");
                }else {
                    alert("unknow error");
                }
            },
            error: function (XMLHttpRequest, textStatus, thrownError) {
            }
        });
    }
}

//user register need to move to a new file

function userRegister() {

    let register = {
        "userName":$(".register_div_form_input").eq(0).val(),
        "email":$(".register_div_form_input").eq(1).val(),
        "password":$(".register_div_form_input").eq(2).val(),
        'phoneNumber':$(".register_div_form_input").eq(3).val(),
        'address':$(".register_div_form_input").eq(4).val(),
        'subrub':$(".register_div_form_input").eq(5).val(),
        'state':$(".register_div_form_input").eq(6).val(),
        'postcode':$(".register_div_form_input").eq(7).val()
    };
    
    $.ajax({
        type: "POST",
        url: "api/userRegister",
        dataType:'json',
        data: register,
        success: function (msg) {
            if (msg == "success") {
                alert("register success")
            }else if (msg == "repeat") {
                alert("the username is used by others");
            }else {
                alert("unknow error");
            }
        },
        error: function (XMLHttpRequest, textStatus, thrownError) {
        }
    });

}
