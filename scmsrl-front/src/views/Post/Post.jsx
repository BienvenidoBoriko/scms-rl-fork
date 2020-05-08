import React, { Fragment } from "react";
import { BrowserRouter as Router, Switch, Route, Link, useParams } from "react-router-dom";
import NavBar from "./../../components/NavBar/NavBar";
import PostHeader from "./../../components/post-header/post-header";
const Post = (props) => {
  let { id } = useParams();
  return (
    <Fragment>
      <NavBar />
      <PostHeader />
      <div>estamos en post {id}</div>
    </Fragment>
  );
};

export default Post;
