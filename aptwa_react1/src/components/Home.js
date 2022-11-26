import React, { Component } from "react";
import "bootstrap/dist/css/bootstrap.css";
import Head from "./Header";
import "./Home-css.css";

const Home = () => {
  return (
    <div>
      <Head />
      <div>
        <section class="section main-banner" id="top" data-section="section1">
          <video autoplay muted loop id="bg-video">
            <source src="/assets/images/course-video.m4v" type="video/mp4" />
          </video>

          <div class="video-overlay header-text">
            <div class="container">
              <div class="row">
                <div class="col-lg-12">
                  <div class="caption">
                    <h6>Hello</h6>
                    <h2>Welcome to RMG Solution</h2>
                    <p>
                      This is an edu meeting HTML CSS template provided by{" "}
                      <a
                        rel="nofollow"
                        href="https://templatemo.com/page/1"
                        target="_blank"
                      >
                        TemplateMo website
                      </a>
                      . This is a Bootstrap v5.1.3 layout. The video background
                      is taken from Pexels website, a group of young people by{" "}
                      <a
                        rel="nofollow"
                        href="https://www.pexels.com/@pressmaster"
                        target="_blank"
                      >
                        Pressmaster
                      </a>
                      .
                    </p>
                    <div class="main-button-red">
                      <div class="scroll-to-section">
                        <a href="/registration/buyer">Hire Garments</a>
                      </div>
                    </div>
                    <div class="main-button-blur">
                      <div class="scroll-to-section">
                        <a href="/registration/seller">
                          Register as a Garments owner
                        </a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
    </div>
  );
};

export default Home;
