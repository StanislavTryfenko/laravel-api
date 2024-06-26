@extends('layouts.admin')

@section('content')
    <header class="py-3 bg-dark text-white shadow-lg">
        <div class="container d-flex justify-content-between">
            <h1>Technologies</h1>
            <a class="btn btn-primary align-self-center" href="{{ route('admin.technologies.create') }}">New technology</a>
        </div>
    </header>
    <section class="py-5 bg-light">
        <div class="container">
            @include('partials.validation-messages')

            <div class="table-responsive">
                <table class="table table-secondary table-striped table-bordered">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col" style="width: 210px">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-group-divider">
                        @forelse ($technologies as $technology)
                            <tr class="">
                                <td scope="row">{{ $technology->id }}</td>
                                <td>{{ $technology->name }}</td>
                                <td>
                                    <x-offcanvas.technologies :id="$technology->id" :name="$technology->name" :route=" route('admin.technologies.update', $technology)" >
                                    </x-offcanvas.technologies>
                                    <x-button-delete :id="$technology->id" :name="$technology->name" :route="route('admin.technologies.destroy', $technology)">
                                    </x-button-delete>
                                </td>
                            </tr>
                        @empty
                            <tr class="">
                                <td scope="row" colspan="3">No technologies</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    {{ $technologies->links('pagination::bootstrap-5') }}
@endSection
