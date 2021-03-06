import React, { Component } from "react";
import { Link } from "react-router-dom";
import "../../components/style/directorynav.css";
import axios from "axios";
//import DirectoryNav from "./DirectoryNav";
import Content from "../../components/content/content";
import NewsPreview from "../../components/news-preview/news-preview";
import Loader from "react-loader-spinner";
import { ListGroup, ListGroupItem } from "react-bootstrap";
import { LinkContainer } from "react-router-bootstrap";
import List from "../../components/list/list";
import "./directory.css"

export default class Directory extends Component {
  constructor(props) {
    super(props);
    this.state = {
      categories: [],
      dictionary: [],
      loading: false
    };
  }

  componentDidMount() {
    this.setState({ loading: true }, () => {
      axios
        .get("/dictionary/categoryName")
        .then(response => {
          this.setState({ loading: false, categories: response.data });
          let url = window.location.pathname;
          let newUrl = url.split("/");
          let string = ["/dictionary/" + newUrl[2]];
          axios
            .get(string.join())
            .then(response => {
              this.setState({ dictionary: response.data });
            })
            .catch(error => {
              console.log(error);
            });
        })
        .catch(error => {
          console.log(error);
        });
    });
  }

  render() {
    const { dictionary, loading } = this.state;
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
        <List>
          <ListGroup>
            {this.state.categories.map(categories => (
              <LinkContainer
                key={categories.id + categories}
                className="list-group-item list-group-item-action"
                to={/directory/ + categories}
              >
                <ListGroupItem> {categories}</ListGroupItem>
              </LinkContainer>
            ))}
          </ListGroup>
          <div className="card-list">
            {dictionary.map(dictionary => (
              <NewsPreview

                name={dictionary.disease_name}
                text={dictionary.treatment}
                date={dictionary.symptoms}
                image={dictionary.picture}
              />
            ))}
          </div>
        </List>
        {/*<div className="directory-content">
          <div className="navigation-panel">
            <div className="list-group directory-nav">
              {this.state.categories.map(categories => (
                <Link
                  key={categories.id + categories}
                  className="list-group-item list-group-item-action"
                  to={/directory/ + categories}
                >
                  {categories}
                </Link>
              ))}
            </div>
          </div>
          <div>
            {this.state.dictionary.map(dictionary => (
              <div className="card mb-3" key={dictionary.id + dictionary}>
                <div className="card-body">
                  <h5 className="card-title">{dictionary.disease_name}</h5>
                  <p className="card-text">{dictionary.treatment}</p>
                  <p className="card-text text-muted">{dictionary.symptoms}</p>
                </div>
              </div>
            ))}
          </div>
        </div>*/}
      </Content>
    );
  }
}
