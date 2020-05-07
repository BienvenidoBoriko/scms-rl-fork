import React from "react";
import { Link } from "react-router-dom";

const Footer = ({ categories, tags, settings }) => {
  return (
    <div class="footer-dark">
      <footer>
        <div class="container">
          <div class="row">
            <div class="col-sm-6 col-md-3 item">
              <h3>Categorias</h3>
              <ul>
                {categories.map((category, index) => {
                  return (
                    <li key={index}>
                      <Link to={`categories/${category.id}`}>{category.name}</Link>
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
                      <Link to={`tags/${tag.id}`}>{tag.name}</Link>
                    </li>
                  );
                })}
              </ul>
            </div>
            <div class="col-md-6 item text">
              <h3>{settings[0].value}</h3>
              <p>{settings[1].value}</p>
            </div>
            <div class="col item social">
              <Link to={settings[4].value}>
                <i class="icon ion-social-facebook"></i>
              </Link>
              <Link to={settings[5].value}>
                <i class="icon ion-social-twitter"></i>
              </Link>
              <Link to={settings[6].value}>
                <i class="icon ion-social-email"></i>
              </Link>
              <Link to={settings[7].value}>
                <i class="icon ion-social-github"></i>
              </Link>
            </div>
          </div>
          <p class="copyright">{`${settings[0].value} © ${new Date().getFullYear()}`}</p>
        </div>
      </footer>
    </div>
  );
};

export default Footer;
