@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Records') }}</div>

                <div class="card-body">
                    <div class="mb-3">
                        <a href="{{ route('master.create') }}" class="btn btn-success">{{ __('Create New Record') }}</a>
                    </div>

                    <table class="table">
                        <thead>
                            <tr>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Quantity') }}</th>
                                <th>{{ __('Price') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($records as $record)
                            <tr>
                                <td>{{ $record->name }}</td>
                                <td>{{ $record->qty }}</td> 
                                <td>{{ $record->price }}</td>
                                <td>
                                    <a href="{{ route('master.edit', $record->id) }}" class="btn btn-primary">{{ __('Edit') }}</a>
                                    <form action="{{ route('master.destroy', $record->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('{{ __('Are you sure you want to delete this record?') }}')">{{ __('Delete') }}</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4">{{ __('No records found.') }}</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
