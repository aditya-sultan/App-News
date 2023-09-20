@extends('layout.main')

@section('title')
    Edit Comment
@endsection

@section('container')
    <main>
        <div class="container-fluid site-width">
            <!-- END: Breadcrumbs-->

            <!-- START: Card Data-->
            <div class="row mt-3">
                <div class="col-12 col-sm-12">

                    <div class="row">
                        <div class="col-12 col-xl-9 mb-5 mb-xl-0">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="header-title mb-3 text-uppercase">Edit comment</h5>
                                    <form action="{{ route('comment.update', $comments->id) }}" method="POST">
                                        @method('PUT')
                                        @csrf
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <textarea class="form-control height-200" placeholder="Message :" name="content">{!! $comments->content !!}</textarea>
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
