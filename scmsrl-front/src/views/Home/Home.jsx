import React, { Fragment } from "react";
import { getPosts } from "./../../utils/peticiones";
import NavBar from "./../../components/NavBar/NavBar";
const Home = () => {
  return (
    <Fragment>
      <NavBar />
      <div>estamos en home</div>
    </Fragment>
  );
};

{
  getPosts()
    .then((res) => res.data)
    .then((data) => console.log(data));
}
export default Home;
