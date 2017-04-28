<html>
<head>
<title></title>
    <style>
    body {
        background: white;
        font-family: 'helvetica', arial, sans-serif;
        font-size: 15px
    }
    #menu{
    padding: 15px 0;
    text-align: center;
    background: skyblue;
    color: azure;
    text-decoration: none;
    margin: 10px auto;
    width: 30%;
    border-radius: 10px;
    
}
    #naf{
        width: 100%;
        padding: 5px 10px;
    }
    a{
        text-decoration: none;
        color:white;
    }
    #isi{
        float: left;
    }
    #wrap{
        background: white;
        border-radius:5px;
        height: 750px;
        width: 90%;
        margin: 0 auto;
    }
    #container{
    max-width: 1000px;
    margin: 20px auto;
    background: azure;
    border-radius: 10px;
    overflow: hidden;
    padding: 10px;
}
    #header{
    background: skyblue;
    border-radius:5px;
    padding: 10px;
    margin: 10px;
    font-size: 20px;
    text-align: center;
    color: white;
}
    #footer{
    background: black;
    border-radius:5px;
    color: white;
    clear: both;
    border: 1px solid #dedede;
    padding: 10px;
    margin: 10px;
    text-align: center;
}      
    </style>
</head>
<body>
<div id= "container">
<div id="header">
    <h1> Berat Badan Ideal</h1>
    </div>
    <div id="isi"><br>
<form method="post" action="fungsi.php"target="ifme">
<table>
<tr><td>nama</td><td><input type="text" placeholder="nama lengkap" name="nama"/> </td></tr>
<tr><td>berat</td><td><input type="text" placeholder="berat badan" name="berat_badan"/> </td></tr>
<tr><td>tinggi</td><td><input type="text" placeholder="tinggi badan" name="tinggi_badan"/> </td></tr>
<tr><td>usia</td><td><select name="usia">
    <?php for($x=1; $x<=100; $x++){ ?>
<option value="<?php echo $x ?>"><?php echo $x ?></option>
    <?php } ?>
    </select>
<tr><td>gender</td><td><select name="gender">
<option value="laki-laki">laki-laki</option>
<option value="perempuan">perempuan</option>
    </select></td></tr>
<tr><td>aktivitas</td><td><select name="aktivitas">
        <option value="ringan">ringan</option>
        <option value="sedang">sedang</option>
        <option value="berat">berat</option>
        </select>
    </td></tr>
<tr><td></td><td><input type="submit" name="proses" value="proses"/> <a href="anggit.php" target="ifme"><input type="reset"></a></td></tr>

    </table>
    </form>
    </div>
        <div id="isi">
            <iframe name="ifme" width="500px" scrolling="none" height="500px"></iframe>
        </div>
        <div style="clear:both;"></div>
        <div id="menu">
            <a href="help.php">Bantuan</a>
        </div>
        <div id="menu">
            <a href="home.php">keluar</a>
        </div>
    <div id="footer">
    <p>copyright &copy; anggit setyo p</p>
    </div>
    </div>
  </body>
  </html>