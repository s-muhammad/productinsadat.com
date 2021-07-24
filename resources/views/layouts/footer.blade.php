<footer class="footer mt-3">
    <div class="row">
        <div class="footer-jumpup">
            <div class="container">
                <a href="#">
                    <span href="#" class="footer-jumpup-container"><i class="fa fa-angle-up"></i></span>
                </a>
            </div>
        </div>
    </div>
    <div class="col-12">
        <nav class="footer-feature-innerbox mb-1">
            <div class="footer-badge-item">
                <a href="#" class="footer-badge-link">
                    <img src="/assets/images/footer/delivery.svg">
                    <span class="footer-badge-title">تحویل اکسپرس</span>
                </a>
            </div>
            <div class="footer-badge-item">
                <a href="#" class="footer-badge-link">
                    <img src="/assets/images/footer/contact-us.svg">
                    <span class="footer-badge-title">پشتیبانی 24 ساعته</span>
                </a>
            </div>
            <div class="footer-badge-item">
                <a href="#" class="footer-badge-link">
                    <img src="/assets/images/footer/payment-terms.svg">
                    <span class="footer-badge-title">پرداخت درمحل</span>
                </a>
            </div>
            <div class="footer-badge-item">
                <a href="#" class="footer-badge-link">
                    <img src="/assets/images/footer/return-policy.svg">
                    <span class="footer-badge-title">۷ روز ضمانت بازگشت</span>
                </a>
            </div>
            <div class="footer-badge-item">
                <a href="#" class="footer-badge-link">
                    <img src="/assets/images/footer/origin-guarantee.svg">
                    <span class="footer-badge-title">ضمانت اصل بودن کالا</span>
                </a>
            </div>
        </nav>
    </div>
    <article class="container-main">
        <div class="footer-middlebar">
            <div class="col-lg-8 col-md-8 col-xs-12 pull-right">
                <div class="footer-more-info">
                    <div class="footer-description-content">
                        <div class="col-xs-8 col-md-8 col-xs-12 pull-right">
                            <div class="footer-content">
                                <article class="footer-seo mt-3">
                                    <h1>فروشگاه اینترنتی پوشاک سادات ، بررسی، انتخاب و خرید آنلاین</h1>
                                    @foreach(\App\Models\Setting::all() as $setting)
                                    <p>{{$setting->description}}</p>
                                    @endforeach
                                </article>
                            </div>
                        </div>
                        <div class="">
                            <div class="col-lg-4 col-md-4 col-xs-12 pull-left">
                                <aside>
                                    <ul class="footer-safety-partner mt-4 pull-right">
                                        <li class="footer-safety-partner-1">
                                            <a href="#">
                                                <img src="/assets/images/footer/license/L-1.png">
                                            </a>
                                        </li>
                                    </ul>
                                </aside>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 pull-left">
                <div class="footer-form">
                    <form action="#" class="form-newsletter mb-4 mt-4">
                        <fieldset>
                            <span class="form-newsletter-title">از تخفیف‌ها و جدیدترین‌های پوشاک سادات باخبرشوید:</span>
                            <div class="form-newsletter-row">
                                <input type="text" class="input-field-send-email" placeholder="آدرس ایمیل خود را وارد کنید">
                                <button type="submit" class="btn-secondary-send">ارسال</button>
                            </div>
                        </fieldset>
                    </form>
                    <div class="footer-community">
                        <div class="footer-social mb-4 mt-4">
                            <span>پوشاک سادات را در شبکه‌های اجتماعی دنبال کنید:</span>
                            @foreach(\App\Models\Setting::all() as $setting)
                            <div class="footer-social">
                                <ul class="footer-ul-social">
                                    <li class="footer-social-item">
                                        <a href="{{$setting->instagram}}" class="footer-social-link">
                                            <i class="fa fa-instagram"></i>
                                        </a>
                                    </li>
                                    <li class="footer-social-item">
                                        <a href="{{$setting->tel}}" class="footer-social-link">
                                            <i class="fa fa-phone-square"></i>
                                        </a>
                                    </li>
                                    <li class="footer-social-item">
                                        <a href="{{$setting->whatsapp}}" class="footer-social-link">
                                            <i class="fa fa-whatsapp"></i>
                                        </a>
                                    </li>
                                    <li class="footer-social-item">
                                        <a href="{{$setting->telegram}}" class="footer-social-link">
                                            <i class="fa fa-telegram"></i>
                                        </a>
                                    </li>
                                </ul>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-copyright">
            <div class="footer-copyright-text">
                copyright <a href="{{url('/')}}">ProductionSadat.com</a>
            </div>
        </div>
    </article>
</footer>
