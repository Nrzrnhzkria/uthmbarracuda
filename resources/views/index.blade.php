@extends('layouts.frontend')

@section('content')

<!-- Masthead-->
<header class="masthead">
    <div class="container px-4 px-lg-5 d-flex h-100 align-items-center justify-content-center">
        <div class="d-flex justify-content-center">
            <div class="text-center">
                <h1 class="mx-auto my-0 text-uppercase">Barracuda</h1>
                <h2 class="text-white-50 mx-auto mt-2 mb-5">The leading university rowing team in Malaysia that was established since 2008.</h2>
                <a class="btn btn-primary" href="https://docs.google.com/forms/d/e/1FAIpQLSejTg6Lb0lRfqqPdnC1ZCaX_jRs2DGsftGZ75O3TEN7srX9VA/viewform">Register Now</a>
            </div>
        </div>
    </div>
</header>
<!-- About-->
<section class="about-section text-center" id="about">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-lg-8">
                <h2 class="text-white mb-4">UTHM Barracuda Rowing Team</h2>
                <p class="text-white-50">
                    The UTHM Barracuda Rowing Team is a university rowing team based in Johor, Malaysia. 
                    We strive to create an atmosphere that supports personal and physical development in our athletes. 
                    Our athletes enjoy a rigorous training program in which involving teamwork, focus and commitment.
                    <br><br> 
                    We are currently ranked leading university team in Malaysia with the tagline "Miles Makes Champion". 
                    It is a lengthy process that requires patience, perseverance, and a very dedicated athlete and organization 
                    to make it happen. Hence, we believe we can take you to the next level!
                </p>
                <p class="text-white-50">
                    
                </p>
            </div>
        </div>
    </div>
</section>
<!-- Criteria -->
<section class="projects-section bg-light" id="criteria">
    <div class="container px-4 px-lg-5">
        <!-- Featured Project Row-->
        <div class="row gx-0 mb-4 mb-lg-5 align-items-center">
            <div class="col-xl-6 col-lg-5"><img class="img-fluid mb-3 mb-lg-0" src="{{ asset('frontend/assets/img/student_UTHM.jpg') }}" alt="student_UTHM" /></div>
            <div class="col-xl-6 col-lg-5">
                <div class="featured-text text-center text-lg-left">
                    <h4>Who can join?</h4>
                    <p class="text-black-50 mb-0">Participation is open to UTHM students according to the criteria below.</p>
                </div>
            </div>
        </div>
        <!-- Project One Row-->
        <div class="row gx-0 justify-content-center">
            <div class="col-lg-6"><img class="img-fluid" src="{{ asset('frontend/assets/img/no_experience.jpg') }}" alt="no_experience" /></div>
            <div class="col-lg-6 order-lg-first">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-right">
                            <h4 class="text-white">No experience? No problem!</h4>
                            <p class="mb-0 text-white-50">Most of our rowers were trained from zero, to hero.</p>
                            <hr class="d-none d-lg-block mb-0 me-0" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Project Two Row-->
        <div class="row gx-0 justify-content-center">
            <div class="col-lg-6"><img class="img-fluid" src="{{ asset('frontend/assets/img/high_spirits.jpg') }}" alt="high_spirits" /></div>
            <div class="col-lg-6">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-right">
                            <h4 class="text-white">High spirits.</h4>
                            <p class="mb-0 text-white-50">In order to be a hero, it is best to have a high spirits to motivate yourself and others.</p>
                            <hr class="d-none d-lg-block mb-0 me-0" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Project Three Row-->
        <div class="row gx-0 mb-5 mb-lg-0 justify-content-center">
            <div class="col-lg-6"><img class="img-fluid" src="{{ asset('frontend/assets/img/strong.jpg') }}" alt="strong" /></div>
            <div class="col-lg-6 order-lg-first">
                <div class="bg-black text-center h-100 project">
                    <div class="d-flex h-100">
                        <div class="project-text w-100 my-auto text-center text-lg-left">
                            <h4 class="text-white">Ideal height and a strong physique.</h4>
                            <p class="mb-0 text-white-50">It is not compulsory, but it will be advantageous to you.</p>
                            <hr class="d-none d-lg-block mb-0 ms-0" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <h4></h4>

</section>
<!-- Register -->
<section class="register-section bg-black" id="register">
    <div class="container p-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-10 col-lg-8 mx-auto text-center">
                <i class="fa-regular fa-address-card fa-3x mb-2 text-white"></i>
                <h2 class="text-white mb-5">Meets all the above criteria?</h2>
                <a class="btn btn-primary" href="https://docs.google.com/forms/d/e/1FAIpQLSejTg6Lb0lRfqqPdnC1ZCaX_jRs2DGsftGZ75O3TEN7srX9VA/viewform">Register Now</a>
            </div>
        </div>
    </div>
</section>
<!-- Contact-->
<section class="contact-section bg-black" id="contact">
    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5">
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-map-marked-alt text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Address</h4>
                        <hr class="my-4 mx-auto" />
                        <div class="small text-black-50">
                            Universiti Tun Hussein Onn Malaysia, <br>
                            Persiaran Tun Dr. Ismail, <br>
                            86400 Parit Raja, Johor</div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-envelope text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Email</h4>
                        <hr class="my-4 mx-auto" />
                        <div class="small text-black-50"><a href="uthmbarracuda@gmail.com" class="text-decoration-none">uthmbarracuda[at]gmail.com</a></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-3 mb-md-0">
                <div class="card py-4 h-100">
                    <div class="card-body text-center">
                        <i class="fas fa-mobile-alt text-primary mb-2"></i>
                        <h4 class="text-uppercase m-0">Phone</h4>
                        <hr class="my-4 mx-auto" />
                        <div class="small text-black-50">
                            En. Aizat <br>
                            +6011 2732 1287 </div>
                            <a href="https://wasap.my/601127321287" class="text-decoration-none"><i class="fab fa-whatsapp"></i>&nbsp; Whatsapp</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="social d-flex justify-content-center">
            <a class="mx-2" href="https://www.facebook.com/barracudauthm"><i class="fab fa-facebook-f"></i></a>
            <a class="mx-2" href="https://www.instagram.com/uthmbarracuda/"><i class="fab fa-instagram"></i></a>
        </div>
    </div>
</section>

@endsection