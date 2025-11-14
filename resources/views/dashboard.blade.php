@extends('layouts.dashboard')
@section('title', 'Dashboard ADMIN: Larapets 🐶')

@section('content')

<h1 class="flex gap-2 items-center justify-center text-4xl pb-4 border-b-2 border-white mb-10 text-white">
    <svg xmlns="http://www.w3.org/2000/svg" class="size-12" fill="currentColor" viewBox="0 0 256 256">
        <path d="M128,16a96.11,96.11,0,0,0-96,96c0,24,12.56,55.06,33.61,83,21.18,28.15,44.5,45,62.39,45s41.21-16.81,62.39-45c21.05-28,33.61-59,33.61-83A96.11,96.11,0,0,0,128,16Zm49.61,169.42C160.24,208.49,140.31,224,128,224s-32.24-15.51-49.61-38.58C59.65,160.5,48,132.37,48,112a80,80,0,0,1,160,0C208,132.37,196.35,160.5,177.61,185.42ZM120,136A40,40,0,0,0,80,96a16,16,0,0,0-16,16,40,40,0,0,0,40,40A16,16,0,0,0,120,136ZM80,112a24,24,0,0,1,24,24h0A24,24,0,0,1,80,112Zm96-16a40,40,0,0,0-40,40,16,16,0,0,0,16,16,40,40,0,0,0,40-40A16,16,0,0,0,176,96Zm-24,40a24,24,0,0,1,24-24A24,24,0,0,1,152,136Zm0,48a8,8,0,0,1-8,8H112a8,8,0,0,1,0-16h32A8,8,0,0,1,152,184Z"></path>
    </svg>
    Dashboard
</h1>

