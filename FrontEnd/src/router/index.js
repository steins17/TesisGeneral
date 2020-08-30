import Vue from "vue";
import Router from 'vue-router';
import axios from "axios";
import Api from "../apis/Persona";

const originalPush = Router.prototype.push;
Router.prototype.push = function push(location) {
  return originalPush.call(this, location).catch(err => err);
};

Vue.use(Router);

const router = new Router({
  mode: 'history',
  base: "/",
  routes: [
    {
      path: '',
      component: () => import('../components/Navigation'),
      children: [
        {
          path: "/",
          name: "Inicio",
          component: () => import('../views/Inicio'),
        },
        {
          path: '/Nivel1',
          name: 'nivel1',
          component: () => import('../views/Nivel1'),
        },
        {
          path: '/Nivel2',
          name: 'nivel2',
          component: () => import('../views/Nivel2'),
          meta: { authOnly: true }
        },
        {
          path: '/Nivel3',
          name: 'nivel3',
          component: () => import('../views/Nivel3'),
          meta: { authOnly: true, nivel3:true }
        },
        {
          path: '/Nivel4',
          name: 'nivel4',
          component: () => import('../views/Nivel4'),
          meta: { authOnly: true, nivel4:true }
        },
        {
          path: '/Restablecer',
          name: 'Restablecer',
          component: () => import('../views/Prolife'),
          meta: { authOnly: true }
        },
        {
          path: '/Prolife',
          name: 'Prolife',
          component: () => import('../views/Restablecer'),
          meta: { authOnly: true, nivel1:true }
        }
      ]
    }
  ]
});

function isLoggedIn() {
  return localStorage.getItem("token");
}
function nota() {
  var dato = 0;
  dato = Api.notas().then( ({data}) => { return data; });
  return '22';
}

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.nivel3)) {
    if(nota()<21){
      next({
        path: "/nivel1",
        query: { redirect: to.fullPath }
      });
    }else{
      next();
    }
  }
  if (to.matched.some(record => record.meta.nivel4)) {
    if(nota()<42){
      next({
        path: "/nivel2",
        query: { redirect: to.fullPath }
      });
    }else{
      next();
    }
  }
  if (to.matched.some(record => record.meta.authOnly)) {
    if (!isLoggedIn()) {
      next({
        path: "/",
        query: { redirect: to.fullPath }
      });
    } else {
      next();
    }
  } else if (to.matched.some(record => record.meta.guestOnly)) {
    if (isLoggedIn()) {
      next({
        path: "/",
        query: { redirect: to.fullPath }
      });
    } else {
      next();
    }
  } else {
    next();
  }
});

export default router;
