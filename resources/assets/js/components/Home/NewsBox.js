import React, {Component} from 'react';
/*import 'bootstrap/dist/css/bootstrap.css';*/
import '../style/news.css';
import {Link} from 'react-router-dom';
import axios from "axios/index";

export default class NewsBox extends Component {
    constructor(props) {
        super(props);
        this.state = {
            news: [],
        };

    }
    componentDidMount()
    {
        let parameter = 'short';
        let string = ['/news/' + parameter];
        axios.get(string.join())
            .then((response) => {
                this.setState({news: response.data})
            })
            .catch((error)=>{
                console.log(error);
            });
    }
    render() {
        return (
            <div className='news-container'>
                <div className='news-box'>
                {this.state.news.map( news =>

                        <div id={news.id} className="card  news-card">
                            <img className="card-img-top"
                                 src="https://static.dentaldepartures.com/clinics/dd_201604030325_5397cbeba0bbf.jpg?_ga=2.44103460.1011704726.1530860971-1003451310.1530860971"
                                 alt="Card image cap"/>
                            <div className='card-body'>
                                <h5 className='card-title'>{news.news_name}</h5>
                                <p className='card-text'>{news.content}</p>
                                <p className='card-text text-muted'>{news.created_at}</p>
                                <a href="#" className="btn btn-success">Go somewhere</a>
                            </div>
                        </div>
                )}
                </div>
                    <Link className='btn btn-success' to='/main/news'>Read more</Link>
            </div>
        )
    }
}