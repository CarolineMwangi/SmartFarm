<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smart Farm</title>
    <style>
          body
         {
             margin: 0;
             padding: auto;
             font-family: 'Times New Roman', serif;
         }
         .header
         {
             width: 1360px;
             height:80px;
         }
        .logo
        {
            float: left;
        }
        .dropbtn1 {
            color: black;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-top:4px;
            margin-left:40px;
            cursor: pointer;
            border-radius: 16px;
            border:none;
            background-color:#AFEEEE;
        }
        .dropdown_sign {
            position: relative;
            display: inline-block;
            float: right;
            margin-top: 30px;
            margin-right:40px;
        }
        .dropdown-sign-content {
             display: none;
             position: absolute;
             background-color: #f1f1f1;
             min-width: 160px;
             box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
             z-index: 1;
        }
        .dropdown-sign-content a {
             color: black;
             padding: 12px 16px;
             text-decoration: none;
             display: block;
        }
        .dropdown-sign-content a:hover {
            color: red;
        }
        .dropdown_sign:hover .dropdown-sign-content {
            display: block;
        }
        .dropdown_sign:hover .dropbtn1 {
            background-color: turquoise;
            text-decoration:underline;
        }
        .dropbtn2 {
            color: black;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-top:4px;
            margin-left:40px;
            cursor: pointer;
            border-radius: 16px;
            border:none;
            background-color:#AFEEEE;
        }
        .dropdown_log {
            position: relative;
            display: inline-block;
            float: right;
            margin-top: 30px; 
        }
        .dropdown-log-content {
             display: none;
             position: absolute;
             background-color: #f1f1f1;
             min-width: 160px;
             box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
             z-index: 1;
        }
        .dropdown-log-content a {
             color: black;
             padding: 12px 16px;
             text-decoration: none;
             display: block;
        }
        .dropdown-log-content a:hover {
            color: red;
        }
        .dropdown_log:hover .dropdown-log-content {
            display: block;
        }
        .dropdown_log:hover .dropbtn2 {
            background-color: turquoise;
            text-decoration:underline;
        }
        .intro
        {
            width = 1366px;
            height = 700px;
            background:url(img6.jpeg);
            background-size:1366px 700px;
            background-position:center;
            background-repeat: no-repeat;
            padding-left: 330px;
            margin-top:20px;
        }
       
        .intro a
        {
            color: black;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-top:4px;
            cursor: pointer;
            border-radius: 16px;
            border:1px solid;
            background-color:white; 
        }
        .intro a:hover
        {
            background-color:turquoise;
            text-decoration:underline;
        }
        .image2
        {
            margin-left: 770px;
            margin-top:  40px;
        }
       .words
        {
            width: 400px;
            padding-top: 30px;
            padding-left: 150px;
            padding-bottom:30px;
            text-align:center; 
        }
        .pintro
        {
            font-size: 19px;
        }
        .seller
        {
            width = 1366px;
            height = 700px;
            background-color:white;
            padding-left: 320px;
            margin-top:30px;
        }
        .seller a
        {
            color: black;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-top:4px;
            cursor: pointer;
            border-radius: 16px;
            border:1px solid;
            background-color:#AFEEEE; 
        }
        .seller a:hover
        {
            background-color:white;
            text-decoration:underline;
        }
        .buyer
        {
            width:1366px;
            height : 300px;
            background-color:#AFEEEE;
            padding: auto;
            margin-top:30px;
            padding-left: 330px;
            
        }
        .buyer a
        {
            color: black;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            margin-top:4px;
            cursor: pointer;
            border-radius: 16px;
            border:1px solid;
            background-color:white; 
        }
        .buyer a:hover
        {
            background-color:turquoise;
            text-decoration:underline;
        }
        .logo-div
        {
            width :1366px;
            height:250px;
            padding-left: 440px;
        }
        

        .footer .credit{
            padding: 2.5rem 1rem;
            border-top:.1rem solid rgba(0, 0, 0, .1);
            margin-top: 40px;
            text-align: center;
            font-size: 15px;
        }
        .footer .credit span{
            color: var(--green);
        }
      
    </style>
</head>
<body>
    <div class = "header">
        <img src="SFLogo.png" class ="logo" width = "190" height = "95">

        <div class="dropdown_sign">
            <button class="dropbtn1">SIGN UP</button>
        <div class="dropdown-sign-content">
            <a href="signup_farmer.php">As seller</a>
            <a href="signup_user.php">As buyer</a>
         </div>
        </div>

        <div class="dropdown_log">
            <button class="dropbtn2">LOG IN</button>
        <div class="dropdown-log-content">
            <a href="login_farmer.php">As seller</a>
            <a href="login_user.php">As buyer</a>
            <a href="login_admin.php">As admin</a>
         </div>
        </div>
    </div>

    <div class = "intro">
        <div class = "words">
        <h1>SMART FARM ONLINE SHOPPING</h1>
        <p class = "pintro"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Esse accusantium placeat provident atque omnis repellendus in exercitationem! Vitae optio sequi mollitia, similique consectetur exercitationem? Ipsum atque reprehenderit unde illum incidunt.</p>
        <a href="login_user.php">SHOP WITH US</a>
        </div>
    </div>

    <div class = "seller">
        <div class = "words">
        <h1>ADVERTISE YOUR PRODUCTS</h1>
        <p class = "pintro"> Lorem ipsum dolor, sit amet consectetur adipisicing elit. Molestiae architecto dolor aperiam natus autem! Magnam eum consequuntur tempore nulla maxime modi molestiae, iure doloremque nam deleniti natus impedit officia error.</p>
        <a href="login_farmer.php">POST YOUR PRODUCTS</a>
        </div>
    </div>

    <div class = "buyer">
        <div class = "words">
        <h1>SHOP FARM PRODUCE</h1>
        <p class = "pintro"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum in molestiae nesciunt, similique, et adipisci commodi dolorem officiis numquam at quidem eaque odit voluptate, nihil necessitatibus incidunt magni ut? Nisi.</p>
        <a href="login_user.php">SHOP WITH US</a>
        </div>
    </div>

    <div class = "logo-div">
        <img src="SFLogo.png" class="logo" width = "490" height = "245">
    </div> 

    <section class="footer">
            <h1 class="credit">All rights reserved.<br>©2021. </h1>
            
        </section>

</body>
</html>