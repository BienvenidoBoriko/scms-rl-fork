import React from "react";
import { BrowserRouter as Router, Switch, Route, Link } from "react-router-dom";
import logo from "./../logo.svg";
import "./../sass/App.scss";
import Home from "./../containers/Home";
import Tag from "./../containers/Tag";
import Post from "./../containers/Post";
import Category from "./../containers/Category";

function App() {
  return (
    <div className="App container">
      <Router>
        <div>
          <ul>
            <li>
              <Link to="/">Home</Link>
            </li>
            <li>
              <Link to="/tag/css">Css</Link>
            </li>
            <li>
              <Link to="/category/programacion">Programacion</Link>
            </li>
            <li>
              <Link to="/post/1">post 1</Link>
            </li>
          </ul>

          <hr />
          <Switch>
            <Route exact path="/">
              <Home />
            </Route>
            <Route path="/tag/:name" children={<Tag />} />
            <Route path="/category/:name" children={<Category />} />
            <Route path="/post/:id" children={<Post />} />
          </Switch>
        </div>
      </Router>
    </div>
  );
}

export default App;
