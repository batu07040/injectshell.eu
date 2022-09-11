<!DOCTYPE html>
<html lang="tr">
 
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Linux kullanıcıları için kolaylaştırılmış otomatik kurulum sistemleri sağlayan web sitemize hoş geldiniz.">
    <meta name="author" content="Batu07040@DJPizza">
    <meta name="keywords" content="linux kurulum scripti,linux scriptler,ish script,muzik botu kurulum scripti">
	<link rel="icon" href="favicon.ico" type="image/gif" sizes="16x16">


    <!-- Title Page-->
    <title>ISH Script [EU] - Anasayfa</title>

    <!-- Fontfaces CSS-->
	<base href="https://injectshell.eu" /> 
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <link href="vendor/vector-map/jqvmap.min.css" rel="stylesheet" media="all">
	  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">
	<style>
	@keyframes renkler {
    0%   {color: red;}
    25%  {color: purple;}
    50%  {color: blue;}
    100% {color: green;}
	}
	
	@keyframes sayfayukleniyor {
	 0% {	opacity:0.2;	}
	 25% {	opacity:0.4;	}
	 50% {	opacity:0.6;	}
	 75% {	opacity:0.8;	}
	 100% {	opacity:1.0;	}
	}
	
	.myvor{
	opacity:1.0;
	animation: sayfayukleniyor 2s;
	}
	

	
	.ortamrenkleri{
	
	animation: renkler 2s infinite;
	}


	</style>
