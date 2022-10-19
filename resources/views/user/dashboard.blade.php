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
                    My Bootcamps
                </h2>
            </div>
        </div>
        <div class="row my-5">
            @include('components.alert')
            <table class="table">
                <tbody>
                    @forelse ($checkouts as $item)
                        <tr class="align-middle">
                            <td width="18%">
                                <img src="{{ asset('images/item_bootcamp.png') }}" height="120" alt="">
                            </td>
                            <td>
                                <p class="mb-2">
                                    <strong>{{ $item->Camp->title }}</strong>
                                </p>
                                <p>
                                    {{ $item->created_at->format('M d, Y') }}
                                </p>
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
                                <strong>{{ $item->payment_status}}</strong>
                            </td>
                            <td>
                                @if ($item->payment_status == 'waiting' )
                                    <a href="{{ $item->midtrans_url}}" class="btn btn-primary">Pay Here</a>
                                @endif
                            </td>
                            <td>
                                <a href="https://wa.me/082158445894?text=Hi, saya ingin bertanya tentang kelas {{ $item->Camp->title }}" class="btn btn-primary">
                                    Contact Support
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No Camp Registered</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
