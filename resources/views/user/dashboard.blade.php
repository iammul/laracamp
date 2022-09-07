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
                                <strong>{{ $item->Camp->price }}K</strong>
                            </td>
                            <td>
                                @if ($item->is_paid)
                                    <strong class="text-success">Success Payment</strong>
                                @else
                                    <strong>Waiting for Payment</strong>
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
                            <td colspan="5">No Data</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>

@endsection
