import React from "react";
import parse from "html-react-parser";

const PostContent = ({ content }) => {
  return (
    <article>
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-lg-8 mx-auto">{parse(content)}</div>
        </div>
      </div>
    </article>
  );
};

export default PostContent;
