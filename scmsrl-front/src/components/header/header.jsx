import React from "react";

const Header = ({ title, cover_img, desc }) => {
  cover_img = "http://192.168.10.10/" + cover_img;
  return (
    <header class="masthead" style="background-image:url({cover_img});">
      <div class="overlay"></div>
      <div class="container">
        <div class="row">
          <div class="col-md-10 col-lg-8 mx-auto">
            <div class="site-heading">
              <h1>{title}</h1>
              <span class="subheading">{desc}</span>
            </div>
          </div>
        </div>
      </div>
    </header>
  );
};

export default Header;
