import React, { Fragment, useState, useEffect } from "react";
import { getPosts, getCategories, getSettings, getTags } from "./../../utils/peticiones";
import NavBar from "./../../components/NavBar/NavBar";
const Home = () => {
  const [data, setData] = useState({ posts: "", tags: "", categories: "", settings: "" });

  const getData = async () => {
    let datas = {};
    datas.posts = await getPosts()
      .then((res) => res.data)
      .then((data) => data.posts);

    datas.tags = await getTags()
      .then((res) => res.data)
      .then((data) => data.tags);

    datas.categories = await getCategories()
      .then((res) => res.data)
      .then((data) => data.categories);

    datas.settings = await getSettings()
      .then((res) => res.data)
      .then((data) => data.settings);
    return datas;
  };

  useEffect(async () => {
    setData(await getData());
  }, []);

  return (
    <Fragment>
      <NavBar />
      <div>estamos en home</div>
    </Fragment>
  );
};

export default Home;
