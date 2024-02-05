<head>
         
         <meta charset="utf-8">
         <meta http-equiv="x-ua-compatible" content="ie=edge">
         <meta name="viewport" content="width=device-width, initial-scale=1">
         
         <title>Kenali Tim Dokter Kami di ERHA</title>
         <meta name="description" content="Temukan profil lengkap dan keahlian para dokter terbaik kami di ERHA Ultimate. Profesional berpengalaman kami, siap membantu perawatan kulit dan rambut Anda.">
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
                             <div class="react-breadcrumbs">
                                 <div class="breadcrumbs-wrap">	
                                     <div class="breadcrumbs-inner">	
                                         <div class="breadcrumbs-text">	
                                             <div class="back-nav">
                                                 <ul>
                                                     <li><a href="javascript:void(0)">Beranda</a></li> /
                                                     <li>Temukan Dokter</li>
                                                 </ul>
                                             </div>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             <div class="mt---30">
                                 <h6 class="section-title">Ahli Dermatologi Kami</h6>
                             </div>
                             <div class="filter-sec back__course__page_grid "> 
                                 <div class="row "> 
                                     <div class="col-lg-6 shorting__courses3"> 
                                         <div class="form-group">
                                             <form class="form-search-name inline-icon" method="get" action="{{ route('front.searchDoctors') }}">
                                                 <i class="fa-solid fa-magnifying-glass"></i>
                                                         <input type="text" name="search" id="search" value="" class="from-control" placeholder="Cari berdasarkan nama">
                                                 
                                             </form>
                                         </div>
                                     </div>
                                     <div class="col-lg-6"> 
                                         <div class="klinik-dookter"> 
                                             <ul>
                                                 <li><a href="{{url('/')}}" class="btn btn-border-white radius ">Lokasi</a></li>
                                                 <li><a href="{{ route('medicalDoctors') }}" class="btn btn-border-white radius active">Dokter</a></li>
                                             </ul>
                                         </div>
                                     </div>
                                 </div>
                             </div>
                             
                             @if(!empty($search))
                                @foreach($search as $doctor)
                                <div class="col-lg-6"> 
                                    <div class="react-grid react-list">                            
                                        <div class="single-studies grid-item">
                                            <div class="inner-course">
                                                <div class="case-img">
                                                    <img src="{{ $doctor->user->profile_image }}" alt="doctor 1">
                                                </div>
                                                <div class="case-content descript-list">
                                                    
                                                    <h4 class="case-title"> <a href="doctor-detail.php">{{ $doctor->user->first_name }}</a></h4>
                                                @foreach($doctor['specializations'] as $val)
                                                {{ $val->name }}
                                                @if( !$loop->last)
                                                ,
                                                @endif
                                                
                                                @endforeach
                                                    <br><a href="{{ route('detailDoctor', $doctor->id) }}">Lihat Detail</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                            @else
                               <p> Maaf, data tidak ditemukan...</p>
                            @endif
                             
                         </div>
                         
                         <div class="container">    
                         <div class="row">    
                             {{ $search->links() }}
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
 