import React, {Component} from "react"
import axios from "axios"
import Content from "../../components/content/content"
import { Link } from "react-router-dom"
import { Media} from "react-bootstrap"
import "./news.css"

export default class News extends Component {
  constructor(props) {
    super(props)
    this.state = {
      loading: true
    }
  }

  componentDidMount() {
    axios
    .get("/api/news/")
    .then(response => {
      this.setState({
        loading: false,
        news: response.data
      })
    })
  }

  render() {
    const {news, loading} = this.state
    if (loading) {return null}

    return (
        <Content>
          {news.map(news => (
              <Media key={news.id}>
                <Media.Left align="top">
                  <img width={64} height={64} src={`/images/${news.photo}`} alt="thumbnail" />
                </Media.Left>
                <Media.Body>
                  <Link to={`/news/${news.id}`}>
                    <Media.Heading>{news.news_name}</Media.Heading>
                  </Link>
                  <p>{news.content.substring(0,190) + "..."}</p>
                </Media.Body>
              </Media>
          ))}
        </Content>
    )
  }
}
