import React from "react";
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";
import "./sass/App.scss";
import Home from "./views/Home/Home";
import Tag from "./views/Tag/Tag";
import Post from "./views//Post/Post";
import Category from "./views/Category/Category";

function App() {
  return (
    <div className="App">
      <Router>
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
