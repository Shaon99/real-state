@extends('backend.layout.master')

@section('content')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>{{ __($pageTitle) }}</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="{{ route('admin.home') }}">{{ __('Dashboard') }}</a>
                    </div>
                    <div class="breadcrumb-item">{{ __($pageTitle) }}</div>
                </div>
            </div>

            <div class="section-body ">
                <div class="row">
                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card bg-gradient-danger card-img-holder p-2 text-light">
                            <div class="card-body">
                                <img src="{{ asset('asset/circle.png') }}" class="card-img-absolute" alt="circle-image" />
                                <h4 class="font-weight-normal">{{ __('Total Properties') }} <i
                                        class="fas fa-home float-right"></i>
                                </h4>
                                <h2>{{ $totalProperties }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card bg-gradient-primary card-img-holder p-2 text-light">
                            <div class="card-body">
                                <img src="{{ asset('asset/circle.png') }}" class="card-img-absolute" alt="circle-image" />
                                <h4 class="font-weight-normal">{{ __('Total Location') }} <i
                                        class="fas fa-map float-right"></i>
                                </h4>
                                <h2>{{ $totallocation }}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
                        <div class="card bg-gradient-success card-img-holder p-2 text-light">
                            <div class="card-body">
                                <img src="{{ asset('asset/circle.png') }}" class="card-img-absolute" alt="circle-image" />
                                <h4 class="font-weight-normal">{{ __('Total Collection') }} <i
                                        class="fas fa-spinner fa-spin float-right"></i>
                                </h4>
                                <h2>{{ $collection }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

