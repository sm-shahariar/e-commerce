<?php $page = 'index'; ?>
@extends('layout.mainlayout')
@section('content')
    <div class="page-wrapper">
        <div class="content">
            <div class="row">
                <div class="col-xl-4 col-sm-6 col-12 d-flex">
                    <div class="dash-widget w-100">
                        <div class="dash-widgetimg">
                            <span><img src="{{ URL::asset('/build/img/icons/dash1.svg') }}" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="4848494">4848494</span></h5>
                            <h6>Total Purchase Due</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-12 d-flex">
                    <div class="dash-widget dash1 w-100">
                        <div class="dash-widgetimg">
                            <span><img src="{{ URL::asset('/build/img/icons/dash2.svg') }}" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="84748434">84748434</span></h5>
                            <h6>Total Sales Due</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-12 d-flex">
                    <div class="dash-widget dash2 w-100">
                        <div class="dash-widgetimg">
                            <span><img src="{{ URL::asset('/build/img/icons/dash3.svg') }}" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="53445334">53445334</span></h5>
                            <h6>Total Sale Amount</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-sm-6 col-12 d-flex">
                    <div class="dash-widget dash3 w-100">
                        <div class="dash-widgetimg">
                            <span><img src="{{ URL::asset('/build/img/icons/dash4.svg') }}" alt="img"></span>
                        </div>
                        <div class="dash-widgetcontent">
                            <h5>৳<span class="counters" data-count="3094945">3094945</span></h5>
                            <h6>Total Expense Amount</h6>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <a href="{{ url('vehicles') }}" class="dash-count text-decoration-none w-100 vehicle"
                            style="text-decoration: none; color: inherit;">
                            <div class="dash-counts text-start">
                                <h5>Vehicle</h5>
                                <h4 class="mb-2">30</h4>
                                <div class="d-flex justify-content-center align-items-center mt-2 text-white">
                                    <span class="me-3">Self: 3455</span>
                                    <div style="width: 2px; height: 20px; background: white; margin: 0 10px;"></div>
                                    <span class="ms-3">External: 45443</span>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <a href="{{ url('suppliers') }}" class="dash-count das1 text-decoration-none w-100">
                            <div class="dash-counts mb-3">
                                <h5>Supplier</h5>
                                <h4>3434</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <a href="{{ url('services') }}" class="dash-count das2 text-decoration-none w-100">
                            <div class="dash-counts mb-3">
                                <h5>Service</h5>
                                <h4>5354</h4>
                            </div>
                        </a>
                    </div>
                    <div class="col-xl-3 col-sm-6 col-12 d-flex">
                        <a href="{{ url('sales') }}" class="dash-count das3 text-decoration-none w-100">
                            <div class="dash-counts mb-3">
                                <h5>Sale Invoice</h5>
                                <h4>53454</h4>
                            </div>
                        </a>
                    </div>
                </div>

            <!-- Button trigger modal -->
            <div class="row">
                <div class="col-xl-7 col-sm-12 col-12 d-flex">
                    <div class="card flex-fill">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h5 class="card-title mb-0">Purchase & Sales <span id="selected-year">2025</span></h5>
                            <div class="graph-sets">
                                <ul class="mb-0">
                                    <li>
                                        <span>Purchase</span>
                                    </li>
                                    <li>
                                        <span>Sales</span>
                                    </li>
                                </ul>
                                <div class="dropdown dropdown-wraper">
                                    <button class="btn btn-light btn-sm dropdown-toggle" type="button"
                                        id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                        2025
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton" id="year-dropdown">
                                        <!-- @for ($y = date('Y'); $y >= date('Y') - 5; $y--) -->
                                            <li>
                                                <a href="javascript:void(0);" class="dropdown-item" data-year="2025">2025</a>
                                            </li>
                                        <!-- @endfor -->
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            {{-- <div id="sales_charts"></div> --}}
                            <canvas id="chart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-xl-5 col-sm-12 col-12 d-flex">
                    <div class="card flex-fill default-cover mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h4 class="card-title mb-0">Recent Purchase</h4>
                            <div class="view-all-link">
                                <a href="#" class="view-all d-flex align-items-center">
                                    View All<span class="ps-2 d-flex align-items-center"><i data-feather="arrow-right"
                                            class="feather-16"></i></span>
                                </a>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive dataview">
                                <table class="table dashboard-recent-products">
                                    <thead>
                                        <tr>
                                            <th>Parts</th>
                                            <th>Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                            <tr>
                                                <td>
                                                    <div class="productimgname">
                                                        <a href="javascript:void(0);" class="product-img stock-img">
                                                            <img src="{{ asset('build/img/no-image.svg') }}"
                                                                alt="product" height="50px" width="30px">
                                                        </a>
                                                        <a href="javascript:void(0);">Full Pant</a>
                                                    </div>
                                                </td>
                                                <td>890</td>
                                            </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Recent Service</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive dataview">
                        <table class="table dashboard-expired-products">
                            <thead>
                                <tr>
                                    <th>Service Type</th>
                                    <th>Total Price</th>
                                    <th>Given Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                    <tr>
                                        <td>
                                            <a href="#" data-bs-toggle="modal" style="cursor: pointer; text-decoration: none;" class="service-name">
                                        </td>
                                        <td>5945</td>
                                        <td>5945</td>
                                    </tr>
                               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function() {
        // Pass the chart data from Blade to JavaScript

        // Initialize the chart with the data
        renderChart(chartData);

        $('#year-dropdown').on('click', 'a', function() {
            var year = $(this).data('year');
            $('#selected-year').text(year);
            
            fetchSalePurchaseData(year);
        });

        function fetchSalePurchaseData(year) {
            $.ajax({
                url: '/',
                method: 'GET',
                data: { year: year }, 
                dataType: 'json', // Explicitly request JSON
                success: function(response) {
                    if (response && response.chartData) {
                        renderChart(response.chartData);
                    } else {
                        console.error("Invalid response format:", response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching data:", error);
                }
            });
        }

        // Function to render the chart
        function renderChart(data) {
            // console.log(data);
            
            var ctx = document.getElementById('chart').getContext('2d');
            if (window.myChart) {
                window.myChart.destroy();
            }
            window.myChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: data.map(item => item.month), 
                    datasets: [{
                        label: 'Sales',
                        data: data.map(item => item.sales),
                        backgroundColor: 'rgba(243, 21, 21, 0.98)',
                        borderColor: 'rgb(31, 104, 104)',
                        borderWidth: 1,
                        // borderRadius: 8 
                        
                    },
                    {
                        label: 'Purchase',
                        data: data.map(item => item.purchases),
                        backgroundColor: 'rgb(13, 230, 78)',
                        borderColor: 'rgb(90, 25, 219)',
                        borderWidth: 1,
                        // borderRadius: 8 
                    }]
                },
                options: {
                    responsive: true,
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        }
    });
</script>
@endpush
    
