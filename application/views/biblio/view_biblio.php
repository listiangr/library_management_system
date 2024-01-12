<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan | Biblio</title>
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
    	#content table, #content tr, 
        #content th, #content td{
    		border: 1px solid black;
            border-collapse: collapse;
            padding: 10px;
            text-align: center;
            margin-left: auto;
            margin-right: auto;
    	}
        #content table tr th{
            background-color: #d3d3d3;
        }
        #content a{
            text-decoration: none;
            color: black;
        }
        #content button{
            background-color: #abc4ff;
            width: 125px;
            height: 25px;
            border: 1px solid grey;
        }
        #content td button{
            background-color: #abc4ff;
            width: 50px;
            height: 25px;
            border: 1px solid grey;
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
			<h2>Daftar Biblio PerpusX</h2><hr>
            <center><button><a href="<?php echo site_url('biblio/tambah');?>">Tambah Biblio</a></button></center><br>
            <?php if(!empty($this->session->flashdata('info'))){ ?>
                <div><center><?= $this->session->flashdata('info'); ?><center></div><br>
            <?php }?>
			<table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Kode Biblio</th>
                        <th>Judul Buku</th>
                        <th>Nama Pengarang</th>
                        <th>Nama Penerbit</th>
                        <th>Tahun Terbit</th>
                        <th>Jumlah Copy</th>
                        <th>Sisa Copy</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($data as $row) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->kode_biblio; ?></td>
                            <td><?= $row->judul_buku; ?></td>
                            <td><?= $row->nama_pengarang; ?></td>
                            <td><?= $row->nama_penerbit; ?></td>
                            <td><?= $row->tahun_terbit; ?></td>
                            <td><?= $row->jumlah_copy; ?></td>
                            <td><?= $row->sisa_copy; ?></td>
                            <td>
                                <button><a href="<?php echo site_url("koleksi/index/".$row->id_biblio);?>">Detail</a></button>
                                <button><a href="<?php echo site_url("biblio/edit/".$row->id_biblio);?>">Edit</a></button>
                            </td>
                        </tr><?php 
                    }?>
                </tbody>
			</table>
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