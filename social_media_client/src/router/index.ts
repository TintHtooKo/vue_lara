import { createRouter, createWebHistory, RouteRecordRaw } from 'vue-router'
import HomaPage from '@/views/HomaPage.vue'
import NewDetail from '@/views/NewDetail.vue'
import LoginPage from '@/views/LoginPage.vue'


const routes: Array<RouteRecordRaw> = [
  {
    path: '/',
    name: 'home',
    component: HomaPage
  },
  {
    path : '/homePage',
    name : 'HomePage',
    component : HomaPage
  },
  {
    path : '/detail/:newId',
    name : 'NewDetail',
    component : NewDetail
  },
  {
    path : '/loginpage',
    name : 'LoginPage',
    component : LoginPage
  }
]

const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes
})

export default router
