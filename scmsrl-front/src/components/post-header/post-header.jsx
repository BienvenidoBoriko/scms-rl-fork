import React, { Fragment } from "react";

const PostHeader = ({ title, author, published_at, img }) => {
  return (
    <header class="masthead" style={{ "background-image": `url(${img})` }}>
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-lg-8 mx-auto">
            <div class="post-heading">
              <h1>{title}</h1>
              {/* <h2 class="subheading">{desc}</h2> */}
              <span class="meta">
                Publicado por <a href="#">{author}</a>&nbsp;el dia {published_at}
              </span>
            </div>
          </div>
        </div>
      </div>
    </header>
  );
};

export default PostHeader;
