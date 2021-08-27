<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>About Us Section</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
</head>
<body>
	<style type="text/css">
	@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300&display=swap');

		*{
			margin: 0px;
			padding: 0px;
			box-sizing: border-box;
			font-family: 'Times New Roman', serif;
		}
		.section{
			width: 100%;
			min-height: 100vh;
			background-color: #fff;
		}
		.container{
			width: 80%;
			display: block;
			margin: auto;
			padding-top: 100px;
		}
		.content-section{
			float: left;
			width: 40%;
		}
		.image-section{
			float: right;
			width: 40%;
		}
		.image-section img{
			width: 100%;
			height: auto;
		}
		.content-section .title{
			text-transform: uppercase;
			font-size: 40px;
		}
		.content-section .content h3{
			margin-top: 30px;
			color: #5d5d5d;
			font-size: 25px;

		}
		.content-section .content p{
			margin-top: 10px;
			font-family: sans-serif;
			font-size: 32 px;
			line-height: 1.5;
		}
		.content-section .content .button{
			margin-top: 30px;
		}
		.content-section .content .button a{
			background-color: #0000FF;
			padding: 12px 40px;
			text-decoration: none;
			color: #fff;
			font-size: 25px;
			letter-spacing: 1.5px;
		}
		.content-section .content .button a:hover{
			background-color: #a52a2a;
			color: #fff;
		}
		.content-section .social{
			margin-top: 40px 40px;
		}
		.content-section .social i{
			color: #16E2F5;
			font-size: 30px;
			padding: 0px 10px;

		}
		.content-section .social i:hover{
			color: #3d3d3d;
		}
		@media screen and (max-width: 768px){
			.container{
				width: 80%;
				display: block;
				margin: auto;
				padding-top: 50px;
			}
			.content-section{
				float: none;
				width: 100px;
				display: block;
				margin: auto;
			}
			.image-section{
				float: none;
				width: 100px;
				

			}
			.image-section img{
				width: 100%;
				height: auto;
				display: block;
				margin: auto;

			}
			.content-section .title{
				text-align: center;
				font-size: 19px;
			}
			.content-section .content .button{
				text-align: center;
			}
			.content-section .content .button a{
				padding: 9px 30px;
			}
			.content-section .social{
				text-align: center;
			}



		}






	</style>




	<div class="section">
		<div class="container">
			<div class="content-section">
				<div class="title">
					<h1>SmartFarm</h1>
				</div>
				<div class="content">
				<h3>AN APPLICATION THAT OFFERS REAL FARM FRESHNESS</h3>
				<p>Smartfarm aims to provide an excellent platform where farmers and consumers can interact freely through advertisement and purchase of quality and fresh farm products.</p>
				
				<br>
				<br>
				<br>

				</div>
			
			<div class="social">
				<a href=""><i class="fab fa-facebook-f"></i></a>
				<a href=""><i class="fab fa-twitter"></i></a>
				<a href=""><i class="fab fa-instagram"></i></a>
				
			</div>
			</div>
			<div class="image-section">
				<img src="aboutus.jpg">
			</div>
		</div>
	</div>


</body>
</html>