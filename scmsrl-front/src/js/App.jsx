import React from "react";
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
import logo from "./../logo.svg";
import "./../sass/App.scss";
import Home from "./../containers/Home";
import Tag from "./../containers/Tag";
import Post from "./../containers/Post";
import Category from "./../containers/Category";
import NavBar from "../components/NavBar";

function App() {
  return (
    <div className="App container">
      <Router>
        <NavBar />
        <Switch>
          <Route exact path="/">
            <Home />
          </Route>
          <Route path="/tag/:name" children={<Tag />} />
          <Route path="/category/:name" children={<Category />} />
          <Route path="/post/:id" children={<Post />} />
        </Switch>
      </Router>
    </div>
  );
}

export default App;
