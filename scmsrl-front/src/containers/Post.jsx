import React from "react";
import { BrowserRouter as Router, Switch, Route, Link, useParams } from "react-router-dom";
const Post = (props) => {
  let { id } = useParams();
  return <div>estamos en post {id}</div>;
};

export default Post;
