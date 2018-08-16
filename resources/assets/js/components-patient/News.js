import React, { Component } from "react";

export default class News extends Component {
  render() {
    return (
      <form action="#">
        <div>
          <textarea />
          <label>simple label</label>
        </div>
        <div class="mdl-textfield mdl-js-textfield">
          <textarea
            class="mdl-textfield__input"
            type="text"
            rows="3"
            id="sample5"
          />
          <label class="mdl-textfield__label" for="sample5">
            Text lines...
          </label>
        </div>
      </form>
    );
  }
}
