import React, { Component } from "react";
import axios from "axios";
import Loader from "react-loader-spinner";
import NewsCard from "../../components/news-card/news-card";
import Content from "../../components/content/content";
import { Button, FormControl, FormGroup, Navbar } from "react-bootstrap";

export default class News extends Component {
  constructor(props) {
    super(props);
    this.state = {
      loading: true
    };
  }
  componentDidMount() {
    let parameter = "long";
    let string = ["/news/" + parameter];
    axios
      .get(string.join())
      .then(response => {
        this.setState({ loading: false, news: response.data });
      })
      .catch(error => {
        console.log(error);
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
        <Navbar.Form pullRight>
          <FormGroup>
            <FormControl type="text" placeholder="Search" />
          </FormGroup>{" "}
          <Button type="submit">Submit</Button>
        </Navbar.Form>
        <div style={{paddingTop: 60}}>
          {news.map(news => (
            <div id={news.id} key={news.id}>
              <NewsCard
                name={news.news_name}
                text={news.content}
                image={news.image}
                date={name.updated_at}
              />
            </div>
          ))}
        </div>
      </Content>
    );
  }
}
