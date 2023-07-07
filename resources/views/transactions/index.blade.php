@extends('layouts.app')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Transactions</h2>
            </div>
            <div class="pull-right">
                @can('transaction-create')
                <a class="btn btn-success" href="{{ route('transactions.create') }}"> Create New transaction</a>
                @endcan
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
        <tr>
            <th>Order ID</th>
            <th>Order Date</th>
            <th>Product</th>
            <th>Qty</th>
            <th>Base Price</th>
            <th>Sell Price</th>
            <th>Subtotal</th>
            <th>Tax</th>
            <th>Total</th>
            <th>Margin</th>
        </tr>
        @foreach ($transactions as $transaction)
        <tr>
            <td>{{ $transaction->id }}</td>
            <td>{{ $transaction->created_at }}</td>
            <td>{{ $transaction->product_name }}</td>
            <td>{{ $transaction->qty }}</td>
            <td>{{ $transaction->base_price }}</td>
            <td>{{ $transaction->sell_price }}</td>
            <td>{{ $transaction->sub_total}}</td>
            <td>{{ $transaction->tax }}</td>
            <td>{{ $transaction->total }}</td>
            <td>{{ ($transaction->sell_price - $transaction->base_price) * $transaction->qty }}</td>
        </tr>
        @endforeach
    </table>
    {!! $transactions->links() !!}
@endsection