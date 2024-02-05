<!DOCTYPE html>
<html lang="zxx">
    <head>
         
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
		  <title>{{$detail->first_name}}</title>
		<meta name="description" content="Klinik 23 Paskal Shopping Center yang berlokasi di Erha Apothecary Paskal Shopping Center Lt. 2 Unit 28A Jl. Pasir Kaliki no. 25-27 Kel. Kebonjeruk, Kec. Andir"">
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
                    <div class="container pb---70">
                        <div class="row">
							<div class="postion-abs">
								<a href="{{url('/')}}" class="btn-back">
									<i class="fa fa-arrow-left"></i>
								</a>
							</div>
						</div>	
						<div class="row">
							<div class="col-lg-12 react-blog-page img-top-pos">
								<div class="section-location">
									<div class="top-fixed img-stanby">
										<img src="{{$detail->profile_image}}" class="img-half"
											alt="Clinic Detail">
									</div>
									<div class="detail-clinic">
										<h4 class="title">{{$detail->first_name}}</h4>
										<p class="no-izin">Surat Izin Klinik ( {{$detail->no_izin}} )</p>
										<p class="address">{{$detail->address}}</p>
										<a href="{{$detail->link_map}}" target="_blank" class="btn-detail">Lihat Peta</a>
									</div>
								</div>
								
								<div class="blog-single-inner secondary-information">
									<div class="blog-content">
										<div class="react-course-filter related__course">
											<div class="container">                                  
												<div class="row desktop-view">    
													<div class="col-md-6 contact-info">                                  
														<h3>Informasi</h3>
														<div class="contact">
															<i class="fa-brands fa-whatsapp"></i>
															<a class="phone" target="_blank" href="https://wa.me/6281223186529">{{$detail->no_wa}}</a>
														</div>
														<div class="contact">
															<i class="fa fa-phone"></i>
															  <a class="phone" target="_blank" href="tel:{{$detail->contact}}">{{$detail->contact}}</a>
														</div>
													</div>
													<div class="col-md-6 apoteker-info">                                  
														<h3>Nama Apoteker</h3>      
														<div class="name-apoteker">
															<p class="name">{{$detail->apoteker_name}}</p>
															<p class="no-izin">{{$detail->no_izin_apoteker}}</p>

                                                            <p class="jadwal-praktk">{{$detail->schedule_apoteker}}</p>
														</div>                                       
													</div>
													<div class="col-md-6 open-clinic">
														<h3>Waktu Kerja</h3>      
														<div class="jadwal-open">
															
                                                            <h6 class="">{{$detail->schedule}}</h6>
														</div>                                       
													</div>
													<div class="col-md-6 open-clinic">
														<h3>Galeri Klinik</h3>      
														<div class="gallery-clinic">
															<a class="image-popup" href="{{$detail->profile_image}}" title="gallery 1">
																<img src="{{$detail->profile_image}}" width="75" height="75">
															</a>
														</div>                                       
													</div>
													<div class="col-md-12">                                  
														<h3>Dokter</h3>                                             
														<div class="row">  
                                                        @foreach($doctors as $doctor)                          
															<div class="col-lg-4"> 
																<div class="react-grid react-list">
																	<div class="single-studies grid-item">
																		<div class="inner-course">
																			<div class="case-img">
																				<img src="{{$doctor->user->profile_image}}" alt="doctor 1">
																			</div>
																			<div class="case-content descript-list">
																				
																				<h4 class="case-title min-height-name"> <a href="{{ route('detailDoctor', $doctor->id) }}">{{$doctor->first_name}}</a></h4>
																				@foreach($doctor['specializations'] as $val)
                                                
                                                                                @if( !$loop->last)
                                                                                {{$val->name}},
                                                                                
                                                                                @endif
                                                                                
                                                                                @endforeach
																			   <a href="{{ route('detailDoctor', $doctor->id) }}">Lihat Detail</a>
																			</div>
																		</div>
																	</div>
																</div>
															</div>
                                                            @endforeach
															
														</div>
													</div>
													
												</div>
												<div class="row mobile-show"> 
													<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
														 <li class="nav-item" role="presentation">
															<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Informasi</button>
														  </li>
														  <li class="nav-item" role="presentation">
															<button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Dokter</button>
														  </li>
														  
														</ul>
														<div class="tab-content" id="pills-tabContent">
														  <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
																 <div class="col-md-12 contact-info">                                  
																	<h3>Informasi</h3>
																	<div class="contact" style="margin-bottom:10px;">
																		<i class="fa-brands fa-whatsapp" style="font-size:22px;"></i>
																		<a class="phone" target="_blank" href="https://wa.me/{{$detail->no_wa}}" >{{$detail->no_wa}}</a>
																	</div>
																	<div class="contact">
																		<i class="fa fa-phone" style="font-size:22px;"></i>
																		  <a class="phone" target="_blank" href="tel:{{$detail->contact}}">{{$detail->contact}}</a>
																	</div>
																</div>
																<div class="col-md-12 apoteker-info">                                  
																	<h3>Nama Apoteker</h3>      
																	<div class="name-apoteker">
																		<p class="name">{{$detail->apoteker_name}}</p>
																		<p class="no-izin">{{$detail->no_izin_apoteker}}</p>

																		<p class="jadwal-praktk">{{$detail->schedule_apoteker}}</p>
																	</div>                                       
																</div>
																<div class="col-md-12 open-clinic">
																	<h3>Waktu Kerja</h3>      
																	<div class="jadwal-open">
																		
																		<h6 class="">{{$detail->schedule}}</h6>
																	</div>                                       
																</div>
																<div class="col-md-12 open-clinic">
																	<h3>Galeri Klinik</h3>      
																	<div class="gallery-clinic">
																		<a class="image-popup" href="{{$detail->profile_image}}" title="gallery 1">
																			<img src="{{$detail->profile_image}}" width="120" height="120">
																		</a>
																		
																	</div>                                       
																</div>
																  
														  </div>
														  
														  <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
															<div class="col-md-12">                                  
																<h3>Dokter</h3>                                             
																<div class="row">     
                                                                    @foreach($doctors as $doctor)                       
																	<div class="col-lg-4 padding-list"> 
																		<div class="react-grid react-list">
																			<div class="single-studies grid-item">
																				<div class="inner-course">
																					<div class="case-img">
																						<img src="{{$doctor->user->profile_image}}" alt="doctor 1">
																					</div>
																					<div class="case-content descript-list">
																						
																						<h4 class="case-title min-height-name"> <a href="doctor-detail.php">{{$doctor->first_name}}</a></h4>
																						@foreach($doctor['specializations'] as $val)
                                                
                                                                                        @if( !$loop->last)
                                                                                        {{$val->name}},
                                                                                        
                                                                                        @endif
                                                                                        
                                                                                        @endforeach
																					   <a href="{{ route('detailDoctor', $doctor->id) }}">Lihat Detail</a>
																					</div>
																				</div>
																			</div>
																		</div>
																	</div>
																	@endforeach
                                                                    
																</div>
															</div>
														  
														  </div>
														 
														</div>
												</div>
											</div>
										</div>                         
									</div>
							
								</div>
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
</html>