
    <head>
         
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Temukan Lokasi ERHA di Kota Kamu</title>
		<meta name="description" content="Cari tahu lokasi klinik ERHA Ultimate terdekat dari Anda. Kunjungi kami untuk perawatan berkualitas dan layanan ahli di berbagai kota.">
		<link rel="canonical" href="https://erhaultimate.co.id/find-clinic">
        
        <link rel="apple-touch-icon" href="{{asset(getAppFavicon())}}">
        <link rel="shortcut icon" type="image/x-icon" href="{{mix('images/favicon.png')}}">        
          
        <link rel="stylesheet" type="text/css" href="{{mix('css/bootstrap.min.css')}}">
         
        <link rel="stylesheet" type="text/css" href="{{mix('css/menus.css')}}">               
        <link rel="stylesheet" type="text/css" href="{{mix('css/all.min.css')}}">               
      
        <link rel="stylesheet" type="text/css" href="{{mix('fonts/elegant-icon.css')}}">
        <link rel="stylesheet" type="text/css" href="{{mix('css/fonts.css')}}">
        <link rel="stylesheet" type="text/css" href="{{mix('css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{mix('css/custom.css')}}">
        <link rel="stylesheet" type="text/css" href="{{mix('css/custom-spacing.css')}}">
        <link rel="stylesheet" type="text/css" href="{{mix('css/responsive.css')}}">
    </head>
    <body> 

		<!-- Header -->
		@include('fronts.layouts.header')
		<!-- End Header -->

        <div class="react-wrapper">
            <div class="react-wrapper-inner">
                <div class="react-course-filter back__course__page_grid back__course__page_grid_left pb---40 pt---50">
                    <div class="container">
                        <div class="row">
							<div class="react-breadcrumbs">
								<div class="breadcrumbs-wrap">	
									<div class="breadcrumbs-inner">	
										<div class="breadcrumbs-text">	
											<div class="back-nav">
												<ul>
													<li><a href="javascript:void(0)">Beranda</a></li> /
													<li>Temukan Klinik</li>
												</ul>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="mt---30">
                                <h6 class="section-title">Temukan Klinik</h6>
							</div>
                            <div class="filter-sec back__course__page_grid "> 
								<div class="row "> 
									<div class="col-lg-6 shorting__courses3"> 
										<form class="form-search-city inline-icon" >
											<i class="fa-solid fa-magnifying-glass"></i>
											 <select class="from-control" id="select-city" name="city" placeholder="Cari berdasarkan kota">
												<option value="">Semua Kota</option>
												<option value="1">Aceh Barat</option>
												<option value="2">Aceh Barat Daya</option>
												<option value="3">Aceh Besar</option>
												<option value="4">Aceh Jaya</option>
												<option value="5">Aceh Selatan</option>
												<option value="6">Aceh Singkil</option>
												<option value="7">Aceh Tamiang</option>
												<option value="8">Aceh Tengah</option>
												<option value="9">Aceh Tenggara</option>
												<option value="10">Aceh Timur</option>
												<option value="11">Aceh Utara</option>
												<option value="12">Agam</option>
												<option value="13">Alor</option>
												<option value="14">Ambon</option>
												<option value="15">Asahan</option>
												<option value="16">Asmat</option>
												<option value="17">Badung</option>
												<option value="18">Balangan</option>
												<option value="19">Balikpapan</option>
												<option value="20">Banda Aceh</option>
												<option value="21">Bandar Lampung</option>
												<option value="22">Bandung</option>
												<option value="23">Bandung Barat</option>
												<option value="24">Banggai</option>
												<option value="25">Banggai Kepulauan</option>
												<option value="26">Banggai Laut</option>
												<option value="27">Bangka</option>
												<option value="28">Bangka Barat</option>
												<option value="29">Bangka Selatan</option>
												<option value="30">Bangka Tengah</option>
												<option value="31">Bangkalan</option>
												<option value="32">Bangli</option>
												<option value="33">Banjar</option>
												<option value="34">Banjar</option>
												<option value="35">Banjarbaru</option>
												<option value="36">Banjarmasin</option>
												<option value="37">Banjarnegara</option>
												<option value="38">Bantaeng</option>
												<option value="39">Bantul</option>
												<option value="40">Banyuasin</option>
												<option value="41">Banyumas</option>
												<option value="42">Banyuwangi</option>
												<option value="43">Barito Kuala</option>
												<option value="44">Barito Selatan</option>
												<option value="45">Barito Timur</option>
												<option value="46">Barito Utara</option>
												<option value="47">Barru</option>
												<option value="48">Batam</option>
												<option value="49">Batang</option>
												<option value="50">Batang Hari</option>
												<option value="51">Batu</option>
												<option value="52">Batu Bara</option>
												<option value="53">Bau-Bau</option>
												<option value="54">Bekasi</option>
												<option value="55">Belitung</option>
												<option value="56">Belitung Timur</option>
												<option value="57">Belu</option>
												<option value="58">Bener Meriah</option>
												<option value="59">Bengkalis</option>
												<option value="60">Bengkayang</option>
												<option value="61">Bengkulu</option>
												<option value="62">Bengkulu Selatan</option>
												<option value="63">Bengkulu Tengah</option>
												<option value="64">Bengkulu Utara</option>
												<option value="65">Berau</option>
												<option value="66">Biak Numfor</option>
												<option value="67">Bima</option>
												<option value="68">Binjai</option>
												<option value="69">Bintan</option>
												<option value="70">Bireuen</option>
												<option value="71">Bitung</option>
												<option value="72">Blitar</option>
												<option value="73">Blora</option>
												<option value="74">Boalemo</option>
												<option value="75">Bogor</option>
												<option value="76">Bojonegoro</option>
											</select>
										</form>
									</div>
									<div class="col-lg-6"> 
										<div class="klinik-dookter"> 
											<ul>
												<li><a href="{{ url('/') }}" class="btn btn-border-white radius active">Lokasi</a></li>
												<li><a href="{{ route('medicalDoctors') }}" class="btn btn-border-white radius">Dokter</a></li>
											</ul>
										</div>
									</div>
								</div>
							</div>
							@foreach($clinics as $clinic)
							<div class="col-lg-6"> 
                                <div class="react-grid react-list" >                            
                                    <div class="single-studies col-lg-12 grid-item">
                                        <div class="inner-course">
                                            <div class="case-img">
                                                <img src="{{ $clinic->profile_image }}" alt="Clinic 1">
                                            </div>
                                            <div class="case-content descript-list">
                                                
                                                <h4 class="case-title"> <a href="clinic-detail.php">{{ Str::limit($clinic->first_name,19) }}</a></h4>
                                                <p class="desktop-view">{{ Str::limit($clinic->address, 70) }}</p>
                                                <p class="mobile-view">{{ Str::limit($clinic->address, 45) }}</p>
                                                <a href="{{ route('detailClinic', $clinic->id) }}"><u>Lihat Detail</u></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
							
						</div>
					</div>
                        
                    <div class="container">    
                        <div class="row">    
                            {{ $clinics->links() }}
                        </div>
                    </div>
                          
                    </div>
                </div>
               
                
            </div>
        </div>
      
        <!-- Header -->
			@include('fronts.layouts.footer')
		<!-- End Header -->
		
        <script src="{{mix('js/jquery.min.js')}}"></script>
        <script src="{{mix('js/modernizr-2.8.3.min.js')}}"></script>
        <script src="{{mix('js/bootstrap.min.js')}}"></script>
        <script src="{{mix('js/wow.min.js')}}"></script>     
		<script src="{{mix('js/jquery.magnific-popup.min.js')}}"></script>
        <script src="{{mix('js/isotope.pkgd.min.js')}}"></script>
        <script src="{{mix('js/imagesloaded.pkgd.min.js')}}"></script>  
        <script src="{{mix('js/menus.js')}}"></script>
        <script src="{{mix('js/plugins.js')}}"></script> 
        <script src="{{mix('js/main.js')}}"></script>
		
    </body>
