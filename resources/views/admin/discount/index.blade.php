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
                    Discount
                </h2>
            </div>
        </div>
        <div class="row my-5">
            <div class="row">
                <div class="col-md-12 d-flex flex-row-reverse mb-2">
                    <a href="{{ route('admin.discount.create') }}" class="btn btn-primary btn-sm">Add Discount</a>
                </div>
            </div>
            @include('components.alert')
            <table class="table">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Code</th>
                        <th>Description</th>
                        <th>Percentage</th>
                        <th colspan="2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($discounts as $item)
                        <tr class="align-middle">
                            <td>
                                {{ $item->name }}
                            </td>
                            <td>
                                <span class="badge bg-primary">
                                    {{ $item->code }}
                                </span>
                            </td>
                            <td>
                                {{ $item->description }}
                            </td>
                            <td>
                                {{ $item->percentage }}%
                            </td>
                            <td>
                                <a href="{{ route('admin.discount.edit', $item->id) }}" class="btn btn-warning">Edit</a>
                            </td>
                            <td>
                                <form action="{{ route('admin.discount.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No discount</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</section>
@endsection
