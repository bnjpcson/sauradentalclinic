@extends('admin.layouts')
@section('content')
    <script>
        $(function() {
            $('#transactionsTable').DataTable({
                scrollX: true
            });
        });
    </script>


    <main>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-6">
                        <h1 class="m-0">Dashboard</h1>
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <div class="col-6 d-flex align-items-center justify-content-end">
                        <button class="btn btn-primary btn-sm">Generate Report</button>
                    </div>
                </div>
            </div>
        </div>

        <style>
            .corners {
                border-radius: 25px;
            }
        </style>
        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="animation__shake" src="{{ asset('assets/images/logotouch.png') }}" alt="Saura Dental Clinic">
        </div>

        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-md-6 mb-4">
                    <a class="text-decoration-none text-dark" href="">
                        <div class="card corners border-left-primary shadow h-100 p-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            No. of appointments today</div>
                                        <div class="h5 mb-0 font-weight-bold">3</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar-alt fa-2x text-secondary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <a class="text-decoration-none text-dark" href="">
                        <div class="card corners border-left-primary shadow h-100 p-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Total Services</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $services }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-tooth fa-2x text-secondary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <a class="text-decoration-none text-dark" href="">
                        <div class="card corners border-left-primary shadow h-100 p-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            No. of Users</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $users }}</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-users fa-2x text-secondary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-xl-3 col-md-6 mb-4">
                    <div class="card corners border-left-primary shadow h-100 p-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                                    </div>
                                    <div class="row no-gutters align-items-center ml-2">
                                        <div class="col-auto">
                                            <div class="h6 mb-0 mr-3 font-weight-bold text-gray-800">5%</div>
                                        </div>
                                        <div class="col">
                                            <div class="progress progress-sm mr-2">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 5%"
                                                    aria-valuenow="" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-clipboard-list fa-2x text-secondary"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </main>
@endsection

@push('footer-script')
@endpush
