import React from "react";
import { NavLink, Link } from "react-router-dom";

const NavBar = ({ title, categories, tags }) => {
  return (
    <nav className="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
      <div className="container">
        <Link to="/" className="navbar-brand">
          {title}
        </Link>
        <button
          data-toggle="collapse"
          data-target="#navbarResponsive"
          className="navbar-toggler"
          aria-controls="navbarResponsive"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <i className="fa fa-bars"></i>
        </button>
        <div className="collapse navbar-collapse" id="navbarResponsive">
          <ul className="nav navbar-nav ml-auto">
            <li className="nav-item" role="presentation">
              <NavLink to="/" className="nav-link" activeClassName="active">
                Home
              </NavLink>
            </li>
            <li className="nav-item" role="presentation">
              <NavLink to={`/category/${categories[0] ? categories[0].slug : ""}`} className="nav-link" activeClassName="active">
                {categories[0] != undefined ? categories[0].name : "hola"}
              </NavLink>
            </li>
            <li className="nav-item" role="presentation">
              <NavLink to={`/tag/${tags[0] ? tags[0].slug : ""}`} className="nav-link" activeClassName="active">
                {tags[0] != undefined ? tags[0].name : "hola"}
              </NavLink>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  );
};

export default NavBar;
