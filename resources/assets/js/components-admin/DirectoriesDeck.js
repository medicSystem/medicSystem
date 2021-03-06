import React from "react";
import PropTypes from "prop-types";
import SwipeableViews from "react-swipeable-views";
import {withStyles} from "@material-ui/core/styles";
import AppBar from "@material-ui/core/AppBar";
import Tabs from "@material-ui/core/Tabs";
import Tab from "@material-ui/core/Tab";
import Typography from "@material-ui/core/Typography";

import green from "@material-ui/core/colors/green";
import './styles/news.css';
import Send from "@material-ui/icons/Send";
import IconButton from '@material-ui/core/IconButton';

function TabContainer(props) {
    const {children, dir} = props;

    return (
        <Typography component="div" dir={dir} style={{padding: 8 * 3}}>
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
            value: 0
        };
        this.handleChange = (event, value) => {
            this.setState({value});
        };
        this.handleChangeIndex = index => {
            this.setState({value: index});
        };
    };

    render() {
        const {classes, theme} = this.props;
        const transitionDuration = {
            enter: theme.transitions.duration.enteringScreen,
            exit: theme.transitions.duration.leavingScreen
        };

        return (
            <div className={classes.root + ' ' + 'deck'}>
                <AppBar position="static" color="default">
                    <Tabs
                        value={this.state.value}
                        onChange={this.handleChange}
                        indicatorColor="primary"
                        textColor="primary"
                        fullWidth
                    >
                        <Tab label="Add"/>
                        <Tab label="Update"/>
                        <Tab label="Delete"/>
                    </Tabs>
                </AppBar>
                <SwipeableViews
                    axis={theme.direction === "rtl" ? "x-reverse" : "x"}
                    index={this.state.value}
                    onChangeIndex={this.handleChangeIndex}
                >
                    <TabContainer dir={theme.direction}>
                        <form className="DirectoriesDeck NewsDeck">
                            <label htmlFor="DirectoriesImage">Pick photo for directories
                            </label>
                            <br/>
                            <input id="DirectoriesImage" type="file"/>
                            <input placeholder='Disease Name' type='text'/>
                            <br/>
                            <div>Select category</div>
                            <select name="" id="">
                                <option value="">Infections</option>
                                <option value="">Degenerative</option>
                                <option value="">Deficiency</option>
                                <option value="">Non-Infectious</option>
                                <option value="">Social</option>
                                <option value="">Mental</option>
                            </select>
                            <div>Treatment:</div>
                            <textarea rows='8' placeholder='Treatment'/>
                            <br/>
                            <div>Symptoms:</div>
                            <textarea rows='8' placeholder='Symptoms'/>
                            <br/>
                            <IconButton color='primary'><Send/></IconButton>
                        </form>
                    </TabContainer>
                    <TabContainer dir={theme.direction}>
                        <form className="DirectoriesDeck NewsDeck">
                            <label htmlFor="DirectoriesImage">Pick photo for directories
                            </label>
                            <br/>
                            <input id="DirectoriesImage" type="file"/>
                            <input placeholder='Disease Name' type='text'/>
                            <br/>
                            <div>Select category</div>
                            <select name="" id="">
                                <option value="">Infections</option>
                                <option value="">Degenerative</option>
                                <option value="">Deficiency</option>
                                <option value="">Non-Infectious</option>
                                <option value="">Social</option>
                                <option value="">Mental</option>
                            </select>
                            <div>Treatment:</div>
                            <textarea rows='8' placeholder='Treatment'/>
                            <br/>
                            <div>Symptoms:</div>
                            <textarea rows='8' placeholder='Symptoms'/>
                            <br/>
                            <IconButton color='primary'><Send/></IconButton>
                        </form>
                    </TabContainer>
                    <TabContainer dir={theme.direction}>Item Three</TabContainer>
                </SwipeableViews>
            </div>
        );
    }
}

FloatingActionButtonZoom.propTypes = {
    classes: PropTypes.object.isRequired,
    theme: PropTypes.object.isRequired
};

export default withStyles(styles, {withTheme: true})(
    FloatingActionButtonZoom
);