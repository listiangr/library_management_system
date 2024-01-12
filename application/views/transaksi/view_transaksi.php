<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Perpustakaan | Transaksi</title>
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
            width: 100px;
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
			<h2>Daftar Transaksi PerpusX</h2><hr>
            <center><button><a href="<?php echo site_url('transaksi/tambah');?>">Tambah Transaksi</a></button></center><br>
            <?php if(!empty($this->session->flashdata('info'))){ ?>
                <div><center><?= $this->session->flashdata('info'); ?><center></div><br>
            <?php }?>
			<table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Peminjam</th>
                        <th>Buku</th>
                        <th>NoReg</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Kembali</th>
                        <th>Status</th>
                        <th>#</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $no = 1;
                        foreach ($data as $row) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row->kode_member;?> - <?= $row->nama_member;?></td>
                            <td><?= $row->kode_biblio;?> - <?= $row->judul_buku;?></td>
                            <td><?= $row->noreg; ?></td>
                            <td><?= $row->tanggal_pinjam; ?></td>
                            <td><?= $row->tanggal_kembali; ?></td>
                            <?php 
                                if($row->status == "Tidak Tersedia" && $row->tanggal_kembali == '0000-00-00'){?>
                                    <td>Dipinjam</td>
                                    <td>
                                        <button>
                                            <a href="<?php echo site_url("transaksi/edit/".$row->id_sirkulasi);?>">Kembalikan</a>
                                        </button>
                                    </td><?php
                                }else{?>
                                    <td>Dikembalikan</td>
                                    <td></td><?php
                                }
                            ?> 
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