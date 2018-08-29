import React from "react";
import axios from "axios";
import PropTypes from "prop-types";
import { withStyles } from "@material-ui/core/styles";
import List from "@material-ui/core/List";
import ListItem from "@material-ui/core/ListItem";
import ListItemAvatar from "@material-ui/core/ListItemAvatar";
import ListItemSecondaryAction from "@material-ui/core/ListItemSecondaryAction";
import ListItemText from "@material-ui/core/ListItemText";
import Avatar from "@material-ui/core/Avatar";
import IconButton from "@material-ui/core/IconButton";

import Grid from "@material-ui/core/Grid";
import Typography from "@material-ui/core/Typography";
import FolderIcon from "@material-ui/icons/Folder";

import Loader from "react-loader-spinner";
import AppBar from "@material-ui/core/AppBar";
import Tabs from "@material-ui/core/Tabs";
import Tab from "@material-ui/core/Tab";
import SwipeableViews from "react-swipeable-views";
import { LinkContainer } from "react-router-bootstrap";
import green from "@material-ui/core/colors/green";

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
    flexGrow: 1,
    maxWidth: 1200
  },
  demo: {
    backgroundColor: theme.palette.background.paper
  },
  title: {
    margin: `${theme.spacing.unit * 4}px 0 ${theme.spacing.unit * 2}px`
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

class InteractiveList extends React.Component {
  constructor(props) {
    super(props);
    this.state = {
      value: 0,
      loading: true,
      dense: false,
      secondary: false
    };
    this.handleChange = (event, value) => {
      this.setState({ value });
    };
    this.handleChangeIndex = index => {
      this.setState({ value: index });
    };
  }
  componentDidMount() {
    this.setState({ loading: true }, () => {
      axios
        .get("/patientsList")
        .then(response => {
          this.setState({ loading: false, patientsList: response.data });
        })
        .catch(error => {
          console.log(error);
        });
    });
  }

  render() {
    const { classes, theme } = this.props;
    const { dense, secondary } = this.state;
    const { patientsList, loading } = this.state;
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
            <div className={classes.root}>
              <Grid
                style={{ maxWidth: "100%", marginLeft: 20, marginRight: 20 }}
                item
                xs={12}
                md={6}
              >
                <Typography variant="title" className={classes.title}>
                  Patients
                </Typography>
                <div className={classes.demo}>
                  <List dense={dense}>
                    {patientsList.map(patientsList => (
                      <ListItem key={patientsList.id}>
                        <ListItemAvatar>
                          <Avatar src={`/upload/user/${patientsList.avatar}`} />
                        </ListItemAvatar>
                        <ListItemText
                          primary={`${patientsList.last_name} ${
                            patientsList.first_name
                          }`}
                          secondary={secondary ? "Secondary text" : null}
                        />
                        <ListItemText
                          primary={patientsList.email}
                          secondary={secondary ? "Secondary text" : null}
                        />
                        <ListItemSecondaryAction>
                          <IconButton>
                            <LinkContainer
                              to={`/doctor/medcard/${patientsList.id}`}
                            >
                              <FolderIcon />
                            </LinkContainer>
                          </IconButton>
                        </ListItemSecondaryAction>
                      </ListItem>
                    ))}
                  </List>
                </div>
              </Grid>
            </div>
          </TabContainer>
        </SwipeableViews>
      </div>
    );
  }
}

InteractiveList.propTypes = {
  classes: PropTypes.object.isRequired,
  theme: PropTypes.object.isRequired
};

export default withStyles(styles, { withTheme: true })(InteractiveList);
