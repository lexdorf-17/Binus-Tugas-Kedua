@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-6 margin-tb">
            <div class="panel-body">
                    <canvas id="canvas" height="280" width="600"></canvas>
            </div>
        </div>
        <div class="col-lg-6 margin-tb">
            <div class="pull-left">
                <h2>Report Margin Per Product</h2>
            </div>
            <table class="table table-bordered">
                <tr>
                    <th>Product</th>
                    <th>Qty</th>
                    <th>Margin</th>
                </tr>
                @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->product_name }}</td>
                    <td>{{ $transaction->total_qty }}</td>
                    <td>{{ $transaction->margin * $transaction->total_qty }}</td>
                </tr>
                @endforeach
            </table>
            {!! $transactions->links() !!}
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
    var products = [];
    var quantities = [];
    
    @foreach ($transactions as $transaction)
        products.push('{{ $transaction->product_name }}');
        quantities.push('{{ $transaction->total_qty }}');
    @endforeach
    
    var barChartData = {
        labels: products,
        datasets: [{
            label: 'Product',
            backgroundColor: "pink",
            data: quantities
        }]
    };

    window.onload = function() {
        var ctx = document.getElementById("canvas").getContext("2d");
        window.myBar = new Chart(ctx, {
            type: 'bar',
            data: barChartData,
            options: {
                elements: {
                    rectangle: {
                        borderWidth: 2,
                        borderColor: '#c1c1c1',
                        borderSkipped: 'bottom'
                    }
                },
                responsive: true,
                title: {
                    display: true,
                    text: 'Qty Transaction Per Product'
                }
            }
        });
    };
    </script>
@endsection