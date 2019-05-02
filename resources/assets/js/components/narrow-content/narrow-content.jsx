import React, { Component } from "react";
import "./narrow-content.css";

export default class NarrowContent extends Component {
  render() {
    return <div className="Narrow-content">{this.props.children}</div>;
  }
}
