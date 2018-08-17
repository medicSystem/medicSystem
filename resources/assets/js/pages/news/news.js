import React, { Component } from "react";
import axios from "axios";
import Loader from "react-loader-spinner";
import NewsCard from "../../components/news-card/news-card";

export default class News extends Component {
  constructor(props) {
    super(props);
    this.state = {
      loading: false
    };
  }
  componentDidMount() {
    let parameter = "long";
    let string = ["/news/" + parameter];
    this.setState({ loading: true }, () => {
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
    if (loading || news === undefined) {
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
      <div>
        <div className="content">
          {news.map(news => (
            <NewsCard
              name={news.news_name}
              text={news.content}
              image={news.image}
              date={name.updated_at}
              key={news.id}
            />
          ))}
        </div>
      </div>
    );
  }
}
