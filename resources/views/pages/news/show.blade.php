@extends('layout.main')

@section('title')
    Home
@endsection

@section('container')
    <main>
        <div class="container-fluid site-width">
            <!-- START: Breadcrumbs-->
            <div class="row ">
                <div class="col-12  align-self-center">
                    <div class="sub-header mt-3 py-3 align-self-center d-sm-flex w-100 rounded">
                        <div class="w-sm-100 mr-auto">
                            <h4 class="mb-0">Single Post</h4>
                        </div>

                        <ol class="breadcrumb bg-transparent align-self-center m-0 p-0">
                            <a href="/home">
                                <li class="breadcrumb-item">Home</li>
                            </a>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- END: Breadcrumbs-->

            <!-- START: Card Data-->
            <div class="row mt-3">
                <div class="col-12 col-sm-12">

                    <div class="row">
                        <div class="col-12 col-xl-9 mb-5 mb-xl-0">
                            <div class="card mb-4">
                                <img src="{{ url('image') . '/' . $news->picture }}" alt=""
                                    class="img-fluid rounded-top">
                                <div class="card-body">
                                    <ul class="list-inline comment-info font-weight-bold">
                                        <li class="list-inline-item"><a href="#"><i class="fa fa-comments pr-1"></i>
                                                {{ $news->author->name }}</a></li>
                                        <li class="list-inline-item"><a href="#"><i class="fa fa-comments pr-1"></i>
                                                {{ $countComment }} Comments</a></li>
                                    </ul>
                                    <a href="#">
                                        <h4>{{ $news->title }}</h4>
                                    </a>
                                    {!! $news->content !!}

                                </div>
                            </div>
                            <div class="card mb-4">
                                <div class="card-body pb-0">
                                    <h5 class="header-title  text-uppercase mb-0">{{ $countComment }} Comments</h5>
                                </div>
                                @foreach ($comments as $item)
                                    <div class="media d-block d-sm-flex text-center text-sm-left p-4">
                                        <img class="img-fluid d-md-flex mr-sm-4 rounded-circle"
                                            src="dist/images/author10.jpg" alt="">
                                        <div class="media-body align-self-center">
                                            @if ($item->id_user == Auth::user()->id)
                                                <div class="float-sm-right float-none h6 mb-0 my-3 my-sm-0">

                                                    <a href="{{ route('comment.edit', $item->id) }}" type="button"
                                                        class="btn btn-primary"><i class="fas fa-edit"></i></a>


                                                    <form action="{{ route('comment.destroy', $item->id) }}" method="POST"
                                                        onsubmit="return confirm('Anda akan menghapus item ini dari situs anda?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-icon icon-left btn-danger"><i
                                                                class="fas fa-trash-alt"></i></button>
                                                    </form>
                                                </div>
                                            @endif
                                            <h6 class="mb-1 font-weight-bold">{{ $item->user->name }}</h6>
                                            {{ $item->content }}
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="header-title mb-3 text-uppercase">Leave a comment</h5>
                                    <form action="{{ route('comment.store') }}" method="POST">
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <input type="hidden" name="id_news" value="{{ $news->id }}">
                                                    <input type="hidden" name="id_user" value="{{ Auth::user()->id }}">
                                                    <textarea class="form-control height-200" placeholder="Message :" name="content"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-12">
                                                <button type="submit" class="btn btn-primary btn-md">Submit
                                                    Comment</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
        <!-- END: Card DATA-->
        </div>
    </main>
    <!-- END: Content-->
@endsection
