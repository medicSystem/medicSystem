import React, {Component} from "react"
import PropTypes from 'prop-types'
import axios from "axios"
import Content from "../../components/content/content"
import { Thumbnail} from "react-bootstrap"
import "./one-news.css"

export default class OneNews extends Component {
    constructor(props) {
        super(props)
        this.state = {
            loading: true
        }
    }

    componentDidMount() {
        const id = this.props.match.params.id
        axios
            .get(`/api/news/${id}`)
            .then(response => {
                this.setState({
                    loading: false,
                    news: response.data
                })
            })
    }
    render() {
        const {news, loading} = this.state
        if (loading) {
            return null;
        }
        return (
            <Content>
                <Thumbnail src={`/images/${news.photo}`} alt="242x200" key={news.id}>
                    <h3>{news.news_name}</h3>
                    <p>{news.content}</p>
                    <p>{news.updated_at}</p>
                </Thumbnail>
            </Content>
        )
    }
}
OneNews.propTypes = {
    match: PropTypes.object.isRequired,
}
