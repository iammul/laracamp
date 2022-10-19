@extends('layouts.app')

@section('content')

<section class="dashboard my-5">
    <div class="container">
        <div class="row text-left">
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                    DASHBOARD
                </p>
                <h2 class="primary-header ">
                    Transaction
                </h2>
            </div>
        </div>
        <div class="row my-5">
            @include('components.alert')
            <table class="table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Camp</th>
                        <th>Price</th>
                        <th>Register Date</th>
                        <th>Paid Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($checkouts as $item)
                        <tr class="align-middle">
                            <td>
                                {{ $item->User->name }}
                            </td>
                            <td>
                                {{ $item->Camp->title }}
                            </td>
                            <td>
                                <strong>
                                    Rp. {{ $item->total }}
                                    @if ($item->discount_id)
                                        <span class="badge bg-success">Disc {{ $item->discount_percentage }}%</span>
                                    @endif
                                </strong>
                            </td>
                            <td>
                                {{ $item->created_at->format('M d, Y') }}
                            </td>
                            <td>
                                <strong>{{ $item->payment_status }}</strong>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No camps registered</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
