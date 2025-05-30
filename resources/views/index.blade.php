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
                <div class="mb-5">
                    <h2 class="mb-4">Recent Orders</h2>
                    <div class="card shadow-sm border-0">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered align-middle text-center">
                                    <thead class="table-light">
                                        <tr>
                                            <th scope="col">SL</th>
                                            <th scope="col">Order No</th>
                                            <th scope="col">User Name</th>
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Attributes</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $order)
                                            @php
                                                $orderLoop = $loop;
                                                $orderItemsCount = count($order->orderItems);
                                            @endphp
                                            @foreach ($order->orderItems as $item)
                                                <tr>
                                                    @if ($loop->first)
                                                        <td rowspan="{{ $orderItemsCount }}">{{ $orderLoop->iteration }}
                                                        </td>
                                                        <td rowspan="{{ $orderItemsCount }}">{{ $order->order_number }}
                                                        </td>
                                                        <td rowspan="{{ $orderItemsCount }}">
                                                            {{ $order->user->name ?? 'N/A' }}</td>
                                                    @endif

                                                    <td>{{ $item->product->name ?? 'N/A' }}</td>
                                                    <td>{{ $item->quantity }}</td>
                                                    <td>{{ number_format($item->price, 2) }}</td>
                                                    <td>
                                                        @if ($item->variant && $item->variant->attributes->count())
                                                            @foreach ($item->variant->attributes as $attribute)
                                                                <span class="badge bg-primary mb-1">
                                                                    {{ $attribute->attribute->name ?? '' }}:
                                                                    {{ $attribute->values->pluck('value.name')->implode(', ') }}
                                                                </span><br>
                                                            @endforeach
                                                        @else
                                                            <span class="text-muted">N/A</span>
                                                        @endif
                                                    </td>

                                                    @if ($loop->first)
                                                        <td rowspan="{{ $orderItemsCount }}">
                                                            @if ($order->status == 1)
                                                                <span class="badge bg-warning">Pending</span>
                                                            @elseif ($order->status == 2)
                                                                <span class="badge bg-info">Processing</span>
                                                            @elseif ($order->status == 3)
                                                                <span class="badge bg-danger">Cancelled</span>
                                                            @elseif($order->status == 4)
                                                                <span class="badge bg-success">Delivered</span>
                                                            @endif
                                                        </td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @empty
                                            <tr>
                                                <td colspan="8" class="text-center text-muted">No Order Found</td>
                                            </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                </main>
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
                        data: {
                            year: year
                        },
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
                                }
                            ]
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
