@component('layouts.content')
    <div class="container-main">
        <div class="col-12">
            <section class="about">
                <div class="page-content-about">
                    <div class="page-content-about-paragraph">
                        @foreach($about as $about)
                        {!! $about->description !!}
                        @endforeach
                    </div>
                </div>
            </section>
        </div>
    </div>
@endcomponent
