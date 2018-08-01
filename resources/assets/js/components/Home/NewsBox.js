import React, {Component} from 'react';
/*import 'bootstrap/dist/css/bootstrap.css';*/
import '../style/news.css';
import {Link} from 'react-router-dom';

export default class NewsBox extends Component {
    render() {
        return (
            <div className='news-container'>
                <div className="news-box">
                    <div id='1' className="card  news-card">
                        <img className="card-img-top"
                             src="https://static.dentaldepartures.com/clinics/dd_201604030325_5397cbeba0bbf.jpg?_ga=2.44103460.1011704726.1530860971-1003451310.1530860971"
                             alt="Card image cap"/>
                        <div className="card-body">
                            <h5 className="card-title">Card title</h5>
                            <p className="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                            <a href="#" className="btn btn-success">Go somewhere</a>
                        </div>
                    </div>
                    <div id='2' className="card news-card">
                        <img className="card-img-top"
                             src="https://static.dentaldepartures.com/clinics/dd_201604030325_5397cbeba0bbf.jpg?_ga=2.44103460.1011704726.1530860971-1003451310.1530860971"
                             alt="Card image cap"/>
                        <div className="card-body">
                            <h5 className="card-title">Card title</h5>
                            <p className="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                            <a href="#" className="btn btn-success">Go somewhere</a>
                        </div>
                    </div>
                    <div id='3' className="card news-card">
                        <img className="card-img-top"
                             src="https://static.dentaldepartures.com/clinics/dd_201604030325_5397cbeba0bbf.jpg?_ga=2.44103460.1011704726.1530860971-1003451310.1530860971"
                             alt="Card image cap"/>
                        <div className="card-body">
                            <h5 className="card-title">Card title</h5>
                            <p className="card-text">Some quick example text to build on the card title and make up the
                                bulk of the card's content.</p>
                            <a href="#" className="btn btn-success">Go somewhere</a>
                        </div>
                    </div>
                </div>
                    <Link className='btn btn-success' to='/main/news'>Read more</Link>
            </div>
        )
    }
}