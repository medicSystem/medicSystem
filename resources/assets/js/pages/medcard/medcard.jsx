import React from "react";
import PropTypes from "prop-types";
import SwipeableViews from "react-swipeable-views";
import { withStyles } from "@material-ui/core/styles";
import AppBar from "@material-ui/core/AppBar";
import Tabs from "@material-ui/core/Tabs";
import Tab from "@material-ui/core/Tab";
import Typography from "@material-ui/core/Typography";
import green from "@material-ui/core/colors/green";
import axios from "axios";
import Loader from "react-loader-spinner";
import IconButton from "@material-ui/core/IconButton";
import Clear from "@material-ui/icons/Clear";
import Icon from "@material-ui/core/Icon";
import { Link } from "react-router-dom";
import { Button } from "react-bootstrap";
import { Image } from "react-bootstrap";
import { LinkContainer } from "react-router-bootstrap";
import Header from "../../components/carousel/carousel";

function TabContainer(props) {
  const { children, dir } = props;

  return (
    <Typography component="div" dir={dir} style={{ padding: 8 * 3 }}>
      {children}
    </Typography>
  );
}

TabContainer.propTypes = {
  children: PropTypes.node.isRequired,
  dir: PropTypes.string.isRequired
};

const styles = theme => ({
  root: {
    backgroundColor: theme.palette.background.paper,
    width: 500,
    position: "relative",
    minHeight: 200
  },
  fab: {
    position: "absolute",
    bottom: theme.spacing.unit * 2,
    right: theme.spacing.unit * 2
  },
  fabGreen: {
    color: theme.palette.common.white,
    backgroundColor: green[500]
  }
});

class FloatingActionButtonZoom extends React.Component {
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
        .get(`/getPatientById/${id}`)
        .then(response => {
          this.setState({ loading: false, patient: response.data[0] });
        })
        .catch(error => {
          console.log(error);
        });
    });
  }
  render() {
    const { classes, theme } = this.props;

    const { patient, loading } = this.state;

    const transitionDuration = {
      enter: theme.transitions.duration.enteringScreen,
      exit: theme.transitions.duration.leavingScreen
    };
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
      <div className={classes.root + " " + "deck"}>
        <AppBar position="static" color="default">
          <Tabs
            value={this.state.value}
            onChange={this.handleChange}
            indicatorColor="primary"
            textColor="primary"
            fullWidth
          >
            <Tab label="All Users" />
          </Tabs>
        </AppBar>
        <SwipeableViews
          axis={theme.direction === "rtl" ? "x-reverse" : "x"}
          index={this.state.value}
          onChangeIndex={this.handleChangeIndex}
        >
          <TabContainer dir={theme.direction}>
            <img
              src={`/upload/user/${patient.avatar}`}
              width="40px"
              height="30px"
            />
            <h1>
              {patient.last_name} {patient.first_name}
            </h1>
          </TabContainer>
        </SwipeableViews>
      </div>
    );
  }
}

FloatingActionButtonZoom.propTypes = {
  classes: PropTypes.object.isRequired,
  theme: PropTypes.object.isRequired
};

export default withStyles(styles, { withTheme: true })(
  FloatingActionButtonZoom
);
