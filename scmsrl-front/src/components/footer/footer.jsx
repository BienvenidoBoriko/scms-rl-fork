import React, { Fragment } from "react";
import { Link } from "react-router-dom";

const Footer = ({ categories, tags, settings }) => {
  return (
    <div class="footer-dark">
      <footer>
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-sm-6 col-md-3 item">
              <h3>Categorias</h3>
              <ul>
                {categories.map((category, index) => {
                  return (
                    <li key={index}>
                      <Link to={`/categories/${category.id}`}>{category.name}</Link>
                    </li>
                  );
                })}
              </ul>
            </div>
            <div class="col-sm-6 col-md-3 item">
              <h3>Etiquetas</h3>
              <ul>
                {tags.map((tag, index) => {
                  return (
                    <li key={index}>
                      <Link to={`/tags/${tag.id}`}>{tag.name}</Link>
                    </li>
                  );
                })}
              </ul>
            </div>
            {settings.length !== 0 ? (
              <Fragment>
                <div class="col-sm-6 col-md-3 item text">
                  <h3>{settings[0].value}</h3>
                  <p>{settings[1].value}</p>
                </div>
                <div class="col-md-12 item social mt-2">
                  <a href={`http://${settings[4].value}`} target="_blank">
                    <i class="fab fa-facebook"></i>
                  </a>
                  <a href={`http://${settings[5].value}`} target="_blank">
                    <i class="fab fa-twitter-square"></i>
                  </a>
                  <a href={`http://${settings[6].value}`} target="_blank">
                    <i class="fas fa-envelope-square"></i>
                  </a>
                  <a href={`http://${settings[7].value}`} target="_blank">
                    <i class="fab fa-github-square"></i>
                  </a>
                </div>
              </Fragment>
            ) : (
              ""
            )}
          </div>
          {settings.length !== 0 ? <p class="copyright">{`${settings[0].value} © ${new Date().getFullYear()}`}</p> : ""}
        </div>
      </footer>
    </div>
  );
};

export default Footer;
