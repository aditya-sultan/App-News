@extends('layout.main')

@section('title')
    Home
@endsection

@section('container')
    <h2 class="section-title">
        @if (Auth::user()->role == 'admin')
            <a href="{{ route('news.create') }}">Tambah</a>
        @endif
    </h2>
    <div class="row">
        @foreach ($news as $item)
            <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <article class="article article-style-b">
                    <div class="article-header">
                        <div class="article-image" data-background="{{ asset('image/' . $item->picture) }}">
                        </div>
                        <div class="article-badge">

                            @if (Auth::user()->role == 'admin')
                                <button type="button" class="article-badge-item btn btn-danger" data-toggle="modal"
                                    data-target="#basicModal"><i class="fas fa-fire"></i>Opsi</button>
                            @endif
                        </div>
                    </div>
                    <div class="article-details">
                        <div class="article-title">
                            <h2><a href="{{ route('news=', $item->id) }}">{{ $item->title }}</a></h2>
                        </div>
                        <p>{!! substr($item->content, 0, 100) !!}.</p>

                        <div class="article-cta">
                            <a href="{{ route('news=', $item->id) }}">Read More <i class="fas fa-chevron-right"></i></a>
                        </div>
                    </div>
                </article>
            </div>
        @endforeach
    </div>
@endsection
<div class="modal fade" id="basicModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Opsi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="{{ route('news.edit', $item->id) }}" class="btn btn-icon icon-left btn-primary"><i
                        class="far fa-edit"></i> Edit</a>
                <br>
                <br>
                <form action="{{ route('news.destroy', $item->id) }}" method="POST"
                    onsubmit="return confirm('Anda akan menghapus item ini dari situs anda?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-icon icon-left btn-danger"><i class="fas fa-trash-alt"></i> Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