</head>
<body class="animsition myvor">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->

        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="container">
            <!-- HEADER DESKTOP-->

  
            <!-- END HEADER DESKTOP-->

            <!-- BREADCRUMB-->
        
            <!-- END BREADCRUMB-->

            <!-- STATISTIC-->
            <section class="statistic">
        
                    <?
					include("db.php");
					
					$tarih = date('d.m.Y');
					$saat =  date("H:i:s");
					
					
					$today_usage = $sql->prepare("SELECT * FROM zmx WHERE tarih=? GROUP BY ip HAVING COUNT( * ) >0");
					$today_usage->execute(array($tarih));
					
					$bugunku_kullanim = $today_usage->rowCount();
			

					$today_installer = $sql->prepare("SELECT * FROM zmx WHERE tarih=?");
					$today_installer->execute(array($tarih));
					
					$bugunku_kurulum = $today_installer->rowCount();
					
					
					$all_usage = $sql->prepare("SELECT * FROM zmx GROUP BY ip HAVING COUNT( * ) >0");
					$all_usage->execute();
					
					$toplam_kullanim = $all_usage->rowCount();
					
					
					$all_installer = $sql->prepare("SELECT * FROM zmx");
					$all_installer->execute();
					
					$toplam_kurulum = $all_installer->rowCount();
					
					
					
					?>
						
						<?
		

					if(isset($_POST['lisans_ekle'])){
						
					
						$ip = $_POST['ip'];
						
						if(!file_exists("licenses/$ip.txt")){
							
							touch("licenses/$ip.txt");
							
											echo "
					<script>    
					  sweetAlert({
							title:'Başarılı!',
							text: 'Lisans ekleme işleminiz başarıyla tamamlanmıştır.',
							type:'success',
							confirmButtonText: 'OK'
							
					  },function(isConfirm){
						window.location.href = 'index.php';
						
					  });</script>";
					  
							
						}else{
							
											echo "
					<script>    
					  sweetAlert({
							title:'Başarısız!',
							text: 'Girdiğiniz ıp adresi zaten lisanslı.',
							type:'warning',
							confirmButtonText: 'OK'
							
					  },function(isConfirm){
						window.location.href = 'index.php';
						
					  });</script>";
							
						}
					
					  
					}
					


					?>

						
                        <div class="row">
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item ">
                                    <h2 class="number ortamrenkleri"><? print $bugunku_kullanim; ?></h2>
                                    <span class="desc  ">Bugünkü Kullanım</span>
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item ">
                                    <h2 class="number ortamrenkleri"><? print $bugunku_kurulum;  ?></h2>
                                    <span class="desc">Bugünkü Kurulumlar</span>

                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item ">
                                    <h2 class="number ortamrenkleri"><? print $toplam_kullanim; ?></h2>
                                    <span class="desc">Toplam Kullanım</span>
    
                                </div>
                            </div>
                            <div class="col-md-6 col-lg-3">
                                <div class="statistic__item ">
                                    <h2 class="number ortamrenkleri"><? print $toplam_kurulum; ?></h2>
                                    <span class="desc">Toplam Kurulumlar</span>

                                </div>
                            </div>
                        </div>
                   
             
            </section>
			
			
            <!-- END STATISTIC-->
			
					<section>
		<div class="jumbotron jumbotron-fluid">
		  <div class="container">
			<h1 class="display-4">Neden ? ISH Script </h1>
			<p class="lead">ISH Developer ekibi olarak tüm geliştirdiğimiz projeleri ücretsiz olarak kullanıcılara sunmayı amaçlamaktayız. Bu sektör içerisinde sunduğumuz hiçbir hizmet için sizlerden ücret talep etmedik aksine ücretsiz vermeyi amaçladık. Şu anda geldiğimiz bu noktada sizler için yeni bir script ortaya çıkartmış bulunmaktayız. Ortaya çıkartmış olduğumuz script için sürekli lisans eklemenize gerek yoktur. Eklediğiniz lisanslar sürekli olarak geçerlidir. Haftada bir lisans eklemeniz gerekmez. Sadece otomatik güncelleme sistemimiz aktifleşeseğe kadar scriptin yeni sürümlerini sitemizden wget ile çekmelisiniz. </p>
		  </div>
		</div>
		</section>
		

		
			
		<??>
		<center>
		<code><? echo $tarih." ".$saat; ?></code>
		</center>
		
		<section class="">
		<div class="card mb-3">
				  <h5 class="card-header">ISH Script Lisans Ekle / Kontrol Et</h5>
				<div class="card-body">
					<form name="lisans_ekleme" method="POST" action="index.php">
						
						<div class="form-group">
								<label for="exampleInputPassword1">Sunucu IP Adresiniz</label>
								<input class="form-control" style="height:15%;" type="text" name="ip" required="">
						</div>
						
						<div class="form-group">
								<label for="exampleInputPassword1">Script Download</label>
								<input class="form-control" style="height:15%;" type="text" name="w_ip" value="wget http://injectshell.eu/ish/releases/2.0.12/ish" required="" disabled>
						</div>
						
							<input type="submit" name="lisans_ekle" class="btn btn-primary" value="Lisans Ekle / Kontrol Et">
					</form>
				</div>
				
			</div>
		</section>
		

				<section>
		<div align="center" id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d w-70" src="images/ish/1.png" alt="Birinci Resim">
    </div>
    <div class="carousel-item">
      <img class="d w-70" src="images/ish/2.png" alt="İkinci Resim">
    </div>
    <div class="carousel-item">
      <img class="d w-70" src="images/ish/3.png" alt="Üçüncü Resim">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
		
		</section>



            <section>
       
                    <div class="row">
                        <div class="col-md-12">
                            <div class="copyright ">
                                <p>Copyright © 2018 <a href="https://injectshell.com" target="_blank">ISH</a>. All rights reserved.</a>.</p>
                            </div>
                        </div>
                    </div>
               
            </section>
            <!-- END PAGE CONTAINER-->
        </div>

    </div>
   
    <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>
    <script src="vendor/vector-map/jquery.vmap.js"></script>
    <script src="vendor/vector-map/jquery.vmap.min.js"></script>
    <script src="vendor/vector-map/jquery.vmap.sampledata.js"></script>
    <script src="vendor/vector-map/jquery.vmap.world.js"></script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
<!-- end document-->