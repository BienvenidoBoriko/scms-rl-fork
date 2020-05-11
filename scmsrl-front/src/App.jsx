import React, { useState, useEffect } from "react";
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";
import { getPosts, getCategories, getSettings, getTags } from "./utils/peticiones";
import "./sass/App.scss";
import Home from "./views/Home/Home";
import Tag from "./views/Tag/Tag";
import Post from "./views//Post/Post";
import Category from "./views/Category/Category";
import NavBar from "./components/NavBar/NavBar";
import Footer from "./components/footer/footer";
import Loading from "./components/loading/loading";

function App() {
  const [data, setData] = useState(null);
  const [loading, setLoading] = useState(true);

  const getData = async () => {
    let datas = { posts: [], tags: [], categories: [], settings: [] };

    datas.settings = await getSettings()
      .then((res) => res.data)
      .then((data) => data.settings);
    datas.tags = await getTags()
      .then((res) => res.data)
      .then((data) => data.tags);
    datas.categories = await getCategories()
      .then((res) => res.data)
      .then((data) => data.categories);

    datas.posts = await getPosts()
      .then((res) => res.data)
      .then((data) => data.posts);
    setData(datas);
    setLoading(false);
    return datas;
  };

  useEffect(() => {
    getData();
  }, []);
  return (() => {
    if (loading) {
      return <Loading width="75" height="75" />;
    } else {
      return (
        <div className="App">
          <Router>
            <NavBar title={data.settings[0].value} categories={data.categories} tags={data.tags} />

            <Switch>
              <Route exact path="/" render={(props) => <Home settings={data.settings} tags={data.tags} posts={data.posts} categories={data.categories} />} />

              <Route path="/tags/:id" render={(props) => <Tag tags={data.tags} />} />
              <Route path="/categories/:id" render={(props) => <Category categories={data.categories} />} />
              <Route path="/posts/:id" component={Post} />
            </Switch>
            <Footer categories={data.categories} tags={data.tags} settings={data.settings} />
          </Router>
        </div>
      );
    }
  })();
}

export default App;
