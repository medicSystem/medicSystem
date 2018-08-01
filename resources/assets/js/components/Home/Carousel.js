import React, { Component } from 'react';
/*import 'bootstrap/dist/css/bootstrap.css';*/


export default class Carousel extends Component {
    render(){
        return(
            <div id="carouselExampleIndicators" className="carousel slide carousel-fade" data-ride="carousel">
                <ol className="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" className="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div className="carousel-inner">
                    <div className="carousel-item active">
                        <img className="d-block w-100" src="https://images.adsttc.com/media/images/594a/2a4a/b22e/38e9/2900/00a6/large_jpg/Cherry_Hospital-1.jpg?1498032701"
                             alt="First slide" />
                        <div className="carousel-caption d-none d-md-block">
                            <h1>У нас очень красиво</h1>
                            <p>Вам будет очень комфортно у нас</p>
                        </div>
                    </div>
                    <div className="carousel-item">
                        <img className="d-block w-100" src="https://i.ytimg.com/vi/nII0EiAdylA/maxresdefault.jpg"
                             alt="Second slide" />
                        <div className="carousel-caption d-none d-md-block">
                            <h1>Мы вырежем ваши почки</h1>
                            <p>И продадим их по лучшей цене</p>
                        </div>
                    </div>
                    <div className="carousel-item">
                        <img className="d-block w-100" src="https://www.advancecairns.com/wp-content/uploads/2017/05/cairns-hospital.jpg"
                             alt="Third slide" />
                        <div className="carousel-caption d-none d-md-block">
                            <h1>У нас очень уютно</h1>
                            <p>Но у нас нет сердца...</p>
                        </div>
                    </div>
                </div>
                <a className="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span className="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span className="sr-only">Previous</span>
                </a>
                <a className="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span className="carousel-control-next-icon" aria-hidden="true"></span>
                    <span className="sr-only">Next</span>
                </a>
            </div>
        )
    }
}