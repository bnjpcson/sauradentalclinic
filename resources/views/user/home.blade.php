@extends('user.layouts')
@section('content')
    <style>
        #first {
            background-image: url('{{ asset('assets/images/opac.png') }}'), url('{{ asset('assets/images/bg-workplace.png') }}');
            object-fit: cover;
            background-repeat: no-repeat;
        }

        .title {
            text-align: center;
            font-family: 'Poppins';
            font-size: 48;

        }

        .line {
            height: 3px !important;
            border: none !important;
            background-color: #EE88B6 !important;
            width: 111px;
            margin: auto;
        }
        .container{
            scroll-margin-top: 120px; 
        }
        
    </style>
    <div class="container-fluid vh-100 d-flex align-items-center justify-content-center" id="first">
        <div class="row text-center" style="margin-top: -150px">
            <div class="col-12 mx-auto">
                <span style="font-family: 'Poppins'; font-size: 40px; ">Need a Dentist?</span>
            </div>
            <div class="col-12">
                <span style="font-family: 'Poppins'; font-size: 52px; font-weight:800">Visit Saura Dental Clinic Now!</span>
            </div>
            <div class="col-12">
                <span style="font-family: 'Poppins'; font-size: 24px; font-weight:200">Love your teeth, Love your
                    smile</span>
            </div>
            <div class="col-12 my-3">
                <a href="{{ route('login') }}" class="btn"
                    style="background-color: #EE88B6; border-radius: 20px; width: 321px; font-size: 20px; font-family: 'Fahkwang'">Appointment
                    Now!</a>
            </div>
        </div>
    </div>
    <div id="about" class="container mb-5">
        <div class="row">
            <div class="col-12">
                <h1 class="title">Experience Elevated</h1>
                <hr class="line">
                <div class="mx-auto w-75 text-center mt-4 mb-5">
                    SDC is a collection of scientifically based principles focused on elevating a patient’s dental
                    experience.
                    Its goal is to increase a patient’s awareness of oral preventive care by creating an environment
                    unlike
                    no
                    other and offering the highest standards of service.
                </div>
            </div>
            <div class="col-12">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-4 mt-3">
                            <img class="img-fluid w-100" src="{{ asset('assets/images/equip2.png') }}" alt="Image">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img class="img-fluid w-100" src="{{ asset('assets/images/workplace.png') }}" alt="Image">
                        </div>
                        <div class="col-sm-4 mt-3">
                            <img class="img-fluid w-100" src="{{ asset('assets\images\radiograph.png') }}" alt="Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="services" class="container my-5 mt-5">
        <div class="row">
            <div class="col-12">
                <h1 class="title">Services</h1>
                <hr class="line">
                <div class="container my-5">
                    <div class="row text-center">
                        <div class="col-sm-6 col-lg-4 mt-3">
                            <img class="w-25 img-fluid" src="{{ asset('assets/images/image 1.png') }}" alt="">
                            <br>
                            <span>Tooth Restoration (Pasta)</span>
                        </div>
                        <div class="col-sm-6 col-lg-4 mt-3">
                            <img class="w-25 img-fluid" src="{{ asset('assets/images/image 2.png') }}" alt="">
                            <br>
                            <span>Tooth Whitening (Pampaputi ng ngipin)</span>
                        </div>
                        <div class="col-sm-6 col-lg-4 mt-4">
                            <img class="w-25 img-fluid" src="{{ asset('assets/images/image 2.png') }}" alt="">
                            <br>
                            <span>Oral Prophylaxis (linis ng ngipin)</span>
                        </div>
                        <div class="col-sm-6 col-lg-4 mt-4">
                            <img class="w-25 img-fluid" src="{{ asset('assets/images/image 2.png') }}" alt="">
                            <br>
                            <span>Veneers</span>
                        </div>

                        <div class="col-sm-6 col-lg-4 mt-4">
                            <img class="w-25 img-fluid" src="{{ asset('assets/images/image 3.png') }}" alt="">
                            <br>
                            <span>Jacket Crown</span>
                        </div>
                        <div class="col-sm-6 col-lg-4 mt-4">
                            <img class="w-25 img-fluid" src="{{ asset('assets/images/image 2.png') }}" alt="">
                            <br>
                            <span>Fixed Bridge</span>
                        </div>
                        <div class="col-sm-6 col-lg-4 mt-4">
                            <img class="w-25 img-fluid" src="{{ asset('assets/images/image 2.png') }}" alt="">
                            <br>
                            <span>Dentures</span>
                        </div>

                        <div class="col-sm-6 col-lg-4 mt-4">
                            <img class="w-25 img-fluid" src="{{ asset('assets/images/image 3.png') }}" alt="">
                            <br>
                            <span>Surgery (bunot)</span>
                        </div>
                        <div class="col-sm-6 col-lg-4 mt-4">
                            <img class="w-25 img-fluid" src="{{ asset('assets/images/image 3.png') }}" alt="">
                            <br>
                            <span>Root Canal TreatMent</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
