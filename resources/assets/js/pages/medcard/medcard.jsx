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
import Button from "@material-ui/core/es/Button/Button";
import AssignmentIcon from "@material-ui/icons/Assignment";
import { LinkContainer } from "react-router-bootstrap";

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

class Medcard extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      value: 0,
      loading: true
    };

    this.handleChange = (event, value) => {
      this.setState({ value });
    };
    this.handleChangeIndex = index => {
      this.setState({ value: index });
    };
  }
  componentDidMount() {
    const id = this.props.match.params.id;
    this.setState({ loading: true }, () => {
      axios
        .get(`/getMedicalCardForDoctor/${id}`)
        .then(response => {
          this.setState({ loading: false, patient: response.data[0] });
        })
        .catch(error => {
          console.log(error);
        });
    });
  }
  render() {
    const { classes } = this.props;
    const id = this.props.match.params.id;
    const { patient, loading } = this.state;
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
    console.log(patient);
    return (
      <div className={classes.root}>
        <List>
          <MuiThemeProvider theme={text}>
            <ListItem>
              <ListItemText primary="Last name:" className={classes.text} />
              <ListItemText
                primary={patient.last_name}
                className={classes.text}
              />
            </ListItem>
            <Divider />
            <ListItem>
              <ListItemText primary="First name:" className={classes.text} />
              <ListItemText
                primary={patient.first_name}
                className={classes.text}
              />
            </ListItem>
            <Divider />
            <ListItem>
              <ListItemText primary="Sex:" className={classes.text} />
              <ListItemText primary={patient.sex} className={classes.text} />
            </ListItem>
            <Divider />
            <ListItem>
              <ListItemText primary="Date:" className={classes.text} />
              <ListItemText
                primary={patient.birthday}
                className={classes.text}
              />
            </ListItem>
            <Divider />
            <ListItem>
              <ListItemText primary="Address:" className={classes.text} />
              <ListItemText
                primary={patient.postal_address}
                className={classes.text}
              />
            </ListItem>
            <Divider />
            <ListItem>
              <ListItemText primary="Phone number:" className={classes.text} />
              <ListItemText
                primary={patient.phone_number}
                className={classes.text}
              />
            </ListItem>
            <Divider />
            <ListItem>
              <ListItemText primary="Allergy:" className={classes.text} />
              <ListItemText
                primary={patient.allergy}
                className={classes.text}
              />
            </ListItem>
            <Divider />
            <ListItem>
              <ListItemText
                primary="Chronic disease:"
                className={classes.text}
              />
              <ListItemText
                primary={patient.chronic_disease}
                className={classes.text}
              />
            </ListItem>
            <Divider />
          </MuiThemeProvider>
        </List>
        <LinkContainer to={`/doctor/history/${id}`}>
          <Button
            variant="contained"
            color="default"
            className={classes.button}
          >
            History of diseases
            <AssignmentIcon className={classes.rightIcon} />
          </Button>
        </LinkContainer>
      </div>
    );
  }
}

Medcard.propTypes = {
  classes: PropTypes.object.isRequired
};

export default withStyles(styles, { withTheme: true })(Medcard);
