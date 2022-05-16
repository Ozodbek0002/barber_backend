@extends('admin.master')
@section('content')
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-9"><h1 class="card-title">Video</h1></div>
                    <div class="col-md-1">
                        <a class="btn btn-primary" href="{{route('admin.vidios.create')}}">
                            <span class="btn-label">
                                <i class="fa fa-plus"></i>
                            </span>
                            Video qo'shish
                        </a>
                    </div>
                </div>
                <hr>
                <div class="card-body">
                    <table class="table table-bordered text-center">
                        <thead>
                        <tr>
                            <th class="" scope="col">#</th>
                            <th class="" scope="col">Video name</th>
                            <th class="" scope="col">Video</th>
                            <th class="" scope="col">Amallar</th>

                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data as $dat)
                            <tr>
                                <th scope="row" class="col-1">{{$dat->id}}</th>
                                <td>{{$dat->name}}</td>
                                <td>

                                    <iframe width="300" height="150" src="{{$dat->url}}" title="YouTube video player"
                                            frameborder="0"
                                            allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                            allowfullscreen></iframe>

                                </td>


                                <td class="col-2">

                                    <form action="{{ route('admin.vidios.destroy',$dat->id) }}" method="POST">
                                        <a class="btn btn-warning btn-sm"
                                           href="{{ route('admin.vidios.edit',$dat->id) }}">
                                    <span class="btn-label">
                                        <i class="fa fa-pen"></i>
                                    </span>

                                        </a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><span class="btn-label">
                                        <i class="fa fa-trash"></i>
                                    </span></button>
                                    </form>

                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                    <div class="container">
                        <div class="row justify-content-center">


                            {{--                            @if ($posts->links())--}}
                            {{--                                <div class="mt-4 p-4 box has-text-centered">--}}
                            {{--                                    {{ $posts->links() }}--}}
                            {{--                                </div>--}}
                            {{--                            @endif--}}


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

