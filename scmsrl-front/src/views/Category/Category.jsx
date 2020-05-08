import React, { Fragment, useState, useEffect } from "react";
import Header from "./../../components/header/header";
import { getCategory } from "./../../utils/peticiones";
import CardList from "./../../components/cardList/cardList";
import { useParams } from "react-router-dom";

const Category = (props) => {
  let { id } = useParams();
  const [category, setCategory] = useState({});

  const getData = async () => {
    let category = {};
    category = await getCategory(id)
      .then((res) => res.data)
      .then((data) => data.category[0]);
    setCategory(category);
    return category;
  };

  useEffect(() => {
    getData();
  }, []);

  const array_chunk = (input, size) => {
    // Split array into chunks
    for (var x, i = 0, c = -1, l = input.length, n = []; i < l; i++) {
      (x = i % size) ? (n[c][x] = input[i]) : (n[++c] = [input[i]]);
    }
    return n;
  };
  return (
    <Fragment>
      <Header
        title={category.name != undefined ? category.name : ""}
        cover_img={category.featured_img != undefined ? category.featured_img : ""}
        desc={category.description != undefined ? category.description : ""}
      />

      {(() => {
        if (category.posts !== undefined) {
          const postsChunked = array_chunk(category.posts, 3);
          return (
            <Fragment>
              {postsChunked.map((post, index) => {
                return <CardList key={index} posts={post} title={`Post en la categoria ${category.name}`} />;
              })}
            </Fragment>
          );
        }
      })()}
    </Fragment>
  );
};

export default Category;
