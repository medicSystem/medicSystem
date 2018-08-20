import React, { Component } from "react";
import "./list.css";

export default class List extends Component {
    render() {
        return <div className="list">{this.props.children}</div>;
    }
}
