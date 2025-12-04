@extends('layouts.dashboard')

@section('title', 'Make Adoption: Larapets 🐶')

@section('content')
<h1 class="text-4xl text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutra-50 mb-10">
    Make Adoption
</h1>

<div class="w-full md:w-[720px] w-[320px] bg-[#0009] rounded-box p-6">
    <form method="POST" action="{{ url('adoptions') }}" class="flex flex-col gap-4">
        @csrf

        <label class="label text-white">Select Pet</label>
        <select name="pet_id" class="select select-bordered w-full bg-[#fff]">
            <option value="">-- Choose a pet --</option>
            @foreach($pets as $pet)
            <option value="{{ $pet->id }}">{{ $pet->name }} | {{ $pet->kind }} | {{ $pet->breed ?? 'N/A' }}</option>
            @endforeach
        </select>
        @error('pet_id') <small class="badge badge-error w-full mt-1 text-xs py-4">{{ $message }}</small> @enderror

        <button class="btn btn-outline btn-success mt-4 w-full">Request Adoption</button>
    </form>
</div>
@endsection
