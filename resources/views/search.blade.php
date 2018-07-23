@extends('base')

@section('content')

    <div class="row justify-content-center">

        <div name="search">

            <div name="form">
                <div class="form-group row">
                    <label for="Name" class="col-md-4 col-form-label text-md-right">{{ __('Name') }}</label>

                    <div class="col-md-6">
                        <input id="Name" type="text" class="form-control" name="Name" autofocus>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Price" class="col-md-4 col-form-label text-md-right">{{ __('Price') }}</label>

                    <div class="col-md-6">
                        <input id="Price" type="text" class="form-control" name="Price">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Bedrooms" class="col-md-4 col-form-label text-md-right">{{ __('Bedrooms') }}</label>

                    <div class="col-md-6">
                        <input id="Bedrooms" type="text" class="form-control" name="Bedrooms">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Bathrooms" class="col-md-4 col-form-label text-md-right">{{ __('Bathrooms') }}</label>

                    <div class="col-md-6">
                        <input id="Bathrooms" type="text" class="form-control" name="Bathrooms">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Storeys" class="col-md-4 col-form-label text-md-right">{{ __('Storeys') }}</label>

                    <div class="col-md-6">
                        <input id="Storeys" type="text" class="form-control" name="Storeys">
                    </div>
                </div>

                <div class="form-group row">
                    <label for="Garages" class="col-md-4 col-form-label text-md-right">{{ __('Garages') }}</label>

                    <div class="col-md-6">
                        <input id="Garages" type="text" class="form-control" name="Garages">
                    </div>
                </div>


                <div class="form-group row mb-0">
                    <div class="col-md-6 offset-md-4">
                        <button class="btn btn-primary" onclick="search()">{{ __('Search') }}</button>
                    </div>
                </div>
            </div>


            <div name="result">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Bedrooms</th>
                        <th scope="col">Bathrooms</th>
                        <th scope="col">Storeys</th>
                        <th scope="col">Garages</th>
                    </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>
    </div>

    @push('scripts')
        <script src="{{asset('js/search.js')}}?<?php echo filemtime("js/search.js")?>"></script>
    @endpush

@endsection
