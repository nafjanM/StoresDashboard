@extends('layouts.app')

@section('content') 
<script> 
var storesCount = @json($storesCount);
var storeNames = [];
var storesCountEach = [];
for(var i =0; i < storesCount.length;i++){
    storeNames.push(storesCount[i]['name']);
    storesCountEach.push(storesCount[i]['count']);
}

</script>
 <!-- Sale & Revenue Start -->
 <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-line fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Active Stores</p>
                                <h6 class="mb-0">{{$activeStoreCount}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-bar fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Active Employees</p>
                                <h6 class="mb-0">{{$activeEmpCount}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-area fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Inactive Stores</p>
                                <h6 class="mb-0">{{$inactiveStoreCount}}</h6>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-xl-3">
                        <div class="bg-secondary rounded d-flex align-items-center justify-content-between p-4">
                            <i class="fa fa-chart-pie fa-3x text-primary"></i>
                            <div class="ms-3">
                                <p class="mb-2">Inactive Employees</p>
                                <h6 class="mb-0">{{$inactiveEmpCount}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sale & Revenue End -->


            <!-- Sales Chart Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class="bg-secondary text-center rounded p-4">
                            <div class="d-flex align-items-center justify-content-between mb-4">
                                <h6 class="mb-0">Employees Count Per Store</h6>
                                
                            </div>
                            <canvas id="worldwide-sales"></canvas>
                        </div>
                    </div>
                    
                </div>
            </div>
            <!-- Sales Chart End -->


           


            
@endsection
  