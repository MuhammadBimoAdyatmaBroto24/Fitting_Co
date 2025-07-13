@extends('layouts.app')

@section('title', 'Contacts')

@section('content')

    <!-- Map Begin -->
    <div class="map">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d29400864.32981977!2d94.35331969740638!3d25.903268063002987!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x34674e0fd77f192f%3A0xf54275d47c665244!2sJapan!5e0!3m2!1sen!2sid!4v1746981123061!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <!-- Map End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__text">
                        <div class="section-title">
                            <span>Information</span>
                            <h2>Our Office</h2>
                            <p></p>
                        </div>
                        <ul>
                            <li>
                                <h4>Head Office</h4>
                                <h4>Jepang</h4>
                                <p>Jalan Kartini <br />08xxxxxxxx</p>
                            </li>

                            <li>
                                <h4>Branch Office</h4>
                                <h4>Indonesia</h4>
                                <p>Jalan Awikoen Madya<br />08xxxxxxxxx</p>
                            </li>

                            <li>
                                <h4>Branch Office</h4>
                                <h4>Amerika Serikat</h4>
                                <p>Perumahan ABR Gresik,New York City <br />08xxxxxxxx</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form">
                        <form action="{{ route('contact.submit') }}" method="POST">
                            @csrf
                            <div class="section-title">
                                <h2>Contact</h2>
                                <p></p>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email">
                                </div>
                                <div class="col-lg-12">
                                    <textarea placeholder="Message"></textarea>
                                    <button type="submit" class="site-btn">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

@endsection
