@extends('layouts.app', [
    'class' => '',
    'elementActive' => 'dashboard'
])

@section('content')
    <!-- <div class="content">
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-globe text-warning"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">Country</p>
                                    <p class="card-title">Country
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <a href="/country"><h5>COUNTRY<h5></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-money-coins text-success"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">PROSPECT</p>
                                    <p class="card-title">PROSPECT
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <a href="/prospect">PROSPECT</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-vector text-danger"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">SERVICE</p>
                                    <p class="card-title">SERVICE
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <a href="/service">SERVICE</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">STATE</p>
                                    <p class="card-title">STATE
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <a href="/state">STATE</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">STATE</p>
                                    <p class="card-title">STATE
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <a href="/state">STATE</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">QUOTATION REQUEST</p>
                                    <p class="card-title">QUOTATION REQUEST
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <a href="/generate-quotation">QUOTATION REQUEST</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">STATE</p>
                                    <p class="card-title">STATE
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <a href="/state">STATE</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">DISCOUNT</p>
                                    <p class="card-title">DISCOUNT
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <a href="/discount">DISCOUNT</a>


                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">SLUG</p>
                                    <p class="card-title">SLUG
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <a href="/slug">SLUG</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">WORK</p>
                                    <p class="card-title">WORK
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <a href="//work-name">WORK</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">PACKAGE</p>
                                    <p class="card-title">PACKAGE
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <a href="/package">PACKAGE</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">ACCOUNT</p>
                                    <p class="card-title">ACCOUNT
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <a href="/acr">ACCOUNT</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">BANK</p>
                                    <p class="card-title">BANK
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <a href="/bank">BANK</a>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">STATE</p>
                                    <p class="card-title">STATE
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <a href="/state">STATE</a>

                        </div>
                    </div>
                </div>
            </div> <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">STATE</p>
                                    <p class="card-title">STATE
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <a href="/state">STATE</a>

                        </div>
                    </div>
                </div>
            </div> <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">STATE</p>
                                    <p class="card-title">STATE
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <a href="/state">STATE</a>

                        </div>
                    </div>
                </div>
            </div> <div class="col-lg-3 col-md-6 col-sm-6">
                <div class="card card-stats">
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-5 col-md-4">
                                <div class="icon-big text-center icon-warning">
                                    <i class="nc-icon nc-favourite-28 text-primary"></i>
                                </div>
                            </div>
                            <div class="col-7 col-md-8">
                                <div class="numbers">
                                    <p class="card-category">STATE</p>
                                    <p class="card-title">STATE
                                        <p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer ">
                        <hr>
                        <div class="stats">
                        <a href="/state">STATE</a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    </div> -->

<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class=" col-md-12"> 
                    <div class="card">
                        <div class="card-header card-header-primary bg-primary ">
                            <h3 class="card-title text-white mb-5 text-center" >{{ __(' This is Our Dashboard Page') }}</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6 mb-5 ">
                                    <label for=""  class="col-form-label"> Welcome To Our Dashboard Page</label>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-status">
                                        <div class="card-header card-header-warning card-header-icon">
                                        <div class="card-icon bg-danger">
                                            <i class="fa fa-user"></i>

                                        </div>
                                        <div class="row">
                                            <h4 class="card-title">PROSPECT</h4>
                                        </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <a href="/prospect"><h5>PROSPECT<h5></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-status">
                                        <div class="card-header card-header-info card-header-icon">
                                        <div class="card-icon bg-warning">
                                            <i class="fa fa-globe " aria-hidden="true"></i>

                                        </div>
                                        <div class="row">
                                            <h4 class="card-title">COUNTRY</h4>
                                        </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <a href="/country"><h5>COUNTRY<h5></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-status">
                                        <div class="card-header card-header-success card-header-icon">
                                        <div class="card-icon bg-success">
                                            <i class="fa fa-cogs " aria-hidden="true"></i>

                                        </div>
                                        <div class="row">
                                            <h4 class="card-title">SERVICE</h4>
                                        </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <a href="/service"><h5>SERVICE<h5></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-status">
                                        <div class="card-header card-header-danger card-header-icon">
                                        <div class="card-icon bg-primary">
                                            <i class="fa fa-building-o " aria-hidden="true"></i>

                                        </div>
                                        <div class="row">
                                            <h4 class="card-title">STATE </h4>
                                        </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <a href="/state"><h5>STATE<h5></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-status">
                                        <div class="card-header card-header-warning card-header-icon">
                                        <div class="card-icon bg-success">
                                            <i class="fa fa-quote-right" aria-hidden="true"></i>
                                        </div>
                                        <div class="row">
                                            <h4 class="card-title">QUOTATION REQUEST </h4>
                                        </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <a href="/generate-quotation"><h5>QUOTATION REQUEST<h5></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-status">
                                        <div class="card-header card-header-info card-header-icon">
                                        <div class="card-icon bg-warning">
                                            <i class="fa fa-percent" aria-hidden="true"></i>
                                        </div>
                                        <div class="row">
                                            <h4 class="card-title">DISCOUNT</h4>
                                        </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <a href="/discount"><h5>DISCOUNT<h5></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-status">
                                        <div class="card-header card-header-success card-header-icon">
                                        <div class="card-icon bg-info">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                        </div>
                                        <div class="row">
                                            <h4 class="card-title">SLUG</h4>
                                        </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <a href="/slug"><h5>SLUG<h5></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-status">
                                        <div class="card-header card-header-danger card-header-icon">
                                        <div class="card-icon bg-success">
                                            <i class="fa fa-briefcase" aria-hidden="true"></i>
                                        </div>
                                        <div class="row">
                                            <h4 class="card-title">WORK </h4>
                                        </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <a href="/work-name"><h5>WORK<h5></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-5">
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-status">
                                        <div class="card-header card-header-warning card-header-icon">
                                        <div class="card-icon bg-danger">
                                        <i class="fa fa-usd" aria-hidden="true"></i>
                                        </div>
                                        <div class="row">
                                            <h4 class="card-title">RATE </h4>
                                        </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <a href="/rate"><h5>RATE<h5></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-status">
                                        <div class="card-header card-header-info card-header-icon">
                                        <div class="card-icon bg=info">
                                        <i class="fa fa-archive" aria-hidden="true"></i>

                                        </div>
                                        <div class="row">
                                            <h4 class="card-title">PACKAGE</h4>
                                        </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <a href="/package"><h5>PACKAGE<h5></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-status">
                                        <div class="card-header card-header-success card-header-icon">
                                        <div class="card-icon bg-info">
                                            <i class="fa fa-user-circle-o" aria-hidden="true"></i>
                                        </div>
                                        <div class="row">
                                            <h4 class="card-title">ACCOUNT</h4>
                                        </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <a href="/acr"><h5>ACCOUNT<h5></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6">
                                    <div class="card card-status">
                                        <div class="card-header card-header-danger card-header-icon">
                                        <div class="card-icon bg-danger">
                                            <i class="fa fa-university" aria-hidden="true"></i>
                                        </div>
                                        <div class="row">
                                            <h4 class="card-title">BANK </h4>
                                        </div>
                                        </div>
                                        <div class="card-footer">
                                            <div class="stats">
                                                <a href="/bank"><h5>BANK<h5></a>
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

@endsection

@push('scripts')
    <script>
        $(document).ready(function() {
            // Javascript method's body can be found in assets/assets-for-demo/js/demo.js
            demo.initChartsPages();
        });
    </script>
@endpush