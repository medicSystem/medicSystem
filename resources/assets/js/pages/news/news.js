import React, {Component} from "react";
import axios from "axios";
import Loader from "react-loader-spinner";
import NewsCard from "../../components/news-card/news-card";
import Content from "../../components/content/content";
import {Button, Form, FormControl, FormGroup, Navbar} from "react-bootstrap";
import "./news.css"

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
          this.setState({loading: false, news: response.data});
        })
        .catch(error => {
          console.log(error);
        });
  }

  render() {
    const {news, loading} = this.state;
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
          <Form className="News__form" inline>
            <FormGroup>
              <FormControl type="text" placeholder="Search"/>
            </FormGroup>{" "}
            <Button type="submit">Submit</Button>
          </Form>
          <div className="News__card">
            {news.map(news => (
                <div id={news.id} key={news.id}>
                  <NewsCard
                      name={news.news_name}
                      text={news.content}
                      image={news.photo}
                      date={name.updated_at}
                  />
                </div>
            ))}
          </div>
        </Content>
    );
  }
}
