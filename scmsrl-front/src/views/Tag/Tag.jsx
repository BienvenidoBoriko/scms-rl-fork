import React, { Fragment, useState, useEffect } from "react";
import Header from "./../../components/header/header";
import CardList from "./../../components/cardList/cardList";
import { useParams } from "react-router-dom";

const Tag = ({ tags }) => {
  let { id } = useParams();
  let tag = tags.find((tag) => tag.id == id);

  const array_chunk = (input, size) => {
    // Split array into chunks
    for (var x, i = 0, c = -1, l = input.length, n = []; i < l; i++) {
      (x = i % size) ? (n[c][x] = input[i]) : (n[++c] = [input[i]]);
    }
    return n;
  };

  return (
    <Fragment>
      <Header title={tag.name} cover_img={tag.featured_img} desc={tag.description} />

      {(() => {
        const postsChunked = array_chunk(tag.posts, 3);
        return (
          <Fragment>
            {postsChunked.map((post, index) => {
              return <CardList key={index} posts={post} title={index === 0 ? `post con la etiqueta  ${tag.name}` : null} />;
            })}
          </Fragment>
        );
      })()}
    </Fragment>
  );
};

export default Tag;
