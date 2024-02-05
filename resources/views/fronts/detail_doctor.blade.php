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
								<a href="{{ route('medicalDoctors') }}" class="btn-back">
									<i class="fa fa-arrow-left color-orange"></i>
								</a>
							</div>
						</div>	
						<div class="row">
							<div class="col-lg-12 react-blog-page img-top-pos">
								<div class="section-location">
									<div class="top-fixed img-stanby">
										<img src="{{$detail->user->profile_image}}" class="img-rounded"
											alt="Doktor Detail">
									</div>
									<div class="detail-clinic">
										<h4 class="title">{{$detail->first_name}}</h4>
										<p class="no-izin color-orange">No STR {{$detail->no_str}}</p>
										<p class="pengalaman color-orange">{{$detail->experience}} Years Experience</p>
										
									</div>
								</div>
								
								<div class="blog-single-inner secondary-information">
									<div class="blog-content">
										<div class="react-course-filter related__course">
											<div class="container">                                  
												<div class="row doctor-detail">    
													<div class="col-md-6 contact-info">
														<h3>Clinical Interest</h3>
														<h6 align="justify" class="interest">
														@foreach($detail->specializations as $interest)
															{{$interest->name}}
															@if( !$loop->last)
															,
															@endif
														@endforeach
														</h6>
														<h3>Pendidikan</h3>      
														<h6 align="justify" class="interest">
														@foreach($educations as $education)
														<p>{{$education->university}} : {{$education->major}}</p>
														@endforeach
														</h6> 
													</div>
													<div class="col-md-6 ">                                  
														<h3>Lokasi Klinik</h3>      
														<div class="filter-sec back__course__page_grid">
															<div class="shorting__courses4">
																<form class="form-search-city inline-icon" >
																	 <select class="from-control" id="lokasi-klinik" name="klinik" placeholder="">
																		<option value="2">{{$city->name}}</option>
																		
																	</select>
																</form>                                      
															</div>
														</div>
														<table class="table table-bordered table-waktu mt---50" id="2">
															<colgroup>
																<col span="1">
																<col span="1">
															</colgroup>
															<thead style="display:none">
																<tr><th scope="col">Day</th>
																<th scope="col">Hour</th>
															</tr></thead>
															<tbody>
															@foreach($schedules as $schedule)
																<tr>
																@if ($schedule->day_of_week == 1)
																	<td class="day">Senin</td>
																	<td class="hour">
																	{{$schedule->start_time}} {{$schedule->start_time_type}} - {{$schedule->end_time}} {{$schedule->end_time_type}}
																	</td>
																@elseif ($schedule->day_of_week == 2)
																	<td class="day">Selasa</td>
																	<td class="hour">
																	{{$schedule->start_time}} {{$schedule->start_time_type}} - {{$schedule->end_time}} {{$schedule->end_time_type}}
																	</td>
																@elseif ($schedule->day_of_week == 3)
																	<td class="day">Rabu</td>
																	<td class="hour">
																	{{$schedule->start_time}} {{$schedule->start_time_type}} - {{$schedule->end_time}} {{$schedule->end_time_type}}
																	</td>
																@elseif ($schedule->day_of_week == 4)
																	<td class="day">Kamis</td>
																	<td class="hour">
																	{{$schedule->start_time}} {{$schedule->start_time_type}} - {{$schedule->end_time}} {{$schedule->end_time_type}}
																	</td>
																@elseif ($schedule->day_of_week == 5)
																	<td class="day">Jumat</td>
																	<td class="hour">
																	{{$schedule->start_time}} {{$schedule->start_time_type}} - {{$schedule->end_time}} {{$schedule->end_time_type}}
																	</td>
																@elseif ($schedule->day_of_week == 6)
																	<td class="day">Sabtu</td>
																	<td class="hour">
																	{{$schedule->start_time}} {{$schedule->start_time_type}} - {{$schedule->end_time}} {{$schedule->end_time_type}}
																	</td>
																@elseif ($schedule->day_of_week == 7)
																	<td class="day">Minggu</td>
																	<td class="hour">
																	{{$schedule->start_time}} {{$schedule->start_time_type}} - {{$schedule->end_time}} {{$schedule->end_time_type}}
																	</td>
																@endif
																	
																</tr>
															@endforeach
																																																			
															</tbody>
														</table>
													</div>
													<div class="col-md-6 open-clinic">
														                                     
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