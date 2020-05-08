import React, { Fragment, useState, useEffect } from "react";
import Header from "./../../components/header/header";
import CardList from "./../../components/cardList/cardList";

const Home = ({ settings, posts, categories, tags }) => {
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
      <Header
        title={settings[0] != undefined ? settings[0].value : ""}
        cover_img={settings[2] != undefined ? settings[2].value : ""}
        desc={settings[1] != undefined ? settings[1].value : ""}
      />

      <CardList posts={get3Posts(posts)} title="Ultimas Entradas" />
      {categories.map((category, index) => {
        return <CardList posts={get3Posts(category.posts)} title={category.name} />;
      })}
    </Fragment>
  );
};

export default Home;
