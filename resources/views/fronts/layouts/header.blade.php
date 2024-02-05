<header id="react-header" class="react-header react-header-three">
	<div class="menu-part">
		<div class="container">
			<div class="react-main-menu">
				<nav>
					<div class="menu-toggle">
						<button type="button" id="menu-btn">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<div class="logo"><a href="{{url('/')}}" class="logo-text"> <img src="{{mix('images/logo.png')}}" alt="ERHA Ultimate - Klinik Spesialis Kulit &amp;amp; Rambut"> </a></div>
						
					</div> 
					<div class="react-inner-menus">
						<ul id="backmenu" class="react-menus react-sub-shadow">
							<li> <a href="#" class="">Solusi Sesuai Problem</a>
								<ul>
									<li> 
										<a class="sub-des-menu" href="javascript:void(0)">
											Acne Center 	
											<p>Kulit Jerawat &amp; Bekas Jerawat</p>
										</a>
									</li>
									<li> 
										<a class="sub-des-menu" href="javascript:void(0)">
											 Anti Aging Center	
											<p>Kulit Kendur & Garis Halus</p>
										</a>
									</li>
									<li> 
										<a class="sub-des-menu" href="javascript:void(0)">
											 Brightening Center 
											<p>Kulit Kusam & Noda Hitam</p>
										</a>
									</li>
									<li> 
										<a class="sub-des-menu" href="javascript:void(0)">
											 Hair Care Center 
											<p>Rambut Rontok & Botak</p>
										</a>
									</li>
									<li> 
										<a class="sub-des-menu" href="javascript:void(0)">
											 Make Over Center 
											<p>Bentuk Wajah & Badan Kurang Ideal</p>
										</a>
									</li>
									<li> 
										<a class="sub-des-menu" href="javascript:void(0)">
											 Atopy & Skin Disease Center 
											<p>Dermatitis Atopik & Penyakit Kulit</p>
										</a>
									</li>
									
								</ul>
							</li>
							<li> <a href="javascript:void(0)">Promo Spesial</a></li>                                                                   
							<li> <a href="javascript:void(0)">Kisah ERHA</a></li>                                                                   
							
							<li> <a href="javascript:void(0)">Info Terkini</a></li>
						</ul>                                
						<div class="searchbar-part">                
																				 
							<form class="searchbox" method="get" action="{{ route('front.searchDoctors') }}">
								 <input type="text" placeholder="pencarian" name="search" id="search" class="searchbox-input"  required>
									
									<span class="searchbox-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
									 
							</form>
							<div class="react-login">
								<a href="javascript:void(0)">
								<i class="fa-regular fa-user"></i>
								</a>
							</div>   
						</div>
					</div>
				</nav>
			</div>
			 
		</div>
	</div>
</header>
 