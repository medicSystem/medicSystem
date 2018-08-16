import React, { Component, Fragment } from "react";
import "./app.css";
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";
import Main from "../../pages/main/main";
import Footer from "../footer/footer";
import News from "../../pages/news/news";
import Directory from "../directory/Directory";
import axios from "axios/index";
import AdminApp from "../../pages/admin/AdminApp";
import DoctorApp from "../../pages/doctor/DoctorApp";
import PatientApp from "../../pages/patient/PatientApp";
import NavBar from "../navbar/navbar";

class App extends Component {
  constructor(props) {
    super(props);
    this.state = {
      categories: [],
      dictionary: []
    };
  }
  componentDidMount() {
    axios
      .get("/dictionary/categoryName")
      .then(response => {
        this.setState({ categories: response.data });
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
  }

  render() {
    let pathName = window.location.pathname;
    let url = pathName.split("/");
    switch (url[1]) {
      case "admin":
        return (
          <Router>
            <Fragment>
              <Route path="/admin" component={AdminApp} />
            </Fragment>
          </Router>
        );

      case "doctor":
        return (
          <Router>
            <Fragment>
              <Route path="/doctor" component={DoctorApp} />
            </Fragment>
          </Router>
        );
      case "patient":
        return (
          <Router>
            <Fragment>
              <Route path="/patient" component={PatientApp} />
            </Fragment>
          </Router>
        );

      default:
        return (
          <Router>
            <Fragment>
              <NavBar />


              <Switch>
                <Route exact path="/" component={Main} />
                <Route path="/main/news" component={News} />
                {this.state.categories.map(categories => (
                  <Route
                    key={categories.id + categories}
                    path={"/directory/" + categories}
                    component={Directory}
                  />
                ))}
              </Switch>
              <Footer />
            </Fragment>
          </Router>
        );
    }
  }
}

export default App;
