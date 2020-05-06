import React from "react";
import Card from "./../card/card";
const CardList = ({ posts, title }) => {
  return (
    <div class="article-list">
      <div class="container">
        <h1 style="font-size: 30px;">{title}</h1>
        <div class="row articles">
          {posts.map((post, index) => {
            return <Card key={index} img={post.featured_img} title={post.title} desc={post.custom_except} id={post.id} />;
          })}
        </div>
      </div>
    </div>
  );
};
