import React from "react";
import config from "./../../utils/config";

const Card = ({ img, title, desc, id }) => {
  return (
    <div class="col-sm-6 col-md-4 item" style="padding-top: 20px;">
      <a href="#">
        <img class="img-fluid" src={config.host + img} />
      </a>
      <h3 class="name">{title}</h3>
      <p class="description">{desc}</p>
      <a class="action" href={`post/${id}`}>
        <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  );
};
