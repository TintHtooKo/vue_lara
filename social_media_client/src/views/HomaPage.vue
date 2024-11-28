<template>
            <div class="d-flex justify-content-center py-3">
              <p class="btn btn-danger text-white btn-sm me-3" @click="home()">Home</p>
              <p class="btn btn-dark text-white btn-sm" @click="login()" v-if="!tokenStatus">Login</p>
              <p class="btn btn-dark text-white btn-sm" @click="logout()" v-if="tokenStatus">Logout</p>
            </div>
            <section class="whats-news-area pt-50 pb-20">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="row d-flex justify-content-between">
                            <div class="col-lg-3 col-md-3">
                                <div class="section-tittle mb-30">
                                    <h3>Whats New</h3>
                                    
                                </div>
                            </div>
                            <div class="col-lg-9 col-md-9">
                                <div class="properties__button">
                                    <nav>
                                      <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                          <a
                                          class="nav-item nav-link active" 
                                          id="nav-home-tab" 
                                          data-toggle="tab" 
                                          href="" 
                                          role="tab" 
                                          aria-controls="nav-home" 
                                          aria-selected="true"
                                          @click.prevent="categorySearch('')" >All</a>
                                          <a
                                            v-for="(category,index) in categoryLists"
                                            :key="index"
                                            @click.prevent="categorySearch(category.title)" 
                                            class="nav-item nav-link"
                                            id="nav-profile-tab"
                                            data-toggle="tab"
                                            href=""
                                            role="tab"
                                            aria-controls="nav-profile"
                                            aria-selected="false"
                                            >{{category.title}}</a>
                                          
                                      </div>
                                    </nav>
                                </div>
                            </div>
                        </div>
              <div class="row">
                <div class="col-12">
                  <div class="">
                    <div class="d-flex align-items-center justify-content-end gap-2">
                      <input 
                      v-on:keyup.enter="search()"
                      v-model="searchKey" type="text" class="form-control w-25" placeholder="Search"/>
                      <button class="border-0 bg-dark py-1 px-2 rounded" type="button" @click="search()"><i class="fa-solid fa-magnifying-glass"></i></button>
                    </div>
                  </div>
                  <!-- Nav Card -->
                  <div class="tab-content" id="nav-tabContent">
                    <!-- card one -->
                    <div
                      
                      class="tab-pane fade show active"
                      id="nav-home"
                      role="tabpanel"
                      aria-labelledby="nav-home-tab"
                    >
                      <div class="whats-news-caption">
                        <div class="row">
                          <div class="" v-if="!tokenStatus">You don't have permission</div>                       
                          <div class="" v-if="tokenStatus" >
                            <div class="" v-if="postLists.length > 0">
                            <div class="col-lg-6 col-md-6" v-for="(post,index) in postLists" :key="index">
                            <div class="single-what-news mb-100" @click="detail(post.post_id)">
                              <div class="what-img">
                                <img
                                  :src="post.image"
                                  alt=""
                                  style="width: 300px;"
                                />
                              </div>
                              <div class="what-cap">
                                <span class="color1">{{post.title}}</span>
                                <h4>
                                  <a href="details.html"
                                    >{{post.desc}}</a
                                  >
                                </h4>
                              </div>
                            </div>
                            </div>
                          </div>
                          <div class=" d-flex align-items-center justify-content-center" v-else><h4>Post Not Found</h4></div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                  <!-- End Nav Card -->
                </div>
              </div>
            </div>
           </div>
           </div>
        </section>
        <!-- Whats New End -->

        <!--Start pagination -->
        <div class="pagination-area pb-45 text-center">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="single-wrap d-flex justify-content-center">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-start">
                                    <li class="page-item">
                                        <a class="page-link" href="details.html"><span class="flaticon-arrow roted"></span
                      ></a>
                                            </li>
                                            <li class="page-item active">
                                                <a class="page-link" href="details.html">01</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="details.html">02</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="details.html">03</a>
                                            </li>
                                            <li class="page-item">
                                                <a class="page-link" href="details.html"><span class="flaticon-arrow right-arrow"></span
                      ></a>
                                            </li>
                                            </ul>
                                    </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
</template>

<script src="../js/homePage.js"></script>
