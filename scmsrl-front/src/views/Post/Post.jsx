import React, { Fragment, useState, useEffect } from "react";
import { BrowserRouter as Router, Switch, Route, Link, useParams } from "react-router-dom";
import { getPost } from "./../../utils/peticiones";
import PostHeader from "./../../components/post-header/post-header";
import PostContent from "./../../components/postContent/postContent";
const Post = (props) => {
  let { id } = useParams();
  const [post, setPost] = useState({});

  const getData = async () => {
    let post = {};
    post = await getPost(id)
      .then((res) => res.data)
      .then((data) => data.post[0]);
    setPost(post);
    return post;
  };

  useEffect(() => {
    getData();
  }, []);

  console.log(post);
  return (
    <Fragment>
      <PostHeader
        title={post.title !== undefined ? post.title : ""}
        author={post.user !== undefined ? post.user.name : ""}
        published_at={post.published_at !== undefined ? post.published_at : ""}
        img={post.cover_img !== undefined ? post.cover_img : ""}
      />
      <PostContent content={post.html !== undefined ? post.html : ""} />
    </Fragment>
  );
};

export default Post;
