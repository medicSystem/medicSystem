import React, { Component } from "react";
import Carousel from "../../components/carousel/carousel";
import Loader from "react-loader-spinner";
import Button from "@material-ui/core/es/Button/Button";
import { Link } from "react-router-dom";
import axios from "axios/index";
import NewsPreview from "../../components/news-preview/news-preview";
import Content from "../../components/content/content";
import "./main.css";

export default class Main extends Component {
  constructor(props) {
    super(props);
    this.state = {
      news: [],
      loading: true
    };
  }
  componentDidMount() {
    this.setState({ loading: true }, () => {
      let parameter = "short";
      let string = ["/news/" + parameter];
      axios
        .get(string.join())
        .then(response => {
          this.setState({ loading: false, news: response.data });
        })
        .catch(error => {
          console.log(error);
        });
    });
  }
  render() {
    const { news, loading } = this.state;
    if (loading) {
      return (
        <div className="loader-container news-box-loader">
          <Loader
            id="loader"
            type="TailSpin"
            color="#4caf50"
            height={80}
            width={80}
          />
        </div>
      );
    }
    return (
      <Content>
        <Carousel />
        <div className="news-container">

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
        </div>
      </Content>
    );
  }
}
