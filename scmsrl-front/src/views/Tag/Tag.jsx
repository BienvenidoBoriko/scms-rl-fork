import React, { Fragment, useState, useEffect } from "react";
import Header from "./../../components/header/header";
import { getTag } from "./../../utils/peticiones";
import CardList from "./../../components/cardList/cardList";
import { useParams } from "react-router-dom";
import Loading from "./../../components/loading/loading";

const Tag = (props) => {
  let { id } = useParams();
  const [tag, setTag] = useState({});
  const [loading, setLoading] = useState(true);
  const getData = async () => {
    let tag = {};
    tag = await getTag(id)
      .then((res) => res.data)
      .then((data) => data.tag[0]);
    setTag(tag);
    setLoading(false);
    return tag;
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
  return (() => {
    if (loading) {
      return (
        <div className="d-flex justify-content-center align-items-center">
          <Loading width="75" height="75" />
        </div>
      );
    } else {
      return (
        <Fragment>
          <Header title={tag.name} cover_img={tag.featured_img} desc={tag.description} />

          {(() => {
            const postsChunked = array_chunk(tag.posts, 3);
            return (
              <Fragment>
                {postsChunked.map((post, index) => {
                  return <CardList key={index} posts={post} title={`Post en la categoria ${tag.name}`} />;
                })}
              </Fragment>
            );
          })()}
        </Fragment>
      );
    }
  })();
};

export default Tag;
