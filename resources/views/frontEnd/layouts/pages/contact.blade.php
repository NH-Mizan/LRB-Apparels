@extends('frontEnd.layouts.master')
@push('css')
    <link rel="stylesheet" href="{{ asset('public/frontEnd/css/grt-youtube-popup.css') }}">
@endpush
@section('content')

<!-- PAGE TITLE START -->
<section class="contact-section">
    <div class="contact-breadcome wow fadeInDown" data-wow-delay="0.2s">
        <h3 class="text-center">Contact Us</h3>
    </div>

    <div class="contact-inner">
        <div class="container">
            <div class="row">
                <!-- Left -->
                <div class="col-sm-4 wow fadeInLeft" data-wow-delay="0.3s">
                    <div class="contact-info">
                        <h2>Contact Information</h2>
                        <p class="house"><i class="fas fa-map-marker-alt"></i> <span>{{ $contact->address }}</span></p>
                        <p><i class="fas fa-phone"></i>{{ $contact->phone }}</p>
                        <p><i class="fas fa-envelope"></i>{{ $contact->email }}</p>
                        <div class="social-icons mt-3">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Right -->
                <div class="col-sm-8 wow fadeInRight" data-wow-delay="0.4s">
                    <div class="contact-form">
                        <h2>Contact Us</h2>
                        <p>We’d love to hear from you! Whether you have a question, need more information, or want to
                            discuss how we can work together, feel free to reach out.</p>
                        <form>
                            <div class="form-row">
                                <input type="text" placeholder="Your Name" required>
                                <input type="text" placeholder="Cell Phone" required>
                            </div>
                            <div class="form-row">
                                <input type="email" placeholder="Email" required>
                                <input type="text" placeholder="Address" required>
                            </div>
                            <textarea placeholder="Message" required></textarea>
                            <button type="submit">SEND MESSAGE</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@push('script')

<script>
    new WOW().init();
</script>
@endpush