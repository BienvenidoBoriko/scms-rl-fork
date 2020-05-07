import React, { Fragment, useState, useEffect } from "react";
import { getPosts, getCategories, getSettings, getTags } from "./../../utils/peticiones";
import NavBar from "./../../components/NavBar/NavBar";
import Header from "./../../components/header/header";
import CardList from "./../../components/cardList/cardList";
import Footer from "./../../components/footer/footer";

const Home = () => {
  const [data, setData] = useState({ posts: [], tags: [], categories: [], settings: [] });

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
    return datas;
  };

  useEffect(() => {
    getData();
  }, []);

  const get3Posts = (posts) => {
    let rPosts = [];
    for (let post of posts) {
      rPosts.push(post);
      if (rPosts.length === 3) break;
    }
    return rPosts;
  };
  return (
    <Fragment>
      <NavBar title={data.settings[0] != undefined ? data.settings[0].value : ""} categories={data.categories} tags={data.tags} />
      <Header
        title={data.settings[0] != undefined ? data.settings[0].value : ""}
        cover_img={data.settings[2] != undefined ? data.settings[2].value : ""}
        desc={data.settings[1] != undefined ? data.settings[1].value : ""}
      />

      <CardList posts={get3Posts(data.posts)} title="Ultimas Entradas" />
      {data.categories.map((category, index) => {
        return <CardList posts={get3Posts(category.posts)} title={category.name} />;
      })}

      <Footer categories={data.categories} tags={data.tags} settings={data.settings} />
    </Fragment>
  );
};

export default Home;
