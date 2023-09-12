<script setup>
import {RouterView, RouterLink} from "vue-router";
</script>

<template>
  <div class="navbar-custom topnav-navbar topnav-navbar-dark">
    <div class="container-fluid">

      <a class="button-menu-mobile disable-btn">
        <div class="lines">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </a>
      <div class="app-search dropdown">
        <form>
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search..." id="top-search">
            <span class="mdi mdi-magnify search-icon"></span>
            <div class="input-group-append">
              <button class="btn btn-primary" type="submit">Search</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <div class="container-fluid mm-active">
    <div class="wrapper mm-show">
      <div class="left-side-menu left-side-menu-detached mm-active">
        <div class="leftbar-user">
          <a href="javascript: void(0);">
            <span class="leftbar-user-name">name</span>
          </a>
        </div>

        <ul class="metismenu side-nav mm-show">
          <li class="side-nav-title side-nav-item">Navigation</li>
          <li class="side-nav-item">
            <RouterLink to="/admin">
              <a class="side-nav-link">
                <i class="uil-home-alt"></i>
                <span class="badge badge-success float-right">5</span>
                <span> Dashboards</span>
              </a>
            </RouterLink>
          </li>
          <li class="side-nav-item">
            <RouterLink to="/admin/faculties">
              <a class="side-nav-link">
                <i class="mdi mdi-account-details-outline mdi-24px"></i>
                <span> Faculties</span>
              </a>
            </RouterLink>
          </li>
          <li>
            <a class="side-nav-link" href=""
               onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
               id="nav_sidebar">
              <i class="mdi mdi-logout mdi-24px"></i>
              <span>Logout</span>
              <form id="logout-form" action="" method="POST" class="d-none">
              </form>
            </a>
          </li>
        </ul>
      </div>

      <div class="content-page">
        <div class="content">
          <div class="row">
            <div class="col-12">
              <div class="page-title-box">
                <div class="page-title-right">
                  <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="">Home</a>
                    </li>
                    <li class="breadcrumb-item"><a href="">title</a></li>
                    <li class="breadcrumb-item active">subTitle</li>
                  </ol>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <RouterView></RouterView>
            </div>
          </div>
        </div>

        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6">
                2018 - 2020 © Hyper - Coderthemes.com
              </div>
              <div class="col-md-6">
                <div class="text-md-right footer-links d-none d-md-block">
                  <a href="javascript: void(0);">About</a>
                  <a href="javascript: void(0);">Support</a>
                  <a href="javascript: void(0);">Contact Us</a>
                </div>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
  </div>
</template>

<style scoped>

</style>