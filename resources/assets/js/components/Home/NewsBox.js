import React, {Component} from 'react';
/*import 'bootstrap/dist/css/bootstrap.css';*/
import '../style/news.css';
import {Link} from 'react-router-dom';
import axios from "axios/index";
import Loader from 'react-loader-spinner';
import Button from '@material-ui/core/Button'

export default class NewsBox extends Component {
    constructor(props) {
        super(props);
        this.state = {
            news: [],
            loading: false,
        };

    }
    componentDidMount() {
        this.setState({loading: true}, () => {
            let parameter = 'short';
            let string = ['/news/' + parameter];
            axios.get(string.join())
                .then((response) => {
                    this.setState({loading: false, news: response.data})
                })
                .catch((error) => {
                    console.log(error);
                });
        })
    }
    render() {
        const { news, loading } = this.state;
        return (
            <div className='news-container'>
                <div className='news-box'>
                {loading ? <div className='loader-container news-box-loader'><Loader id='loader' type="TailSpin" color="#4caf50" height={80} width={80}/></div> : this.state.news.map(news =>

                        <div id={news.id} className="card  news-card">
                            <img className="card-img-top"
                                 src="https://static.dentaldepartures.com/clinics/dd_201604030325_5397cbeba0bbf.jpg?_ga=2.44103460.1011704726.1530860971-1003451310.1530860971"
                                 alt="Card image cap"/>
                            <div className='card-body'>
                                <h5 className='card-title'>{news.news_name}</h5>
                                <p className='card-text'>{news.content}</p>
                                <p className='card-text text-muted'>{news.created_at}</p>
                                <Button variant='contained' color='primary'><Link className='btn-link' to={'/main/news#' + news.id}>Go somevere</Link></Button>
                            </div>
                        </div>
                )}
                </div>

                <Button color='primary' variant="contained"><Link className='btn-link' to='/main/news'>Read more</Link></Button>
            </div>
        )
    }
}