@extends('admin.layouts.main')

@section('title')
    {{ $title }}
@endsection


@section('content')
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Overview</li>
        </ol>
    </nav>
    <h1 class="h2">{{ $title }}</h1>

    @include('admin.components.display-msg-fail')
    @include('admin.components.display-msg-success')

    <div class="row">
        <div class="col-12 mb-4 mb-lg-0">
            <div class="card">
                <a href="/admin/banners/create" class="btn btn-sm btn-success">
                    Create
                </a>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Trường dữ liệu</th>
                                    <th scope="col">Giá trị</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($banner as $field => $value)
                                    <tr>
                                        <td>
                                            {{ strtoupper($field) }}
                                        </td>
                                        <td>
                                            @switch($field)
                                                @case('img')
                                                    <img src="{{ file_url($banner['img']) }}" width="100px" alt="">
                                                @break

                                                @case('is_active')
                                                    @if ($banner['is_active'])
                                                        <span class="badge bg-info">YES</span>
                                                    @else
                                                        <span class="badge bg-info">NO</span>
                                                    @endif
                                                @break

                                                @default
                                                    {{ $value }}
                                            @endswitch
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
