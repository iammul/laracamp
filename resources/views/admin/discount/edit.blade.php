@extends('layouts.app')
@section('content')
<section class="dashboard my-5">
    <div class="container">
        <div class="row text-left">
            <div class=" col-lg-12 col-12 header-wrap mt-4">
                <p class="story">
                    UPDATE
                </p>
                <h2 class="primary-header ">
                    Discount {{ $discount->name }}
                </h2>
            </div>
        </div>
        <div class="row my-5">
            @include('components.alert')
            <form action="{{ route('admin.discount.update', $discount->id) }}" method="POST" class="basic-form">
            @csrf
            @method('PUT')
            <input type="hidden" name="id" value="{{ $discount->id }}">
                <div class="mb-3">
                    <label class="form-label">Name</label>
                    <input name="name" type="text" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" value="{{ old('name') ?: $discount->name }}" required>
                    @if ($errors->has('name'))
                        <p class="text-danger">{{ $errors->first('name') }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Code</label>
                    <input name="code" type="text" class="form-control {{ $errors->has('code') ? 'is-invalid' : '' }}" value="{{ old('code') ?: $discount->code }}" required>
                    @if ($errors->has('code'))
                        <p class="text-danger">{{ $errors->first('code') }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea cols="0" rows="2" name="description" type="text" class="form-control {{ $errors->has('description') ? 'is-invalid' : '' }}" >{{ old('description') ?: $discount->description }}</textarea>
                    @if ($errors->has('description'))
                        <p class="text-danger">{{ $errors->first('description') }}</p>
                    @endif
                </div>
                <div class="mb-3">
                    <label class="form-label">Percentage</label>
                    <input name="percentage" type="number" min="1" max="100" class="form-control {{ $errors->has('percentage') ? 'is-invalid' : '' }}" value="{{ old('percentage') ?: $discount->percentage }}" required>
                    @if ($errors->has('percentage'))
                        <p class="text-danger">{{ $errors->first('percentage') }}</p>
                    @endif
                </div>
                <button type="submit" class="w-100 btn btn-primary">Update</button>
            </form>

        </div>
    </div>
</section>
@endsection
