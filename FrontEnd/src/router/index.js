import Vue from "vue";
import Router from 'vue-router';
import Api from "../apis/Persona";
import store from "../store/store";

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
          meta: { authOnly: true} 
        }
      ]
    }
  ]
});

function isLoggedIn() {
  return localStorage.getItem("token");
}

router.beforeEach((to, from, next) => {
  store.dispatch('recuperauser').then((value) => {
    if(value.rol!=1){
      store.dispatch('recuperanota').then((value) => {
        if (to.matched.some(record => record.meta.nivel3)) {
          if(value.nota2<21){
            next({
              path: "/nivel2",
              query: { redirect: to.fullPath }
            });
          }else{
            next();
          }
        }
        if (to.matched.some(record => record.meta.nivel4)) {
          if(value.nota3<21){
            next({
              path: "/nivel3",
              query: { redirect: to.fullPath }
            });
          }else{
            next();
          }
        }
      });
    }
  });
  
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


