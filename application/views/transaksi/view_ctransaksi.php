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
        #content form{
            border: 1px solid grey;
            margin-top: 15px;
            margin-left: 200px;
            margin-right: 200px;
            padding: 20px;
        }
        #content form div{
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        #content form div input{
            width: 400px;
            height: 20px;
        }
        #content form div select{
            width: 408px;
            height: 28px;
        }
        #content button{
            background-color: #abc4ff;
            width: 75px;
            height: 25px;
            border: 1px solid grey;
        }
        #content a{
            text-decoration: none;
            color: black;
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
            <h2>Form Peminjaman Buku</h2><hr>
            <form method="post" action="<?php echo site_url('transaksi/simpan');?>">
                <div>
                    <label>Peminjam</label>
                    <select name="id_member" required>
                        <option value="">-- pilih peminjam --</option>
                        <?php 
                            foreach($member as $row){ ?>
                                <option value="<?= $row->id_member;?>"><?= $row->kode_member;?> - <?= $row->nama_member;?></option><?php
                            }?>
                    </select>
                </div>
                <div>
                    <label>Buku</label>
                    <select name="id_koleksi" required>
                        <option value="">-- pilih buku --</option>
                        <?php 
                            foreach($koleksi as $row){ 
                                if($row->status == 'Tersedia'){?>
                                    <option value="<?= $row->id_koleksi;?>"><?= $row->judul_buku;?> - <?= $row->noreg;?></option><?php
                                }
                            }
                        ?>
                    </select>
                </div>
                <div>
                    <label>Tanggal Pinjam</label>
                    <input type="date" name="tanggal_pinjam" required></input>
                </div>
                <div>
                    <label>Tanggal Kembali</label>
                    <input type="date" name="tanggal_kembali" readonly></input>
                </div>
                <div>
                    <button><a href="<?php echo site_url('transaksi');?>">Batal</a></button>
                    <button type="submit">Simpan</button>
                </div>
            </form>
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