@component('./layouts.content')
        <div class="page-row-main-top">
            <div class="col-lg-8 col-md-8 col-xs-12 pull-right">
                <div class="main-slider-container">
                    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                        <ol class="carousel-indicators">
                            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="assets/images/main-slider/1.jpg" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/images/main-slider/2.jpg" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/images/main-slider/3.jpg" alt="Third slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="assets/images/main-slider/4.jpg" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <!--    slider--------------------------------->
            <!--adplacement-------------------------------->
            <div class="col-lg-4 col-md-4 col-xs-12 pull-left">
                <aside class="adplacement-container-column">
                    <a href="#" class="adplacement-item adplacement-item-column">
                        <div class="adplacement-sponsored-box">
                            <img src="assets/images/adplacement/1.gif">
                        </div>
                    </a>
                    <a href="#" class="adplacement-item adplacement-item-column">
                        <div class="adplacement-sponsored-box">
                            <img src="assets/images/adplacement/2.jpg">
                        </div>
                    </a>
                </aside>
            </div>
        </div>
@endcomponent
