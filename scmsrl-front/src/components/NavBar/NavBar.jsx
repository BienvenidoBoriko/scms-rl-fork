import React from "react";
import { NavLink, Link } from "react-router-dom";
const navLinks = [
  { url: "/", text: "Home" },
  { url: "/category/programacion", text: "Programacion" },
  { url: "/tag/css", text: "Css" },
];

const siteTitle = {
  url: "/",
  text: "Scms-rl",
};

const NavBar = () => {
  return (
    <nav className="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
      <div className="container">
        <Link to={siteTitle.url} className="navbar-brand">
          {siteTitle.text}
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
            {navLinks.map((link, index) => {
              return (
                <li className="nav-item" role="presentation">
                  <NavLink to={link.url} key={index} className="nav-link" activeClassName="active">
                    {link.text}
                  </NavLink>
                </li>
              );
            })}
          </ul>
        </div>
      </div>
    </nav>
  );
};

export default NavBar;
