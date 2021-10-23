<div>
    @section('title', __('navbar.search'))
    @section("css")
    <link href="{{ asset('css/datatables.min.css') }}" rel="stylesheet">
     @stop
    @include('layouts.navbar')


    <div class="container-fluid mx-auto accordionpx-2 pt-5 mx-0 mt-5 mb-3 row">
        <div class="p-2 mb-3 bg-white border col-12 rounded-xl">
           <livewire:search />
        </div>
    </div>
</div>
