import React, { Fragment } from "react";
import Header from "./../../components/header/header";
import CardList from "./../../components/cardList/cardList";
import { useParams } from "react-router-dom";

const Category = ({ categories }) => {
  let { id } = useParams();

  let category = categories.find((category) => category.id == id);

  const array_chunk = (input, size) => {
    // Split array into chunks
    for (var x, i = 0, c = -1, l = input.length, n = []; i < l; i++) {
      (x = i % size) ? (n[c][x] = input[i]) : (n[++c] = [input[i]]);
    }
    return n;
  };
  return (
    <Fragment>
      <Header title={category.name} cover_img={category.featured_img} desc={category.description} />

      {(() => {
        const postsChunked = array_chunk(category.posts, 3);
        return (
          <Fragment>
            {postsChunked.map((post, index) => {
              return <CardList key={index} posts={post} title={index === 0 ? `Post en la categoria ${category.name}` : null} />;
            })}
          </Fragment>
        );
      })()}
    </Fragment>
  );
};

export default Category;
