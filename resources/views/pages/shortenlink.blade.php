@extends('layouts.app')

@section('content')
        <div class='container mt-5'>

            <h1>Generate Shorten Link</h1>

            @if (session('success'))
            <div class='alert alert-success'>{{ session('success') }}</div>
            @endif

            <div class='card'>
                <div class="card-header">
                    <form method="POST" action="{{ route('shortlink.post') }}">

                        @csrf

                        <div class="input-group mb-3">
                            <input type="text" name="link" class="form-control" placeholder="Enter URl">
                            <div class="input-group-addon">
                                <button class="btn btn-success">Generate Shorten Link</button>
                            </div>
                        </div>
                        @error('link')
                            <p class="m-0 p-0 text-danger">{{ $message }}</p>
                        @enderror
                    </form>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Short Link</th>
                        <th>Link</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shortLinks as $row)
                    <tr>
                        <td> {{$row->id}} </td>
                        <td><a href="{{ route('shorten.link', $row->code) }}" target="_blank">{{$row->code}}</a>
                            {{ route('shorten.link', $row->code) }}
                        </td>
                        <td> {{$row->link}} </td>
                        <td scope="col">

                            <a href="{{  route('shortlink.edit', $row->id) }}">
                            <button class="btn btn-primary btn-sm">
                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit
                            </button>
                            </a>

                            <form action="{{ route('shortlink.destroy', $row->id) }}" method="POST" style ="display:inline">
                             @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                            </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </body>
</html>
