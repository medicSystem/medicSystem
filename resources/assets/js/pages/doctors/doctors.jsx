import React from "react";
import axios from "axios";
import PropTypes from "prop-types";
import { withStyles } from "@material-ui/core/styles";
import Avatar from "@material-ui/core/Avatar";
import IconButton from "@material-ui/core/IconButton";
import FolderIcon from "@material-ui/icons/Folder";
import Loader from "react-loader-spinner";
import { LinkContainer } from "react-router-bootstrap";
import Table from "@material-ui/core/es/Table/Table";
import TableHead from "@material-ui/core/es/TableHead/TableHead";
import TableRow from "@material-ui/core/es/TableRow/TableRow";
import TableCell from "@material-ui/core/es/TableCell/TableCell";
import TableBody from "@material-ui/core/es/TableBody/TableBody";
import Paper from "@material-ui/core/es/Paper/Paper";

const styles = theme => ({
    root: {
        width: "100%",
        marginTop: theme.spacing.unit * 3,
        overflowX: "auto"
    },
    table: {
        minWidth: 700
    }
});

class InteractiveList extends React.Component {
    constructor(props) {
        super(props);
        this.state = {
            loading: true
        };
    }
    componentDidMount() {
        this.setState({ loading: true }, () => {
            axios
                .get("/getDoctors")
                .then(response => {
                    this.setState({ loading: false, patientsList: response.data });
                })
                .catch(error => {
                    console.log(error);
                });
        });
    }

    render() {
        const { classes } = this.props;
        const { patientsList, loading } = this.state;
        if (loading) {
            return (
                <Loader
                    id="loader"
                    type="TailSpin"
                    color="#4caf50"
                    height={80}
                    width={80}
                />
            );
        }
        console.log(patientsList);
        return (
            <Paper className={classes.root}>
                <Table className={classes.table}>
                    <TableHead>
                        <TableRow>
                            <TableCell>Avatar</TableCell>
                            <TableCell numeric>Last name</TableCell>
                            <TableCell numeric>First name</TableCell>
                            <TableCell numeric>Email</TableCell>
                            <TableCell numeric>Date</TableCell>
                            <TableCell>Patent</TableCell>
                            <TableCell numeric>Experience</TableCell>
                            <TableCell numeric>Work time</TableCell>
                            <TableCell numeric>Type name</TableCell>
                            <TableCell numeric>Get coupon</TableCell>
                        </TableRow>
                    </TableHead>
                    <TableBody>
                        {patientsList.map(patientsList => {
                            return (
                                <TableRow key={patientsList.id}>
                                    <TableCell component="th" scope="row">
                                        <Avatar src={`/upload/user/${patientsList.avatar}`} />
                                    </TableCell>
                                    <TableCell numeric>{patientsList.last_name}</TableCell>
                                    <TableCell numeric>{patientsList.first_name}</TableCell>
                                    <TableCell numeric>{patientsList.email}</TableCell>
                                    <TableCell numeric>
                                        {patientsList.birthday.replace(/-/gi, ".")}
                                    </TableCell>
                                    <TableCell component="th" scope="row">
                                        <Avatar src={`/upload/patents/${patientsList.patent}`} />
                                    </TableCell>
                                    <TableCell numeric>{patientsList.experience}</TableCell>
                                    <TableCell numeric>{patientsList.work_time}</TableCell>
                                    <TableCell numeric>{patientsList.type_name}</TableCell>
                                    <TableCell numeric>
                                        <IconButton>
                                            <LinkContainer
                                                to={`#`}
                                            >
                                                <FolderIcon />
                                            </LinkContainer>
                                        </IconButton>
                                    </TableCell>
                                </TableRow>
                            );
                        })}
                    </TableBody>
                </Table>
            </Paper>
        );
    }
}

InteractiveList.propTypes = {
    classes: PropTypes.object.isRequired
};

export default withStyles(styles)(InteractiveList);