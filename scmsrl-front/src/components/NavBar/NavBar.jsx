import React, { useEffect } from "react";
import { NavLink, Link } from "react-router-dom";
import $ from "jquery";

const NavBar = ({ title, categories, tags }) => {
  const changeTheme = (e) => {
    $(".theme-icon").toggle();
    $("body").toggleClass("theme-dark");
  };

  useEffect(() => {
    var MQL = 992;
    let previousTop = 0;
    //primary navigation slide-in effect
    if ($(window).width() > MQL) {
      var headerHeight = $("#mainNav").height();
      $(window).on("scroll", function () {
        var currentTop = $(window).scrollTop();
        //check if user is scrolling up
        if (currentTop < previousTop) {
          //if scrolling up...
          if (currentTop > 0 && $("#mainNav").hasClass("is-fixed")) {
            $("#mainNav").addClass("is-visible");
          } else {
            $("#mainNav").removeClass("is-visible is-fixed");
          }
        } else if (currentTop > previousTop) {
          //if scrolling down...
          $("#mainNav").removeClass("is-visible");
          if (currentTop > headerHeight && !$("#mainNav").hasClass("is-fixed")) $("#mainNav").addClass("is-fixed");
        }
        previousTop = currentTop;
      });
    }
  }, []);

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
              <NavLink to={`/categories/${categories[0] ? categories[0].id : ""}`} className="nav-link" activeClassName="active">
                {categories[0] !== undefined ? categories[0].name : "hola"}
              </NavLink>
            </li>
            <li className="nav-item" role="presentation">
              <NavLink to={`/tags/${tags[0] ? tags[0].id : ""}`} className="nav-link" activeClassName="active">
                {tags[0] !== undefined ? tags[0].name : "hola"}
              </NavLink>
            </li>

            <li className="nav-item" role="presentation">
              <a href="#" class="button-left" onClick={changeTheme}>
                <i class="far fa-moon theme-icon"></i>
                <i class="far fa-sun theme-icon"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  );
};

export default NavBar;
