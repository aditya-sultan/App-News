@extends('layout.main')

@section('title')
    Edit Berita
@endsection
@push('addon-style')
    <link rel="stylesheet" href="{{ asset('otika') }}/bundles/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="{{ asset('otika') }}/bundles/codemirror/lib/codemirror.css">
    <link rel="stylesheet" href="{{ asset('otika') }}/bundles/codemirror/theme/duotone-dark.css">
    <link rel="stylesheet" href="{{ asset('otika') }}/bundles/jquery-selectric/selectric.css">
@endpush
@section('container')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Berita</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="text" class="form-control" name="title" value="{{ $news->title }}">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                            <div class="col-sm-12 col-md-7">
                                @if ($news->picture)
                                    <div class="mb-3">
                                        <img style="max-width:480px;max-height:272px;"
                                            src="{{ url('image') . '/' . $news->picture }}" />
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                            <div class="col-sm-12 col-md-7">
                                <input type="file" class="form-control" name="picture">
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                            <div class="col-sm-12 col-md-7">
                                <textarea class="summernote-simple" name="content">{!! $news->content !!}</textarea>
                            </div>
                        </div>
                        <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button class="btn btn-primary">Publish</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('addon-script')
    <script src="{{ asset('otika') }}/bundles/ckeditor/ckeditor.js"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('otika') }}/js/page/ckeditor.js"></script>

    <script src="{{ asset('otika') }}/bundles/summernote/summernote-bs4.js"></script>
    <script src="{{ asset('otika') }}/bundles/codemirror/lib/codemirror.js"></script>
    <script src="{{ asset('otika') }}/bundles/codemirror/mode/javascript/javascript.js"></script>
    <script src="{{ asset('otika') }}/bundles/jquery-selectric/jquery.selectric.min.js"></script>
@endpush
