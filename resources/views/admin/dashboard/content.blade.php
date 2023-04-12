@extends('admin.admin_layout')
@section('content')

    <div class="row">
        <div class="col-lg col-md-6 col-sm-6">
            <form action="{{url('dashboard')}}" method="get">
                <div class="form-group">
                    <label for="date_filter">Date</label>
                    <select class="form-control" name="date_filter">
                        <option value="1">ToDay</option>
                        <option value="0">This Month</option>
                        <option value="2">This Year</option>
                    </select>
                </div>
                <button class="btn btn-default " type="submit">Submit</button>
            </form>
        </div>
        <div class="col-lg col-md-6 col-sm-6">
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
                                <p class="card-category">Revenue</p>
                                <p class="card-title">{{number_format($summary['revenue'])}}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i>
                        In the last month
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-sound-wave text-danger"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Order Completed</p>
                                <p class="card-title">{{$summary['order_completed']}}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i>
                        In the last month
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg col-md-6 col-sm-6">
            <div class="card card-stats">
                <div class="card-body ">
                    <div class="row">
                        <div class="col-5 col-md-4">
                            <div class="icon-big text-center icon-warning">
                                <i class="nc-icon nc-single-copy-04 text-primary"></i>
                            </div>
                        </div>
                        <div class="col-7 col-md-8">
                            <div class="numbers">
                                <p class="card-category">Ticket Sold</p>
                                <p class="card-title">{{$summary['ticket_sold']}}
                                <p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer ">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i>
                        In the last month
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md">
            <div class="card card-chart">
                <div class="card-header">
                    <h5 class="card-title">SALE</h5>
                    <p class="card-category"></p>
                </div>
                <div class="card-body">
                    <canvas id="myChart"></canvas>
                </div>
                <div class="card-footer">
                    <div class="chart-legend">
                        <i class="fa fa-circle text-info"></i>
                        <i class="fa fa-circle text-warning"></i>
                    </div>
                    <hr/>
                    <div class="card-stats">
                        <i class="fa fa-check"></i> Data information certified
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const ctx = document.getElementById('myChart');

        let data = @json($chart);
        console.log(data)
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['1', '2', '3', '4', '5', '6','7','8','9','10','11','12'],
                datasets: [{
                    label: '',
                    data: data,
                    borderWidth: 1,
                    backgroundColor: '#c1c0bd',
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                    }
                }
            }
        });
    </script>
@endsection
