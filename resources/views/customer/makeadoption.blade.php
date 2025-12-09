@extends('layouts.dashboard')

@section('title', 'Module Pets: Larapets 🐶')

@section('content')


<h1 class="text-4x1 text-white flex gap-2 items-center justify-center pb-4 border-b-2 border-neutral-50 mb-10">
    <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="currentColor" viewBox="0 0 256 256">
        <path d="M212,80a28,28,0,1,0,28,28A28,28,0,0,0,212,80Zm0,40a12,12,0,1,1,12-12A12,12,0,0,1,212,120ZM72,108a28,28,0,1,0-28,28A28,28,0,0,0,72,108ZM44,120a12,12,0,1,1,12-12A12,12,0,0,1,44,120ZM92,88A28,28,0,1,0,64,60,28,28,0,0,0,92,88Zm0-40A12,12,0,1,1,80,60,12,12,0,0,1,92,48Zm72,40a28,28,0,1,0-28-28A28,28,0,0,0,164,88Zm0-40a12,12,0,1,1-12,12A12,12,0,0,1,164,48Zm23.12,100.86a35.3,35.3,0,0,1-16.87-21.14,44,44,0,0,0-84.5,0A35.25,35.25,0,0,1,69,148.82,40,40,0,0,0,88,224a39.48,39.48,0,0,0,15.52-3.13,64.09,64.09,0,0,1,48.87,0,40,40,0,0,0,34.73-72ZM168,208a24,24,0,0,1-9.45-1.93,80.14,80.14,0,0,0-61.19,0,24,24,0,0,1-20.71-43.26,51.22,51.22,0,0,0,24.46-30.67,28,28,0,0,1,53.78,0,51.27,51.27,0,0,0,24.53,30.71A24,24,0,0,1,168,208Z"></path>
    </svg>
    Module Pets
</h1>




{{-- Options --}}
<label class="input text-white bg-[#0009] outline-none mb-10">
    <svg class="h-[1em] opacity-50" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
        <g
            stroke-linejoin="round"
            stroke-linecap="round"
            stroke-width="2.5"
            fill="none"
            stroke="currentColor">
            <circle cx="11" cy="11" r="8"></circle>
            <path d="m21 21-4.3-4.3"></path>
        </g>
    </svg>
    <input type="search" required placeholder="Search" name="qsearch" id="qsearch" />
</label>

<!-- CSRF token for AJAX search -->
<input type="hidden" name="_token" value="{{ csrf_token() }}">



<div class="overflow-x-auto text-white rounded-box bg-[#fff9]">
    <table class="table bg-[#0009]">
        <!-- head -->
        <thead class="text-white bg-[#000]">
            <tr>
                <th class="hidden md:table-cell">Id</th>
                <th>Photo</th>
                <th>Name</th>
                <th class="hidden md:table-cell">Kind</th>
                <th class="hidden md:table-cell">Breed</th>
                <th class="hidden md:table-cell">Age</th>
                <th class="hidden md:table-cell">Location</th>
                <th class="hidden md:table-cell">Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody class="datalist">
            @foreach ($pets as $pet)

            <tr class="{{ $pet->id % 2 == 0 ? 'bg-[#0006]' : '' }}">
                <th class="hidden md:table-cell">
                    @php
                    $number = $pets->total() - ($pets->firstItem() + $loop->index) + 1;
                    @endphp
                    {{ $number }}
                </th>
                <td>
                    <div class="avatar">
                        <div class="rounded-full w-16">
                            <img src="{{ asset('images/' . ($pet->image ?? 'no-image.png')) }}" />
                        </div>
                    </div>
                </td>
                <td>{{ $pet->name }}</td>
                <td class="hidden md:table-cell">{{ $pet->kind }}</td>
                <td class="hidden md:table-cell">{{ $pet->breed }}</td>
                <td class="hidden md:table-cell">{{ $pet->age }}</td>
                <td class="hidden md:table-cell">{{ $pet->location }}</td>
                <td class="hidden md:table-cell">
                    @if ($pet->status == 1)
                    <div class="badge badge-outline badge-error">Adopted</div>
                    @else
                    <div class="badge badge-outline badge-success">Available</div>
                    @endif
                </td>
                <td>
                    <a class="btn btn-outline btn-xs" href="{{ url('pets/' . $pet->id) }}">
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-4" fill="currentColor" viewBox="0 0 256 256">
                            <path d="M229.66,218.34l-50.07-50.06a88.11,88.11,0,1,0-11.31,11.31l50.06,50.07a8,8,0,0,0,11.32-11.32ZM40,112a72,72,0,1,1,72,72A72.08,72.08,0,0,1,40,112Z"></path>
                        </svg>
                    </a>
                </td>
            </tr>
            @endforeach
            <tr class="bg-[#0009]">
                <td colspan="9">{{ $pets->links('layouts.pagination') }}</td>
            </tr>
        </tbody>
    </table>
