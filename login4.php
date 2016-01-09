<html>
<head>
  <title></title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/bootstrap.min.css" media="screen">
  <script src="js/jquery-1.10.2.min.js"></script>
  <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="../bower_components/html5shiv/dist/html5shiv.js"></script>
      <script src="../bower_components/respond/dest/respond.min.js"></script>
      <![endif]-->
      <style type="text/css">
        .box{
          min-height: 20px;
          padding: 15px 25px;
          background-color: #f7f7f7;
          border: 1px solid #e4e4e4;
          -webkit-border-radius: 2px;
          -moz-border-radius: 2px;
          border-radius: 2px;
          position: relative;
          word-break: break-word;
        }
        .box-white {
          background-color: #fff !important;
        }
        .box-shadow {
          -webkit-box-shadow: 5px 4px 0px 0px rgba(166,166,166,.1);
          -moz-box-shadow: 5px 4px 0px 0px rgba(166,166,166,.1);
          box-shadow: 5px 4px 0px 0px rgba(166,166,166,.1);
        }
        #loading {
          position: absolute;
          margin: auto;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
        }
      </style>
  </head>
  <body>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <span class="navbar-brand">IPSku Airlanggaku</span>
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>
    <div class="container" style="margin-top:3%">
      <div  style="">
        <div class="jumbotron box box-white box-shadow" id="section" style="margin-top:10px; background-color:#FFF; border-radius: 0;">
          <h2 style="margin-top: 0px;margin-bottom: 10px;">Log in <span id="genapsemes" style="font-size:12px; padding: 2px;"> <u>semester-genap</u></span>  <span style="font-size:12px; padding: 2px;background-color: #8BFFE8;" id="ganjilsemes"><u>semester-ganjil</u> </span></h2>
          <hr>
          <div class="form-group has-success">
            <input type="text" class="form-control" id="inputNim" value="<?php if (isset($_GET['nim'])) { echo $_GET['nim']; } ?>" placeholder="nim">
          </div>
          <div class="form-group has-success">
            <input type="password" class="form-control" id="inputPass" placeholder="password">
          </div>
          <p><a onclick="klik()" id="login" class="btn btn-primary " >Log in</a></p>
        </div>
      </div>

      <div class="" style="">
        <div id="section3" style="display:none">
          <img id="loading" src="images/477.GIF">
        </div>
      </div>

      <div style="">
        <div class="jumbotron box box-white box-shadow"  id="section2" style="display:none; background-color:#FFF; border-radius: 0;">
          <p id="Nama Mahasiswa"></p> </br>
          <h4 style="font-size: 13px !important;" id="kata"></h4>
          <p><a onclick="back()" style="" id="logout" class="btn btn-primary">Log out</a></p>
        </div>
      </div>
      <br>
      <br>
      <br>
      <br>
    </div>
    <script type="text/javascript">
      var idsemester = "209";
      function tampilkan(sesi, nim, semes){
        $('#section').hide();
        $('#section3').css('display', 'inline-block');
        // var nim = $('#inputNIM').val();
        $.ajax({url:"i.php?nim="+nim+"&sesi="+sesi+"&semester="+semes, success:function(result){
          $('#section3').css('display', 'none');
          $('#section2').css('display', 'inline-block');
          $("#kata").html(result);
        }});
      }
  
      function klik(){
        var nim = $('#inputNim').val();
        var pass = $('#inputPass').val();
        if (pass == "" || nim == "") {
          // alert('semua field harus terisi');
          return false;
        }
        $( "#login" ).addClass( "disabled" );
        Android.showToast(nim, pass);
      }

      function disable(){
        $( "#login" ).removeClass( "disabled" );
      }

      function back(){
        Android.logout();
        $( "#logout" ).addClass( "disabled" );
      }
      
      $(document).ready(function(){
        setTimeout(function(){ 
          $('#tes').html('sukses');
        }, 3000);
        $('#ganjilsemes').click(function(){
          $(this).css('background-color', '#8BFFE8');
          $('#genapsemes').css('background-color', '#FFF');
          idsemester = "209";
        });
        $('#genapsemes').click(function(){
          $(this).css('background-color', '#8BFFE8');
          $('#ganjilsemes').css('background-color', '#FFF');
          idsemester = "200";
        });
      });
    </script>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
    (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
    m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
  ga('create', 'UA-60725529-1', 'auto');
  ga('send', 'pageview');
</script>

<script src="js/bootstrap.min.js"></script>

</body>
</html>