@extends('front_end.master')
@section('content')
<section class="bg-primary main-header" id="about">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-lg-offset-2 text-center">
                <br>
                <h2 class="section-heading">CONTACT</h2>
                <hr class="light">

            </div>
        </div>
    </div>
</section>

<main>
    <div class="container">
        <div class="row">
            <div class="col-md-9">
                <h3>Contact Us</h3>

                <!-- Contact Section -->

                <aside class="" id="contact">
                    <div class="">
                        <div class="row">
                            <div class="col-lg-8 col-lg-offset-2 text-center">
                                <h2 class="section-heading">Let's Get In Touch!</h2>
                                <hr class="primary">
                                <p>Ready to start your next project with us? That's great! Give us a call or send us an email and we will get back to you as soon as possible!</p>
                            </div>
                            <div class="col-lg-4 col-lg-offset-2 text-center">
                                <i class="fa fa-phone fa-3x wow bounceIn"></i>
                                <p>123-456-6789</p>
                            </div>
                            <div class="col-lg-4 text-center">
                                <i class="fa fa-envelope-o fa-3x wow bounceIn" data-wow-delay=".1s"></i>
                                <p><a href="mailto:your-email@your-domain.com">feedback@startbootstrap.com</a></p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-12 text-center">
                                <h2 class="section-heading">Contact Us</h2>
                                <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <form name="sentMessage" id="contactForm" novalidate>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group">
                                                <input type="email" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                                <p class="help-block text-danger"></p>
                                            </div>
                                            <div class="form-group">
                                                <input type="tel" class="form-control" placeholder="Your Phone *" id="phone" required data-validation-required-message="Please enter your phone number.">
                                                <p class="help-block text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <textarea class="form-control" rows="6" placeholder="Your Message *" id="message" required data-validation-required-message="Please enter a message."></textarea>
                                                <p class="help-block text-danger"></p>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                        <div class="col-lg-12 text-center">
                                            <div id="success"></div>
                                            <button type="submit" class="btn btn-xl btn-success">Send Message</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>


            <div class="col-md-3">
                <div class="heading-divider">
                    <h3 class="heading-italic text-light">Recent Comment</h3>
                </div>
                <div class="">
                    <span class="small"><a href="#">Brian Williamson</a> on</span>
                    <h5>Bradley Cooper’s "Twin" Causes Madness At Sundance Film Festival Opening<a href="#"> .....</a></h5>
                    <hr class="divider divider-dashed">
                    <span class="small"><a href="#">Brian Williamson</a> on</span>
                    <h5>3 Ways To Conquer Your Winter Laziness<a href="#"> .....</a></h5>
                    <hr class="divider divider-dashed">
                    <span class="small"><a href="#">Brian Williamson</a> on</span>
                    <h5>Greeks were warned - stop refugees wave, or we will kick you out<a href="#"> .....</a></h5>
                    <hr class="divider divider-dashed">
                </div>

                <div class="heading-divider">
                    <h3 class="heading-italic text-light">Recent Post</h3>
                </div>
                <div data-instafeed-clientid="44f19408f04040bd85214315861a84a1" data-instafeed-get="user" data-instafeed-user="499522078" class="instafeed element-groups-xs-custom">
                    <div><a href="#" target="_blank" class="thumbnail-variant-1"><img src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c161.0.757.757/12940775_1155866021104798_1044149455_n.jpg?ig_cache_key=MTIzNjIxNzA0NDMwNTczOTYwMw%3D%3D.2.c" alt="" width="85" height="85"></a>
                        <a href="#" target="_blank" class="thumbnail-variant-1"><img src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c0.44.451.451/12599163_582672555215702_1262379996_n.jpg?ig_cache_key=MTIzNDAyNjI5NTA0NDYzNjM4OA%3D%3D.2.c" alt="" width="85" height="85"></a>
                        <a href="#" target="_blank" class="thumbnail-variant-1"><img src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c128.0.768.768/12918399_576095882558659_105899891_n.jpg?ig_cache_key=MTIzMzM0MzE4OTQwNDkwOTEwNQ%3D%3D.2.c" alt="" width="85" height="85"></a>
                        <a href="#" target="_blank" class="thumbnail-variant-1"><img src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c51.0.501.501/12445876_1645879635661035_855145149_n.jpg?ig_cache_key=MTIzMTg5MTQxNDA5NzM2MjEwOQ%3D%3D.2.c" alt="" width="85" height="85"></a>
                        <a href="#" target="_blank" class="thumbnail-variant-1"><img src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c223.0.512.512/12070737_2008927909332332_1709852557_n.jpg?ig_cache_key=MTIzMTE0NjE1MTEyODg5MTEwNw%3D%3D.2.c" alt="" width="85" height="85"></a>
                        <a href="#" target="_blank" class="thumbnail-variant-1"><img src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/12599291_107016526369007_1582985943_n.jpg?ig_cache_key=MTIzMDI1NTA4NDgwMDA4MTg1Nw%3D%3D.2" alt="" width="85" height="85"></a>
                        <a href="#" target="_blank" class="thumbnail-variant-1"><img src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c66.0.468.468/12907395_983213861766640_895938174_n.jpg?ig_cache_key=MTIyNjA2NTkwMjQ1NjMwNzY1MQ%3D%3D.2.c" alt="" width="85" height="85"></a>
                        <a href="#" target="_blank" class="thumbnail-variant-1"><img src="https://scontent.cdninstagram.com/t51.2885-15/s150x150/e35/c181.0.538.538/12445792_187325278326552_1831264098_n.jpg?ig_cache_key=MTIyNTMwOTQ0NjMzMzI5OTc1NQ%3D%3D.2.c" alt="" width="85" height="85"></a></div>
                </div>
                <br>
            </div>
        </div>
    </div>
</main>
@endsection