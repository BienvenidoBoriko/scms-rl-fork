import React, { Fragment } from "react";
import { BrowserRouter as Router, Switch, Route, Link, useParams } from "react-router-dom";
import NavBar from "./../../components/NavBar/NavBar";
const Post = (props) => {
  let { id } = useParams();
  return (
    <Fragment>
      <NavBar />
      <div>estamos en post {id}</div>
    </Fragment>
  );
};

export default Post;
