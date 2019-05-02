import React, { Component } from "react"
import {Carousel, PageHeader} from "react-bootstrap"

//import { Link } from "react-router-dom"
//import axios from "axios/index"
//import NewsPreview from "../../components/news-preview/news-preview"
import "./main.css"
import Content from "../../components/content/content"

export default class Main extends Component {
    constructor(props) {
        super(props)
        this.state = {
            news: [],
            loading: true
        }
    }
    componentWillUnmount() {
        setTimeout(console.log("lol"), 5000);
    }
   /* componentDidMount() {
        this.setState({ loading: true }, () => {
            let parameter = "short"
            let string = ["/news/" + parameter]
            axios
                .get(string.join())
                .then(response => {
                    this.setState({ loading: false, news: response.data })
                })
        })
    }*/

    render() {
        /*const { news, loading } = this.state
        if (loading) {
            return (
                <div className="loader-container news-box-loader">
                    {/!*<Loader
                        id="loader"
                        type="TailSpin"
                        color="#4caf50"
                        height={80}
                        width={80}
                    />*!/}
                </div>
            )
        }*/
        return (
            <Content >
                <PageHeader>
                    Medic Social <small>medical social network </small>
                </PageHeader>
                <Carousel >
                    <Carousel.Item>
                        <img
                            className="Main_carousel_image"
                            alt="900x500"
                            src="images/Cherry_Hospital.jpg"
                        />
                        <Carousel.Caption>
                            <h3>У нас очень красиво</h3>
                            <p>Вам будет очень комфортно у нас.</p>
                        </Carousel.Caption>
                    </Carousel.Item>
                    <Carousel.Item>
                        <img
                            className="Main_carousel_image"
                            alt="900x500"
                            src="images/maxresdefault.jpg"
                        />
                        <Carousel.Caption>
                            {/*<h3>Мы вырежем ваши почки</h3>
                            <p>И продадим их по лучшей цене.</p>*/}
                        </Carousel.Caption>
                    </Carousel.Item>
                    <Carousel.Item>
                        <img
                            className="Main_carousel_image"
                            alt="900x500"
                            src="images/cairns-hospital.jpg"
                        />
                        <Carousel.Caption>
                            <h3>У нас очень уютно</h3>
                          {/*  <p>Но у нас нет сердца...</p>*/}
                        </Carousel.Caption>
                    </Carousel.Item>
                </Carousel>
            </Content>
                /*{/!*<div className="news-container">

            {news.map(news => (
              <NewsPreview
                id={news.id}
                name={news.news_name}
                text={news.content}
                date={news.created_at}
                image={news.photo}
              />
            ))}


          <Button color="primary" variant="contained" className="news-button">
            <Link className="btn-link" to="/main/news">
              Read more
            </Link>
          </Button>
        </div>*!/}*/

        )
    }
}
