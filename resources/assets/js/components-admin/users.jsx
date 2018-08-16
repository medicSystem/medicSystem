import React, { Component } from "react";

export default class Users extends Component {
  render() {
    return (
      <div>
        <div className="swichers">
          <button className="mdl-button mdl-js-button mdl-button--primary">
            All Users
          </button>
          <button className="mdl-button mdl-js-button mdl-button--primary">
            Ban List
          </button>
        </div>
      </div>
    );
  }
}
