@extends('layouts.app')
@section('content')
    <section class="py-5 bg-light">
    <div class="container">
        <div class="text-start mb-4 fw-bold">
            <h2>Kotak Saran</h2>
            <p class="mb-3 small fst-italic text-muted">
                Your email address will not be published. Required fields are marked <span class="text-danger">*</span>
            </p>
            <form action="" method="POST" id="comment" class="comment">
                @csrf
                <div class="mb-3">
                    <label for="comment" class="form-label">Comment <span class="text-danger">*</span></label>
                    <textarea name="comment" id="comment" class="form-control" rows="6" maxlength="65525" required></textarea>
                </div>
                <div class="row mb-3">
                    <div class="col-md-6 col-lg-4">
                        <label for="author" class="form-label">Name <span class="text-danger">*</span></label>
                        <input type="text" id="author" name="author" class="form-control" maxlength="245" autocomplete="name" required>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" id="email" name="email" class="form-control" maxlength="100" autocomplete="email" required>
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="save-info" name="save-info" checked>
                    <label class="form-check-label" for="save-info">Save my name, email, and website in this browser for the next time I comment.</label>
                </div>
                <button type="submit" class="btn text-white" style="">Post Comment
                    <i class="fa fa-paper-plane"></i>
                </button>
            </form>
        </div>
    </div>
</section>
@endsection