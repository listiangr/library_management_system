<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan | Home</title>
    <style>
    	#page{
    		background-color: #f0f0f0;
    		margin: 10px;
    		padding: 25px;
    	}
    	#header{
    		display: flex;
    		justify-content: space-between;
    		background-color: #999999;
    		padding: 25px;
    		margin: -25px;
    	}
    	#header h1{
    		font-size: 40px;
    		margin: auto 0;
    	}
    	#header ul{
    		margin: auto 0;
    	}
    	#header ul li{
    		display: inline;
    		text-align: center;
    	}
    	#header ul li a{
    		text-decoration: none;
    		font-size: 20px;
    		color: black;
    		padding: 20px;
    	}
    	#header ul li a:hover{
    		color: white;
    	}
    	#content{
    		padding: 25px;
    	}
    	#content h2{
    		text-align: center;
    		font-size: 30px;
    	}
		#content div{
			display: flex;
			flex-flow: row wrap;
			justify-content: space-around;
		}
		#content div img{
			width: 23%;
			padding: 15px;
		}
		#footer{
    		text-align: center;
    		font-weight: bold;   
    		background-color: #999999;
    		padding: 1px;
    		margin: -25px;
		}
    </style>
</head>
<body>
	<div id="page">
		<!-- Header Start -->
		<div id="header">
			<h1>PerpusX</h1>
			<ul>
				<li><a href="<?php echo site_url('home');?>">Home</a></li>
                <li><a href="<?php echo site_url('member');?>">Member</a></li>
                <li><a href="<?php echo site_url('biblio');?>">Biblio</a></li>
                <li><a href="<?php echo site_url('transaksi');?>">Transaksi</a></li>
			</ul>
		</div>
		<!-- Header End -->

		<!-- Content Start -->
		<div id="content">
			<h2>Selamat Datang di PerpusX</h2><hr>
			<div>
				<img src="<?php echo site_url("assets/images/library2.jpg");?>" alt="library2">
                <img src="<?php echo site_url("assets/images/library3.jpg");?>" alt="library3">
                <img src="<?php echo site_url("assets/images/library4.jpg");?>" alt="library4">
			</div>
			<div>
				<img src="<?php echo site_url("assets/images/library5.jpg");?>" alt="library5">
                <img src="<?php echo site_url("assets/images/library6.jpeg");?>" alt="library6">
                <img src="<?php echo site_url("assets/images/library7.jpg");?>" alt="library7">
			</div>
		</div><br>
		<!-- Content End -->

		<!-- Footer Start -->
		<div id="footer">
			<p>Copyright © 2022 PerpusX | 2008084 - Listia Ningrum</p>
		</div>
		<!-- Footer End -->
	</div>
</body>
</html>