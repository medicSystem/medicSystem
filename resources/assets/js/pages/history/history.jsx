import React from "react";
import PropTypes from "prop-types";
import { withStyles } from "@material-ui/core/styles";
import axios from "axios";
import Loader from "react-loader-spinner";
import ListItem from "@material-ui/core/es/ListItem/ListItem";
import Divider from "@material-ui/core/es/Divider/Divider";
import ListItemText from "@material-ui/core/es/ListItemText/ListItemText";
import MuiThemeProvider from "@material-ui/core/es/styles/MuiThemeProvider";
import { createMuiTheme } from "@material-ui/core/styles/index";
import List from "@material-ui/core/es/List/List";

import AssignmentIcon from "@material-ui/icons/Assignment";
import {Form, FormControl, FormGroup, Button} from "react-bootstrap";
import FormLabel from "@material-ui/core/FormLabel/FormLabel";

const text = createMuiTheme({
  typography: {
    fontSize: 18
  }
});

const styles = theme => ({
  root: {
    width: "60%",
    marginTop: theme.spacing.unit * 3,
    overflowX: "auto"
  },
  text: {
    width: "10%"
  },
  button: {
    margin: theme.spacing.unit
  }
});

class History extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      value: 0,
      loading: true,
      conclusion: ''
    };
      console.log("lol")
    this.handleChange = this.handleChange.bind(this);
    this.handleSubmit = this.handleSubmit.bind(this);
    /*this.handleChange = (event, value) => {
      this.setState({ value });
    };
    this.handleChangeIndex = index => {
      this.setState({ value: index });
    };*/
  }
  componentDidMount() {
    const id = this.props.match.params.id;
    this.setState({ loading: true }, () => {
      axios
        .get(`/getDiseaseHistoryByMedicalCardId/${id}`)
        .then(response => {
          this.setState({ loading: false, history: response.data[0] });
        })
        .catch(error => {
          console.log(error);
        });
    });
  }
  handleChange(event) {
    this.setState({ conclusion: event.target.value });
  };
  handleSubmit (event) {
    event.preventDefault();


     let conclusion = this.state.conclusion;
    console.log(conclusion);
let analyzes = "hhhhh";
let disease_name = "Plague";
    const id = this.props.match.params.id;
    axios.post(`/addDisease/${id}`, { conclusion, analyzes, disease_name })
    .then(res => {
      console.log(res);
      console.log(res.data);
    })
  };
  render() {
    const { classes } = this.props;
    const { history, loading } = this.state;
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

        <Form onSubmit={this.handleSubmit}>
          <FormGroup controlId="historyConclusion">
            <FormLabel>Example textarea</FormLabel>
            <textarea className="form-control" onChange={this.handleChange}  style={{height: 400}} rows="3" />
          </FormGroup>
          <Button variant="success" type="submit">
            Submit
          </Button>
        </Form>

    );
  }
}

History.propTypes = {
  classes: PropTypes.object.isRequired
};

export default withStyles(styles, { withTheme: true })(History);