{{-- model users --}}
<div class="flex flex-wrap gap-4 items-center justify-center">
    <div class="card text-white bg-[#0006] w-96 shadow-sm">
        <figure>
            <img
                src="images/webos.png"
                alt="Shoes" />
        </figure>
        <div class="card-body">
            <h2 class="card-title">Module Users</h2>
            <ul class="list bg-[#0003] rounded-box shadow-md">

                <li class="p-4 pb-2 text-xs opacity-60 tracking-wide">Estadistics</li>

                <li class="list-row">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256">
                            <path d="M244.8,150.4a8,8,0,0,1-11.2-1.6A51.6,51.6,0,0,0,192,128a8,8,0,0,1-7.37-4.89,8,8,0,0,1,0-6.22A8,8,0,0,1,192,112a24,24,0,1,0-23.24-30,8,8,0,1,1-15.5-4A40,40,0,1,1,219,117.51a67.94,67.94,0,0,1,27.43,21.68A8,8,0,0,1,244.8,150.4ZM190.92,212a8,8,0,1,1-13.84,8,57,57,0,0,0-98.16,0,8,8,0,1,1-13.84-8,72.06,72.06,0,0,1,33.74-29.92,48,48,0,1,1,58.36,0A72.06,72.06,0,0,1,190.92,212ZM128,176a32,32,0,1,0-32-32A32,32,0,0,0,128,176ZM72,120a8,8,0,0,0-8-8A24,24,0,1,1,87.24,82a8,8,0,1,0,15.5-4A40,40,0,1,0,37,117.51,67.94,67.94,0,0,0,9.6,139.19a8,8,0,1,0,12.8,9.61A51.6,51.6,0,0,1,64,128,8,8,0,0,0,72,120Z"></path>
                        </svg>
                    </div>
                    <div class="flex items-center">
                        <div class="text-xs uppercase font-semibold opacity-60">Total Users</div>
                    </div>
                    <button class="btn btn-square btn-ghost">
                        {{ App\models\User::count() }}
                    </button>
                </li>
                <li class="list-row">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256"><path d="M152,80a8,8,0,0,1,8-8h88a8,8,0,0,1,0,16H160A8,8,0,0,1,152,80Zm96,40H160a8,8,0,0,0,0,16h88a8,8,0,0,0,0-16Zm0,48H184a8,8,0,0,0,0,16h64a8,8,0,0,0,0-16Zm-96.25,22a8,8,0,0,1-5.76,9.74,7.55,7.55,0,0,1-2,.26,8,8,0,0,1-7.75-6c-6.16-23.94-30.34-42-56.25-42s-50.09,18.05-56.25,42a8,8,0,0,1-15.5-4c5.59-21.71,21.84-39.29,42.46-48a48,48,0,1,1,58.58,0C129.91,150.71,146.16,168.29,151.75,190ZM80,136a32,32,0,1,0-32-32A32,32,0,0,0,80,136Z"></path></svg>
                    </div>
                    <div class="flex items-center">
                        <div class="text-xs uppercase font-semibold opacity-60">Costumers</div>
                    </div>
                    <button class="btn btn-square btn-ghost">
                        {{ App\Models\User::where('role', 'Customer')->count() }}
                    </button>
                </li>
                <li class="list-row">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256"><path d="M144,157.68a68,68,0,1,0-71.9,0c-20.65,6.76-39.23,19.39-54.17,37.17a8,8,0,0,0,12.25,10.3C50.25,181.19,77.91,168,108,168s57.75,13.19,77.87,37.15a8,8,0,0,0,12.25-10.3C183.18,177.07,164.6,164.44,144,157.68ZM56,100a52,52,0,1,1,52,52A52.06,52.06,0,0,1,56,100Zm197.66,33.66-32,32a8,8,0,0,1-11.32,0l-16-16a8,8,0,0,1,11.32-11.32L216,148.69l26.34-26.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                    </div>
                    <div class="flex items-center">
                        <div class="text-xs uppercase font-semibold opacity-60">Actives</div>
                    </div>
                    <button class="btn btn-square btn-ghost">
                        {{ App\Models\User::where('active', 1)->count() }}
                    </button>
                </li>
            </ul>
            <div class="card-actions justify-end">
                <a class="btn btn-outline hover:bg-[#fff6] hover:text-white mt-3 border">Enter ></a>
            </div>
        </div>
    </div>

    {{-- model pets --}}

   <div class="flex flex-wrap gap-4 items-center justify-center">
    <div class="card text-white bg-[#0006] w-96 shadow-sm">
        <figure>
            <img
                src="images/pets-module.png"
                alt="Shoes" />
        </figure>
        <div class="card-body">
            <h2 class="card-title">Module Users</h2>
            <ul class="list bg-[#0003] rounded-box shadow-md">

                <li class="p-4 pb-2 text-xs opacity-60 tracking-wide">Estadistics</li>

                <li class="list-row">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256">
                            <path d="M244.8,150.4a8,8,0,0,1-11.2-1.6A51.6,51.6,0,0,0,192,128a8,8,0,0,1-7.37-4.89,8,8,0,0,1,0-6.22A8,8,0,0,1,192,112a24,24,0,1,0-23.24-30,8,8,0,1,1-15.5-4A40,40,0,1,1,219,117.51a67.94,67.94,0,0,1,27.43,21.68A8,8,0,0,1,244.8,150.4ZM190.92,212a8,8,0,1,1-13.84,8,57,57,0,0,0-98.16,0,8,8,0,1,1-13.84-8,72.06,72.06,0,0,1,33.74-29.92,48,48,0,1,1,58.36,0A72.06,72.06,0,0,1,190.92,212ZM128,176a32,32,0,1,0-32-32A32,32,0,0,0,128,176ZM72,120a8,8,0,0,0-8-8A24,24,0,1,1,87.24,82a8,8,0,1,0,15.5-4A40,40,0,1,0,37,117.51,67.94,67.94,0,0,0,9.6,139.19a8,8,0,1,0,12.8,9.61A51.6,51.6,0,0,1,64,128,8,8,0,0,0,72,120Z"></path>
                        </svg>
                    </div>
                    <div class="flex items-center">
                        <div class="text-xs uppercase font-semibold opacity-60">Total Users</div>
                    </div>
                    <button class="btn btn-square btn-ghost">
                        {{ App\models\Pet::count() }}
                    </button>
                </li>
                <li class="list-row">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256"><path d="M152,80a8,8,0,0,1,8-8h88a8,8,0,0,1,0,16H160A8,8,0,0,1,152,80Zm96,40H160a8,8,0,0,0,0,16h88a8,8,0,0,0,0-16Zm0,48H184a8,8,0,0,0,0,16h64a8,8,0,0,0,0-16Zm-96.25,22a8,8,0,0,1-5.76,9.74,7.55,7.55,0,0,1-2,.26,8,8,0,0,1-7.75-6c-6.16-23.94-30.34-42-56.25-42s-50.09,18.05-56.25,42a8,8,0,0,1-15.5-4c5.59-21.71,21.84-39.29,42.46-48a48,48,0,1,1,58.58,0C129.91,150.71,146.16,168.29,151.75,190ZM80,136a32,32,0,1,0-32-32A32,32,0,0,0,80,136Z"></path></svg>
                    </div>
                    <div class="flex items-center">
                        <div class="text-xs uppercase font-semibold opacity-60">Dogs</div>
                    </div>
                    <button class="btn btn-square btn-ghost">
                        {{ App\Models\Pet::where('kind','Dog')->count() }}
                    </button>
                </li>
                <li class="list-row">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256"><path d="M144,157.68a68,68,0,1,0-71.9,0c-20.65,6.76-39.23,19.39-54.17,37.17a8,8,0,0,0,12.25,10.3C50.25,181.19,77.91,168,108,168s57.75,13.19,77.87,37.15a8,8,0,0,0,12.25-10.3C183.18,177.07,164.6,164.44,144,157.68ZM56,100a52,52,0,1,1,52,52A52.06,52.06,0,0,1,56,100Zm197.66,33.66-32,32a8,8,0,0,1-11.32,0l-16-16a8,8,0,0,1,11.32-11.32L216,148.69l26.34-26.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                    </div>
                    <div class="flex items-center">
                        <div class="text-xs uppercase font-semibold opacity-60">Cats</div>
                    </div>
                    <button class="btn btn-square btn-ghost">
                        {{ App\Models\Pet::where('kind', 'Cat')->count() }}
                    </button>
                </li>
            </ul>
            <div class="card-actions justify-end">
                <a class="btn btn-outline hover:bg-[#fff6] hover:text-white mt-3 border">Enter ></a>
            </div>
        </div>
    </div>

    {{-- model  --}}

    <div class="flex flex-wrap gap-4 items-center justify-center">
    <div class="card text-white bg-[#0006] w-96 shadow-sm">
        <figure>
            <img
                src="images/adoption-module.png"
                alt="Shoes" />
        </figure>
        <div class="card-body">
            <h2 class="card-title">Module Users</h2>
            <ul class="list bg-[#0003] rounded-box shadow-md">

                <li class="p-4 pb-2 text-xs opacity-60 tracking-wide">Estadistics</li>

                <li class="list-row">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256">
                            <path d="M244.8,150.4a8,8,0,0,1-11.2-1.6A51.6,51.6,0,0,0,192,128a8,8,0,0,1-7.37-4.89,8,8,0,0,1,0-6.22A8,8,0,0,1,192,112a24,24,0,1,0-23.24-30,8,8,0,1,1-15.5-4A40,40,0,1,1,219,117.51a67.94,67.94,0,0,1,27.43,21.68A8,8,0,0,1,244.8,150.4ZM190.92,212a8,8,0,1,1-13.84,8,57,57,0,0,0-98.16,0,8,8,0,1,1-13.84-8,72.06,72.06,0,0,1,33.74-29.92,48,48,0,1,1,58.36,0A72.06,72.06,0,0,1,190.92,212ZM128,176a32,32,0,1,0-32-32A32,32,0,0,0,128,176ZM72,120a8,8,0,0,0-8-8A24,24,0,1,1,87.24,82a8,8,0,1,0,15.5-4A40,40,0,1,0,37,117.51,67.94,67.94,0,0,0,9.6,139.19a8,8,0,1,0,12.8,9.61A51.6,51.6,0,0,1,64,128,8,8,0,0,0,72,120Z"></path>
                        </svg>
                    </div>
                    <div class="flex items-center">
                        <div class="text-xs uppercase font-semibold opacity-60">Total Users</div>
                    </div>
                    <button class="btn btn-square btn-ghost">
                        {{ App\models\Adoption::count() }}
                    </button>
                </li>
                <li class="list-row">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256"><path d="M152,80a8,8,0,0,1,8-8h88a8,8,0,0,1,0,16H160A8,8,0,0,1,152,80Zm96,40H160a8,8,0,0,0,0,16h88a8,8,0,0,0,0-16Zm0,48H184a8,8,0,0,0,0,16h64a8,8,0,0,0,0-16Zm-96.25,22a8,8,0,0,1-5.76,9.74,7.55,7.55,0,0,1-2,.26,8,8,0,0,1-7.75-6c-6.16-23.94-30.34-42-56.25-42s-50.09,18.05-56.25,42a8,8,0,0,1-15.5-4c5.59-21.71,21.84-39.29,42.46-48a48,48,0,1,1,58.58,0C129.91,150.71,146.16,168.29,151.75,190ZM80,136a32,32,0,1,0-32-32A32,32,0,0,0,80,136Z"></path></svg>
                    </div>
                    <div class="flex items-center">
                        <div class="text-xs uppercase font-semibold opacity-60">Dogs Adopteds</div>
                    </div>
                    <button class="btn btn-square btn-ghost">
                        {{ App\Models\Pet::where('status', 1)->where('kind','Dog')->count() }}
                    </button>
                </li>
                <li class="list-row">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" class="size-10" fill="currentColor" viewBox="0 0 256 256"><path d="M144,157.68a68,68,0,1,0-71.9,0c-20.65,6.76-39.23,19.39-54.17,37.17a8,8,0,0,0,12.25,10.3C50.25,181.19,77.91,168,108,168s57.75,13.19,77.87,37.15a8,8,0,0,0,12.25-10.3C183.18,177.07,164.6,164.44,144,157.68ZM56,100a52,52,0,1,1,52,52A52.06,52.06,0,0,1,56,100Zm197.66,33.66-32,32a8,8,0,0,1-11.32,0l-16-16a8,8,0,0,1,11.32-11.32L216,148.69l26.34-26.35a8,8,0,0,1,11.32,11.32Z"></path></svg>
                    </div>
                    <div class="flex items-center">
                        <div class="text-xs uppercase font-semibold opacity-60">Cat Adopteds</div>
                    </div>
                    <button class="btn btn-square btn-ghost">
                        {{ App\Models\Pet::where('status', 1)->where('kind','Cat')->count() }}
                    </button>
                </li>
            </ul>
            <div class="card-actions justify-end">
                <a class="btn btn-outline hover:bg-[#fff6] hover:text-white mt-3 border">Enter ></a>
            </div>
        </div>
    </div>
</div>


@endsection