</div>

{{-- Modal --}}
<dialog id="modal_message" class="modal">
    <div class="modal-box">
        <h3 class="text-lg font-bold">Congratulations!</h3>
        <div role="alert" class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
            </svg>
            <span>{{ session('message') }}</span>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>close</button>
    </form>
</dialog>
{{-- Modal Delete --}}
<dialog id="modal_delete" class="modal bg-[#0009]">
    <div class="modal-box bg-[#000] text-white">
        <h3 class="text-lg font-bold mb-4">
            Are you sure?!
        </h3>
        <div role="alert" class="alert alert-warning alert-outline">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24" class="stroke-info h-6 w-6 shrink-0">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
            </svg>
            <span>You want to delete: <strong class="fullname"></strong></span>
        </div>
        <div class="flex gap-2 mt-4">
            <button class="btn btn-default btn-outline btn-sm btn-confirm">Confirm</button>
            <form method="dialog">
                <button class="btn btn-default btn-outline btn-sm">Cancel</button>
            </form>
        </div>
    </div>
    <form method="dialog" class="modal-backdrop">
        <button>cancel</button>
    </form>
</dialog>
@endsection

@section('js')
<script>
    // Modal
    $(document).ready(function() {
        const modal_message = document.getElementById('modal_message');
        @if(session('message'))
        modal_message.showModal();
        @endif


        // Delete ----------------
        $('table').on('click', '.btn-delete', function() {
            $fullname = $(this).data('fullname')
            $('.fullname').text($fullname);
            $fsm = $(this).next()
            modal_delete.showModal();

        })
        $('.btn-confirm').on('click', function(e) {
            e.preventDefault()
            $fsm.submit()
        })


        // Search ----------------
        function debounce(func, wait) {
            let timeout
            return function executedFunction(...args) {
                const later = () => {
                    clearTimeout(timeout)
                    func(...args)
                };
                clearTimeout(timeout)
                timeout = setTimeout(later, wait)
            }
        }
        const search = debounce(function(query) {

            $token = $('input[name=_token]').val()

            $.post("search/makeadoption", {
                    'q': query,
                    '_token': $token
                },
                function(data) {
                    $('.datalist').html(data).hide().fadeIn(1000)
                }
            )
        }, 500)
        $('body').on('input', '#qsearch', function(event) {
            event.preventDefault()
            const query = $(this).val()

            $('.datalist').html(`<tr>
                                        <td colspan="9" class="text-center py-18">
                                            <span class="loading loading-spinner loading-xl"></span>
                                        </td>
                                    </tr>`)
            if (query != '') {
                search(query)
            } else {
                setTimeout(() => {
                    window.location.replace('makeadoption')
                }, 500);
            }
        })
        // Import
        $('.btn-import').click(function(e) {
            $('#file').click();
        })
        $('#file').change(function(e) {
            $(this).parent().submit();
        })
    })
</script>
@endsection