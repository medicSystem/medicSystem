import React, { Component } from "react";
import { Carousel } from "react-bootstrap";

export default class Header extends Component {
  render() {
    return (
      <Carousel>
        <Carousel.Item>
          <img
            width="100%"
            height={500}
            alt="900x500"
            src="https://images.adsttc.com/media/images/594a/2a4a/b22e/38e9/2900/00a6/large_jpg/Cherry_Hospital-1.jpg?1498032701"
          />
          <Carousel.Caption>
            <h3>У нас очень красиво</h3>
            <p>Вам будет очень комфортно у нас.</p>
          </Carousel.Caption>
        </Carousel.Item>
        <Carousel.Item>
          <img
            width="100%"
            height={500}
            alt="900x500"
            src="https://i.ytimg.com/vi/nII0EiAdylA/maxresdefault.jpg"
          />
          <Carousel.Caption>
            <h3>Мы вырежем ваши почки</h3>
            <p>LИ продадим их по лучшей цене.</p>
          </Carousel.Caption>
        </Carousel.Item>
        <Carousel.Item>
          <img
            width="100%"
            height={500}
            alt="900x500"
            src="https://www.advancecairns.com/wp-content/uploads/2017/05/cairns-hospital.jpg"
          />
          <Carousel.Caption>
            <h3>У нас очень уютно</h3>
            <p>Но у нас нет сердца...</p>
          </Carousel.Caption>
        </Carousel.Item>
      </Carousel>
    );
  }
}
